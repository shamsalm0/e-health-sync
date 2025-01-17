@row
    <x-form.text-input name="name" type="text" :value="$upazila->name" labelClass="required" label="Name" placeholder="name" />
    <x-form.text-input name="bn_name" type="text" :value="$upazila->bn_name" labelClass="required" label="Name Bangla" placeholder="name bangla" />
    <x-form.select :options="$districts" :selected="$upazila->district_id" name="district_id" label="Select District" />
    <x-form.text-input name="url" type="text" :value="$upazila->url" labelClass="required" label="URL" placeholder="Enter url" /> 
@endrow

<div class="box-footer mt-3">
    <button type="submit" class="btn btn-primary btn-sm">Save</button>
    <a href="{{ route('upazila.index') }}" class="btn btn-outline-danger btn-sm">Cancel</a>
</div>
