<div wire:ignore.self class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="storeCategory()">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Category Name</label>
                        <input type="text" wire:model.defer="name" class="form-control" />
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Category Slug</label>
                        <input type="text" wire:model.defer="slug" class="form-control" />
                        @error('slug')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Status </label> <br>
                        <input type="checkbox" wire:model.defer="status" /> chacked=hidden ,un-checked=visible
                        @error('status')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="closeModal" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Category</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div wire:ignore.self class="modal fade" id="updateCategories" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
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
                <form wire:submit.prevent="editCategory()">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="">Category Name</label>
                            <input type="text" wire:model.defer="name" class="form-control" />
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Category Slug</label>
                            <input type="text" wire:model.defer="slug" class="form-control" />
                            @error('slug')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Status </label> <br>
                            <input type="checkbox" wire:model.defer="status" />
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModal" class="btn btn-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div wire:ignore.self class="modal fade" id="deleteCategories" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
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
                <form wire:submit.prevent="destroyBrands()">
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
