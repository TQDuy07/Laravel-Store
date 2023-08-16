<?php

namespace App\Http\Modules\store\controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function show($id)
    {
        dd(123);
//        $user = User::find($id);
//
//        if (!$user) {
//            return response()->json(['message' => 'User not found'], 404);
//        }
//
//        return response()->json(['user' => $user], 200);
    }
}
