<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Button extends Model
{
    protected $fillable = ['color','color_bg','label','icon','type','group_id'];

    public function behavior(){
        return $this->morphOne(Behavioral::class, 'behavioral');
    }

}
