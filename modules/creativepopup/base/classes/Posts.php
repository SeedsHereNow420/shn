<?php
/**
* Creative Popup v1.6.4 - https://creativepopup.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

class CpPosts
{

    // Stores the last query results
    public $post = null;
    public $posts = null;

    /**
     * Returns posts that matches the query params
     * @param  array      $args Array of CP_Query attributes
     * @return bool           Success of the query
     */
    public static function find($args = array())
    {

        // Crate new instance
        $instance = new self;
        if ($instance->posts = cp_get_posts($args)) {
            $instance->post = $instance->posts[0];
        }
        return $instance;
    }

    public static function getPostTypes()
    {

        // Get post types
        $postTypes = cp_get_post_types();

        // Remove some defalt post types
        if (isset($postTypes['revision'])) {
            unset($postTypes['revision']);
        }
        if (isset($postTypes['nav_menu_item'])) {
            unset($postTypes['nav_menu_item']);
        }

        // Convert names to plural
        foreach ($postTypes as $key => $item) {
            if (!empty($item)) {
                $postTypes[$key] = array();
                $postTypes[$key]['slug'] = $item;
                $postTypes[$key]['obj'] = cp_get_post_type_object($item);
                $postTypes[$key]['name'] = $postTypes[$key]['obj']->labels->name;
            }
        }

        return $postTypes;
    }


    public function getParsedObject()
    {

        if (!$this->posts) {
            return array();
        }
        $context = Context::getContext();
        $ret = array();
        foreach ($this->posts as $key => $val) {
            // $this->post = $val;
            $ret[$key] = array();
            $ret[$key]['id'] = $val['id_product'];
            // $ret[$key]['url'] = __PS_BASE_URI__.'index.php?controller=product&id_product='.$val['id_product'];
            $ret[$key]['url'] = $context->link->getProductLink($val['id_product'], $val['link_rewrite']);
            $ret[$key]['date-published'] = $val['date_add'];
            $ret[$key]['date-modified'] = $val['date_upd'];
            // $ret[$key]['thumbnail'] = _PS_IMG_."p/{$val['id_product']}/{$val['id_product']}.jpg";
            $image = Image::getCover($val['id_product']);
            $ret[$key]['thumbnail'] = $context->link->getImageLink($val['link_rewrite'], $image['id_image']);
            // $ret[$key]['thumbnail'] = !empty($ret[$key]['thumbnail']) ? $ret[$key]['thumbnail'] : CP_VIEWS_URL . 'img/admin/blank.gif';
            $ret[$key]['image'] = '<img src="'.$ret[$key]['thumbnail'].'" alt="">';
            $ret[$key]['image-url'] = $ret[$key]['thumbnail'];
            $ret[$key]['price'] = Tools::displayPrice(Product::getPriceStatic($val['id_product']));
            $ret[$key]['name'] = $val['name'];
            $ret[$key]['title'] = $ret[$key]['name'].' '.$ret[$key]['price'];
            $ret[$key]['description'] = strip_tags($val['description']);
            $ret[$key]['description-short'] = strip_tags($val['description_short']);
            $ret[$key]['author'] = $val['manufacturer'];
            $ret[$key]['manufacturer'] = $val['manufacturer'];
            $catlinks = array();
            $cats = Product::getProductCategoriesFull($val['id_product'], $context->language->id);
            foreach ($cats as &$cat) {
                $catlinks[] = '<a href="'.$context->link->getCategoryLink($cat['id_category'], $cat['link_rewrite']).'">'.$cat['name'].'</a>';
            }
            $ret[$key]['breadcrumbs'] = '<div>'.implode(' / ', $catlinks).'</div>';
            $ret[$key]['category'] = array_pop($catlinks);

            // $taglinks = array();
            // $tags = Tag::getProductTags($val['id_product']);
            // foreach ($tags[$context->language->id] as $tag) {
            //     $taglinks[] = '['.$tag.']';
            // }
            // $ret[$key]['tags'] = implode(' ', $taglinks);
        }
        return $ret;
    }


    public function getWithFormat($str, $textlength = 0)
    {
        if (!is_array($this->post)) {
            return $str;
        }
        $context = Context::getContext();

        // Post ID
        if (stripos($str, '[id]') !== false) {
            $str = str_replace('[id]', $this->post['id_product'], $str);
        }
        // Post URL
        if (stripos($str, '[url]') !== false) {
            $url = $context->link->getProductLink($this->post['id_product'], $this->post['link_rewrite']);
            $str = str_replace('[url]', $url, $str);
        }
        // Date published
        if (stripos($str, '[date-published]') !== false) {
            $str = str_replace('[date-published]', date(cp_get_option('date_format'), strtotime($this->post['date_add'])), $str);
        }
        // Date modified
        if (stripos($str, '[date-modified]') !== false) {
            $str = str_replace('[date-modified]', date(cp_get_option('date_format'), strtotime($this->post['date_upd'])), $str);
        }
        // Featured image
        if (stripos($str, '[image]') !== false) {
            $cover = Image::getCover($this->post['id_product']);
            $image = $context->link->getImageLink($this->post['link_rewrite'], $cover['id_image']);
            if (!empty($image)) {
                $str = str_replace('[image]', '<img src="'.$image.'" alt="'.$this->post['name'].'">', $str);
            }
        }
        // Featured image URL
        if (stripos($str, '[image-url]') !== false) {
            $cover = Image::getCover($this->post['id_product']);
            $image = $context->link->getImageLink($this->post['link_rewrite'], $cover['id_image']);
            if (!empty($image)) {
                $str = str_replace('[image-url]', $image, $str);
            }
        }
        // Name
        if (stripos($str, '[name]') !== false) {
            $str = str_replace('[name]', $this->getTitle($textlength), $str);
        }
        // Price
        if (stripos($str, '[price]') !== false) {
            $price = Tools::displayPrice(Product::getPriceStatic($this->post['id_product']));
            $str = str_replace('[price]', $price, $str);
        }
        // Description
        if (stripos($str, '[description]') !== false) {
            $str = str_replace('[description]', $this->getDescription($textlength), $str);
        }
        // Description short
        if (stripos($str, '[description-short]') !== false) {
            $str = str_replace('[description-short]', $this->getDescriptionShort($textlength), $str);
        }
        // Manufacturer
        if (stripos($str, '[manufacturer]') !== false) {
            $str = str_replace('[manufacturer]', $this->post['manufacturer'], $str);
        }
        // Category
        if (stripos($str, '[category]') !== false) {
            $str = str_replace('[category]', $this->getCategory(), $str);
        }
        // Category list
        if (stripos($str, '[breadcrumbs]') !== false) {
            $str = str_replace('[breadcrumbs]', $this->getCategoryList(), $str);
        }
        // Tags list
        // if (stripos($str, '[tags]') !== false) {
        //     $str = str_replace('[tags]', $this->getTagList(), $str);
        // }

        return $str;
    }


    /**
     * Returns the lastly selected post's title
     * @return string The title of the post
     */
    public function getTitle($length = 0)
    {

        if (!is_array($this->post)) {
            return false;
        }

        $title = $this->post['name'];
        if (!empty($length)) {
            $title = Tools::substr($title, 0, $length);
        }

        return $title;
    }

    public function getCategory($post = null)
    {
        if (!empty($post)) {
            $post = $this->post;
        }

        $context = Context::getContext();
        $cats = Product::getProductCategoriesFull($this->post['id_product'], $context->language->id);
        if ($cats && count($cats)) {
            $cat = array_pop($cats);
            return '<a href="'.$context->link->getCategoryLink($cat['id_category'], $cat['link_rewrite']).'">'.$cat['name'].'</a>';
        } else {
            return '';
        }
    }

    public function getCategoryList($post = null)
    {

        if (!empty($post)) {
            $post = $this->post;
        }

        $context = Context::getContext();
        $cats = Product::getProductCategoriesFull($this->post['id_product'], $context->language->id);
        if ($cats && count($cats)) {
            $list = array();
            foreach ($cats as &$cat) {
                $list[] = '<a href="'.$context->link->getCategoryLink($cat['id_category'], $cat['link_rewrite']).'">'.$cat['name'].'</a>';
            }
            return '<div>'.implode(' / ', $list).'</div>';
        } else {
            return '';
        }
    }

/*
    public function getTagList($post = null)
    {

        if (!empty($post)) {
            $post = $this->post;
        }

        if (has_tag(false, $this->post->ID)) {
            $tags = cp_get_post_tags($this->post->ID);
            $list = array();
            foreach ($tags as $val) {
                $list[] = '<a href="/tag/'.$val->slug.'/">'.$val->name.'</a>';
            }
            return '<div>'.implode(', ', $list).'</div>';
        } else {
            return '';
        }
    }
*/

    /**
     * Returns a subset of the post's content,
     * or the first paragraph if isn't specified
     * @param  integer $length The subset's length
     * @return string          The content
     */
    public function getDescription($length = false)
    {

        if (!is_array($this->post)) {
            return false;
        }

        $content = $this->post['description'];
        if (!empty($length)) {
            return Tools::substr(strip_tags($content), 0, $length);
        }
        return strip_tags($content);
    }

    public function getDescriptionShort($length = false)
    {

        if (!is_array($this->post)) {
            return false;
        }

        $content = cp__($this->post['description_short']);
        if (!empty($length)) {
            return Tools::substr(strip_tags($content), 0, $length);
        }
        return strip_tags($content);
    }
}
