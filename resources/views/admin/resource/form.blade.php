<div class="card">
    <div class="card-body">
        <x-row>
            <x-form.select :options="$branches" :selected="$resource?->branch_id" name="branch_id" label="Select Branch" />
            <x-form.select :options="['' => 'Resource Type', 1 => 'type-1', 2 => 'type-2']" :selected="$resource?->resource_type" name="resource_type" label="Resource Type" />
            <x-input name="name" :value="$resource?->name" />
            <x-input name="father" :value="$resource?->father" />
            <x-input name="mother" :value="$resource?->mother" />
            <x-input name="dob" :value="$resource?->dob" />
            <x-input name="personal_mobile" :value="$resource?->personal_mobile" />
            <x-input name="mobile" :value="$resource?->mobile" />
            <x-input name="phone" :value="$resource?->phone" />
            <x-input name="email" :value="$resource?->email" />
            <x-input name="nid" :value="$resource?->nid" />
            <x-form.select :options="$genders" :selected="$resource?->gender_id" name="gender_id" label="Select Gender" />
            <x-form.select :options="$bloodGroups" :selected="$resource?->blood_group_id" name="blood_group_id" label="Blood Group" />
            <div style="width: 40%">
                @livewire('select.c-district-upazila')
            </div>
            <x-input name="c_address" :value="$resource?->c_address" />
            <div style="width: 40%">
                @livewire('select.p-district-upazila')
            </div>
            <x-input name="p_address" :value="$resource?->p_address" />
            
            <x-form.select :options="$statuses" :selected="$resource?->status" name="status" label="Status" />
        </x-row>
    </div>
    <div class="card-footer">
        <div class="">
            <button class="btn btn-primary">Save</button>
            <a href="{{ route('resource.index') }}" class="btn btn-outline-dark">Back</a>
        </div>
    </div>
</div>
