@extends('layout/app')
@section('content')
    
    <div class="container content formCenter">
         <h3 class="centerIt">
            Please Use this form to add a Product Type to the System.<br />
            Thank you.
        </h3>
        {!! Form::open(['action'=>'ProductTypeController@store','method'=>'POST']) !!}
        <div class="row">
            <div class="col-md-1">
                {!! Form::label('typeName', 'Type Name') !!}
            </div>
            <div class=" col-md-11 form-group">
                {!! Form::text('typeName', '', ['class'=>'form-control','placeholder'=>'Product Type','required']) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-11 form-group">
                {!! Form::submit("Add Category", ['class'=>'btn btn-primary btn-lg btn-block']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
