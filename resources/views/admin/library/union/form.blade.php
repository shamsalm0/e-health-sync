@row
    <x-form.text-input name="name" type="text" :value="$union->name" labelClass="required" label="Name" placeholder="name" />
    <x-form.text-input name="bn_name" type="text" :value="$union->bn_name" labelClass="required" label="Name Bangla" placeholder="name bangla" />
    <x-form.select :options="$upazilas" :selected="$union->upazila_id" name="upazila_id" label="Select Upazila" />
    <x-form.text-input name="url" type="text" :value="$union->url" labelClass="required" label="URL" placeholder="Enter url" /> 
@endrow

<div class="box-footer mt-3">
    <button type="submit" class="btn btn-primary btn-sm">Save</button>
    <a href="{{ route('union.index') }}" class="btn btn-outline-danger btn-sm">Cancel</a>
</div>
