<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>@yield('title')</title>
</head>

<body>
    <!-- header -->
    <header>
        <nav class="bg-dark text-white">
        <ul class="nav nav-tabs justify-content-end ">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">View Results</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">logout</a>
  </li>
  

</ul>
        </nav>
    </header>  
      <!-- end of header -->

      <div class="container">
         @yield('content')
      </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>