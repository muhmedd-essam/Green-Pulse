<?php

namespace App\Http\Controllers;

use App\Models\chat;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function store($to , request $request){
        $singlePost=User::Find($to);
        $message = new chat();
        $message->description = $request->input('description');
        $message->from = auth()->user()->email;
        $message->to = $singlePost->email;
        $message->save();
        return response()->json(['message' => 'done sent message', 'data'=>$message]);
    }

    public function index($to){
        $userChatWith=User::Find($to);
        $chat =Chat::all();
        $messages=[];
        foreach ($chat as $message) {
            if ($userChatWith->email === $message->to && auth()->user()->email === $message->from) {
                $messages[]=$message;

            }
        }
        if($messages === []){
            return response()->json(['message'=>'No messages']);
        }
        return response()->json(['data of message'=>$messages]);
    }


}
