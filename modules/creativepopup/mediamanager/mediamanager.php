<?php
/**
* Creative Popup v1.6.4 - https://creativepopup.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

$tabno = 1;
$uploadfolderset = is_dir(_PS_IMG_DIR_.Tools::getValue('d', ''));
$mediatype = Tools::getValue('type', 'image');
$uploadfolder = '';

?><html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Media Manager</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript">
    $(window).load(function()
    {
        if ($(".fileuploadsingle").length > 0)
        {
            $('.fileuploadsingle').fileupload({
                done: function (e, data)
                {

                    //check if it was successfull first:
                    if ($(this).find(".fullimage").length>0)
                    {
                        var itemelem = $(this).find(".fullimage");
                    }

                    var itemdel = $(this).find('.template_alert_warning');
                    //console.log(data);
                    //console.log(data.result);

                    if (data.result!=null)
                    {
                        if (data.result[0].error)
                        {
                            $(this).append("<div class=\"alert alert-error\"><a class=\"close\" data-dismiss=\"alert\">&times;</a>Error: "+data.result[0].error+"</div>");
                        }
                        else
                        {
                            var time = new Date().getTime();

                            if (data.result[0].mediatype=="media")
                            {
                                $(this).find('.fullimage').remove();
                                $(this).find('.alert').remove();

                                //add div with image in
                                //refresh image as it has been updated
                                //console.log(data.result);
                                $(this).append("<div class=\"alert alert-success\"><a class=\"close\" data-dismiss=\"alert\">&times;</a>Media uploaded successfully.</div><div class=\"fullimage\"><a href=\""+data.result[0].destination+"?t="+time+"\" target=\"_blank\">"+data.result[0].name+"</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href=\""+data.result[0].destination+"\" class=\"btn btn-success btn-white start mce-insert\" value=\"{#insert}\"><i class=\"icon-upload icon-white\"></i> Insert</a></div>");
                            }
                            else
                            {
                                //alert("file ext: "+data.result[0].fileext+"\r\n"+data.result[0].imagepath);
                                if (data.result[0].thumb_name!="")
                                {
                                    $(this).find('.fullimage').remove();
                                    $(this).find('.alert').remove();

                                    //add div with image in
                                    //refresh image as it has been updated
                                    $(this).append("<div class=\"alert alert-success\"><a class=\"close\" data-dismiss=\"alert\">&times;</a>Image uploaded, click on thumbnail to see full image.</div><div class=\"fullimage\" data-toggle=\"modal-gallery\" data-target=\"#modal-gallery-no-del\"><a href=\""+data.result[0].destination+"?t="+time+"\" target=\"_blank\" data-gallery=\"gallery\"><img style=\"max-height:80px\" src=\""+data.result[0].destination+"?t="+time+"\" /><label>"+data.result[0].name+"</label></a>&nbsp;&nbsp;<a href=\""+data.result[0].destination+"\" class=\"btn btn-success btn-white start mce-insert\" value=\"{#insert}\"><i class=\"icon-upload icon-white\"></i> Insert</a></div>");
                                }
                            }
                        }
                    }
                    else
                    {
                        $(this).append("<div class=\"alert alert-error\"><a class=\"close\" data-dismiss=\"alert\">&times;</a>Error: The upload script has failed silently - this often means that there is not enought memory to generate a thumbnail.  Please check your PHP configuration, impose upload limits (filesize, dimensions etc) or upload a smaller file.</div>");
                    }

                    //console.log("THUMB PATH: "+data.result[0].imagepaththumb);
                    //reset animation state of progress bar for next upload

                    $(this).find(".fileupload-progress").removeClass("in");
                    $(this).find(".fileupload-progress .bar").css("width","0");

                    //hide queue and empty
                    $(this).find(".fileupload-progress").css("visibility","hidden");
                    $(this).find(".fileupload-progress").css("display","none");
                    $(this).find(".table-striped tr").remove();

                    //re-enable browse for file upload
                    $(this).find(".fileinput-button").removeClass("disabled");
                    $(this).find(".fileinput-button input").removeAttr("disabled");

                    //disable cancel upload button & start (however start is already handled by ui)
                    $(this).find(".btn-function.cancel").addClass("disabled").attr("disabled","disabled");
                },
                stop: function (e, data)
                {
                    //console.log("stopped");

                    //SHOW ERROR

                    //reset animation state of progress bar for next upload
                    $(this).find(".fileupload-progress").removeClass("in");
                    $(this).find(".fileupload-progress .bar").css("width","0");

                    $(this).find(".fileupload-progress").css("display","none");

                    //hide queue and empty
                    $(this).find(".fileupload-progress").css("visibility","hidden");
                    //$(this).find(".fileupload-progress").css("display","none");
                    $(this).find(".table-striped tr").remove();
                    //$(this).find(".table-striped").css("display","none");

                    //re-enable browse for file upload
                    $(this).find(".fileinput-button").removeClass("disabled");
                    $(this).find(".fileinput-button input").removeAttr("disabled");

                    //disable cancel upload button & start (however start is already handled by ui)
                    $(this).find(".btn-function.cancel").addClass("disabled").attr("disabled","disabled");;

                    //window.location.href=$(this).attr("rel");
                    //redirect page where files get moved and saved into db
                },
                success: function (e, data)
                {
                    //console.log("/*************** test success *****************/");
                },
                dropZone: $(this),
                limitConcurrentUploads: 1,
                //maxNumberOfFiles: 1
            }).bind('fileuploadstart', function (e)
            {
                //start file upload
                //console.log('fileuploadstart!!!!');

                //show the progress bar
                $(this).find(".fileupload-progress").css("display","block");
                $(this).find(".fileupload-progress").css("visibility","visible");

                //disable start and upload button
                $(this).find(".btn-primary.start, .btnupload").attr("disabled","disabled");
                $(this).find(".fileinput-button, .btn-primary.start").addClass("disabled");
            }).bind('fileuploadfail', function (e, data)
            {
                //console.log("test fail");
                    //console.log(e);
                    //console.log(data.result);

                    //hide image
                    /*var imgelem = $(this).parent().parent().parent().find(".fullimage img");
                    imgelem.remove();*/
            }).bind('fileuploadadd', function (e, data)
            {
                //added file to queue
                //console.log("ADD");
                $(this).find('.fullimage').remove();
                $(this).find('.alert').remove();

                //clear current queue by cancelling all existing items
                $(this).find(".btn-cancel").click(); //cancel anything else in the queue as we are limiting to 1 file upload

                //show the queue
                //$(this).find(".table-striped").css("display","table");

                //enable start and cancel buttons as there is a queue
                $(this).find(".btn-primary.start, .btn-function.cancel").removeAttr("disabled").removeClass("disabled");
            }).bind('fileuploadcancel', function (e, data)
            {
                //console.log("cancelled!!!");
            }).bind('fileuploaderror', function (e, data)
            {
                //console.log("error!!!");
                //console.log(data.result);
            });

            //TODO, add listener on individual cancel buttons and count how many there are, then disable the main cancel button once the queue is empty again

            $(".fileuploadsingle .btn-function.cancel").click(function() {
                //console.log("cancel clicked");

                //disable cancel button
                $(this).addClass("disabled");
                $(this).attr("disabled","disabled");

                //disable start button as queue is empty
                $(this).parent().find(".btn-primary.start").attr("disabled","disabled");
                $(this).parent().find(".btn-primary.start").addClass("disabled");

                return true;
            });
        }

        var insert_type = '<?php echo $mediatype ?>';
        $(".modal-insert").live('click', function() {
            var thisVar = $(this);

            var fullImage = thisVar.parent().parent().find(".modal-image img.in");//check first for an image being faded in and use that value
            if (fullImage.length==0)
            {//else the fade in image doesn't exist so use this version instead....
                fullImage = thisVar.parent().parent().find(".modal-image img");
            }
            //alert(fullImage.attr("src"));

            var returnString = "";
            if ((insert_type=="media")||(insert_type=="image"))
            {
                returnString = fullImage.attr("src");
            }
            else
            {
                returnString = "<img src='"+fullImage.attr("src")+"' />";
            }
            ClosePluginPopup(returnString);
        });

        $("#media .name a:not(.not a)").click(function(){
            var thisVar = $(this);

            //alert(fullImage.attr("src"));

            var returnString = "";
            returnString = this.href;

            //alert(returnString);
            //return false;
            ClosePluginPopup(returnString);
        });

        $(".modal-delete").click(function(){
            var thisVar = $(this);

            var fullImage = thisVar.parent().parent().find(".modal-image img.in");//check first for an image being faded in and use that value
            if (fullImage.length==0)
            {//else the fade in image doesn't exist so use this version instead....
                fullImage = thisVar.parent().parent().find(".modal-image img");
            }

            //console.log("delete image: "+fullImage.attr("src"));
            var filepath = fullImage.attr("src");
            var filename = filepath.replace(/^.*[\\\/]/, '')

            loadPageData(current_pageNo, filename);
        });

        function ClosePluginPopup (strReturnURL)
        {
            var path = strReturnURL.substr(strReturnURL.indexOf("<?php echo _PS_IMG_ ?>"));
            window.parent.lsInsertImage(path);
        }

        $(".mce-insert").live("click",function() {
            if ((insert_type=="media")||(insert_type=="image"))
            {
                returnString = this.href;
            }
            else
            {
                returnString = "<img src='"+this.href+"' />";
            }
            ClosePluginPopup(returnString);
            return false;
        });

        // ******************* PAGINATION ********************** //

        var current_pageNo = 1;
        var totalpages = 0;

        function paginationClick()
        {
            var wantedpage = $(this).attr("data-target-page");
            var tparent = $(this).parent();
            var tpage = current_pageNo;

            if (tparent.hasClass("disabled"))
            {
                return false;
            }

            var pagenumber = 1;

            if (wantedpage=="next")
            {
                tpage++;
            }
            else if (wantedpage=="prev")
            {
                tpage--;
            }
            else
            {
                tpage = wantedpage;
            }

            gotoPage(tpage);
            updatePaginationLinks(tpage);
            loadPageData(tpage);
            return false;
        }

        $(".pagination a").click(paginationClick);

        function gotoPage(pagenumber)
        {//width of a page is 640px
            var gallery = $("#gallery");
            var galleryPosition = (pagenumber-1) * 640;
            gallery.animate({left:"-"+galleryPosition+"px"});
            current_pageNo = pagenumber;
            //console.log(current_pageNo);
        }

        function updatePaginationLinks(pagenumber)
        {//width of a page is 640px
            //disable/enable the "first/prev/next/last & current page states...

            $(".pagination li").removeClass("disabled");
            $(".pagination #gli"+pagenumber).addClass("disabled");
            if (pagenumber==1)
            {
                $(".pagination #gliFirst").addClass("disabled");
                $(".pagination #gliPrev").addClass("disabled");
            }
            if (pagenumber==totalpages)
            {
                $(".pagination #gliLast").addClass("disabled");
                $(".pagination #gliNext").addClass("disabled");
            }

            var showNoArray = new Array();

            var start_add = new Number(1);

            if ((pagenumber-3)>=1)
            {
                start_add = pagenumber-3;
            }
            else if ((pagenumber-2)>=1)
            {
                start_add = pagenumber-2;
            }
            else if ((pagenumber-1)>=1)
            {
                start_add = pagenumber-1;
            }
            else
            {
                start_add = Number(pagenumber);
            }

            var end_add = start_add + 7;

            /*console.log("startADD: "+start_add);
            console.log("end_add: "+end_add);
            console.log("totalpages: "+totalpages);*/

            if (end_add>totalpages)
            {
                end_add = totalpages+1;
                start_add = end_add - 7;
                if (start_add<1)
                {
                    start_add = 1;
                }
            }

            $(".pagination li:not(#gliFirst, #gliPrev, #gliNext, #gliLast)").hide();

            for (var i=start_add; i<end_add; i++)
            {
                //console.log("I: "+i);
                $("#gli"+i).show();
            }
        }

        $(function() {
            document.upload.uploadfolder.value = window.parent.imgpath;
        });

        $(document).on('click', 'a[data-folder]', function(e) {
            e.preventDefault();
            var dir = this.attributes.title.value;
            if (dir == '..') {
                window.parent.imgpath = window.parent.imgpath.replace(/[^\/]*\/$/, '');
                document.upload.uploadfolder.value = window.parent.imgpath;
            } else {
                window.parent.imgpath += dir + '/';
                document.upload.uploadfolder.value = window.parent.imgpath;
            }
            loadPageData(1);
        });

        function loadPageData(pagenumber, delfilename)
        {
            //set default value for delfilename
            delfilename = typeof delfilename !== 'undefined' ? delfilename : '';
            var ajaxurl = "";

            if (delfilename!="")
            {//send a delete request with the page load
                ajaxurl = "<?php echo Context::getContext()->link->getAdminLink('AdminCreativePopupMedia') ?>&action=listImages&d="+window.parent.imgpath+"&p="+pagenumber+"&del="+encodeURIComponent(delfilename);
            }
            else
            {//else just get the page
                ajaxurl = "<?php echo Context::getContext()->link->getAdminLink('AdminCreativePopupMedia') ?>&action=listImages&d="+window.parent.imgpath+"&p="+pagenumber;
            }

            var jqxhr = $.getJSON(ajaxurl, function(data) {
            //console.log("success");

            var numpages = data[0].noofpages;
            var galleryWidth = (numpages+1)*640;
            $("#gallery").css("width",galleryWidth+"px");
            if (totalpages!=numpages)
            {//hten the number of pages has changed so lets set up containers for each page again
                $("#gallery").empty();
                for (var i=1; i<=numpages; i++)
                {
                    $("#gallery").append("<div class=\"cpage\" id=\"gallery"+i+"\"></div>");
                }
            }

            totalpages = numpages;

            if (current_pageNo>=numpages)
            {//if the number of pages reduced in size and we were on the last page, then we need to change the page accordingly
                current_pageNo = numpages;
                gotoPage(current_pageNo);
            }

            //add thumbnails to div
            $("#gallery"+pagenumber).html(data[0].thumbhtml);

            //remove loading icon
            $("#gallery"+pagenumber).css("background","none");

            //add pagination and setup handlers again
            $(".pagination a").unbind();
            $(".pagination").html(data[0].paginationhtml);
            $(".pagination a").click(paginationClick);
            }).fail(function() { /*console.log("error");*/ });

            //.done(function() { console.log("second success"); })
            //.always(function() { console.log("finished"); });
        }

        $("#uploadtab, #browsetab").click(function() {
            if ($(this).attr("id")=="browsetab")
            {//user clicked browse
                //get pagination
                //set up empty containers for pages

                //$(".pagination a").unbind();
                //$(".pagination a").click(paginationClick);

                //populate first page
                loadPageData(current_pageNo);
            }
            else if ($(this).attr("id")=="uploadtab")
            {
                $(".pagination a").unbind();
                $(".pagination li, .pagination ul, .pagination ol, .pagination a").remove();
            }
        });
        function positionThumbnail(e)
        {

            xOffset = 30;
            yOffset = 10;
            $("#thumb").css("left",(e.clientX + xOffset) + "px");

            diff = 0;
            if (e.clientY + $("#thumb").height() > $(window).height())
                diff = e.clientY + $("#thumb").height() - $(window).height();

            $("#thumb").css("top",(e.pageY - yOffset - diff) + "px");
        }

        $("a.thumb").hover(function(e){
            $("#thumb").remove();
            $("body").append("<div id=\"thumb\"><img src=\"<?php echo CP_MEDIA_PATH ?>encodeexplorer.php?thumb="+ $(this).attr("href") +"\" alt=\"Preview\" \/><\/div>");
            positionThumbnail(e);
            $("#thumb").fadeIn("medium");
        },
        function(){
            $("#thumb").remove();
        });

        $("a.thumb").mousemove(function(e){
            positionThumbnail(e);
        });

        $("a.thumb").click(function(e){$("#thumb").remove(); return true;});
    });
    </script>
    <?php $css_uri = __PS_BASE_URI__.'modules/creativepopup/views/css/mediamanager' ?>
    <link rel="stylesheet" href="<?php echo $css_uri ?>/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $css_uri ?>/bootstrap/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="<?php echo $css_uri ?>/fileupload/jquery.fileupload-ui.css">
    <link rel="stylesheet" href="<?php echo $css_uri ?>/fileupload/bootstrap-image-gallery.min.css">

    <?php $js_uri = __PS_BASE_URI__.'modules/creativepopup/views/js/mediamanager' ?>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js"></script>
    <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
    <script src="<?php echo $js_uri ?>/fileupload/vendor/jquery.ui.widget.js"></script>
    <!-- The Templates plugin is included to render the upload/download listings -->
    <script src="<?php echo $js_uri ?>/fileupload/vendor/tmpl.min.js"></script>
    <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
    <script src="<?php echo $js_uri ?>/fileupload/vendor/load-image.min.js"></script>
    <!-- The Canvas to Blob plugin is included for image resizing functionality -->
    <script src="<?php echo $js_uri ?>/fileupload/vendor/canvas-to-blob.min.js"></script>
    <!-- Bootstrap JS and Bootstrap Image Gallery are not required, but included for the demo -->
    <script src="<?php echo $js_uri ?>/fileupload/vendor/bootstrap.min.js"></script>
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="<?php echo $js_uri ?>/fileupload/jquery.iframe-transport.js"></script>
    <!-- The basic File Upload plugin -->
    <script src="<?php echo $js_uri ?>/fileupload/jquery.fileupload.js"></script>
    <!-- The File Upload file processing plugin -->
    <script src="<?php echo $js_uri ?>/fileupload/jquery.fileupload-fp.js"></script>
    <!-- The File Upload user interface plugin -->
    <script src="<?php echo $js_uri ?>/fileupload/jquery.fileupload-ui.js"></script>
    <!-- The localization script -->
    <script src="<?php echo $js_uri ?>/fileupload/locale.js"></script>
    <!-- The main application script -->
    <script src="<?php echo $js_uri ?>/fileupload/bootstrap-image-gallery.min.js"></script>
    <!--script src="/fileupload/main.js"></script-->
    <!-- The XDomainRequest Transport is included for cross-domain file deletion for IE8+ -->
    <!--[if gte IE 8]><script src="<?php echo $js_uri ?>fileupload/cors/jquery.xdr-transport.js"></script><![endif]-->

    <!-- The template to display files available for upload -->
    <script id="template-upload" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-upload">
            <td class="preview"><span class=""></span></td>
            <td class="name"><span>{%=file.name%}</span></td>
            <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
            {% if (file.error) { %}
                <td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
            {% } else if (o.files.valid && !i) { %}
                <td style="display:none;">
                    <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="bar" style="width:0%;"></div></div>
                </td>
                <td class="start">{% if (!o.options.autoUpload) { %}
                    <button class="btn btn-primary" style="display:none;">
                        <i class="icon-upload icon-white"></i>
                        <span>{%=locale.fileupload.start%}</span>
                    </button>
                {% } %}</td>
            {% } else { %}
                <td colspan="2"></td>
            {% } %}
            <td class="cancel" style="display:none;">{% if (!i) { %}
                <button class="btn btn-function btn-cancel">
                    <i class="icon-ban-circle icon-black"></i>
                    <!--<span>{%=locale.fileupload.cancel%}</span>-->
                </button>
            {% } %}</td>
        </tr>
    {% } %}
    </script>
    <!-- The template to display files available for download -->
    <script id="template-download" type="text/x-tmpl">
    </script>
</head>
<body>
    <ul class="nav nav-tabs">
    <?php
    if ($mediatype == 'media') : ?>
        <?php $ubuttontext = 'media' ?>
        <li<?php echo ($tabno == 1) ? ' class="active"' : '' ?>><a href="#home" data-toggle="tab">Upload Media</a></li>
        <li<?php echo ($tabno == 2) ? ' class="active"' : '' ?>><a href="#media" data-toggle="tab">Browse Media</a></li>
    <?php
    else : ?>
        <?php $ubuttontext = 'image' ?>
        <li class="active"><a href="#home" data-toggle="tab" id="uploadtab">Upload Image</a></li>
        <li><a href="#images" data-toggle="tab" id="browsetab">Browse Images</a></li>
    <?php
    endif ?>
    </ul>
    <div class="tab-content">
        <div class="tab-pane<?php echo ($tabno == 1) ? ' active' : '' ?>" id="home">
            <div id="upload-img">
                <form name="upload" class="fileuploadsingle" action="<?php echo Context::getContext()->link->getAdminLink('AdminCreativePopupMedia') ?>&action=uploadFile" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="mediatype" value="<?php echo $mediatype ?>" />
                    <input type="hidden" name="uploadfolder" value="<?php echo $uploadfolder ?>" />
                    <div class="row fileupload-buttonbar">
                        <div class="span7" style="width:95%;float:left;">
                            <span class="btn btn-small btn-success fileinput-button">
                                <span><i class="icon-plus icon-white"></i> Add <?php echo $ubuttontext ?></span>
                                <input type="file" name="userfile" class="btnupload">
                            </span>
                            <button type="submit" class="btn btn-small btn-primary start disabled" disabled="disabled">
                                <i class="icon-upload icon-white"></i> Start upload
                            </button>
                            <button type="reset" class="btn btn-small btn-function cancel disabled" disabled="disabled">
                                <i class="icon-ban-circle icon-black"></i> Cancel upload
                            </button>
                        </div>

                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                    <table class="table table-striped"><tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery"></tbody></table>

                    <div class="span5 fileupload-progress fade" style="display:none;">
                        <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                            <div class="bar" style="width:0%;"></div>
                        </div>
                        <div class="progress-extended">&nbsp;</div>
                    </div>
                </form>
            </div>
        </div>
        <?php
        if ($mediatype == '' || $mediatype == 'image') : ?>
            <div class="tab-pane<?php echo $tabno == 2 ? ' active' : '' ?>" id="images">
                <div class="cmask">
                    <div id="gallery" data-toggle="modal-gallery" data-target="#modal-gallery">
                    </div>
                </div>
            </div>
        <?php
        elseif ($mediatype == 'media') : ?>
            <div class="tab-pane<?php echo ($tabno == 2) ? ' active' : '' ?>" id="media" style="">
            </div>
        <?php
        endif ?>
    </div>
    <div id="modal-gallery" class="modal modal-gallery hide fade" tabindex="-1">
        <div class="modal-header">
            <a class="close" data-dismiss="modal">&times;</a>
            <h3 class="modal-title"></h3>
        </div>
        <div class="modal-body"><div class="modal-image"></div></div>
        <div class="modal-footer">
            <a class="btn btn-danger modal-delete" target="_blank" style="float:left;" data-dismiss="modal">
                <i class="icon-trash icon-white"></i>
                <span>Delete</span>
            </a>

            <a class="btn btn-success modal-insert" target="_blank">
                <i class="icon-upload icon-white"></i>
                <span>Insert</span>
            </a>
            <a class="btn btn-function modal-prev">
                <i class="icon-arrow-left"></i>
                <span>Previous</span>
            </a>
            <a class="btn btn-function modal-next">
                <span>Next</span>
                <i class="icon-arrow-right"></i>
            </a>
        </div>
    </div>
    <div id="modal-gallery-no-del" class="modal modal-gallery hide fade" tabindex="-1">
        <div class="modal-header">
            <a class="close" data-dismiss="modal">&times;</a>
            <h3 class="modal-title"></h3>
        </div>
        <div class="modal-body"><div class="modal-image"></div></div>
        <div class="modal-footer">
            <a class="btn btn-success modal-insert" target="_blank">
                <i class="icon-upload icon-white"></i>
                <span>Insert</span>
            </a>
            <a class="btn btn-function modal-prev">
                <i class="icon-arrow-left"></i>
                <span>Previous</span>
            </a>
            <a class="btn btn-function modal-next">
                <span>Next</span>
                <i class="icon-arrow-right"></i>
            </a>
        </div>
    </div>
</body>
</html>
