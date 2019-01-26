<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';
    public $timestamps = true;

    public function component() {
        return $this->hasMany('App\Component');
    }

    public function visitor() {
        return $this->hasMany('App\Visitor');
    }

    public function vote() {
        return $this->hasMany('App\Vote');
    }
}
