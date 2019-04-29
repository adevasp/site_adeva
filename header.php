<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-BR" xml:lang="pt-BR">
<head>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<?php

//if single post then add excerpt as meta description
if (is_single()) {
setup_postdata($post);  ?>
<meta name="Description" content="<?php  echo strip_tags( get_the_excerpt() ); ?>" />
<meta property="og:description" content="<?php echo strip_tags( get_the_excerpt() ); ?>" />
<meta name="author" content="<?php echo strip_tags( get_the_author() ); ?>" >
<?php
//if homepage use standard meta description
} else if(is_home() || is_page() || is_category())  {
?>
<meta name="Description" content="">

<?php } ?>

<meta name="keywords" content="" >


<title><?php if(is_home()) { echo bloginfo("name"); echo " | "; echo bloginfo("description"); } else { echo wp_title(" | ", false, right); echo bloginfo("name"); } ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no">

<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/normalize.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/componentes.css">

<link rel="stylesheet" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,900" rel="stylesheet"> 

<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/modernizr-2.6.2.min.js"></script>
<noscript><!--Não tem script--></noscript>

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); wp_head(); ?>


<?php wp_head(); ?> 

</head>




<body>


<!-- FRAME PARA VERSÕES ANTIGAS DO INTERNET EXPLORER -->
<!--[if lt IE 9]>
    <div id="msg-atualizacao">
        <div class="wrapper" style="">
            <h1>OPS!</h1>
            <p>Para que você tenha uma melhor experiência e segurança em sua navegação, <br>aconselhamos que atualize seu navegador.</p>      
            <hr/>
            <h2>Eis alguma sugestões de navegadores mais poulares atualmente:</h2>
            <ul>
                <li><a class="chrome" href="https://www.google.com/chrome/browser/" target="_blank">Google Chrome</a></li>
                <li><a class="ff" href="http://www.mozilla.org/pt-BR/firefox/new" target="_blank">Mozilla Firefox</a></li>
                <li><a class="ie" href="http://windows.microsoft.com/en-us/internet-explorer/download-ie" target="_blank">Internet Explorer</a></li>
                <li class="no-border"><a class="safari" href="http://www.apple.com/safari/" target="_blank">Apple Safari</a></li>
            </ul>
        </div>
    </div>
<![endif]-->
<!-- FIM FRAME PARA VERSÕES ANTIGAS DO INTERNET EXPLORER -->



<header role="banner">
  <div class="container clearfix">
      <nav class="menu-acessibilidade">
        <ul>
            <li><a href="#conteudo" accesskey="1" class="separador">Ir para o conteúdo</a></li>
            <li><a href="#menu-topo" accesskey="2" class="separador">Ir para o menu</a></li>
            <!-- <li><a href="#rodape" accesskey="3">Ir para o rodapé<span>[3]</span></a></li> -->
            <li><span class="margin-rigth-1">Contraste</span><a id="bg_pb" class="dot" aria-role="button" href="#"><span class="sr-only">Fundo Preto com Fonte Branca</span></a>
                            <a id="bg_color" class="dot"  aria-role="button" href="#"><span class="sr-only" >Fundo Azul com Fonte amarela</span></a>
                        </li>
            <li><a id="zoom_in" aria-label="Aumentar fonte" href="#" class="separador-left">A+</a>
                <a id="zoom_out" aria-label="Diminuir fonte" href="#" class="separador">A-</a></li>
            <li><a href="#">Mapa do site</a></li>
          </ul>
      </nav>

    <div class="logo" >
        <a href="<?php echo get_home_url(); ?>" class="text-hide">
            <img src="<?php echo get_template_directory_uri(); ?>/img/logopng.png" alt="Logo da ADEVA - Associação de Deficientes Visuais e Amigos">Página Inicial da ADEVA
        </a>
    </div>

    
  </div>

 </header>   