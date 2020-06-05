<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class LikeController extends Controller
{
    public function post(Request $request)
    {
        $now = Carbon::now();
        $param = [
            "shares_id" => $request->shares_id,
            "user_id" => $request->user_id,
            "created_at" => $now,
            "updated_at" => $now
        ];
        DB::insert('insert into likes (shares_id,user_id,created_at,updated_at) values
    (:shares_id,:user_id,:created_at,:updated_at)', $param);
        return response()->json();
    }
    public function delete(Request $request)
    {
        $param = [
            "shares_id" => $request->shares_id,
            "user_id" => $request->user_id,
        ];
        DB::delete('delete from likes where shares_id=:shares_id AND user_id=:user_id',
        $param);
        return response()->json();
    }
}
