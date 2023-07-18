<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class CategoryController extends Controller
{
    public function GetCategories(){
        return view('categories.list-categories');
    }

    public function CreateCategory(Request $request){
        $rules = [
            'category_name' =>'required'
        ];
        $message = [
            'required' => ':attribute alan zorunludur'
        ];

        $attribute=[
            'category_name' => 'Kategori'
        ];

        $request->validate($rules,$message,$attribute);

        $category = new Category();

        $category->name=$request->category_name;
        $category->save();
        return redirect(route('get-categories'));
    }

    //sadece bir kategorinin bilgilerini getirir.

    public function GetCategory($category_id){
        $category = Category::find($category_id); //b where ile aynı işlevi görür ve aynı zamanda ORM yapısına girer
        return view('categories.category',compact('category'));
        }
}
