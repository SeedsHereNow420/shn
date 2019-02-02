<?php
/**
 * NOTICE OF LICENSE.
 *
 * This source file is subject to the following license: REGULAR LICENSE
 * that is bundled with this package in the file LICENSE.txt.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade to newer
 * versions in the future.
 *
 * @author    VaSibi
 * @copyright VaSibi
 * @license   REGULAR LICENSE
 */

class DealsoftheDayProTool
{
    public $context;

    public function __construct()
    {
        $this->context = Context::getContext();
    }

    public function createField($params)
    {
        if ($params) {
            $this->context->smarty->assign(
                array(
                  'params' => $params,
                  'languages' => Language::getLanguages(),
                'id_lang_default' => Configuration::get(
                    'PS_LANG_DEFAULT',
                    null,
                    (int) $this->context->shop->id_shop_group,
                    (int) $this->context->shop->id
                ),
                )
            );

            return $this->context->smarty->fetch(realpath(dirname(__FILE__)) . '/views/templates/admin/input.tpl');
        }
    }

    public static function gets($id_lang, $id_displaydealsofthedaypro_sliders, $id_shop)
    {
        //l.id_displaydealsofthedaypro_sliders, l.id_shop, l.status, l.sections,
        $sql = 'SELECT *
				FROM ' ._DB_PREFIX_.'displaydealsofthedaypro_sliders l
				LEFT JOIN ' ._DB_PREFIX_.'displaydealsofthedaypro_sliders_lang ll ON
        (l.id_displaydealsofthedaypro_sliders = ll.id_displaydealsofthedaypro_sliders
        AND ll.id_lang = '.(int) $id_lang.' AND ll.id_shop='.(int) $id_shop.')
				LEFT JOIN ' ._DB_PREFIX_.'shop s
        ON l.id_shop = s.id_shop
				WHERE 1 ' .((!is_null($id_displaydealsofthedaypro_sliders)) ? '
        AND l.id_displaydealsofthedaypro_sliders = "'.(int) $id_displaydealsofthedaypro_sliders.'"' : '').'
				AND l.id_shop IN (0, ' .(int) $id_shop.')';

        return Db::getInstance()->executeS($sql);
    }

    public static function getmultilangdata($field)
    {
        $sql = 'SELECT * FROM `' . _DB_PREFIX_ . 'displaydealsofthedaypro_sliders_lang`';
        $lang_data = Db::getInstance()->executeS($sql);
        $results = array();
        foreach ($lang_data as $item) {
            $results[$item['id_displaydealsofthedaypro_sliders']][$item['id_lang']] = $item[$field];
        }

        return $results;
    }

    public static function get($id_displaydealsofthedaypro_sliders, $id_lang, $id_shop)
    {
        return self::gets($id_lang, $id_displaydealsofthedaypro_sliders, $id_shop);
    }

    public static function getLinkLang($id_displaydealsofthedaypro_sliders, $id_shop)
    {
        $ret = Db::getInstance()->executeS(
            '
			SELECT *
			FROM ' ._DB_PREFIX_.'displaydealsofthedaypro_sliders l
			LEFT JOIN ' ._DB_PREFIX_.'displaydealsofthedaypro_sliders_lang ll ON
      (l.id_displaydealsofthedaypro_sliders = ll.id_displaydealsofthedaypro_sliders AND ll.id_shop='.(int) $id_shop.')
			WHERE 1
			' .((!is_null($id_displaydealsofthedaypro_sliders)) ? '
      AND l.id_displaydealsofthedaypro_sliders = "'.(int) $id_displaydealsofthedaypro_sliders.'"' : '').'
			AND l.id_shop IN (0, ' .(int) $id_shop.')
		'
        );

        $link = array();
        $label = array();
        $text = array();
        $new_window = false;
        $sort_order = '';
        $s_image = '';

        foreach ($ret as $line) {
            $link[ $line[ 'id_lang' ] ] = Tools::safeOutput($line[ 'link' ]);
            $label[ $line[ 'id_lang' ] ] = Tools::safeOutput($line[ 'label' ]);
            $text[ $line[ 'id_lang' ] ] = Tools::safeOutput($line[ 'text' ]);
            $new_window = (bool) $line[ 'new_window' ];
            $sort_order = (int) $line[ 'sort_order' ];
            $s_image = $line[ 's_image' ];
        }

        return array(
          'link' => $link,
          'label' => $label,
          'text' => $text,
          'new_window' => $new_window,
          'sort_order' => $sort_order,
          's_image' => $s_image,
        );
    }

    public static function add($status, $btnlink, $btntext, $maintext, $sections, $showcase, $homeonly, $date, $underslider, $hookposition, $maincolor, $color1, $color2, $color3, $color4, $color5, $color6, $color7, $color8, $description, $slideshow, $offslider, $rounded, $margin, $id_shop, $d_categories)
    {
        $id_lang = (int) Context::getContext()->language->id;
        if (!is_array($btntext) || !is_array($btnlink)) {
            return false;
        }

        Db::getInstance()->insert(
            'displaydealsofthedaypro_sliders',
            array(
            'status' => (int) $status,
            'sections' => pSQL($sections),
            'showcase' => pSQL($showcase),
            'homeonly' => (int) $homeonly,
            'date' => pSQL($date),
            'underslider' => (int) $underslider,
            'hookposition' => pSQL($hookposition),
            'maincolor' => pSQL($maincolor),
            'color1' => pSQL($color1),
            'color2' => pSQL($color2),
            'color3' => pSQL($color3),
            'color4' => pSQL($color4),
            'color5' => pSQL($color5),
            'color6' => pSQL($color6),
            'color7' => pSQL($color7),
            'color8' => pSQL($color8),
            'description' => (int) $description,
            'slideshow' => (int) $slideshow,
            'offslider' => (int) $offslider,
            'rounded' => (int) $rounded,
            'margin' => (int) $margin,
            'id_shop' => (int) $id_shop,
            'd_categories' => pSQL($d_categories),
            )
        );
        $id_displaydealsofthedaypro_sliders = Db::getInstance()->Insert_ID();

        $result = true;

        foreach ($btnlink as $id_lang => $label) {
            $result &= Db::getInstance()->insert(
                'displaydealsofthedaypro_sliders_lang',
                array(
                  'id_displaydealsofthedaypro_sliders' => (int) $id_displaydealsofthedaypro_sliders,
                  'id_lang' => (int) $id_lang,
                  'id_shop' => (int) $id_shop,
                  'btnlink' => pSQL($btnlink[ $id_lang ]),
                  'btntext' => pSQL($btntext[ $id_lang ]),
                  'maintext' => pSQL($maintext[ $id_lang ]),
                )
            );
        }

        return $result;
    }

    public static function remove($id_displaydealsofthedaypro_sliders, $id_shop)
    {
        $result = true;
        $result &= Db::getInstance()->delete('displaydealsofthedaypro_sliders', 'id_displaydealsofthedaypro_sliders = '.(int) $id_displaydealsofthedaypro_sliders.' AND id_shop = '.(int) $id_shop);
        $result &= Db::getInstance()->delete('displaydealsofthedaypro_sliders_lang', 'id_displaydealsofthedaypro_sliders = '.(int) $id_displaydealsofthedaypro_sliders);

        return $result;
    }


    public static function update($status, $btnlink, $btntext, $maintext, $sections, $showcase, $homeonly, $date, $underslider, $hookposition, $maincolor, $color1, $color2, $color3, $color4, $color5, $color6, $color7, $color8, $description, $slideshow, $offslider, $rounded, $margin, $id_shop, $id_slider, $d_categories)
    {
        $id_lang = (int) Context::getContext()->language->id;
        if (!is_array($btntext)) {
            return false;
        }
        if (!is_array($btnlink)) {
            return false;
        }

        Db::getInstance()->update(
            'displaydealsofthedaypro_sliders',
            array(
            'status' => (int) $status,
            'sections' => pSQL($sections),
            'showcase' => pSQL($showcase),
            'homeonly' => (int) $homeonly,
            'date' => pSQL($date),
            'underslider' => (int) $underslider,
            'hookposition' => pSQL($hookposition),
            'maincolor' => pSQL($maincolor),
            'color1' => pSQL($color1),
            'color2' => pSQL($color2),
            'color3' => pSQL($color3),
            'color4' => pSQL($color4),
            'color5' => pSQL($color5),
            'color6' => pSQL($color6),
            'color7' => pSQL($color7),
            'color8' => pSQL($color8),
            'description' => (int) $description,
            'slideshow' => (int) $slideshow,
            'offslider' => (int) $offslider,
            'rounded' => (int) $rounded,
            'margin' => (int) $margin,
            'id_shop' => (int) $id_shop,
            'd_categories' => pSQL($d_categories),
            ),
            'id_displaydealsofthedaypro_sliders = '.(int) $id_slider
        );

        $languages = Language::getLanguages(false); //$this->context->controller->getLanguages();
        foreach ($languages as $id_lang => $val) {
            $id_lang = $val[ 'id_lang' ];
            $id_langsliderdata = Db::getInstance()->executeS('SELECT id_uniq FROM '._DB_PREFIX_.'displaydealsofthedaypro_sliders_lang WHERE id_lang="'.(int)$id_lang.'" AND id_displaydealsofthedaypro_sliders="'.(int) $id_slider.'"');
            // 1 check if exist then update
            if ($id_langsliderdata) {
                Db::getInstance()->update(
                    'displaydealsofthedaypro_sliders_lang',
                    array(
                    'id_displaydealsofthedaypro_sliders' => (int) $id_slider,
                    'id_lang' => (int) $id_lang,
                    'id_shop' => (int) $id_shop,
                    'btnlink' => pSQL($btnlink[ $id_lang ]),
                    'btntext' => pSQL($btntext[ $id_lang ]),
                    'maintext' => pSQL($maintext[ $id_lang ]),
                    ),
                    'id_displaydealsofthedaypro_sliders = '.(int) $id_slider.' AND id_lang = '.(int) $id_lang
                );
            } else {
                // 2 if not exsist then insert
                Db::getInstance()->insert(
                    'displaydealsofthedaypro_sliders_lang',
                    array(
                      'id_displaydealsofthedaypro_sliders' => (int) $id_slider,
                      'id_lang' => (int) $id_lang,
                      'id_shop' => (int) $id_shop,
                      'btnlink' => pSQL($btnlink[ $id_lang ]),
                      'btntext' => pSQL($btntext[ $id_lang ]),
                      'maintext' => pSQL($maintext[ $id_lang ]),
                    )
                );
            }
        }
        //return $result;
    }
}
