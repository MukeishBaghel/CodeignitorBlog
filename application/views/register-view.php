<?php require_once "layout/header.php"?>
<section class="register">
	<div class="row">
		<div class="col-md-4 mx-auto border rounded m-4 p-3">
		<?php echo form_open('authentication/registerProcess', 'class="p-3"'); ?>

			<h1 class="text-center">Regiter With US</h1>
			<?php if(validation_errors()): ?>
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong><?php echo validation_errors(); ?></strong>
				</div>
			<?php endif; ?>
			<div class="form-group">
				<label for="fullname">Full Name</label>
				<?php echo form_input('fullname','' ,'class="form-control"'); ?>	
			</div>
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
			<div class="form-group">
				<label for="username">Confirm Password</label>
				<?php echo form_password('confpassword','' ,'class="form-control"'); ?>	
			</div>
			<p class="lead">Alredy have account! <?php echo anchor('/user/login', 'Login.');?></p>

			<?php echo form_submit('submit','Submit' ,'class="btn btn-success btn-block"'); ?>	
		<?php  echo form_close(); ?>
		</div>
	</div>
</section>

<?php require_once "layout/footer.php"?>
