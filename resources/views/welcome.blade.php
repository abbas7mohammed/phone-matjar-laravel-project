@extends('layout.navbar')
@section('front-contain')
            <div class="g-col-4">
                <img
                src={{ asset('asset/images/main.jpg') }}
                height="500"
                width="100%"
                alt="MDB Logo"
                loading="lazy"
                />
            </div>
            <!-- phone -->
            <section class="line-section">
            <div class="line-div">
                <h5 class="hr-lines"> best-selling </h5>
            </div>
            </section>
            <div class="container">
                <div class="row productMain ">
                    @foreach ($bests as $best)
                    <div class="col col-lg-4 ">
                        <div class="card" style="width: 12rem; padding:10px">
                            <img src={{ asset('asset/images/galaxy-note20.jpg')}} height="100"  class="card-img-top" alt="Sunset Over the Sea"/>
                            <div class="card-body productMain-item">
                              <div>
                                <p class="card-text">{{$best->name}}</p>
                              </div>
                              <div>
                                <small class="card-text" style="color: rgb(43, 27, 189); font-weight:bold">{{$best->price}}$</small>
                              </div>

                          </div>
                        </div>
                      </div>
                    @endforeach
                </div>
            </div>


@endsection
