<?php

namespace App\Http\Controllers\Api;

use App\Chip;
use App\Group;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChipController extends ApiResponseController
{
    public function index()
    {
        return $this->responseApi(Chip::leftJoin('behaviorals', function ($join) {
            $join->on('chips.id', '=', 'behaviorals.behavioral_id')
                 ->where('behavioral_type', '=', 'App\Chip');
        })->paginate(15));
    }

    public function all()
    {
        return $this->responseApi(Chip::leftJoin('behaviorals', function ($join) {
            $join->on('chips.id', '=', 'behaviorals.behavioral_id')
                 ->where('behavioral_type', '=', 'App\Chip');
        })->get());
    }

    public function show(Chip $chip)
    {
        $chip->behavior;
        return $this->responseApi($chip);
    }

    public function group(Group $group)
    {
        return $this->responseApi(Chip::leftJoin('behaviorals', function ($join) {
            $join->on('chips.id', '=', 'behaviorals.behavioral_id')
                 ->where('behavioral_type', '=', 'App\Chip');
        })->where('group_id', $group->id)->get());
    }
}
