<div class='row row-form row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 row-cols-xl-4'>
    {{$slot}}
</div>

<div class="box-footer mt-3">
    <button type="submit" class="btn btn-primary btn-sm">Save</button>
    <a href="{{ $cancelRoute ?? '#' }}" class="btn btn-outline-danger btn-sm">Cancel</a>
</div>