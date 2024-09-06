<x-layouts.app>
    <h1>gest user</h1>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>rol</th>
                <th>created_at</th>
                <th>updated_at</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rolesUser as $user  )
                <tr>
                    <td>{{ $user->user->id }}</td>
                    <td>
                        {{ $user->user->nombre }}
                    </td>
                    <td>{{ $user->user->email }}</td>`
                    <td>{{ $user->role->name }}</td>
                    <td>{{ $user->user->apePaterno }} {{ $user->user->apeMaterno }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layouts.app>
