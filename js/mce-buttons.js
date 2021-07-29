jQuery(document).ready(function($){ 
	(function printToEditorMce() {
    	tinymce.PluginManager.add('wolfie_mce_button', function(editor, url) {

        editor.addButton('wolfie_mce_button_b', {
            text: 'B',
			title : 'тег <b>',
            icon: false,
            classes: 'b-button',
			onclick: function() {
                tinymce.activeEditor.formatter.register('mycustomformat', {
                   inline : 'b',
				   styles: { fontWeight: 'bold' }
               });                  
                tinymce.activeEditor.formatter.apply('mycustomformat');
            }
        });        
        editor.addButton('wolfie_mce_button_strong', {
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
		editor.addButton('wolfie_mce_button_mark', {
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
       /* editor.addButton('wolfie_letter_space_decrement', {
            text: 'decrement letter spacing',
            icon: false,
            onclick: function() {
                var currentFontSize = new Number($(tinyMCE.activeEditor.selection.getNode())
                    .css('letter-spacing').replace('px',''));
                currentFontSize =  currentFontSize - 1;
                tinymce.activeEditor.formatter.register('mycustomformat', {
                   inline : 'span',
                   styles : {'letter-spacing' : currentFontSize + 'px'}
               });                  
                tinymce.activeEditor.formatter.apply('mycustomformat');
            	}
        	});*/
    	});
						  
	})();
});