@extends('layout/app')
@section('content')
 <div class="formCenter container">
    <h1>Add A Product</h1>
    @if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif
    
   
            {!! Form::open(['action'=>'ProductController@store','method'=>'POST']) !!}
        <div class="row">
            <div class="col-md-2">
               {!! Form::label("pName", "Product Name") !!}
            </div>
            <div class="col-md-10 form-group">
               {!! Form::text("pName", "", ['required','class'=>'form-control','placeholder'=>'Product Name']) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                {!! Form::label("pGName", "Product Generic Name") !!}
            </div>
            <div class="form-group col-md-10">
                {!! Form::text("pGName", "", ['required','class'=>'form-control','placeholder'=>'Product Generac Name']) !!}
            </div>
            
        </div>
       <div class="row">
        <div class="col-md-2">
            {!! Form::label("pUPrice","UnitPrice") !!}
        </div>
         <div class="form-group col-md-10">
            
            {!! Form::number("pUPrice", "", ['required','class'=>'form-control','placeholder'=>'Product Unit Price']) !!}
        </div>
       </div>
        <div class="row">
            <div class="col-md-2">
                {!! Form::label("pQuantity", "Quantity") !!}
            </div>
            <div class="form-group col-md-10">
            {!! Form::number("pQuantity", "", ['required','class'=>'form-control','placeholder'=>'Product Quantity']) !!}
        </div>
        </div>
        <div class="row">
            <div class="col-md-2">
            
            {!! Form::label('tHold', 'Tresh hold', []) !!}
            
        </div>
        <div class="form-group col-md-10">
            {!! Form::number('tHold', '', ['class'=>'form-control','required','placeholder'=>'Tresh Hold']) !!}
        </div>
        </div>
        <div class="row">
            <div class="col-md-2">
            {!! Form::label("pMDate", "Manufacturing Date") !!}
        </div>
        <div class="form-group col-md-10">
            {!! Form::date("pMDate", "", ['required','class'=>'form-control','placeholder'=>'YYYY-MM-DD']) !!}
        </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                {!! Form::label("pExpDate", "Expiry Date") !!}
            </div>
            <div class="form-group col-md-10">
                {!! Form::date("pExpDate", "", ['required','class'=>'form-control','placeholder'=>'YYYY-MM-DD']) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                {!! Form::label("pStore", "Product Store") !!}
            </div>
            <div class="form-group col-md-10">
                {!! Form::select('pStore', $sList,null, ['required','class'=>"form-control"] )!!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                {!! Form::label('catName', 'Product Category') !!}
            </div>
           <div class="form-group col-md-10">
                {!! Form::select('catName', $storeList, null, ['required','class'=>"form-control"]) !!}
           </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                {!! Form::label('pType', 'Product Type') !!}
            </div>
            <div class="form-group col-md-10">
                 {!! Form::select('pType',$pTypeList, null, ['required','class'=>'form-control']) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                {!! Form::label('wTreshHold','Reorder Level') !!}
            </div>
            <div class="form-group col-md-10">
                {!! Form::number("wTreshHold", "", ['required','class'=>'form-control','placeholder'=>'Product Unit Price'])!!}
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                {!! Form::label('isTax','Warning Tresh Hold') !!}
            </div>
            <div class="form-group col-md-10">
                {!! Form::select('isTax', array('1' => 'Yes', '0' => 'No'), 'S',['placeholder'=>'Is Taxable?','required','class'=>'form-control']); !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10 form-group">
                {!! Form::submit("Submit", ['class'=>'btn btn-primary btn-lg btn-block']) !!}
            </div>
        </div>
          
          {!! Form::close() !!}
    </div>
          
   
    
@endsection



