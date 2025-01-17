<div>
    {{-- start header  --}}
    <div class="mb-3 ">
        <x-alert />
        <div wire:loading class="wireload">
            <x-loading />
        </div>
        <x-list-header total="{{ $rooms->total() }}">
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
            @can('Hospital Room Add')
                <a class="btn btn-primary" href="{{ route('hospital-room.create') }}">
                    <i class="mdi mdi-plus"></i> Add Room
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
                            <th >Branch</th>
                            <th >Building</th>
                            <th >Name</th>
                            <th >Room Type</th>
                            <th >Room no</th>
                            <th >Phone</th>
                            <th >Details</th>
                            <th  >Status</th>
                            <th  >Action</th>
                        </tr>
                    </x-thead>
                    <x-tbody>
                        @foreach ($rooms as $room)
                            <tr>
                                <td scope="row">{{ $rooms->firstItem() + $loop->index }}</td>
                                <td>{{ $room->branch?->name }}</td>
                                <td>{{ $room->building?->name }}</td>
                                <td>{{ $room->name }}</td>
                                <td>{{ $room->roomType?->name }}</td>
                                <td>{{ $room->room_no }}</td>
                                <td>{{ $room->phone }}</td>
                                <td>{{ $room->details }}</td>
                                <td><x-status :status="$room->status" /></td>
                                <td>
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            @can('Hospital Room View')
                                            <li>
                                                <a href="{{ route('hospital-room.show', $room->id) }}" class="dropdown-item">
                                                    <i class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                    View
                                                </a>
                                            </li>
                                            @endcan
                                            @can('Hospital Room Edit')
                                            <li>
                                                <a href="{{ route('hospital-room.edit', $room->id) }}"
                                                    class="dropdown-item edit-item-btn">
                                                    <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                    Edit
                                                </a>
                                            </li>
                                            @endcan
                                            @can('Hospital Room Delete')
                                            <li>
                                                <a type="button" class="dropdown-item remove-item-btn"
                                                    wire:click='$dispatch("delete_resource",{{ $room->id }})'>
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
        {{ $rooms->links() }}
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
