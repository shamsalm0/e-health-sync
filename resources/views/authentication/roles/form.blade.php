@row
    <div>
        <label for="" class="required">Permission Name</label>
        <input type="text" value="{{ old('name', $permission->name) }}"
            class="form-control  @error('name') is-invalid @enderror" name="name">
        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
@endrow
<div class="mt-3">
    <button class="btn btn-primary">Save</button>
</div>
