<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.2';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<section id="article">
	<div class="container mt-4">

		<div class="row">
			<div class="col-md-9">
					
					<?php if($this->session->userdata('userid') == $article->blog_user_id):?>
						<div class="float-right">
							<a href="#" class="btn btn-info">Update</a>
							<a href="#" class="btn btn-danger">Delete</a>
						</div>
					<?php endif;?>
				<!-- <h1 class="text-center">Writing for Designers</h1> -->
					<h1 class="text-center"><?php echo $article->blog_title; ?></h1>
					<!-- <?php 
					echo '<pre>';
					print_r($article); ?> -->
					<h6 class="text-center" > <small>by</small> <a href="#" class="text-capitalize"><?php echo $article->user_fullname?> </a><sup>.</sup>  <?php
								$time = strtotime($article->blog_created_at);
								$newformat = date('d M Y',$time);
								echo $newformat;
								?> </h6>
					<h6 class="text-center"><a href="<?php echo site_url('blog/category/'.$article->category) ?>"><?php echo $article->category?></a></h6>
					<!-- <p class="h4 text-justify">Shit. The writing. We forgot about the writing. The thing, the design thing…it needs words! Oh man, so many words. I thought somebody…wasn’t the client going to…shit. We’ve got to get the writing done. We’ve got to get the writing done! How are we going to get the writing done?!</p> -->
					<div>
						<?php echo $article->blog_body;?>
					</div>

					<div class="fb-comments mt-3" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="100%" data-numposts="5"
					data-colorscheme="light"></div>
			</div>

			<div class="div-col-3">
				<ul class="list-group mt-3 pl-3">
					<h4 class="text-center">More from the Writer</h4>
					<li class="list-group-item"><a href="/">bla bla bla</a></li>
					<li class="list-group-item"><a href="/">bla bla bla</a></li>
					<li class="list-group-item"><a href="/">bla bla bla</a></li>
				</ul>

				<ul class="list-group mt-3 pl-3">
					<h4 class="text-center">Relate Posts</h4>
					<li class="list-group-item"><a href="/">bla bla bla</a></li>
					<li class="list-group-item"><a href="/">bla bla bla</a></li>
					<li class="list-group-item"><a href="/">bla bla bla</a></li>
				</ul>
			</div>
		</div>
	</div>
</section>
<?php require_once "layout/footer.php"?>
