<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    protected $fillable = ['text','group_id'];
    
    public function behavior(){
        return $this->morphOne(Behavioral::class, 'behavioral');
    }
}
