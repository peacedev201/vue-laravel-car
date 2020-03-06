{{-- Illuminate/Foundation/Exceptions/views --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Description content">
  <meta name="keywords" content="HTML,CSS,XML,JavaScript">
  <title>@yield('title')</title>

  <!-- Fonts -->
  <!-- Styles -->
  <style>
  html, body {
    /* background-color: #fff; */
    color: #636b6f;
    /* font-family: 'Raleway', sans-serif; */
    font-weight: 700;
    height: 100vh;
    margin: 0;
  }

  .full-height {
    height: 100vh;
  }

  .flex-center {
    align-items: center;
    display: flex;
    justify-content: center;
  }

  .position-ref {
    position: relative;
  }

  .content {
    text-align: center;
  }

  .title {
    font-size: 36px;
    padding: 20px;
  }
</style>
</head>
<body>
  <h1 style="display:none"> This is car site </h1>
  <h2 style="display:none"> This is car site </h2>
  <div class="flex-center position-ref full-height">
    <div class="content">
      <div class="title">
        @yield('message')
      </div>
    </div>
  </div>
</body>
</html>
