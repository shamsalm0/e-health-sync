<div class="card">
    <div class="card-body">
        <x-row>
            <x-form.select :options="$ticket_types" :selected="$ticketFee?->type" name="type" label="Type" />
            <x-input name="price" :value="$ticketFee?->price" />
            <x-form.select :options="$statuses" :selected="$ticketFee?->status" name="status" label="Status" />
        </x-row>
    </div>
    <div class="card-footer">
        <div class="">
            <button class="btn btn-primary">Save</button>
            <a href="{{ route('ticket-fee.index') }}" class="btn btn-outline-dark">Back</a>
        </div>
    </div>
</div>
