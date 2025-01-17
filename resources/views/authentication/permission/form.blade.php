<x-row>
    <div>
        <label for="" class="required">Permission Name</label>
        <input type="text" value="{{ old('name', $permission->name) }}" placeholder="Permission Name"
            class="form-control  @error('name') is-invalid @enderror" name="name">
        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</x-row>
<div class="mt-3">
    <button class="btn btn-primary btn-sm">Save</button>
    <a href="{{ route('permission.index') }}" class="btn btn-outline-danger btn-sm">Cancel</a>
</div>
