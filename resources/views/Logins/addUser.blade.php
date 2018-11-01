@extends('layout/app')
@section('content')
   

   
   
   <div class="content formCenter container">
       <h1 class="centerIt">Welcome to the add user Section Of The Application<br />
        Please Fill in the form to add a user to your System.<br/>Thank You</h1>
       @if ($errors->any())
           <i class="bg-danger">{{ $errors->first() }}</i>
       @endif
        {!! Form::open(['action'=>'LoginInController@storeUser','method'=>'POST']) !!}
       <div class="row">
           <div class="col-md-1">
               
               {!! Form::label("name", "Staff Name", []) !!}
               
           </div>
           <div class="col-md-11 form-group">
               
               {!! Form::text("name", "", ['class'=>'form-control','placeholder'=>'Staff Name','required']) !!}
               
           </div>
       </div>
       <div class="row">
           <div class="col-md-1">
               
               {!! Form::label("uName", "User Name", []) !!}
               
           </div>
           <div class="col-md-11 form-group">
               
               {!! Form::text("uName", "", ['class'=>'form-control','placeholder'=>'User Name','required']) !!}
               
           </div>
       </div>
         <div class="row">
           <div class="col-md-1">
               
               {!! Form::label("pass", "Password", []) !!}
               
           </div>
           <div class="col-md-11 form-group">
               {!! Form::password("pass", ['class'=>'form-control','placeholder'=>'Password','required']) !!}
           </div>
       </div>
        <div class="row">
           <div class="col-md-1">
               
               {!! Form::label("conPass", "Confirm Password", []) !!}
               
           </div>
           <div class="col-md-11 form-group">
               {!! Form::password("conPass", ['class'=>'form-control','placeholder'=>'Confirm Password','required']) !!}
           </div>
       </div>
       {{--  {{ --branchId}}  --}}
        <div class="row">
           <div class="col-md-1">
               
               {!! Form::label("address", "Address", []) !!}
               
           </div>
           <div class="col-md-11 form-group">
               {!! Form::text("address","", ['class'=>'form-control','placeholder'=>'Address','required']) !!}
           </div>
       </div>
       <div class="row">
         
           <div class="col-md-1">
               
               {!! Form::label("pNo", "Phone Number", []) !!}
               
           </div>
           <div class="col-md-11 form-group">
               
               {!! Form::number("pNo","", ['type'=>'number','class'=>'form-control','placeholder'=>'Phone Number','required']) !!}
               
           </div>
       </div>
       <div class="row">
           <div class="col-md-1">
               
               {!! Form::label("bNum", "Branch Number", []) !!}
               
           </div>
           <div class="col-md-11 form-group">
               
               
               {!! Form::select("bNum", $bList, null, ['required','class'=>"form-control"]) !!}
               
               
           </div>
       </div>
       <div class="row">
           <div class="col-md-1">
               
             
               
           </div>
           <div class="col-md-11 form-group">
               
               
               {!! Form::submit("Submit", ['class'=>'btn btn-primary btn-lg btn-block']) !!}
               
               
           </div>
       </div>
       {!! Form::close() !!}
       
   </div>
   
   
@endsection

