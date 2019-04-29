<?php get_header(); ?>
	<div id="conteudo" class="content" role="main">
	<?php
 		$query = new WP_Query( array('post_type' => 'servicos','posts_per_page' => 5 ) );
 		while ( $query->have_posts() ) : $query->the_post(); ?>	
		<div class="wrapper">
			<h1><?php the_title(); ?></h1>

			<?php the_content(); ?>

			
		</div>
	<?php endwhile; ?>	
	</div>
<?php get_footer(); ?>