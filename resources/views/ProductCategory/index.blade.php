@extends('layout/app')
@section('content')
    <div class="container">
        <table class="">
            <tr>
                <th>Category Name</th>
            </tr>
            @foreach($pCatList as $cat)
                <tr>
                    <td>{{ $cat->catName }}</td>
                </tr>
                
            @endforeach
        </table>
    </div>
    
    <i class="fa fa-lock"></i>
@endsection