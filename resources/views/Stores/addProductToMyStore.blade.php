
@extends('layout/app')
@section('content')
    <h1>Adding Product to Store{{ $id }}</h1>
    
    {!! Form::open(['action'=>'CustomStoreController@store','method'=>'POST']) !!}
        <div class="form-group">
            {{-- {!! Form::label("pName", "Product Name") !!} --}}
            {!! Form::text("pName", "", ['required','class'=>'form-control','placeholder'=>'Product Name']) !!}
        </div>s
        <div class="form-group">
            {{-- {!! Form::label("pUPrice", "Unit Price") !!} --}}
            {!! Form::number("pUPrice", "", ['required','class'=>'form-control','placeholder'=>'Product Unit Price']) !!}
        </div>
        <div class="form-group">
            {{-- {!! Form::label("pQuantity", "Quantity") !!} --}}
            {!! Form::number("pQuantity", "", ['required','class'=>'form-control','placeholder'=>'Product Quantity']) !!}
        </div>
        <div class="form-group">
            {!! Form::number('tHold', '', ['class'=>'form-control','required','placeholder'=>'Tresh Hold']) !!}
        </div>
        <div class="form-group">
            {!! Form::label("pMDate", "Manufacturing Date") !!}
                
            {!! Form::date("pMDate", "", ['required','class'=>'form-control','placeholder'=>'YYYY-MM-DD']) !!}
        </div>
        <div class="form-group">
            {!! Form::label("pExpDate", "Expiry Date") !!}
                    
             {!! Form::date("pExpDate", "", ['required','class'=>'form-control','placeholder'=>'YYYY-MM-DD']) !!}
        </div>
        <div class="form-group">
            {!! Form::label("pStore", "Product Store") !!}
                        
            {!! Form::text("pStore", " $storeName ", ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('catName', 'Product Category') !!}
            {!! Form::select('catName', $storeList, null, ['required','class'=>"form-control"]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('pType', 'Product Type') !!}
            {!! Form::select('pType',$pTypeList, null, ['required','class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('wTreshHold','Warning Tresh Hold') !!}
            {!! Form::number("wTreshHold", "", ['required','class'=>'form-control','placeholder'=>'Product Unit Price'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('isTax','Warning Tresh Hold') !!}
            {!! Form::select('isTax', array('1' => 'Yes', '0' => 'No'), 'S',['placeholder'=>'Is Taxable?','required','class'=>'form-control']); !!}
        </div>
        <div class="form-group">
           
                        
            {!! Form::text("id", " $id ", ['class'=>'form-control'])!!}
        </div>

          {!! Form::submit("Submit", ['class'=>'btn btn-primary btn-lg btn-block']) !!}
          
          {!! Form::close() !!}
          
   
    
@endsection