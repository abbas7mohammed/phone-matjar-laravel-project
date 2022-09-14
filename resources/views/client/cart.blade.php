@extends('layout.navbar')
@section('front-contain')
        <div class="container">
            <div class="row">
                <div>
                    <h6 class="mt-5 mb-4">Total price:
                        {{$sum1}}$
                    </h6>
                </div>
                <div class="col col-lg-8 ">
                    <table class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                          <tr>
                            <th>Item</th>
                            <th>Price</th>
                            <th></th>
                            <th>Amount</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        @foreach ($items as $item)
                        <tbody>
                            <tr>
                              <td>
                                <div class="d-flex align-items-center">
                                  <div class="ms-3">
                                    <p class="fw-bold mb-1">{{$item->name}}</p>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <p class="fw-normal mb-1">{{$item->newprice}} $</p>
                              </td>
                              <td>
                                <div class="btn-group mb-2 btn-group-sm">
                                    <a href={{ route('incrementPrice',['item_id'=>$item->id]) }}>
                                        <button class="btn btn-primary" type="button">+</button>
                                    </a>
                                    <a href={{ route('deccrementPrice',['item_id'=>$item->id]) }}>
                                        <button class="btn btn-primary" type="button">-</button>
                                    </a>
                                </div>
                              </td>
                              <td>
                                <p class="fw-normal mb-1">{{$item->quantity}}</p>
                              </td>
                              <td>
                                <form action={{ route('cardDelete',$item->id) }} method="post">
                                    @csrf
                                    <a href="">
                                        <button type="submit" class="btn btn-link btn-sm btn-rounded"/>
                                            delete
                                      </button>
                                    </a>
                                </form>
                              </td>
                            </tr>
                          </tbody>
                          @endforeach
                      </table>
                </div>
                <div class="col col-lg-4 ">

                </div>
            </div>

        </div>
@endsection




