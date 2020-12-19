<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;

class UserController extends ApiResponseController
{
    public function verify()
    {
        //$user = Auth::user();

        $user = request()->user();

        //return $this->responseApi($user->token()->id);
        return response()->json(
            array(
                "token" => $user->token()->id
            )
        );
    }
}
