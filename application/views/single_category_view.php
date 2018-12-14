<section class="article-col">
	<div class="container mt-3">
		<div class="row">
			<?php foreach($articles as $article):?>
				<div class="col-md-4">
					<div class="article border p-2 mb-3">
					<a href="<?php echo site_url('blog/category/'.$article->category)?>"><span class="category btn btn-secondary"><?=$article->category?></span></a>
					<!-- <img src="https://source.unsplash.com/400x300/?nature,water" alt="" style="width:100%;"> -->
					
					<div class="article-body">
						<a href="<?php echo site_url('blog/article/'.$article->blog_id)?>">
							<img src="https://images.unsplash.com/photo-1444703686981-a3abbc4d4fe3?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80" style="width:100%">
						</a>
					</div>
						<a href="<?php echo site_url('blog/article/'.$article->blog_id)?>">
							<h3 class=""><?=$article->blog_title?></h3>
						</a>
					<h6> <small>by</small> <span class="text-capitalize"><?=$article->author?></span></h6>	
					<p class="float-left"><?php
						$time = strtotime($article->blog_created_at);
								$newformat = date('M d, Y',$time);
								echo $newformat;
					?></p>
					<div class="clearfix"></div>
					</div>
				</div>
			<?php endforeach;?>
		</div>
	</div>
</section>
<?php  require_once("layout/footer.php"); ?>
