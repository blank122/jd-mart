<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddBrandRequest;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return view('admin.brand.index');
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(AddBrandRequest $request) //this is for another validation
    {
        
        $dataValidated = $request->validated();

        //create new object for category model
        $brand = new Brand; //same na silag porma sa api
        $brand->name = $dataValidated['name'];
        $brand->slug = Str::slug($dataValidated['slug']);

        
        $brand->status = $request->status == true ? '1' : '0';
        $brand->save(); //save the process
        
        return redirect('admin/brands')->with('message', 'Brand Added Successfully');
    }

    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', compact('brand'));
    }

    public function update(AddBrandRequest $request, $brand)
    {
        $dataValidation = $request->validated();

        $brand = Brand::findOrFail($brand);

        $brand->name = $dataValidation['name'];
        $brand->slug = Str::slug($dataValidation['slug']);
        $brand->status = $request->status == true ? '1' : '0';
        $brand->update();
        return redirect('admin/brands')->with('message', 'Brand Updated Successfully');
        
    }

}
