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

        $categories = Category::when(request('key'),function($query){
                            $query->where('name','like','%'.request('key').'%');
                             })
                            ->orderBy('category_id','desc')
                            ->paginate(3);

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
    // edit category 
    public function edit($id){
        $category = Category::where('category_id',$id)->first();
        return view('admin.category.edit',compact('category'));
    }
    // update Page 
    public function update($id,Request $request){

        $this->categoryValidationCheck($request);
        $data = $this->requestCategoryData($request);
        Category::where('category_id',$id)->update($data);
        return redirect()->route('category#list');

    }

    // category validation  check

        private function categoryValidationCheck($request){ 
        Validator::make($request->all(),[
            'categoryName' =>   'required | unique:categories,name | min:5'
        ])->validate();
    }

    // request category data
     private function requestCategoryData($request){
        return[
            'name' =>$request->categoryName
        ];
     }

}
    