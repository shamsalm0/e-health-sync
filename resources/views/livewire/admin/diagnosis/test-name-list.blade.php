<div>
    {{-- start header  --}}
    <div class="mb-3 ">
        <x-alert />
        <div wire:loading class="wireload">
            <x-loading />
        </div>
        <x-list-header total="{{ $test_names->total() }}">
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
            @can('Test Name Add')
                <a class="btn btn-primary" href="{{ route('test-name.create') }}">
                    <i class="mdi mdi-plus"></i> Add Test Name
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
                    <input type="text" wire:model.live='search' class="form-control" placeholder="Search">
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
                            <th>Group Name</th>
                            <th>Department</th>
                            <th>Lab Room</th>
                            <th>Sample Room</th>
                            <th>Cost</th>
                            <th>Delivery Time</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </x-thead>
                    <x-tbody>
                        @foreach ($test_names as $test_name)
                            <tr>
                                <td scope="row">{{ $test_names->firstItem() + $loop->index }}</td>
                                <td>{{ $test_name->name }}</td>
                                <td>{{ $test_name->testGroup?->name }}</td>
                                <td>{{ $test_name->department?->name }}</td>
                                <td>{{ $test_name->labRoom?->name }}</td>
                                <td>{{ $test_name->sample_room_id }}</td>
                                <td>{{ $test_name->cost }}</td>
                                <td>{{ $test_name->delivery_time }}</td>
                                <td><x-status :status="$test_name->status" /></td>
                                <td>
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            @can('Test Name View')
                                                <li>
                                                    <a href="{{ route('test-name.show', $test_name->id) }}"
                                                        class="dropdown-item">
                                                        <i class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                        View
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('Test Name Edit')
                                                <li>
                                                    <a href="{{ route('test-name.edit', $test_name->id) }}"
                                                        class="dropdown-item edit-item-btn">
                                                        <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                        Edit
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('Test Name Delete')
                                                <li>
                                                    <a type="button" class="dropdown-item remove-item-btn"
                                                        wire:click='$dispatch("delete_resource",{{ $test_name->id }})'>
                                                        <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                        Delete
                                                    </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </x-tbody>
                </x-table>
            </div>
        </div>
        {{ $test_names->links() }}
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
