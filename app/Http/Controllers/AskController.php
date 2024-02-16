<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeAsksRequest;
use App\Http\Requests\storeCommentRequest;
use App\Models\ask;
use App\Models\comment;
use App\Models\comment_asks;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AskController extends Controller
{
    public function storeAsk(storeAsksRequest $request){
        $ask = new ask();
        $ask->description = $request->input('description');
        $ask->who_will_answer = $request->input('who_will_answer');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->store('images');
            $ask->image = $filePath;
        }
        $ask->user_id = auth()->user()->id;
        $ask->save();
        return response()->json(['message' => 'done created ask', 'data'=>$ask]);
    }

    public function indexAsk(){
        $allPosts = ask::orderBy('created_at', 'desc')->with('user')->get();
        $posts=[];
        $anotherPosts=[];
        foreach ($allPosts as $user) {
            if ($user->who_will_answer === auth()->user()->career ) {
                $posts[]=$user;
            }else{
                $anotherPosts[]=$user;
            }
            shuffle($anotherPosts);
        }
        return response()->json(['data of asks in your career'=>$posts,'data of asks in others career'=>$anotherPosts, 'User'=>auth()->user()]);
    }

    public function up($askId) {
        $ask = Ask::find($askId);

        if ($ask) {
            $ask->ups += 1;
            $ask->save();
            return response()->json(['message' => 'Upvote successful', 'ups' => $ask->ups]);
        } else {
            return response()->json(['message' => 'Ask not found'], 404);
        }
    }

    


    public function storeComment($ask ,storeCommentRequest $request){
        $singlePost=ask::Find($ask)->with('user')->first();

        $comment = new comment_asks();
        $comment->description = $request->input('description');
        $comment->from = auth()->user()->name;
        $comment->image_from = auth()->user()->image;
        $comment->to = $singlePost->user->name;
        $comment->image_to = $singlePost->user->image;
        $comment->ask_id = $singlePost->id;
        $comment->save();
        return response()->json(['message' => 'done created comment', 'data'=>$comment]);
    }

    public function indexComment($post){
        $postWithComments=ask::Find($post)->with('comment')->first();
        return response()->json(['data of post'=>$postWithComments]);
    }

    public function searchItem(Request $request){

        $keyword = $request->input('keyword');

        $items = ask::where('description', 'LIKE', '%' . $keyword . '%')->orderBy('created_at', 'desc')->with('user')->get();


        return response()->json(['data of asks in your career'=>$items]);
    }


}
