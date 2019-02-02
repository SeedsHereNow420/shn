<?php
/**
* Creative Popup v1.6.4 - https://creativepopup.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

if (defined('CP_INCLUDE')) {
    $pages = null;
    $popup = null;
    $cpContainer = null;
    $popupID = 0;
    $cpPlugins = null;
    $cpMarkup = null;
    $layerAttributes = null;
    $innerAttributes = null;
    $id = 0;
    $cpDefaults = null;
}

// Popup
$pages['properties']['attrs']['type'] = 'popup';
$pages['properties']['props']['width'] = !empty($pages['properties']['attrs']['popupWidth']) ? $pages['properties']['attrs']['popupWidth'] : 640;
$pages['properties']['props']['height'] = !empty($pages['properties']['attrs']['popupHeight']) ? $pages['properties']['attrs']['popupHeight'] : 360;

// Get popup style
$popupStyleAttr = array();
$popupStyleAttr[] = 'width:'.cp_check_unit($pages['properties']['props']['width']).';';
$popupStyleAttr[] = 'height:'.cp_check_unit($pages['properties']['props']['height']).';';
$popupStyleAttr[] = 'margin:0 auto;';
if (isset($pages['properties']['props']['sliderStyle'])) {
    $popupStyleAttr[] = $pages['properties']['props']['sliderStyle'];
}

// Before popup content hook
if (cp_has_action('cp_before_popup_content')) {
    cp_do_action('cp_before_popup_content');
}

$customClasses = '';
if (!empty($pages['properties']['props']['popupclass'])) {
    $customClasses = ' '.$pages['properties']['props']['popupclass'];
}

// Wrap Popups
$cpContainer[] = '<div class="cp-popup'.$customClasses.'">';

// Start of popup container
$cpContainer[] = '<form id="'.$popupID.'" name="'.$popupID.'" class="cp-ps-container fitvidsignore" method="post" action="'.${'_SERVER'}['REQUEST_URI'].'" style="'.implode('', $popupStyleAttr).'">';

// Add pages
if (!empty($popup['slides']) && is_array($popup['slides'])) {
    foreach ($popup['slides'] as $pagekey => $page) {
        // Skip this page?
        if (!empty($page['props']['skip'])) {
            continue;
        }

        // Get page attributes
        $pageId = !empty($page['props']['id']) ? ' id="'.$page['props']['id'].'"' : '';
        $pageAttrs = !empty($page['attrs']) ? cp_array_to_attr($page['attrs']) : '';
        $postContent = false;


        // Check for the origami plugin
        if (! empty($page['attrs']['transitionorigami'])) {
            $cpPlugins[] = 'origami';
        }

        // Post content
        //if (!isset($page['props']['post_content']) || $page['props']['post_content']) {
        $queryArgs = array(
            'post_status' => 'publish',
            'limit' => 1,
            'posts_per_page' => 1,
            'suppress_filters' => false
        );

        if (isset($page['props']['post_offset'])) {
            if ($page['props']['post_offset'] == -1) {
                $page['props']['post_offset'] = $pagekey;
            }

            $queryArgs['offset'] = $page['props']['post_offset'];
        }

        if (!empty($pages['properties']['props']['post_type'])) {
            $queryArgs['post_type'] = $pages['properties']['props']['post_type'];
        }

        if (!empty($pages['properties']['props']['post_orderby'])) {
            $queryArgs['orderby'] = $pages['properties']['props']['post_orderby'];
        }

        if (!empty($pages['properties']['props']['post_order'])) {
            $queryArgs['order'] = $pages['properties']['props']['post_order'];
        }

        if (!empty($pages['properties']['props']['post_categories'][0])) {
            $queryArgs['category__in'] = $pages['properties']['props']['post_categories'];
        }

        if (!empty($pages['properties']['props']['post_tags'][0])) {
            $queryArgs['tag__in'] = $pages['properties']['props']['post_tags'];
        }

        if (!empty($pages['properties']['props']['post_taxonomy']) && !empty($pages['properties']['props']['post_tax_terms'])) {
            $queryArgs['tax_query'][] = array(
                'taxonomy' => $pages['properties']['props']['post_taxonomy'],
                'field' => 'id',
                'terms' => $pages['properties']['props']['post_tax_terms']
            );
        }

        $postContent = CpPosts::find($queryArgs);
        //}

        // Start of page
        $pageAttrs = !empty($pageAttrs) ? 'data-cp="'.$pageAttrs.'"' : '';
        $cpMarkup[] = '<div class="cp-slide"'.$pageId.' '.$pageAttrs.'>';

        // Add page background
        if (! empty($page['props']['background'])) {
            $cpBG = '';
            $alt = 'Slide background';

            if (! empty($page['props']['backgroundId'])) {
                $cpBG = cp_get_attachment_image($page['props']['backgroundId'], 'full', false, array('class' => 'cp-bg'));
            } elseif ($page['props']['background'] == '[image-url]') {
                $src = $postContent->getWithFormat($page['props']['background']);

                if (is_object($postContent->post)) {
                    $cpBG = cp_get_attachment_image($postContent->post->ID, 'full', false, array('class' => 'cp-bg'));
                }
            } else {
                $src = $page['props']['background'];
            }

            if (! empty($cpBG)) {
                $cpMarkup[] = $cpBG;
            } elseif (! empty($src)) {
                $cpMarkup[] = '<img src="'.$src.'" class="cp-bg" alt="'.$alt.'" />';
            }
        }

        // Add page thumbnail
        if (!isset($pages['properties']['attrs']['thumbnailNavigation']) || $pages['properties']['attrs']['thumbnailNavigation'] != 'disabled') {
            if (!empty($page['props']['thumbnail'])) {
                $src = !empty($page['props']['thumbnailId']) ? cp_apply_filters('cp_get_image', $page['props']['thumbnailId'], $page['props']['thumbnail']) : $page['props']['thumbnail'];
                $cpMarkup[] = '<img src="'.$src.'" class="cp-tn" alt="Page thumbnail" />';
            } elseif (empty($page['props']['background'])) {
                $skin = isset($pages['properties']['attrs']['skin']) ? $pages['properties']['attrs']['skin'] : 'noskin';
                $src = _MODULE_DIR_."creativepopup/views/img/core/skins/$skin/nothumb.png";
                $cpMarkup[] = '<img src="'.$src.'" class="cp-tn" alt="Page thumbnail" />';
            }
        }

        // Add layers
        if (!empty($page['layers']) && is_array($page['layers'])) {
            foreach ($page['layers'] as $layerkey => $layer) {
                // Skip this page?
                if (!empty($layer['props']['skip'])) {
                    continue;
                }

                unset($layerAttributes);
                unset($innerAttributes);
                $layerAttributes = array('style' => '', 'class' => 'cp-l');
                $innerAttributes = array('style' => '', 'class' => '');

                if (empty($layer['props']['url'])) {
                    $innerAttributes =& $layerAttributes;
                }

                // Get layer type
                $layer['props']['media'] = !empty($layer['props']['media']) ? $layer['props']['media'] : '';
                if (!empty($layer['props']['media'])) {
                    switch ($layer['props']['media']) {
                        case 'img':
                            $layer['props']['type'] = 'img';
                            break;
                        case 'html':
                        case 'media':
                            $layer['props']['type'] = 'div';
                            break;
                        case 'post':
                            $layer['props']['type'] = 'div';
                            break;
                    }
                }

                // Post layer
                if (!empty($layer['props']['media']) && $layer['props']['media'] == 'post') {
                    $layer['props']['post_text_length'] = !empty($layer['props']['post_text_length']) ? $layer['props']['post_text_length'] : 0;
                    $layer['props']['html'] = $postContent->getWithFormat($layer['props']['html'], $layer['props']['post_text_length']);
                }

                // Skip image layer without src
                if ($layer['props']['type'] == 'img' && empty($layer['props']['image'])) {
                    continue;
                }

                // Create layer
                $first = Tools::substr($layer['props']['html'], 0, 1);
                $last = Tools::substr($layer['props']['html'], Tools::strlen($layer['props']['html'])-1, 1);

                // Image layer
                $layerIMG = false;
                if ($layer['props']['type'] == 'img') {
                    if (! empty($layer['props']['imageId'])) {
                        $layerIMG = cp_get_attachment_image((int)$layer['props']['imageId'], 'full', false, array('class' => 'cp-l'));
                    } elseif ($layer['props']['image'] == '[image-url]') {
                        if (is_object($postContent->post)) {
                            $layerIMG = cp_get_attachment_image($postContent->post->ID, 'full', false, array('class' => 'cp-l'));
                        } else {
                            $innerAttributes['src'] = $postContent->getWithFormat($layer['props']['image']);
                        }
                    } else {
                        $innerAttributes['src'] = $layer['props']['image'];

                        if (!empty($layer['props']['alt'])) {
                            $innerAttributes['alt'] = $layer['props']['alt'];
                        } else {
                            $innerAttributes['alt'] = '';
                        }
                    }
                }

                if ($layer['props']['media'] == 'post' && ($first == '<' && $last == '>')) {
                    $type = $layer['props']['html'];
                } else {
                    $type = ! empty($layerIMG) ? $layerIMG : '<'.$layer['props']['type'].'>';
                }

                if (! empty($layer['props']['url'])) {
                    $el = CpQuery::newDocumentHTML('<a>');
                    if ($layer['props']['url'] == '[url]') {
                        $layer['props']['url'] = $postContent->getWithFormat($layer['props']['url']);
                    }
                    $layerAttributes['href'] = $layer['props']['url'];
                    if (!empty($layer['props']['target'])) {
                        $layerAttributes['target'] =  $layer['props']['target'];
                    }

                    $inner = $el->append($type)->children();
                } else {
                    $el = $inner = CpQuery::newDocumentHTML($type);
                }

                // HTML attributes
                $layerAttributes['class'] = 'cp-l';
                if (!empty($layer['props']['id'])) {
                    $innerAttributes['id'] = $layer['props']['id'];
                }
                if (!empty($layer['props']['class'])) {
                    $innerAttributes['class'] .= ' '.$layer['props']['class'];
                }
                if (!empty($layer['props']['url'])) {
                    if (!empty($layer['props']['rel'])) {
                        $layerAttributes['rel'] = $layer['props']['rel'];
                    }
                    if (!empty($layer['props']['title'])) {
                        $layerAttributes['title'] = $layer['props']['title'];
                    }
                } else {
                    if (!empty($layer['props']['title'])) {
                        $innerAttributes['title'] = $layer['props']['title'];
                    }
                }

                if (isset($layer['attrs']) && isset($layer['props']['transition'])) {
                    $layerAttributes['data-cp'] = cp_array_to_attr($layer['attrs']);
                } elseif (isset($layer['attrs'])) {
                    $layerAttributes['style'] .= cp_array_to_attr($layer['attrs']);
                }

                if (!empty($layer['props']['style'])) {
                    if (Tools::substr($layer['props']['style'], -1) != ';') {
                        $layer['props']['style'] .= ';';
                    }
                    $innerAttributes['style'] .= preg_replace('/\s\s+/', ' ', $layer['props']['style']);
                }

                // remove default styles
                foreach ($layer['props']['styles'] as $k => &$v) {
                    if ($k == 'text-align' && $v == 'initial' ||
                        $k == 'font-weight' && $v == 400 ||
                        $k == 'font-style' && $v == 'normal' ||
                        $k == 'text-decoration' && $v == 'none' ||
                        $k == 'wordwrap' && !$v ||
                        $k == 'opacity' && $v == 1 ||
                        $k == 'mix-blend-mode' && $v == 'normal') {
                        unset($layer['props']['styles'][$k]);
                    }
                }

                if (! empty($layer['props']['wordwrap']) || ! empty($layer['props']['styles']['wordwrap'])) {
                    $innerAttributes['style'] .= 'white-space: normal;';
                }

                if (!empty($layer['props']['styles'])) {
                    $innerAttributes['style'] .= cp_array_to_attr($layer['props']['styles'], 'css');
                }

                // Text / HTML layer
                if ($layer['props']['media'] != 'post' || ($first != '<' && $last != '>')) {
                    $inner->html(cp_ss($layer['props']['html']));
                }

                // Rewrite Youtube/Vimeo iframe src to data-src
                $video = $inner->find('iframe[src*="youtube-nocookie.com"], iframe[src*="youtube.com"], iframe[src*="youtu.be"], iframe[src*="player.vimeo"]');
                if ($video->length) {
                    $video->attr('data-src', $video->attr('src'));
                    $video->removeAttr('src');
                }

                // Device dependent responsive classes
                if (! empty($layer['props']['hide_on_desktop'])) {
                    $layerAttributes['class'] .=  ' cp-hide-desktop';
                }

                if (! empty($layer['props']['hide_on_tablet'])) {
                    $layerAttributes['class'] .= ' cp-hide-tablet';
                }

                if (! empty($layer['props']['hide_on_phone'])) {
                    $layerAttributes['class'] .= ' cp-hide-phone';
                }

                $el->attr($layerAttributes);
                $inner->attr($innerAttributes);

                if (! empty($layer['props']['outerAttributes'])) {
                    foreach ($layer['props']['outerAttributes'] as $key => $val) {
                        if ($key === 'class') {
                            $el->addClass($val);
                        }
                        $el->attr($key, $val);
                    }
                }

                if (! empty($layer['props']['innerAttributes'])) {
                    foreach ($layer['props']['innerAttributes'] as $key => $val) {
                        if ($key === 'class') {
                            $inner->addClass($val);
                        }
                        $inner->attr($key, $val);
                    }
                }

                $cpMarkup[] = $el;
                CpQuery::unloadDocuments();
            }
        }

        // Link this page
        if (!empty($page['props']['linkUrl'])) {
            if (!empty($page['props']['linkTarget'])) {
                $target = ' target="'.$page['props']['linkTarget'].'"';
            } else {
                $target = '';
            }

            if ($page['props']['linkUrl'] == '[url]') {
                $page['props']['linkUrl'] = $postContent->getWithFormat($page['props']['linkUrl']);
            }

            $linkClass = 'cp-link';
            if (empty($page['props']['linkType']) || $page['props']['linkType'] === 'over') {
                $linkClass .= ' cp-link-on-top';
            }

            $cpMarkup[] = '<a href="'.$page['props']['linkUrl'].'"'.$target.' class="'.$linkClass.'"></a>';
        }

        // End of page
        $cpMarkup[] = '</div>';
    }
}

// End of popup container
$cpMarkup[] = '</form>';

// End of Popup wrapper
$cpMarkup[] = '</div>';

// After popup content hook
if (cp_has_action('cp_after_popup_content')) {
    cp_do_action('cp_after_popup_content');
}
