<div class="card">
    <div class="card-body">
        <x-row>
            <x-form.select :options="$branches" :selected="$reference->branch_id" name="branch_id" label="Branch" />
            <x-input name="name" :value="$reference?->name" />
            <x-input name="mobile" :value="$reference?->mobile" />
            <x-input name="phone" :value="$reference?->phone" />
            <x-form.select :options="$districts" :selected="$reference->district_id" name="district_id" label="District" />
            <x-form.select :options="$upazilas" :selected="$reference->upazila_id" name="upazila_id" label="Upazila" />
            <x-input name="address" :value="$reference?->address" />
            <x-input name="reference_type" :value="$reference?->reference_type" />
            <x-form.select :options="$departments" :selected="$reference->department_id" name="department_id" label="Department" />
            <x-input name="qualification" :value="$reference?->qualification" />
            <x-form.select :options="$statuses" :selected="$reference?->status" name="status" label="Status"/>
        </x-row>
        <div class='row row-form row-cols-3 row-cols-md-6 row-cols-lg-12 g-2 mt-2'>
            <x-form.checkbox id="is_surgeon" name="is_surgeon" label="is Surgon" :checked="$reference->is_surgeon" />
            <x-form.checkbox id="is_anesthesia" name="is_anesthesia" label="is Anesthia" :checked="$reference->is_anesthesia" />
            <x-form.checkbox id="is_consultant" name="is_consultant" label="is Consultant" :checked="$reference->is_consultant" />
            <x-form.checkbox id="is_ultrasonogram" name="is_ultrasonogram" label="is Ultrasonogram" :checked="$reference->is_ultrasonogram" />
            <x-form.checkbox id="is_report_doctor" name="is_report_doctor" label="is Report_doctor" :checked="$reference->is_report_doctor" />
        </div>
    </div>
    <div class="card-footer">
        <div class="">
            <button class="btn btn-primary">Save</button>
            <a href="{{ route('reference.index') }}" class="btn btn-outline-dark">Back</a>
        </div>
    </div>
</div>
