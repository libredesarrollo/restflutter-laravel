<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chip extends Model
{
    protected $fillable = ['color','color_bg','label','icon','group_id'];

    public function behavior(){
        return $this->morphOne(Behavioral::class, 'behavioral');
    }
}
