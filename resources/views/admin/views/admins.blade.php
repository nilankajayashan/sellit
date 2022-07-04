<div class="container">
    <h3>Admin Users</h3>
    @if(in_array( 'add_admins', json_decode($permissions)))
    <button class="btn btn-primary d-inline-flex" data-bs-toggle="modal" data-bs-target="#addAdminModal"> Add Admin</button>
    <div class="modal fade" id="addAdminModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-start">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Admin User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin_add_admin') }}">
                        @csrf
                        <div class="mb-3">
                            <input type="text" name="user_name" placeholder="User Name" class="form-control" required="required">
                        </div>
                        <div class="mb-3">
                            <input type="email" name="email" placeholder="Email" class="form-control" required="required">
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" placeholder="Password" class="form-control" required="required">
                        </div>
                        <h6>PERMISSIONS</h6>
                        <div class="row">
                            <div class="mb-3 col-lg-6">
                                <h6>Ads</h6>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="view_ads" name="view_ads" id="view_ads" onchange="removeOptions('view_ads',['add_ads','edit_ads','delete_ads','approve_ads','reject_ads'])">
                                    <label class="form-check-label" for="view_ads">
                                        View Ads
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="add_ads" name="add_ads" id="add_ads" onchange="setRequired('view_ads','add_ads',['add_ads','edit_ads','delete_ads','approve_ads','reject_ads'])">
                                    <label class="form-check-label" for="add_ads">
                                        Add Ads
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="edit_ads" name="edit_ads" id="edit_ads" onchange="setRequired('view_ads','edit_ads',['add_ads','edit_ads','delete_ads','approve_ads','reject_ads'])">
                                    <label class="form-check-label" for="edit_edit">
                                        Edit Ads
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="delete_ads" name="delete_ads" id="delete_ads" onchange="setRequired('view_ads','delete_ads',['add_ads','edit_ads','delete_ads','approve_ads','reject_ads'])">
                                    <label class="form-check-label" for="delete_ads">
                                        Delete Ads
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="reject_ads" name="reject_ads" id="reject_ads" onchange="setRequired('view_ads','reject_ads',['add_ads','edit_ads','delete_ads','approve_ads','reject_ads'])">
                                    <label class="form-check-label" for="reject_ads">
                                        Reject Ads
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="approve_ads" name="approve_ads" id="approve_ads" onchange="setRequired('view_ads','approve_ads',['add_ads','edit_ads','delete_ads','approve_ads','reject_ads'])">
                                    <label class="form-check-label" for="approve_ads">
                                        Approve Ads
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3 col-lg-6">
                                <h6>Filters</h6>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="view_filters" name="view_filters" id="view_filters" onchange="removeOptions('view_filters',['add_filters','edit_filters','delete_filters'])"
                                    >
                                    <label class="form-check-label" for="view_filters">
                                        View Filters
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="add_filters" name="add_filters" id="add_filters" onchange="setRequired('view_filters','add_filters',['add_filters','edit_filters','delete_filters'])"
                                    >
                                    <label class="form-check-label" for="add_filters">
                                        Add Filters
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="edit_filters" name="edit_filters" id="edit_filters" onchange="setRequired('view_filters','edit_filters',['add_filters','edit_filters','delete_filters'])"
                                    >
                                    <label class="form-check-label" for="edit_filters">
                                        Edit Filters
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="delete_filters" name="delete_filters" id="delete_filters" onchange="setRequired('view_filters','delete_filters',['add_filters','edit_filters','delete_filters'])"
                                    >
                                    <label class="form-check-label" for="delete_filters">
                                        Delete Filters
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3 col-lg-6">
                                <h6>Users</h6>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="view_users" name="view_users" id="view_users" onchange="removeOptions('view_users',['add_users','edit_users','delete_users'])"
                                    >
                                    <label class="form-check-label" for="view_users">
                                        View Users
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="add_users" name="add_users" id="add_users" onchange="setRequired('view_users','add_users',['add_users','edit_users','delete_users'])"
                                    >
                                    <label class="form-check-label" for="add_users">
                                        Add Users
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="edit_users" name="edit_users" id="edit_users" onchange="setRequired('view_users','edit_users',['add_users','edit_users','delete_users'])"
                                    >
                                    <label class="form-check-label" for="edit_users">
                                        Edit Users
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="delete_users" name="delete_users" id="delete_users" onchange="setRequired('view_users','delete_users',['add_users','edit_users','delete_users'])"
                                    >
                                    <label class="form-check-label" for="delete_users">
                                        Delete Users
                                    </label>
                                </div>
                            </div>


                            <div class="mb-3 col-lg-6">
                                <h6>Guests</h6>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="view_guests" name="view_guests" id="view_guests" onchange="removeOptions('view_guests',['add_guests','edit_guests','delete_guests'])"
                                    >
                                    <label class="form-check-label" for="view_guests">
                                        View Guests
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="add_guests" name="add_guests" id="add_guests" onchange="setRequired('view_guests','add_guests',['add_guests','edit_guests','delete_guests'])"
                                    >
                                    <label class="form-check-label" for="add_guests">
                                        Add Guests
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="edit_guests" name="edit_guests" id="edit_guests" onchange="setRequired('view_guests','edit_guests',['add_guests','edit_guests','delete_guests'])"
                                    >
                                    <label class="form-check-label" for="edit_guests">
                                        Edit Guests
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="delete_guests" name="delete_guests" id="delete_guests" onchange="setRequired('view_guests','delete_guests',['add_guests','edit_guests','delete_guests'])"
                                    >
                                    <label class="form-check-label" for="delete_guests">
                                        Delete Guests
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3 col-lg-6">
                                <h6>Administrator</h6>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="view_admins" name="view_admins" id="view_admins" onchange="removeOptions('view_admins',['add_admins','edit_admins','delete_admins'])"
                                    >
                                    <label class="form-check-label" for="view_admins">
                                        View Admins
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="add_admins" name="add_admins" id="add_admins" onchange="setRequired('view_admins','add_admins',['add_admins','edit_admins','delete_admins'])"
                                    >
                                    <label class="form-check-label" for="add_admins">
                                        Add Admins
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="edit_admins" name="edit_admins" id="edit_admins" onchange="setRequired('view_admins','edit_admins',['add_admins','edit_admins','delete_admins'])"
                                    >
                                    <label class="form-check-label" for="edit_admins">
                                        Edit Admins
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="delete_admins" name="delete_admins" id="delete_admins" onchange="setRequired('view_admins','delete_admins',['add_admins','edit_admins','delete_admins'])"
                                    >
                                    <label class="form-check-label" for="delete_admins">
                                        Delete Admins
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary col-12">Add Admin</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    @endif
    @if(isset($admins) && in_array( 'view_admins', json_decode($permissions)))
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                @if(in_array( 'edit_admins', json_decode($permissions)) || in_array( 'delete_admins', json_decode($permissions)))
                <th scope="col">Actions</th>
                    @endif
            </tr>
            </thead>
            <tbody>

                @foreach($admins as $admin)
                <tr>
                    <td>{{ $admin->admin_id }}</td>
                    <td>{{ $admin->user_name }}</td>
                    <td>{{ $admin->email }}</td>
                    @if(in_array( 'edit_admins', json_decode($permissions)) || in_array( 'delete_admins', json_decode($permissions)))
                    <td>
                        @if(in_array( 'edit_admins', json_decode($permissions)))
                        <button class="bg-white border-0 text-primary"  data-bs-toggle="modal" data-bs-target="#editAdminModal{{ $admin->admin_id }}"><i class="fas fa-user-edit"></i> Edit</button>
                        @endif
                        @if(in_array( 'delete_admins', json_decode($permissions)))
                            |
                        <form action="{{ route('admin_delete_admin') }}" method="post" class="d-inline-flex">
                            @csrf
                            <input type="hidden" name="admin_id" value="{{ $admin->admin_id }}">
                            <input type="hidden" name="email" value="{{ $admin->email }}">
                            <button type="submit" class="bg-white border-0 text-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                        </form>
                            @endif
                    </td>
                        @endif
                </tr>
@if(in_array( 'edit_admins', json_decode($permissions)))
                <div class="modal fade" id="editAdminModal{{ $admin->admin_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content text-start">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Admin User:&nbsp; {{ $admin->email }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="{{ route('admin_edit_admin') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" name="user_name" placeholder="User Name" class="form-control" required="required" value="{{ $admin->user_name }}">
                                    </div>
                                        <input type="hidden" name="email" required="required"  value="{{ $admin->email }}">
                                    <div class="mb-3">
                                        <input type="password" name="password" placeholder="Password" class="form-control">
                                    </div>

                                    <h6>PERMISSIONS</h6>
                                    <div class="row">
                                        <div class="mb-3 col-lg-6">
                                            <h6>Ads</h6>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="view_ads" name="view_ads" id="view_ads-{{ $admin->admin_id }}" onchange="removeOptions('view_ads-{{ $admin->admin_id }}',['add_ads-{{ $admin->admin_id }}','edit_ads-{{ $admin->admin_id }}','delete_ads-{{ $admin->admin_id }}','approve_ads-{{ $admin->admin_id }}','reject_ads-{{ $admin->admin_id }}'])">
                                                <label class="form-check-label" for="view_ads-{{ $admin->admin_id }}">
                                                    View Ads
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="add_ads" name="add_ads" id="add_ads-{{ $admin->admin_id }}" onchange="setRequired('view_ads-{{ $admin->admin_id }}','add_ads-{{ $admin->admin_id }}',['add_ads-{{ $admin->admin_id }}','edit_ads-{{ $admin->admin_id }}','delete_ads-{{ $admin->admin_id }}','approve_ads-{{ $admin->admin_id }}','reject_ads-{{ $admin->admin_id }}'])">
                                                <label class="form-check-label" for="add_ads-{{ $admin->admin_id }}">
                                                    Add Ads
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="edit_ads" name="edit_ads" id="edit_ads-{{ $admin->admin_id }}-{{ $admin->admin_id }}" onchange="setRequired('view_ads-{{ $admin->admin_id }}-{{ $admin->admin_id }}','edit_ads-{{ $admin->admin_id }}-{{ $admin->admin_id }}',['add_ads-{{ $admin->admin_id }}-{{ $admin->admin_id }}','edit_ads-{{ $admin->admin_id }}-{{ $admin->admin_id }}','delete_ads-{{ $admin->admin_id }}-{{ $admin->admin_id }}','approve_ads-{{ $admin->admin_id }}-{{ $admin->admin_id }}','reject_ads-{{ $admin->admin_id }}-{{ $admin->admin_id }}'])">
                                                <label class="form-check-label" for="edit_edit-{{ $admin->admin_id }}-{{ $admin->admin_id }}">
                                                    Edit Ads
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="delete_ads" name="delete_ads" id="delete_ads-{{ $admin->admin_id }}-{{ $admin->admin_id }}" onchange="setRequired('view_ads-{{ $admin->admin_id }}-{{ $admin->admin_id }}','delete_ads-{{ $admin->admin_id }}-{{ $admin->admin_id }}',['add_ads-{{ $admin->admin_id }}-{{ $admin->admin_id }}','edit_ads-{{ $admin->admin_id }}-{{ $admin->admin_id }}','delete_ads-{{ $admin->admin_id }}-{{ $admin->admin_id }}','approve_ads-{{ $admin->admin_id }}-{{ $admin->admin_id }}','reject_ads-{{ $admin->admin_id }}-{{ $admin->admin_id }}'])">
                                                <label class="form-check-label" for="delete_ads-{{ $admin->admin_id }}-{{ $admin->admin_id }}">
                                                    Delete Ads
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="reject_ads" name="reject_ads" id="reject_ads-{{ $admin->admin_id }}-{{ $admin->admin_id }}" onchange="setRequired('view_ads-{{ $admin->admin_id }}-{{ $admin->admin_id }}','reject_ads',['add_ads-{{ $admin->admin_id }}-{{ $admin->admin_id }}','edit_ads-{{ $admin->admin_id }}-{{ $admin->admin_id }}','delete_ads-{{ $admin->admin_id }}-{{ $admin->admin_id }}','approve_ads-{{ $admin->admin_id }}-{{ $admin->admin_id }}','reject_ads-{{ $admin->admin_id }}-{{ $admin->admin_id }}'])">
                                                <label class="form-check-label" for="reject_ads-{{ $admin->admin_id }}-{{ $admin->admin_id }}">
                                                    Reject Ads
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="approve_ads" name="approve_ads" id="approve_ads-{{ $admin->admin_id }}" onchange="setRequired('view_ads-{{ $admin->admin_id }}','approve_ads-{{ $admin->admin_id }}',['add_ads-{{ $admin->admin_id }}','edit_ads-{{ $admin->admin_id }}','delete_ads-{{ $admin->admin_id }}','approve_ads-{{ $admin->admin_id }}','reject_ads-{{ $admin->admin_id }}'])">
                                                <label class="form-check-label" for="approve_ads-{{ $admin->admin_id }}">
                                                    Approve Ads
                                                </label>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <h6>Filters</h6>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="view_filters" name="view_filters" id="view_filters-{{ $admin->admin_id }}" onchange="removeOptions('view_filters-{{ $admin->admin_id }}',['add_filters-{{ $admin->admin_id }}','edit_filters-{{ $admin->admin_id }}','delete_filters-{{ $admin->admin_id }}'])"
                                                >
                                                <label class="form-check-label" for="view_filters-{{ $admin->admin_id }}">
                                                    View Filters
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="add_filters" name="add_filters" id="add_filters-{{ $admin->admin_id }}" onchange="setRequired('view_filters-{{ $admin->admin_id }}','add_filters-{{ $admin->admin_id }}',['add_filters-{{ $admin->admin_id }}','edit_filters-{{ $admin->admin_id }}','delete_filters-{{ $admin->admin_id }}'])"
                                                >
                                                <label class="form-check-label" for="add_filters-{{ $admin->admin_id }}">
                                                    Add Filters
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="edit_filters" name="edit_filters" id="edit_filters-{{ $admin->admin_id }}" onchange="setRequired('view_filters-{{ $admin->admin_id }}','edit_filters-{{ $admin->admin_id }}',['add_filters-{{ $admin->admin_id }}','edit_filters-{{ $admin->admin_id }}','delete_filters-{{ $admin->admin_id }}'])"
                                                >
                                                <label class="form-check-label" for="edit_filters-{{ $admin->admin_id }}">
                                                    Edit Filters
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="delete_filters" name="delete_filters" id="delete_filters-{{ $admin->admin_id }}" onchange="setRequired('view_filters-{{ $admin->admin_id }}','delete_filters-{{ $admin->admin_id }}',['add_filters-{{ $admin->admin_id }}','edit_filters-{{ $admin->admin_id }}','delete_filters-{{ $admin->admin_id }}'])"
                                                >
                                                <label class="form-check-label" for="delete_filters-{{ $admin->admin_id }}">
                                                    Delete Filters
                                                </label>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <h6>Users</h6>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="view_users" name="view_users" id="view_users-{{ $admin->admin_id }}-{{ $admin->admin_id }}" onchange="removeOptions('view_users-{{ $admin->admin_id }}-{{ $admin->admin_id }}',['add_users-{{ $admin->admin_id }}-{{ $admin->admin_id }}','edit_users-{{ $admin->admin_id }}-{{ $admin->admin_id }}','delete_users-{{ $admin->admin_id }}-{{ $admin->admin_id }}'])"
                                                >
                                                <label class="form-check-label" for="view_users-{{ $admin->admin_id }}-{{ $admin->admin_id }}">
                                                    View Users
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="add_users" name="add_users" id="add_users-{{ $admin->admin_id }}-{{ $admin->admin_id }}" onchange="setRequired('view_users-{{ $admin->admin_id }}-{{ $admin->admin_id }}','add_users-{{ $admin->admin_id }}-{{ $admin->admin_id }}',['add_users-{{ $admin->admin_id }}-{{ $admin->admin_id }}','edit_users-{{ $admin->admin_id }}-{{ $admin->admin_id }}','delete_users-{{ $admin->admin_id }}-{{ $admin->admin_id }}'])"
                                                >
                                                <label class="form-check-label" for="add_users-{{ $admin->admin_id }}-{{ $admin->admin_id }}">
                                                    Add Users
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="edit_users" name="edit_users" id="edit_users-{{ $admin->admin_id }}-{{ $admin->admin_id }}" onchange="setRequired('view_users-{{ $admin->admin_id }}-{{ $admin->admin_id }}','edit_users-{{ $admin->admin_id }}-{{ $admin->admin_id }}',['add_users-{{ $admin->admin_id }}-{{ $admin->admin_id }}','edit_users-{{ $admin->admin_id }}-{{ $admin->admin_id }}','delete_users-{{ $admin->admin_id }}-{{ $admin->admin_id }}'])"
                                                >
                                                <label class="form-check-label" for="edit_users-{{ $admin->admin_id }}-{{ $admin->admin_id }}">
                                                    Edit Users
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="delete_users" name="delete_users" id="delete_users-{{ $admin->admin_id }}-{{ $admin->admin_id }}" onchange="setRequired('view_users-{{ $admin->admin_id }}-{{ $admin->admin_id }}','delete_users-{{ $admin->admin_id }}-{{ $admin->admin_id }}',['add_users-{{ $admin->admin_id }}-{{ $admin->admin_id }}','edit_users-{{ $admin->admin_id }}-{{ $admin->admin_id }}','delete_users-{{ $admin->admin_id }}-{{ $admin->admin_id }}'])"
                                                >
                                                <label class="form-check-label" for="delete_users-{{ $admin->admin_id }}-{{ $admin->admin_id }}">
                                                    Delete Users
                                                </label>
                                            </div>
                                        </div>


                                        <div class="mb-3 col-lg-6">
                                            <h6>Guests</h6>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="view_guests" name="view_guests" id="view_guests-{{ $admin->admin_id }}" onchange="removeOptions('view_guests-{{ $admin->admin_id }}',['add_guests-{{ $admin->admin_id }}','edit_guests-{{ $admin->admin_id }}','delete_guests-{{ $admin->admin_id }}'])"
                                                >
                                                <label class="form-check-label" for="view_guests-{{ $admin->admin_id }}">
                                                    View Guests
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="add_guests" name="add_guests" id="add_guests-{{ $admin->admin_id }}" onchange="setRequired('view_guests-{{ $admin->admin_id }}','add_guests-{{ $admin->admin_id }}',['add_guests-{{ $admin->admin_id }}','edit_guests-{{ $admin->admin_id }}','delete_guests-{{ $admin->admin_id }}'])"
                                                >
                                                <label class="form-check-label" for="add_guests-{{ $admin->admin_id }}">
                                                    Add Guests
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="edit_guests" name="edit_guests" id="edit_guests-{{ $admin->admin_id }}" onchange="setRequired('view_guests-{{ $admin->admin_id }}','edit_guests-{{ $admin->admin_id }}',['add_guests-{{ $admin->admin_id }}','edit_guests-{{ $admin->admin_id }}','delete_guests-{{ $admin->admin_id }}'])"
                                                >
                                                <label class="form-check-label" for="edit_guests-{{ $admin->admin_id }}">
                                                    Edit Guests
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="delete_guests" name="delete_guests" id="delete_guests-{{ $admin->admin_id }}" onchange="setRequired('view_guests-{{ $admin->admin_id }}','delete_guests-{{ $admin->admin_id }}',['add_guests-{{ $admin->admin_id }}','edit_guests-{{ $admin->admin_id }}','delete_guests-{{ $admin->admin_id }}'])"
                                                >
                                                <label class="form-check-label" for="delete_guests-{{ $admin->admin_id }}">
                                                    Delete Guests
                                                </label>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <h6>Administrator</h6>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="view_admins" name="view_admins" id="view_admins-{{ $admin->admin_id }}" onchange="removeOptions('view_admins-{{ $admin->admin_id }}',['add_admins-{{ $admin->admin_id }}','edit_admins-{{ $admin->admin_id }}','delete_admins-{{ $admin->admin_id }}'])"
                                                >
                                                <label class="form-check-label" for="view_admins-{{ $admin->admin_id }}">
                                                    View Admins
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="add_admins" name="add_admins" id="add_admins-{{ $admin->admin_id }}" onchange="setRequired('view_admins-{{ $admin->admin_id }}','add_admins-{{ $admin->admin_id }}',['add_admins-{{ $admin->admin_id }}','edit_admins-{{ $admin->admin_id }}','delete_admins-{{ $admin->admin_id }}'])"
                                                >
                                                <label class="form-check-label" for="add_admins-{{ $admin->admin_id }}">
                                                    Add Admins
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="edit_admins" name="edit_admins" id="edit_admins-{{ $admin->admin_id }}" onchange="setRequired('view_admins-{{ $admin->admin_id }}','edit_admins-{{ $admin->admin_id }}',['add_admins-{{ $admin->admin_id }}','edit_admins-{{ $admin->admin_id }}','delete_admins-{{ $admin->admin_id }}'])"
                                                >
                                                <label class="form-check-label" for="edit_admins-{{ $admin->admin_id }}">
                                                    Edit Admins
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="delete_admins" name="delete_admins" id="delete_admins-{{ $admin->admin_id }}" onchange="setRequired('view_admins-{{ $admin->admin_id }}','delete_admins-{{ $admin->admin_id }}',['add_admins-{{ $admin->admin_id }}','edit_admins-{{ $admin->admin_id }}','delete_admins-{{ $admin->admin_id }}'])"
                                                >
                                                <label class="form-check-label" for="delete_admins-{{ $admin->admin_id }}">
                                                    Delete Admins
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary col-12">Update Admin</button>
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
        <h5> No any other admins yet...</h5>
    @endif
</div>

<script defer="defer">
    function setRequired(requirer_id,this_id,option_ids){
        if(document.getElementById(this_id).checked){
            document.getElementById(requirer_id).checked=true;
        }else{
            for(let index = 0; index< option_ids.length; index++){
                if(document.getElementById(option_ids[index]).checked){
                    option_checked = true;
                    document.getElementById(requirer_id).checked=true;
                }
            }
        }
    }
    function removeOptions(this_id,option_ids){
        if(document.getElementById(this_id).checked == false){
            for(let index = 0; index< option_ids.length; index++){
                document.getElementById(option_ids[index]).checked = false;
            }
        }
    }
</script>
