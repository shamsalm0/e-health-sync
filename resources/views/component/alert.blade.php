@if (session()->has('message'))
    @php
        $alertType = 'secondary';
        $type = strtolower(session('type'));
        if ($type) {
            if ($type == 'success') {
                $alertType = 'success';
            } elseif ($type == 'warning') {
                $alertType = 'warning';
            } elseif ($type == 'danger') {
                $alertType = 'danger';
            } elseif ($type == 'info') {
                $alertType = 'info';
            }
        }
    @endphp
    <div class="alert alert-{{ $alertType }} alert-dismissible alert-label-icon rounded-label shadow fade show"
        role="alert">
        <i class="ri-notification-off-line label-icon"></i>
        @if ($type)
            <strong>{{ ucfirst($type) }} : </strong>
        @endif
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
