<tr class="success">
    <form action="{{ route('permissions.store') }}" method="post">
        {{ csrf_field() }}
        <td>
            <button class="btn btn-primary form-control" type="submit"><i class="fa fa-save"></i></button>
        </td>
        <td><input type="text" name="name" class="form-control" placeholder="{{ __('profile.name') }}"></td>
        <td colspan="2"><input type="text" name="description" class="form-control" placeholder="{{ __('permissions.role_description') }}"></td>
    </form>
</tr>