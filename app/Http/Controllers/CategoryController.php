<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\category;


// BCS3453 [PROJECT]-SEMESTER 2324/1
// Student ID: CB21134
// Student Name: Yattish A/L Jaya Nanda Kumar

class CategoryController extends Controller
{

    public function viewCategoryList(){
        $category = category::all();
        return view('category', ['categoryList' => $category]);
    }   
    
    public function store(){
        $category = new category();
        $category->categoryName = request('categoryName');
        $category->categoryType = request('categoryType');
        $category->categoryAmount = request('categoryAmount');
        $category->save();
        return redirect()->route('category');
    }

    public function fetch($id){
        $category = category::where('id', $id)->first();
        return view('editCategory', ['category' => $category]);
    }

    public function update($id){
        $category = category::where('id', $id)->first();
        $category->categoryName = request('categoryName');
        $category->categoryType = request('categoryType');
        $category->save();
        return redirect()->route('category');
    }
    public function destroy($id){
        $category = category::where('id', $id)->first();
        $category->delete();
        return redirect()->route('category');
    }
    
}
