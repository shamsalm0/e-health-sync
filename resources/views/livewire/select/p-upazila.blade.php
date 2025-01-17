<div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-form gx-3 gy-3">
    <div>
        <label for="" class="required">Select P_Division</label>
        <select name="p_division_id" wire:model.live="p_division_id" class="form-control custom-select @error('p_division_id') is-invalid @enderror">
            @foreach ($divisions as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
        @error('p_division_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="" class="required">Select P_District</label>
        <select name="p_district_id" wire:model.live="p_district_id" class="form-control custom-select @error('p_district_id') is-invalid @enderror">
            @foreach ($districts as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
        @error('p_district_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="" class="required">Select P_Upazila</label>
        <select name="p_upazila_id" wire:model.live="p_upazila_id" class="form-control custom-select @error('p_upazila_id') is-invalid @enderror">
            @foreach ($upazilas as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
        @error('p_upazila_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
