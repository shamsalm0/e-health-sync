@extends('layouts.master')
@section('title')
    Show Agent Commission
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Agent Commission
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            agent-commission.index
        @endslot
        @slot('title')
            Show Agent Commission
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-body">
            <x-table class="table mb-0">
                <tr>
                    <td width="160">Agent Type</td>
                    <td width="30" class="text-center">:</td>
                    <th>
                        @if($agentCommission->agent_type == 1)
                            {{ 'Person' }}
                        @elseif($agentCommission->agent_type == 2)
                            {{ 'organization' }}
                        @endif
                    </th>
                </tr>
                <tr>
                    <td width="160">Agent Id</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $agentCommission->agent?->name }}</th>
                </tr>
                <tr>
                    <td width="160">Test Id</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $agentCommission->test?->name }}</th>
                </tr>
                <tr>
                    <td width="160">Is Percent</td>
                    <td width="30" class="text-center">:</td>
                    <th><x-status :status="$agentCommission->is_percent" label="true"/></th>
                </tr>
                <tr>
                    <td width="160">Status</td>
                    <td width="30" class="text-center">:</td>
                    <th><x-status :status="$agentCommission->status" /></th>
                </tr>
            </x-table>
        </div>
    </div>
    <a href="{{ route('agent-commission.index') }}" class="btn btn-outline-dark">Back</a>
@endsection
