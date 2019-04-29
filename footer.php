<span class="sr-only">Início do menu principal</span>

<nav class="menu-principal" role="navigation"> 
	<div id="menu-topo" class="container clearfix">
   <!-- <a href="<?php echo get_home_url(); ?>">Página Inicial</a>	 -->
   <?php  //wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
   <?php  wp_nav_menu( array(
		  'theme_location' => 'header-menu',
		  'container'      => '',
		  'container_id' => 'menu-topo',
		  'menu_class'     => 'nav-main',
		  'walker' => new CSS_Menu_Walker()
        ) ); ?>
    <?php //if (function_exists(clean_custom_menus())) clean_custom_menus(); ?>
	<?php //wp_nav_menu(array('menu' => 'header-menu', 'container_id' => 'menu-topo', 'walker' => new CSS_Menu_Walker())); ?>
   <!-- <a href="javascript:void(0);" class="icon" onclick="Responsivo()"></a> -->
   </div>   
</nav> 

<span class="sr-only">Fim do menu principal</span>



<nav class="sr-only">
	<a href="#menu-topo">Ir para o menu principal</a>
	<a href="#conteudo">Ir para o início do conteúdo</a>
</nav>



<footer id="rodape" role="contentinfo">

	<address class="container">
		
        <p><b>ADEVA</b> • ENDEREÇO: Rua São Samuel, 174, Vila Mariana - CEP 04120-030, São Paulo/SP (Próximo à estação Santa Cruz do metrô) <br> TELEFONES: (11) 5084-6693 / 5084-6695 - Fax: (11) 5084-6298 • E-mail: <a href="mailto:adeva@adeva.org.br">adeva@adeva.org.br</a></p>
    
	</address>
	<div class="note_footer">
		<p>Template criado por <a href="http://liviagabos.com">Livia Gabos</a> e por Ana Domingues</p>
	</div>

</footer>	

	
	 
	 <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/jquery.min.js"></script>
	 <noscript><!--Não tem script--></noscript>
	 <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/bootstrap.min.js"></script>
	 <noscript><!--Não tem script--></noscript>
	 <!-- <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/bootstrap-acessibility.js"></script> -->
	 <noscript><!--Não tem script--></noscript>
	 
	 <?php wp_footer(); ?>

	 <script src="<?php echo get_template_directory_uri(); ?>/js/plugins.js"></script>
	 <noscript><!--Não tem script--></noscript>
	 <script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
	 <noscript><!--Não tem script--></noscript>


	
</body>
</html>