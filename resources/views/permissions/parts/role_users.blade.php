<table class="table table-condensed table-striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>{{ __('profile.name') }}</th>
        <th>{{ __('profile.username') }}</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td><a href="{{ route('user.view', $user->id) }}">{{ $user->name }}</a></td>
            <td>{{ $user->email }}</td>
            <td class="pull-right">
                @permission('role:user:delete')
                <form action="{{ route('role.detach') }}" method="post">
                    {{ csrf_field() }}
                    <input type="text" hidden="hidden" name="role_id" value="{{ $role->id }}">
                    <input type="text" hidden="hidden" name="user_id" value="{{ $user->id }}">
                    <button type="submit" class="btn btn-xs btn-danger btn-flat"><i
                                class="fa fa-trash"></i></button>
                </form>@endpermission
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@if (count($allusers) > 0)
    @permission('role:user:add')
    <form action="{{ route('role.attach') }}" method="post">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" hidden="hidden" name="role_id" value="{{ $role->id }}">
            <select class="form-control select2" name="user">
                @foreach ($allusers as $individuals)
                    <option value="{{ $individuals['id'] }}">{{ $individuals['name'] }}</option>
                @endforeach
            </select>
            <span class="input-group-btn">
                      <button type="submit" class="btn btn-primary btn-flat"><i
                                  class="glyphicon glyphicon-plus"></i></button>
                    </span>
        </div>
    </form>
    @endpermission
@else
    <div class="label label-success">{{ __('permissions.all_users') }}</div>
@endif


@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.select2').select2();
        });
    </script>
@endsection