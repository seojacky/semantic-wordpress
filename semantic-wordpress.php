<?php
/*
 * Plugin name: Semantic WordPress
 * Description: Плагин для добавления семантической вёрстки в записи и страницы. Поддерживает добавление и визщуализацию тегов: article, section, div ....
 * Version: 1.1
 * Author: @big_jacky 
 * Author URI: https://t.me/big_jacky
 * Plugin URI: https://github.com/seojacky/semantic-wordpress
 * GitHub Plugin URI: https://github.com/seojacky/semantic-wordpress
*/

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	return;
}


//подключение своих css-стилей в визуальном редакторе
add_filter('mce_css', 'swpp_mcekit_editor_style');
function swpp_mcekit_editor_style($url) { 
    if ( !empty($url) )
        $url .= ','; 
    // Retrieves the plugin directory URL and adds editor stylesheet
    // Change the path here if using different directories
    $url .= trailingslashit( plugin_dir_url(__FILE__) ) . '/css/sw-custom-editor-style.css';
 
    return $url;
}


function swpp_delfi_tinymce_fix( $init )
 
{ 
 // добавление html элементов, которые не будут стираться при переключении редактора
 
 $init['extended_valid_elements'] = 'div[*],article[*],section[*],noindex[*],ul[class|id]'; 
 
 return $init;
 
} 
add_filter('tiny_mce_before_init', 'swpp_delfi_tinymce_fix');

//Кнопка в редактор
add_action( 'admin_print_footer_scripts', 'swpp_add_semantic_quicktags' ); 
function swpp_add_semantic_quicktags() { 
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


//ТУТ ПЫТАЛСЯ ДОБАВИТЬ КНОПКИ B & STRONG
//Добавление кнопок форматирования в визуальный редактор
function swpp_info_buttons($buttons) {
	array_unshift($buttons, 'styleselect');
	return $buttons;
}
add_filter('mce_buttons_3', 'swpp_info_buttons');
 
function swpp_my_mce_before_init_insert_formats( $init_array ) {
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
add_filter( 'tiny_mce_before_init', 'swpp_my_mce_before_init_insert_formats' ); 
