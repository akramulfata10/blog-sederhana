<div wire:ignore.self class="modal fade" id="addSantriModal" tabindex="-1" aria-labelledby="addSantriModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSantriModal">Add Santri</h5>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="storeSantris">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Santri Name</label>
                        <input type="text" wire:model.defer="name" class="form-control" />
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Santri Slug</label>
                        <input type="text" wire:model.defer="slug" class="form-control" />
                        @error('slug')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" wire:model.defer="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">tanggal Lahir</label>
                        <input type="date" wire:model.defer="tanggal_lahir" class="form-control">
                        @error('tanggal_lahir')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Tempat Lahir</label>
                        <input type="text" wire:model.defer="tempat_lahir" class="form-control">
                        @error('tempat_lahir')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Alamat</label>
                        <textarea wire:model.defer="alamat" id="" cols="30" rows="3" class="form-control"></textarea>
                        @error('alamat')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div class="mb-3"> --}}
                    {{-- @if ($image->temporaryUrl() !== null)
                            <img src="{{ $image->temporaryUrl() }}">
                        @endif --}}
                    {{-- <label class="form-label">Upload Gambar</label> --}}
                    {{-- <img class="img-preview img-fluid mb-3 col-sm-5" /> --}}
                    {{-- <input type="file" class="form-control" wire:model.defer="image">
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror --}}
                    {{-- </div> --}}
                    <div class="mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" wire:model.defer="status"> checked=aktif, non-checked=non-aktif
                        @error('status')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="closeModal" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Santri</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="editSantriModal" tabindex="-1" aria-labelledby="editSantriModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSantriModal">Edit Santri</h5>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div wire:loading class="p-2 text-center mb-1">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden"></span>
                </div>
                Loading...
            </div>
            <div wire:loading.remove>
                <form wire:submit.prevent="editSantris">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="">Santri Name</label>
                            <input type="text" wire:model.defer="name" class="form-control" />
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Santri Slug</label>
                            <input type="text" wire:model.defer="slug" class="form-control" />
                            @error('slug')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" wire:model.defer="category_id">
                                @foreach ($categories as $category)
                                    @if (old('category_id') == $category->id)
                                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                    @else
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">tanggal Lahir</label>
                            <input type="date" wire:model.defer="tanggal_lahir" class="form-control">
                            @error('tanggal_lahir')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Tempat Lahir</label>
                            <input type="text" wire:model.defer="tempat_lahir" class="form-control">
                            @error('tempat_lahir')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Alamat</label>
                            <textarea wire:model.defer="alamat" id="" cols="30" rows="3" class="form-control"></textarea>
                            @error('alamat')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="mb-3">
                        @if ($image)
                            Photo Preview:
                            <img src="{{ $isUploaded ? $image->temporaryUrl() : asset('storage/' . $image) }}"
                                width="250" height="300">
                        @endif
                        <br>
                        <label for="">Upload Baru</label>
                        <input type="file" wire:modal.defer="isUploaded" class="form-control">
                    </div> --}}
                        <div class="mb-3">
                            <label for="">Status</label>
                            <input type="checkbox" wire:model.defer="status"> checked=aktif, non-checked=non-aktif
                            @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModal" class="btn btn-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit
                            Santri</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="deleteSantriModal" tabindex="-1"
    aria-labelledby="deleteSantriModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteSantriLabel">Delete Santri</h5>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div wire:loading class="p-2 text-center mb-1">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden"></span>
                </div>
                Loading...
            </div>
            <div wire:loading.remove>
                <form wire:submit.prevent="destroySantris()">
                    <div class="modal-body">
                        <h6>you are sure to delete data ini ?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Yes. Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
