@extends('layout.adminlayout.adminNavFooter')

@section('admin-contain')

<div class="container">
    <div class="row">
        <div>
            <!-- Basic Bootstrap Table -->
            <div class="card">
                              <!-- Search -->
              <div class="navbar-nav align-items-center">

                <form action={{route('admin.userSearch')}} method="POST">
                    @csrf
                    <div class="nav-item d-flex align-items-center m-4">
                            <h5 class="card-header">Users</h5>
                        <i class="bx bx-search fs-4 lh-0"></i>
                        <input
                          type="text"
                          name="search_user"
                          class="form-control border-2 shadow-none m-2"
                          placeholder="Search..."
                          aria-label="Search..."
                        />
                        <div>
                            <button type="submit" class="btn btn-primary">find</button>
                        </div>
                    </div>
                </form>
              </div>

              <!-- /Search -->
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>

                    @foreach ($users as $user)
                    <tbody class="table-border-bottom-0">
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$user->name}}</strong></td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->type}}</td>
                        <td><span class="badge bg-label-primary me-1">Active</span></td>
                        <td>
                        <button class="btn btn-primary px-1" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasBackdrop" aria-controls="offcanvasBackdrop">
                            Update
                        </button>
                            <!-- update user -->
                            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasBackdrop"
                                aria-labelledby="offcanvasBackdropLabel">
                                <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                                    <p class="text-center">Update user information</p>
                                    <div>
                                        <form action="{{ route('admin.userUpdate',['user_id'=>$user->id]) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group col-md-12">
                                                <label for="inputName">Name</label>
                                                <input type="text" name="name" class="form-control"
                                                    id="inputName" value="{{$user->name}}">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="inputName">Email</label>
                                                <input type="email" name="email" class="form-control"
                                                    id="inputName" value="{{$user->email}}">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="inputName">Password</label>
                                                <input type="password" name="password" class="form-control"
                                                    id="inputName" value="{{$user->password}}">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="inputName">Type</label>
                                                <input type="text" name="type" class="form-control"
                                                    id="inputName" value="{{$user->type}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">upload image</label>
                                                <input class="form-control" name="image" type="file" id="formFile">
                                            </div>
                                        </div>
                                    <button type="submit" class="btn btn-primary mb-2 d-grid w-100">Save</button>
                                    <button type="button" class="btn btn-outline-secondary d-grid w-100"
                                        data-bs-dismiss="offcanvas">Cancel</button>
                                    </form>
                                </div>
                            </div>
                           <!-- End update user -->
                            <a href='#'>
                                <input type="button" class="btn btn-danger px-1" value="Delete" data-toggle="modal" data-target="#deleteModal">
                            </a>
                        </td>
                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
                                <form action={{ route('admin.userDelete', $user->id) }} method="post">
                                    @csrf
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete user</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure for delete this user</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                            <button type="submit" class="btn btn-primary">Yes</button>
                                        </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                      </tr>
                    </tbody>
                    @endforeach
                  </table>
                </div>
              </div>
              <!--/ Basic Bootstrap Table -->
        </div>
    </div>
</div>


@endsection
