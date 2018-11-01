<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name','PIMS') }}</title>
         {{--  <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />  --}}
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css"  /> 
         <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
          <link href="{{ asset('css/myCustom.css') }}" rel="stylesheet" type="text/css" />
         {{--  <link href="{{ asset('css/FontAwesome.css') }}"  rel="stylesheet" type="text/css">  --}}
         
        

        

    </head>
    <body

    <header>
{{-- <nav class="navbar navbar-expand-md navbar-dark  bg-dark"> --}}
      @include('inc/nav')
                
            @yield('content')

            {{--  <script src="{{ asset('js/test.js') }}"></script>  --}}
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
    </body>
</html>