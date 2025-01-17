<div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-form gx-3 gy-3">
    <div>
        <label for="" class="required">Select Division</label>
        <select name="division_id" wire:model.live="division_id" class="form-control custom-select @error('division_id') is-invalid @enderror">
            @foreach ($divisions as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
        @error('division_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="" class="required">Select District</label>
        <select name="district_id" wire:model.live="district_id" class="form-control custom-select @error('district_id') is-invalid @enderror">
            @foreach ($districts as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
        @error('district_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="" class="required">Select Upazila</label>
        <select name="upazila_id" wire:model.live="upazila_id" class="form-control custom-select @error('upazila_id') is-invalid @enderror">
            @foreach ($upazilas as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
        @error('upazila_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
