<?php
/**
* Creative Slider v6.6.5 - Responsive Slideshow Module https://creativeslider.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;
defined('LS_PHPQUERY') or define('LS_PHPQUERY', true);

class LsQuery
{
    private $dom;
    private $nodes;

    public function __construct($html = null)
    {
        if ($html) {
            $this->dom = new DOMDocument();
            $this->dom->encoding = 'utf-8';
            $this->dom->loadHTML(self::utf8Decode(
                preg_replace('~>\s+<~', '><', trim($html))
            ));
            $body = isset($this->dom->documentElement) ? $this->dom->documentElement->lastChild : $this->dom->getElementsByTagName('body')->item(0);
            $this->nodes = $body->childNodes;
        }
    }

    public function __get($prop)
    {
        if ('length' == $prop) {
            return $this->nodes ? $this->nodes->length : 0;
        }
    }

    public function children()
    {
        if ($this->length) {
            $item = $this->nodes->item(0);
            $length = $item->childNodes->length;
            foreach ($item->childNodes as $child) {
                if (get_class($child) == 'DOMText') {
                    $length = 0;
                    break;
                }
            }
            if ($length) {
                $doc = new self();
                $doc->dom = &$this->dom;
                $doc->nodes = &$item->childNodes;
                return $doc;
            }
        }
        return $this;
    }

    public function addClass($class)
    {
        $i = $this->length;
        while ($i--) {
            $node = $this->nodes->item($i);
            $classes = $node->getAttribute('class');
            $node->setAttribute('class', $classes ? "$classes $class" : $class);
        }
        return $this;
    }

    public function attr($attr, $value = null)
    {
        // getter
        if (is_string($attr) && $value === null) {
            return $this->length ? $this->nodes->item(0)->getAttribute($attr) : '';
        }
        // setter
        if (is_string($attr)) {
            $attr = array($attr => $value);
        }
        $i = $this->length;
        while ($i--) {
            $item = $this->nodes->item($i);
            foreach ($attr as $key => &$val) {
                if (!is_array($val)) {
                    $item->setAttribute($key, $val);
                }
            }
        }
        return $this;
    }

    public function removeAttr($attr)
    {
        $i = $this->length;
        while ($i--) {
            $this->nodes->item($i)->removeAttribute($attr);
        }
        return $this;
    }

    public function val($value = null)
    {
        return $this->attr('value', $value);
    }

    public function html($html)
    {
        $i = $this->length;
        while ($i--) {
            $this->nodes->item($i)->nodeValue = '';
        }
        return $this->append($html);
    }

    public function append($html)
    {
        $doc = new DOMDocument();
        $doc->encoding = 'utf-8';
        $doc->loadHTML(self::utf8Decode(
            '<div>'.preg_replace('~>\s+<~', '><', trim($html)).'</div>'
        ));
        $body = isset($doc->documentElement) ? $doc->documentElement->lastChild : $doc->getElementsByTagName('body')->item(0);
        $i = $this->length;
        while ($i--) {
            $item = $this->nodes->item($i);
            foreach ($body->firstChild->childNodes as $node) {
                $item->appendChild($this->dom->importNode($node, true));
            }
        }
        return $this;
    }

    public function find($rule)
    {
        $rule = '//' . preg_replace('/\s*,\s*/', ' | //', trim($rule));
        $rule = preg_replace('/\[(\w+)\*="([^"]*)"\]/', '[contains(@$1, "$2")]', $rule);

        $xpath = new DOMXPath($this->dom);
        $nodes = $this->nodes ? $xpath->query($rule, $this->nodes->item(0)) : null;

        $doc = new self();
        $doc->dom = &$this->dom;
        $doc->nodes = &$nodes;
        return $doc;
    }

    public function __toString()
    {
        preg_match('/<body>(.*)<\/body>/s', $this->dom->saveHTML(), $html);
        return isset($html[1]) ? $html[1] : '';
    }

    public static function utf8Decode($str)
    {
        if (function_exists('mb_convert_encoding')) {
            return mb_convert_encoding($str, 'HTML-ENTITIES', 'UTF-8');
        } else {
            return htmlspecialchars_decode(utf8_decode(htmlentities($str, ENT_COMPAT, 'utf-8', false)));
        }
    }

    public static function newDocument($html)
    {
        return new self($html);
    }

    public static function newDocumentHTML($html)
    {
        return new self($html);
    }

    public static function unloadDocuments()
    {
        // TODO
    }
}
