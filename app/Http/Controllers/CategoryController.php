<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
       public function categoryPage()
    {
        $categories=Category::all();
        return view('Dashboard.Category.category',compact('categories'));
    }

    public function categoryAdd()
    {
        return view('Dashboard.Category.add');
    }

     public function categoryEdit($id)
    {
        $category=Category::findOrFail($id);
        return view('Dashboard.Category.edit',compact('category'));
    }


    public function categoryUpdate()
    {
        return view('Dashboard.Category.update');
    }
    public function categoryUpdateValidate(Request $request,$id)
    {
        $category=Category::findOrFail($id);
           $request->validate(
        ['category_name' => "required|unique:category_files,name,{$category->id}" ],
        ['category_name.required'=>"Category name is required",
        'category_name.unique'=>"Category alreday registered enter new one"]
       );
       $category->name=$request->input('category_name');
       $category->save();

       return redirect()->route('category')->with('success','Category Updated Successfully');


    }


   public function categoryDelete($id)
   {
    $category=Category::findOrFail($id);
    $category->delete();
    return redirect()->route('category')->with('success',"Data Removed Successfully");
   // return view('Dashboard.Category.delete');
   }
   


    public function validateCategoryAddPage(Request $request)
    {
       $request->validate(
        ['category_name'=>"required|unique:category_files,name"],
        ['category_name.required'=>"Category name is required",
        'category_name.unique'=>"Category alreday registered enter new one"]
       );

      Category::create([
        'name'=>$request->category_name
        
       ]);

      
          return redirect()->route('category')->with('success', "Successfully added Category");
       

    }
}
