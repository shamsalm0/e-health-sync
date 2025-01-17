<div class='row row-form row-cols-1 row-cols-md-2 row-cols-lg-4 g-3 row-cols-xl-4'>
    <x-form.text-input name="name" type="text" :value="$user->name" labelClass="required" label="Name"
        placeholder="name" />
    <x-form.text-input name="email" type="text" :value="$user->email" labelClass="required" label="Email"
        placeholder="email" readonly />
    <x-form.text-input name="username" type="text" :value="$user->username" labelClass="required" label="Username"
        placeholder="username" :readonly="$user->login_status == 1" />
    <x-form.text-input name="contact" type="text" :value="$user->contact" labelClass="required" label="Contact"
        placeholder="contact" />
    <x-form.text-input name="nid" type="text" :value="$user->nid" labelClass="" label="Nid"
        placeholder="nid" />
    <x-form.text-input name="address" type="text" :value="$user->address" labelClass="" label="Address"
        placeholder="address" />
</div>

<div class="w-100">
    @php
        $userRoles = $user->getRoleNames();
    @endphp
    <label class="required">Permission Group </label>
    <select name="roles[]" size="{{ count($roles) }}" multiple
        class="form-control @error('roles') is-invalid @enderror">
        @foreach ($roles as $role)
            @php
                $isSelected = in_array($role, $userRoles->toArray());
            @endphp
            <option value="{{ $role }}" {{ $isSelected ? 'selected' : '' }}>
                {{ ucwords(str_replace('-', ' ', $role)) }}
            </option>
        @endforeach
    </select>
    @error('roles')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="box-footer mt-3">
    <button type="submit" class="btn btn-sm btn-primary">{{ __('Submit') }}</button>
    <a href="{{ route('user.index') }}" class="btn btn-sm btn-outline-danger">Back</a>
</div>
