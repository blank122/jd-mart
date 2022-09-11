
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}

    <div class="row">
        <div class="col-md-12">
            <div class="card-header">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{session()-> get('message')}}
                </div>
                @endif
    
                <h3>Category
                    <a href="{{ url('admin/category/create') }}" class ="btn btn-outline-success btn-sm float-end">Add Category</a> {{--add category--}}
                </h3>
            </div>
            <div class="card-body bg-gray">
                <h1>hello</h1>
            </div>
        </div>
    </div>
