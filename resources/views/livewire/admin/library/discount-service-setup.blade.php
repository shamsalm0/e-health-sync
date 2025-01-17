<div>
    {{-- start header  --}}
    <div class="mb-3 ">
        <x-alert />
        <div wire:loading class="wireload">
            <x-loading />
        </div>
        <x-list-header total="{{ $discountServiceSetups->total() }}">
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
            @can('Discount Service Setup Add')
                <a class="btn btn-primary" href="{{ route('discount-service-setup.create') }}">
                    <i class="mdi mdi-plus"></i> Add Discount Service Setup
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
                    <input type="text" wire:model.live='search' class="form-control" placeholder="Search service name">
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
							<th>Service Name</th>
							<th>Department Id</th>
							<th>Has Discount</th>
							<th>Has Commission</th>
							<th>Is Refundable</th>
							<th>In Others</th>
							<th>Status</th>
                            <th>Action</th>
                        </tr>
                    </x-thead>
                    <x-tbody>
                        @foreach ($discountServiceSetups as $discountServiceSetup)
                            <tr>
                                <td scope="row">{{ $discountServiceSetups->firstItem() + $loop->index }}</td>
								<td>{{ $discountServiceSetup->service_name }}</td>
								<td>{{ $discountServiceSetup->department?->name }}</td>
								<td>{{ $discountServiceSetup->has_discount ? 'Yes' : 'No' }}</td>
								<td>{{ $discountServiceSetup->has_commission ? 'Yes' : 'No' }}</td>
								<td>{{ $discountServiceSetup->is_refundable ? 'Yes' : 'No' }}</td>
								<td>{{ $discountServiceSetup->in_others ? 'Yes' : 'No' }}</td>
                                <td><x-status :status="$discountServiceSetup->status" /></td>
                                <td>
                                    @canany(['Discount Service Setup View', 'Discount Service Setup Edit', 'Discount Service Setup Delete'])
                                        <div class="dropdown d-inline-block">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                @can('Discount Service Setup View')
                                                    <li>
                                                        <a href="{{route('discount-service-setup.show', $discountServiceSetup->id)}}" class="dropdown-item">
                                                            <i class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                            View
                                                        </a>
                                                    </li>
                                                @endcan
                                                @can('Discount Service Setup Edit')
                                                    <li>
                                                        <a href="{{route('discount-service-setup.edit', $discountServiceSetup->id)}}" class="dropdown-item edit-item-btn">
                                                            <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                            Edit
                                                        </a>
                                                    </li>
                                                @endcan
                                                @can('Discount Service Setup Delete')
                                                    <li>
                                                        <a class="dropdown-item remove-item-btn"
                                                            wire:click='$dispatch("delete_resource",{{ $discountServiceSetup->id }})'>
                                                            <i
                                                                class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
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
        {{ $discountServiceSetups->links() }}
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
