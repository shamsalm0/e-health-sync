@row
    <x-form.text-input name="name" type="text" :value="$department->name" labelClass="required" label="Name" placeholder="name" />
    <x-form.text-input name="code" type="text" :value="$department->code" labelClass="required" label="Code" placeholder="code" />
    <x-form.text-input name="phone" type="text" :value="$department->phone" labelClass="required" label="Phone"
        placeholder="phone" />
    <x-form.text-input name="email" type="text" :value="$department->email" labelClass="required" label="Email"
        placeholder="email" />
@endrow
@row
    <x-form.checkbox id="formCheck1" name="is_general" label="is general" :checked="$department->is_general" />
    <x-form.checkbox id="formCheck2" name="is_lab" label="is lab" :checked="$department->is_lab " />
    <x-form.checkbox id="formCheck3" name="is_store" label="is store" :checked="$department->is_store" />
@endrow
<div class="box-footer mt-3">
    <button type="submit" class="btn btn-primary btn-sm">Save</button>
    <a href="{{ route('department.index') }}" class="btn btn-outline-danger btn-sm">Cancel</a>
</div>
