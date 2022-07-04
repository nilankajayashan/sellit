<div class="ps-3 pe-3 table-responsive">
    <h3>Guest Users</h3>
    @if(in_array( 'add_guests', json_decode($permissions)))
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal"> Add Guest User</button>
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-start">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Guest User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin_add_guest_user') }}">
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
                            <input type="tel" name="phone" placeholder="Mobile Number" class="form-control" required="required">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary col-12">Add Guest User</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
    @endif
    @if(isset($guests) && in_array( 'view_guests', json_decode($permissions)))
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Contact Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                @if(in_array( 'edit_guests', json_decode($permissions)) || in_array( 'delete_guests', json_decode($permissions)))
                <th scope="col">Actions</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($guests as $guest)
                <tr>
                    <td>{{ $guest->user_id }}</td>
                    <td>{{ $guest->user_name }}</td>
                    <td>{{ $guest->contact_name }}</td>
                    <td>{{ $guest->email }}</td>
                    <td>{{ $guest->address }}</td>
                    <td>{{ $guest->phone }}</td>
                    @if(in_array( 'edit_guests', json_decode($permissions)) || in_array( 'delete_guests', json_decode($permissions)))

                    <td>
                        @if(in_array( 'edit_guests', json_decode($permissions)))
                        <button class="bg-white border-0 text-primary"  data-bs-toggle="modal" data-bs-target="#editUserModal{{ $guest->user_id }}"><i class="fas fa-user-edit"></i> Edit</button>
                        @endif
                        @if(in_array( 'delete_guests', json_decode($permissions)))
                            |
                        <form action="{{ route('admin_delete_guest_user') }}" method="post" class="d-inline-flex">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $guest->user_id }}">
                            <input type="hidden" name="email" value="{{ $guest->email }}">
                            <button type="submit" class="bg-white border-0 text-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                        </form>
                            @endif
                    </td>
                    @endif
                </tr>
@if(in_array( 'edit_guests', json_decode($permissions)))
                <div class="modal fade" id="editUserModal{{ $guest->user_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content text-start">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit User : {{ $guest->email }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="{{ route('admin_update_guest_user') }}">
                                    @csrf
                                    <input type="hidden" name="email" required="required" value="{{ $guest->email }}">
                                    <div class="mb-3">
                                        <input type="text" name="user_name" placeholder="User Name" class="form-control" required="required" value="{{ $guest->user_name }}">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="contact_name" placeholder="Contact Name" class="form-control" required="required" value="{{ $guest->contact_name }}">
                                    </div>
                                    <div class="mb-3">
                                        <input type="tel" name="phone" placeholder="Mobile Number" class="form-control" required="required" value="{{ $guest->phone }}">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary col-12">Edit Guest User</button>
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
        <h5>No Guest Users yet...!</h5>
    @endif
</div>
