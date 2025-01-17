<div class="row row-cols-1 row-cols-sm-2 row-cols-lg-2 row-form gx-3 gy-3">
    <div>
        <label for="" class="required">Select P District</label>
        <select name="p_district_id" wire:model.live="p_district_id" class="form-control form-select @error('p_district_id') is-invalid @enderror">
            @foreach ($districts as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
        @error('p_district_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="" class="required">Select P Upazila</label>
        <select name="p_upazila_id" wire:model.live="p_upazila_id" class="form-control form-select @error('p_upazila_id') is-invalid @enderror">
            @foreach ($upazilas as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
        @error('p_upazila_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>