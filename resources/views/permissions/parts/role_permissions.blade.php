<table class="table table-condensed table-striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>{{ __('profile.name') }}</th>
        <th>{{ __('permissions.description') }}</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach ($permissions as $permission)
        <tr>
            <td>{{ $permission->id }}</td>
            <td>{{ $permission->name }}</td>
            <td>{{ $permission->description }}</td>
            <td class="pull-right">
                @permission('role:permission:delete')
                <form action="{{ route('permissions.detach') }}" method="post">
                    {{ csrf_field() }}
                    <input type="text" hidden="hidden" name="role_id" value="{{ $role->id }}">
                    <input type="text" hidden="hidden" name="permission_id" value="{{ $permission->id }}">
                    <button type="submit" class="btn btn-xs btn-danger btn-flat"><i
                                class="fa fa-trash"></i></button>
                </form>@endpermission
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@if (count($allpermissions) > 0)
    <form action="{{ route('permissions.attach') }}" method="post">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" hidden="hidden" name="role_id" value="{{ $role->id }}">
            <select class="form-control select2 width" name="permission">
                @foreach ($allpermissions as $permission)
                    <option value="{{ $permission['id'] }}">{{ $permission['name'] }}</option>
                @endforeach
            </select>
            <span class="input-group-btn">
                      <button type="submit" class="btn btn-primary btn-flat"><i
                                  class="glyphicon glyphicon-plus"></i></button>
                    </span>
        </div>
    </form>
@else
    <div class="label label-success">{{ __('permissions.all_permissions') }}</div>
@endif
