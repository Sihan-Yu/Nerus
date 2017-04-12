<li class="dropdown messages-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-exclamation-triangle"></i>
        <span class="label label-danger">{{ count($notifications) }}</span>
    </a>
    <ul class="dropdown-menu">
        <li class="header">{{ __('common.messages', ['messages' => count($notifications)]) }}</li>
        <li>
            <ul class="menu">
                @foreach ($notifications as $notification)
                <li>
                    <a href="#">
                        <div class="pull-left">
                            <img src="http://m.c.lnkd.licdn.com/mpr/mpr/shrinknp_100_100/p/8/005/01e/105/25bbe2d.jpg"
                                 class="img-circle"
                                 alt="User Image">
                        </div>
                        <h4>{{ $notification['user']->name }}</h4>
                        <small><i class="fa fa-clock-o"></i> &nbsp;&nbsp; {{ $notification['date'] }}</small>
                        <p>{{ $notification['message'] }}</p>
                    </a>
                </li>
                @endforeach
            </ul>
        </li>
        <li class="footer"><a href="#">See all messages</a></li>
    </ul>
</li>