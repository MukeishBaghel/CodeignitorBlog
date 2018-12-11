<?php require_once('layout/header.php');?>
<script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
<section id="add_article">
	<div class="container  mt-3">
		<h3 class="text-center">Add Your Article</h3>
		
		<?php echo form_open('users/blog/updateArticleProcess', 'class="p-3"'); ?>
			<?php if(validation_errors()): ?>
				<div class="alert alert-dismissible alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong><?php echo validation_errors(); ?></strong>
				</div>
			<?php endif; ?>
			<?php if( $error = $this->session->flashdata('msg')): ?>
				<div class="alert alert-dismissible alert-warning">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong><?php echo $error; ?></strong>
				</div>
			<?php endif; ?>
			<div class="form-group">
				<label for="title">Title</label>
				<?php 
				 if(isset($article)){
					$data = array(
						'name'=>'title',
						'type'=>'text',
						'class'=>'form-control',
						'id' => 'title',
						'value' => $article->title
					);
				 }else{
					$data = array(
						'name'=>'title',
						'type'=>'text',
						'class'=>'form-control',
						'id' => 'title'
					);
				 }
				?>
				<?php echo form_input($data); ?>	
			</div>
			<div class="form-group">
				<label for="category">Select Category</label>
				<select class="form-control" id="category" name="category">

					<?php foreach($categories as $category): ?>
						<option value="<?php echo $category->id; ?>"
							<?php
							if(isset($article)){
								if($category->id == $article->category_id){
									echo 'selected';
								}
							}
							?>
							>
							<?php echo $category->name; ?>
						</option>
					<?php endforeach;?>
				</select>
			</div>
			<div class="form-group">
				<label for="body">Body</label>
				<textarea name="body" id="body" cols="30" rows="10" class="form-control"><?php
				if(isset($article)){
					echo $article->body;
				}
				?></textarea>
			</div>
			<input type="hidden" name="article_id" value="<?php echo $article->id;?>" >
			<?php echo form_submit('submit','Publish' ,'class="btn btn-success"'); ?>
			<button type="submit" class="btn btn-info" name="draft" id="draft" >Draft</button>
			<button type="reset" class="btn btn-warning">Clear</button>
		<?php  echo form_close(); ?>
			
		
</section>
<script>
CKEDITOR.replace( 'body' );
// CKEDITOR.replace( 'body', {
// 	toolbarGroups: [
// 		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
// 		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
// 		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
// 		{ name: 'forms', groups: [ 'forms' ] },
// 		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
// 		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
// 		'/',
// 		{ name: 'links', groups: [ 'links' ] },
// 		{ name: 'insert', groups: [ 'insert' ] },
// 		{ name: 'styles', groups: [ 'styles' ] },
// 		{ name: 'colors', groups: [ 'colors' ] },
// 		{ name: 'tools', groups: [ 'tools' ] },
// 		{ name: 'others', groups: [ 'others' ] },
// 		{ name: 'about', groups: [ 'about' ] }
// });
</script>
<?php require_once('layout/footer.php');?>
