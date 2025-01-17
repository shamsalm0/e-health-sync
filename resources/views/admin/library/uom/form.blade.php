@row
    <x-form.text-input name="name" type="text" :value="$uom->name" labelClass="required" label="Name" placeholder="name" />
    <x-form.text-input name="details" type="text" :value="$uom->details" labelClass="required" label="Description"
        placeholder="details" />
@endrow
<div class="box-footer mt-3">
    <button type="submit" class="btn btn-primary btn-sm">Save</button>
    <a href="{{ route('uom.index') }}" class="btn btn-outline-danger btn-sm">Cancel</a>
</div>
