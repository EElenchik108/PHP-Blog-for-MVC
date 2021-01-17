<!-- <?php
  session_start();  
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Blog</title>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/contacts">Contacts</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/aboutus">About us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/user">Users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/blog">Blog</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>

    <?php if(isset($_SESSION['user'])) :?>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><p style="margin-top:15px; color:#2560F6">You are logged in as, <?= $_SESSION['user'] ?> </p></li>
        <li class="nav-item ml-3">
        <form action="index.php" method="POST">
          <a class="btn btn-outline-primary" href="/user/output" style="margin-top:9px; margin-right:9px">Output</a>
        </form>
        </li>
      </ul>

    <?php else: ?> 
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="/user/registration" style="color:#0175EC">Registration</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/user/entrance" style="color:#0175EC">Entrance</a>
        </li>
      </ul>
    <?php endif ?>  

    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<!-- .container>.row>.col-md-8+.col-md-4 -->
	<div class="container">
		<div class="row">
			<div class="col-md-8">


        
