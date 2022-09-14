@extends('layout.navbar')
@section('front-contain')
            @auth()
            <div class="container">
                <div class="row productMain ">
                @foreach ($devices as $device)
                    <div class="col col-lg-3 ">
                        <div class="card" style="width: 12rem; padding:10px; margin:10px">
                            <div style=" width=60">
                                <img src="{{ asset('asset/images/device')}}/{{$device->image }}" height="100" class="card-img-top" alt="Sunset Over the Sea"/>
                            </div>
                            <div class="card-body productMain-item">
                            <div>
                                <p  class="card-text">{{$device->name}}</p>
                            </div>
                            <div>
                                <small class="card-text" style="color: rgb(43, 27, 189); font-weight:bold">{{$device->price}}$</small>
                            </div>
                            <div style="margin-top:10px;display: flex; justify-content:space-around">
                                <div>
                                    <a href="{{ route('device_addtocart', ['device_id'=>$device->id,'device_name'=>$device->name, 'device_price'=>$device->price ,'user_id'=>Auth::user()->id]) }}" >
                                        <button class="btn btn-secondary d-grid w-100" >Add to cart</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
            @endauth

            @guest()
            <div class="container">
                <div class="row productMain ">
                @foreach ($devices as $device)
                    <div class="col col-lg-3 ">
                        <div class="card" style="width: 12rem; padding:10px; margin:10px">
                            <img src="{{ asset('asset/images/device')}}/{{$device->image }}" alt="product" height="130" >
                        <div class="card-body productMain-item">
                        <div class="card-body productMain-item">
                            <div>
                                <p  class="card-text">{{$device->name}}</p>
                            </div>
                            <div>
                                <small class="card-text" style="color: rgb(43, 27, 189); font-weight:bold">{{$device->price}}$</small>
                            </div>
                            <div style="margin-top:10px;display: flex; justify-content:space-around">
                                <div>
                                    <button class="btn btn-secondary d-grid w-100" data-toggle="modal" data-target="#cartModal" >Add to cart</button>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                @endforeach
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        Sign in required
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href={{ route('signin.index') }}>
                        <button type="button" class="btn btn-primary">Sign in</button>
                    </a>
                    </div>
                </div>
                </div>
            </div>
            @endguest

@endsection




