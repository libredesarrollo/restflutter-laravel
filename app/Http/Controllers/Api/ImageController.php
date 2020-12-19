<?php

namespace App\Http\Controllers\Api;

use App\Group;
use App\Http\Controllers\Controller;
use App\Image;
use Illuminate\Http\Request;

class ImageController extends ApiResponseController
{
    public function index()
    {
        return $this->responseApi(Image::leftJoin('behaviorals', function ($join) {
            $join->on('images.id', '=', 'behaviorals.behavioral_id')
                ->where('behavioral_type', '=', 'App\Image');
        })->paginate(15));
    }

    public function all()
    {
        return $this->responseApi(Image::leftJoin('behaviorals', function ($join) {
            $join->on('images.id', '=', 'behaviorals.behavioral_id')
                ->where('behavioral_type', '=', 'App\Image');
        })->get());
    }

    public function show(Image $image)
    {
        $image->behavior;
        return $this->responseApi($image);
    }

    public function group(Group $group)
    {
        return $this->responseApi(Image::leftJoin('behaviorals', function ($join) {
            $join->on('images.id', '=', 'behaviorals.behavioral_id')
                ->where('behavioral_type', '=', 'App\Image');
        })->where('group_id', $group->id)->get());
    }
}
