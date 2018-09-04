
@extends('admin.layouts.master_layout')

@section('page')
    Edit Products
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10 col-md-10">
                    @include('admin.layouts.message')
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Edit Product</h4>
                        </div>
                        <div class="content">
                            {!! Form::open(['url' => ['admin/product',$product->id],'files'=>'true','method'=>'put']) !!}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {!! $errors->has('name')? 'has-error' : '' !!}">
                                        {!! Form::Label('name','Product Name:') !!}
                                        {!! Form::text('name',$product->name,['class'=>'form-control border-input','placeholder'=>'MackBook','required'=>'required']) !!}
                                        <span class="text-danger">{!! $errors->has('name')? $errors->first('name') : ''!!}</span>
                                    </div>
                                    <div class="form-group  {!! $errors->has('price')? 'has-error' : '' !!}">
                                        {!! Form::Label('price','Product Price:') !!}
                                        {!! Form::text('price',$product->price,['class'=>'form-control border-input','placeholder'=>'$2500','required'=>'required']) !!}
                                        <span class="text-danger">{!! $errors->has('price')? $errors->first('price') : ''!!}</span>
                                    </div>
                                    <div class="form-group  {!! $errors->has('descrption')? 'has-error' : '' !!}">
                                        {!! Form::Label('descrption','Product Price:') !!}
                                        {!! Form::textarea('descrption',$product->descrption,['class'=>'form-control border-input','required'=>'required','placeholder'=>'Product Description','cols'=>'30','rows'=>'7']) !!}
                                        <span class="text-danger">{!! $errors->has('descrption')? $errors->first('descrption') : ''!!}</span>
                                    </div>
                                    <div class="form-group  {!! $errors->has('image')? 'has-error' : '' !!}">
                                        {!! Form::Label('image','Product Image:') !!}
                                        {!! Form::file('image',['class'=>'form-control border-input','id'=>'image']) !!}
                                        <div id="thumb-output"></div>
                                        <span class="text-danger">{!! $errors->has('image')? $errors->first('image') : ''!!}</span>
                                    </div>
                                </div>
                                <div class="">
                                    {!! Form::submit('update Product',['class'=>'btn btn-info btn-fill btn-wd']) !!}
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

