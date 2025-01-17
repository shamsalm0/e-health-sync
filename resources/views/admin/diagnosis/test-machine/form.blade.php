<x-row>
    <x-form.select :options="$testNames" :selected="$testMachine?->test_name_id" name="test_name_id" label="Select Test" />
    <x-form.select :options="$machines" :selected="$testMachine?->machine_id" name="machine_id" label="Select Machine" />
    <x-form.select :options="$statuses" :selected="$testMachine?->status" name="status" label="Select Status" />
</x-row>
<div class="box-footer mt-3">
    <button type="submit" class="btn btn-primary btn-sm">Save</button>
    <a href="{{ route('test-machine.index') }}" class="btn btn-outline-danger btn-sm">Back</a>
</div>
