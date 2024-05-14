
<html>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content="widht=device-width, initial-scale=1,0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('icons/font/bootstrap-icons.css')}}">
    <script defer src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <title>@yield('title') </title>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <span class="navbar-brand">Systema Administración</span>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{url('/providers')}}">proveedores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{( url('/products') )}}">productos</a>
        </li>
    </div>
  </div>
</nav>
    <div class="container">
        @yield('content')
    </div>
</body>

</html>

<!--
 * Jhonatan Samuel Martinez Hernandez
 * Software Analyts and Developer
 * code 2675859
 * SENA 
 * Year 2024
-->
