<div>
    {{-- start header  --}}
    <div class="mb-3 ">
        <x-alert />
        <div wire:loading class="wireload">
            <x-loading />
        </div>
        <x-list-header total="{{ $users->total() }}">
            <button type="button"
                    wire:click="@if ($filter) $set('filter', false) @else $set('filter', true) @endif"
                    class="btn btn-soft-secondary btn-border">
                @if ($filter)
                    <i class="mdi mdi-filter-off-outline"></i>
                @else
                    <i class="mdi mdi-filter-outline"></i>
                @endif
                Filter
            </button>
            @can('Permission Add')
                <a class="btn btn-primary" href="{{ route('user.create') }}">
                    <i class="mdi mdi-plus"></i> Create User
                </a>
            @endcan
        </x-list-header>

        <div class="@if (!$filter) d-none @endif">
            <x-search-row>
                <div wire:ignore>
                    <label for="" class="search-label">Status</label>
                    <select class="form-select " id="selectStatus">
                        <option value="">Select</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <div>
                    <label for="" class="search-label">Search</label>
                    <input type="text" wire:model.live='search' class="form-control" placeholder="Search">
                </div>
            </x-search-row>
        </div>

    </div>
    {{-- end header  --}}

    <div class="">
        <div class="card mb-3">
            <div class="card-body">
                <x-table>
                    <x-thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Contact Info</th>
                            <th>Roles</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </x-thead>
                    <x-tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th>
                                    {{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}
                                </th>
                                <td>{{ $user->username }}</td>
                                <td>
                                    {{ $user->email }}
                                    <div><a href="callto:{{ $user->contact }}">{{ $user->contact }}</a></div>
                                </td>
                                <td>
                                    @foreach ($user->getRoleNames() as $role)
                                        <label
                                            class="badge bg-primary">{{ ucwords(str_replace('-', ' ', $role)) }}</label>
                                    @endforeach
                                </td>
                                <td class="text-center align-middle">
                                <x-status :status="$user->status" />
                                    {{-- <div class="d-flex justify-content-center align-items-center">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="SwitchCheck{{ $user->id }}"
                                                wire:click="@can('User Edit') toggleStatus({{ $user->id }}) @endcan"
                                                @if ($user->status == 1) checked @endif
                                                @cannot('User Edit') disabled @endcannot>
                                        </div>
                                    </div> --}}
                                </td>
                                <td class="text-center">
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            @can('User View')
                                                <li>
                                                    <a href="{{ route('user.show', $user->id) }}"
                                                       class="dropdown-item">
                                                        <i class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                        View
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('User Edit')
                                                <li>
                                                    <a href="{{ route('user.edit', $user->id) }}"
                                                       class="dropdown-item edit-item-btn">
                                                        <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                        Edit
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('User Edit')
                                                <li>
                                                    <a class="dropdown-item remove-item-btn custom-pointer"
                                                       wire:click="$dispatch('delete_resource', { id: {{ $user->id }}, method: 'toggleStatus' })">
                                                        <i
                                                            class="{{ $user->status ? ' ri-pause-circle-fill' : 'ri-play-circle-fill' }} align-bottom me-2 text-muted"></i>
                                                        {{ $user->status ? 'Inactive' : 'Active' }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item remove-item-btn custom-pointer"
                                                       wire:click="$dispatch('delete_resource', { id: {{ $user->id }}, method: 'toggleOTP' })">
                                                        <i
                                                            class="{{ $user->otp_verified ? 'ri-lock-unlock-fill' : 'ri-lock-2-fill' }} align-bottom me-2 text-muted"></i>
                                                        {{ $user->otp_verified ? 'Disable OTP' : 'Enable OTP' }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item remove-item-btn custom-pointer"
                                                       wire:click="$dispatch('delete_resource', { id: {{ $user->id }}, method: 'toggleEmailStatus' })">
                                                        <i
                                                            class="{{ $user->mail_verified ? 'ri-lock-unlock-fill' : 'ri-lock-2-fill' }} align-bottom me-2 text-muted"></i>
                                                        {{ $user->mail_verified ? 'Disable Email Verification' : 'Enable Email Verification' }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item remove-item-btn custom-pointer"
                                                       wire:click="$dispatch('delete_resource', { id: {{ $user->id }}, method: 'toggleContactStatus' })">
                                                        <i
                                                            class="{{ $user->contact_verified ? 'ri-lock-unlock-fill' : 'ri-lock-2-fill' }} align-bottom me-2 text-muted"></i>
                                                        {{ $user->contact_verified ? 'Disable Contact Verification' : 'Enable Contact Verification' }}
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('User Delete')
                                                <li>
                                                    <a class="dropdown-item remove-item-btn custom-pointer"
                                                       wire:click="$dispatch('delete_resource', { id: {{ $user->id }}, method: 'delete' })">
                                                        <i
                                                            class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                        Delete
                                                    </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </x-tbody>
                </x-table>
            </div>
        </div>
        {{ $users->links() }}
    </div>

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('delete_resource', ({
                id,
                method
            }) => {
                Swal.fire({
                    title: 'Are You Sure?',
                    html: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                }).then((result) => {
                    if (result.value) {
                        if (method === 'delete') {
                            @this.call('delete', id)
                        } else if (method === 'toggleStatus') {
                            @this.call('toggleStatus', id)
                        } else if (method === 'toggleOTP') {
                            @this.call('toggleOTPStatus', id)
                        } else if (method === 'toggleEmailStatus') {
                            @this.call('toggleEmailStatus', id)
                        } else if (method === 'toggleContactStatus') {
                            @this.call('toggleContactStatus', id)
                        }
                    }
                });
            });
        });
    </script>
</div>
@script
<script>
    $(document).ready(function() {
        $('#selectStatus').select2();
        // Listen for change and update the Livewire property
        $('#selectStatus').on('change', function(e) {
            $wire.$set('status', e.target.value);
        });
    });

    // Reinitialize Select2 after Livewire updates
    document.addEventListener('livewire:load', function() {
        //
    });
</script>
@endscript
