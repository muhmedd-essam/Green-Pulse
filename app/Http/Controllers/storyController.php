<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeStorysRequest;
use App\Models\story;
use Carbon\Carbon;
use Illuminate\Http\Request;

class storyController extends Controller
{

    public function storeStory(storeStorysRequest $request){
        $post = new story();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->store('images');
            $post->image = $filePath;
        }
        $post->user_id = auth()->user()->id;
        $post->save();

        return response()->json(['message' => 'done created story','story'=>$post]);
    }

    public function indexStory(){


        $posts = Story::where('created_at', '>=', Carbon::now()->subDay())
                    ->orderBy('created_at', 'desc')
                    ->with('user')
                    ->get();

            $user = [auth()->user()];
            return response()->json(['data of stories' => $posts, 'user login' => $user]);
        }

}
