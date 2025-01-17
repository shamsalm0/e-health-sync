@row
    <x-form.text-input name="name" type="text" :value="$division->name" labelClass="required" label="Name" placeholder="name" />
    <x-form.text-input name="bn_name" type="text" :value="$division->bn_name" labelClass="required" label="Name Bangla" placeholder="name bangla" />
    <x-form.text-input name="url" type="text" :value="$division->url" labelClass="required" label="URL" placeholder="Enter url" />
@endrow
<div class="box-footer mt-3">
    <button type="submit" class="btn btn-primary btn-sm">Save</button>
    <a href="{{ route('division.index') }}" class="btn btn-outline-danger btn-sm">Cancel</a>
</div>
