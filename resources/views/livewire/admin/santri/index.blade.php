<div>
    @include('livewire.admin.santri.addSantri-modal')
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3">
            <div class="card">
                @if (session('message'))
                    <h2 class="alert alert-success alert-dismissible fade show">
                        {{ session('message') }}</h2>
                @endif
                <h4 class="mt-1 p-2">Santri List
                    <button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal"
                        data-bs-target="#addSantriModal">
                        Add Santri
                    </button>
                </h4>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr align="center">
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Tempat Lahir</th>
                                <th scope="col">Tanggal Lahir</th>

                                <th scope="col">Status</th>
                                {{-- <th scope="col">Foto</th> --}}
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($santris as $santri)
                                <tr align="center">
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $santri->name }}</td>
                                    <td>{{ $santri->slug }}</td>
                                    <td>{{ $santri->category->name }}</td>
                                    <td>{{ $santri->tempat_lahir }}</td>
                                    <td>{{ $santri->tanggal_lahir }}</td>
                                    <td>{{ $santri->status == '1' ? 'aktif' : 'non-aktif' }}</td>
                                    {{-- <td><img src="{{ asset('storage') }}/{{ $santri->image }}"
                                            class="img-fluid w-25 h-25" />
                                    </td> --}}
                                    <td>
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button type="button" wire:click="updateSantri({{ $santri->id }})"
                                                class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editSantriModal">
                                                Edit
                                            </button>
                                            <button type="button" wire:click="deleteSantri({{ $santri->id }})"
                                                class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#deleteSantriModal">
                                                Delete
                                            </button>
                                        </div>
                                        {{-- data-bs-target="#editSantriModal"
                                                class="btn btn-warning me-md-2" --}}
                                        {{-- wire:click="updateSantri({{ $santri->id }})" --}}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7"
                                        class="alert alert-danger text-center border-0 bg-danger mt-2 p-1 mb-3">Brands
                                        Not Found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mb-3 mt-3">
                        {{ $santris->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#addSantriModal').modal('hide');
            $('#editSantriModal').modal('hide');
            $('#deleteSantriModal').modal('hide');
        });

        $(document).ready(function() {
            $(".alert-dismissible").fadeIn().delay(5000).fadeOut();
        });
    </script>
@endpush
