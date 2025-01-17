<div class="input-light">
    <label class="form-label">
        {{ $label ?? '' }}
        @if ($labelClass === 'required')
            <span class="text-danger">*</span>
        @endif
    </label>
    <select class="form-select {{ $errors->has($name) ? ' is-invalid' : '' }}" data-choices
        data-choices-search-false name="{{ $name ?? '' }}" id="idStatus">
        {{-- <option value="" disabled {{ $selected == '' ? 'selected' : '' }}>Status</option> --}}
        @foreach ($options as $key => $option)
            <option value="{{ $key }}" @selected((old($name) ?? $selected) == $key)>
                {{ $option }}
            </option>
        @endforeach
    </select>
    @if ($errors->has($name))
        <small class="text-danger">
            {{ $errors->first($name) }}
        </small>
    @endif
</div>
