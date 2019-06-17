<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vote extends Model
{
    public function answer()
    {
        return $this->belongsTo('App/Question');

    }
    public function votes()
    {
        return $this->hasMany('App/vote');
    }
}
