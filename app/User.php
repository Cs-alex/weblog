<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Session;

class User extends Model
{
    protected $table = 'visitors';
    public $timestamps = FALSE;

    public function setUser() {
        Session::put('token', md5($_SERVER['HTTP_X_FORWARDED_FOR'].' + '.gethostbyaddr($_SERVER['HTTP_X_FORWARDED_FOR'])));
        $visitor = $this->select('id')->where('token', session('token'))->first();
        if ($visitor == FALSE) {
            $this->insertGetId(['token' => session('token')]);
        } else {
            $this->where('token', session('token'))->update(['last_login' => DB::raw('now()')]);
        }
    }

    public function getUserId() {
        return $visitor = $this->select('id')->where('token', session('token'))->first();
    }

    public function setScheme($scheme) {
        $this->where('token', session('token'))->update(['color_scheme' => $scheme]);
    }

    public function articleVote($vote, $article_id) {
        $visitor = $this->select('id')->where('token', session('token'))->first();
        $voted = Vote::select('upvote', 'downvote')->where([['visitor_id', '=', $visitor['id']], ['article_id', '=', $article_id]])->first();
        if ($voted == NULL) {
            Vote::insertGetId([$vote => TRUE, 'article_id' => $article_id, 'visitor_id' => $visitor['id']]);
        } else {
            if (($voted->upvote != NULL && $vote == 'upvote') || ($voted->downvote != NULL && $vote == 'downvote')) {
                Vote::where([['visitor_id', '=', $visitor['id']], ['article_id', '=', $article_id]])->delete();
            } else {
                if ($vote == 'upvote') {
                    DB::table('article__vote')->where([['article_id', '=', $article_id], ['visitor_id', '=', $visitor['id']]])->update(['upvote' => 1, 'downvote' => NULL]);
                } else {
                    DB::table('article__vote')->where([['article_id', '=', $article_id], ['visitor_id', '=', $visitor['id']]])->update(['upvote' => NULL, 'downvote' => 1]);
                }
            }
        }
        $count = DB::table('article__vote')->select(DB::raw('count(upvote) as upvote, count(downvote) as downvote'))->where('article_id', $article_id)->first();
        echo json_encode($count);
    }
}
