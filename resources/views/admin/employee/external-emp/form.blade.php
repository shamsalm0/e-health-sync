<div class="card">
    <div class="card-body">
        <x-row>
            <x-form.select :options="$branches" :selected="$externalEmp->branch_id" name="branch_id" label="Branch" />
            <x-form.select :options="$departments" :selected="$externalEmp->department_id" name="department_id" label="Department" />
            <x-form.select :options="$designations" :selected="$externalEmp->designation_id" name="designation_id" label="Designation" />
            <x-form.select :options="$empTypes" :selected="$externalEmp->emp_type_id" name="emp_type_id" label="Employee Type" />
            <x-input name="name" :value="$externalEmp?->name" />
            <x-input name="mobile" :value="$externalEmp?->mobile" />
            <x-input name="phone" :value="$externalEmp?->phone" />
            <x-input name="external_type" :value="$externalEmp?->external_type" />
            <x-input name="qualification" :value="$externalEmp?->qualification" />
            <x-input name="address" :value="$externalEmp?->address" />
            <x-input name="remark" :value="$externalEmp?->remark" />
            <x-form.select :options="$statuses" :selected="$externalEmp?->status" name="status" label="Status"/>
        </x-row>
    </div>
    <div class="card-footer">
        <div class="">
            <button class="btn btn-primary">Save</button>
            <a href="{{ route('external-emp.index') }}" class="btn btn-outline-dark">Back</a>
        </div>
    </div>
</div>
