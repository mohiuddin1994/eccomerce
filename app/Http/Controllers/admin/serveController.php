<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceTabel;
use Illuminate\Http\Request;

class serveController extends Controller
{
    //
    public function store(Request $request){
        // dd($request->all());
        $serve = new ServiceTabel();
        $serve ->header = $request->header;
        $serve ->price = $request->price;
        $serve ->description = $request->description;
        $serve ->lineOne = $request->lineOne;
        $serve ->lineTwo = $request->lineTwo;
        $serve ->lineThree = $request->lineThree;
        $serve ->lineFour= $request->lineFour;
        $serve ->lineFive = $request->lineFive;
        $serve ->lineSix = $request->lineSix; 
        $serve->save();
        return back();
         
        
    }
}
