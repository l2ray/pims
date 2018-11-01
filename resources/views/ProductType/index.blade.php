@extends('layout/app')
@section('content')
    @foreach($pTypes as $pType)
        {{ $pType ->tName}}<br/>
    @endforeach
@endsection
