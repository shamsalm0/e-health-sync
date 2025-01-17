@extends('layouts.master')
@section('title')
   Test Name Details
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Diagnosis
        @endslot
        @slot('li2')
            Test Name
        @endslot
        @slot('li2Url')
            test-name.index
        @endslot
        @slot('title')
            Test Name Details
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-body">
            <x-table class="table mb-0">
                <tr>
                    <td width="160">Test Group</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $testName->test_group_id }}</th>
                </tr>
                <tr>
                    <td width="160">Test Name</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $testName->name }}</th>
                </tr>
                <tr>
                    <td width="160">Cost</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $testName->cost }}</th>
                </tr>
                <tr>
                    <td width="160">Department Id</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $testName->department_id }}</th>
                </tr>
                <tr>
                    <td width="160">Is Sample</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $testName->is_sample }}</th>
                </tr>
                <tr>
                    <td width="160">Lab Room Id</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $testName->lab_room_id }}</th>
                </tr>
                <tr>
                    <td width="160">Sample Room Id</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $testName->sample_room_id }}</th>
                </tr>
                <tr>
                    <td width="160">Delivery Time</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $testName->delivery_time }}</th>
                </tr>
                <tr>
                    <td width="160">Report Type Id </td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $testName->report_type_id }}</th>
                </tr>
                <tr>
                    <td width="160">Is Lavel Print</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $testName->is_level_print }}</th>
                </tr>
                <tr>
                    <td width="160">Is Ticket Show</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $testName->is_ticket_show }}</th>
                </tr>
                <tr>
                    <td width="160">Is Discount</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $testName->is_discount }}</th>
                </tr>
                <tr>
                    <td width="160">Is Attribute Group</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $testName->is_attribute_group }}</th>
                </tr>
                <tr>
                    <td width="160">Is Title Show</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $testName->is_title_show }}</th>
                </tr>
                <tr>
                    <td width="160">Is Unit Show</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $testName->is_unit_show }}</th>
                </tr>
                <tr>
                    <td width="160">Is Normal Unit</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $testName->is_normal_unit }}</th>
                </tr>
                <tr>
                    <td width="160">Is Normal No Unit</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $testName->is_normal_no_unit }}</th>
                </tr>
                <tr>
                    <td width="160">Is Dialysis</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $testName->is_dialysis }}</th>
                </tr>
                <tr>
                    <td width="160">Is Physiotherapy</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $testName->is_physiotherapy }}</th>
                </tr>
                <tr>
                    <td width="160">Is Test</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $testName->is_test }}</th>
                </tr>
                <tr>
                    <td width="160">Free Amount</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $testName->free_amount }}</th>
                </tr>
                <tr>
                    <td width="160">UOM</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $testName->uom_id }}</th>
                </tr>
                <tr>
                    <td width="160">Comment</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $testName->comment }}</th>
                </tr>
                
                <tr>
                    <td width="160">Status</td>
                    <td width="30" class="text-center">:</td>
                    <th><x-status :status="$testName->status" /></th>
                </tr>
            </x-table>
        </div>
    </div>
    <a href="{{ route('test-name.index') }}" class="btn btn-outline-dark">Back</a>
@endsection

