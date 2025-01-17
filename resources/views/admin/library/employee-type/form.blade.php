@row
    <x-form.text-input name="name" type="text" :value="$employeeType->name" labelClass="required" label="Employee type" placeholder="Employee type" />
@endrow
<div class="box-footer mt-3">
    <button type="submit" class="btn btn-primary btn-sm">Save</button>
    <a href="{{ route('employee-type.index') }}" class="btn btn-outline-danger btn-sm">Cancel</a>
</div>
