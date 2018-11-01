@extends('layout/app')
@section('content')
    <h1>Index Sales</h1>
    <div class="row">
  <div class="col-12">
      <label id="compName">Company Name:</label>
    <input type="text" name="compName" class=" form-control form-group-lg" placeholder=".col-xs-2">
  </div>
 
</div>

<div class="row">
  <div class="col-2">
      <label id="compName">Company Name:</label>
    <input type="text" name="compName" class="form-control" placeholder=".col-xs-2">
  </div>
  <div class="col-6">
    <input type="text" class="form-control" placeholder=".col-xs-3">
  </div>
  <div class="col-4">
    <input type="text" class="form-control" placeholder=".col-xs-4">
  </div>
</div>

<table class="table table-condensed">
    <tr>
        <td style="width:150px;"><label id="compName">Company Name:</label></td>
        <td><input type="text" name="compName" class=" form-control" placeholder=".col-xs-2"></td>
    </tr>
    <tr>
        <td style="width:150px;"><label id="compName">Type of Business:</label></td>
        <td><input type="text" name="compName" class=" form-control" placeholder=".col-xs-2"></td>
    </tr>
    <tr>
        <td style="width:150px;"><label id="compName">Address:</label></td>
        <td><input type="text" name="compName" class=" form-control" placeholder=".col-xs-2"></td>
    </tr>
</table>
@endsection
