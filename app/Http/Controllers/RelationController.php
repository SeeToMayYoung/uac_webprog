<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Relation;
use App\Models\User;

class RelationController extends Controller
{
    public function like(Request $request){
        if(Relation::where('sender_id',$request->sender_id)->where('receiver_id',$request->receiver_id)->first()){
            if(Relation::where('sender_id',$request->sender_id)->where('receiver_id',$request->receiver_id)->first()->likeStatus){
                $relation = Relation::where('sender_id',$request->sender_id)->where('receiver_id',$request->receiver_id)->first();
                $relation->likeStatus = 0;
                $relation->save();
                redirect('/');
            }
            else{
                $relation = Relation::where('sender_id',$request->sender_id)->where('receiver_id',$request->receiver_id)->first();
                $relation->likeStatus = 1;
                $relation->save();
            }
        }

        $relation = new Relation();
        $relation->sender_id = $request->sender_id;
        $relation->receiver_id = $request->receiver_id;
        $relation->likeStatus = 1;
        $relation->save();

        return redirect('/');
    }
}
