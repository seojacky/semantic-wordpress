(function(){
	tinymce.create('tinymce.plugins.StrongButton', 
		{
			init : function(ed, url) 
			{		
				
				        ed.addCommand('mceStrongButton',
						function() {
            				var content = tinyMCE.activeEditor.selection.getContent({format : 'text'});
							ed.execCommand('mceInsertContent', 0, '<strong>'+content+'</strong>');
        				});
				
				ed.addButton('strongbutton', {
						title : 'Strong кнопка',
						cmd : 'mceStrongButton',
						//icon: 'bold',
						//icon: false,
						image : '/wp-content/plugins/semantic-wordpress/img/s.png'
					}
				);				
			},			
		});
	tinymce.PluginManager.add('strongButton', tinymce.plugins.StrongButton);
})();
