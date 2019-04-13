<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Article;
use App\User;
use Request;
use Session;

class ArticleController extends Controller
{
    public function article($lang, $article) {
        $user = new User();
        $user->setUser();
        $user_id = $user->getUserId()->id;
        if ($lang == 'en') {
            session(['lang' => 'en']);
        } else {
            session(['lang' => 'hu']);
        }
        App()->setlocale(session('lang'));
        $article_id = $this->getArticleId(session('lang'), $article);
        Session::put('scheme', DB::table('visitors')->select('color_scheme')->where('id', $user_id)->first()->color_scheme);
        if ($article_id) {
            $data = array(
                'article' => Article::where('id', $article_id->id)->first(),
                'vote' => DB::table('article__vote')->select(DB::raw('count(upvote) as upvote, count(downvote) as downvote'))->where([['visitor_id', '=', $user_id->id], ['article_id', '=', $article_id->id]])->first(),
                'upvote' => DB::table('article__vote')->select(DB::raw('count(upvote) as upvote'))->where('article_id', $article_id->id)->first(),
                'downvote' => DB::table('article__vote')->select(DB::raw('count(downvote) as downvote'))->where('article_id', $article_id->id)->first(),
                'visitor' => DB::table('article__visitor')->select(DB::raw('count(visitor_id) as visitor'))->where('article_id', $article_id->id)->first()
            );
            return view('articles.index')->with('data', $data);
        } else {
            return view('errors.404');
        }
    }

    public function getArticleId($lang, $article) {
        return $article_id = Article::select('id')->where('seo_'.$lang, $article)->first();
    }
}