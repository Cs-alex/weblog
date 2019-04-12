<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    protected $table = 'article__component';

    public function article() {
        return $this->belongsTo('App\Article');
    }
}
