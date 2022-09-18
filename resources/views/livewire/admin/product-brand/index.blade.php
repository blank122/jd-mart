{{-- The best athlete wants his opponent at his best. --}}
{{-- If your happiness depends on money, you will never be happy with yourself. --}}

<!-- Modal -->
<div>
    <div wire:ignore.self class="modal fade" id="deleteDataModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="destroyCategory">

                    <div class="modal-body">
                        <h6>Are you sure you want to delete this data?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card-header">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif

                <h3>Brand
                    <a href="{{ url('admin/product-brand/create') }}" class="btn btn-outline-success btn-sm float-end">
                        Add Brand
                    </a> {{-- add category --}}
                </h3>
            </div>
            <div class="card-body bg-gray">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Brand Name</th>
                            <th>Brand Slug</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product_brands as $product_brand_item)
                            <tr>
                                <td>{{ $product_brand_item->id }}</td>
                                <td>{{ $product_brand_item->name }}</td>
                                <td>{{ $product_brand_item->slug }}</td>
                                <td>{{ $product_brand_item->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                <td>
                                    <a href="{{ url('admin/category/' . $product_brand_item->id . '/edit ') }}"
                                        class="btn btn-success my-sm-2">Edit</a>
                                    <a href="#" wire:click="deleteCategory({{ $product_brand_item->id }})"
                                        class="btn btn-danger my-sm-2" data-bs-toggle="modal"
                                        data-bs-target="#deleteDataModal">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div>
                    {{ $product_brands->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener('close-modal', event => {
            $('#deleteDataModal').modal('hide');
        });
    </script>
@endpush
