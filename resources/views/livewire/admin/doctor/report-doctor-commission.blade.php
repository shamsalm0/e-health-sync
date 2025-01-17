<div>
     {{-- start header  --}}
     <div class="mb-3 ">
        <x-alert />
        <div wire:loading class="wireload">
            <x-loading />
        </div>
        <x-list-header total="{{ $reportDocCommissions->total() }}">
            @can('Test Package Add')
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
            @endcan
        </x-list-header>

        <div class="@if (!$filter) d-none @endif">
            <form wire:submit.prevent="saveOrUpdate">
                @csrf
                <x-search-row>
                    <div>
                        <label for="report_doctor_id">Report Doctor</label>
                        <select wire:model.live="report_doctor_id" name="report_doctor_id" class="form-select">
                            @foreach ($doctors as $id => $doctor)
                                <option value="{{ $id }}">{{ $doctor }}</option>
                            @endforeach
                        </select>
                        @error('report_doctor_id')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <div>
                        <label>Commission On</label>
                        <select wire:model="commission_on" class="form-select">
                            <option value="">Select</option>
                            <option value="1">Single Item</option>
                            <option value="2">All Item</option>
                        </select>
                        @error('commission_on')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div>
                        <label>Select Service</label>
                        <select wire:model="service_id" class="form-select">
                            @foreach ($services as $key => $service_name)
                                <option value="{{ $key }}">{{ $service_name }}</option>
                            @endforeach
                        </select>
                        @error('service_id')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div>
                        <label for="test_name_id">Select Test</label>
                        <select wire:model="test_name_id" class="form-select">
                            @foreach ($tests as $id => $test)
                                <option value="{{ $id }}">{{ $test }}</option>
                            @endforeach
                        </select>
                        @error('test_name_id')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div>
                        <label>Commission Type</label>
                        <select wire:model="commission_type" class="form-select">
                            @foreach ($comm_types as $id => $type)
                                <option value="{{ $id }}">{{ $type }}</option>
                            @endforeach
                        </select>
                        @error('commission_type')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div>
                        <label>Commission</label>
                        <input type="number" wire:model="commission" name="commission" class="form-control">
                        @error('commission')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="d-flex align-items-end">
                        <button type="submit" class="btn btn-primary">
                            @if($editing) Update @else Save @endif
                        </button>
                    </div>
                </x-search-row>
            </form>
        </div>

    </div>
    {{-- end header  --}}
    <div class="">
        <div class="card mb-3">
            <div class="card-body">
                <x-table>
                    <x-thead>
                        <tr>
                            <th>#</th>
                            <th>Doctor</th>
                            <th>Service</th>
                            <th>Test Name</th>
                            <th>Commission Type</th>
                            <th>Commission</th>
                            <th>Action</th>
                        </tr>
                    </x-thead>
                    <x-tbody>
                        @foreach ($reportDocCommissions as $commission)
                            <tr>
                                <td>{{ $reportDocCommissions->firstItem() + $loop->index }}</td>
                                <td>{{ $commission->reportDoctor?->name }}</td>
                                <td>{{ $commission->service?->service_name }}</td>
                                <td>{{ $commission->testName?->name }}</td>
                                <td>
                                    @if($commission->commission_type == 1)
                                        <span>Percent</span>
                                    @else
                                        <span>Amount</span>
                                    @endif
                                </td>
                                <td>{{ $commission->commission }}</td>
                                <td>
                                    @canany(['Report Doctor Commission View', 'Report Doctor Commission Edit', 'Report Doctor Commission Delete'])
                                        <div class="dropdown d-inline-block">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                @can('Report Doctor Commission Edit')
                                                    <li>
                                                        <button wire:click="edit({{ $commission->id }})" class="dropdown-item edit-item-btn">
                                                            <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                            Edit
                                                        </button>
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
        {{ $reportDocCommissions->links() }}
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
