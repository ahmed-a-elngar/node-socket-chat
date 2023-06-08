<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Room;
use App\Models\User;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    //
    public function index()
    {
        // ? saving messages
        // $newMessage = new Message();
        // $newMessage->content = "hello to private chat with id = 2";
        // $newMessage->sender_id = Auth::id();
        // $newMessage->messageable()->associate(User::find(2));
        // $newMessage->save();
        // dd("message saved private");

        // $newMessage = new Message();
        // $newMessage->content = "hello to tech room";
        // $newMessage->sender_id = Auth::id();
        // $newMessage->messageable()->associate(Room::find(1));
        // $newMessage->save();
        // dd("message saved to tech");

        // ? saving subscripers
        // $newSubscribe = new Subscribe();
        // $newSubscribe->user_id = 3;
        // $newSubscribe->subscribeale()->associate(Room::find(1));
        // $newSubscribe->save();
        // dd("subscribe user to room");

        // $newSubscribe = new Subscribe();
        // $newSubscribe->user_id = 1;
        // $newSubscribe->subscribeale()->associate(User::find(2));
        // $newSubscribe->save();
        // dd("subscribe user to user");

        // ? get subscribes
        $user = User::find(3);
        $subscribes = $user->Subscribes()->orWhere("user_id", 3)
            ->leftJoin("rooms", function ($q) {
                $q->on("rooms.id", "subscribes.subscribeale_id");
                $q->where("subscribes.subscribeale_type", "App\Models\Room");
            })
            ->select(["rooms.id AS room_id", "rooms.name AS room_name"])
            ->get();

        // todo
        // $subscribes_ = $user->Subscribes()->orWhere("user_id", 3)
        // ->leftJoin("users", function ($q) {
        //     $q->on("users.id", "subscribes.subscribeale_id");
        //     $q->where("subscribes.subscribeale_type", "App\Models\User");
        //     $q->orWhere("subscribes.user_id", "users.id");
        // })
        // ->select(["users.id AS user_id", "users.name AS user_name"])
        // ->get();

        // dd($subscribes, $subscribes_);

        // dd(Auth::user()->Subscribes);
        $rooms = $subscribes;
        
        return view("chat.messenger", compact("rooms"));
    }
}
