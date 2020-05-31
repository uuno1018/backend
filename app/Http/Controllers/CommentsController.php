<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function post(Request $request)
    {
        $now = Carbon::now();
        $param = [
            "shares_id" => $request->shares_id,
            "user_id" => $request->user_id,
            "content" => $request->content,
            "created_at" => $now,
            "updated_at" => $now
        ];
        DB::insert('insert into comments (shares_id,user_id,content,created_at,updated_at)
        values (:shares_id,:user_id,:content,:created_at,:updated_at)', $param);
        return response()->json();
    }
}
