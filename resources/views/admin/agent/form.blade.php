<div class="card">
    <div class="card-body">
        <x-row>
            <x-input name="name" :value="$agent?->name" />
            <x-input name="mobile" :value="$agent?->mobile" />
            <x-input name="address" :value="$agent?->address" />
        </x-row>
    </div>
    <div class="card-footer">
        <div class="">
            <button class="btn btn-primary">Save</button>
            <a href="{{ route('agent.index') }}" class="btn btn-outline-dark">Back</a>
        </div>
    </div>
</div>
