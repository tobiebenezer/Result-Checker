<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>@yield('title')</title>
</head>

<body style="height: 90vh;">
    <!-- header -->
    <header>
        <nav class="bg-dark text-white">
        <ul class="nav nav-tabs justify-content-end ">
  
  <li class="nav-item">
    <a class="nav-link" href="{{route('profile.show')}}">profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{route('logout')}}">logout</a>
  </li>
  </header>

<div>
<div class="row g-0" style="height: 90vh;">
<!-- sidebar -->
<div class="p-3 col-3 align-items-stretch fixed text-white bg-dark">
<a href="{{ route('lecturer.home') }}" class="text-white text-decoration-none">
<span class="fs-4">Admin Panel</span>
</a>
<hr />
<ul class="nav flex-column">
<li><a href="{{ route('lecturer.home') }}" class="nav-link text-white">- Admin - Home</a></li>
<li><a href="{{ route('lupload.form') }}" class="nav-link text-white">- Lecturer - Upload Result</a></li>
<li>
<a href="{{ route('lecturer.home') }}" class="mt-2 btn bg-primary text-white">Go back to the home page</a>
</li>
</ul>
</div>
<!-- sidebar -->
<div class="col content-grey">
<nav class="p-3 shadow text-end">
<span class="profile-font">Admin</span>
<img class="img-profile rounded-circle" src="{{ asset('/img/undraw_profile.svg') }}">
</nav>
<div class="g-0 m-5">
@yield('content')
</div>
</div>
</div>

    <!-- footer -->
    <div class="copyright py-4 text-center  bg-dark text-white">
        <div class="container">
            <small>
                Copyright - <a href="#" class="text-reset fw-bold text-decoration-none" target="_blank">  Awodumila, Tobi Ebenezer  </a>
            </small>
        </div>
    </div>
    </div>
    <!-- footer -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"> 
</script>
    -->
    <script src="{{ asset('js/app.js') }}" defer></script>


</body>
</html>