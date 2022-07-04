<div class="ps-3 pe-3 table-responsive">
    <h3>Filters</h3>
    @if(in_array( 'add_filters', json_decode($permissions)) )
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal" @if(!isset($categories)) disabled="true" @endif> Add Filter</button>
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-start">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Filter</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin_add_filter') }}">
                        @csrf
                        <div class="mb-3">
                            <select class="form-select" aria-label="Category" name="category_id">
                                <option selected disabled>Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->category_id }}">{{ ucwords(str_replace('_',' ', $category->name)) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="filter" placeholder="Filter Name | Must same to post form input field name" class="form-control" required="required">
                        </div>
                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Filter List" id="filter" style="height: 100px" name="filter_list"></textarea>
                                <label for="filter">Filter List</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary col-12">Add Filter</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
    @endif
    @if(isset($filters) && in_array( 'view_filters', json_decode($permissions)) )
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Category</th>
                <th scope="col">Filter Name</th>
                <th scope="col">Filter List</th>
                @if(in_array( 'edit_filters', json_decode($permissions)) || in_array( 'delete_filters', json_decode($permissions)) )
                <th scope="col">Actions</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach($filters as $filter)
                <tr>
                    <td>{{ $filter->id }}</td>
                    <td>{{ $filter->category_name }}</td>
                    <td>{{ $filter->filter }}</td>
                    <td>{{ $filter->filter_list }}</td>
                    @if(in_array( 'edit_filters', json_decode($permissions)) || in_array( 'delete_filters', json_decode($permissions)) )
                    <td>
                        @if(in_array( 'edit_filters', json_decode($permissions)))
                        <button class="bg-white border-0 text-primary d-inline-flex"  data-bs-toggle="modal" data-bs-target="#editFilterModal-{{ $filter->filter }}"><i class="fas fa-edit"></i> Edit</button>
                        @endif
                        @if(in_array( 'delete_filters', json_decode($permissions)))
                            |
                        <form action="{{ route('admin_delete_filter') }}" method="post" class="d-inline-flex">
                            @csrf
                            <input type="hidden" name="category_id" value="{{ $filter->category_id }}">
                            <input type="hidden" name="filter" value="{{ $filter->filter }}">
                            <button type="submit" class="bg-white border-0 text-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                        </form>
                            @endif
                    </td>
                    @endif
                </tr>
                @if(in_array( 'edit_filters', json_decode($permissions)))

                <div class="modal fade" id="editFilterModal-{{ $filter->filter }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content text-start">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Filter</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="{{ route('admin_update_filter') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <select class="form-select" aria-label="Category" name="category_id">
                                            <option disabled>Select Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->category_id }}"  @if($filter->category_id == $category->category_id) selected @endif>{{ ucwords(str_replace('_',' ', $category->name)) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" placeholder="Filter Name | Must same to post form input field name" class="form-control" required="required" value="{{ ucwords(str_replace('_',' ', $filter->filter)) }}">
                                        <input type="hidden" name="filter" required="required" value="{{ $filter->filter }}">
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Filter List" id="filter-{{ $filter->filter }}" style="height: 100px" name="filter_list"></textarea>
                                            <label for="filter">Filter List</label>
                                        </div>
                                        <?php
                                        $list =  html_entity_decode(str_replace('[','',str_replace(']','',str_replace('"','',$filter->filter_list))));
                                        ?>
                                        <script defer>
                                            valueAdder('filter-{{ $filter->filter }}', "{{ $list }}");
                                        </script>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary col-12">Edit Filter</button>
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
        <h5>No Filters yet...!</h5>
    @endif
</div>
