
$(document).ready(
	function()
	{
		$('#ajax_auto_set_hover_image').click(
			function()
			{
				if (this.cursor == undefined)
					this.cursor = 0;
				
				if (this.legend == undefined)
					this.legend = $(this).html();
					
				if (this.running == undefined)
					this.running = false;
				
				if (this.running == true)
					return false;
		
				$('.ajax-message').hide();
				
				this.running = true;
				
				if (typeof(this.restartAllowed) == 'undefined' || this.restartAllowed)
				{
					$(this).html(this.legend+translations['in_progress']);
					$('#progress-warning').show();
				}
					
				this.restartAllowed = false;
		
				$.ajax(
				{
					url: this.href+'&action=building_hover_all&ajax=1&cursor='+this.cursor,
					context: this,
					dataType: 'json',
					cache: 'false',
					success: function(res)
					{
						this.running = false;
						if (res.result)
						{
							this.cursor = 0;
							$('#progress-warning').hide();
							$(this).html(this.legend);
							$('#ajax-message-ok span').html(translations['hover_image_finished']);
							$('#ajax-message-ok').show();
							return;
						}
                        if (res.cursor)
                        {
                            this.cursor = parseInt(res.cursor);
    						$(this).html(this.legend+translations['in_progress_count'].replace('#', res.count));
    						$(this).click();    
                        }
					},
					error: function(res)
					{
						this.restartAllowed = true;
						$('#progress-warning').hide();
						$('#ajax-message-ko span').html(translations['hover_image_failed']);
						$('#ajax-message-ko').show();
						$(this).html(this.legend);
						
						this.cursor = 0;
						this.running = false;
					}
				});
				return false;
			}
		);
        
        $('#ajax_clean_hover_image').click(
			function()
			{				
				if (this.legend == undefined)
					this.legend = $(this).html();
					
				if (this.running == undefined)
					this.running = false;
				
				if (this.running == true)
					return false;
		
				$('.ajax-message').hide();
				
				this.running = true;
				
				if (typeof(this.restartAllowed) == 'undefined' || this.restartAllowed)
				{
					$(this).html(this.legend+translations['in_progress']);
					$('#progress-warning').show();
				}
					
				this.restartAllowed = false;
		
				$.ajax(
				{
					url: this.href+'&action=clear_hover_all&ajax=1',
					context: this,
					dataType: 'json',
					cache: 'false',
					success: function(res)
					{
						this.running = false;
						$('#progress-warning').hide();
						$(this).html(this.legend);
						$('#ajax-message-ok span').html(translations['hover_image_finished']);
						$('#ajax-message-ok').show();
					},
					error: function(res)
					{
						this.restartAllowed = true;
						$('#progress-warning').hide();
						$('#ajax-message-ko span').html(translations['hover_image_failed']);
						$('#ajax-message-ko').show();
						$(this).html(this.legend);
						
						this.running = false;
					}
				});
				return false;
			}
		);
	}
);