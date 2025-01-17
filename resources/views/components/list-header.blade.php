<div class="d-flex justify-content-between flex-wrap mb-1 align-items-start">
    <div>
        <select name="per_page" wire:model.live='per_page' class="form-select form-select-sm">
            <option>2</option>
            <option>15</option>
            <option>25</option>
            <option>50</option>
            <option>100</option>
            <option>250</option>
            <option>500</option>
        </select>
    </div>
    <div class="d-flex align-items-center gap-2">
        @if ($total !== null)
            <span style="font-size: 17px; font-weight: 400">Total: <b
                    style="font-weight: 600;">{{ $total }}</b></span>
        @endif
        {{ $slot }}
    </div>
</div>
