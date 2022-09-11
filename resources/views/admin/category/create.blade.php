@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card-header">
                <h3 class="text-success">Add New Categories
                    <a href="{{ url('admin/category/') }}" class="btn btn-success btn-sm float-end">Back</a>
                    {{-- Revert category --}}
                </h3>
            </div>
            <div class="card-body bg-gray">
                <form action="{{ url('admin/category') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="border border-primary p-5">
                        <div class="row mb-4">
                            <div class="col-md-6 mb-3 ">
                                <div class="form-outline">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" />
                                    @error('name') <small class="text-danger">{{$message}}</small>@enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 ">                   
                                    <label class="form-label">Slug</label>
                                    <input type="text" name="slug" class="form-control" /> 
                                    @error('slug') <small class="text-danger">{{$message}}</small>@enderror
                               
                            </div>
                        </div>

                        <!-- Text input -->
                        <div class="col-md-12 mb-3 ">
                            <label class="form-label">Product Description</label>
                            <textarea name="product_description" class="form-control" rows="3"></textarea>
                            @error('product_description') <small class="text-danger">{{$message}}</small>@enderror

                        </div>
                        <div class="row mb-3">
                        <!-- Text input -->
                            <div class="col-md-6 mb-3  ">
                                <label class="form-label">Image</label>
                                <input type="file" name="image" class="form-control" /> 
                                @error('image') <small class="text-danger">{{$message}}</small>@enderror
                          
                            </div>
                            <div class="col-md-6 mb-3  ">
                                <label class="form-label">Status</label>
                                <input type="checkbox" name="status"/>                           
                            </div>
                        </div> 
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-outline-primary btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
