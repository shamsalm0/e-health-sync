@row
    <x-form.select :options="$branches" :selected="$shift->branch_id" name="branch_id" label="Branch" />
    <x-form.text-input name="name" type="text" :value="$shift->name" labelClass="required" label="Name" placeholder="name" />
    <x-form.text-input name="from" type="time" :value="$shift->from" labelClass="required" label="From"
        placeholder="from" />
    <x-form.text-input name="to" type="time" :value="$shift->to" labelClass="required" label="To"
        placeholder="to" />
@endrow
<div class="box-footer mt-3">
    <button type="submit" class="btn btn-primary btn-sm">Save</button>
    <a href="{{ route('shift.index') }}" class="btn btn-outline-danger btn-sm">Cancel</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("input[type='time']", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
    });
</script>
