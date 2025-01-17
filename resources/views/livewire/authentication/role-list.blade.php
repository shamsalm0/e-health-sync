{{--<div>--}}
{{--    <div class="row">--}}
{{--        <div class="col-lg-12">--}}
{{--            <div class="card" id="ticketsList">--}}
{{--                <div class="card-header border-0">--}}
{{--                    <div class="d-flex justify-content-between align-items-center">--}}
{{--                        <x-per-page />--}}
{{--                        <div class="flex-shrink-0">--}}
{{--                            <div class="d-flex flex-wrap gap-2 align-items-center">--}}
{{--                                <h5 class="card-title mb-0">Total: {{ $roles->total() }}</h5>--}}
{{--                                @can('Role Add')--}}
{{--                                    <a class="btn btn-success add-btn" href="{{ route('roles.create') }}"><i--}}
{{--                                            class="ri-add-line align-bottom me-1"></i> Create Role</a>--}}
{{--                                @endcan--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div wire:loading class="wireload">--}}
{{--                    <x-loading />--}}
{{--                </div>--}}
{{--                <div class="card-body border border-dashed border-end-0 border-start-0">--}}
{{--                    <x-alert />--}}
{{--                    @row--}}
{{--                        <div>--}}
{{--                            <x-form.search-box-live placeholder="Search for role name..." name="search" />--}}
{{--                        </div>--}}

{{--                        <div>--}}
{{--                            <select class="form-select form-select-sm" wire:model.live='role'>--}}
{{--                                <option value="">Select Permission</option>--}}
{{--                                @foreach ($permissions as $id => $permission_name)--}}
{{--                                    <option value="{{ $id }}">{{ $permission_name }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    @endrow--}}
{{--                    <!--end row-->--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <div class="table-responsive table-card mb-4">--}}
{{--                        <table class="table table-hover table-striped align-middle table-nowrap table-sm"--}}
{{--                            style="margin-bottom: 100px">--}}
{{--                            <thead>--}}
{{--                                <tr>--}}
{{--                                    <th scope="col" class="text-center">#</th>--}}
{{--                                    <th scope="col">Name</th>--}}
{{--                                    <th scope="col" class="text-center">Action</th>--}}
{{--                                </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                                @foreach ($roles as $key => $role)--}}
{{--                                    <tr>--}}
{{--                                        <td scope="row" class="text-center">--}}
{{--                                            {{ ($roles->currentPage() - 1) * $roles->perPage() + $loop->iteration }}--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            {{ ucwords(str_replace('-', ' ', $role->name)) }}--}}
{{--                                        </td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <div class="dropdown d-inline-block">--}}
{{--                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"--}}
{{--                                                    data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                                    <i class="ri-more-fill align-middle"></i>--}}
{{--                                                </button>--}}
{{--                                                <ul class="dropdown-menu dropdown-menu-end">--}}
{{--                                                    @can('Role Add')--}}
{{--                                                        <li>--}}
{{--                                                            <a href="{{ route('roles.show', $role->id) }}"--}}
{{--                                                                class="dropdown-item">--}}
{{--                                                                <i class="ri-eye-fill align-bottom me-2 text-muted"></i>--}}
{{--                                                                View--}}
{{--                                                            </a>--}}
{{--                                                        </li>--}}
{{--                                                    @endcan--}}
{{--                                                    @can('Role Edit')--}}
{{--                                                        <li>--}}
{{--                                                            <a href="{{ route('roles.edit', $role->id) }}"--}}
{{--                                                                class="dropdown-item edit-item-btn">--}}
{{--                                                                <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>--}}
{{--                                                                Edit--}}
{{--                                                            </a>--}}
{{--                                                        </li>--}}
{{--                                                    @endcan--}}
{{--                                                    @can('Role Delete')--}}
{{--                                                        <li>--}}
{{--                                                            <a class="dropdown-item remove-item-btn"--}}
{{--                                                                wire:click='$dispatch("delete_resource",{{ $role->id }})'>--}}
{{--                                                                <i--}}
{{--                                                                    class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>--}}
{{--                                                                Delete--}}
{{--                                                            </a>--}}
{{--                                                        </li>--}}
{{--                                                    @endcan--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                        <!--end table-->--}}
{{--                    </div>--}}
{{--                    {!! $roles->links() !!}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <script>--}}
{{--        document.addEventListener('livewire:init', () => {--}}
{{--            Livewire.on('delete_resource', (id) => {--}}
{{--                Swal.fire({--}}
{{--                    title: 'Are You Sure?',--}}
{{--                    html: "You won't be able to revert this!",--}}
{{--                    icon: 'warning',--}}
{{--                    showCancelButton: true,--}}
{{--                }).then((result) => {--}}
{{--                    if (result.value) {--}}
{{--                        @this.call('delete', id)--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--</div>--}}
<div>
    {{-- start header  --}}
    <div class="mb-3 ">
        <x-alert />
        <div wire:loading class="wireload">
            <x-loading />
        </div>
        <x-list-header total="{{ $roles->total() }}">
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
            @can('Role Add')
                <a class="btn btn-primary" href="{{ route('roles.create') }}">
                    <i class="mdi mdi-plus"></i> Add Permission
                </a>
            @endcan
        </x-list-header>

        <div class="@if (!$filter) d-none @endif">
            <x-search-row>
                <div wire:ignore>
                    <label for="" class="search-label">Select Permission</label>
                    <select class="form-select" id="selectStatus">
                        <option value="">Select Permission</option>
                        @foreach ($permissions as $id => $permission_name)
                            <option value="{{ $id }}">{{ $permission_name }}</option>
                        @endforeach
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
                            <th>Sl. No.</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </x-thead>
                    <x-tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $roles->firstItem() + $loop->index }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @canany(['Role View', 'Role Edit', 'Role Delete'])
                                        <div class="dropdown d-inline-block">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                @can('Role Edit')
                                                    <li>
                                                        <a href="{{ route('roles.edit', $role->id) }}"
                                                           class="dropdown-item edit-item-btn">
                                                            <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                            Edit
                                                        </a>
                                                    </li>
                                                @endcan
                                                @can('Role Delete')
                                                    <li>
                                                        <a type="button" class="dropdown-item remove-item-btn"
                                                           wire:click='$dispatch("delete_resource",{{ $role->id }})'>
                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                            Delete
                                                        </a>
                                                    </li>
                                                @endcan
                                            </ul>
                                        </div>
                                    @endcanany
                                </td>
                            </tr>
                        @endforeach
                    </x-tbody>
                </x-table>
            </div>
        </div>
        {{ $roles->links() }}
    </div>

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('delete_resource', (id) => {
                Swal.fire({
                    title: 'Are You Sure?',
                    html: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                }).then((result) => {
                    if (result.value) {
                        @this.call('delete', id)
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
            $wire.$set('permission', e.target.value);
        });
    });

    // Reinitialize Select2 after Livewire updates
    document.addEventListener('livewire:load', function() {
        //
    });
</script>
@endscript
