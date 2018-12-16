<?php

class DashboardModel extends Model {

    function __construct() {
        parent::__construct();
    }

    public function autoLoadArticles($search, $order) {
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
                ".($order == 0 ? " ORDER BY article.created_at DESC" : " ORDER BY article.created_at ASC")."
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':search', $search);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

}