<?php require_once "layout/adminHeader.php"?>
<div class="container mt-3">
<?php if( $error = $this->session->flashdata('msg')): ?>
	<div class="alert alert-dismissible alert-info">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong><?php echo $error; ?></strong>
	</div>
<?php endif; ?>
<h1 class="text-center">Welcome to Dashboard</h1>

	<div class="row">
		<div class="col-md-9">
		<h5>My Articles</h5>
			<ul class="list-group">
				<?php foreach($articles as $article):?>
					
					<li class="list-group-item">
					<a href="<?php echo site_url('blog/article/'.$article->id);?>">
					<?=$article->title?>
					<?php if($article->status == 'draft'): ?>
						<span class="badge badge-light float-right"><?=$article->status?></span>
					<?php else: ?>
						<span class="badge badge-success float-right"><?=$article->status?></span>
					<?php endif;?>
				<br>
				<small>Date <?php
					$time = strtotime($article->created_at);
					$newformat = date('d M Y ,  g : i A ',$time);
					echo $newformat;
					?></small>
					</a>
					<a class="btn btn-danger btn-sm float-right"
					href="<?php echo site_url('users/blog/deleteArticle/').$article->id;?>" >Delete</a>
					<a class="btn btn-info btn-sm float-right mr-1"
					href="<?php echo site_url('users/blog/updateArticle/').$article->id;?>" >Update/Modify</a>
				</li>
				<?php endforeach;?>
			</ul>
		</div>
		<div class="col-md-3">
		<h5>Info</h5>
			<ul class="list-group">
				<li class="list-group-item"><a href="<?php echo site_url('users/blog/published');?>">
					Published  (<?php echo $published;?>)
				</a></li>
				<li class="list-group-item"><a href="<?php echo site_url('users/blog/drafts');?>">
					Draft  (<?php echo $draft; ?>)
				</a></li>
			</ul>
		</div>
	</div>
	
</div>

<?php require_once "layout/footer.php"?>
