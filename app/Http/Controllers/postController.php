<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeCommentRequest;
use App\Http\Requests\storePostsRequest;
use App\Http\Requests\storeTasksRequest;
use App\Models\comment;
use App\Models\ItemSerach;
use App\Models\post;
use Illuminate\Http\Request;

class postController extends Controller
{

    public function storePost(storePostsRequest $request){
            $post = new post();
            $post->description = $request->input('description');
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = $file->getClientOriginalName();
                $filePath = $file->store('images');
                $post->image = $filePath;
            }
            $post->which = $request->input('which');
            $post->user_id = auth()->user()->id;
            $post->save();

            return response()->json(['message' => 'done created post','data'=>$post]);
    }

    public function storeComment($post ,storeCommentRequest $request){
        $singlePost=post::Find($post)->with('user')->first();

        $comment = new comment();
        $comment->description = $request->input('description');
        $comment->from = auth()->user()->name;
        $comment->image_from = auth()->user()->image;
        $comment->to = $singlePost->user->name;
        $comment->image_to = $singlePost->user->image;
        $comment->post_id = $singlePost->id;
        $comment->save();
        return response()->json(['message' => 'done created comment', 'data'=>$comment]);
    }

    public function indexAdmin(){
        $allIdeaPosts = post::where('which', 'idea')->with('user')->get();

        return response()->json(['data of asks in your career'=>$allIdeaPosts]);
    }




    public function indexPost(){
            $posts = Post::orderBy('created_at', 'desc')->with('user')->get();
            $user=[auth()->user()];
            return response()->json(['data of posts'=>$posts, 'user login'=>$user]);
    }

    public function indexUser(){
        $posts = Post::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->with('user')->get();
        $user=[auth()->user()];
        return response()->json(['data of posts'=>$posts, 'user login'=>$user]);
    }

    public function storeApprove($askId){
        $ask = post::find($askId);

        if ($ask) {
            $ask->which ='post';
            $ask->save();
            return response()->json(['message' => 'Approve successful']);
        } else {
            return response()->json(['message' => 'Ask not found'], 404);
        }
    }

    public function up($askId) {
        $ask = post::find($askId);

        if ($ask) {
            $ask->ups += 1;
            $ask->save();
            return response()->json(['message' => 'Upvote successful', 'ups' => $ask->ups]);
        } else {
            return response()->json(['message' => 'Ask not found'], 404);
        }
    }

    public function indexComment($post){
        $postWithComments=post::Find($post)->with('comment')->first();
        return response()->json(['data of post'=>$postWithComments]);
    }

    public function searchItem(Request $request){

            $keyword = $request->input('keyword');

            $items = post::where('description', 'LIKE', '%' . $keyword . '%')->orderBy('created_at', 'desc')->with('user')->get();


            return response()->json(['data of posts'=>$items]);
        }

}
