<?php get_header(); ?>
	<main id="conteudo" class="content" role="main">
    	<div class="wrapper">
            <h1><?php the_title(); ?></h1>
            
            <?php
				$args = array(
                  'post_type' => 'balanco-anual'
				//   'paged' => $paged
				);

				$the_query = new WP_Query( $args ); 
				    
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
			

				if ( $the_query->have_posts() ): ?>	
			
					<div class="upper">
												
						<?php while ( $the_query->have_posts() ): $the_query->the_post(); ?>	
							<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
						<?php endwhile; ?>

					</div>

					<?php while ( $the_query->have_posts() ): $the_query->the_post(); ?>	
						<div class="historia">						
							<h2><?php the_title(); ?></h2>
						
								<?php the_content(); ?>							
						</div>
					
					<?php endwhile; ?>
							
					

				<?php endif; ?>


		</div>

		
	</main>
<?php get_footer(); ?>