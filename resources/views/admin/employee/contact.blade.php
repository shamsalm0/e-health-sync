@extends('admin.employee.base')
@section('form')
    <form action="{{ route('employee.contact.store', $employee->id) }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <h2>Present Address</h2>
                @livewire('select.upazila')
               
                <x-form.text-input name="c_post_office" type="text" :value="$emp_address->c_post_office" labelClass="required" label="Post Office"
                    placeholder="Post Office" />
                <x-form.text-input name="c_post_code" type="text" :value="$emp_address->c_post_code" labelClass="required" label="Post Code"
                    placeholder="Post code" />
                <x-form.text-input name="c_address" type="text" :value="$emp_address->c_address" labelClass="required" label="Address"
                    placeholder="Address" />
                <x-form.text-input name="c_mobile" type="text" :value="$emp_address->c_mobile" labelClass="required" label="Mobile"
                    placeholder="Mobile" />
            </div>
            <div class="col-md-6">
                <h2>Permanent Address</h2>
                <div class="form-check mb-3 ms-2">
                    <input type="hidden" name="same_as_present" value="off">
                    <input class="form-check-input" type="checkbox" id="same_as_present" name="same_as_present"
                    value="on" {{ old('same_as_present') == 'on' ? 'checked' : '' }}>
                    <label class="form-check-label" for="">
                        Same as present
                    </label>
                </div>
                @livewire('select.p-upazila')
                <x-form.text-input name="p_post_office" type="text" :value="$emp_address->p_post_office" labelClass="required" label="Post Office"
                    placeholder="Post Office" />
                <x-form.text-input name="p_post_code" type="text" :value="$emp_address->p_post_code" labelClass="required" label="Post Code"
                    placeholder="Post code" />
                <x-form.text-input name="p_address" type="text" :value="$emp_address->p_address" labelClass="required" label="Address"
                    placeholder="Address" />
                <x-form.text-input name="p_mobile" type="text" :value="$emp_address->p_mobile" labelClass="required" label="Mobile"
                    placeholder="Mobile" />
                <x-form.select :options="$mailing_addresses" :selected="$emp_address->mailing_address" name="mailing_address" label="Mailing Address" />
            </div>
        </div>
        <div class="box-footer mt-3">
            <button type="submit" class="btn btn-primary btn-sm">Save</button>
        </div>

    </form>
@endsection
