@extends('front.layouts.master')

@section('content')

        <div class="row">
            <div class="col-md-12" id="register">
                <div class="card col-md-8">
                    <div class="card-body">
                        <h2 class="card-title">Sign Up</h2>
                        <hr>
                        {!! Form::open([url('/user/register')]) !!}
                            <div class="form-group {!! $errors->has('name')? 'has-error' : '' !!}">
                                {!! Form::Label('name','Name:') !!}
                                {!! Form::text('name','',['class'=>'form-control border-input','placeholder'=>'Name','id'=>'name','required'=>'required']) !!}
                                <span class="text-danger">{!! $errors->has('name')? $errors->first('name') : ''!!}</span>
                            </div>
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
                            <div class="form-group {!! $errors->has('password')? 'has-error' : '' !!}">
                                {!! Form::Label('password_confirmation','Confirm Password:') !!}
                                {!! Form::text('password_confirmation','',['class'=>'form-control border-input','placeholder'=>'Confirm Password','id'=>'password_confirmation','required'=>'required']) !!}
                                <span class="text-danger">{!! $errors->has('password')? $errors->first('password') : ''!!}</span>
                            </div>
                            <div class="form-group {!! $errors->has('address')? 'has-error' : '' !!}">
                                {!! Form::Label('address','Address:') !!}
                                {!! Form::text('address','',['class'=>'form-control border-input','placeholder'=>'Address','id'=>'address','required'=>'required']) !!}
                                <span class="text-danger">{!! $errors->has('address')? $errors->first('address') : ''!!}</span>
                            </div>
                            <div class="form-group">
                                {!! Form::input('submit','','Sign Up',['class'=>'btn btn-outline-info col-md-2']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection