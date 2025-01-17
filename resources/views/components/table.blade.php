<div class="table-responsive  table-card">
    <table class="{{ $class }} " @if ($id) id="{{ $id }}" @endif>
        {{ $slot }}
    </table>
</div>
