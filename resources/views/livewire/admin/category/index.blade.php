{{-- If your happiness depends on money, you will never be happy with yourself. --}}

<div class="row">
    <div class="col-md-12">
        <div class="card-header">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif

            <h3>Category
                <a href="{{ url('admin/category/create') }}" class="btn btn-outline-success btn-sm float-end">Add
                    Category</a> {{-- add category --}}
            </h3>
        </div>
        <div class="card-body bg-gray">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category_item)
                        <tr>
                            <td>{{ $category_item->id }}</td>
                            <td>{{ $category_item->name }}</td>
                            <td>{{ $category_item->status == '1' ? 'Hidden' : 'Visible' }}</td>
                            <td>
                                <a href="" class="btn btn-success">Edit</a>
                                <a href="" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div>
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>
