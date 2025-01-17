<div class="card">
    <div class="card-body">
        <x-row>
            <x-input name="name" :value="$empExam?->name" />
            <x-input name="level" :value="$empExam?->level" />
            <x-form.select :options="$statuses" :selected="$empExam?->status" required="" name="status" label="Status" />
        </x-row>
    </div>
    <div class="card-footer">
        <div class="">
            <button class="btn btn-primary">Save</button>
            <a href="{{ route('emp-exam.index') }}" class="btn btn-outline-dark">Back</a>
        </div>
    </div>
</div>
