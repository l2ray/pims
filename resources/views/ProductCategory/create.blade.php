@extends('layout/app')
@section('content')
    
    <div class="container content formCenter">
        <h3 class="centerIt">
            Please Use this form to add a Product category to the System.<br />
            Thank you.
        </h3>
            {!! Form::open(['action'=>'ProductCategoryController@store','method'=>'post']) !!}
            <div class="row">
                <div class="col-md-1">
                    {!! Form::label('pName','Product Name') !!}
                </div>
                <div class=" col-md-11 form-group">
        
        {!! Form::text('pName', '', ['class'=>'form-control','placeholder'=>'Please enter a category for Products' ,'required']) !!}
    </div>
            </div>
    <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-11 form-group">
                {!! Form::submit("Add Category", ['class'=>'btn btn-primary btn-lg btn-block']) !!}
            </div>
        </div>
    {{--  {!! Form::submit("Add Category", ['class'=>'btn btn-primary btn-lg btn-block']) !!}  --}}
    </div>
    
    
@endsection