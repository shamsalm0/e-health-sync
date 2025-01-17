@row
    <x-form.text-input name="name" type="text" :value="$bankBranch->name" labelClass="required" label="Name" placeholder="name" />
    <x-form.select :options="$banks" :selected="$bankBranch->bank_id" name="bank_id" label="Select Bank" />
    <x-form.text-input name="address" type="text" :value="$bankBranch->address" labelClass="required" label="Address"
        placeholder="Address" />
    <x-form.text-input name="routing_no" type="text" :value="$bankBranch->routing_no" labelClass="required" label="Routing No"
        placeholder="Routing No" />
@endrow
<div class="box-footer mt-3">
    <button type="submit" class="btn btn-primary btn-sm">Save</button>
    <a href="{{ route('bank-branch.index') }}" class="btn btn-outline-danger btn-sm">Cancel</a>
</div>
