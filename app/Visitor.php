<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $table = 'article__visitor';

    public function article() {
        return $this->belongsTo('App\Article');
    }
}
