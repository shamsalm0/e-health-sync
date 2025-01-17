<div>
    {{-- start header  --}}
    <div class="mb-3 ">
        <x-alert />
        <div wire:loading class="wireload">
            <x-loading />
        </div>
        <x-list-header total="{{ $otherServices->total() }}">
            <button type="button"
                wire:click="@if ($filter) $set('filter', false) @else $set('filter', true) @endif"
                class="btn btn-soft-secondary btn-border">
                @if ($filter)
                    <i class="mdi mdi-filter-off-outline"></i>
                @else
                    <i class="mdi mdi-filter-outline"></i>
                @endif
                Filter
            </button>
            @can('Other Service Add')
                <a class="btn btn-primary" href="{{ route('other-service.create') }}">
                    <i class="mdi mdi-plus"></i> Add Other Service
                </a>
            @endcan
        </x-list-header>

        <div class="@if (!$filter) d-none @endif">
            <x-search-row>
                <div wire:ignore>
                    <label for="" class="search-label">Status</label>
                    <select class="form-select " id="selectStatus">
                        <option value="">Select</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <div>
                    <label for="" class="search-label">Search</label>
                    <input type="text" wire:model.live='search' class="form-control" placeholder="Search by Name">
                </div>
            </x-search-row>
        </div>

    </div>
    {{-- end header  --}}

    <div class="">
        <div class="card mb-3">
            <div class="card-body">
                <x-table>
                    <x-thead>
                        <tr>
                            <th>Sl. No.</th>
							<th>Name</th>
							<th>Price</th>
							<th>Service Id</th>
							<th>Description</th>
							<th>Doctor Status</th>
							<th>Nurse Status</th>
							<th>Word Boy Status</th>
							<th>Status</th>
                            <th>Action</th>
                        </tr>
                    </x-thead>
                    <x-tbody>
                        @foreach ($otherServices as $otherService)
                            <tr>
                                <td scope="row">{{ $otherServices->firstItem() + $loop->index }}</td>
								<td>{{ $otherService->name }}</td>
								<td>{{ $otherService->price }}</td>
								<td>{{ $otherService->discountServices?->service_name }}</td>
								<td>{{ $otherService->description }}</td>
								<td>{{ $otherService->doctor_status ? 'Include' : 'Not Include' }}</td>
								<td>{{ $otherService->nurse_status ? 'Include' : 'Not Include' }}</td>
								<td>{{ $otherService->word_boy_status ? 'Include' : 'Not Include' }}</td>
								<td><x-status :status="$otherService->status" /></td>
                                <td>
                                    @canany(['Other Service View', 'Other Service Edit', 'Other Service Delete'])
                                        <div class="dropdown d-inline-block">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                @can('Other Service View')
                                                    <li>
                                                        <a href="{{route('other-service.show', $otherService->id)}}" class="dropdown-item">
                                                            <i class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                            View
                                                        </a>
                                                    </li>
                                                @endcan
                                                @can('Other Service Edit')
                                                    <li>
                                                        <a href="{{route('other-service.edit', $otherService->id)}}" class="dropdown-item edit-item-btn">
                                                            <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                            Edit
                                                        </a>
                                                    </li>
                                                @endcan
                                                @can('Other Service Delete')
                                                    <li>
                                                        <a type="button" class="dropdown-item remove-item-btn"
                                                            wire:click='$dispatch("delete_resource",{{ $otherService->id }})'>
                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                            Delete
                                                        </a>
                                                    </li>
                                                @endcan
                                            </ul>
                                        </div>
                                    @endcanany
                                </td>
                            </tr>
                        @endforeach
                    </x-tbody>
                </x-table>
            </div>
        </div>
        {{ $otherServices->links() }}
    </div>

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('delete_resource', (id) => {
                Swal.fire({
                    title: 'Are You Sure?',
                    html: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                }).then((result) => {
                    if (result.value) {
                        @this.call('delete', id)
                    }
                });
            });
        });
    </script>
</div>

@script
    <script>
        $(document).ready(function() {
            $('#selectStatus').select2();
            // Listen for change and update the Livewire property
            $('#selectStatus').on('change', function(e) {
                $wire.$set('status', e.target.value);
            });
        });

        // Reinitialize Select2 after Livewire updates
        document.addEventListener('livewire:load', function() {
            //
        });
    </script>
@endscript
