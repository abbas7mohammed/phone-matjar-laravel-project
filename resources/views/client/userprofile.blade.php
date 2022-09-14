@extends('layout.navbar')
@section('front-contain')
<div class="container">
    <div class="main-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="card1">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="{{ asset('asset/images/users')}}/{{Auth::user()->image }}" alt="person" class="rounded-circle bg-primary" width="110">
                            <div class="mt-3">
                                <h4>{{Auth::user()->name}}</h4>
                                <p class="text-secondary mb-1">{{Auth::user()->type}}</p>
                                @if (Auth::user()->type=='admin')
                                    <div class="col-sm-12 text-secondary">
                                        <a href={{ route('admin.dashboard')}}>
                                            <button type="button" class="btn btn-secondary px-4">Dashboard</button>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card1">
                    <form action={{route('profile.profileUpdate',Auth::user()->id)}} method="post">
                        @csrf
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-5">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-7 text-secondary">
                                    <input type="text" name="name" class="form-control" value={{Auth::user()->name}}>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-5">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-7 text-secondary">
                                    <input type="text" name="email" class="form-control" value={{Auth::user()->email}}>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-5">
                                    <h6 class="mb-0">Password</h6>
                                </div>
                                <div class="col-sm-7 text-secondary">
                                    <input type="password" name="password" class="form-control" value={{Auth::user()->password}}>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5"></div>
                                <div class="col-sm-7 text-secondary">
                                    <button type="submit" class="btn btn-primary px-4">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
