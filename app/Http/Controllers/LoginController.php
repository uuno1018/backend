<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function post(Request $request)
    {
        $items = DB::table('users')->where('email', $request->email)->first();
        if (Hash::check($request->password, $items->password)) {
        return response()->json(['auth' => true]);
    } else {
        return response()->json(['auth' => false]);
    }
    }
}
