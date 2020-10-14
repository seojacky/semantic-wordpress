

function delfi_tinymce_fix( $init )
 
{ 
 // добавление html элементов, которые не будут стираться
 
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


function sw_my_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'init', 'sw_my_theme_add_editor_styles' );


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



