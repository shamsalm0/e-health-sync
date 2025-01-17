<div>
    <label for="{{ $id }}">{{ $label }}</label>
    <select
        @if ($wire == 'default') wire:model="{{ $name }}" @else wire:model.live="{{ $name }}" @endif
        class="form-select {{ $class }} @error($name) is-invalid @enderror" id="{{ $id }}"
        name="{{ $name }}" value="{{ $value ?? old($name) }}">
        @if ($placeholder)
            <option value="">{{ $placeholder }}</option>
        @endif
        @foreach ($options as $key => $val)
            <option value="{{ $key }}" @selected((string) $key === ($value ?? old($name)))>{{ $val }}</option>
        @endforeach
    </select>
    @error($name)
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
