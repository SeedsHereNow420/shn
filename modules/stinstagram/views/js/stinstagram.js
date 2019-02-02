/*! ========================================================================== 
 * pongstagr.am v3.0.4 jQuery Plugin | http://pongstr.github.io/pongstagr.am/ 
 * =========================================================================== 
 * Copyright (c) 2014 Pongstr Ordillo. Licensed under MIT License. 
 * =========================================================================== */

+function ($) {

  var Pongstgrm = function (element, options) {
    this.element  = element;
    this.options  = options;

    return this;
  }

  Pongstgrm.defaults = {

    // USER AUTHENTICATION
    // ===========================
      accessId:     null
    , accessToken:  null
    , ins_user_name:  null
    , ins_user_id:  null
    , ins_hash_tag:  null

    // DISPLAY OPTIONS
    // ===========================
    , count:       8
    , likes:       true
    , comments:    true
    , username:   false
    , timestamp:   false
    , time_format:   0
    , caption:   false
    , effects:    0
    , show:       "recent"
    , click_action:      0
    , show_media_type:      1
    , id_st_ins:      ''
    //st    
    , grid:       0
    , image_size:       0
    , ins_items_fw       : 8
    , ins_items_xxl       : 7
    , ins_items_xl       : 6
    , ins_items_lg       : 5
    , ins_items_md       : 4
    , ins_items_sm       : 3
    , ins_items_xs       : 2
    , isfooter      : 0
    , show_counts      : 1
    , ins_follow:       1
    , ins_show_bio:       1
    , ins_show_website:      1
    , ins_self_liked:      0
    , ins_show_avatar:      1

    // HTML OPTIONS
    // ===========================
    , preload:          'spinner'
    , button:           'btn btn-success pull-right'
    , buttontext:       'Load more'
    , column:           'col-12 col-sm-3 col-md-3 col-lg-3'
    , likeicon:         '<i class="fto-heart-empty"></i> '
    , muteicon:         'glyphicon glyphicon-volume-off'
    , videoicon:        '<i class="fto-play-circled2"></i> '
    , imageicon:        '<i class="fto-picture-2"></i> '
    , commenticon:      '<i class="fto-comment-empty"></i> '
    , externalicon:     'icon-external-link '
    , viewlargericon:     '<i class="fto-resize-full"></i> '
    , picture_size:     64
    , profile_bg_img:   null
    , profile_bg_color: '#d9534f'
  };


  /* HTML TEMPLATES */
  Pongstgrm.prototype.template = {
    profile: function (options) {
        var _profile  = '<div class="ins_profile_img">';
            _profile += '     <div class="ins_profile_img_left"><a href="https://instagram.com/'+ options.username +'/" rel="nofollow" target="_blank" title="'+ (options.full_name ? options.username : options.username) +'" class="profile_picture"><img src="'+ options.profile_picture +'" width="'+ options.dflt.picture_size +'"  height="'+ options.dflt.picture_size +'" alt="'+ (options.full_name ? options.username : options.username) +'"></a></div>';
            
            _profile += '     <div class="ins_profile_img_right clearfix">';
            options.dflt.ins_follow ?
            _profile += '     <a href="https://instagram.com/'+ options.username +'/" rel="nofollow" target="_blank" class="ins_follow_btn ins_btn fr" title="'+ (options.full_name ? options.username : options.username) +'">' + ins_follow +'</a>' : '';
            _profile += '     <a href="https://instagram.com/'+ options.username +'/" rel="nofollow" target="_blank" class="ins_profile_name" title="'+ (options.full_name ? options.username : options.username) +'">'+ (options.full_name ? options.full_name : options.username) +'</a>';
            options.dflt.ins_show_bio && options.bio ?
            _profile += '     <div class="ins_bio">'+Pongstgrm.prototype.parseIns(options.bio)+'</div>' : '';
            options.dflt.ins_show_website && options.website ?
            _profile += '     <div class="ins_website"><a href="'+options.website+'" title="'+ options.website +'" rel="nofollow">'+options.website+'</a></div>' : '';
            _profile += '     </div>';
            _profile += ' </div>';

            if(options.dflt.show_counts)
            {
              _profile += ' <div class="ins_profile_counts">';
              _profile += '     <div class="ins_pro_c"><span class="ins_pro_c_v">'+ options.media +'</span><span class="ins_pro_c_k">'+ ins_posts +'</span></div>';
              _profile += '     <div class="ins_pro_c"><span class="ins_pro_c_v">'+ options.followed_by +'</span><span class="ins_pro_c_k">'+ ins_followers +'</span></div>';
              _profile += '     <div class="ins_pro_c"><span class="ins_pro_c_v">'+ options.follows +'</span><span class="ins_pro_c_k">'+ ins_following +'</span></span>';
              _profile += ' </div>';
            }

          $(options.target).append(_profile);

        return;
      }
    , thumb: function (options, iteration) {
        var _thumbnail  = string_likes = string_comments = string_username = string_timestamp = string_caption = image_url = '';

            _thumbnail  += options.dflt.grid ?
              '<li class="ins_image_wrap col-xxl-'+ (''+(12/options.dflt.ins_items_xxl)).replace('.','-') + ' col-xl-' + (''+(12/options.dflt.ins_items_xl)).replace('.','-') + ' col-lg-' + (''+(12/options.dflt.ins_items_lg)).replace('.','-') + ' col-md-' + (''+(12/options.dflt.ins_items_md)).replace('.','-') + ' col-sm-' + (''+(12/options.dflt.ins_items_sm)).replace('.','-') + ' col-' + (''+(12/options.dflt.ins_items_xs)).replace('.','-') + (iteration%options.dflt.ins_items_lg == 1 ? ' first-item-of-line ' : '') + (iteration%options.dflt.ins_items_md == 1 ? ' first-item-of-tablet-line ' : '') + (iteration%options.dflt.ins_items_sm == 1 ? ' first-item-of-mobile-line ' : '') + (iteration%options.dflt.ins_items_xs == 1 ? ' first-item-of-portrait-line ' : '') + (iteration%options.dflt.ins_items_xxl == 1 ? ' first-item-of-large-line ' : '') + (iteration%options.dflt.ins_items_xl == 1 ? ' first-item-of-desktop-line ' : '') + '"><div class="ins_image_wrap_inner">' : '<div class="ins_image_wrap swiper-slide"><div class="ins_image_wrap_inner">';

            _thumbnail  += '<div class="ins_image_box ' + (options.dflt.grid ? ' ins_grid_outer ' : ' ins_slider_outer ') + '">';
            // options.dflt.click_action==1 ? 
            // _thumbnail  += '<a href="'+options.data.link+'" class="ins_external" rel="nofollow" target="_blank" title="'+(typeof(stinstagram_view_in_ins) !== 'undefined' ? stinstagram_view_in_ins : '')+'"><i class="'+ options.dflt.externalicon +'"></i></a>' : '';

            //_thumbnail  += '<a href="'+ (options.dflt.click_action && options.data.type === 'image' ? options.data.standard_resolution : options.data.link) +'" '+ (options.dflt.click_action && options.data.type === 'image' ? ' data-fancybox-group="ins_fancybox_view_'+ options.dflt.id_st_ins+'" ' : '' ) +' class="' + (options.dflt.click_action && options.data.type === 'image' ? ' ins_fancybox ' : '') + (options.dflt.effects==1 ? ' scaling ' : '') + (options.dflt.effects==2 ? ' scaling_down ' : '')  + ' ins_image_link " title="'+(typeof(stinstagram_view_in_ins) !== 'undefined' && !options.dflt.click_action ? stinstagram_view_in_ins : '')+(typeof(stinstagram_view_larger) !== 'undefined' && options.dflt.click_action ? stinstagram_view_larger : '')+'" rel="nofollow" target="_blank">';
            _thumbnail  += '<a href="'+ (options.dflt.click_action ? options.data.standard_resolution : options.data.link) +'" '+ (options.dflt.click_action ? ' data-fancybox-group="ins_fancybox_view_'+ options.dflt.id_st_ins+'" ' : '' ) +' class="' + (options.dflt.click_action ? ' ins_fancybox ' : '') + (options.dflt.effects==1 ? ' scaling ' : '') + (options.dflt.effects==2 ? ' scaling_down ' : '')  + ' ins_image_link " title="'+(typeof(stinstagram_view_in_ins) !== 'undefined' && !options.dflt.click_action ? stinstagram_view_in_ins : '')+(typeof(stinstagram_view_larger) !== 'undefined' && options.dflt.click_action ? stinstagram_view_larger : '')+'" ';
            if(options.dflt.click_action)
            _thumbnail  += ' data-ins_link="'+options.data.link+'" data-ins_caption="'+options.data.caption+'" data-ins_username="'+options.data.username+'" data-ins_full_name="'+(options.data.full_name ? options.data.full_name : options.data.username)+'" data-ins_profile_picture="'+options.data.profile_picture+'" data-ins_created_time="'+(options.dflt.time_format ? options.data.timestamp.toDateString() : $.timeago(options.data.timestamp))+'" data-ins_video="'+options.data.video+'" data-ins_video_width="'+options.data.video_width+'" data-ins_video_height="'+options.data.video_height+'" data-id_st_ins="'+ options.dflt.id_st_ins+'" ';

            _thumbnail  += ' rel="nofollow" target="_blank">';
            options.dflt.click_action ? 
            _thumbnail  += '<span class="ins_view_larger">'+ options.dflt.viewlargericon +'</span>' : '';

            options.data.type === 'video' && options.dflt.show_media_type ? 
            _thumbnail += '     <span class="ins_imagetype ins_videoicon">'+ options.dflt.videoicon +'</span>': '';
            options.data.type === 'image' && options.dflt.show_media_type==2 ? 
            _thumbnail += '     <span class="ins_imagetype">'+ options.dflt.imageicon +'</span>': '';

              options.dflt.likes != false ?
              string_likes += '       <span class="ins_image_info_item ins_image_info_likes '+(options.dflt.likes == 2 ? ' show_default ' : '')+' ">'+ options.dflt.likeicon +'&nbsp;'+ options.data.likes_count+'</span>' : '';

              options.dflt.comments != false ? 
              string_comments += '       <span class="ins_image_info_item ins_image_info_comments '+(options.dflt.comments == 2 ? ' show_default ' : '')+' ">'+ options.dflt.commenticon +'&nbsp;'+ options.data.comments_count+'</span>' : '';
            
            options.dflt.username  != false ?
            string_username += '     <div class="ins_image_info_item ins_image_info_username'+(options.dflt.username == 2 ? ' show_default ' : '')+'">'+ (options.data.full_name ? options.data.full_name : options.data.username)+'</div>' : '';
            options.dflt.timestamp  != false ?
            string_timestamp += '     <div class="ins_image_info_item ins_image_info_timestamp'+(options.dflt.timestamp == 2 ? ' show_default ' : '')+'">'+ (options.dflt.time_format ? options.data.timestamp.toDateString() : $.timeago(options.data.timestamp)) +'</div>' : '';
            if(options.dflt.caption  != false && options.data.caption)
            {
              string_caption += '     <div class="ins_image_info_item ins_image_info_desc '+(options.dflt.caption == 2 || options.dflt.caption == 5 ? ' show_default ' : '')+''+ (options.dflt.caption==4 || options.dflt.caption==5 ? 'hidden-xs' : '' ) + '">';
              var t_cp = options.data.caption;
              if(options.dflt.ins_lenght_of_caption && t_cp && t_cp.length>200)
              {
                var t_cp_fh = t_cp.substr(0, 200).match(/#(\w+)$/);
                var t_cp_sh = t_cp.substr(200).match(/^(?!#)(\w+?)\b/);
                t_cp = t_cp.substr(0, (t_cp_fh && t_cp_sh ? t_cp_fh.index : 200)) + '...';
              }
              string_caption += options.dflt.caption ==3 ? Pongstgrm.prototype.parseIns(t_cp) : t_cp;
              string_caption += '</div>';
            }

            _thumbnail += '   <div class="ins_image_info st_image_layered_description flex_middle flex_center"><div class="st_image_layered_description_inner clearfix">';

            options.dflt.likes ==1 ||　options.dflt.likes ==2 || options.dflt.comments == 1 || options.dflt.comments == 2 ?
            _thumbnail += '     <div class="ins_image_info_basic">' : '';
            options.dflt.likes ==1 ||　options.dflt.likes ==2 ?
              _thumbnail += string_likes : '';
            options.dflt.comments ==1 ||　options.dflt.comments ==2 ?
              _thumbnail += string_comments : '';
            options.dflt.likes ==1 ||　options.dflt.likes ==2 || options.dflt.comments == 1 || options.dflt.comments == 2 ?
            _thumbnail += '     </div>' : '';   

            options.dflt.username ==1 ||　options.dflt.username ==2 ?
              _thumbnail += string_username : '';
            options.dflt.timestamp ==1 ||　options.dflt.timestamp ==2 ?
              _thumbnail += string_timestamp : '';
            options.dflt.caption ==1 ||　options.dflt.caption ==2 ||　options.dflt.caption ==4 ||　options.dflt.caption ==5 ?
              _thumbnail += string_caption : '';


            _thumbnail += '   </div></div>'
            // _thumbnail += '   <div class="ins_image_loader" id="'+ options.dflt.show + '-' + options.data.id +'-thmb-loadr">';
            image_url = options.dflt.image_size==2 ? options.data.standard_resolution : (options.dflt.image_size==1 ? options.data.thumbnail : options.data.low_resolution);
            _thumbnail += '   <div class="ins_image_layer '+(options.dflt.force_square ? ' ins_force_square ' : '')+'" style="'+(options.dflt.force_square ? ' background-image:url('+image_url+'); ' : '')+'">';
            _thumbnail += '        <img id="'+ options.dflt.show + '-' + options.data.id +'-thmb" class="ins_image " data-src="'+ image_url +'" src="'+ (options.dflt.force_square ? prestashop.urls.base_url+'modules/stinstagram/views/img/resolution_'+options.dflt.image_size+'.png' : image_url) +'" alt="'+ options.data.caption.replace(/"/g, '&quot;') +'">';//'+(options.dflt.force_square ? '' : ' swiper-lazy ')+'
            _thumbnail += '   </div>';

            _thumbnail += '</a></div>';

            (options.dflt.username ==3 && string_username) || (options.dflt.caption ==3 && string_caption) || (options.dflt.likes ==3 && string_likes) || (options.dflt.comments == 3 && string_comments) || (options.dflt.string_timestamp == 3 && string_timestamp) ?
            _thumbnail += '<div class="ins_image_info_block">' : '';

            options.dflt.username ==3 ?
              _thumbnail += string_username : '';
            options.dflt.caption ==3 ?
              _thumbnail += string_caption : '';

            options.dflt.likes ==3 || options.dflt.comments == 3 || options.dflt.string_timestamp == 3 ?
            _thumbnail += '     <div class="ins_image_info_basic">' : '';
            options.dflt.timestamp ==3 ?
              _thumbnail += string_timestamp : '';
            options.dflt.likes ==3 ?
              _thumbnail += string_likes : '';
            options.dflt.comments ==3 ?
              _thumbnail += string_comments : '';
            options.dflt.likes ==3 || options.dflt.comments == 3 || options.dflt.string_timestamp == 3 ?
            _thumbnail += '     </div>' : '';     

            (options.dflt.username ==3 && string_username) || (options.dflt.caption ==3 && string_caption) || (options.dflt.likes ==3 && string_likes) || (options.dflt.comments == 3 && string_comments) || (options.dflt.string_timestamp == 3 && string_timestamp) ?
            _thumbnail += '</div>' : '';

            options.dflt.grid ?
            _thumbnail += '</div></li>' : '</div></div>';

        $(options.target).append(_thumbnail);

      return
    }, simple: function (options) {
      var _thumbnail  = '';

      _thumbnail  += '<li><a href="'+ (options.dflt.click_action ? options.data.standard_resolution : options.data.link) +'" '+ (options.dflt.click_action ? ' data-fancybox-group="ins_fancybox_view_'+ options.dflt.id_st_ins+'" ' : '' ) +' class="' + (options.dflt.click_action ? ' ins_fancybox ' : '') + (options.dflt.effects==1 ? ' scaling ' : '') + (options.dflt.effects==2 ? ' scaling_down ' : '')  + ' ins_image_link " title="'+(typeof(stinstagram_view_in_ins) !== 'undefined' && !options.dflt.click_action ? stinstagram_view_in_ins : '')+(typeof(stinstagram_view_larger) !== 'undefined' && options.dflt.click_action ? stinstagram_view_larger : '')+'" ';
      if(options.dflt.click_action)
      _thumbnail  += ' data-ins_link="'+options.data.link+'" data-ins_caption="'+options.data.caption+'" data-ins_username="'+options.data.username+'" data-ins_full_name="'+(options.data.full_name ? options.data.full_name : options.data.username)+'" data-ins_profile_picture="'+options.data.profile_picture+'" data-ins_created_time="'+(options.dflt.time_format ? options.data.timestamp.toDateString() : $.timeago(options.data.timestamp))+'" data-ins_video="'+options.data.video+'" data-ins_video_width="'+options.data.video_width+'" data-ins_video_height="'+options.data.video_height+'" data-id_st_ins="'+ options.dflt.id_st_ins+'" ';

      _thumbnail  += ' rel="nofollow" target="_blank">';

      _thumbnail += '<img src="'+ options.data.thumbnail +'" class="ins_image" alt="'+ options.data.caption.replace(/"/g, '&quot;') +'">';
      _thumbnail += '</a></li>';

      $(options.target).append(_thumbnail);
      return;
    }, bsmodal: function (options) {
        
      return;
    }
  };


  Pongstgrm.prototype.preloadMedia = function (option) {
    var $image = $(option.imgid)
      ,  start = 0;

    $image.one('load', function () {
      ++start === $image.length &&
        $(option.loadr).fadeOut()
        $(this).addClass('fade');
    }).each(function () {
      this.complete && $(this).load();
    })

    return;
  };


  Pongstgrm.prototype.videoBtn = function (option, callback) {
    $(option.trigger).on('click', function(e) {
      e.preventDefault(); callback();

      $(option.child, this)
        .toggleClass(option.classes);
    });

    return;
  };

  Pongstgrm.prototype.parseIns = function (string) {
      var patterns = {
          link: /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig,
          user: /(^|\s)@(\w+)/g,
          hash: /(^|\s)#(\w+)/g
      };
      return string
          .replace(patterns.link,'<a href="$1" target="_blank" rel="nofollow" title="$1">$1</a>')
          .replace(patterns.user, '$1<a href="https://www.instagram.com/$2" target="_blank" rel="nofollow" title="$2">@$2</a>')
          .replace(patterns.hash, '$1<a href="https://www.instagram.com/explore/tags/$2" target="_blank" rel="nofollow" title="$2">#$2</a>');
  };

  Pongstgrm.prototype.stream = function () {
    var element = this.element
      , options = this.options
      , apiurl  = 'https://api.instagram.com/v1/users/'
      , rcount  = '?count=' +  options.count + '&access_token=' + options.accessToken;


    function paginate (option) {
      
        
      return;
    };
    function media (data, option) {
      var iteration = parseInt($(element).data('iteration'));
      $(element).data('iteration', iteration+data.length);
      $.each(data, function (a, b) {
        var newtime = new Date(b.created_time * 1000)
          //, created = newtime.toDateString()
          , defaults = {
              dflt: option
            , target: element
            , data: {
                  id:             b.id
                , type:           b.type
                , video:          b.videos ? b.videos.standard_resolution.url : ''
                , video_width:          b.videos? b.videos.standard_resolution.width : ''
                , video_height:          b.videos? b.videos.standard_resolution.height : ''
                , image:          b.images.standard_resolution.url
                , caption:        (b.caption ? b.caption.text : '')
                , username:       b.user.username
                , full_name:       b.user.full_name
                , timestamp:      newtime
                , thumbnail:      b.images.thumbnail.url
                , standard_resolution:      b.images.standard_resolution.url
                , low_resolution:      b.images.low_resolution.url
                , likes_count:    b.likes.count
                , comments_count: b.comments.count
                , comments_data:  b.comments.data
                , profile_picture:b.user.profile_picture
                , link:           b.link
              }
          };
        if(option.isfooter && option.grid)
          Pongstgrm.prototype.template.simple (defaults);
        else
          Pongstgrm.prototype.template.thumb (defaults, a+iteration);

        /*Pongstgrm.prototype.preloadMedia({
            imgid : '#' + option.show + '-' + b.id + '-thmb'
          , loadr : '#' + option.show + '-' + b.id + '-thmb-loadr'
        });*/

        // Pongstgrm.prototype.template.bsmodal (defaults);

      });
      if(!option.grid)
        new Swiper ($(element).parent(), option.swiper);
      $('.ins_fancybox').fancybox({
        'hideOnContentClick': true,
        'openEffect'  : 'fade',
        'nextEffect' : 'fade',
        'prevEffect' : 'fade',
        'closeEffect' : 'fade',
        /*padding : 0,*/
        helpers: {
          title : {
            type : 'inside'
          },
          overlay: {
            locked: false
          }
        },
        tpl: {
          next: '<a title="'+(typeof(ins_next)!=='undefined' ? ins_next : 'Next')+'" class="ins_fancy_next ins_fancy_nav" href="javascript:;"><i class="fto-right-open-3"></i></a>',
          prev: '<a title="'+(typeof(ins_previous)!=='undefined' ? ins_previous : 'Previous')+'" class="ins_fancy_prev ins_fancy_nav" href="javascript:;"><i class="fto-left-open-3"></i></a>'
        },
        beforeLoad: function() {
            this.type = "image";
            this.autoSize = true;
            this.autoResize = true;
            var element =$(this.element),
            ins_image =$(this.element).attr('href'),
            ins_link = element.data('ins_link'),
            ins_caption = element.data('ins_caption'),
            ins_username = element.data('ins_username'),
            ins_full_name = element.data('ins_full_name'),
            ins_profile_picture = element.data('ins_profile_picture'),
            ins_created_time = element.data('ins_created_time'),
            ins_video = element.data('ins_video');
            ins_video_width = element.data('ins_video_width');
            ins_video_height = element.data('ins_video_height');
            id_st_ins = element.data('id_st_ins');


          var fancy_title = '<div class="ins_fancy_box ins_fancy_box_'+id_st_ins+'"><div class="ins_fancy_profile_img '+(options.ins_show_avatar ? ' ins_show_avatar ' : '') + (options.ins_show_avatar==2 ? ' ins_round_avatar ' : '')+'">';
          fancy_title += '<div class="ins_fancy_profile_img_left"><a href="https://instagram.com/'+ ins_username +'/" rel="nofollow" target="_blank" title="'+ins_full_name+'" class="profile_picture"><img src="'+ ins_profile_picture +'" width="'+ options.picture_size +'"  height="'+ options.picture_size +'" alt="'+ ins_full_name +'"></a></div>';
          fancy_title += '<div class="ins_fancy_profile_img_right"><a href="https://instagram.com/'+ ins_username +'/" rel="nofollow" target="_blank" tiele="'+ins_full_name+'">'+ ins_full_name +'</a></div>';
          fancy_title += '<div class="ins_fancy_info"><span class="ins_fancy_info_item">'+ (this.index + 1) + ' / ' + this.group.length +'</span><span class="ins_fancy_info_item">'+ins_created_time+'</span><a href="'+ins_link+'" title="'+(typeof(stinstagram_view_in_ins) !== 'undefined' ? stinstagram_view_in_ins : '')+'" rel="nofollow" class="ins_fancy_info_item">'+(typeof(stinstagram_view_in_ins) !== 'undefined' ? stinstagram_view_in_ins : '')+'</a></div>';
          fancy_title += '</div>';
          ins_caption != '' ?
          fancy_title += '<div class="ins_fancy_caption">'+Pongstgrm.prototype.parseIns(ins_caption)+'</div>' : '';
          fancy_title += '</div>';
          this.title = fancy_title;
          //
          if(ins_video && !!document.createElement('video').canPlayType)
          {
            this.type = "html";
            this.autoSize = false;
            this.autoResize = false;
            this.content = "<video id='ins_video_player' src='" + ins_video + "'  poster='" + ins_image + "' width='" + ins_video_width + "' height='" + ins_video_height + "'  controls='controls' preload='none' ></video>";
            var window_width = $(window).width();
            this.width = parseInt(ins_video_width > window_width ? window_width : ins_video_width);
            this.height = parseInt(ins_video_width > window_width ? parseInt(ins_video_width/ins_video_height*window_width) : ins_video_height);
          }
        }, 
        afterShow : function () {
            var video = $("#ins_video_player");
            if(video.length)
            {
              video[0].load();
              video[0].play();              
            }
        },
        beforeClose : function () {
            var video = $("#ins_video_player");  
            if(video.length)
            {
              video[0].pause();             
            }  
        }
      });
    };

    function profile (data, option) {
      Pongstgrm.prototype.template.profile ({
          target:             element
        , bio:                data.bio
        , media:              data.counts.media
        , website:            data.website
        , follows:            data.counts.follows
        , username:           data.username
        , full_name:          data.full_name
        , followed_by:        data.counts.followed_by
        , profile_picture:    data.profile_picture
        , dflt: option
      });
      return;
    };

    function ajaxdata (option) {
      $.ajax({
          url      : option.url
        , cache    : true
        , method   : 'GET'
        , dataType : 'jsonp' 
        , success  : function(data){
          var ins_parent = $(element).parent();
           ins_parent.removeClass('ins_connecting');
           ins_parent.find('.ins_load_more').removeClass('ins_loading');
            if(data.meta.code==200)
            {
              if(option.opt.show !== 'profile')
              {
                if(data.data.length==0)
                  ins_parent.find('.ins_no_data').removeClass('hidden-xs-up');
                else
                  media   (data.data, option.opt)
              }
              else
                profile (data.data, option.opt);
            }
            else
            {
              $(element).parent().removeClass('ins_connecting').addClass('ins_ajax_error');
            }

            if(option.opt.show !== 'profile' && option.opt.ins_load_more)
            {
              if(typeof(data.pagination)==='undefined' || typeof(data.pagination.next_url)==='undefined' || !data.pagination.next_url)
                ins_parent.find('.ins_load_more').removeClass('ins_has_more');
              else
              {
                ins_parent.find('.ins_load_more').addClass('ins_has_more').on('click', function (e) {
                  e.preventDefault();
                  $(this).addClass('ins_loading');
                    ajaxdata({ 
                        url: data.pagination.next_url
                      , opt: option.opt 
                    });   

                  $(this).unbind(e);
                });
              }
            }
          }
        , error : function(){
          var ins_parent = $(element).parent();
          ins_parent.find('.ins_load_more').removeClass('ins_loading');
          ins_parent.removeClass('ins_connecting').addClass('ins_ajax_error');
        }
      });

      return;
    };

    switch (options.show) {
      case 'liked':
        ajaxdata({
            url : apiurl + 'self/media/liked' + rcount
          , opt : options
        });
      break

      case 'feed':
        ajaxdata({
            url: apiurl + 'self/feed' + rcount
          , opt: options
        });
      break

      case 'profile':
        ajaxdata({
            // url: apiurl + options.accessId + '?access_token=' + options.accessToken
            url: apiurl + options.ins_user_id + '?access_token=' + options.accessToken
          , opt: options
        });
      break

      case 'recent':
        ajaxdata({
            // url: apiurl + options.accessId + '/media/recent' + rcount
            // url: apiurl + 'self/media/recent' + rcount
            url: apiurl + options.ins_user_id + '/media/recent' + rcount
          , opt: options
        });
      break

      default:
        ajaxdata({
            // url: 'https://api.instagram.com/v1/tags/' + options.show + '/media/recent' + rcount
            url: 'https://api.instagram.com/v1/tags/' + options.show + '/media/recent' + rcount
          , opt: options
        });
    }

    return;
  };


  Pongstgrm.prototype.create = function () {
    var element = this.element
      , options = this.options;

    //
    if(typeof(this.options.ins_hash_tag)!=='undefined' && this.options.ins_hash_tag)
      this.options.show = this.options.ins_hash_tag;

    if(typeof(this.options.ins_self_liked)!=='undefined' && this.options.ins_self_liked)
      this.options.show = 'liked';

    $(element)
      .attr('data-type', options.show)
      .addClass('pongstagrm');


/*    options.show !== 'profile' &&
      Pongstgrm.prototype.template.loadmore({
          show:       options.show
        , target:     element
        , button:     options.button
        , buttontext: options.buttontext
      })*/

    this.stream();

    return;
  };


  Pongstgrm.prototype.start = function () {
    var option = this.options;
    if (option.ins_user_id!='' && option.accessToken!='') {
      this.create(); return;
    }
    else{
      $(this.element).parent().removeClass('ins_connecting').addClass('ins_ajax_error');
    }
  };

  // PONGSTAGR.AM PLUGIN DEFINITON
  // =============================
  $.fn.pongstgrm = function (option) {
    var options  = $.extend({}, Pongstgrm.defaults, option);

    return this.each(function () {
      var media = new Pongstgrm($(this)[0], options);
          media.start();
    });
  };


  // PONGSTAGR.AM DEFAULT OPTIONS
  // =============================  
  $.fn.pongstgrm.defaults = Pongstgrm.options;

}(window.jQuery);

jQuery(function($) { 
  if(typeof(instagram_block_array)!=='undefined')
  {
    if(instagram_block_array.profile.length)
    {
      $.each(instagram_block_array.profile, function(key, value){
        $("#instagram_block_"+value['id_st_ins']+" .instagram_profile").pongstgrm(value);
      });
    }
    if(instagram_block_array.feed.length)
    {
      $.each(instagram_block_array.feed, function(key, value){
        $("#instagram_block_"+value['id_st_ins']+" .instagram_con "+( value['grid'] ? "" : " .swiper-wrapper ")).pongstgrm(value);
      });
    }
  }
});
