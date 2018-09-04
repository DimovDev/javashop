@extends('front.layouts.master')

@section('content')
    <h2 class="mt-5"><i class="fa fa-shopping-cart"></i> Shooping Cart</h2>
            @if(Cart::instance('default')->count() > 0)
        <h4 class="mt-5">{!! Cart::instance('default')->count() !!} items(s) in Shopping Cart</h4>
        <div class="cart-items">
            <div class="row">
                <div class="col-md-12">
                    @include('admin.layouts.message')
                    <table class="table">
                        <tbody>
                          @foreach(Cart::instance('default')->content() as $row)
                             <tr>
                                 <td><img src="{!! url('uploads').'/'.$row->model->image !!}" style="width: 5em"></td>
                                 <td>
                                    <strong>{!! $row->model->name!!}</strong>
                                    <br>{!! $row->model->descrption !!}
                                </td>
                                <td>
                                    {!! Form::open(['route'=>['cart.destroy',$row->rowId],'method'=>'DELETE']) !!}
                                       {!! Form::button('Delete',['type'=>'submit','class'=>'btn btn-sm btn-outline-danger','onclick'=>'return confirm("You Sure To Delete This")']) !!}
                                        {!! link_to_route('cart.save','Save For Later',$row->rowId,['class'=>'btn btn-sm btn-outline-success']) !!}
                                    {!! Form::close() !!}

                                </td>
                                <td>
                                    <select name="qty" id="" class="form-control" style="width: 4.7em">
                                        <option value="{!!  $row->qty!!}">{{$row->qty}}</option>
                                        <option value="">2</option>
                                        <option value="">3</option>
                                        <option value="">4</option>
                                    </select>
                                </td>

                                <td>${!! $row->total() !!}</td>
                             </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Price Details -->
                <div class="col-md-6">
                    <div class="sub-total">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th colspan="2">Price Details</th>
                            </tr>
                            </thead>
                            <tr>
                                <td>Subtotal </td>
                                <td>${!! Cart::subtotal() !!}</td>
                            </tr>
                            <tr>
                                <td>Tax</td>
                                <td>${!!  Cart::tax() !!}</td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <th>${!! Cart::total()  !!}</th>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- Save for later  -->
                <div class="col-md-12">
                    <a href="{!! url('/') !!}" class="btn btn-outline-dark">Continue Shopping</a>
                    <a href="{!! url('/checkout') !!}"class="btn btn-outline-info">Proceed to checkout</a>
                    <hr>
                </div>
            @else
                <h2 class="text-center">No Item To Show</h2>
                <a href="{!! url('/') !!}" class="btn btn-outline-dark">Continue Shopping</a>
                <hr>
            @endif
            <div class="col-md-12">
                <h4>{!! Cart::instance('saveForLater')->count() !!} items Save for Later</h4>
                <table class="table">
                    <tbody>
                      @foreach(Cart::instance('saveForLater')->content() as $row )
                          <tr>
                        <td><img src="{!! url('uploads').'/'.$row->model->image !!}" style="width: 5em"></td>
                        <td>
                            <strong>{!! $row->model->name !!}</strong><br>{!! $row->model->descrption !!}
                        </td>

                        <td>
                            {!! Form::open(['route'=>['savelater.destroy',$row->rowId],'method'=>'DELETE']) !!}
                                {!! Form::button('Delete',['type'=>'submit','class'=>'btn btn-sm btn-outline-danger','onclick'=>'return confirm("You Sure To Delete This")']) !!}
                                {!! link_to_route('savelater.move','Move To Cart',$row->rowId,['class'=>'btn btn-sm btn-outline-success']) !!}
                            {!! Form::close() !!}

                        </td>

                             <td>
                                 <select name="qty" id="" class="form-control" style="width: 4.7em">
                                     <option value="{!!  $row->qty!!}">{{$row->qty}}</option>
                                     <option value="">2</option>
                                     <option value="">3</option>
                                     <option value="">4</option>
                                 </select>
                             </td>

                        <td>${!! $row->total()!!}</td>
                    </tr>
                      @endforeach
                    </tbody>

                </table>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
@endsection

