@extends('admin.layouts.master_layout')

@section('page')
    Orders
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('admin.layouts.message')
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Orders</h4>
                            <p class="category">List of all orders</p>
                        </div>
                        <div class="content table-responsive table-full-width ">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{!! $order->id !!}</td>
                                    <td>{!! $order->user->name !!}</td>
                                    <td>
                                        @foreach($order->product as $item)
                                            {!! $item->name !!}
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($order->order_item as $order_item)
                                            {!! $order_item->quainty !!}
                                        @endforeach
                                    </td>
                                    <td>{!! $order->address !!}</td>
                                    <td>{!! $order->created_at->diffForHumans() !!}</td>
                                    <td>
                                        @if($order->status)
                                           <span class="label label-success">Confirmed</span>
                                        @else
                                            <span class="label label-warning">Pending</span>
                                        @endif

                                    </td>
                                    <td>
                                        @if($order->status)
                                            {!! link_to_route('orders.pending','Pending',$order->id,['class'=>'btn btn-sm btn-warning']) !!}
                                        @else
                                            {!! link_to_route('orders.confirm','Confirm',$order->id,['class'=>'btn btn-sm btn-success']) !!}
                                        @endif
                                           {!! link_to_route('orders.show','Details',$order->id,['class'=>'btn btn-sm btn-primary']) !!}
                                    </td>

                                </tr>
                                @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection