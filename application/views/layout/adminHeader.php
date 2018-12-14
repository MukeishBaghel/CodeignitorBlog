<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
	<!-- <link rel="stylesheet" href="https://bootswatch.com/4/slate/bootstrap.min.css"> -->
	<link rel="stylesheet" href="https://bootswatch.com/4/lumen/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url("/assets/css/main.css");?>">
	
	<title>MyBlog</title>
</head>
<body>
	<!--navigation  Bar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container">
	<a class="navbar-brand" href="<?php echo site_url('/')?>">MyBlog</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('authentication/dashboard')?>">Admin Home <span class="sr-only">(current)</span></a>
      </li>
      <!-- <li class="nav-item ">
				
        <a class="nav-link" href="<?php echo site_url('/blog')?>">Blog</a>
      </li> -->
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
	</ul>
	<ul class="navbar-nav navbar-right">
		<?php if(!$this->session->userdata('userid')):?>
			<li class="nav-item">
				<a href="<?php echo site_url('authentication/login');?>" class="nav-link">Login</a>
			</li>
			<li class="nav-item">
				<a href="<?php echo site_url('authentication/register');?>" class="nav-link">Sign Up</a>
			</li>
		<?php else:?>
			<li class="nav-item">
				<a href="<?php echo site_url('authentication/logout');?>" class="nav-link">Logout</a>
			</li>
		<?php endif;?>
	</ul>
 	</div>
	</div>
	
</nav>
	<!-- end navbar -->
 <!-- <i class="fas fa-4x fa-address-book"></i> -->
