@extends('layout.adminlayout.adminNavFooter')

@section('admin-contain')
    <div class="container">
        <div class="row">
            <div>
                <!-- Basic Bootstrap Table -->
                <div class="card">
                    <div class="d-flex justify-content-between m-3">
                        <div>
                            <h5 class="card-header">Devices</h5>
                        </div>
                        <div>
                            <!-- Enable backdrop (default) Offcanvas -->
                            <div class="col-lg-4 col-md-6">
                                <div class="mt-3">
                                    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                                        data-bs-target="#offcanvasBackdrop" aria-controls="offcanvasBackdrop">
                                        Add device
                                    </button>
                                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasBackdrop"
                                        aria-labelledby="offcanvasBackdropLabel">
                                        <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                                            <p class="text-center">Add a new device ... please insert fields</p>
                                            <div>
                                                <form action="{{ route('admin.deviceadd') }}" method="POST"
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
                            @foreach ($products as $product)
                                <tbody class="table-border-bottom-0">
                                    <tr>
                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                            <strong>{{ $product->name }}</strong></td>
                                        <td>{{ $product->price }} $</td>
                                        <td><img src="{{ asset('asset/images/device')}}/{{$product->image }}" alt="product" width="30" height="30"></td>
                                        <td>
                                            <button class="btn btn-primary px-1" type="button" data-bs-toggle="offcanvas"
                                            data-bs-target="#offcanvasBackdrop1" aria-controls="offcanvasBackdrop1">
                                                Update
                                            </button>
                                                <!-- update device -->
                                                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasBackdrop1"
                                                    aria-labelledby="offcanvasBackdropLabel">
                                                    <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                                                        <p class="text-center">Update device information</p>
                                                        <div>
                                                            <form action="{{ route('admin.deviceUpdate',$product->id) }}" method="POST"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="form-group col-md-12">
                                                                    <label for="inputName">Name</label>
                                                                    <input type="text" name="name" class="form-control"
                                                                        id="inputName" value="{{$product->name}}">
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label for="inputName">Price</label>
                                                                    <input type="text" name="price" class="form-control"
                                                                        id="inputName" value="{{$product->price}}">
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
                                                    <input type="button" class="btn btn-danger px-1" value="Delete"
                                                        data-toggle="modal" data-target="#deleteModal">
                                                </a>
                                            </div>
                                        </td>
                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                                            aria-labelledby="deleteModal" aria-hidden="true">
                                            <form action={{ route('admin.deviceDelete',['device_id',$product->id]) }} method="post">
                                                @csrf
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <h5>Are you sure to delete this device</h5>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">No</button>
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
