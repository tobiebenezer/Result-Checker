<!-- display html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./profile.css">
    <title>profile</title>
</head>
<body>
<header>
      <nav>
        
        <ul class="navi">
          <li><a href="./index.html">HOME</a></li>
          <li><a href="./profile.php">PROFILE</a></li>
          <li><a href="./#">USERS</a></li>
          <li><a href="./login.php">LOGIN</a></li>
          <li><a href="./register.php">REGISTER</a></li>
        </ul>
      </nav>
    </header>
    <main>
    <section>
    <div class="top">
    <span><img id="icon" src="./images/account.png" alt="profile icon"> <span id="text">My Profile </span> </span>
    </div>
    <div class="body">
        <div class='profile-table'>
            <div class="profile-pic">
                <div>
                    <form>
                    <img src="./images/add.png" alt="" onclick="triggerClick()" id="icon3" >
                    <input id="icon1" type="input" style="display: none;"  name="dp">
                        
                     </form>                   
                        <img id='avatar' src="./images/pexels-creation-hill-1681010.jpg" alt="Profile Avatar">
                    <p> <span><?php echo "$fname $lname" ?></span> </br>
                    You are welcome</p>
                </div>
            </div>
            <!-- calling table and values from table template  -->
            @yield('content')
    </div>
    </section>
    </main>
        <script src="./click.js"></script>
</body>
</html>
          