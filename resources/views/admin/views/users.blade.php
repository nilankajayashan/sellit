<div class="container">
    <h3>Users</h3>
    @if(in_array( 'add_users', json_decode($permissions)))
    <button class="btn btn-primary d-inline-flex" data-bs-toggle="modal" data-bs-target="#addUserModal"> Add Users</button>
    <a class="btn btn-danger d-inline-flex" href="{{ route('dashboard', ['state' => 'user_remove']) }}"> Reject Requests</a>
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-start">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin_add_user') }}">
                        @csrf
                        <div class="mb-3">
                            <input type="text" name="user_name" placeholder="User Name" class="form-control" required="required">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="contact_name" placeholder="Contact Name" class="form-control" required="required">
                        </div>
                        <div class="mb-3">
                            <input type="email" name="email" placeholder="Email" class="form-control" required="required">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="address" placeholder="Address" class="form-control" required="required">
                        </div>
                        <div class="mb-3">
                            <input type="tel" name="phone" placeholder="Mobile Number" class="form-control" required="required">
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" placeholder="Password" class="form-control" required="required">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary col-12">Add User</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
    @endif
    @if(isset($users) && in_array( 'view_users', json_decode($permissions)))
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Contact Name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Phone</th>
                @if(in_array( 'edit_users', json_decode($permissions)) || in_array( 'delete_users', json_decode($permissions)))
                <th scope="col">Actions</th>
                    @endif
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
                    @if(in_array( 'edit_users', json_decode($permissions)) || in_array( 'delete_users', json_decode($permissions)))
                    <td>
                        @if(in_array( 'edit_users', json_decode($permissions)))
                        <button class="bg-white border-0 text-primary"  data-bs-toggle="modal" data-bs-target="#editUserModal{{ $user->user_id }}"><i class="fas fa-user-edit"></i> Edit</button>
                        @endif
                        @if(in_array( 'delete_users', json_decode($permissions)))
                            |
                        <form action="{{ route('admin_delete_user') }}" method="post" class="d-inline-flex">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->user_id }}">
                            <input type="hidden" name="email" value="{{ $user->email }}">
                            <button type="submit" class="bg-white border-0 text-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                        </form>
                            @endif
                    </td>
                        @endif
                </tr>
@if(in_array( 'edit_users', json_decode($permissions)))
                <div class="modal fade" id="editUserModal{{ $user->user_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content text-start">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit User : {{ $user->email }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="{{ route('admin_update_user') }}">
                                    @csrf
                                    <input type="hidden" name="email" required="required" value="{{ $user->email }}">
                                    <div class="mb-3">
                                        <input type="text" name="user_name" placeholder="User Name" class="form-control" required="required" value="{{ $user->user_name }}">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="contact_name" placeholder="Contact Name" class="form-control" required="required" value="{{ $user->contact_name }}">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="address" placeholder="Address" class="form-control" required="required" value="{{ $user->address }}">
                                    </div>
                                    <div class="mb-3">
                                        <input type="tel" name="phone" placeholder="Mobile Number" class="form-control" required="required" value="{{ $user->phone }}">
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" name="password" placeholder="Password" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary col-12">Edit User</button>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
                @endif
            @endforeach
            </tbody>
        </table>
    @else
        <h5>No Users yet...!</h5>
    @endif
</div>
