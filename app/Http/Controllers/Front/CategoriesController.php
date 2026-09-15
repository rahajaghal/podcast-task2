<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view("front.pages.categories.index",compact("categories"));
    }
    public function selectUserContents(Request $request)
{
    $request->validate([
        'categoriesIds' => ['required', 'array', 'min:1'],
        'categoriesIds.*' => ['integer', 'exists:categories,id'],
    ]);

    $user = Auth::user();

    $user->categories()->sync($request->categoriesIds);

    return redirect()
        ->route('dashboard')
        ->with('success', 'Your favorite categories have been saved successfully.');
}
}
