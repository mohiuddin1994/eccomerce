<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Http\Request;

class colorController extends Controller
{
    //
    public function index()
    {
        $colors = Color::with('size')->get();
        // return $colors;
        return view('admin.color.color_index',compact('colors'));
    }

      // category store route 
      public function store(Request $request){
        $validated = $request->validate([
            'color_name' => 'required',
             
        ]);
    
        if($request->color_id){
            $validated = $request->validate([
                'color_name' => 'required',
                 
            ]);

            $size = new Size();
            $size->color_id = $request->color_id;
            $size->size_name = $request->color_name;
            $size->save();
            return back()->with('success','successfully add  Size  ');
        }
        $color = new Color();
        $color->color_name = $request->color_name;
        $color->save();
        return back()->with('success','successfully add color ');
    }



    // category edit rotue 
    public function edit($id){
        $color = Color::where('id',$id)->first();
        return view('admin.color.color_edit',compact('color'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'color_name' => 'required',
             
        ]);
        $color = Color::where('id',$id)->first();
        $color->color_name = $request->color_name;
        $color->save();
        return back()->with('success','successfully update  color ');
    }
    // category destroy rotue 
    public function destroy($id){

        $color = Color::where('id',$id)->first()->delete();
        $sizes = Size::where('color_id',$id)->get();
        foreach($sizes as $item){
            $item->delete();
        }
        return back()->with('success','delete success');
    }

}
