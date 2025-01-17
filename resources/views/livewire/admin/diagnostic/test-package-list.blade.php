<div>
    {{-- start header  --}}
    <div class="mb-3 ">
        <x-alert />
        <div wire:loading class="wireload">
            <x-loading />
        </div>
        <x-list-header total="{{ $testPackages->total() }}">
            @can('Test Package Add')
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
            @endcan
        </x-list-header>

        <div class="@if (!$filter) d-none @endif">
            <form wire:submit.prevent="saveOrUpdate">
                <x-search-row>
                        <div class="mb-3">
                            <input type="text" wire:model="name" value="{{ old('name') }}"
                                   class="form-control form-control-sm{{ $errors->has("name") ? ' is-invalid' : '' }}" id="name"
                                   placeholder="Enter Name">
                            @if ($errors->has("name"))
                                <small class="text-danger">
                                    {{ $errors->first("name") }}
                                </small>
                            @endif
                        </div>
                        <div class="mb-3">
                            <input type="text" wire:model="description" value="{{ old('description') }}"
                                   class="form-control form-control-sm{{ $errors->has("description") ? ' is-invalid' : '' }}" id="description"
                                   placeholder="Enter Description">
                            @if ($errors->has("description"))
                                <small class="text-danger">
                                    {{ $errors->first("description") }}
                                </small>
                            @endif
                        </div>
                    <div>
                        <button type="submit" class="btn btn-sm btn-primary">
                            @if($editing) Update @else Save @endif
                        </button>
                    </div>
                </x-search-row>
            </form>
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
                            <th>Description</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </x-thead>
                    <x-tbody>
                        @foreach ($testPackages as $testPackage)
                            <tr>
                                <td>{{ $testPackages->firstItem() + $loop->index }}</td>
                                <th>{{ $testPackage->name }}</th>
                                <td>{{ $testPackage->description }}</td>
{{--                                <td><x-status :status="$testPackage->status" /></td>--}}
                                <td class="text-center align-middle">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                   id="SwitchCheck{{ $testPackage->id }}"
                                                   wire:click="@can('Test Package Edit') toggleStatus({{ $testPackage->id }}) @endcan"
                                                   @if ($testPackage->status == 1) checked @endif
                                                   @cannot('Test Package Edit') disabled @endcannot>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    @canany(['Test Package Edit', 'Test Package Delete'])
                                        <div class="dropdown d-inline-block">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                @can('Test Package Edit')
                                                    <li>
                                                        <button wire:click="edit({{ $testPackage->id }})" class="dropdown-item edit-item-btn">
                                                            <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                            Edit
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('package-details', $testPackage->id) }}"
                                                           class="dropdown-item">
                                                            <i class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                            Add test
                                                        </a>
                                                    </li>
                                                @endcan
                                                @can('Test Package Delete')
                                                    <li>
                                                        <a type="button" class="dropdown-item remove-item-btn"
                                                           wire:click='$dispatch("delete_resource",{{ $testPackage->id }})'>
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
        {{ $testPackages->links() }}
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
            $wire.$set('status', e.target.value);
        });
    });

    // Reinitialize Select2 after Livewire updates
    document.addEventListener('livewire:load', function() {
        //
    });
</script>
@endscript
