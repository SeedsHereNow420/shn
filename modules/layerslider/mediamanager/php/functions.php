<?php
/**
* Creative Slider v6.6.5 - Responsive Slideshow Module https://creativeslider.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

function display_gallery_page($files_array, $pageno = 1, $path = '', $resultspp = 4096, $display = true)
{
    $pagination = array();
    $pagination['resultspp'] = $resultspp;
    $pagination['startres'] = 1 + (($pageno - 1) * $pagination['resultspp']);
    $pagination['endres'] = $pagination['startres'] + $pagination['resultspp'] - 1;
    $pagination['counter'] = 1;
    $pagination['totalres'] = count($files_array);
    $pagination['totalpages'] = ceil($pagination['totalres'] / $pagination['resultspp']);

    $imagepath = _PS_IMG_;
    $array_count = 0;
    $output = '';

    foreach ($files_array as $file_name) {
        $file_path = $imagepath.$path.$file_name;

        if (($pagination['counter'] >= $pagination['startres']) && ($pagination['counter'] <= $pagination['endres'])) {
            $addcbr = '';

            if (($pagination['counter'] > ($pagination['endres'] - 5)) && ($pagination['counter'] > ($pagination['totalres'] - 5))) {
                $addcbr = ' br';
            }

            $file = array();    // ???
            $file['name'] = $file_name;

            $files_array[$array_count] = array($file);
            $array_count++;

            if (preg_match('/\.(jpg|jpe|jpeg|png|gif|bmp)$/', $file_name)) {
                $output .= '<a href="'.$file_path.'" title="'.$file_name.'" data-gallery="gallery">';
                $output .= "<div class=\"thumb$addcbr\" style=\"background-image:url('$file_path')\"></div>";
                $output .= '<label class="file-name">'.$file_name.'</label>';
                $output .= '</a>';
            } else {
                $output .= '<a href="'.$file_path.'" title="'.$file_name.'" data-folder="folder">';
                $output .= "<div class=\"thumb folder$addcbr\"></div>";
                $output .= '<label class="file-name">'.$file_name.'</label>';
                $output .= '</a>';
            }
        }
        $pagination['counter']++;
    }

    if ($display == true) {
        echo $output;
    } else {
        return $output;
    }
}

function display_gallery_pagination($url = '', $totalresults = 0, $pageno = 1, $resultspp = 4096, $display = true)
{
    $configp = array();
    $configp['results_per_page'] = $resultspp;
    $configp['total_no_results'] = $totalresults;
    $configp['page_url'] = $url;
    $configp['current_page_segment'] = 4;
    $configp['url'] = $url;
    $configp['pageno'] = $pageno;

    $output = get_html($configp);

    if ($display == true) {
        echo $output;
    } else {
        return $output;
    }
}

function get_html($pconfig/*, $ext = ''*/)
{
    $links_html = '';

    // $pageAddress = $pconfig['url'];
    $resultspp = $pconfig['results_per_page'];
    $current_page = $pconfig['pageno'];
    $start_res = $current_page * $resultspp;
    // $endRes = $start_res + $resultspp;

    $tot_pages = $pconfig['total_no_results'] / $resultspp;

    $round_pages = ceil($tot_pages);

    $links_html .= '<ul>';

    if ($current_page > 1) {
        if ($tot_pages > 1) {
            $links_html .= '<li id="gliFirst"><a data-target-page="1" href="#">&lt; First</a></li>';
        }
        $links_html .= '<li id="gliPrev"><a data-target-page="prev" href="#">Prev</a></li>';
    } else {
        if ($tot_pages > 1) {
            $links_html .= '<li class="disabled" id="gliFirst"><a data-target-page="1" href="#">&lt; First</a></li>';
        }
        $links_html .= '<li class="disabled" id="gliPrev"><a data-target-page="prev" href="#">Prev</a></li>';
    }

    // $pageLimit = 9;

    if (($current_page - 3) > 0) {
        $start_page = $current_page - 3;
    } else {
        $start_page = 1;
        $end_add = 1 - ($current_page - 3);
    }

    $end_page = $round_pages;
    $start_add = 0;

    if (($start_page + $start_add) > 0) {
        $start_page = $start_page - $start_add;
    } else {
        $start_page = 1;
    }

    if ($start_page <= 0) {
        $start_page = 1;
    }

    for ($i = $start_page; $i <= $end_page; $i++) {
        if ($i == $current_page) {
            $links_html .= '<li class="disabled" id="gli$i"><a href="#" data-target-page="$i">$i</a></span></li>';
        } else {
            $links_html .= '<li id="gli$i"><a href="#" data-target-page="$i">$i</a></li>';
        }
    }

    if ($current_page < $round_pages) {
        // $nextPage = $current_page + 1;
        $links_html .= '<li id="gliNext"><a href="#" data-target-page="next">Next</a></li>';

        if ($tot_pages > 1) {
            $links_html .= '<li id="gliLast"><a href="#" data-target-page="$round_pages">Last &gt;</a></li>';
        }
    } else {
        $links_html .= '<li id="gliNext" class="disabled"><a href="#" data-target-page="next">Next</a></li>';

        if ($tot_pages > 1) {
            $links_html .= '<li id="gliLast" class="disabled"><a href="#" data-target-page="$round_pages">Last &gt;</a><li>';
        }
    }
    //if ($round_pages > 9) {}
    $links_html .= '</ul>';
    return $links_html;
}
