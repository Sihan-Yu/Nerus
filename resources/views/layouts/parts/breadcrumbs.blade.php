@section('breadcrumbs')
    <ol class="breadcrumb">

        @foreach($breadcrumbs as $item)

            @if ($item['active'])
                <li class="active"><a href="#"><i class="{{ $item['icon'] }}"></i> {{ $item['text'] }}</a></li>
            @else
                <li><a href="{{ $item['route'] }}"><i class="{{ $item['icon'] }}"></i> {{ $item['text'] }}</a></li>
            @endif

        @endforeach

    </ol>
@endsection