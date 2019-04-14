<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;

class UserController extends Controller
{
    public function scheme() {
        $user = new User();
        $user->setScheme($_POST['data']);
    }

    public function vote($seo) {
        $article_id = Article::select('id')->where('seo', $seo)->first();
        $user = new User();
        echo $_POST['data'].' + '.$article_id->id;die;
        $user->articleVote($_POST['data'], $article_id->id);
    }
}
