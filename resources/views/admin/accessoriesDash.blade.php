@extends('layout.adminlayout.adminNavFooter')

@section('admin-contain')

<div class="container">
    <div class="row">
        <div>
            <!-- Basic Bootstrap Table -->
            <div class="card">
                <div class="d-flex justify-content-between m-3">
                    <div>
                        <h5 class="card-header">Accessories</h5>
                    </div>
                    <div>
                        <!-- Enable backdrop (default) Offcanvas -->
                        <div class="col-lg-4 col-md-6">
                            <div class="mt-3">
                                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasBackdrop" aria-controls="offcanvasBackdrop">
                                    Add accessory
                                </button>
                                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasBackdrop"
                                    aria-labelledby="offcanvasBackdropLabel">
                                    <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                                        <p class="text-center">Add a new accessory ... please insert fields</p>
                                        <div>
                                            <form action="{{ route('admin.accessoriesadd') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label for="inputName">Name</label>
                                                        <input type="text" name="name" class="form-control"
                                                            id="inputName">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="inputName">Price</label>
                                                    <input type="text" name="price" class="form-control"
                                                        id="inputName">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="formFile" class="form-label">upload image</label>
                                                    <input class="form-control" name="image" type="file" id="formFile">
                                                </div>

                                        </div>
                                        <button type="submit" class="btn btn-primary mb-2 d-grid w-100">Add</button>
                                        <button type="button" class="btn btn-outline-secondary d-grid w-100"
                                            data-bs-dismiss="offcanvas">Cancel</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>image</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    @foreach ($accessoriess as $accessories)
                    <tbody class="table-border-bottom-0">
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$accessories->name}}</strong></td>
                        <td>{{$accessories->price}} $</td>
                        <td><img src="{{ asset('asset/images/access')}}/{{$accessories->image }}" alt="product" width="30" height="30"></td>
                        <td>
                            <button class="btn btn-primary px-1" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasBackdrop1" aria-controls="offcanvasBackdrop1">
                                Update
                            </button>
                                <!-- update user -->
                                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasBackdrop1"
                                    aria-labelledby="offcanvasBackdropLabel">
                                    <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                                        <p class="text-center">Update information</p>
                                        <div>
                                            <form action="{{ route('admin.accessoriesUpdate',['access_id'=>$accessories->id]) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group col-md-12">
                                                    <label for="inputName">Name</label>
                                                    <input type="text" name="name" class="form-control"
                                                        id="inputName" value="{{$accessories->name}}">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="inputName">Price</label>
                                                    <input type="text" name="price" class="form-control"
                                                        id="inputName" value="{{$accessories->price}}">
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
                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
                                <form action={{ route('admin.accessDelete',$accessories->id) }} method="post">
                                    @csrf
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-body">
                                            <h5>Are you sure to delete this product</h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                            <button type="submit" class="btn btn-primary">Yes</button>
                                        </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- End Delete Modal -->
                        </td>

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
