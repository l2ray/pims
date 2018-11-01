@extends('layout/app')
@section('content')
<div class="row">
    <div class="col-sm-8" id="form">
{!! Form::open(['action'=>'SalesController@store','method'=>'POST']) !!}
    <div>
        <div class="form-group row">

            {!! Form::label("cusName", "Customer Name", ["class"=>"col-sm-1 col-form-label"]) !!}
            <div class="col-sm-5">
                {!! Form::text("cusName", '', ['class'=>'form-control','placeholder'=>'Customer Name']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label("address", "Address", ["class"=>"col-sm-1 col-form-label"]) !!}
            <div class="col-sm-5">
                {!! Form::text("address", '', ['class'=>'form-control','placeholder'=>'Customer Address']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label("pNo", "Phone Number", ["class"=>"col-sm-1 col-form-label"]) !!}
            <div class="col-sm-5">
                {!! Form::number("pNo", '', ['class'=>'form-control','placeholder'=>'Customer Address']) !!}
            </div>
        </div>
    </div>

    <div >
                 <div class="form-group row" >

            {!! Form::label("question", "", ["class"=>"col-sm-1 col-form-label"]) !!}
            <div class="col-sm-5">
                
                {!! Form::checkbox("question", "Is Product Name Generic", "no",["id"=>"isGeneric"]) !!}
                
            </div>
        </div>
         <div class="form-group row" id="isGeneric1">
            <div >
            {!! Form::label("pGName", "Generic Name", ["class"=>"col-sm-1 col-form-label"]) !!}
            </div>
            <div >
                {!! Form::select('pGId', $pGList, "Please Select ", ['id'=>'proGId','required','class'=>"form-control",'placeholder'=>'Please Select A Product']) !!}
            </div>
        </div>

        <div  class="form-group row" id="proId1">
            <div>
            {!! Form::label("pName", "Product Name", ["class"=>"col-sm-1 col-form-label"]) !!}
            </div>
            <div >
                {!! Form::select('pId', $pList, "Please Select ", ['id'=>'proId','required','class'=>"form-control",'placeholder'=>'Please Select A Product']) !!}
            </div>
        </div>
        <div class="form-group row">
            
                {!! Form::label("uPrice", "Unit Price", ["class"=>"col-sm-1 col-form-label"]) !!}
           
            
            <div class="col-sm-5">
                {!! Form::text("", "0",["id"=>"unitPrice",'class'=>"form-control","readonly"]) !!}
            {{--  {!! Form::text("uPrice", '', ['class'=>'form-control','placeholder'=>'Customer Address']) !!}  --}}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label("pQ", "Quantity", ["class"=>"col-sm-1 col-form-label"]) !!}
            <div class="col-sm-5">
                {!! Form::number("pQ", '', ['id'=>'pQuantity','class'=>'form-control','placeholder'=>'Product Quantity']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label("tP", "Total Purchace", ["class"=>"col-sm-1 col-form-label"]) !!}
            <div class="col-sm-5">
                {!! Form::text("totalPrice", "0",["id"=>"totalPrice",'class'=>"form-control",'readonly']) !!}
                {{--  {!! Form::text("uPrice", '', ['class'=>'form-control','placeholder'=>'Customer Address']) !!}  --}}
            </div>
        </div>
        <div class="form-group row">
            {{-- {!! Form::label("sP", "Sales Person", ["class"=>"col-sm-1 col-form-label"]) !!} --}}
            <div class="col-sm-5">
                {!! Form::text("Sales_Person", "",["id"=>"watchForId",'class'=>"form-control hideField","min"=>"0.00", "max"=>"10000.00", "step"=>"0.01"]) !!}
                {{--  {!! Form::text("uPrice", '', ['class'=>'form-control','placeholder'=>'Customer Address']) !!}  --}}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label("sP", "Sales Person", ["class"=>"col-sm-1 col-form-label"]) !!}
            <div class="col-sm-5">
                {!! Form::text("Sales_Person", "Lamin O. Touray",["id"=>"totalPrice",'class'=>"form-control",'readonly',"min"=>"0.00", "max"=>"10000.00", "step"=>"0.01"]) !!}
                {{--  {!! Form::text("uPrice", '', ['class'=>'form-control','placeholder'=>'Customer Address']) !!}  --}}
            </div>
        </div>
    </div>
    {!! Form::submit("Submit", ['onClick'=>'SubmitData()','class'=>'btn btn-primary btn-full','id'=>'productSubmit']) !!}

{!! Form::close() !!}
</div>
    {{--  9343318one  --}}
<div  class="col-sm-2" id="table">
    <table id="tblSales" class="table-bordered table-striped table table-bordered table-hover table-condensed">
        <tr>
            <th>Product Name</th>
            <th>Product Quantity</th>
            <th>Total Price</th>
            <th>Action</th>
        </tr>
        
    </table>
</div>
</div>
 {{ Session::get('test') }}
@endsection
<script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('js/productMani.js')}}"></script>
{{--  <script src="js/test.js"></script>  --}}


