@php
$config = [
    'appName' => config('app.name'),
    'locale' => $locale = app()->getLocale(),
    'locales' => config('app.locales'),
];
@endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <title> iAuto - Best på Bruktbil</title>

  <meta name="description" content="Kjøp brukte biler av topp kvalitet til ditt neste prosjekt fra det største og mest pålitelige bilstedet. Lær hvordan du kan få fantastiske biler mer gjort med økt produktivitet og finn ut hvorfor 90% av kundene våre kommer hit."/>
  <meta name="keywords" content="car,high-quality,buy,trust"/>

  {{-- <link rel="stylesheet" href="{{ mix('dist/css/app.css') }}"> --}}
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css" integrity="sha384-i1LQnF23gykqWXg6jxC2ZbCbUMxyw5gLZY6UiUS98LYV5unm8GWmfkIS6jqJfb4E" crossorigin="anonymous">
  <link rel="stylesheet" href="/stm-icon.css"/>
  <style>    
    #load{
      width:100%;
      height:100%;
      position:fixed;
      z-index:9999;
      background:url("/images/loading-popup.gif") no-repeat center center rgba(255,255,255,1)
    }
  </style>
</head>
<body>
  <h1 style="display:none"> Buy top‑quality used cars for your next project from the largest and most trusted car site. Learn how you can get great cars more done with increased productivity and find out why 90% of our customers come here. </h1>
  <h2 style="display:none"> Buy top‑quality used cars for your next project from the largest and most trusted car site. Learn how you can get great cars more done with increased productivity and find out why 90% of our customers come here. </h2>
    <div id="load"></div>
    <div id="app"></div>
  {{-- Global configuration object --}}
  <script>
    window.config = @json($config);
  </script>

  {{-- Load the application scripts --}}
  <script>
    document.onreadystatechange = function () {
    var state = document.readyState
    if (state == 'interactive') {
        document.getElementById('app').style.visibility="hidden";
    } else if (state == 'complete') {
        setTimeout(function(){
          document.getElementById('interactive');
          document.getElementById('load').style.visibility="hidden";
          document.getElementById('app').style.visibility="visible";
        },1000);
    }
  }
  </script>
  <script type="text/javascript" src="{{ mix('dist/js/app.js') }}"></script>
</body>
</html>
