<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;
use Session;

class UserController extends Controller
{
    public function scheme() {
        $user = new User();
        $user->setScheme($_POST['data']);
    }

    public function vote() {
        $article_id = Article::select('id')->where('seo_'.session('lang'), $_POST['seo'])->first();
        $user = new User();
        $user->articleVote($_POST['data'], $article_id->id);
    }
}
