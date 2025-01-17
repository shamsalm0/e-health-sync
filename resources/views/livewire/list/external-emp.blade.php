<div>
    {{-- start header  --}}
    <div class="mb-3 ">
        <x-alert />
        <div wire:loading class="wireload">
            <x-loading />
        </div>
        <x-list-header total="{{ $externalEmps->total() }}">
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
            @can('External Emp Add')
                <a class="btn btn-primary" href="{{ route('external-emp.create') }}">
                    <i class="mdi mdi-plus"></i> Add External Emp
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
                            <th>Branch Id</th>
                            <th>Name</th>
                            <th>Designation Id</th>
                            <th>Department Id</th>
                            <th>Emp Type Id</th>
                            <th>Mobile</th>
                            <th>Phone</th>
                            <th>External Type</th>
                            <th>Qualification</th>
                            <th>Address</th>
                            <th>Remark</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </x-thead>
                    <x-tbody>
                        @foreach ($externalEmps as $externalEmp)
                            <tr>
                                <td scope="row">{{ $externalEmps->firstItem() + $loop->index }}</td>
                                <td>{{ $externalEmp->branch?->name }}</td>
                                <td>{{ $externalEmp->name }}</td>
                                <td>{{ $externalEmp->designation?->name }}</td>
                                <td>{{ $externalEmp->department?->name }}</td>
                                <td>{{ $externalEmp->employeeType?->name }}</td>
                                <td>{{ $externalEmp->mobile }}</td>
                                <td>{{ $externalEmp->phone }}</td>
                                <td>{{ $externalEmp->external_type }}</td>
                                <td>{{ $externalEmp->qualification }}</td>
                                <td>{{ $externalEmp->address }}</td>
                                <td>{{ $externalEmp->remark }}</td>
                                <td><x-status :status="$externalEmp->status" /></td>
                                <td>
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a href="{{ route('external-emp.show', $externalEmp->id) }}"
                                                    class="dropdown-item">
                                                    <i class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                    View
                                                </a>
                                            </li>
                                            @can('External Emp Edit')
                                                <li>
                                                    <a href="{{ route('external-emp.edit', $externalEmp->id) }}"
                                                       class="dropdown-item edit-item-btn">
                                                        <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                        Edit
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('External Emp Delete')
                                                <li>
                                                    <a class="dropdown-item remove-item-btn custom-pointer"
                                                       wire:click='$dispatch("delete_resource",{{ $externalEmp->id }})'>
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
        {{ $externalEmps->links() }}
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
