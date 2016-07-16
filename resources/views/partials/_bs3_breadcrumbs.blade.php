@if ($breadcrumbs)
    <ul class="breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)
            @if (!$breadcrumb->last)
                <li><a href="{{ $breadcrumb->url }}">
                        @if($breadcrumb->title == 'Home')
                            <i class="fa fa-home"></i>
                        @else
                            {{ $breadcrumb->title }}
                        @endif
                    </a>
                </li>
            @else
                <li class="active">
                    @if($breadcrumb->title == 'Home')
                        <i class="fa fa-home"></i>
                    @else
                        {{ $breadcrumb->title }}
                    @endif
                </li>
            @endif
        @endforeach
    </ul>
@endif