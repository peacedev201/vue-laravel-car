@php
$config = [
    'appName' => config('app.name'),
    'locale' => config('app.locale'),
    'locales' => config('app.locales')
];
@endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> iAuto - Best på Bruktbil</title>
  <meta name="description" content="Kjøp brukte biler av topp kvalitet til ditt neste prosjekt fra det største og mest pålitelige bilstedet. Lær hvordan du kan få fantastiske biler mer gjort med økt produktivitet og finn ut hvorfor 90% av kundene våre kommer hit."/>
  <meta name="keywords" content="Bruktbil, Bil, Auto, iauto"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css" integrity="sha384-i1LQnF23gykqWXg6jxC2ZbCbUMxyw5gLZY6UiUS98LYV5unm8GWmfkIS6jqJfb4E" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css">
</head>
<body style="margin: 0;">
  <div id="admin">
  <h1 style="display:none"> Kjøp brukte biler av topp kvalitet til ditt neste prosjekt fra det største og mest pålitelige bilstedet. Lær hvordan du kan få fantastiske biler mer gjort med økt produktivitet og finn ut hvorfor 90% av kundene våre kommer hit. </h1>
  <h2 style="display:none"> Kjøp brukte biler av topp kvalitet til ditt neste prosjekt fra det største og mest pålitelige bilstedet. Lær hvordan du kan få fantastiske biler mer gjort med økt produktivitet og finn ut hvorfor 90% av kundene våre kommer hit. </h2>
  </div>

  {{-- Global configuration object --}}
  <script>
    window.config = @json($config);
  </script>

  {{-- Load the application scripts --}}
  <script type="text/javascript" src="{{ mix('dist/js/admin.js') }}"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>

</body>
</html>
