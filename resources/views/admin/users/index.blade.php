@extends('admin.layouts.master_layout')

@section('page')
    Users
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Users</h4>
                            <p class="category">List of all registered users</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Created at</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{!! $user->id !!}</td>
                                        <td>{!! $user->name !!}</td>
                                        <td>{!! $user->email!!}</td>
                                        <td>{!! $user->address!!}</td>
                                        <td>{!! $user->created_at->diffForHumans()!!}</td>
                                        <td>
                                            @if($user->status)
                                                <span class="label label-success">Active</span>
                                            @else
                                                <span class="label label-warning">blocked</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($user->status)
                                               {!! link_to_route('users.block','block',$user->id,['class'=>'btn btn-sm btn-warning']) !!}
                                            @else
                                               {!! link_to_route('users.active','active',$user->id,['class'=>'btn btn-sm btn-success']) !!}
                                            @endif
                                                {!! link_to_route('users.show','details',$user->id,['class'=>'btn btn-sm btn-primary']) !!}
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