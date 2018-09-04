@extends('front.layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12" id="register">
            <div class="card col-md-8">
                <div class="card-body">
                    <h2 class="card-title">Login</h2>
                    <hr>
                    @include('admin.layouts.message')
                    {!! Form::open([url('/user/login')]) !!}
                        <div class="form-group {!! $errors->has('email')? 'has-error' : '' !!}">
                            {!! Form::Label('email','Email:') !!}
                            {!! Form::text('email','',['class'=>'form-control border-input','placeholder'=>'Email','id'=>'email','required'=>'required']) !!}
                            <span class="text-danger">{!! $errors->has('email')? $errors->first('email') : ''!!}</span>
                        </div>
                        <div class="form-group {!! $errors->has('password')? 'has-error' : '' !!}">
                            {!! Form::Label('password','Password:') !!}
                            {!! Form::text('password','',['class'=>'form-control border-input','placeholder'=>'Password','id'=>'password','required'=>'required']) !!}
                            <span class="text-danger">{!! $errors->has('password')? $errors->first('password') : ''!!}</span>
                        </div>
                        {!! Form::input('submit','','Login',['class'=>'btn btn-outline-info col-md-2']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection