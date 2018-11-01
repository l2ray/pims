@extends('layout/loginLayout')
@section('content')
   
    
    <div class="content">
        <div class="row">
            <div class="col-md-8">
                {!! Form::open(['action'=>'LoginInController@store','method'=>'POST']) !!}
        <div class="row">
            <div class="col-md-4">
                {{--  <img src="{{ asset('images/loginImage.jpeg') }}" id="loginImage"/>  --}}
            </div>
            <div class="col-md-4">
                
            </div>
            <div class="col-md-4">
                {{--  <img src="{{ asset('images/loginImage.jpeg') }}" id="loginImage"/>  --}}
            </div>

        </div>
    <div class="row">
        <div class="col-md-3">
            
            {!! Form::label("userName", 'User Name', []) !!}
            
        </div>
        <div class="col-md-9">

            {!! Form::text("userName", "", ['class'=>'form-control','placeholder'=>'User Name','required']) !!}

        </div>

    </div>
    <br />
        <div class="row">
            <div class="col-md-3">
                {!! Form::label('pwrd', 'Password') !!}
            </div>
            <div class="col-md-9">
                {!! Form::password('pwrd', ['class'=>'form-control','placeholder'=>'Password','required']) !!}
            </div>
              
        </div>
        <br />
        <div class="row">
            <div class="col-md-3">
            </div><br />
            <div class="col-md-9">
              <span class="glyphicon glyphicon-heart"></span>{!! Form::submit('Log In', ['class'=>'btn btn-primary btn-lg btn-block']) !!}
            </div>
        </div>
        @if($errors->any())
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-9">
                <p class="errorMsg"> 
                    {{ $errors->first() }}
                </p>
            </div>
        </div>
        @endif
        
        
    {!! Form::close() !!}
            </div>
            <div class="col-md-4">
                <img src="{{ asset('images/Login.png') }}" id="loginImage"/>
            </div>
        </div>
    </div>
    
@endsection
<script>
    function preventBack(){
	window.history.forward();
}
function preventFowrard(){
    window.history.back();
}
setTimeout("preventForward",0);
setTimeout("preventBack()",0);

window.onunload = function(){ null };
</script>