<div>
    {{-- start header  --}}
    <div class="mb-3 ">
        <x-alert />
        <div wire:loading class="wireload">
            <x-loading />
        </div>
        <x-list-header total="{{ $resources->total() }}">
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
            @can('Resource Add')
            <a class="btn btn-primary" href="{{ route('resource.create') }}">
                <i class="mdi mdi-plus"></i> Add Resource
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
                            <th>Branch Name</th>
                            <th>Resource Type</th>
                            <th>Name</th>
                            <th>Father</th>
                            <th>Mother</th>
                            <th>Dob</th>
                            <th>Personal Mobile</th>
                            <th>Mobile</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Nid</th>
                            <th>Gender</th>
                            <th>C District</th>
                            <th>C Upazila</th>
                            <th>C Address</th>
                            <th>P District</th>
                            <th>P Upazila</th>
                            <th>P Address</th>
                            <th>Blood Group</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </x-thead>
                    <x-tbody>
                        @foreach ($resources as $resource)
                            <tr>
                                <td scope="row">{{ $resources->firstItem() + $loop->index }}</td>
                                <td>{{ $resource->branch?->name }}</td>
                                <td>{{ $resource->resource_type }}</td>
                                <td>{{ $resource->name }}</td>
                                <td>{{ $resource->father }}</td>
                                <td>{{ $resource->mother }}</td>
                                <td>{{ $resource->dob }}</td>
                                <td>{{ $resource->personal_mobile }}</td>
                                <td>{{ $resource->mobile }}</td>
                                <td>{{ $resource->phone }}</td>
                                <td>{{ $resource->email }}</td>
                                <td>{{ $resource->nid }}</td>
                                <td>{{ $resource->gender?->name }}</td>
                                <td>{{ $resource->c_district_id }}</td>
                                <td>{{ $resource->c_upazila_id }}</td>
                                <td>{{ $resource->c_address }}</td>
                                <td>{{ $resource->p_district_id }}</td>
                                <td>{{ $resource->p_upazila_id }}</td>
                                <td>{{ $resource->p_address }}</td>
                                <td>{{ $resource->blood_group_id }}</td>
                                <td><x-status :status="$resource->status" /></td>
                                <td>
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            @can('Resource View')
                                            <li>
                                                <a href="{{ route('resource.show', $resource->id) }}"
                                                    class="dropdown-item">
                                                    <i class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                    View
                                                </a>
                                            </li>
                                            @endcan
                                            @can('Resource Edit')
                                            <li>
                                                <a href="{{ route('resource.edit', $resource->id) }}"
                                                    class="dropdown-item edit-item-btn">
                                                    <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                    Edit
                                                </a>
                                            </li>
                                            @endcan
                                            @can('Resource Delete')
                                            <li>
                                                <a type="button" class="dropdown-item remove-item-btn"
                                                    wire:click='$dispatch("delete_resource",{{ $resource->id }})'>
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
        {{ $resources->links() }}
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
