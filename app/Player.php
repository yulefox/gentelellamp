<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = ['version', 'mode', 'deprecated'];
    protected $hidden = ['brief'];
    protected $table = 'dat_role';
}
