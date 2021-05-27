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

    public function search($value){
        $brick = Brick::where('material', $value)
         -> orWhere('manufacturer', $value)
          -> orWhere('price', $value)
           -> orWhere('title', $value)
            ->get();       
        return $brick;
    }

    public function add(Request $req){
        $brick = new Brick;
        $brick->title = $req->title;
        $brick->img = $req->img;
        $brick->manufacturer = $req->manufacturer;
        $brick->info = $req->info;
        $brick->material = $req->material;
        $brick->price = $req->price;
        $brick->is_hollow = 1;
        $brick->save();
    }
    public function delete($id){
        $brick = Brick::find($id);
        $brick->delete();
    }
}
