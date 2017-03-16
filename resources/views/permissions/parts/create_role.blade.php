<tr class="success">
    <form action="{{ route('role.store') }}" method="post">
        {{ csrf_field() }}
        <td>
            <button class="btn btn-primary form-control" type="submit"><i class="fa fa-save"></i></button>
        </td>
        <td><input type="text" name="language-string" class="form-control" placeholder="{{ __('permissions.language_string') }}"></td>
        <td><input type="text" name="description" class="form-control" placeholder="{{ __('permissions.role_description') }}"></td>
    </form>
</tr>