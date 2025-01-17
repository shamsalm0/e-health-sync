@extends('admin.employee.base')
@section('form')
    <form action="{{ route('employee.weekend.store', $employee->id) }}" method="POST">
        @csrf
        <div class='row row-form row-cols-1 row-cols-md-3 row-cols-lg-6'>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="days[]" value="saturday" id="formCheckSaturday"
                    {{ in_array('saturday', $emp_weekend->pluck('day')->toArray()) ? 'checked' : '' }}>
                <label class="form-check-label" for="formCheckSaturday">Saturday</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="days[]" value="sunday" id="formCheckSunday"
                    {{ in_array('sunday', $emp_weekend->pluck('day')->toArray()) ? 'checked' : '' }}>
                <label class="form-check-label" for="formCheckSunday">Sunday</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="days[]" value="monday" id="formCheckMonday"
                    {{ in_array('monday', $emp_weekend->pluck('day')->toArray()) ? 'checked' : '' }}>
                <label class="form-check-label" for="formCheckMonday">Monday</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="days[]" value="tuesday" id="formCheckTuesday"
                    {{ in_array('tuesday', $emp_weekend->pluck('day')->toArray()) ? 'checked' : '' }}>
                <label class="form-check-label" for="formCheckTuesday">Tuesday</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="days[]" value="wednesday" id="formCheckWednesday"
                    {{ in_array('wednesday', $emp_weekend->pluck('day')->toArray()) ? 'checked' : '' }}>
                <label class="form-check-label" for="formCheckWednesday">Wednesday</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="days[]" value="thursday" id="formCheckThursday"
                    {{ in_array('thursday', $emp_weekend->pluck('day')->toArray()) ? 'checked' : '' }}>
                <label class="form-check-label" for="formCheckThursday">Thursday</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="days[]" value="friday" id="formCheckFriday"
                    {{ in_array('friday', $emp_weekend->pluck('day')->toArray()) ? 'checked' : '' }}>
                <label class="form-check-label" for="formCheckFriday">Friday</label>
            </div>
        </div>
        <div class="box-footer mt-3">
            <button type="submit" class="btn btn-primary btn-sm">Save</button>
        </div>
    </form>
@endsection
