<?php

namespace App\Http\Controllers;

use App\Models\friendship;
use App\Models\User;
use Illuminate\Http\Request;

class friendshipController extends Controller
{
    public function indexConnections(){
        $friendIds = friendship::where('user_id', auth()->user()->id)
        ->pluck('friend_user_id')
        ->toArray();

            $friendIds = array_merge(
                $friendIds,
                friendship::where('friend_user_id', auth()->user()->id)
                    ->pluck('user_id')
                    ->toArray()
            );

            $friendIds[] = auth()->user()->id;

            $friendIds = array_unique($friendIds);

            $nonFriends = User::whereNotIn('id', $friendIds)->get();
        return response()->json(['data of posts' => $nonFriends]);
    }

    public function storeFollow($id){
        $comment = new friendship();
        $comment->user_id = auth()->user()->id;
        $comment->friend_user_id = $id;
        $comment->status = 'pending';
        $comment->save();
        return response()->json(['message' => 'done created Request', 'data'=>$comment]);
    }

    public function indexRequests(){
        $friendIds = friendship::where('friend_user_id', auth()->user()->id)
            ->where('status', 'pending')
            ->with('user')
            ->get();

        $users = [];
        foreach ($friendIds as $friendId) {
            $user = $friendId->user;
            if ($user) {
                $users[] = $user->toArray();
            }
        }

        return response()->json(['data of posts' => $friendIds]);
    }


    public function storeAccept($id){
        $singlePartner = friendship::find($id);

        if ($singlePartner) {
            $singlePartner->update([
                'status' => 'accepted',
            ]);

            return response()->json(['message' => 'done accepted', 'data' => $singlePartner]);
        } else {
            return response()->json(['message' => 'Friendship not found'], 404);
        }
    }



    public function indexFriends(){
        $loggedInUserId = auth()->user()->id;

        $friendshipsAsUser = friendship::where('user_id', $loggedInUserId)
            ->where('status', 'accepted')
            ->with('user', 'friendUser')
            ->get();

        $friendshipsAsFriend = friendship::where('friend_user_id', $loggedInUserId)
            ->where('status', 'accepted')
            ->with('user', 'friendUser')
            ->get();

        $users = [];

        if ($friendshipsAsUser->isEmpty() && $friendshipsAsFriend->isEmpty()) {
            return response()->json(['data of posts' => $users]);
        }

        foreach ($friendshipsAsUser as $friendship) {
            $user = $friendship->user;
            $friendUser = $friendship->friendUser;

            if ($user) {
                $users[] = $user->toArray();
            }

            if ($friendUser) {
                $users[] = $friendUser->toArray();
            }
        }

        foreach ($friendshipsAsFriend as $friendship) {
            $user = $friendship->user;
            $friendUser = $friendship->friendUser;

            if ($user) {
                $users[] = $user->toArray();
            }

            if ($friendUser) {
                $users[] = $friendUser->toArray();
            }
        }


        $users = array_filter($users, function ($user) use ($loggedInUserId) {
            return $user['id'] !== $loggedInUserId;
        });



        return response()->json(['data of posts' => $users]);
    }

}
