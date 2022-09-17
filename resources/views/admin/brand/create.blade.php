@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card-header">
                <h3 class="text-primary my-2 ">Add Brands
                    <i class="mdi mdi-cart mx-2 my-5"></i>
                    <a href="{{ url('admin/brands/') }}" class="btn btn-danger btn-sm float-end">Back</a>
                    {{-- Revert category --}}
                </h3>
            </div>
            <div class="card-body bg-gray">
                <form action="{{ url('admin/brands') }}" method="POST">
                    @csrf
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="border border-primary p-5">
                        <div class="row mb-4">
                            <div class="col-md-6 mb-3 ">
                                <div class="form-outline">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" />
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 ">
                                <label class="form-label">Slug</label>
                                <input type="text" name="slug" class="form-control" />
                                @error('slug')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                        </div>
                        <div class="row mb-3">
                            <!-- Text input -->
                            <div class="col-md-12 mb-3  ">
                                <div class="form-group">
                                    <div class="form-check form-check-success">
                                        <input type="checkbox" name="status" class="form-check-input" />
                                        <label class="form-label">Status</label>
                                        <span class="text-primary mx-2 my-auto">Checked = Hidden || Unchecked = Visible</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-outline-primary btn-sm ">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
