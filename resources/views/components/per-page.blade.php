<div class="d-flex flex-wrap align-items-center mb-2">
{{-- <span class="mr-2">Per Page</span> --}}
<select wire:model.live='per_page' class="form-select">
        <option>15</option>
        <option>30</option>
        <option>50</option>
        <option>100</option>
        <option>250</option>
        <option>500</option>
    </select>
</div>
{{-- <div>
    <select wire:model.live='per_page' class="form-control" data-choices
        id="idStatus">
        <option value="15">15</option>
        <option value="30">30</option>
        <option value="50">50</option>
    </select>
</div>
@section('script')
<script src="{{ URL::asset('build/js/pages/ecommerce-order.init.js') }}"></script>
@endsection --}}