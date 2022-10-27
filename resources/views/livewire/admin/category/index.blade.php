<div>
    @include('livewire.admin.category.add-modal')
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3">
            <div class="card">
                @if (session('message'))
                    <h2 class="alert alert-success alert-dismissible fade show">
                        {{ session('message') }}</h2>
                @endif
                <h4 class="mt-1 p-2">Category List
                    <button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal"
                        data-bs-target="#addCategoryModal">
                        Add Category
                    </button>
                </h4>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->status == '1' ? 'aktif' : 'non-aktif' }}</td>
                                    <td>
                                        <a href="" wire:click="updateCategory({{ $category->id }})"
                                            data-bs-toggle="modal" data-bs-target="#updateCategories"
                                            class="btn btn-warning">edit</a>
                                        <a data-bs-toggle="modal" data-bs-target="#deleteCategories"
                                            wire:click="deleteCategory({{ $category->id }})" href=""
                                            class="btn btn-danger">hapus</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">Brands Not Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mb-3 mt-3">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#addCategoryModal').modal('hide');
            $('#updateCategories').modal('hide');
            $('#deleteCategories').modal('hide');
        });

        $(document).ready(function() {
            $(".alert-dismissible").fadeIn().delay(5000).fadeOut();
        });
    </script>
@endpush
