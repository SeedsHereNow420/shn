jQuery(function($) {
  let st_dropzone_files =[];
  let promises = [];
  let abortPreviousRequests = function() {
    var promise;
    while (promises.length > 0) {
      promise = promises.pop();
      promise.abort();
    }
  };
  
  if ($('input.star').length)
    $('input.star').rating();

  if ($('.tm-input').length) {
            $('.tm-input').tagsManager({
            prefilled: st_product_comment_tag_prefilled.split(','),
            hiddenTagListName: 'st_prodcut_comment_tags',
        });
        $('.tm-tag .tm-tag-remove').remove();
        $(".tm-input").on('tm:pushed', function(e, tag, tagid) {
            $('span.tm-tag:last').addClass('tm-checked').on('click', function(){
                if ($(this).hasClass('tm-checked')) {
                    $(this).removeClass('tm-checked');
                } else {
                    $(this).addClass('tm-checked');
                }
            });
        });
        $('.tm-tag').click(function(){
            if ($(this).hasClass('tm-checked')) {
                $(this).removeClass('tm-checked');
            } else {
                $(this).addClass('tm-checked');
            }
        });
    }
    if ($('#comment_content').length) {
        $('#comment_content').textareaCount({
            maxCharacterSize: st_pc_max,  
			originalStyle: 'originalTextareaInfo',
			displayFormat: st_pc_display_format
        });
    }
    if ($('#st_product_comment_uploader').length) {
        $('#st_product_comment_uploader').dropzone({
            url: stproductcomments_controller_url+'&action=upload_image',
            maxFiles: typeof(st_pc_max_images)!=='undefined' ? parseInt(st_pc_max_images) : 6,
            acceptedFiles: "image/*",
            dictRemoveFile: dictRemoveFile,
            addRemoveLinks: true,
            parallelUploads: 2,
            thumbnailHeight: 120,
            thumbnailWidth: 120,
            maxFilesize: 3,
            filesizeBase: 1000,
            init: function() {
                this.on('maxfilesexceeded', function(file){
                    this.removeFile(file);
                }),
                this.on('error', function(file){
                    this.removeFile(file);
                }),
                this.on('removedfile', function(file){
                  st_dropzone_files.splice($.inArray(file.st_name,st_dropzone_files),1);
                  $('input[name="image"]').val(st_dropzone_files.join(','));
                }),
                this.on('success', function(file, json){
                    json = $.parseJSON(json);
                    if (!json.error) {
                        file.st_name = json.image;
                        st_dropzone_files.push(json.image);
                        $('input[name="image"]').val(st_dropzone_files.join(','));
                    } else {
                        showMessage(json.error); 
                    }
                })
            }
        });
    }
    
    $('form[name=st_product_comment_form]').submit(function(e) {
        var is_success = false;
		// Form element

        // Tags
        $('input[name="st_prodcut_comment_tags"]').val('');
        var tags = [];
        $('.tm-tag.tm-checked').each(function(){
            if($(this).find('span').html()) {
                tags.push($(this).find('span').html());
            }
        });
        $('input[name="st_prodcut_comment_tags"]').val(tags.join(','));
        
		/*$.ajax({
			url: stproductcomments_controller_url+'&action=add_comment',
			type: 'POST',
			headers: { "cache-control": "no-cache" },
            dataType: 'json',
            data: $(this).serialize(),
            cache: false,
			success: function(json){
				if (json.r)
				{
            //sub_btn.removeClass('disabled');//do not remove to stop posting again
				    is_success = true;

                    $.magnificPopup.open({
                      removalDelay: 500,
                      callbacks: {
                        beforeOpen: function() {
                           this.st.mainClass = 'mfp-zoom-in';
                        },
                        close: function() {
                            if(is_success)
                                window.location = stproductcomments_url;
                        }
                      },
                      items: {
                          src: '<div class="inline_popup_content small_popup mfp-with-anim text-center">'+json.thank+json.moderation+'</div>',
                          type: 'inline'
                      }
                    });
				}
				else
				{
          sub_btn.removeClass('disabled');
          CommnetShowMessage(json.m);
				}
			}
		});*/
		return true;
	});
    $('form[name=st_product_comment_reply_form]').submit(function(e) {
        e.preventDefault();
        var _this = $(this);
        if(!$(this).find('textarea').val())
          return false;
        var is_success = false;
		// Form element
        var sub_btn = $('.st_product_comment_reply_submit', _this);
        
		$.ajax({
			url: stproductcomments_controller_url+'&action=add_reply',
			type: 'POST',
			headers: { "cache-control": "no-cache" },
            dataType: 'json',
            data: _this.serialize(),
            cache: false,
			success: function(json){
				if (json.r)
				{
                //sub_btn.removeClass('disabled');//do not remove to stop posting again
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
                          src: '<div class="inline_popup_content small_popup mfp-with-anim text-center">'+json.thank+json.moderation+'</div>',
                          type: 'inline'
                      }
                    });
        }
        else
        {
          sub_btn.removeClass('disabled');
                    CommnetShowMessage(json.m);
        }
      }
    });
    return false;
  });

  $('body').on(
      'click',
      '.usefulness_btn',
      function(event){
        event.preventDefault();

        let that = $(this);
        var id_st_product_comment = that.data('id-st-product-comment');
        var is_usefull = that.data('is-usefull');

        $.ajax({
          url: stproductcomments_controller_url + '&rand=' + new Date().getTime(),
          data: {
            id_st_product_comment: id_st_product_comment,
            action: 'comment_is_usefull',
            value: is_usefull
          },
          type: 'POST',
          headers: { "cache-control": "no-cache" }
        }).then(function (resp) {
          that.removeClass('active');
          if(parseInt(resp)>0)
            that.find('span').html(resp)
          else if((parseInt(resp)==-1))
            CommnetGoLogin();
        }).fail(function(resp) {
          that.removeClass('active');
        });

        return false;
      });

  $('body').on(
      'click',
      '.report_btn',
      function(event){
        event.preventDefault();

        let that = $(this);
        if (confirm(confirm_report_message))
        {
            var idProductComment = $(this).data('id-st-product-comment');

          $.ajax({
            url: stproductcomments_controller_url + '&rand=' + new Date().getTime(),
            data: {
              id_st_product_comment: idProductComment,
              action: 'report_abuse'
            },
            type: 'POST',
            headers: { "cache-control": "no-cache" }
          }).then(function (resp) {
                that.removeClass('active');
                if(parseInt(resp)>0)
                    $('#pcomment-'+idProductComment+' .report_btn').remove();
                else if((parseInt(resp)==-1))
                  CommnetGoLogin();
            }).fail(function(resp) {
                that.removeClass('active');
            });;
        }
        return false;
      });

	


  prestashop.on('updatePComments', function(param) {
      abortPreviousRequests();
        $.ajax({
          url: param.url,
          method: 'POST',
          dataType: 'json',
          beforeSend: function (jqXHR) {
            promises.push(jqXHR);
          }
        }).then(function (resp) {
          if(typeof(resp.pcomments_list)!=='undefined' && resp.pcomments_list)
            $('#js_pcomments_list').replaceWith(resp.pcomments_list);
          if(typeof(resp.pcomments_filter)!=='undefined' && resp.pcomments_filter)
            $('#js_pcomments_filter').replaceWith(resp.pcomments_filter);

            prestashop.emit('updatedPComments');
        }).fail(function(resp) {
          
        });
  });
        

  $('body').on(
      'click',
      '.pc-search-link',
      function(event){
        event.preventDefault();
        
        prestashop.emit('updatePComments',{url: $(this).attr('href')});
        return false;
      });

  let dom_pc_list = $('#js_pcomments_list');
  if(dom_pc_list.data('url'))
    prestashop.emit('updatePComments',{url: dom_pc_list.data('url')});



  let move_to = function(id) {
      $('#pcomment-'+id+' > .pcomment-for-reply').after($('#product_comment_reply_box').get(0));
      $('#product_comment_parent_id').val(id);
  };

  $('body').on(
      'click',
      '.btn_product_comment_reply',
      function(event){
        event.preventDefault();
        let id=$(this).data('id');
        if(id)
            move_to(id);
        return false;
    });
  $('body').on(
      'click',
      '.view_all_reviews',
      function(event){
        event.preventDefault();
        let tab = $('.pcomments_block');
        if(!tab.length)
          tab = $('.product_info_tabs .nav-link[data-module="stproductcomments"]');
        if(tab.length)
        {
          tab.tab('show');
          $('body,html').animate({
            scrollTop: tab.offset().top
          });
        }
        return false;
      });
});
function CommnetGoLogin()
{
    $.magnificPopup.open({
      removalDelay: 500,
      callbacks: {
        beforeOpen: function() {
           this.st.mainClass = 'mfp-zoom-in';
        }
      },
      items: {
          src: '#popup_go_login',
          type: 'inline'
      }
    });
}
function CommnetShowMessage(message)
{
    $.magnificPopup.open({
      removalDelay: 500,
      callbacks: {
        beforeOpen: function() {
           this.st.mainClass = 'mfp-zoom-in';
        }
      },
      items: {
          src: '<div class="inline_popup_content small_popup mfp-with-anim text-center">'+message+'</div>',
          type: 'inline'
      }
    });
}