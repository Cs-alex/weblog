<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Article;
use App\User;

class ArticleController extends Controller
{
    public function article($article) {
        $user = new User();
        $user->setUser();
        $user_id = $user->getUserId();
        $article_id = $this->getArticleId($article);
        $data = array(
            'scheme' => DB::table('visitors')->select('color_scheme')->first(),
            'article' => Article::where('id', $article_id->id)->first(),
            'vote' => DB::table('article__vote')->select(DB::raw('count(upvote) as upvote, count(downvote) as downvote'))->where([['visitor_id', '=', $user_id->id], ['article_id', '=', $article_id->id]])->first(),
            'upvote' => DB::table('article__vote')->select(DB::raw('count(upvote) as upvote'))->where('article_id', $article_id->id)->first(),
            'downvote' => DB::table('article__vote')->select(DB::raw('count(downvote) as downvote'))->where('article_id', $article_id->id)->first(),
            'visitor' => DB::table('article__visitor')->select(DB::raw('count(visitor_id) as visitor'))->where('article_id', $article_id->id)->first(),
        );
        return view('articles.index')->with('data', $data);
    }

    public function getArticleId($article) {
        return $article_id = Article::select('id')->where('seo', $article)->first();
    }
}