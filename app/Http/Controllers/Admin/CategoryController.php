<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;
use App\Http\Requests\AddCategoryFormRequest;


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

        //create new object for category model
        $category = new Category; //same na silag porma sa api
        $category->name = $dataValidated['name'];
        $category->slug = Str::slug($dataValidated['slug']);
        $category->product_description = $dataValidated['product_description'];

        if ($request->hasFile('image')) { //process the image in order to store it into the database
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension(); //get the user file extension
            $filename = time().'.'.$ext; //create new file name

            $file->move('uploads/category/',$filename); //store the image into uploads folder
            $category->image = $filename;
        }
        $category->status = $request->status == true ? '1' : '0';
        $category->save(); //save the process

        return redirect('admin/category')->with('message', 'Category Added Successfully');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(AddCategoryFormRequest $request, $category)
    {
        $dataValidated = $request->validated();

        $category = Category::findOrFail($category);

        //create new object for category model
        $category->name = $dataValidated['name'];
        $category->slug = Str::slug($dataValidated['slug']);
        $category->product_description = $dataValidated['product_description'];

        if ($request->hasFile('image')) { //process the image in order to store it into the database
            
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension(); //get the user file extension
            $filename = time().'.'.$ext; //create new file name

            $file->move('uploads/category/',$filename); //store the image into uploads folder
            $category->image = $filename;
        }
        $category->status = $request->status == true ? '1' : '0';
        $category->update(); //update the process

        return redirect('admin/category')->with('message', 'Category Updated Successfully');
    }
} 
