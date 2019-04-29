<?php get_header(); ?>
	<div id="conteudo" class="content" role="main">
	
	<?php while (have_posts()) : the_post(); ?>	
		<div class="wrapper space-top">
			<h1><?php the_title(); ?></h1> 
			
			
				<?php    
					$current = $post->ID;	  
					$parent = $post->post_parent;	  
					$grandparent_get = get_post($parent);	
					$grandparent = $grandparent_get->post_parent;
					$root_parent_current = get_the_title($current);
					$root_parent = get_the_title($parent);

					if( $root_parent != $root_parent_current){
						echo '<h2>'.get_the_title($parent).'</h2>';
					}
				/* if ($root_parent = get_the_title($grandparent) !== $root_parent = get_the_title($current)) {
						echo '<h2>--'.get_the_title($grandparent).'</h2>'; 
					}else {
						echo '<h2>'.get_the_title($parent).'</h2>'; 
				}*/
				?>
	
			
			<?php the_content(); ?>
			
		</div>
	<?php endwhile; ?>	
	</div>
<?php get_footer(); ?>