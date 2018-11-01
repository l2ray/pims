@extends('layout/app')
@section('content')
   
   {!! Form::open(['action'=>'monthlySales@store','method'=>'POST']) !!}
         <div class="form-group">
            {!! Form::label("startMonth", "Start Date") !!}
                
            {!! Form::date("startMonth", "", ['required','class'=>'form-control','placeholder'=>'YYYY-MM-DD']) !!}
        </div>
        <div class="form-group">
            {!! Form::label("endMonth", "End Date") !!}
                    
             {!! Form::date("endMonth", "", ['required','class'=>'form-control','placeholder'=>'YYYY-MM-DD']) !!}
        </div>
        {!! Form::submit("Submit", ['class'=>'btn btn-primary btn-lg btn-block']) !!}
   {!! Form::close() !!}
   
   <div class="container">
					<div class="row">
						<div class="col-lg-1 bg-warning">
							1
						</div>
						<div class="col-lg-1 bg-info">
							2
						</div>
						<div class="col-lg-1 bg-danger">
							3
						</div>
						<div class="col-lg-1 bg-success">
							4
						</div>
						<div class="col-lg-1 bg-warning">
							5
						</div>
						<div class="col-lg-1 bg-info">
							6
						</div>
						<div class="col-lg-1 bg-danger">
							7
						</div>
						<div class="col-lg-1 bg-success">
							8
						</div>
						<div class="col-lg-1 bg-warning">
							9
						</div>
						<div class="col-lg-1 bg-info">
							10
						</div>
						<div class="col-lg-1 bg-danger">
							11
						</div>
						<div class="col-lg-1 bg-success">
							12
						</div>
					</div>
				</div>
@endsection