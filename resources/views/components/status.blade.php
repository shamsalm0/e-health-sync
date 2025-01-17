@props(['status', 'label' => false])

@php
    $badgeColor = $status == 1 ? 'bg-success' : 'bg-danger';
    $statusText = $label ? ($status == 1 ? 'Yes' : 'No') : ($status == 1 ? 'Active' : 'Inactive');
@endphp

<span class="badge {{ $badgeColor }}">{{ $statusText }}</span>
