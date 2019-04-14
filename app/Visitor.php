<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $table = 'article__visitor';
    protected $fillable = array('article_id', 'visitor_id');
    public $timestamps = false;

    public function article() {
        return $this->belongsTo('App\Article');
    }
}
