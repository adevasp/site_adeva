<?php get_header(); ?>
  
  

  <div id="conteudo" class="content" role="main">
  <?php while (have_posts()) : the_post(); ?> 
    
    <div class="wrapper">
      <h1><?php the_title(); ?></h1>
    </div>

    <?php if(has_post_thumbnail()): ?>
        <div class="capa-portfolio">
        <?php the_post_thumbnail('topo-portfolio', array('title' => get_post(get_post_thumbnail_id())->post_title)); ?>
        </div>

    <?php endif; ?>

    <div class="wrapper">
      

      <?php the_content(); ?>

      <a href="<?php echo get_permalink(14); ?>" class="link-portfolio upper">Volte ao portfólio</a>
    </div>
  <?php endwhile; ?>  
  </div>
  
    
  
<?php get_footer(); ?>