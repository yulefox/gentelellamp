<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Host extends Model
{
    public servers()
    {
        return $this->hasMany('App\Server');
    }

    public $incrementing = false;
}
