<div class="card">
    <div class="card-body">
        <x-row>
            <x-input name="service_name" :value="$discountServiceSetup?->service_name" />
            <x-form.select :options="$departments" :selected="$discountServiceSetup->department_id" name="department_id" label="Department" />
            <x-form.select :options="$statuses" :selected="$discountServiceSetup->status" name="status" label="Status" />
        </x-row>
        <div class="d-flex justify-content-between w-50 my-4">
            <x-form.checkbox id="has_discount" name="has_discount" label="Has Discount" :checked="$discountServiceSetup->has_discount" />
            <x-form.checkbox id="has_commission" name="has_commission" label="Has Commission" :checked="$discountServiceSetup->has_commission" />
            <x-form.checkbox id="is_refundable" name="is_refundable" label="Is Refundable" :checked="$discountServiceSetup->is_refundable" />
            <x-form.checkbox id="in_others" name="in_others" label="In Others" :checked="$discountServiceSetup->in_others" />
        </div>
    </div>
    <div class="card-footer">
        <div class="">
            <button class="btn btn-primary">Save</button>
            <a href="{{ route('discount-service-setup.index') }}" class="btn btn-outline-dark">Back</a>
        </div>
    </div>
</div>
