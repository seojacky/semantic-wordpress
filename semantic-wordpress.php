<?php
/*
 * Plugin name: WP Booster: Semantic WordPress
 * Description: Плагин для добавления семантической вёрстки в записи и страницы. Поддерживает добавление и визуализацию тегов: article, section, div .... Чтобы поддержать плагин Вы можете <a href="https://forms.gle/NQmNV3KkfjX879Hz7">Проголосовать</a> за него. По поводу разработки - пишите в личку тг автору.
 * Version: 1.8
 * Author: @big_jacky 
 * Author URI: https://t.me/big_jacky  
 * GitHub Plugin URI: https://github.com/seojacky/semantic-wordpress
 * Plugin URI: https://github.com/seojacky/semantic-wordpress
*/

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	return;
}

/*
****************************************************************
	Plugin settings links
****************************************************************
*/
add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'swpp_plugin_page_settings_link');
function swpp_plugin_page_settings_link( $links ) {
	$links[] = '<a href="https://t.me/big_jacky">' . __('Author') . '</a>';
	$links[] = '<a href="https://forms.gle/NQmNV3KkfjX879Hz7">Проголосовать за плагин</a>';
	return $links;
}

//подключение своих css-стилей в визуальном редакторе
add_filter('mce_css', 'swpp_mcekit_editor_style');
function swpp_mcekit_editor_style($url) { 
    if ( !empty($url) )
        $url .= ','; 
    // Retrieves the plugin directory URL and adds editor stylesheet
    // Change the path here if using different directories
    $url .= trailingslashit( plugin_dir_url(__FILE__) ) . 'css/sw-custom-editor-style.css';
 
    return $url;
}

//swpp_custom_admin styles
add_action('admin_head', function () {
  echo '<style>  
.mce-b-button span.mce-txt, .mce-strong-button span.mce-txt, .mce-mark-button span.mce-txt {
    font-weight: bold;
    font-size: 18px;
    font-family: "dashicons";
    line-height: 0.8;
}
.mce-b-button, .mce-strong-button, .mce-mark-button {
    background: #e9e9e9 !important;
}
  </style>';
});

function swpp_delfi_tinymce_fix( $init )
 
{ 
 // добавление html элементов, которые не будут стираться при переключении редактора 
 $init['extended_valid_elements'] = 'div[*],article[*],section[*],noindex[*],ul[class|id]'; 
 
 return $init;
 
} 
add_filter('tiny_mce_before_init', 'swpp_delfi_tinymce_fix');

//Кнопка в редактор
add_action('admin_head', 'swpp_add_semantic_quicktags'); 
function swpp_add_semantic_quicktags() {
    // Проверяем, что мы на странице с редактором
    $screen = get_current_screen();
    if (!$screen || !in_array($screen->base, array('post', 'page', 'edit'))) {
        return;
    }
    ?> 
    <script>
    (function() {
        // Флаг, чтобы отслеживать, были ли уже добавлены кнопки
        var buttonsAdded = false;
        
        // Функция для добавления кнопок
        function addButtons() {
            if (buttonsAdded) return; // Предотвращаем повторное добавление
            
            QTags.addButton('swpp_article_button', 'article', '<article>', '</article>', '', 'article', 1);
            QTags.addButton('swpp_section_button', 'section', '<section>', '</section>', '', 'section', 1);
            
            buttonsAdded = true;
        }
        
        // Пробуем добавить кнопки немедленно
        if (typeof QTags !== 'undefined' && typeof QTags.addButton === 'function') {
            addButtons();
        } else {
            // Используем более безопасный подход с интервалом
            var checkInterval = setInterval(function() {
                if (typeof QTags !== 'undefined' && typeof QTags.addButton === 'function') {
                    addButtons();
                    clearInterval(checkInterval);
                }
            }, 500);
            
            // Устанавливаем тайм-аут для остановки интервала после 10 секунд
            setTimeout(function() {
                clearInterval(checkInterval);
            }, 10000);
        }
    })();
    </script> 
<?php }

// Добавляем в админку справочный блок
add_action( 'submitpost_box', 'swpp_add_block' );
function swpp_add_block( $post ) {
	?>
	<div id="swpp-block" class="postbox ">
	<div class="inside">	
	<h2 class="hndle ui-sortable-handle"><span>Semantic WordPress</span></h2>
<p><a href="https://docs.google.com/document/d/1h46vZ0nFmei3tmIcm2mJsqX8tgXIfLtEEMIOoeHAfOY/" target="_blank" rel="noopener">Справка по тегам strong, b, em, i</a></p>
	</div>
</div>

	<style>
		.swpp-reference-block {
			margin-bottom: 10px;
			padding: 15px;
			background: #fff
		}
	</style>
	<?php
}



function swpp_add_mce_button() {
	if ( !current_user_can( 'edit_posts' ) &&  !current_user_can( 'edit_pages' ) ) {
   	 return;
	}
	if ( 'true' == get_user_option( 'rich_editing' ) ) {
    	add_filter( 'mce_external_plugins', 'swpp_add_tinymce_plugin' );
	}

	add_filter( 'mce_buttons', 'swpp_register_mce_button' );
	function swpp_register_mce_button( $buttons ) {
    	array_push( $buttons, 'swpp_mce_button_b', 'swpp_mce_button_strong', 'swpp_mce_button_mark'); // Add to this array your another button	    	
    	return $buttons;
	}

	function swpp_add_tinymce_plugin( $plugin_array ) {
	    	$plugin_array['swpp_mce_button'] = $dir = plugins_url( 'js/mce-buttons.js', __FILE__ );
    	return $plugin_array;
	}
}
add_action('admin_head', 'swpp_add_mce_button');
