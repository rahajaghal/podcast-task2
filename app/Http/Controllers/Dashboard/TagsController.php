<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
        public function index(){
        $tags = Tag::all();
        return view("dashboard.pages.tags.index",compact("tags"));
    }
    public function create(){
        $tag= new Tag();
        return view("dashboard.pages.tags.create",compact("tag"));
    }
    public function store(Request $request){

        $request->validate([
            "name"=> [
                'required',
                'max:20',
                'min:5',
                // 'between:5,20',
                'unique:tags,name',
                // function($attribute,$value,$fail){
                //     if($value == 'bar'){
                //     $fail('bar is not allowed');
                //     }
                // }
                // new FilterRule(),
                // 'filter',
            ],
            // "name"=> "required",
        
            // 'description'=>'required',
        ]);

        $tag = new Tag();
        $tag->name = $request->name;
        $tag->save();
        return redirect(route('tags.index'))->with('success','Tag Created Sucessfully');
    }
    public function edit($id){
        $tag = Tag::find($id);    
        return view("dashboard.pages.tags.edit",compact("tag"));
    }
    public function update(Request $request, $id){
        $tag = Tag::find($id);
        $tag->name = $request->name;
        $tag->save();
        return redirect(route('tags.index'))->with('info','Tag Updated Sucessfully');
    }
    public function destroy($id){
        $tag = Tag::find($id);
        $tag->delete();
        return redirect(route('tags.index'))->with('danger','Tag Deleted Sucessfully');
    }
}
