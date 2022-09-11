<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddCategoryFormRequest;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // 
    public function index()
    {
        return view('admin.category.index');
    }

    public function create()
    {
        return view('admin.category.create');
    }

    
    public function store(AddCategoryFormRequest $request) //this is for another validation
    {
        $dataValidated = $request->validated();

        //create new object for category controller
        $categoryController = new Category; //same na silag porma sa api
        $categoryController->name = $dataValidated['name'];
        $categoryController->slug = Str::slug($dataValidated['slug']);
        $categoryController->product_description = $dataValidated['product_description'];

        if($request->hasFile('image')){//process the image in order to store it into the database
            $file = $request->file('image');

            $file_extension = $file->getClientOriginalExtension(); //get the user file extension
            $filename = time().'.'.$file_extension; //create new file name

            $file->move('uploads/category/', $filename);//store the image into uploads folder

            $categoryController->image = $filename;
        }
        $categoryController->image = $dataValidated['image'];

        $categoryController->status = $request->status == true? '1' : '0' ;
        $categoryController->save();//save the process

        return redirect('admin/category')->with('message', 'Category Added Successfully');




    }
    
}
