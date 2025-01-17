<div>
    <label for="placeholderInput" class="{{ $labelClass ?? '' }}">
        {{ $label ?? ucfirst($name) }}
        @if ($labelClass === 'required')
            <span class="text-danger">*</span>
        @endif
    </label>
    <input type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $value ?? '') }}"
        class="form-control{{ $errors->has($name) ? ' is-invalid' : '' }}" id="placeholderInput"
        placeholder="{{ $placeholder ?? '' }}"
        @if ($type === 'time') min="00:00" max="23:59" step="60" @endif>
    @if ($errors->has($name))
        <small class="text-danger">
            {{ $errors->first($name) }}
        </small>
    @endif
</div>
