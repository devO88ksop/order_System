<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    // direct category list Page
    public function list(){
        $categories = Category::orderBy('category_id','desc')->get();
        return view('admin.category.list',compact('categories'));
    
    }

     
    // direct category create page 
    
    public function createPage(){
        return view('admin.category.create');
    }

    // create category
    
    public function create(Request $request){
        $this->categoryValidationCheck($request);
        $data = $this->requestCategoryData($request);
        // dd($request->all());
        Category::create(['name' => $request->categoryName,]);
        return redirect()->route('category#list');
    }   

    // category validation check
    private function categoryValidationCheck($request){
        Validator::make($request->all(),[
            'categoryName' =>   'required | unique:categories,name'
        ])->validate();
    }

    // request category data
     private function requestCategoryData($request){
        return[
            'name' =>$request->categoryName
        ];
     }

}
