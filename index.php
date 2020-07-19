<head>
<link rel="stylesheet" href="css/bootstrap.min.css">
<style>
  body{    
    background-image: url('images/beach.jpg');
    background-size: cover;
    /* background: linear-gradient(to bottom left, #000000 -4%, #00ccff 101%); */
  }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
     a:hover{background-color:antiquewhite; color:crimson;}

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      .nav-link{
        background-color: #ccffff;
        border-radius: 40px;
        margin: 5px;
              }
            
    h3{
      color:  #0086b3;
      margin-left: 542px;
      background-color:#ccffff;
      border-radius: 40px;  
      width:250px;    
    }

    .btn{
      border-radius: 50px;
    }
    </style>
    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="masthead mb-auto">
    <div class="inner">
      <h3 class="masthead-brand">E-LAUNDRY</h3>
      <nav class="nav nav-masthead justify-content-center">
        <a class="nav-link active " href="#">Home</a>
        <a class="nav-link loggg"  href="user/login.php">Login</a>
        <a class="nav-link" href="#">Contact</a>
      </nav>
    </div>
  </header>

  <main role="main" class="inner cover">
    <h1 class="cover-heading">Place New Request</h1>
    <p class="lead"><strong>To Thapar E-LAUNDRY System. Login to access the facility.</strong></p>
    <h5>New User? Then please sign up </h5>
    <p class="lead">
      <a href="user/signup.php" class="btn btn-lg btn-secondary">Sign Up</a>
    </p>
  </main>

  <footer class="mastfoot mt-auto">
    <div class="inner">
    </div>
  </footer>
</div>


<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>