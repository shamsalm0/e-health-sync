<div class="card">
    <div class="card-body">
        <x-row>
            <x-input name="name" :value="$maritalStatus?->name" />
            <x-form.select :options="$statuses" :selected="$maritalStatus?->status" name="status" label="Status" />     
        </x-row>
    </div>
    <div class="card-footer">
        <div class="">
            <button class="btn btn-primary">Save</button>
            <a href="{{ route('marital-status.index') }}" class="btn btn-outline-dark">Back</a>
        </div>
    </div>
</div>
