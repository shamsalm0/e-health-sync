<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0 font-size-18">{{ $title }}</h4>
    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item">
                <a href="javascript: void(0);">{{ $li1 ?? '' }}</a>
            </li>
            @if (isset($li2))
                <li class="breadcrumb-item">
                    <a href="{{ route("$li2Url") }}">{{ $li2 }}</a>
                </li>
            @endif
            @if (isset($title))
                <li class="breadcrumb-item active">{{ $title }}</li>
            @endif
        </ol>
    </div>
</div>
