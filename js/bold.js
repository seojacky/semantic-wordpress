(function(){
	tinymce.create('tinymce.plugins.BoldButton', 
		{
			init : function(ed, url) 
			{		
				
				        ed.addCommand('mceBoldButton',
						function() {
            				var content = tinyMCE.activeEditor.selection.getContent({format : 'text'});
							ed.execCommand('mceInsertContent', 0, '<b>'+content+'</b>');
        				});
				
				ed.addButton('boldbutton', {
						title : 'Bold кнопка',
						cmd : 'mceBoldButton',
						//icon: 'bold',
						//icon: false,
						image : '/wp-content/plugins/semantic-wordpress/img/bold.png'
					}
				);				
			},			
		});
	tinymce.PluginManager.add('boldButton', tinymce.plugins.BoldButton);
})();
