<?php

class DashboardModel extends Model {

    function __construct() {
        parent::__construct();
    }

    public function autoLoadArticles($search) {
        $sql = "SELECT article.*,
                (SELECT article__component.article_text
                    FROM article__component
                    WHERE article__component.article_text IS NOT NULL AND article__component.article_id = article.id
                    LIMIT 1) AS txt,
                (SELECT article__component.article_image
                    FROM article__component
                    WHERE article__component.article_image IS NOT NULL AND article__component.article_id = article.id
                    LIMIT 1) AS img,
                (SELECT COUNT(article__vote.upvote)
                    FROM article__vote
                    WHERE article__vote.article_id = article.id) AS upvote,
                (SELECT COUNT(article__vote.downvote)
                    FROM article__vote
                    WHERE article__vote.article_id = article.id) AS downvote,
                (SELECT COUNT(article__visitor.article_id)
                    FROM article__visitor
                    WHERE article__visitor.article_id = article.id) AS visitor
                FROM article
                INNER JOIN article__component ON article.id = article__component.article_id".($search != NULL ? 
                    " WHERE article.title LIKE '%$search%'
                    OR article.created_at LIKE '%$search%'
                    OR article__component.article_text LIKE '%$search%'
                    OR article__component.image_seo LIKE '%$search%'"
                    : "")."
                GROUP BY article.id
                ORDER BY article.created_at DESC
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':search', $search);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
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
        $sql = "INSERT INTO visitors (token, last_login) VALUES (:user, NOW())";
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

}