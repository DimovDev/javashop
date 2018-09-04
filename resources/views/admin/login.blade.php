<!doctype html>
<html lang="en">
@include('admin.layouts.header')
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                JavaShop Admin
            </a>
        </div>
    </div>
</nav>
<div class="wrapper">
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @include('admin.layouts.message')
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Sign In</strong></h3>
                    </div>
                    <div class="panel-body">
                        @if($errors->has('message'))
                            <div class=" alert alert-danger has-error">
                               <span class="text-danger">{!! $errors->has('message')? $errors->first('message') : ''!!}</span>
                            </div>
                        @endif
                        {!! Form::open([route('login.store')]) !!}
                            <div class="form-group {!! $errors->has('email')? 'has-error': '' !!}">
                                {!! Form::label('Email:','email') !!}
                                {!! Form::email('email','',['id'=>'email','autocomplete'=>'off','placeholder'=>'Email','class'=>'form-control border-input']) !!}
                                <span class="text-danger">{!! $errors->has('email')? $errors->first('email') : ''!!}</span>
                            </div>
                            <div class="form-group {!! $errors->has('password')? 'has-error': '' !!}">
                                {!! Form::label('Password:','password') !!}
                                {!! Form::input('password','password','',['id'=>'password','autocomplete'=>'off','placeholder'=>'Password','class'=>'form-control border-input']) !!}
                                <span class="text-danger">{!! $errors->has('password')? $errors->first('password') : ''!!}</span>
                            </div>
                            <div class="form-group">
                                {!! Form::button('Sign In',['type'=>'submit','class'=>'btn btn-primary']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
    {!! Html::script('assets/js/jquery-1.10.2.js') !!}
    {!! Html::script('assets/js/scripts.js') !!}
    {!! Html::script('assets/js/bootstrap.min.js') !!}
</html>


