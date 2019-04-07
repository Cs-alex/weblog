<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $table = 'article__vote';

    public function article() {
        return $this->belongsTo('App\Article');
    }
}
