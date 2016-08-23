<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    protected $fillable = ['version', 'mode', 'deprecated'];
    //protected $primaryKey = ['version', 'mode'];
    protected $hidden = ['id', 'remark'];
}
