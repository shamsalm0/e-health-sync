<div class='row row-form row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 row-cols-xl-4'>
    <x-form.text-input name="name" type="text" :value="$branch->name" labelClass="required" label="Name"
        placeholder="name" />
    <x-form.text-input name="mobile" type="text" :value="$branch->mobile" labelClass="required" label="Mobile"
        placeholder="mobile" />
    <x-form.text-input name="phone" type="text" :value="$branch->phone" labelClass="required" label="Phone"
        placeholder="phone" />
    <x-form.text-input name="email" type="text" :value="$branch->email" labelClass="required" label="Email"
        placeholder="email" />
    <x-form.text-input name="address" type="text" :value="$branch->address" labelClass="required" label="Address"
        placeholder="address" />
</div>
<div class="box-footer mt-3">
    <button type="submit" class="btn btn-primary btn-sm">Save</button>
    <a href="{{ route('hospital-branch.index') }}" class="btn btn-outline-danger btn-sm">Cancel</a>
</div>
