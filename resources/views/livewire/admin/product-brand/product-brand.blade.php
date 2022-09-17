<div>
    {{-- Do your work, then step back. --}}

    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="">

        <div wire:ignore.self class="modal fade" id="deleteDataModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Brand</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent="destroy">
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

        <div class="col-md-12">

            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif

            <div class="card-header">
                <h3 class="fs-2 text-primary">Brands
                    <span>
                        <i class="mdi mdi-message-alert menu-icon"></i>
                    </span>
                    <a href="{{ url('admin/brands/create') }}" class="btn btn-outline-primary btn-sm float-end my-2">Add
                        Brand</a>
                </h3>
            </div>
            <div class="card-body shadow p-3 mb-5 bg-body rounded mt-3">
                <table class="table table-hover table-bordered table-striped">
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
                        @foreach ($brands as $brand)
                            <tr>
                                <td>{{ $brand->id }}</td>
                                <td class="letter-spaced">{{ $brand->name }}</td>
                                <td class="letter-spaced">{{ $brand->slug }}</td>
                                <td class="letter-spaced">{{ $brand->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                <td class="">
                                    <a href="{{ url('admin/brands/' . $brand->id . '/edit') }}"
                                        class="btn btn-outline-success my-2">Update</a>
                                    <a href="#" wire:click="delete({{ $brand->id }})"
                                        class="btn btn-outline-danger my-2" data-bs-toggle="modal"
                                        data-bs-target="#deleteDataModal">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $brands->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#deleteDataModal').modal('hide');
        });
    </script>
@endpush
