@extends('admin.layouts.master_layout')

@section('page')
    Order Details
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Order Details</h4>
                            <p class="category">Order details</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->date }}</td>
                                        <td>{{ $order->address }}</td>
                                        <td>
                                            @if ($order->status)
                                                <span class="label label-success">Confirmed</span>
                                            @else
                                                <span class="label label-warning">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($order->status)
                                            {{ link_to_route('orders.pending','Pending', $order->id, ['class'=>'btn btn-warning btn-sm']) }}
                                        @else
                                            {{ link_to_route('orders.confirm','Confirm', $order->id, ['class'=>'btn btn-success btn-sm']) }}
                                        @endif  </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">User Details</h4>
                            <p class="category">User Details</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $order->user->id }}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $order->user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $order->user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Registered At</th>
                                    <td>{{ $order->user->created_at->diffForHumans() }}</td>
                                </tr>

                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Product Details</h4>
                            <p class="category">Product Details</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <td>{{ $order->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Product Name</th>
                                        <td>{{ $order->product[0]->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Price</th>
                                        <td>{{ $order->order_item[0]->price }}</td>
                                    <tr>
                                        <th>Quantity</th>
                                        <td>{{ $order->order_item[0]->quainty }}</td>
                                    </tr>
                                    <tr>
                                        <th>Image</th>
                                        <td><img src="{{ url('uploads') . '/' .$order->product[0]->image }}" alt="" style="width: 100px"></td>
                                    </tr>
                                </thead>
                            </table>

                        </div>
                    </div>
                </div>
                <a href="{{ url('/admin/orders') }}" class="btn btn-success">Back to Orders</a>
            </div>
        </div>
    </div>
@endsection