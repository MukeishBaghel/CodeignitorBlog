<?php require_once "layout/header.php"?>
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
			<p class="lead">Did Not Registered yet! <?php echo anchor('/user/register', 'Register.');?></p>
			<?php echo form_submit('submit','Submit' ,'class="btn btn-success btn-block"'); ?>	
		<?php  echo form_close(); ?>
		</div>
	</div>
</section>
<?php require_once "layout/footer.php"?>
