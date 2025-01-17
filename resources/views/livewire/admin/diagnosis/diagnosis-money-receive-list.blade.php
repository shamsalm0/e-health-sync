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
                            <th>Patient Name</th>
                            <th>Gender</th>
                            <th>Mobile</th>
                            <th>Total</th>
                            <th>Discount</th>
                            <th>Net</th>
                            <th>Paid</th>
                            <th>Due</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </x-thead>
                    <x-tbody>
                        @foreach ($moneyReceives as $moneyReceive)
                            <tr>
                                <td scope="row">{{ $moneyReceives->firstItem() + $loop->index }}</td>
                                <td>{{ $moneyReceive->patient_name }}</td>
                                <td>{{ $moneyReceive->gender->name }}</td>
                                <td>{{ $moneyReceive->mobile }}</td>
                                <td>{{ round($moneyReceive->total_amount) }}</td>
                                <td>{{ round($moneyReceive->discount_amount) }}</td>
                                <td>{{ round($moneyReceive->net_amount) }}</td>
                                <td>{{ round($moneyReceive->paid_amount) }}</td>
                                <td>{{ round($moneyReceive->due_amount) }}</td>
                                <td><x-status :status="$moneyReceive->status" /></td>
                                <td>
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a
                                                    class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#paidModal"
                                                    wire:click="setSelectedMoneyReceive({{ $moneyReceive->id }})"
                                                    >
                                                    <i class="lab la-amazon-pay text-muted"></i>
                                                    Paid
                                                </a>
                                            </li>

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
    <!-- Bootstrap Modal -->
    <div class="modal fade" wire:ignore id="paidModal" tabindex="-1" aria-labelledby="paidModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paidModalLabel">Due Paid for Diagnosis Test</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <hr />
                <div class="modal-body">
                    <div class="col-xl-12">
                        <div class="table mt-4 mt-xl-0">
                            <table class="table table-success table-striped table-nowrap align-middle mb-0">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Patient Id</th>
                                    <th scope="col">Patient Name</th>
                                    <th scope="col">Source</th>
                                    <th scope="col">Due</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{ $moneyReceiveData->id ?? '' }}</td>
                                    <td>{{ $moneyReceiveData->patient_id ?? '' }}</td>
                                    <td>{{ $moneyReceiveData->patient_name ?? '' }}</td>
                                    <td>{{ $moneyReceiveData->mobile ?? '' }}</td>
                                    <td>{{ round($moneyReceiveData->due_amount ?? 0) ?? 0 }}</td>
                                </tr>
                                </tbody>
                            </table>

                            <div class='mt-2 row row-form row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 row-cols-xl-4'>
                                <div>
                                    <label for="paid_amount" class="form-label">Paid Amount</label>
                                    <input type="text" wire:model="paid_amount" class="form-control form-control-sm" id="paid_amount" value="0">
                                </div>
                                <div>
                                    <label for="current_due" class="form-label">Current Due</label>
                                    <input type="text" wire:model="current_due" class="form-control form-control-sm" id="current_due" value="0" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" wire:click="saveAsPaid">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
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
        Livewire.on('close-modal', () => {
            $('#paidModal').modal('hide');
        });
    </script>
@endscript
