<?php

// Регистрируем возможности темы
add_action( 'after_setup_theme', function(){

    add_theme_support( 'post-thumbnails' );

	// возможность изменять изображения в шапке из админки
	// add_theme_support( 'custom-header' );

	// включаем меню в админке
	add_theme_support( 'menus' );

	// создание метатега <title> через хук
	// add_theme_support( 'title-tag' );

	// возможность загрузить картинку логотипа в админке
	add_theme_support( 'custom-logo', [
		'flex-width'  => false,
		'flex-height' => false,
		'header-text' => '',
	] );
});

// Замена классов у пунктов меню
function change_menu_item_css_classes( $classes, $item, $args, $depth ) {
	if ( $args->theme_location === 'header_menu__left' ||  $args->theme_location === 'header_menu__right' ) {
		$classes = [ 'navbar_menu__item' ];
	}else{
        $classes = [''];
    }

	return $classes;
}
// Замена классов у ссылок меню
function add_class_to_all_menu_anchors( $atts,$item,$args,$depth ) {
    if ( $args->theme_location === 'header_menu__left' || $args->theme_location === 'header_menu__right') {
		if( $item->current ){
			$atts['class'] = 'navbar_menu__link navbar_menu__active';
		}else{
			$atts['class'] = 'navbar_menu__link';
		}
	}else{
        $atts['class'] = 'footer_element__link ';
    }
 
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_class_to_all_menu_anchors', 10, 4 );
add_filter( 'nav_menu_css_class', 'change_menu_item_css_classes', 10, 4 );
add_filter( 'nav_menu_item_id', '__return_empty_string' ); // Удаление ID у пунктов меню

// Подключаем css и js
add_action( 'wp_enqueue_scripts', 'theme_add_scripts' );
function theme_add_scripts() {
	wp_enqueue_style( 'style-swiper', get_template_directory_uri().'/swiper/swiper-bundle.min.css', array(),'' );
	wp_enqueue_style( 'style-main', get_template_directory_uri().'/css/main.css', array(),'' );
	
	wp_enqueue_script( 'script-swiper', get_template_directory_uri() .'/swiper/swiper-bundle.min.js', array(), filemtime( get_theme_file_path('/swiper/swiper-bundle.min.js')), true );
	wp_enqueue_script( 'script-main', get_template_directory_uri() .'/js/main.js', array(), filemtime( get_theme_file_path('/js/main.js')), true );
	wp_enqueue_script( 'script-slider', get_template_directory_uri() .'/js/sliders.js', array(), filemtime( get_theme_file_path('/js/sliders.js')), true );
}
 
// Отключим выводи ошибок на странице авторизации
add_filter('login_errors', 'login_obscure_func');
function login_obscure_func(){
	return 'Ошибка: вы ввели неправильный логин или пароль.';
}
## Отключим возможность редактировать файлы в админке для тем, плагинов
define('DISALLOW_FILE_EDIT', true);

# Отключим визуальный редактор у шаблонов 
function hide_editor() {
    $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
    if(!isset($post_id)) return;
 
    $template_file = get_post_meta($post_id, '_wp_page_template', true);
    if($template_file == 'page.php'){ 
        remove_post_type_support('page', 'editor');
    }
}
add_action('admin_init', 'hide_editor');

## Библиотека для создания произвольных полей
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
    require_once get_template_directory() . '/inc/custom-fields/post-meta.php';
    require_once get_template_directory() . '/inc/custom-fields/theme-options.php';
}

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once( 'vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}

## Вывод textarea без тегов P, но с BR
function replace_str_custom_field_without_p($str){
	$str_wp = wpautop($str);
	$str_result = str_replace(array('<p>','</p>'), array('',''), $str_wp);
	return $str_result;
}

######################################################################
function wpcf7_remove_assets() {
	add_filter( 'wpcf7_load_js', '__return_false' );
	// add_filter( 'wpcf7_load_css', '__return_false' );
}

add_action( 'wpcf7_init', 'wpcf7_remove_assets' );

function wpcf7_add_assets( $atts ) {
	wpcf7_enqueue_styles();

	return $atts;
}

// Отключаем дефолтные стили Contact Form 7
function remove_default_stylesheet() {
	wp_deregister_style( 'contact-form-7' );
}
add_action( 'wp_enqueue_scripts', 'remove_default_stylesheet', 20 );

// add_filter( 'shortcode_atts_wpcf7', 'wpcf7_add_assets' );

// Отключить WPCF7_AUTOP
add_action( 'wpcf7_autop_or_not', '__return_false' );

add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    $content = str_replace('<br />', '', $content);
        
    return $content;
});