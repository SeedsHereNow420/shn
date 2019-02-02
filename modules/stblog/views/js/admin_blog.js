jQuery(function($){
    $('.st_blog_cover_image').die().live('click', function(e)
		{
			e.preventDefault();
            var self = $(this);
			var id = self.attr('data-id');
            var token = self.attr('data-token');
			doAdminAjax({
					"action":"deleteCoverImage",
					"id_st_blog" : id,
					"token" : token,
					"tab" : "AdminStBlog",
					"ajax" : 1 }, function(data){
					   json = $.parseJSON(data);
					   if(json.r)
                            self.closest('.form-group').remove();
                        else
                            showErrorMessage(json.m);
					}
			);
		});
    $('#btn_regenerate_thumbs').die().live('click', function(e)
    {
        e.preventDefault();
        if (typeof(c_msg)!= 'undefined')
            c_msg = 'Are you sure ?';
        if (!confirm(c_msg))
            return false;
            
        var $_this = $(this);
        
        $('#progress-warning').show();
        $_this.attr('disabled', true);
        doAdminAjax({
				"action":"regenerateThumbails",
				"token" : token,
				"tab" : "AdminStBlogConfig",
				"ajax" : 1 }, function(data){
				   json = $.parseJSON(data);
				   if(json.r)
                   {
                        $('#progress-warning').hide();
                        $('#ajax-message-ok').show();
                        if (json.m)
                            $('#ajax-message-ko').find('.message').html(json.m.replace('\n','<br>')).addBack().show();
                   }
                   else
                   {
                        $('#progress-warning').hide();
                        $('#ajax-message-ko').find('.message').html(json.m.replace('\n','<br>')).addBack().show();
                   }
                   $_this.attr('disabled', false);
				}
		);
    });
});