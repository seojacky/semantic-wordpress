(function () {
    tinymce.create('tinymce.plugins.semanticwp', {
        init : function(editor, url) {

            editor.addButton('swpp_mce_button_b', {
                title : 'тег <b>',                
				text: 'B',
				classes: 'b-button',
				onclick: function() {
                tinymce.activeEditor.formatter.register('mycustomformat', {
                   inline : 'b',				   
               });                  
                tinymce.activeEditor.formatter.apply('mycustomformat');
            }                
            });          
			
			editor.addButton('swpp_mce_button_strong', {
            text: 'S',
			title : 'тег <strong>',
            icon: false,
			classes: 'strong-button',
			onclick: function() {
                tinymce.activeEditor.formatter.register('mycustomformat', {
                   inline : 'strong',                   
               });                  
                tinymce.activeEditor.formatter.apply('mycustomformat');
            }
        });
			
			editor.addButton('swpp_mce_button_mark', {
            text: 'M',
			title : 'тег <mark>',
            icon: false,
			classes: 'mark-button',
			onclick: function() {
                tinymce.activeEditor.formatter.register('mycustomformat', {
                   inline : 'mark',                   
               });                  
                tinymce.activeEditor.formatter.apply('mycustomformat');
            }
        });
			
		},        
    });
    // Register plugin
    tinymce.PluginManager.add( 'swpp_mce_button', tinymce.plugins.semanticwp );
})();