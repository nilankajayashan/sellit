<div class="container">
    <h3>Account Cancel Requested Users</h3>
    <a class="btn btn-primary d-inline-flex" href="{{ route('dashboard', ['state' => 'users']) }}"><i class="fas fa-angle-double-left"></i>&nbsp;Back to users</a>
    @if(isset($users) && in_array( 'delete_users', json_decode($permissions)))
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Contact Name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Phone</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->user_id }}</td>
                    <td>{{ $user->user_name }}</td>
                    <td>{{ $user->contact_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>
                        <form action="{{ route('admin_delete_user') }}" method="post" class="d-inline-flex">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->user_id }}">
                            <input type="hidden" name="email" value="{{ $user->email }}">
                            <button type="submit" class="bg-white border-0 text-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h5>No requested  users...!</h5>
    @endif
</div>
