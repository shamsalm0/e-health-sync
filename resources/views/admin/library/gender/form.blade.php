<x-row>
    <x-input name="name" :value="$gender?->name" />
    <x-form.select :options="$statuses" :selected="$gender?->status" name="status" label="Status" />
</x-row>
<div class="mt-3">
    <button class="btn btn-primary btn-sm">Save</button>
    <a href="{{ route('gender.index') }}" class="btn btn-outline-danger btn-sm">Back</a>
</div>
