<?php

namespace App\Http\Controllers\Api;

use App\Group;
use App\Http\Controllers\Controller;
use App\Text;
use Illuminate\Http\Request;

class TextController extends ApiResponseController
{
    public function index()
    {
        return $this->responseApi(Text::paginate(15));
    }

    public function all()
    {
        return $this->responseApi(Text::get());
    }

    public function show(Text $text)
    {
        return $this->responseApi($text);
    }

    public function group(Group $group)
    {
        return $this->responseApi(Text::where('group_id', $group->id)->get());
    }
}
