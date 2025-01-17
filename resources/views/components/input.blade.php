<div>
    <label for="{{ $id }}">{{ $label }}</label>
    <input type="{{ $type }}"
        @if ($wire == 'default') wire:model="{{ $name }}" @else wire:model.live="{{ $name }}" @endif
        class="form-control {{ $class }} @error($name) is-invalid @enderror" id="{{ $id }}"
        name="{{ $name }}" value="{{ $value ?? old($name) }}" placeholder="{{ $placeholder }}">
    @error($name)
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
