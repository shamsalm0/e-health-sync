@extends('admin.employee.base')
@section('form')
    <form action="{{ route('employee.bank.store', $employee->id) }}" method="POST">
        @csrf
        @row
            {{-- <x-form.select :options="$banks" :selected="$emp_bank_info->bank_id" name="bank_id" label="Bank" />
            <x-form.select :options="$bankBranches" :selected="$emp_bank_info->bank_branch_id" name="bank_branch_id" label="Bank Branch" /> --}}
                <div class="col-6" style="width: 50% !important;">
                    @livewire('select.bank-branch')
                </div>
            <x-form.text-input name="account_name" type="text" :value="$emp_bank_info->account_name" labelClass="required" label="Account name"
                placeholder="Account name" />
            <x-form.text-input name="account_no" type="text" :value="$emp_bank_info->account_no" labelClass="required" label="Account No"
                placeholder="Account No" />
        @endrow
        <div class="box-footer mt-3">
            <button type="submit" class="btn btn-primary btn-sm">Save</button>
        </div>

    </form>
@endsection
