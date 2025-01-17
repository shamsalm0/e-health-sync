<div class="card">
    <div class="card-body">
        <x-row>
            <x-input name="name" :value="$otherService?->name" />
            <x-input name="price" :value="$otherService?->price" />
            <x-form.select :options="$services" :selected="$otherService->service_id" name="service_id" label="Select Service" />
            <x-input name="description" :value="$otherService?->description" />
            <x-form.select :options="$doctor_statuses" :selected="$otherService->doctor_status" name="doctor_status" label="Doctor Status" />
            <x-form.select :options="$nurse_statuses" :selected="$otherService->nurse_status" name="nurse_status" label="Nurse Status" />
            <x-form.select :options="$word_boy_statuses" :selected="$otherService->word_boy_status" name="word_boy_status" label="Word Boy Status" />
            <x-form.select :options="$statuses" :selected="$otherService->status" name="status" label="Status" />
        </x-row>
    </div>
    <div class="card-footer">
        <div class="">
            <button class="btn btn-primary">Save</button>
            <a href="{{ route('other-service.index') }}" class="btn btn-outline-dark">Back</a>
        </div>
    </div>
</div>
