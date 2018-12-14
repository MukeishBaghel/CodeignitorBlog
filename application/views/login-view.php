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

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	<div class="container">
	<a class="navbar-brand" href="<?=site_url('/');?>">MyBlog</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      
	</ul>
	<ul class="navbar-nav navbar-right">
	<li class="nav-item">
				<a href="<?php echo site_url('authentication/register');?>" class="nav-link">Sign Up</a>
			</li>
	</ul>
 	</div>
	</div>
	
</nav>

<section id="login">
<div class="row">
		<div class="col-md-4 mx-auto border rounded m-4 p-3">
		<?php echo form_open('authentication/loginProcess', 'class="p-3"'); ?>

			<h2 class="text-center">Login</h2>
			<?php if(validation_errors()): ?>
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong><?php echo validation_errors(); ?></strong>
				</div>
			<?php endif; ?>
			<?php if( $error = $this->session->flashdata('pass_err')): ?>
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong><?php echo $error; ?></strong>
				</div>
			<?php endif; ?>
			<?php if( $error = $this->session->flashdata('not_reg')): ?>
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong><?php echo $error; ?></strong>
				</div>
			<?php endif; ?>
			<?php if( $error = $this->session->flashdata('msg')): ?>
				<div class="alert alert-dismissible alert-warning">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong><?php echo $error; ?></strong>
				</div>
			<?php endif; ?>
			<div class="form-group">
				<label for="email">Email</label>
				<?php
				$data = array(
					'name'=>'email',
					'type'=>'email',
					'class'=>'form-control'
				);
				echo form_input($data); ?>	
			</div>
			<div class="form-group">
				<label for="password">Passwoord</label>
				<?php echo form_password('password','' ,'class="form-control"'); ?>	
			</div>
			<p class="lead">Did Not Registered yet! <?php echo anchor('/authentication/register', 'Register.');?></p>
			<?php echo form_submit('submit','Submit' ,'class="btn btn-success btn-block"'); ?>	
		<?php  echo form_close(); ?>
		</div>
	</div>
</section>

