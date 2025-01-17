<div class="row row-cols-1 row-cols-sm-2 row-cols-lg-2 row-form gx-3 gy-3">
    <div>
        <label for="" class="required">Select Current District</label>
        <select name="c_district_id" wire:model.live="c_district_id" class="form-control form-select @error('c_district_id') is-invalid @enderror">
            @foreach ($districts as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
        @error('c_district_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="" class="required">Select Current Upazila</label>
        <select name="c_upazila_id" wire:model.live="c_upazila_id" class="form-control form-select @error('c_upazila_id') is-invalid @enderror">
            @foreach ($upazilas as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
        @error('c_upazila_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
