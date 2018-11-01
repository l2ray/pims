@extends('layout/app')
@section('content')
     
     <div class="container content formCenter">
         <h3 class="centerIt">Please Use this form Add A Store and its Location for this Business Entity.<br/>Thank You</h3>
        {!! Form::open(['action'=>'StoreController@store','method'=>'POST']) !!}
        <div class="row">
            <div class="col-md-1">
                {!! Form::label('sName', 'Store Name') !!}
            </div>

                <div class="form-group col-md-11">
            
            {!! Form::text('sName', '', ['class'=>'form-control','placeholder'=>'Store Name','required']) !!}
        </div>
            </div>
            <div class="row">
                <div class="col-md-1">
                    {!! Form::label('sLocation', 'Store Location') !!}
                </div>
                <div class="col-md-11 form-controll">
                
                {!! Form::text('sLocation', '', ['class'=>'form-control','placeholder'=>'Store Location','required']) !!}
        </div>
            </div>
            <div class="row">
                <div class="col-md-1">

                </div>
                <div class="form-controll col-md-11">
                    {!! Form::submit("Add Store", ['class'=>'btn btn-primary']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
     
     
     
     
@endsection
