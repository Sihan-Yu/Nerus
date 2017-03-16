<table class="table table-condensed">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Username</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>bla bla bla and bla</td>
        </tr>
    @endforeach
    </tbody>
</table>
