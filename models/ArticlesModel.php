<?php

class ArticlesModel extends Model {

    function __construct() {
        parent::__construct();
    }

    public function getArticleID($article) {
        $sql = "SELECT id FROM article WHERE seo = :article";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':article', $article, PDO::PARAM_STR);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function loadArticle($article_id) {
        $sql = "SELECT title, seo, created_at,
                (SELECT COUNT(upvote)
                    FROM article__vote
                    WHERE article_id = :article_id) AS upvote,
                (SELECT COUNT(downvote)
                    FROM article__vote
                    WHERE article_id = :article_id) AS downvote,
                (SELECT COUNT(article_id)
                    FROM article__visitor
                    WHERE article_id = :article_id) AS visitor
                FROM article
                WHERE id = :article_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':article_id', $article_id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function loadArticleComponents($article_id) {
        $sql = "SELECT article_text, article_image, image_seo, component_type, article_order
                FROM article__component
                WHERE article_id = :article_id
                ORDER BY article_order";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':article_id', $article_id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function addVisited($article_id, $visitor_id) {
        $sql = "INSERT INTO article__visitor (article_id, visitor_id) VALUES (:article_id, :visitor_id)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':article_id', $article_id, PDO::PARAM_INT);
        $stmt->bindparam(':visitor_id', $visitor_id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function checkUserToken($token) {
        $sql = "SELECT id FROM visitors WHERE token = :token";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':token', $token, PDO::PARAM_STR);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function insertUserToken($user) {
        $sql = "INSERT INTO visitors (token) VALUES (:user)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':user', $user, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function updateUserLogin($user) {
        $sql = "UPDATE visitors SET last_login = NOW() WHERE token = :user";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':user', $user);
        $stmt->execute();
    }

    public function checkIfVoted($article_id, $visitor_id) {
        $sql = "SELECT id, upvote, downvote FROM article__vote WHERE article_id = :article_id AND visitor_id = :visitor_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':article_id', $article_id, PDO::PARAM_INT);
        $stmt->bindparam(':visitor_id', $visitor_id, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function addVote($article_id, $visitor_id, $vote) {
        $sql = "INSERT INTO article__vote ($vote, article_id, visitor_id) VALUES (TRUE, :article_id, :visitor_id)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':article_id', $article_id, PDO::PARAM_INT);
        $stmt->bindparam(':visitor_id', $visitor_id, PDO::PARAM_INT);
        // $stmt->bindparam(':vote', $vote, PDO::PARAM_STR);
        $stmt->execute();
        $upvote = $this->getVoteCount($article_id)[0];
        $downvote = $this->getVoteCount($article_id)[1];
        echo json_encode($this->getVoteCount($article_id));
    }

    public function removeVote($article_id, $visitor_id, $vote) {
        $sql = "DELETE FROM article__vote WHERE article_id = :article_id AND visitor_id = :visitor_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':article_id', $article_id, PDO::PARAM_INT);
        $stmt->bindparam(':visitor_id', $visitor_id, PDO::PARAM_INT);
        $stmt->execute();
        if ($vote != 'update') {
            $upvote = $this->getVoteCount($article_id)[0];
            $downvote = $this->getVoteCount($article_id)[1];
            echo json_encode($this->getVoteCount($article_id));
        }
    }

    public function getVoteCount($article_id) {
        $sql = "SELECT
                (SELECT COUNT(upvote) FROM article__vote WHERE article_id = :article_id) AS upvoteCount,
                (SELECT COUNT(downvote) FROM article__vote WHERE article_id = :article_id) AS downvoteCount
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':article_id', $article_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

}