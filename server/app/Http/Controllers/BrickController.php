<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brick;

class BrickController extends Controller
{
    public function all(){
        $brick = Brick::All();
        return $brick;
    }

    public function sort($value){
        $brick = Brick::where('material', $value)->get();       
        return $brick;
    }
}
