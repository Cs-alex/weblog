<?php

class Articles extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->render('articles/index');
    }

    public function article($article) {
        $article_id = $this->model->getArticleID($article);
        $visitor_id = $this->model->checkUserToken(md5($_SERVER['REMOTE_ADDR'].gethostbyaddr($_SERVER['REMOTE_ADDR'])));
        $this->users();
        $this->model->addVisited($article_id['id'], $visitor_id['id']);
        $this->view->voted = $this->model->checkIfVoted($article_id['id'], $visitor_id['id']);
        $this->view->article = $this->model->loadArticle($article_id['id']);
        $this->view->components = $this->model->loadArticleComponents($article_id['id']);
        $this->view->render('articles/index');
    }

    public function articleVote($article) {
        $vote = $_POST['data'];
        $article_id = $this->model->getArticleID($article);
        $visitor_id = $this->model->checkUserToken(md5($_SERVER['REMOTE_ADDR'].gethostbyaddr($_SERVER['REMOTE_ADDR'])));
        $voted = $this->model->checkIfVoted($article_id['id'], $visitor_id['id']);
        if ($voted == true) {
            if (($voted['upvote'] != NULL && $vote == 'upvote') || ($voted['downvote'] != NULL && $vote == 'downvote')) {
                $this->model->removeVote($article_id['id'], $visitor_id['id'], $vote);
            } else {
                $this->model->removeVote($article_id['id'], $visitor_id['id'], 'update');
                $this->model->addVote($article_id['id'], $visitor_id['id'], $vote);
            }
        } else {
            $this->model->addVote($article_id['id'], $visitor_id['id'], $vote);
        }
    }

}