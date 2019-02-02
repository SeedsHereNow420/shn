<?php
/**
* 2010-2017 Webkul.
*
* NOTICE OF LICENSE
*
* All right is reserved,
* Please go through this link for complete license : https://store.webkul.com/license.html
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade this module to newer
* versions in the future. If you wish to customize this module for your
* needs please refer to https://store.webkul.com/customisation-guidelines/ for more information.
*
*  @author    Webkul IN <support@webkul.com>
*  @copyright 2010-2017 Webkul IN
*  @license   https://store.webkul.com/license.html
*/

class AdminNewsTickerController extends ModuleAdminController
{
    protected $position_identifier = 'id_news_ticker_to_move';
    public function __construct()
    {
        $this->context = Context::getContext();
        $this->table = 'wk_news_ticker';
        $this->className = 'NewsTicker';
        $this->bootstrap = true;
        $this->list_id = 'wk_news_ticker';
        $this->identifier = 'id_news_ticker';
        $this->list_no_link = true;
        $this->_defaultOrderBy = 'position';

        $this->_select = ' ntl.`id_lang`, ntl.`message`,  ntl.`anchor_link`';
        $this->_join .= 'LEFT JOIN `'._DB_PREFIX_.'wk_news_ticker_lang` ntl ON (ntl.`id_news_ticker` = a.`id_news_ticker`)';
        $this->_where .= ' AND ntl.`id_lang` = '.$this->context->language->id;
        parent::__construct();

        $this->fields_list = array(
            'id_news_ticker' => array(
                'title' => $this->l('ID'),
                'align' => 'center',
                'class' => 'fixed-width-xs',
            ),
            'message' => array(
                'title' => $this->l('Ticker Message'),
                'align' => 'center',
                'havingFilter' => true,
            ),
            'anchor_link' => array(
                'title' => $this->l('URL'),
                'align' => 'center',
                'havingFilter' => true,
            ),
            'color' => array(
                'type' => 'color',
                'title' => $this->l('Color'),
                'callback' => 'displayColorBox',
            ),
            'date_add' => array(
                'title' => $this->l('Date Add'),
                'align' => 'center',
                'type' => 'date',
            ),
            'active' => array(
                'title' => $this->l('Status'),
                'active' => 'status',
                'align' => 'text-center',
                'type' => 'bool',
                'class' => 'fixed-width-sm',
                'orderby' => false,
            ),
            'position' => array(
                'title' => $this->l('Position'),
                'filter_key' => 'a!position',
                'position' => 'position',
                'align' => 'center',
            ),
        );

        $this->bulk_actions = array(
            'delete' => array(
                'text' => $this->l('Delete selected'),
                'icon' => 'icon-trash',
                'confirm' => $this->l('Delete selected items?'),
            ),
        );
    }

    /**
     * displaying color box in list.
     *
     * @param text $col
     *
     * @return html
     */
    public function displayColorBox($col)
    {
        if ($col) {
            $this->context->smarty->assign('col', $col);

            return $this->module->display(_PS_MODULE_DIR_.'wknewsticker', 'colorbox.tpl');
        }
    }

    /**
     * renderList generate renderlist with edit and delete action.
     *
     * @return [type] [description]
     */
    public function renderList()
    {
        $this->addRowAction('edit');
        $this->addRowAction('view');
        $this->addRowAction('delete');

        return parent::renderList();
    }

    /**
     * initPageHeaderToolbar addtool bar in top of list.
     *
     * @return [type] [description]
     */
    public function initPageHeaderToolbar()
    {
        if (empty($this->display)) {
            $this->page_header_toolbar_btn['new_ticker'] = array(
                'href' => self::$currentIndex.'&add'.$this->table.'&token='.$this->token,
                'desc' => $this->l('Add new Ticker'),
                'icon' => 'process-icon-new',
            );
        }
        parent::initPageHeaderToolbar();
    }

    /**
     * Add js file to render form tpl.
     */
    public function setMedia()
    {
        $this->addJS(_MODULE_DIR_.$this->module->name.'/views/js/multiLang.js');
        $this->addJqueryPlugin('colorpicker');
        parent::setMedia();
    }

    /**
     * renderForm create render form by creating tpl file and assign
     * tpl variables.
     *
     * @return [type] [description]
     */
    public function renderForm()
    {
        $default_lang = Configuration::get('PS_LANG_DEFAULT');
        if ($this->display == 'edit') {
            $tickerId = Tools::getValue('id_news_ticker');
            $objNewsTicker = new NewsTicker();
            $tickerInfo = $objNewsTicker->getTickerDetailById($tickerId);
            $tickerLangInfo = $objNewsTicker->getTickerLangDetailById($tickerId);
            if ($tickerInfo) {
                foreach ($tickerLangInfo as $langInfo) {
                    $tickerInfo['message'][$langInfo['id_lang']] = $langInfo['message'];
                    $tickerInfo['url'][$langInfo['id_lang']] = $langInfo['anchor_link'];
                }
            }
            if (!$tickerInfo['color']) {
                $tickerInfo['color'] = Configuration::get('WK_NT_FONT_COLOR');
            }
            $this->context->smarty->assign('ticker', $tickerInfo);
        }
        $this->context->smarty->assign(
            array(
                'configColor' => Configuration::get('WK_NT_FONT_COLOR'),
                'default_lang' => $default_lang,
                'lang_id' => $this->context->language->id,
                'iso' => $this->context->language->iso_code,
                'total_languages' => Language::countActiveLanguages(),
                'default_lang_isocode' => Language::getIsoById($default_lang),
            )
        );
        $this->fields_form = array(
            'submit' => array(
                'title' => $this->l('Save'),
            ),
        );

        return parent::renderForm();
    }

    /**
     * Create a detailed view of ticker message in multilanguages.
     *
     * @return array
     */
    public function renderView()
    {
        if (Tools::getValue('id_news_ticker')) {
            unset($this->_select);
            unset($this->_where);
            unset($this->bulk_actions);

            $this->page_header_toolbar_title = $this->l('Ticker Message');
            $this->_select = 'ntl.`id_lang`, ntl.`message`, ntl.`anchor_link`';
            $this->_where = ' And ntl.`id_news_ticker` = '.Tools::getValue('id_news_ticker');
            $this->fields_list = array(
                'id_news_ticker' => array(
                    'title' => $this->l('ID'),
                    'align' => 'center',
                    'class' => 'fixed-width-xs',
                    'search' => false,
                ),
                'id_lang' => array(
                    'title' => $this->l('Lang ID'),
                    'align' => 'center',
                    'search' => false,
                ),
                'message' => array(
                    'title' => $this->l('Ticker Message'),
                    'align' => 'center',
                    'search' => false,
                ),
                'anchor_link' => array(
                    'title' => $this->l('URL'),
                    'align' => 'center',
                    'search' => false,
                ),
            );

            return parent::renderList();
        }
    }

    /**
     * processSave save the details of ticker by validating it also.
     *
     * @return [type] [description]
     */
    public function processSave()
    {
        $idNewsTicker = Tools::getValue('id_news_ticker');
        $psDefaultLang = Configuration::get('PS_LANG_DEFAULT');
        $message = Tools::getValue('wk_message_'.$psDefaultLang);
        $langName = new Language($psDefaultLang);
        if (!$message) {
            $this->errors[] = $this->l('Message is required in default lang '.$langName->name);
        }
        foreach (Language::getLanguages(true) as $language) {
            if (Tools::getValue('wk_url_'.$language['id_lang'])) {
                $urlLink = Tools::getValue('wk_url_'.$language['id_lang']);
                if (filter_var($urlLink, FILTER_VALIDATE_URL) === false) {
                    $this->errors[] = $this->l('Invalid url');
                }
            }
        }
        if (empty($this->errors)) {
            //edit
            if ($idNewsTicker) {
                $objNewsTicker = new NewsTicker((int) $idNewsTicker);
                $objNewsTicker->active = Tools::getValue('wk_active');
                $configColor = Configuration::get('WK_NT_FONT_COLOR');
                if ($configColor !== Tools::getValue('wk_font_color')) {
                    $objNewsTicker->color = Tools::getValue('wk_font_color');
                }

                foreach (Language::getLanguages(true) as $language) {
                    $msgLangId = $language['id_lang'];

                    if (!Tools::getValue('wk_message_'.$language['id_lang'])) {
                        $msgLangId = $psDefaultLang;
                    }

                    $objNewsTicker->message[$language['id_lang']] = Tools::getValue('wk_message_'.$msgLangId);
                    $objNewsTicker->anchor_link[$language['id_lang']] = Tools::getValue('wk_url_'.$language['id_lang']);
                }

                $objNewsTicker->save();
            } else {
                //save
                $objNewsTicker = new NewsTicker();
                if ($objNewsTicker->position <= 0) {
                    $objNewsTicker->position = $objNewsTicker->getHigherPosition();
                }
                $objNewsTicker->active = Tools::getValue('wk_active');
                $configColor = Configuration::get('WK_NT_FONT_COLOR');
                if ($configColor !== Tools::getValue('wk_font_color')) {
                    $objNewsTicker->color = Tools::getValue('wk_font_color');
                }

                foreach (Language::getLanguages(true) as $language) {
                    $msgLangId = $language['id_lang'];

                    if (!Tools::getValue('wk_message_'.$language['id_lang'])) {
                        $msgLangId = $psDefaultLang;
                    }

                    $objNewsTicker->message[$language['id_lang']] = Tools::getValue('wk_message_'.$msgLangId);
                    if (Tools::getValue('wk_url_'.$language['id_lang'])) {
                        $objNewsTicker->anchor_link[$language['id_lang']] = Tools::getValue('wk_url_'.$language['id_lang']);
                    }
                }

                $objNewsTicker->save();
            }
            $insertedId = $objNewsTicker->id;

            if (Tools::isSubmit('submitAdd'.$this->table.'AndStay')) {
                if ($idNewsTicker) {
                    Tools::redirectAdmin(self::$currentIndex.'&id_news_ticker='.(int) $insertedId.'&update'.$this->table.'&conf=4&token='.$this->token);
                } else {
                    Tools::redirectAdmin(self::$currentIndex.'&id_news_ticker='.(int) $insertedId.'&update'.$this->table.'&conf=3&token='.$this->token);
                }
            } else {
                if ($idNewsTicker) {
                    Tools::redirectAdmin(self::$currentIndex.'&conf=4&token='.$this->token);
                } else {
                    Tools::redirectAdmin(self::$currentIndex.'&conf=3&token='.$this->token);
                }
            }
        } elseif ($idNewsTicker) {
            $this->display = 'edit';
        } else {
            $this->display = 'add';
        }
    }

    /**
     * on change the row update the news ticker position.
     *
     * @return [type] [description]
     */
    public function ajaxProcessUpdatePositions()
    {
        $way = (int) Tools::getValue('way');
        $idNewsTicker = (int) Tools::getValue('id');
        $positions = Tools::getValue('news_ticker');

        foreach ($positions as $position => $value) {
            $pos = explode('_', $value);

            if (isset($pos[2]) && (int) $pos[2] === $idNewsTicker) {
                if ($newsTicker = new NewsTicker((int) $pos[2])) {
                    if (isset($position) && $newsTicker->updatePosition($way, $position, $idNewsTicker)) {
                        echo 'ok position '.(int) $position.' for newsTicker '.(int) $pos[1].'\r\n';
                    } else {
                        echo '{"hasError" : true, "errors" : "Can not update newsTicker '.(int) $idNewsTicker.' to position '.(int) $position.' "}';
                    }
                } else {
                    echo '{"hasError" : true, "errors" : "This newsTicker ('.(int) $idNewsTicker.') can t be loaded"}';
                }

                break;
            }
        }
    }
}
