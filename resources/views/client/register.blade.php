@extends('layout.navbar')
@section('front-contain')
    <div class="container-xxl" style="padding: 25px">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div>
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <div style="display: flex; flex-direction: column; justify-content:cemter; text-align:center">
                            <h4 class="mb-2">Register</h4>
                            <p class="mb-4">Please sign-in to your account and start purchasing</p>
                        </div>
                        <form action="{{ route('register.create') }}" id="formAuthentication" class="mb-3"
                            action="index.html" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Username</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter your username" autofocus />
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter your email" autofocus />
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Enter your password" autofocus />
                            </div>
                            <div class="mb-3">
                                <label for="formImage" class="form-label">choose your personal image</label>
                                <input class="form-control form-control-sm" id="formImage" type="file" name="image" />
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>

    <!-- / Content -->
@endsection
