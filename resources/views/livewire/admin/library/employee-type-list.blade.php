<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="ticketsList">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <x-per-page />
                        <div class="flex-shrink-0">
                            <div class="d-flex flex-wrap gap-2 align-items-center">
                                <h5 class="card-title mb-0">Total: {{ $employeeTypes->total() }}</h5>
                                @can('Employee Type Add')
                                <a class="btn btn-success add-btn" href="{{ route('employee-type.create') }}"><i
                                        class="ri-add-line align-bottom me-1"></i> Create
                                    Employee Type</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
                <div wire:loading class="wireload">
                    <x-loading />
                </div>
                <div class="card-body border border-dashed border-end-0 border-start-0">
                    <x-alert />
                    @row
                        <div>
                            <x-form.search-box-live placeholder="Employee type name ..." name="search" />
                        </div>

                        {{-- <div class="col-xxl-3 col-sm-4">
                            <select class="form-select" wire:model.live='status'>
                                <option value="" selected>Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div> --}}
                        <div class="col-xxl-3 col-sm-4" wire:ignore>
                            <select class="js-example-basic-single form-select border-light">
                                <option value="" selected>Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <!--end col-->
                    @endrow
                    <!--end row-->
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card mb-4">
                        <table class="table table-hover table-striped align-middle table-nowrap table-sm"
                            style="margin-bottom: 100px">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col" class="text-center">Status</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employeeTypes as $employeeType)
                                    <tr>
                                        <th scope="row" class="text-center">
                                            {{ ($employeeTypes->currentPage() - 1) * $employeeTypes->perPage() + $loop->iteration }}
                                        </th>
                                        <td>{{ $employeeType->name }}</td>
                                        <td class="text-center align-middle">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="SwitchCheck{{ $employeeType->id }}"
                                                        wire:click="@can('Employee Type Edit') toggleStatus({{ $employeeType->id }}) @endcan"
                                                        @if ($employeeType->status == 1) checked @endif
                                                        @cannot('Employee Type Edit') disabled @endcannot>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        @can('Employee Type Edit')
                                                        <a href="{{ route('employee-type.edit', $employeeType->id) }}"
                                                            class="dropdown-item edit-item-btn">
                                                            <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                            Edit
                                                        </a>
                                                        @endcan
                                                    </li>
                                                    <li>
                                                        @can('Employee Type Delete')
                                                        <a class="dropdown-item remove-item-btn"
                                                            wire:click='$dispatch("delete_resource",{{ $employeeType->id }})'>
                                                            <i
                                                                class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                            Delete
                                                        </a>
                                                        @endcan
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!--end table-->
                    </div>
                    {!! $employeeTypes->links() !!}
                </div>
            </div>
        </div>
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
@assets
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endassets
@script
    {{-- <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
            $('.js-example-basic-single').on('change', function(e) {
                $wire.$set('status', e.target.value);
            })
        });
    </script> --}}

    <script>
        function initializeSelect2() {
            $('.js-example-basic-single').select2();

            $('.js-example-basic-single').on('change', function(e) {
                $wire.$set('status', e.target.value);
            });
        }

        $(document).ready(function() {
            $('.js-example-basic-single').select2();

            // Listen for change and update the Livewire property
            $('.js-example-basic-single').on('change', function(e) {
                $wire.$set('status', e.target.value);
            });
        });

        // Reinitialize Select2 after Livewire updates
        document.addEventListener('livewire:load', function() {
            Livewire.hook('message.processed', (message, component) => {
                initializeSelect2();
            });
        });
    </script>
@endscript
