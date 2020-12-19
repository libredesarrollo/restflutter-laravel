<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mix extends Model
{
    protected $table = "mixs";

    protected $fillable = ['widget','widget_id','orden','group_id'];
}
