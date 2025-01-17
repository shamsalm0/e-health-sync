<div class="row row-cols-1 row-cols-md-2 row-form gx-3">
    <div>
        <label for="" class="required">Select Bank</label>
        <span class="text-danger">*</span>
        <select name="bank_id" wire:model.live='bank_id' class="form-select @error('bank_id') is-invalid @enderror">
            @foreach ($banks as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
        @error('bank_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="" class="required">Select Branch</label>
        <span class="text-danger">*</span>
        <select name="bank_branch_id" wire:model.live='bank_branch_id' class="form-select @error('bank_branch_id') is-invalid @enderror">
            @foreach ($branches as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
        @error('bank_branch_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
