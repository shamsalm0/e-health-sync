@row
    <x-form.text-input name="name" type="text" :value="$district->name" labelClass="required" label="Name" placeholder="name" />
    <x-form.text-input name="bn_name" type="text" :value="$district->bn_name" labelClass="required" label="Name Bangla" placeholder="name bangla" />
    <x-form.select :options="$divisions" :selected="$district->division_id" name="division_id" label="Select Division" />
    <x-form.text-input name="lat" type="text" :value="$district->lat" labelClass="required" label="lat" placeholder="Enter lat" />
    <x-form.text-input name="lon" type="text" :value="$district->lon" labelClass="required" label="lon" placeholder="Enter lon" />
    <x-form.text-input name="url" type="text" :value="$district->url" labelClass="required" label="URL" placeholder="Enter url" />
@endrow

<div class="box-footer mt-3">
    <button type="submit" class="btn btn-primary btn-sm">Save</button>
    <a href="{{ route('district.index') }}" class="btn btn-outline-danger btn-sm">Cancel</a>
</div>
