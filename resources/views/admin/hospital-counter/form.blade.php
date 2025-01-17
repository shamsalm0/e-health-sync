<div class="card">
    <div class="card-body">
        <x-row>
            <x-form.select :options="$branches" :selected="$hospitalCounter?->branch_id" name="branch_id" label="Select Branch" />
            <x-form.select :options="$buildings" :selected="$hospitalCounter?->building_id" name="building_id" label="Select Building" />
            <x-form.select :options="$floors" :selected="$hospitalCounter?->floor_id" name="floor_id" label="Select Floor" />
            <x-form.text-input name="start_time" type="time" :value="$hospitalCounter->start_time" labelClass="required" label="Start Time"
                placeholder="Start Time" />
            <x-form.text-input name="end_time" type="time" :value="$hospitalCounter->end_time" labelClass="required" label="End Time"
                placeholder="End Time" />
            <x-input name="remarks" :value="$hospitalCounter?->remarks" />
            <x-input name="name" :value="$hospitalCounter?->name" />
        </x-row>
    </div>
    <div class="card-footer">
        <div class="">
            <button class="btn btn-primary">Save</button>
            <a href="{{ route('hospital-counter.index') }}" class="btn btn-outline-dark">Back</a>
        </div>
    </div>
</div>
