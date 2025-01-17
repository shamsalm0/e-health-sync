<div>
    <div class="card">
        <div class="card-body my-0" style="font-size:12px;">
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
                            <input type="text" name="patient_name" class="form-control form-control-sm" id="patient_name" placeholder="Enter patient name">
                        </div>
{{--                        <div class="col-md-2">--}}
{{--                            <label for="sex" class="form-label">Sex<span class="text-danger">*</span></label>--}}
{{--                            <select class="form-select form-select-sm" id="sex">--}}
{{--                                <option>Male</option>--}}
{{--                                <option>Female</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
                        <div class="col-md-2">
                            <label for="sex" class="form-label">Sex<span class="text-danger">*</span></label>
                            <select required class="form-control form-select-sm" id='sex'>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <label for="year" class="form-label">Year<span class="text-danger">*</span></label>
                            <input type="number" name="year" class="form-control form-control-sm" id="year" placeholder="0">
                        </div>
                        <div class="col-md-1">
                            <label for="month" class="form-label">Month<span class="text-danger">*</span></label>
                            <input type="number" name="month" class="form-control form-control-sm" id="month" placeholder="0">
                        </div>
                        <div class="col-md-1">
                            <label for="day" class="form-label">Day<span class="text-danger">*</span></label>
                            <input type="number" name="day" class="form-control form-control-sm" id="day" placeholder="0">
                        </div>
                        <div class="col-md-2">
                            <label for="dob" class="form-label">Date of Birth<span class="text-danger">*</span></label>
                            <input type="date" name="dob" class="form-control form-control-sm" id="dob">
                        </div>
                        <div class="col-md-2">
                            <label for="contact_no" class="form-label">Contact No<span class="text-danger">*</span></label>
                            <input type="text" name="contact" class="form-control form-control-sm" id="contact_no" placeholder="+880">
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
                            <label for="doctor" class="form-label">Ref. Doctor/Organization/phone/mobile<span class="text-danger">*</span></label>
                            <select required class="form-control form-select-sm" id='doctor'>
                            </select>
                        </div>
                        <div class="col-md-1 mt-4">
                            <button class="btn btn-sm btn-primary">+</button>
                        </div>
                        <div class="col-md-3">
                            <label for="test" class="form-label">Test Name<span class="text-danger">*</span></label>
                            <select required class="form-control form-select-sm" id='test'>
                            </select>
                        </div>
                        <div class="col-md-1 mt-4">
                            <button class="btn btn-sm btn-warning">Short List</button>
                        </div>
                        <div class="col-md-1 mt-4">
                            <button class="btn btn-sm btn-info">Packages</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Diagnosis Test Add -->
            <div class="card mb-3">
                <div class="card-header">
                    Diagnosis Test Add
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Test Name</th>
                                <th>Price</th>
                                <th>Test Type</th>
                                <th>S.Discount (%/Tk)</th>
                                <th>Ref./Dr. Discount (%/Tk)</th>
                                <th>T.Discount</th>
                                <th>Qnty</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Dynamic rows to be added -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Payment Add -->
            <div class="card mb-3">
                <div class="card-header">
                    Payment Add
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <label for="total_price" class="form-label">Total Price</label>
                            <input type="text" class="form-control form-control-sm" id="total_price" value="0" disabled>
                        </div>
                        <div class="col-md-2">
                            <label for="net_bill" class="form-label">Net Bill</label>
                            <input type="text" class="form-control form-control-sm" id="net_bill" value="0" disabled>
                        </div>
                        <div class="col-md-2">
                            <label for="due_amount" class="form-label">Due Amount</label>
                            <input type="text" class="form-control form-control-sm" id="due_amount" value="0" disabled>
                        </div>
                        <div class="col-md-2">
                            <label for="paid_amount" class="form-label">Paid Amount *</label>
                            <input type="text" class="form-control form-control-sm" id="paid_amount" value="0">
                        </div>
                        <div class="col-md-2">
                            <label for="discount_type" class="form-label">Discount Type</label>
                            <select class="form-select form-select-sm" id="discount_type">
                                <option>Fixed Amount (TK)</option>
                                <option>Percentage (%)</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="total_discount" class="form-label">Total Discount</label>
                            <input type="text" class="form-control form-control-sm" id="total_discount" value="0">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Save/Reset Buttons -->
            <div class="text-center">
                <button class="btn btn-sm btn-primary">Save</button>
                <span class="mx-2">OR</span>
                <button class="btn btn-sm btn-warning">Reset</button>
            </div>
        </div>
    </div>
</div>
