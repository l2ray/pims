{{--  
     $data = array('pRequesting' => $pRequesting,''=>$sRequesting,'pGiving'=>$pGiving,''=>$sGiving,
        'quantityRequesting'=>$quantityRequesting,'status'=>$status,''=>$requestingStaff,'approvingStaff'=>$approvingStaff,
        'reasonForRequest'=>$reasonForRequest);
    --}}
@extends('layout/app')
@section('content')
    <h1>Welcome to the index of the sdfs</h1>
    <div class="container-fluid tbl">
            <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <tr>
                <th>Store Requesting</th>
                <th>Store Giving</th>
                <th>Product Requesting</th>
                <th>Quantity Requesting</th>
                <th>Product Giving</th>
                <th>Officer Requesting</th>
                <th>Staff Approving</th>
                <th> is Approved</th>
                <th>Action</th>
            </tr>
    
            @for($x = 0;$x< count($sRequesting); $x++)
                @if ($status[$x]==0)
                    <tr class="danger">
                        <td>{{ $sRequesting[$x]}}</td>
                        <td>{{ $sGiving[$x] }}</td>
                        <td>{{ $pRequesting[$x] }}</td>
                        <td>{{ $quantityRequesting[$x] }}</td>
                        <td>{{ $pGiving[$x] }}</td>
                        <td>{{ $requestingStaff[$x] }}</td>
                        <td>{{ $approvingStaff[$x] }}</td>
                        <td> No </td>
                        <td><button class="btn btn-primary" onclick="submitData({{$id[$x] }})">Approve</button></td>
                    </tr>
                @else
                     <tr class="success">
                        <td>{{ $sRequesting[$x]}}</td>
                        <td>{{ $sGiving[$x] }}</td>
                        <td>{{ $pRequesting[$x] }}</td>
                        <td>{{ $quantityRequesting[$x] }}</td>
                        <td>{{ $pGiving[$x] }}</td>
                        <td>{{ $requestingStaff[$x] }}</td>
                        <td>{{ $approvingStaff[$x] }}</td>
                        <td> Yes </td>
                        <td><button  class="btn btn-primary">Approve</button></td>
                    </tr>
                @endif
                
                

            @endfor
        </table>
    </div>
    </div>
@endsection 
<script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
<script>
    function submitData($input){
           // alert($input);
            $.get('updateRequest/'+$input,function(data){
                window.location.replace("/approve"); 
            });
        }
    $(document).ready(function(){

        
    });
</script>