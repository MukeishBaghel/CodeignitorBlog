<section class="article-col">
	<div class="container mt-3">
		<div class="row">
		<!-- <?php echo '<pre>';
		var_dump($articles);
		?> -->
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
			<!-- <div class="col-md-4">
			<div class="article border p-2 mb-3">
			<span class="category">Politics</span>
				<img src="https://source.unsplash.com/400x300/?nature,water" alt="" style="width:100%;">
				<h1 class="">The Old and  the Restless</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate natus impedit nesciunt unde.</p>
				<h6> <small>by</small> Alan Walker</h6>	
				<p>May 23,2018</p>
				</div>
			</div>

			<div class="col-md-4">
			<div class="article border p-2 mb-3">
			<span class="category">Politics</span>
				<img src="https://source.unsplash.com/400x300/?nature,water" alt="" style="width:100%;">
				<h1 class="">The Old and  the Restless</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate natus impedit nesciunt unde.</p>
				<h6> <small>by</small> Alan Walker</h6>	
				<p>May 23,2018</p>
				</div>
			</div> -->
			
			<!-- second row -->
			<!-- <div class="col-md-4">
				<div class="article">
				<span class="category">Politics</span>
				<a href="#"><img src="https://source.unsplash.com/400x300/?nature,water" alt="" style="width:100%;">
				<h1 class="">The Old and  the Restless</h1></a>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate natus impedit nesciunt unde.</p>
				<h6> <small>by</small> Alan Walker</h6>	
				<p>May 23,2018</p>
				</div>
			</div>
			<div class="col-md-4">
			<div class="article">
			<span class="category">Politics</span>
				<img src="https://source.unsplash.com/400x300/?nature,water" alt="" style="width:100%;">
				<h1 class="">The Old and  the Restless</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate natus impedit nesciunt unde.</p>
				<h6> <small>by</small> Alan Walker</h6>	
				<p>May 23,2018</p>
				</div>
			</div>
			<div class="col-md-4">
			<div class="article">
				<span class="category">Politics</span>
				<img src="https://source.unsplash.com/400x300/?nature,water" alt="" style="width:100%;">
				<h1 class="">The Old and  the Restless</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate natus impedit nesciunt unde.</p>
				<h6> <small>by</small> Alan Walker</h6>	
				<p>May 23,2018</p>
				</div>
			</div> -->
		</div>
	</div>
</section>
<hr>
<section id="most-view">
	<div class="container">
		<h3 class="text-center">Most Viewed Articles.</h3>
		<div class="row mb-3">
			<?php foreach($articles as $article):?>
				<div class="col-md-4 mb-3">
					<ul class="list-group">
						<li class="list-group-item">
							<a href="<?php echo site_url('blog/article/'.$article->blog_id)?>"><h4><?=$article->blog_title?></h4></a>
							<h6> <small>by</small> <span class="text-capitalize"><?=$article->author?></span></h6>	
							<p><a href="<?php echo site_url('blog/category/'.$article->category)?>"><?=$article->category?></a> <sup>.</sup> <?php
						$time = strtotime($article->blog_created_at);
								$newformat = date('M d, Y',$time);
								echo $newformat;
					?></p>
						</li>
					</ul>
				</div>
			<?php endforeach;?>

			<!-- <div class="col-4">
				<ul class="list-group">
					<li class="list-group-item">
						<h4>The Old and  the Restless</h4>
						<h6> <small>by</small> Alan Walker</h6>	
						<p>Politics <sup>.</sup> May 23,2018</p>
					</li>
				</ul>
			</div>
			<div class="col-4">
				<ul class="list-group">
					<li class="list-group-item">
						<h4>The Old and  the Restless</h4>
						<h6> <small>by</small> Alan Walker</h6>	
						<p>Politics <sup>.</sup> May 23,2018</p>
					</li>
				</ul>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-4">
				<ul class="list-group">
					<li class="list-group-item">
						<h4>The Old and  the Restless</h4>
						<h6> <small>by</small> Alan Walker</h6>	
						<p>May 23,2018</p>
					</li>
				</ul>
			</div>
			<div class="col-4">
			<ul class="list-group">
					<li class="list-group-item">
						<h4>The Old and  the Restless</h4>
						<h6> <small>by</small> Alan Walker</h6>	
						<p>May 23,2018</p>
					</li>
				</ul>
			</div>
			<div class="col-4">
			<ul class="list-group">
					<li class="list-group-item">
						<h4>The Old and  the Restless</h4>
						<h6> <small>by</small> Alan Walker</h6>	
						<p>May 23,2018</p>
					</li>
				</ul>
			</div>
		</div>

	<div class="row mb-3">
			<div class="col-4">
				<ul class="list-group">
					<li class="list-group-item">
						<h4>The Old and  the Restless</h4>
						<h6> <small>by</small> Alan Walker</h6>	
						<p>May 23,2018</p>
					</li>
				</ul>
			</div>
			<div class="col-4">
			<ul class="list-group">
					<li class="list-group-item">
						<h4>The Old and  the Restless</h4>
						<h6> <small>by</small> Alan Walker</h6>
						<p>May 23,2018</p>
					</li>
				</ul>
			</div>
			<div class="col-4">
			<ul class="list-group">
					<li class="list-group-item">
						<h4>The Old and  the Restless</h4>
						<h6> <small>by</small> Alan Walker</h6>	
						<p>Politics <sup>.</sup> May 23,2018</p>
					</li>
				</ul>
			</div>
		</div>

	</div> -->


</section>
<hr>
<section id="category_wise_article">
	<div class="container mt-3">
		<h3 class="text-center">Categories</h3>
		<div class="row">
			<div class="col-md-4">
				<div class="border p-3 mt-2">
					<h4 class="text-center">Tech</h4>
						<ul class="list-group">
							<li class="list-group-item">
								<h4>The Old and  the Restless</h4>
								<h6> <small>by</small> Alan Walker</h6>	
								<p>Politics <sup>.</sup> May 23,2018</p>
							</li>
							<li class="list-group-item">
								<h4>The Old and  the Restless</h4>
								<h6> <small>by</small> Alan Walker</h6>	
								<p>Politics <sup>.</sup> May 23,2018</p>
							</li>
								<li class="list-group-item">
								<h4>The Old and  the Restless</h4>
								<h6> <small>by</small> Alan Walker</h6>	
								<p>Politics <sup>.</sup> May 23,2018</p>
							</li>
						</ul>
						<a href="#" class="float-right">More >>></a>
						<div class="clearfix"></div>
				</div>
			</div>
			<div class="col-md-4">
			<div class="border p-3 mt-2">
					<h4 class="text-center">Art</h4>
						<ul class="list-group">
							<li class="list-group-item">
								<h4>The Old and  the Restless</h4>
								<h6> <small>by</small> Alan Walker</h6>	
								<p>Politics <sup>.</sup> May 23,2018</p>
							</li>
							<li class="list-group-item">
								<h4>The Old and  the Restless</h4>
								<h6> <small>by</small> Alan Walker</h6>	
								<p>Politics <sup>.</sup> May 23,2018</p>
							</li>
								<li class="list-group-item">
								<h4>The Old and  the Restless</h4>
								<h6> <small>by</small> Alan Walker</h6>	
								<p>Politics <sup>.</sup> May 23,2018</p>
							</li>
						</ul>
						<a href="#" class="float-right">More >>></a>
						<div class="clearfix"></div>
				</div>
			</div>
			
			<div class="col-md-4">
			<div class="border p-3 mt-2">
					<h4 class="text-center">Health</h4>
						<ul class="list-group">
							<li class="list-group-item">
								<h4>The Old and  the Restless</h4>
								<h6> <small>by</small> Alan Walker</h6>	
								<p>Politics <sup>.</sup> May 23,2018</p>
							</li>
							<li class="list-group-item">
								<h4>The Old and  the Restless</h4>
								<h6> <small>by</small> Alan Walker</h6>	
								<p>Politics <sup>.</sup> May 23,2018</p>
							</li>
								<li class="list-group-item">
								<h4>The Old and  the Restless</h4>
								<h6> <small>by</small> Alan Walker</h6>	
								<p>Politics <sup>.</sup> May 23,2018</p>
							</li>
						</ul>
						<a href="#" class="float-right">More >>></a>
						<div class="clearfix"></div>
				</div>
			</div>
		</div>

		<div class="row mt-3">
			<div class="col-md-4">
				<div class="border p-3 mt-2">
					<h4 class="text-center">Politics</h4>
						<ul class="list-group">
							<li class="list-group-item">
								<h4>The Old and  the Restless</h4>
								<h6> <small>by</small> Alan Walker</h6>	
								<p>Politics <sup>.</sup> May 23,2018</p>
							</li>
							<li class="list-group-item">
								<h4>The Old and  the Restless</h4>
								<h6> <small>by</small> Alan Walker</h6>	
								<p>Politics <sup>.</sup> May 23,2018</p>
							</li>
								<li class="list-group-item">
								<h4>The Old and  the Restless</h4>
								<h6> <small>by</small> Alan Walker</h6>	
								<p>Politics <sup>.</sup> May 23,2018</p>
							</li>
						</ul>
						<a href="#" class="float-right">More >>></a>
						<div class="clearfix"></div>
				</div>
			</div>
			<div class="col-md-4">
			<div class="border p-3 mt-2">
					<h4 class="text-center">Food & Travel</h4>
						<ul class="list-group">
							<li class="list-group-item">
								<h4>The Old and  the Restless</h4>
								<h6> <small>by</small> Alan Walker</h6>	
								<p>Politics <sup>.</sup> May 23,2018</p>
							</li>
							<li class="list-group-item">
								<h4>The Old and  the Restless</h4>
								<h6> <small>by</small> Alan Walker</h6>	
								<p>Politics <sup>.</sup> May 23,2018</p>
							</li>
								<li class="list-group-item">
								<h4>The Old and  the Restless</h4>
								<h6> <small>by</small> Alan Walker</h6>	
								<p>Politics <sup>.</sup> May 23,2018</p>
							</li>
						</ul>
						<a href="#" class="float-right">More >>></a>
						<div class="clearfix"></div>
				</div>
			</div>
			
			<div class="col-md-4">
			<div class="border p-3 mt-2">
					<h4 class="text-center">Music</h4>
						<ul class="list-group">
							<li class="list-group-item">
								<h4>The Old and  the Restless</h4>
								<h6> <small>by</small> Alan Walker</h6>	
								<p>Politics <sup>.</sup> May 23,2018</p>
							</li>
							<li class="list-group-item">
								<h4>The Old and  the Restless</h4>
								<h6> <small>by</small> Alan Walker</h6>	
								<p>Politics <sup>.</sup> May 23,2018</p>
							</li>
								<li class="list-group-item">
								<h4>The Old and  the Restless</h4>
								<h6> <small>by</small> Alan Walker</h6>	
								<p>Politics <sup>.</sup> May 23,2018</p>
							</li>
						</ul>
						<a href="#" class="float-right">More >>></a>
						<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php  require_once("layout/footer.php"); ?>
