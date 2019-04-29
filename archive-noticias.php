<?php get_header(); ?>
	<div class="secao topo-categorias topo bkg-roxo">
		<div class="container">			
			<h1 style="color: #fff">Página com o arquivo</div>
			<?php
                $args = array(
                'post_type' => 'noticias',
                'tax_query' => array(
                    array(
                    'taxonomy' => 'categorias_noticias',
                    'field' => 'slug',
                    'terms' => 'noticias'
                    )
                )
                );
                $noticias = new WP_Query( $args );
                if( $noticias->have_posts() ) {
                while( $noticias->have_posts() ) {
                    $noticias->the_post();
                    ?>
                    <h1><?php the_title() ?></h1>
                    <div class='content'>
                        <?php the_content() ?>
                    </div>
                    <?php
                
                }    else {
                echo 'Parece que não há nada por aqui ainda!';
                }
            ?>
		</div>
	</div>

	
<?php get_footer(); ?>