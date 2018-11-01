<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
{{--  <meta name="viewport" content="width=device-width, initial-scale=1">  --}}
    <link rel="stylesheet" href="asset({{ 'css/gli.css' }})">
        <title>{{ config('app.name','PIMS') }}</title>
         {{--  <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />  --}}
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css"  /> 
         <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
         <link href="{{ asset('css/myCustom.css') }}" rel="stylesheet" type="text/css" />
         <style>
             @font-face{
                  font-family: 'lamin';
  src: url("asset{{ 'customFont.otf' }}"); /* IE9 Compat Modes */
 /* src: url("asset{{ 'customFont.otf' }}") format('embedded-opentype'), /* IE6-IE8 
       url("asset{{ 'customFont.otf' }}") format('woff2'), /* Super Modern Browsers 
       url("asset{{ 'customFont.otf' }}") format('woff'), /* Pretty Modern Browsers 
       url("asset{{ 'customFont.otf' }}")  format('truetype'), /* Safari, Android, iOS *
       url('webfont.svg#svgFontName') format('svg');  Legacy iOS 
       */
customFont.otf
             }
             body{
                 background-image: url("{{ asset('images/pharmacyBackground.jpg') }}");
                 background-attachment:fixed;
                 background-size:100%;
                 font-family:'lamin';  
             }
             
             .content{
                 margin:0px auto;
                width:700px;
                margin-top:10%;
                opacity:0.9;
                background-color:white;
                padding:20px;
             }
             #loginImage{
               width:200px;
                height: 200px;
              
             }
         </style>
    </head>
    <body

    <header>
{{-- <nav class="navbar navbar-expand-md navbar-dark  bg-dark"> --}}
                
            @yield('content')

            {{--  <script src="{{ asset('js/test.js') }}"></script>  --}}
    </body>
</html>