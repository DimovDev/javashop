@extends('admin.layouts.master_layout')

@section('page')
    Users Deatils
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('admin.layouts.message')
                    <div class="card">
                        <div class="header">
                            <h4 class="title">{!! $user->name !!} Order Detail</h4>
                            <p class="category">List of all stock</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                                <tbody>

                                <tr>
                                    <th>Order id</th>
                                    <td>{!! $user->order[0]->id !!}</td>
                                </tr>

                                <tr>
                                    <th>Product Name</th>
                                    <td>{!! $user->order[0]->product[0]->name !!}</td>
                                </tr>

                                <tr>
                                    <th>Address</th>
                                    <td>{!! $user->order[0]->address !!}</td>
                                </tr>
                                <tr>
                                    <th>Quantity</th>
                                    <td>{!! $user->order[0]->order_item[0]->quainty !!}</td>
                                </tr>
                                <tr>
                                    <th>Total Price</th>
                                    <td>{!! $user->order[0]->order_item[0]->price !!}</td>
                                </tr>

                                <tr>
                                    <th>Status User</th>
                                    <td>
                                        @if($user->status)
                                            <span class="label label-success">Active</span>
                                        @else
                                            <span class="label label-warning">blocked</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status Order</th>
                                    <td>
                                        @if($user->order[0]->status)
                                            <span class="label label-primary">Confirmed</span>
                                        @else
                                            <span class="label label-warning">Pending</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Order Date</th>
                                    <td>{!! $user->order[0]->created_at->diffForHumans() !!}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
