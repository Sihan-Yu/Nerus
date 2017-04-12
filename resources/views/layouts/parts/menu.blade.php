<ul class="sidebar-menu">

    <li class="header">{{ __('menu.navigation') }}</li>

    @foreach ($sidebar->roots() as $item)
        @if (!$item->hasChildren())
            <li>
                <a href="{!! $item->url() !!}">
                    <i class="{!! $item->icon !!}"></i> <span>{!! __('menu.' . $item->title) !!}</span>
                </a>
            </li>
        @else
            <li class="treeview">
                <a href="#">
                    <i class="{!! $item->icon !!}"></i> <span>{!! __('menu.' . $item->title) !!}</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    @foreach ($item->children() as $children)
                        <li><a href="{!! $children->url() !!}"><i
                                        class="{!! $children->icon !!}"></i> {!! __('menu.' . $children->title) !!}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endif
    @endforeach

    @if (count($adminbar->roots()) > 0)
        <li class="header">{{ __('menu.navigation_admin') }}</li>

        @foreach ($adminbar->roots() as $item)
            @if (!$item->hasChildren())
                <li>
                    <a href="{!! $item->url() !!}">
                        <i class="{!! $item->icon !!}"></i> <span>{!! __('menu.' . $item->title) !!}</span>
                    </a>
                </li>
            @else
                <li class="treeview">
                    <a href="#">
                        <i class="{!! $item->icon !!}"></i> <span>{!! __('menu.' . $item->title) !!}</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @foreach ($item->children() as $children)
                            <li><a href="{!! $children->url() !!}"><i
                                            class="{!! $children->icon !!}"></i> {!! __('menu.' . $children->title) !!}
                                </a></li>
                        @endforeach
                    </ul>
                </li>
            @endif
        @endforeach
    @endif

</ul>
