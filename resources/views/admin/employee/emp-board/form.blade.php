<div class="card">
    <div class="card-body">
        <x-row>
            <x-input name="name" :value="$empBoard?->name" />
            <x-input name="is_board" :value="$empBoard?->is_board" />
            <x-form.select :options="$statuses" :selected="$empBoard?->status" required="" name="status" label="Status" />
        </x-row>
    </div>
    <div class="card-footer">
        <div class="">
            <button class="btn btn-primary">Save</button>
            <a href="{{ route('emp-board.index') }}" class="btn btn-outline-dark">Back</a>
        </div>
    </div>
</div>
