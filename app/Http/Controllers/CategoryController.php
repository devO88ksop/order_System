<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

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
        
        $data = $this->requestCategoryData($request);
        $this->categoryValidationCheck($request);
        // dd($request->all());
        Category::create(['name' => $request->categoryName,]);
        return redirect()->route('category#list')->with(['createSuccess'=>' Category Created ....']);
    }   
    // delete category 
    public function  delete($id){
        Category::where('category_id',$id)->delete();   
        return back()->with(['deleteSuccess'=>' Category Deleted ....']);
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
    