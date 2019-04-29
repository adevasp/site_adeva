<?php get_header(); ?>

	<main id="conteudo" class="content" role="main">
		<div class="wrapper">
		<section id="main_carousel" class="carousel slide" aria-labelledby="carousel_title" data-ride="carousel">
			<h2 id="carousel_title" class="sr-only">Este banner tem 2 slides.</h2>
			<ol class="carousel-indicators">
				<li id="tab-0-0" class="active" data-target="#main_carousel" data-slide-to="0" >
					<!-- <span class="sr-only">Slide 1 - texto não aparece</span> -->
				</li>
				<li id="tab-0-1" class="" data-target="#main_carousel" data-slide-to="1"   >
					<!-- <span class="sr-only">Slide 1 - texto não aparece</span> -->
				</li>
			</ol>
			<div class="carousel-inner">
				<div id="tabpanel-0-0" class="carousel-item active" aria-labelledby="tab-0-0">
					<a href="http://meusiteacessível.com.br"><img src="<?php echo get_template_directory_uri(); ?>/img/banner/ilustrativa1.jpg" alt=""></a>
					<div class="carousel-caption d-md-block">
						<h4><a href="">Meu site Acessível</a></h4>
						<p>Desenvolvimento ou adaptação de websites acessíveis</p>
					</div>
				</div>
				<div id="tabpanel-0-1" class="carousel-item" role="tabpanel" aria-labelledby="tab-0-1">
					<a href="<?php echo get_permalink( get_page_by_path( 'servicos' ) ) ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/banner/ilustrativa2.jpg" alt=""></a>
					<div class="carousel-caption d-md-block">
						<h4><a href="">Se prepare</a></h4>
						<p>Conheça todos os nossos serviços e trabalhos que realizamos</p>
					</div>
				</div>
			</div>
			<a class="carousel-control-prev" href="#main_carousel" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Slide Anterior</span>
			</a>
			<a class="carousel-control-next" href="#main_carousel" role="button" data-slide="next" >
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Próximo Slide</span>
			</a>

			</div>
		</section>


	<?php while (have_posts()) : the_post(); ?>	
		<div class="wrapper">
			<h1><?php the_title(); ?></h1>

			<?php the_content(); ?>

			
		</div>
	<?php endwhile; ?>	
	</main>
	<aside>
		
	</aside>
	
<?php get_footer(); ?>