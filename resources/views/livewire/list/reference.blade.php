<div>
    {{-- start header  --}}
    <div class="mb-3 ">
        <x-alert />
        <div wire:loading class="wireload">
            <x-loading />
        </div>
        <x-list-header total="{{ $references->total() }}">
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
            @can('Reference Add')
                <a class="btn btn-primary" href="{{ route('reference.create') }}">
                    <i class="mdi mdi-plus"></i> Add Reference
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
							<th>Branch</th>
							<th>Name</th>
							<th>Mobile</th>
							<th>Phone</th>
							<th>District</th>
							<th>Upazila</th>
							<th>Address</th>
							<th>Reference Type</th>
							<th>Qualification</th>
							<th>Department</th>
							<th>Is Surgon</th>
							<th>Is Anesthia</th>
							<th>Is Consultant</th>
							<th>Is Ultrasonogram</th>
							<th>Is Report Doctor</th>
							<th>Status</th>
                            <th>Action</th>
                        </tr>
                    </x-thead>
                    <x-tbody>
                        @foreach ($references as $reference)
                            <tr>
                                <td scope="row">{{ $references->firstItem() + $loop->index }}</td>
								<td>{{ $reference->branch?->name }}</td>
								<td>{{ $reference->name }}</td>
								<td>{{ $reference->mobile }}</td>
								<td>{{ $reference->phone }}</td>
								<td>{{ $reference->district?->name }}</td>
								<td>{{ $reference->upazila?->name }}</td>
								<td>{{ $reference->address }}</td>
								<td>{{ $reference->reference_type }}</td>
								<td>{{ $reference->qualification }}</td>
								<td>{{ $reference->department?->name }}</td>
                                <td><x-status :status="$reference->is_surgeon" label="true"/></td>
                                <td><x-status :status="$reference->is_anesthesia" label="true"/></td>
                                <td><x-status :status="$reference->is_consultant" label="true"/></td>
                                <td><x-status :status="$reference->is_ultrasonogram" label="true"/></td>
                                <td><x-status :status="$reference->is_report_doctor" label="true"/></td>
                                <td><x-status :status="$reference->status"/></td>
                                <td>
                                    @canany(['Reference View', 'Reference Edit', 'Reference Delete'])
                                        <div class="dropdown d-inline-block">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                @can('Reference View')
                                                    <li>
                                                        <a href="{{route('reference.show', $reference->id)}}" class="dropdown-item">
                                                            <i class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                            View
                                                        </a>
                                                    </li>
                                                @endcan
                                                @can('Reference Edit')
                                                    <li>
                                                        <a href="{{route('reference.edit', $reference->id)}}" class="dropdown-item edit-item-btn">
                                                            <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                            Edit
                                                        </a>
                                                    </li>
                                                @endcan
                                                @can('Reference Delete')
                                                    <li>
                                                        <a type="button" class="dropdown-item remove-item-btn"
                                                            wire:click='$dispatch("delete_resource",{{ $reference->id }})'>
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
        {{ $references->links() }}
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
