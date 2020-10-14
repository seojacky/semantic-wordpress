<?php
/*
 * Plugin name: Semantic WordPress
 * Description: Плагин для добавления семантической вёрстки в записи и страницы. Поддерживает добавление и визщуализацию тегов: article, section, div ....
 * Version: 1.0
 * Author: @big_jacky 
 * Author URI: https://t.me/big_jacky
 * Plugin URI: https://github.com/seojacky/semantic-wordpress
 * GitHub Plugin URI: https://github.com/seojacky/semantic-wordpress
*/

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	return;
}

//add_action( 'wp_enqueue_scripts', 'youtube_embed_shortcode_scripts_and_style' );
add_action( 'wp_enqueue_style', 'youtube_embed_shortcode_scripts_and_style' );
function youtube_embed_shortcode_scripts_and_style() {
 //регистрируем скрипт, но пока не подключаем  
	//wp_register_script( 'script-sw', trailingslashit(plugin_dir_url( __FILE__ ))."js/script.js", array(), '1.0.0', true );
	
	
	//подключение своих css-стилей в редакторе
	wp_register_style( 'sw-editor-style', trailingslashit(plugin_dir_url( __FILE__ ))."css/sw-custom-editor-style.css" );  
}

function delfi_tinymce_fix( $init )
 
{ 
 // добавление html элементов, которые не будут стираться при переключении редактора
 
 $init['extended_valid_elements'] = 'div[*],article[*],section[*],noindex[*],ul[class|id]'; 
 
 return $init;
 
} 
add_filter('tiny_mce_before_init', 'delfi_tinymce_fix');

//Кнопка в редактор
add_action( 'admin_print_footer_scripts', 'add_semantic_quicktags' ); 
function add_semantic_quicktags() { 
//Проверка, определен ли в wordpress скрипт quicktags 
if (wp_script_is('quicktags')) : 
?> 
<script> 
if (QTags) { 
QTags.addButton('swpp_article_button', 'article', '<article>', '</article>', '', 'article', 1);
QTags.addButton('swpp_section_button', 'section', '<section>', '</section>', '', 'section', 1);  
} 
</script> 
<?php endif; 
}

/*
//подключение своих css-стилей в редакторе start
function wph_my_editor_style($wp) {
    return $wp .= ',' . get_bloginfo('stylesheet_directory') . '/myeditor.css';
}
add_filter('mce_css', 'wph_my_editor_style');
//подключение своих css-стилей в редакторе end
*/


/*function sw_my_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'init', 'sw_my_theme_add_editor_styles' );
*/

//Добавление кнопок форматирования в визуальный редактор
function sw_info_buttons($buttons) {
	array_unshift($buttons, 'styleselect');
	return $buttons;
}
add_filter('mce_buttons_3', 'sw_info_buttons');
 
function sw_my_mce_before_init_insert_formats( $init_array ) {
	$style_formats = array(
		array(
			'title' => 'B',
			'block' => 'b',
			//'classes' => 'bold-button',			
			//'wrapper' => true,
		),
		array(
			'title' => 'Strong',
			'block' => 'strong',
			//'classes' => 'strong-button',
			'wrapper' => false,
		),
	  array(  
			'title' => 'Red Button',  
			'block' => 'span',  
			'classes' => 'red-button',
			'wrapper' => true,
		),

	);
	$init_array['style_formats'] = json_encode( $style_formats );
	return $init_array;
}
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'sw_my_mce_before_init_insert_formats' ); 



