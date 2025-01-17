{{-- <div class='row row-form row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 row-cols-xl-4'>
    <x-form.select :options="$branches" :selected="$hospital_floor->branch_id" name="branch_id" label="Branch" />
    <x-form.select :options="$buildings" :selected="$hospital_floor->building_id" name="building_id" label="Building" />
    <x-form.text-input name="name" type="text" :value="$hospital_floor->name" labelClass="required" label="Name"
        placeholder="name" />
</div>
<div class="box-footer mt-3">
    <button type="submit" class="btn btn-primary btn-sm">Save</button>
    <a href="{{ route('hospital-floor.index') }}" class="btn btn-outline-danger btn-sm">Cancel</a>
</div> --}}
<x-form.layout :cancelRoute="route('hospital-floor.index')">
    <x-form.select :options="$branches" :selected="$hospital_floor->branch_id" name="branch_id" label="Branch" />
        <x-form.select :options="$buildings" :selected="$hospital_floor->building_id" name="building_id" label="Building" />
        <x-form.text-input name="name" type="text" :value="$hospital_floor->name" labelClass="required" label="Name"
            placeholder="name" />
</x-form.layout>