<?php

namespace App\Http\Controllers\Api;

use App\Group;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GroupController extends ApiResponseController
{
    public function index()
    {
        return $this->responseApi(Group::paginate(15));
    }

    public function all()
    {
        return $this->responseApi(Group::get());
    }

    public function show(Group $group)
    {
        return $this->responseApi($group);
    }
}