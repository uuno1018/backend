<?php

namespace App\Http\Controllers;

use App\Shares;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SharesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Shares::all();
        return response()->json($items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $api = new Shares;
        $api->user_id = $request->user_id;
        $api->share = $request->share;
        $api->save();
        return response()->json();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shares  $shares
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Shares::find($id);
        $like = DB::table('likes')->where('shares_id', $id)->get();
        $comment = DB::table('comments')->where('shares_id', $id)->get();
        $comment_data = array();
        foreach ($comment as $value) {
            $comment_user = DB::table('users')->where('id', $value->user_id)->get();
            $comments = [
                "comment" => $value,
                "comments_user" => $comment_user
            ];
            array_push($comment_data, $comments);
        }
        $user = DB::table('users')->where('id', $item->user_id)->get();
        $items = [
            "item" => $item,
            "like" => $like,
            "comments" => $comment_data,
            "name" => $user[0]->name,
        ];
        return response()->json($items);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shares  $shares
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $api = Shares::find($id);
        $api->delete();
        return response()->json();
    }
}
