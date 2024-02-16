<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeCommentRequest;
use App\Http\Requests\storeReportsRequest;
use App\Models\comment_report;
use App\Models\report;
use Illuminate\Http\Request;

class reportsController extends Controller
{
    public function storeReport(storeReportsRequest $request){
        $report = new report();
        $report->description = $request->input('description');
        $report->country = $request->input('country');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->store('images');
            $report->image = $filePath;
        }
        $report->user_id = auth()->user()->id;
        $report->save();
        return response()->json(['message' => 'done created report', 'data'=>$report]);
    }

    public function indexReport(){
        $allReport =report::orderBy('created_at', 'desc')->with('user')->get();
        $reports=[];
        foreach ($allReport as $user) {
            if ($user->country === auth()->user()->country ) {
                $reports[]=$user;
            }
        }
        return response()->json(['data of asks in your country'=>$reports, 'User'=>auth()->user()]);
    }

    public function up($askId) {
        $ask = report::find($askId);

        if ($ask) {
            $ask->ups += 1;
            $ask->save();
            return response()->json(['message' => 'Upvote successful', 'ups' => $ask->ups]);
        } else {
            return response()->json(['message' => 'Ask not found'], 404);
        }
    }

    public function storeComment($report ,storeCommentRequest $request){
        if (auth()->user()->in_government === 'yes') {
            $singlePost=report::Find($report)->with('user')->first();
            $comment = new comment_report();
            $comment->description = $request->input('description');
            $comment->from = auth()->user()->name;
            $comment->image_from = auth()->user()->image;
            $comment->to = $singlePost->user->name;
            $comment->image_to = $singlePost->user->image;
            $comment->report_id = $singlePost->id;
            $comment->save();
            return response()->json(['message' => 'done created comment', 'data'=>$comment]);
        }
        return response()->json(['message' => 'comment in report not available for you']);
    }

    public function indexComment($report){
        $postWithComments=report::Find($report)->with('comment')->first();
        return response()->json(['data of post'=>$postWithComments]);
    }

    public function searchItem(Request $request){

        $keyword = $request->input('keyword');

        $items = report::where('description', 'LIKE', '%' . $keyword . '%')->orderBy('created_at', 'desc')->with('user')->get();


        return response()->json(['data of asks in your career'=>$items]);
    }
}
