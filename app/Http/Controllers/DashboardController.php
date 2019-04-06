<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Article;
use App\Component;
use App\Vote;
use App\Visitor;
use App\User;
use Request;

class DashboardController extends Controller
{
    public function index() {
        $user = new User();
        $user->setUser();
        $data['scheme'] = DB::table('visitors')->select('color_scheme')->first();
        if (Request::segment(1) == NULL || Request::segment(1) == 'newest') {
            $data['article'] = DB::table('article')
                                ->join('article__component', 'article.id', '=', 'article__component.article_id')
                                ->join('article__visitor', 'article.id', '=', 'article__visitor.article_id')
                                ->join('article__vote', 'article.id', '=', 'article__vote.article_id')
                                ->select('*')
                                ->groupBy('article.id')
                                //->sortByDesc('article__vote.upvote')
                                ->get();
        } elseif (Request::segment(1) == 'favorite') {
            $data['article'] = DB::table('article')
                                ->join('article__component', 'article.id', '=', 'article__component.article_id')
                                ->join('article__visitor', 'article.id', '=', 'article__visitor.article_id')
                                ->join('article__vote', 'article.id', '=', 'article__vote.article_id')
                                ->select('article.*', DB::raw("COUNT(article__vote.upvote) AS voteCount GROUP BY article__vote.article_id"))
                                ->groupBy('article.id')
                                ->orderBy('voteCount', 'ASC')
                                ->get();
            /*$data['article'] = Article::with('article__vote')->get()->sortBy(function($count) {
                return count($count->article__vote->upvote);
            });*/
            print_r($data['article']);
        } elseif (Request::segment(1) == 'most-visited') {
            $data['article'] = Article::all()->sortByDesc('created_at');
        }
        //return view('dashboard.index')->with('data', $data);
    }

    public function search($search) {
        $result = DB::table('article')->select('article.id')->join('article__component', 'article__component.article_id', '=', 'article.id')->where('article.title', 'like', '%'.$search.'%')->orWhere('article__component.article_text', 'like', '%'.$search.'%')->get();
        for($i = 0; $i < count($result); $i++) {
            $id[] = preg_replace( '/[^\d]/', '', json_encode($result[$i]));
        }
        $data = array(
            'scheme' => DB::table('visitors')->select('color_scheme')->first(),
            'article' => Article::whereIn('id', array_unique($id))->orderBy('created_at', 'DESC')->get()
        );
        return view('dashboard.index')->with('data', $data);
    }
}
