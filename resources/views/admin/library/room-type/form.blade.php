@row
    <x-form.text-input name="name" type="text" :value="$room_type->name" labelClass="required" label="Name"
        placeholder="Name" />
@endrow
<div class="box-footer mt-3">
    <button type="submit" class="btn btn-primary btn-sm">Save</button>
    <a href="{{ route('room-type.index') }}" class="btn btn-outline-danger btn-sm">Cancel</a>
</div>
