<div>
    {{-- start header  --}}
    <div class="mb-3 ">
        <x-alert />
        <div wire:loading class="wireload">
            <x-loading />
        </div>
        <x-list-header total="{{ $packageDetails->total() }}">
            @can('Test Package Details Add')
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
                        <label class="form-label">Package Name</label>
                        <input type="text" value="{{ $package->name }}" class="form-control" readonly>
                    </div>
                    <div class="input-light">
                        <label class="form-label">
                            Test
                            <span class="text-danger">*</span>
                        </label>

                        <select wire:model.live="test_name_id" class="form-select @error('test_name_id') is-invalid @enderror" id="idStatus">
                            @foreach($testNames as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>

                        @error('test_name_id')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Test Cost</label>
                        <input type="text" value="{{ $test->cost ?? '' }}" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cost In Package</label>
                        <input type="text" wire:model="price" value="{{ old('price') }}" class="form-control{{ $errors->has("price") ? ' is-invalid' : '' }}" placeholder="Enter test cost">
                        @error('price')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

{{--                    <div class="mb-3">--}}
{{--                        <label class="form-label">Test Cost</label>--}}
{{--                        <input type="text" wire:model="name" value="{{ old('name') }}"--}}
{{--                               class="form-control form-control-sm{{ $errors->has("name") ? ' is-invalid' : '' }}" id="name"--}}
{{--                               placeholder="Enter Name">--}}
{{--                        @if ($errors->has("name"))--}}
{{--                            <div class="invalid-feedback">--}}
{{--                                {{ $errors->first("name") }}--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                    <div class="mb-3">--}}
{{--                        <label class="form-label">Description</label>--}}
{{--                        <input type="text" wire:model="description" value="{{ old('description') }}"--}}
{{--                               class="form-control form-control-sm{{ $errors->has("description") ? ' is-invalid' : '' }}" id="description"--}}
{{--                               placeholder="Enter Description">--}}
{{--                        @if ($errors->has("description"))--}}
{{--                            <div class="invalid-feedback">--}}
{{--                                {{ $errors->first("description") }}--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                    </div>--}}
                </x-search-row>
                <div>
                    <button type="submit" class="btn btn-sm btn-primary">
                        @if($editing) Update @else Save @endif
                    </button>
                </div>
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
                            <th>Test Name</th>
                            <th>Cost</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </x-thead>
                    <x-tbody>
                        @foreach ($packageDetails as $packageDetail)
                            <tr>
                                <td>{{ $packageDetails->firstItem() + $loop->index }}</td>
                                <th>{{ $packageDetail->testName?->name }}</th>
                                <td>{{ $packageDetail->price }}</td>
                                <td class="text-center"><x-status :status="$packageDetail->status" /></td>
                                <td class="text-center">
                                    @canany(['Test Package Details Edit', 'Test Package Details Delete'])
                                        <div class="dropdown d-inline-block">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                @can('Test Package Details Edit')
                                                    <li>
                                                        <button wire:click="edit({{ $packageDetail->id }})" class="dropdown-item edit-item-btn">
                                                            <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                            Edit
                                                        </button>
                                                    </li>
                                                @endcan
                                                @can('Test Package Details Delete')
                                                    <li>
                                                        <a type="button" class="dropdown-item remove-item-btn"
                                                           wire:click='$dispatch("delete_resource",{{ $packageDetail->id }})'>
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
        {{ $packageDetails->links() }}
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
