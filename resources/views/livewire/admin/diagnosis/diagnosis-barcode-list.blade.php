<div>
    {{-- start header  --}}
    <div class="mb-3 ">
        <x-alert />
        <div wire:loading class="wireload">
            <x-loading />
        </div>
        <x-list-header total="{{ $moneyReceives->total() }}">
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
            @can('Diag Money Receive Add')
                <a class="btn btn-primary" href="{{ route('diagnosis-money-receive.create') }}">
                    <i class="mdi mdi-plus"></i> Add Money Receive
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
                <x-form.text-input wire:model="from" name="from" type="date" labelClass="required" label="From"
                    placeholder="from" />
                <x-form.text-input wire:model="to" name="to" type="date" labelClass="required" label="To"
                    placeholder="to" />
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
                            <th>Serial Id</th>
                            <th>Patient Name</th>
                            <th>Date</th>
                            <th>Barcode</th>
                            <th>Action</th>
                        </tr>
                    </x-thead>
                    <x-tbody>
                        @foreach ($moneyReceives as $moneyReceive)
                            <tr>
                                <td scope="row">{{ $moneyReceives->firstItem() + $loop->index }}</td>
                                <td>{{ $moneyReceive->id }}</td>
                                <td>{{ $moneyReceive->patient_name }}</td>
                                <td>{{ $moneyReceive->created_at}}</td>
                                <td></td>
                                <td>
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <a href="{{ route('diagnosis-money-receive.edit', $moneyReceive->id) }}"
                                                        class="dropdown-item edit-item-btn">
                                                        <i class="las la-print text-muted"></i>
                                                        Reprint
                                                    </a>
                                                </li>

                                            @can('Diag Money Receive Delete')
                                                <li>
                                                    <a type="button" class="dropdown-item remove-item-btn"
                                                        wire:click='$dispatch("delete_resource",{{ $moneyReceive->id }})'>
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
        {{ $moneyReceives->links() }}
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
