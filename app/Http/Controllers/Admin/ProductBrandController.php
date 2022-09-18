<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductBrandRequest;
use App\Models\ProductBrand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductBrandController extends Controller
{
    //
    public function index()
    {
        return view('admin.product-brand.index');
    }

    public function create()
    {
        return view('admin.product-brand.create');
    }


    public function store(AddProductBrandRequest $request) //this is for another validation
    {
        $dataValidated = $request->validated();
        //create new object for category model
        $product_brand = new ProductBrand; //same na silag porma sa api
        $product_brand->name = $dataValidated['name'];
        $product_brand->slug = Str::slug($dataValidated['slug']);
        $product_brand->status = $request->status == true ? '1' : '0';
        $product_brand->save(); //save the process

        return redirect('admin/product-brands')->with('message', 'Brand Added Successfully');
    }

    public function edit(ProductBrand $product_brand)
    {
        return view('admin.product-brand.edit', compact('product_brand'));
    }

    public function update(AddProductBrandRequest $request, $product_brand)
    {
        $dataValidated = $request->validated();

        $product_brand = ProductBrand::findOrFail($product_brand);

        //create new object for category model
        $product_brand->name = $dataValidated['name'];
        $product_brand->slug = Str::slug($dataValidated['slug']);
        $product_brand->status = $request->status == true ? '1' : '0';
        $product_brand->update(); //update the process
        return redirect('admin/category')->with('message', 'Brand Updated Successfully');
    }
} 

