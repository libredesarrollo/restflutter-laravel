<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['url','name','group_id'];

    public function behavior(){
        return $this->morphOne(Behavioral::class, 'behavioral');
    }
}
