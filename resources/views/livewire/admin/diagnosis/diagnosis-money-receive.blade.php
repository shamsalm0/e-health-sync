<div>
    <x-alert />
    <div wire:loading class="wireload">
        <x-loading />
    </div>
    <div class="card">
        <div class="card-body my-0" style="font-size:12px;">
            <form method="POST" wire:submit.prevent='save' wire:keydown.enter='save' enctype="multipart/form-data">
                @csrf
                <!-- Patient Search -->
                <div class="card py-0 mb-0">
                    <div class="row">
                        <div class="col-md-4 my-0">
                            <label for="patient_type" class="form-label">Serial Patient Name / Contact No.</label>
                            <select class="form-select form-select-sm" id="patient_type">
                                <option>Serial Patient Name / Contact No.</option>
                            </select>
                        </div>
                        <div class="col-md-4 my-0">
                            <label for="patient_type" class="form-label">Admitted Patient ID/Name/Contact No</label>
                            <select class="form-select form-select-sm" id="patient_type">
                                <option>Admitted Patient ID/Name/Contact No</option>
                            </select>
                        </div>
                        <div class="col-md-4 my-0">
                            <label for="patient_type" class="form-label">Normal Patient ID/Name/Contact No</label>
                            <select class="form-select form-select-sm" id="patient_type">
                                <option>Normal Patient ID/Name/Contact No</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Patient Add -->
                <div class="card mb-0">
                    <div class="card-header p-0">
                        <span style="font-weight: bold; color:green">Patient Information</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="patient_name" class="form-label">Patient Name<span class="text-danger">*</span></label>
                                <input type="text" wire:model="patient_name" class="form-control form-control-sm" id="patient_name" placeholder="Enter patient name">
                                @error('patient_name')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="input-light col-md-2">
                                <label class="form-label">
                                    Gender
                                    <span class="text-danger">*</span>
                                </label>

                                <select wire:model="gender_id" class="form-select form-select-sm @error('gender_id') is-invalid @enderror" id="gender_id">
                                    @foreach($genders as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>

                                @error('gender_id')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <label for="mobile" class="form-label">Contact No<span class="text-danger">*</span></label>
                                <input type="text" wire:model="mobile" class="form-control form-control-sm" placeholder="mobile">
                                @error('mobile')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="col-md-1">
                                <label for="year" class="form-label">Year<span class="text-danger">*</span></label>
                                <input type="number" wire:model.live="year" class="form-control form-control-sm" id="year" placeholder="0">
                                @error('year')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="col-md-1">
                                <label for="month" class="form-label">Month<span class="text-danger">*</span></label>
                                <input type="number" wire:model.live="month" class="form-control form-control-sm" id="month" placeholder="0">
                                @error('month')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="col-md-1">
                                <label for="day" class="form-label">Day<span class="text-danger">*</span></label>
                                <input type="number" wire:model.live="day" class="form-control form-control-sm" id="day" placeholder="0">
                                @error('day')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <label for="dob" class="form-label">Date of Birth<span class="text-danger">*</span></label>
                                <input type="date" wire:model.live="dob" class="form-control form-control-sm" id="dob">
                                @error('dob')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Patient Admission Info -->
                <div class="card mb-3">
                    <div class="card-header p-0" >
                        <span style="font-weight: bold; color:green">Patient Admission Info</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="admission_id" class="form-label">Admission ID</label>
                                <input type="text" class="form-control form-control-sm" id="admission_id" placeholder="Enter Admission ID">
                            </div>
                            <div class="col-md-4">
                                <label for="bed_no" class="form-label">Bed No</label>
                                <input type="text" class="form-control form-control-sm" id="bed_no" placeholder="Enter Bed No">
                            </div>
                            <div class="col-md-4">
                                <label for="reservation_time" class="form-label">Reservation Time</label>
                                <input type="time" class="form-control form-control-sm" id="reservation_time">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Diagnosis Add -->
                <div class="card mb-3">
                    <div class="card-header p-0">
                        <span style="font-weight: bold; color:green">Diagnosis Add</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label">
                                    Ref. Doctor/Organization/phone/mobile
                                    <span class="text-danger">*</span>
                                </label>

                                <select wire:model.live="doctor_id" class="form-select form-select-sm @error('doctor_id') is-invalid @enderror" id="doctor_id">
                                    @foreach($doctors as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>

                                @error('doctor_id')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="col-md-1 mt-4">
                                <a class="btn btn-sm btn-primary">+</a>
                            </div>
                            <div class="col-md-3" wire:ignore>
                                <label class="form-label">Test Name<span class="text-danger">*</span></label>
                                <select class="form-select form-select-sm @error('test_id') is-invalid @enderror" id="test_id">
                                    <option value="">Select a test</option>
                                    @foreach($tests as $test)
                                        <option value="{{ $test['id'] }}">{{ $test['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('selected_test')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="col-md-1 mt-4">
                                <button type="button" class="btn btn-soft-info btn-icon waves-effect waves-light layout-rightside-btn shadow-none"><i class="las la-list"></i></button>
                            </div>
                            <div class="col-md-1 mt-4">
                                <a class="btn btn-sm btn-warning">Short List</a>
                            </div>
                            <div class="col-md-1 mt-4">
                                <button type="button" class="btn btn-sm btn-primary " data-bs-toggle="modal" data-bs-target="#myModal">Packages</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Diagnosis Test Add -->
                <div class="card mb-3">
                    <div class="card-body">
                        <table class="table table-sm table-bordered table-striped">
                            <thead>
                            <tr class="bg-info">
                                <th>#</th>
                                <th>Test Name</th>
                                <th>Price</th>
                                <th>Test Type</th>
                                <th>S.Discount (%/Tk)</th>
                                <th>Ref./Dr. Discount (%/Tk)</th>
                                <th>T.Discount</th>
                                <th>Qnty</th>
                                <th>Sub Total</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody class="bg-success-subtle">
                            @if($selected_test)
                                @foreach($selected_test as $index => $test)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $test['name'] }}</td>
                                        <td>{{ $test['cost'] }}</td>
                                        <td>
                                            @if($test['test_package_id'])
                                                {{ 'Package' }}
                                            @else
                                                {{ 'No Package' }}
                                            @endif
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <!-- Total Discount Input -->
                                        <td>{{ $test['total_discount'] }}</td>

                                        <!-- Quantity Input -->
                                        <td>
                                            <input type="number" class="form-control form-control-sm" wire:model.live="selected_test.{{ $index }}.quantity" wire:change="updateTestTotalCost({{ $index }})  @if($test['test_package_id'] !== null) readonly @endif">
                                        </td>

                                        <!-- Sub Total -->
                                        <td>
{{--                                            {{ (float)$test['cost'] * (int)($test['quantity'] ?? 1) - (float)($test['total_discount'] ?? 0) }}--}}
                                            {{ $test['sub_total'] ?? 0 }}
                                        </td>

                                        <!-- Action -->
                                        <td>
                                            <a class="custom-pointer" wire:click="delete({{ $test['id'] }}, {{ $index }})">
                                                <i class="ri-delete-bin-2-fill align-bottom me-2 text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Payment Add -->
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="total_amount" class="form-label">Total Price</label>
                                <input type="text" wire:model="total_amount" class="form-control form-control-sm" id="total_amount" value="0" disabled>
                            </div>
                            <div class="col-md-2">
                                <label for="net_amount" class="form-label">Net Bill</label>
                                <input type="text" wire:model="net_amount" class="form-control form-control-sm" id="net_amount" value="0" disabled>
                            </div>
                            <div class="col-md-2">
                                <label for="due_amount" class="form-label">Due Amount</label>
                                <input type="text" wire:model="due_amount" class="form-control form-control-sm" id="due_amount" value="0" disabled>
                                @error('due_amount')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <label for="paid_amount" class="form-label">Paid Amount *</label>
                                <input type="text" wire:model.live="paid_amount" class="form-control form-control-sm" id="paid_amount" value="0">
                                @error('paid_amount')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <label for="discount_is_percent" class="form-label">Discount Type</label>
                                <select wire:model.live="discount_is_percent" class="form-select form-select-sm" id="discount_is_percent">
                                    <option value="0">Fixed Amount (TK)</option>
                                    <option value="1">Percentage (%)</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="total_discount" class="form-label">Total Discount</label>
                                <input type="number" wire:model.live="total_discount" class="form-control form-control-sm" id="total_discount" value="0">
                                @error('total_discount')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Save/Reset Buttons -->
                <div class="text-center">
                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                    <span class="mx-2">OR</span>
                    <a class="btn btn-sm btn-warning">Reset</a>
                </div>
            </form>
        </div>
    </div>


    {{-- Test list --}}
    <div class="col-auto layout-rightside-col" wire:ignore>
        <div class="overlay"></div>
        <div class="layout-rightside">
            <div class="card h-100 rounded-0">
                <div class="card-body p-0">
                    <div class="p-3">
                        <h6 class="text-muted mb-0 text-uppercase fw-semibold">Select Test</h6>
                    </div>
                    <div data-simplebar style="max-height: 700px;" class="p-3 pt-0">
                        <div class="acitivity-timeline acitivity-main">
                                @foreach($tests as $test)
                                    <li>
                                        <input
                                            type="checkbox"
                                            wire:model.live="selected_test_ids"
                                            value="{{ $test['id'] }}"
                                            wire:change="toggleTestSelection({{ $test['id'] }})"
                                        >
                                        {{ $test['name'] }}
                                    </li>
                                @endforeach
                        </div>
                    </div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end .rightbar-->
    </div>
    <!-- end col -->

    <!-- Package Modals -->
    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;" wire:ignore>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Test Packages</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    @foreach($packages as $package)
                    <div class="accordion custom-accordionwithicon custom-accordion-border accordion-border-box accordion-secondary" id="accordionBordered">
                        <div class="accordion-item shadow">
                            <h2 class="accordion-header" id="accordionbordered{{ $package->id }}">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#accor_bordered{{ $package->id }}" aria-expanded="true" aria-controls="accor_bordered{{ $package->id }}">
                                    {{ $package->name }}
                                </button>
                            </h2>
                            <div id="accor_bordered{{ $package->id }}" class="accordion-collapse collapse" aria-labelledby="accordionbordered{{ $package->id }}" data-bs-parent="#accordionBordered">
                                <div class="accordion-body">
                                    <table class="table-responsive table table-sm">
                                        <tr>
                                            <th>
                                                <input type="checkbox" wire:model.live="selected_package_ids" value="{{ $package->id }}" wire:change="togglePackageSelection({{ $package->id }})">
                                            </th>
                                            <th>Test</th>
                                            <th>Price</th>
                                        </tr>
                                        @foreach($package->testPackageDetails as $test)
                                            <tr>
                                                <td></td>
                                                <td>{{ $test->testName?->name }}</td>
                                                <td>{{ $test->price }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

</div>

@script
<script>
    $(document).ready(function() {
        // Initialize Select2
        $('#test_id').select2();

        // Sync the selected value with Livewire when it changes
        $('#test_id').on('change', function(e) {
            @this.set('selected_test_id', e.target.value);
        });
    });

    // Reinitialize Select2 after Livewire updates
    document.addEventListener('livewire:load', function() {
        $('#test_id').select2();
    });

    // This event is fired every time Livewire updates the component
    document.addEventListener('livewire:updated', function() {
        $('#test_id').select2();
    });

    // SweetAlert trigger
    Livewire.on('trigger-sweetalert', () => {
        Swal.fire({
            text: 'You have already selected this test',
            icon: 'error',
            timer: 1500
        });
    });
</script>
@endscript
