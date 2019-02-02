jQuery(function($) {
	$('form[name=st_blog_comment_form]').submit(function(e) {
        e.preventDefault();
        var is_success = false;
		// Form element
        var sub_btn = $('#st_blog_comment_submit');
        if(sub_btn.hasClass('disabled'))
            return false;
        else
            sub_btn.addClass('disabled');
        
		$.ajax({
			url: $('form[name=st_blog_comment_form]').attr('action'),
			type: 'POST',
			headers: { "cache-control": "no-cache" },
            dataType: 'json',
            data: $('form[name=st_blog_comment_form]').serialize(),
            cache: false,
			success: function(json){
                //sub_btn.removeClass('disabled');//do not remove to stop posting again
				if (json.r)
				{
				    is_success = true;

                    $.magnificPopup.open({
                      removalDelay: 500,
                      callbacks: {
                        beforeOpen: function() {
                           this.st.mainClass = 'mfp-zoom-in';
                        },
                        close: function() {
                            if(is_success)
                                window.location.reload(true);
                        }
                      },
                      items: {
                          src: '<div class="inline_popup_content small_popup mfp-with-anim text-center">'+json.thank + (stblogcomments_moderate ? '<br/>' + json.moderation : '')+'</div>',
                          type: 'inline'
                      }
                    });
				}
				else
				{
                    $.magnificPopup.open({
                      removalDelay: 500,
                      callbacks: {
                        beforeOpen: function() {
                           this.st.mainClass = 'mfp-zoom-in';
                        }
                      },
                      items: {
                          src: '<div class="inline_popup_content small_popup mfp-with-anim text-center">'+json.m+'</div>',
                          type: 'inline'
                      }
                    });

				}
			}
		});
		return false;
	});
    $('.comment_reply_link').click(function(){
        var id_st_blog_comment = $(this).attr('data-id-st-blog-comment');
        if(id_st_blog_comment)
            stblogcomments.move_to(id_st_blog_comment);
    });
    $('#cancel_comment_reply_link').click(function(){
        stblogcomments.move_back();
    });
});
var stblogcomments = {
    'move_to' : function(id_st_blog_comment)
    {
        $('#comment-'+id_st_blog_comment+' > .comment_node').after($('#st_blog_comment_reply_block').get(0));
        $('#blog_comment_parent_id').val(id_st_blog_comment);
        $('#cancel_comment_reply_link').show();
    },
    'move_back' : function()
    {
        $('#comments').after($('#st_blog_comment_reply_block').get(0));
        $('#cancel_comment_reply_link').hide();
        $('#blog_comment_parent_id').val(0);
    }
};