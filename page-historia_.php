<?php get_header(); ?>
	<main id="conteudo" class="content" role="main">
        <div class="wrapper">
            <h1><?php the_title(); ?></h1>
            
	<?php while (have_posts()) : the_post(); ?>	
		

			<?php
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array(
				  
                  'posts_per_page' => 100,
                  'post_type' => 'nossa-historia'
				);

				$the_query = new WP_Query( $args ); 

			?>

			<?php if ( $the_query->have_posts() ): ?>	
			<div class="historias clearfix">
				
				<?php while ( $the_query->have_posts() ): $the_query->the_post(); ?>	
					<div class="historia">						

						<h2 class="upper"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
						<?php the_excerpt(); ?>
						
						<!-- <a href="<?php the_permalink() ?>" class="link-folio">Conheça o projeto</a> -->

					</div>
				
				<?php endwhile; ?>
						
				
			</div>
			<?php endif; ?>


		</div>
	<?php endwhile; ?>	
	</div>
<?php get_footer(); ?>