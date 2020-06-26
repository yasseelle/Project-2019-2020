<section id="title" class="title-area">
	<div class="title-content">
		<div class="container">
			<div class="title-text">
				<div class="row">
					<div class="col-md-12">
						<?php
                        $breadcrumbs=get_post_meta(get_the_ID(),'vibe_breadcrumbs',true);
                        if(vibe_validate($breadcrumbs) || empty($breadcrumbs))
                            vibe_breadcrumbs(); 
	                    ?>
	                    <div class="pagetitle">
				        	<h1>
					        	<?php
					        	$title=get_post_meta(get_the_ID(),'vibe_title',true);
					        	if(function_exists('bbp_is_forum_archive') && bbp_is_forum_archive()){
					        			_e( 'Forums Directory', 'wplms_modern' );
					        	}elseif(empty($title) && function_exists('is_bbpress') && is_bbpress()  ){
					        		echo the_title();
					        	}elseif(!isset($title) || !$title || !(vibe_validate($title))){

					        	}else{
					        		echo get_the_title(); 
					        	}
					        	?>
				        	</h1>
				        </div>
	                    <?php the_sub_title(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>	
</section>