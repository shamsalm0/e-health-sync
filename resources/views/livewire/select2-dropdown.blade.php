<div>
    <div class="row">
        <div class="col-lg-4" wire:ignore>
            <h6 class="fw-semibold">Select {{ $name }}</h6>
            <select id="{{ $name }}">
                <option value="" selected>Choose {{ $name }}</option>
                @foreach ($options as $option)
                    <option value="{{ $option->id }}">{{ $option->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
@assets
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endassets
@script
    <script>
        $(document).ready(function() {
            selectTwo();
        });

        function selectTwo() {
            var initialOptions = {!! json_encode(
                $options->map(function ($option) {
                    return ['id' => $option->id, 'text' => $option->name];
                }),
            ) !!};

            $('#{{ $name }}').select2({
                placeholder: 'Choose'.$name,
                allowClear: true,
                minimumInputLength: 0, // Allow search without any input to show initial data
                ajax: {
                    transport: function(params, success, failure) {
                        var term = params.data.term;

                        if (!term || term.length === 0) {
                            // If no search term, return initial options
                            success({
                                results: initialOptions
                            });
                            return;
                        }

                        // Else, proceed with AJAX request
                        var request = $.ajax({
                            url: '{{ $searchRoute }}',
                            dataType: 'json',
                            delay: 250,
                            data: {
                                term: term
                            },
                        });

                        request.then(function(data) {
                            // Map the data to the format Select2 expects
                            var results = data.map(function(item) {
                                return {
                                    id: item.id,
                                    text: item.name
                                };
                            });
                            success({
                                results: results
                            });
                        });
                        request.fail(failure);
                    },
                    processResults: function(data) {
                        // Since we formatted data in transport, just return it
                        return data;
                    },
                    cache: true,
                },
            });

            // Synchronize the value between Select2 and Livewire
            $('#{{ $name }}').on('change', function(event) {
                var selectedValue = $(this).val();
                $wire.$set('selectValue', selectedValue);
            });
        }

        Livewire.hook('message.processed', (message, component) => {
            selectTwo();
        });
    </script>
@endscript
