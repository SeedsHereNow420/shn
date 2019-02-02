$(document).ready(function() {
    $('form.st_news_letter_form').submit(function(){
        var $form = $(this);
        if(!/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/.test($(this).find('.st_news_letter_input').val()))
        {
           $form.parent().find('.alert-danger').html(wrongemailaddress_stnewsletter).removeClass('hidden');
           return false;
        }
        
        $.ajax(
    	{
    		type: 'POST',
    		url: $form.attr('action'),
    		data: $form.serialize(),
    		dataType: 'json',
    		cache: false,
    		success: function(result)
    		{
                $form.parent().find('.alert-danger').addClass('hidden');
                $form.parent().find('.alert-success').addClass('hidden');
  		        if (result.hasError)
                    $form.parent().find('.alert-danger').html(result.hasError).removeClass('hidden');
                else
                {
                    $form.parent().find('.alert-success').html(result.message).removeClass('hidden');
                    if ($.isFunction(window.regested_popup))
                        regested_popup();
                }  
            }
        });
        return false;
    });
});