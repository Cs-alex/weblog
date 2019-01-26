<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    protected $table = 'visitors';
    public $timestamps = FALSE;

    public function setUser() {
        $token = md5($_SERVER['REMOTE_ADDR'].gethostbyaddr($_SERVER['REMOTE_ADDR']));
        $visitor = $this->select('id')->where('token', $token)->first();
        if ($visitor == FALSE) {
            $this->insertGetId(['token' => $token]);
        } else {
            $this->where('token', $token)->update(['last_login' => DB::raw('now()')]);
        }
    }

    public function getUserId() {
        $token = md5($_SERVER['REMOTE_ADDR'].gethostbyaddr($_SERVER['REMOTE_ADDR']));
        return $visitor = $this->select('id')->where('token', $token)->first();
    }

    public function setScheme($scheme) {
        $token = md5($_SERVER['REMOTE_ADDR'].gethostbyaddr($_SERVER['REMOTE_ADDR']));
        $this->where('token', $token)->update(['color_scheme' => $scheme]);
    }

    public function articleVote($vote, $article_id) {
        $token = md5($_SERVER['REMOTE_ADDR'].gethostbyaddr($_SERVER['REMOTE_ADDR']));
        //$visitor = $this->select('id')->where('token', $token)->first();
        $voted = Vote::select('upvote', 'downvote')->where('visitor_id', 22)->first();
        if ($voted == NULL) {
            Vote::insertGetId([$vote => TRUE, 'article_id' => $article_id, 'visitor_id' => 22]);
        } else {
            if (($voted->upvote != NULL && $vote == 'upvote') || ($voted->downvote != NULL && $vote == 'downvote')) {
                Vote::where('visitor_id', 22)->delete();
            } else {
                // if ($vote == 'upvote') {
                //     Vote::where(['article_id' => $article_id, 'visitor_id' => 22])->update(['upvote' => 0]);
                // } else {
                //     Vote::where(['article_id' => $article_id, 'visitor_id' => 22])->update(['downvote' => 0]);
                // }
            }
        }
        $count = new Article();
        return $count->vote();
    }
}
