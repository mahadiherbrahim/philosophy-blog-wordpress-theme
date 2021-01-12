<?php
require_once get_theme_file_path( '/inc/tgm.php' ); 
require_once get_theme_file_path( '/lib/attachements.php' ); 
if ( ! isset( $content_width ) ) $content_width = 960;
if ( site_url() == "http://localhost/lwhh" ) {
    define( "VERSION", time() );
} else {
    define( "VERSION", wp_get_theme()->get( "Version" ) );
}

function philosophy_theme_setup(){
	load_theme_textdomain( "philosophy" );
	add_theme_support( "post-thumbnails" );
	add_theme_support( "title-tag" );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( "post-formats",array('image','video','quote','link','audio','gallery'));
	add_theme_support( 'html5',array('comment-list','search-form'));
	add_theme_support( 'custom-background');
	add_theme_support( 'custom-logo');
	add_editor_style( '/assets/css/editor-style.css' );
	register_nav_menu( "topmenu", __( "Top Menu", "philosophy" ));
	register_nav_menus( array(
		'footer-left' => __('Footer Left','philosophy'),
		'footer-middle' => __('Footer Middle','philosophy'),
		'footer-right' => __('Footer Right','philosophy'),
	) );
	add_image_size( 'philosophy_home_square',400,400, true );
}
add_action( "after_setup_theme", "philosophy_theme_setup");


function philosophy_assets(){
	wp_enqueue_style( 'fontawesome-css', get_theme_file_uri( '/assets/css/font-awesome/css/font-awesome.css' ),null,"1.0");
	wp_enqueue_style( 'fonts-css', get_theme_file_uri( '/assets/css/fonts.css' ),null,"1.0");
	wp_enqueue_style( 'base-css', get_theme_file_uri( '/assets/css/base.css' ),null,"1.0");
	wp_enqueue_style( 'vendor-css', get_theme_file_uri( '/assets/css/vendor.css' ),null,"1.0");
	wp_enqueue_style( 'main-css', get_theme_file_uri( '/assets/css/main.css' ),null,"1.0");
	wp_enqueue_style( 'philosophy-css',get_stylesheet_uri(),null,VERSION);


	wp_enqueue_script( 'modernizr-js', get_theme_file_uri('/assets/js/modernizr.js'),null,"1.0");
	wp_enqueue_script( 'pace-js', get_theme_file_uri('/assets/js/pace.min.js'),null,'1.0');
	wp_enqueue_script( 'plugins-js', get_theme_file_uri('/assets/js/plugins.js'),array('jquery'),'1.0',true);
	if ( is_singular() ) wp_enqueue_script( "comment-reply" );
	wp_enqueue_script( 'main-js', get_theme_file_uri('/assets/js/main.js'),array('jquery'),'1.0',true);
}
add_action( 'wp_enqueue_scripts', 'philosophy_assets' );


function philosophy_pagination(){
	global $wp_query;
	$links =  paginate_links( array(
			'current' => max(1,get_query_var('paged')),
			'total' => $wp_query -> max_num_pages,
			'type' => 'list',
		) );
	$links = str_replace('page-numbers', 'pgn__num', $links);
	$links = str_replace("<ul class='pgn__num'>", '<ul>', $links);
	$links = str_replace("<ul class='pgn__num'>", '<ul>', $links);
	$links = str_replace("next pgn__num", 'pgn__next', $links);
	$links = str_replace("prev pgn__num", 'pgn__prev', $links);
	echo wp_kses_post($links);
}

remove_action( 'term_description', 'wpautop' );

function philosophy_register_about_widgets(){
	register_sidebar(
		array(
			'name'          => __( 'About Us', 'philosophy' ),
			'id'            => 'about-us',
			'description'   => 'About Us page widgets',
			'before_widget' => '<div id="%1$s" class="col-block %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="quarter-top-margin">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Contact Page Maps', 'philosophy' ),
			'id'            => 'contact-maps',
			'description'   => 'Contact Page Maps  widgets',
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => '',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Contact Information', 'philosophy' ),
			'id'            => 'contact-info',
			'description'   => 'Contact Us Information page widgets',
			'before_widget' => '<div id="%1$s" class="col-block %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="quarter-top-margin">',
			'after_title'   => '</h3>',
		)
	);


	register_sidebar(
		array(
			'name'          => __( 'Before Footer About Section', 'philosophy' ),
			'id'            => 'before-footer',
			'description'   => 'Before footer about section widgets',
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer Bottom Right', 'philosophy' ),
			'id'            => 'footer-bottom-right',
			'description'   => 'Footer Bottom Right section widgets',
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer Bottom', 'philosophy' ),
			'id'            => 'footer-bottom',
			'description'   => 'Footer Bottom Copy text section widgets',
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => '',
		)
	);


	register_sidebar(
		array(
			'name'          => __( 'Header Social Links', 'philosophy' ),
			'id'            => 'header-social',
			'description'   => 'Header Scoial Links Section section widgets',
			'before_widget' => '<div id="%1$s" class="%2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => '',
		)
	);


	

}
add_action( 'widgets_init', 'philosophy_register_about_widgets' );


function philosophy_search_format($form){
	$home_dir = home_url('/');
	$label = __('Search for:','philosophy');
	$button_label = __('Search','philosophy');

	$newform = <<<FORM
<form role="search" method="get" class="header__search-form" action="{$home_dir}">
		 <label>
    	<span class="hide-content">{$label}</span>
    	<input type="search" class="search-field" placeholder="Type Keywords" value="" name="s" title="{$label}" autocomplete="off">
	</label>
	<input type="submit" class="search-submit" value="{$button_label}">
</form>     
FORM;
 return $newform;
}

add_filter( 'get_search_form', 'philosophy_search_format' );
