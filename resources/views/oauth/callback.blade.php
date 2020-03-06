<html>
<head>
  <meta charset="utf-8">
  <title>{{ config('app.name') }}</title>
  <meta name="description" content="Description content">
  <meta name="keywords" content="HTML,CSS,XML,JavaScript">
  <script>
    window.opener.postMessage({ token: "{{ $token }}" }, "{{ url('/') }}")
    window.close()
  </script>
</head>
<body>
  <h1 style="display:none"> This is car site </h1>
  <h2 style="display:none"> This is car site </h2>
</body>
</html>
