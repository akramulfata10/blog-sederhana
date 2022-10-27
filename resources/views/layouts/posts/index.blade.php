@extends('layouts.master')
@section('content')
    {{-- @include('livewire.admin.category.add-modal') --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-3">
                <div class="card">
                    @if (session('message'))
                        <h2 class="alert alert-success alert-dismissible fade show mb-3">
                            {{ session('message') }}</h2>
                    @endif
                    <h4 class="mt-1 p-2">Post List
                        {{-- <button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal"
                            data-bs-target="#addCategoryModal">
                            Add Post
                        </button> --}}

                        <a href="{{ url('admin/posts/create') }}" class="btn btn-primary btn-sm float-end">Add Post</a>
                    </h4>
                    <div class="card-body">
                        <div class="table-responsive-md">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Slug</th>
                                        <th scope="col">Body</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($posts as $post)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $post->name }}</td>
                                            <td>{{ $post->slug }}</td>
                                            <td>{!! $post->body !!}</td>
                                            <td><img src="{{ $post->getFirstMediaUrl('images') }}" class="w-25 h-25">
                                            </td>
                                            <td>
                                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                    <a href="{{ url('admin/posts/' . $post->id . '/edit') }}"
                                                        class="btn btn-warning btn-sm">Edit</a>

                                                    <form action="{{ url('admin/posts/' . $post->id) }}" method="POST"
                                                        class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are You Sure?')"> <span
                                                                data-feather="x-circle">Hapus</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6">Brands Not Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{-- <div class="mb-3 mt-3">
                        {{ $categories->links() }}
                    </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $(".alert-dismissible").fadeIn().delay(5000).fadeOut();
        });
    </script>
@endpush


@push('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: '{{ route('image.upload') . '?_token=' . csrf_token() }}',
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
