<?php




remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );


// Default Wordpress WYSIWYG
function filter_ptags_on_images_iframes($content)
{
	$content = preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
	return preg_replace('/<p>\s*(<iframe .*>*.<\/iframe>)\s*<\/p>/iU', '\1', $content);
}
add_filter('the_content', 'filter_ptags_on_images_iframes');

// ACF WYSIWYG Plugin
function filter_ptags_on_images_iframes_acf($content)
{
	$content = preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
	return preg_replace('/<p>\s*(<iframe .*>*.<\/iframe>)\s*<\/p>/iU', '\1', $content);
}
add_filter('acf_the_content', 'filter_ptags_on_images_iframes_acf');


add_filter('wpcf7_autop_or_not', '__return_false');
remove_filter('the_content', 'wpautop');


function cc_mime_types( $mimes ){

	$mimes['svg'] = 'image/svg+xml';

	return $mimes;

}


add_filter( 'upload_mimes', 'cc_mime_types' );

add_filter('show_admin_bar', '__return_false');



add_theme_support( 'post-thumbnails' );

add_image_size( 'topo-portfolio', 1000, 375, true);
add_image_size( 'miniatura-portfolio', 390, 242, true);

/******************************************************* */
/** Pàginas de postagens da nossa história */

add_action('init', 'type_post_historia');
 
function type_post_historia() { 
	$labels = array(
		'name' => _x('História da Adeva', 'post type general name'),
		'singular_name' => _x('Todas as Linhas do tempo', 'post type singular name'),
		'add_new' => _x('Adicionar Nova Linha do tempo', 'Novo item'),
		'add_new_item' => __('Nova Linha do tempo'),
		'edit_item' => __('Editar Linha do tempo'),
		'new_item' => __('Nova Linha do tempo'),
		'view_item' => __('Ver Linha do tempo'),
		'search_items' => __('Procurar Linha do tempo'),
		'not_found' =>  __('Nenhum registro encontrado'),
		'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
		'parent_item_colon' => '',
		'menu_name' => 'História'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'public_queryable' => true,
		'show_ui' => true,
		'show_in_menu'=> true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'menu_icon' => 'dashicons-admin-comments',     
		'supports' => array('title','editor','thumbnail', 'excerpt', 'trackbacks')
		);

	register_post_type( 'historia' , $args );
	flush_rewrite_rules();
}

/********************************************************************** */
/** Meta BOX da página de Historia da ADEVA */


/*function historia_meta_box_add(){
	add_meta_box ( 'box-historia-order', 'Ordem de apresentação', 'historia_meta_box_order', 'historia', 'side', 'high' );

}

add_action( 'add_meta_boxes', 'historia_meta_box_add' );

function historia_meta_box_order(){
	$values = get_post_custom( $post->ID );
	global $post;
	$details = get_post_meta( $post->ID, '_namespace', true );

	$text = isset( $values['texto_meta_box'] ) ? esc_attr( $values['texto_meta_box'][0] ) : '';
	
	?>
	<fieldset>
		<div>
			<label for="texto_meta_box">Ordem na linha do tempo</label>
			<input type="text" name="texto_meta_box" id="texto_meta_box" value="<?php echo $text; ?>" />
		</div>
	</fieldset>
	<?php
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
}

add_action( 'save_post', 'historia_meta_box_save',1,2 );

function historia_meta_box_save( $post_id )
{
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
	
	if( !current_user_can( 'edit_post' ) ) return;
	
	$allowed = array(
	'a' => array(
	'href' => array()
	)
	);
	
	if( isset( $_POST['texto_meta_box'] ) )
	update_post_meta( $post_id, 'texto_meta_box', wp_kses( $_POST['texto_meta_box'], $allowed ) );
	
}*/


/******************************************************* */
/** Pàginas de postagens de Balanços Anuais da ADEVA */

add_action('init', 'type_post_balancos_fin');
 
function type_post_balancos_fin() { 
	$labels = array(
		'name' => _x('Balanços financeiros', 'post type general name'),
		'singular_name' => _x('Todas os balanços', 'post type singular name'),
		'add_new' => _x('Adicionar Novo Balanço Financeiro', 'Novo item'),
		'add_new_item' => __('Novo Balanço Financeiro'),
		'edit_item' => __('Editar Balanço Financeiro'),
		'new_item' => __('Novo Balanço Financeiro'),
		'view_item' => __('Ver Balanço Financeiro'),
		'search_items' => __('Procurar Balanço Financeiro'),
		'not_found' =>  __('Nenhum registro encontrado'),
		'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
		'parent_item_colon' => '',
		'menu_name' => 'Balanço Financeiro'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'public_queryable' => true,
		'show_ui' => true,
		'show_in_menu'=> true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'menu_icon' => 'dashicons-analytics',     
		'supports' => array('title','editor','thumbnail', 'excerpt')
		);

	register_post_type( 'balanco-anual' , $args );
	flush_rewrite_rules();
}



/******************************************************* */
/** Pàginas de postagens de notícias da ADEVA */



add_action('init', 'type_post_noticias');
 
function type_post_noticias() { 
	$labels = array(
		'name' => _x('Notícias da ADEVA', 'post type general name'),
		'singular_name' => _x('Todas as Notícia', 'post type singular name'),
		'add_new' => _x('Adicionar Nova Notícia', 'Novo item'),
		'add_new_item' => __('Nova Notícia'),
		'edit_item' => __('Editar Notícia'),
		'new_item' => __('Nova Notícia'),
		'view_item' => __('Ver Notícia'),
		'search_items' => __('Procurar Notícias'),
		'not_found' =>  __('Nenhum registro encontrado'),
		'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
		'parent_item_colon' => '',
		'menu_name' => 'Notícias'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'public_queryable' => true,
		'show_ui' => true,           
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
'register_meta_box_cb' => 'noticias_meta_box',       
		'supports' => array('author','title','editor','thumbnail', 'excerpt', 'custom-fields', 'revisions', 'trackbacks')
		);

	register_post_type( 'noticias' , $args );
	flush_rewrite_rules();
}

function my_taxonomies_noticias() {
	$labels = array(
		'name'              => _x( 'Categorias de Notícias', 'taxonomy general name' ),
		'singular_name'     => _x( 'Notícia Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Busca de Categorias de Notícias' ),
		'all_items'         => __( 'Todas Categorias de Notícias' ),
		'parent_item'       => __( 'Categoria Pai de Notícia' ),
		'parent_item_colon' => __( 'Categoria Pai de Notícia:' ),
		'edit_item'         => __( 'Editar Categoria de Notícia' ), 
		'update_item'       => __( 'Atualizar Categoria de Notícia' ),
		'add_new_item'      => __( 'Adicionar Nova Categoria de Notícia' ),
		'new_item_name'     => __( 'Nova Categoria de Notícia' ),
		'menu_name'         => __( 'Categorias de Notícias' ),
	  );
	$args = array(
		'labels' => $labels,
		"singular_label" => "Categoria", 
		"rewrite" => true,
		'hierarchical' => true,
	  );
	register_taxonomy("categorias_noticias", "noticias", $args);
	
}

add_action( 'init', 'my_taxonomies_noticias', 0 );

/*
function noticias_meta_box(){        
	add_meta_box('noticia_box', __('Noticia'), 'noticia_box_content', 'noticias', 'side', 'high');
}

function noticia_box_content( $post ) {
	wp_nonce_field( plugin_basename( __FILE__ ), 'noticia_box_content_nonce' );
	echo '<label for="product_price"></label>';
	echo '<input type="text" id="product_price" name="product_price" placeholder="enter a price" />';
  }

add_action('save_post', 'save_noticias_post');
    
function save_noticias_post(){
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
  return;

  if ( !wp_verify_nonce( $_POST['product_price_box_content_nonce'], plugin_basename( __FILE__ ) ) )
  return;

  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
    return;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
    return;
  }
  $product_price = $_POST['product_price'];
  update_post_meta( $post_id, 'product_price', $product_price );
}
*/
function my_updated_messages( $messages ) {
	global $post, $post_ID;
	$messages['noticias'] = array(
	  0 => ’, 
	  1 => sprintf( __('Notícia atualizada. <a href="%s">Veja a notícia</a>'), esc_url( get_permalink($post_ID) ) ),
	  6 => sprintf( __('Notícia publicada. <a href="%s">Veja a notícia</a>'), esc_url( get_permalink($post_ID) ) ),
	  7 => __('Notícia salva.'),
	  8 => sprintf( __('Notícia submetida. <a target="_blank" href="%s">Veja a notícia</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	  9 => sprintf( __('Notícia agendada para: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Veja a notícia</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
	  10 => sprintf( __('Rascunho da Notícia atualizado. <a target="_blank" href="%s">Veja a notícia</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	);
	return $messages;
  }
add_filter( 'post_updated_messages', 'my_updated_messages' );



/******************************************************* */
/** Pàginas de postagens de serviços da ADEVA */

add_action('init', 'type_post_servicos');
 
function type_post_servicos() { 
	$labels = array(
		'name' => _x('Serviços da ADEVA', 'post type general name'),
		'singular_name' => _x('Todos os Serviços', 'post type singular name'),
		'add_new' => _x('Adicionar Serviço', 'Novo item'),
		'add_new_item' => __('Novo Serviço'),
		'edit_item' => __('Editar Serviço'),
		'new_item' => __('Novo Serviço'),
		'view_item' => __('Ver Serviço'),
		'search_items' => __('Procurar Serviços'),
		'not_found' =>  __('Nenhum registro encontrado'),
		'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
		'parent_item_colon' => '',
		'menu_name' => 'Serviços'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'public_queryable' => true,
		'show_ui' => true,           
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'menu_icon' => 'dashicons-id-alt',
// 'register_meta_box_cb' => 'servicos_meta_box',       
		'supports' => array('title','editor','thumbnail', 'excerpt')
		);

	register_post_type( 'servicos' , $args );
	flush_rewrite_rules();
}

function my_taxonomies_servicos() {
	$labels = array(
		'name'              => _x( 'Categorias de Serviços', 'taxonomy general name' ),
		'singular_name'     => _x( 'Categoria de Serviços', 'taxonomy singular name' ),
		'search_items'      => __( 'Busca de Categorias de Serviços' ),
		'all_items'         => __( 'Todas Categorias de Serviços' ),
		'parent_item'       => __( 'Categoria Pai de Serviço' ),
		'parent_item_colon' => __( 'Categoria Pai de Serviço:' ),
		'edit_item'         => __( 'Editar Categoria de Serviço' ), 
		'update_item'       => __( 'Atualizar Categoria de Serviço' ),
		'add_new_item'      => __( 'Adicionar Nova Categoria de Serviços' ),
		'new_item_name'     => __( 'Nova Categoria de Serviços' ),
		'menu_name'         => __( 'Categorias de Serviços' ),
	  );
	$args = array(
		'labels' => $labels,
		"singular_label" => "Categoria", 
		"rewrite" => true,
		'hierarchical' => true,
	  );
	register_taxonomy("categorias_servicos", "servicos", $args);
	
}

add_action( 'init', 'my_taxonomies_servicos', 0 );



/******************************************************* */
/** Pàginas de Parceiros da ADEVA */

// add_action('init', 'type_post_parceiros');
 
// function type_post_parceiros() { 
// 	$labels = array(
// 		'name' => _x('Parceiros', 'post type general name'),
// 		'singular_name' => _x('Todos os parceiros', 'post type singular name'),
// 		'add_new' => _x('Adicionar Novo Parceiro', 'Novo item'),
// 		'add_new_item' => __('Novo Parceiro'),
// 		'edit_item' => __('Editar Parceiro'),
// 		'new_item' => __('Novo Parceiro'),
// 		'view_item' => __('Ver Parceiro'),
// 		'search_items' => __('Procurar Parceiro'),
// 		'not_found' =>  __('Nenhum registro encontrado'),
// 		'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
// 		'parent_item_colon' => '',
// 		'menu_name' => 'Parceiros'
// 	);

// 	$args = array(
// 		'labels' => $labels,
// 		'public' => true,
// 		'public_queryable' => true,
// 		'show_ui' => true,
// 		'show_in_menu'=> true,
// 		'query_var' => true,
// 		'rewrite' => true,
// 		'capability_type' => 'post',
// 		'has_archive' => true,
// 		'hierarchical' => false,
// 		'menu_position' => null,
// 		'menu_icon' => 'dashicons-groups',     
// 		'supports' => array('title','editor','thumbnail', 'excerpt')
// 		);

// 	register_post_type( 'parceiros' , $args );
// 	flush_rewrite_rules();
// }



/********************************** */


// add_action( 'init', 'register_my_menu' );

function register_my_menus() {
	register_nav_menus(
	  array(
		'header-menu' => __( 'Menu Principal' ),
		'social-menu' => __( 'Menu de Redes Sociais' )
	  )
	);
  }
add_action( 'init', 'register_my_menus' );

add_post_type_support( 'page', 'excerpt' );

/*********************************************************** */

// register_nav_menus( array(
//     'main' => __( 'Main Menu', 'mytheme' ),
//   ) );
// function clean_custom_menus() {
// 	$menu_name = 'header-menu'; // specify custom menu slug
// 	if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
// 		$menu = wp_get_nav_menu_object($locations[$menu_name]);
// 		$menu_items = wp_get_nav_menu_items($menu->term_id);

// 		//$menu_list = '<nav>' ."\n"; //id="menu" class="menu-principal" role="navigation"
// 		$menu_list = '<nav id="menu" class="menu-principal" role="navigation">' ."\n";
// 		$menu_list .= "\t\t\t\t". '<ul>' ."\n";
// 		foreach ((array) $menu_items as $key => $menu_item) {
// 			$title = $menu_item->title;
// 			$url = $menu_item->url;
// 			$menu_list .= "\t\t\t\t\t". '<li><a href="'. $url .'">'. $title .'</a></li>' ."\n";
// 		}
// 		$menu_list .= "\t\t\t\t". '</ul>' ."\n";
// 		$menu_list .= "\t\t\t". '</nav>' ."\n";
// 	} else {
// 		// $menu_list = '<!-- no list defined -->';
// 	}
// 	echo $menu_list;
// }


 class CSS_Menu_Walker extends Walker {

 	var $db_fields = array('parent' => 'menu_item_parent', 'id' => 'db_id');
	
 	function start_lvl(&$output, $depth = 0, $args = array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class='sub-menu' role='menu'>\n";
	}
	
	function end_lvl(&$output, $depth = 0, $args = array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
	}
	
 	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
	
 		global $wp_query;
 		$indent = ($depth) ? str_repeat("\t", $depth) : '';
 		$class_names = $value = '';
 		$classes = empty($item->classes) ? array() : (array) $item->classes;
		
		/* Add active class */
		$current = '';
		if (in_array('current-menu-item', $classes)) {
			$classes[] = 'active';
			unset($classes['current-menu-item']);
			$current = "aria-current='page'";
		}
		
		/* Check for children */
		$children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));
		if (!empty($children)) {
			$classes[] = 'has-sub';
		}
		
		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
		$class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
		
		$id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
		$id = $id ? ' id="' . esc_attr($id) . '"' : '';
		
		$output .= $indent . '<li' . $id . $value . $class_names .' role="menuitem">';
		
		
 		$attributes  = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
 		$attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target    ) .'"' : '';
 		$attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn       ) .'"' : '';
 		$attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url       ) .'"' : '';
		
		 $item_output = $args->before;
		if (!empty($children)) {
			$item_output .= '<a'. $attributes .' aria-haspopup="true"';
		}else{
			$item_output .= '<a'. $attributes ;
		}
		if (strlen($current) >0 ){
			$item_output .= $current ;
		}
		$item_output .= '>';
 		$item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
 		$item_output .= '</a>';
 		$item_output .= $args->after;
		
 		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
 	}
	
	function end_el(&$output, $item, $depth = 0, $args = array()) {
		$output .= "</li>\n";
	}
 }

 /******************** */


?>