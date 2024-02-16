<?php

namespace App\Http\Controllers;

use App\Models\map;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class mapsController extends Controller
{
    public function indexMaps(){
        $allMap =map::all();
        return response()->json(['year'=>$allMap, 'user login'=>[auth()->user()]]);
    }

    public function indexMap($askId) {
        $map = map::find($askId);
        return response()->json(['year'=>[$map]]);
    }
}
