<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
// use App\Rules\FilterRule;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view("dashboard.pages.categories.index",compact("categories"));
    }
    public function create(){
        $category= new Category();
        return view("dashboard.pages.categories.create",compact("category"));
    }
    public function store(Request $request){

        $request->validate([
            "name"=> [
                'required',
                'max:20',
                'min:5',
                // 'between:5,20',
                'unique:categories,name',
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

        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return redirect(route('categories.index'))->with('success','Category Created Sucessfully');
    }
    public function edit($id){
        $category = Category::find($id);    
        return view("dashboard.pages.categories.edit",compact("category"));
    }
    public function update(Request $request, $id){
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        return redirect(route('categories.index'))->with('info','Category Updated Sucessfully');
    }
    public function destroy($id){
        $category = Category::find($id);
        $category->delete();
        return redirect(route('categories.index'))->with('danger','Category Deleted Sucessfully');
    }
}
