<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Behavioral extends Model
{
    protected $fillable = ['behavioral_id','behavioral_type','behavioral_model','content1','content2'];
}
