<div class='row row-form row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 row-cols-xl-4'>
    <x-form.text-input name="name" type="text" :value="$building->name" labelClass="required" label="Name"
        placeholder="name" />
    <x-form.select :options="$branches" :selected="$building->branch_id" name="branch_id" label="Branch" />
    <x-form.text-input name="phone" type="text" :value="$building->phone" labelClass="required" label="Phone"
        placeholder="phone" />
    <x-form.text-input name="email" type="text" :value="$building->email" labelClass="required" label="Email"
        placeholder="email" />
    <x-form.text-input name="address" type="text" :value="$building->address" labelClass="required" label="Address"
        placeholder="address" />
</div>
<div class="box-footer mt-3">
    <button type="submit" class="btn btn-primary btn-sm">Save</button>
    <a href="{{ route('hospital-building.index') }}" class="btn btn-outline-danger btn-sm">Cancel</a>
</div>
