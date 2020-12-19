<?php

namespace App\Http\Controllers\Api;

use App\Button;
use App\Group;

class ButtonController extends ApiResponseController
{
    public function index()
    {
        $buttons = Button
        ::leftJoin('behaviorals', function ($join) {
            $join->on('buttons.id', '=', 'behaviorals.behavioral_id')
                 ->where('behavioral_type', '=', 'App\Button');
        })
        //->toSql();
        ->paginate(15);
        return $this->responseApi($buttons);
    }

    public function all()
    {
        $buttons = Button
        ::leftJoin('behaviorals', function ($join) {
            $join->on('buttons.id', '=', 'behaviorals.behavioral_id')
                 ->where('behavioral_type', '=', 'App\Button');
        })
        ->get();
        return $this->responseApi($buttons);
    }

    public function show(Button $button)
    {
        $button->behavior;
        return $this->responseApi($button);
    }

    public function group(Group $group)
    {
        return $this->responseApi(Button::leftJoin('behaviorals', function ($join) {
            $join->on('buttons.id', '=', 'behaviorals.behavioral_id')
                 ->where('behavioral_type', '=', 'App\Button');
        })->where('group_id', $group->id)->get());
    }
}
