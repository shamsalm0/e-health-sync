<div class="card">
    <div class="card-body">
        <x-row>
            <x-form.select name="agent_type" :options="$agentTypes" :selected="$agentCommission?->agent_type" label="Agent Type"/>
            <x-form.select name="agent_id" :options="$agents" :selected="$agentCommission?->agent_id" label="Agent"/>
            <x-form.select name="test_id" :options="$testNames" :selected="$agentCommission?->test_id" label="Test"/>
            <x-form.select name="is_percent" :options="$choice" :selected="$agentCommission?->is_percent" label="Is Percent"/>
        </x-row>
    </div>
    <div class="card-footer">
        <div class="">
            <button class="btn btn-primary">Save</button>
            <a href="{{ route('agent-commission.index') }}" class="btn btn-outline-dark">Back</a>
        </div>
    </div>
</div>
