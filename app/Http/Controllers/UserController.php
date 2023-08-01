<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Relation;

class UserController extends Controller
{
    public function view(){
        $users = User::all();

        return view('home', compact('users'));
    }

    public function display($id){
        $users = User::find($id);

        $likeStatus = Relation::where('sender_id', auth()->user()->id)
                      ->where('receiver_id', $id)
                      ->pluck('likeStatus')
                      ->first();

        return view('display', compact('users','likeStatus'));
    }

    public function lists(){
        $senderId = auth()->user()->id;

        $users = User::select('users.*')
                ->join('relations', 'users.id', '=', 'relations.receiver_id')
                ->where('relations.sender_id', $senderId)
                ->get();
        // dd($users);
        return view('profile', compact('users'));
    }
}
