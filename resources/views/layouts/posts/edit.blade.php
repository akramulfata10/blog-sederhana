@extends('layouts.master')

@section('content')
    <div class="card mt-2 p-2 m-1">
        <h5 class="card-header">Edit Post</h5>
        <div class="card-body">
            <form action="{{ url('admin/posts/' . $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="">Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $post->name }}">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" id="slug" name="slug" class="form-control" value="{{ $post->slug }}">
                    @error('slug')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- <div class="mb-3">
                    <label for="">Body</label>
                    <textarea name="body" id="body" class="form-control"cols="30" rows="10"> {{ $post->body }}</textarea>
                    @error('body')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div> --}}
                <div class="mb-3">
                    <label class="block">
                        <label class="">Post Description</label>
                        <textarea id="editor" class="block w-full mt-1 rounded-md" name="body" rows="3">{!! html_entity_decode($post->body) !!}</textarea>
                    </label>
                    @error('body')
                        <div class="text-sm text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    {{-- Gambar lama :
                    <br>
                    <img src="{{ $post->getFirstMediaUrl('images', 'thumb') }}" class="w-25 h-25">
                    <br> --}}
                    <label for="">Upload Baru image</label>
                    <input type="file" id="image" name="image" class="form-control">
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary float-end">edit Posts</button>
            </form>
        </div>
    </div>
@endsection

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
