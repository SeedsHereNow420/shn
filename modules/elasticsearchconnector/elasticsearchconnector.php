<?php
/**
* 2017 PrestaWach
*
* @author    PrestaWach <info@prestawach.info>
* @copyright 2017 PrestaWach
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*/

if (!defined('_PS_VERSION_')) {
    exit;
}

class ElasticsearchConnector extends Module
{
    /**
     * Hold elasticsearch client instance
     *
     * @var Elasticsearch\Client $client
     */
    private $client = null;

    /**
     * Hold error message
     *
     * @var string $error_msg
     */
    private $error_msg = null;

    /**
     * Hold shop array
     *
     * @var mixed[] $shops
     */
    private $shops = array();

    /**
     * Hold language array
     *
     * @var mixed[] $languages
     */
    private $languages = array();

    public function __construct()
    {
        $this->name = 'elasticsearchconnector';
        $this->tab = 'search_filter';
        $this->version = '1.0.13';
        $this->author = 'PrestaWach';
        $this->need_instance = 0;
        $this->module_key = '3869192ccb875d912ff190dc2bc78911';
        $this->ps_versions_compliancy = array('min' => '1.6.0.4', 'max' => _PS_VERSION_);

        $this->bootstrap = true;
        parent::__construct();

        $this->displayName = $this->l('Elasticsearch Connector');
        $this->description = $this->l('Connector to make Prestashop use the powerfull Elasticsearch search engine.');

        // PS1.5 fix
        if (empty($this->local_path)) {
            $this->local_path = dirname(__FILE__).'/';
        }
    }

    public function install()
    {
        $psElasticsearchExact = 0;
        if (Configuration::get('PS_SEARCH_END') == 1 && Configuration::get('PS_SEARCH_START') == 0) {
            $psElasticsearchExact = 1;
        }

        if (!parent::install()
            // start general settings
            || !Configuration::updateValue('PS_ELASTICSEARCH_HOST1', 'http://localhost:9200')
            || !Configuration::updateValue('PS_ELASTICSEARCH_HOST2', '')
            || !Configuration::updateValue('PS_ELASTICSEARCH_HOST3', '')
            || !Configuration::updateValue('PS_ELASTICSEARCH_LOG', '0')
            || !Configuration::updateValue('PS_ELASTICSEARCH_LOG_PATH', $this->local_path.'log/log.txt')
            || !Configuration::updateValue('PS_ELASTICSEARCH_LOG_LEVEL', 'INFO')
            // end general settings

            // start index fields
            || !Configuration::updateValue('PS_ELASTICSEARCH_PNAME', 1)
            || !Configuration::updateValue('PS_ELASTICSEARCH_REF', 1)
            || !Configuration::updateValue('PS_ELASTICSEARCH_SHORTDESC', 1)
            || !Configuration::updateValue('PS_ELASTICSEARCH_DESC', 1)
            || !Configuration::updateValue('PS_ELASTICSEARCH_CNAME', 1)
            || !Configuration::updateValue('PS_ELASTICSEARCH_MNAME', 1)
            || !Configuration::updateValue('PS_ELASTICSEARCH_SNAME', 1)
            || !Configuration::updateValue('PS_ELASTICSEARCH_TAG', 1)
            || !Configuration::updateValue('PS_ELASTICSEARCH_ATTRIBUTE', 1)
            || !Configuration::updateValue('PS_ELASTICSEARCH_FEATURE', 1)
            || !Configuration::updateValue('PS_ELASTICSEARCH_EAN13', 1)
            // end index fields

            // start indexing settings
            || !Configuration::updateValue(
                'PS_ELASTICSEARCH_MINWORDLEN',
                (int)Configuration::get('PS_SEARCH_MINWORDLEN')
            )
            || !Configuration::updateValue('PS_ELASTICSEARCH_MAXWORDLEN', 255)
            || !Configuration::updateValue('PS_ELASTICSEARCH_EXACT', (int)$psElasticsearchExact)
            || !Configuration::updateValue('PS_ELASTICSEARCH_INDEXATION_STOP', 1)
            || !Configuration::updateValue('PS_ELASTICSEARCH_ADVANCED_INDEX_FLAG', 0)
            // end indexing settings

            // start search settings
            || !Configuration::updateValue('PS_ELASTICSEARCH_OPERATOR', 'AND')
            || !Configuration::updateValue('PS_ELASTICSEARCH_INTELIGENT_SEARCH', 1)
            || !Configuration::updateValue(
                'PS_ELASTICSEARCH_WEIGHT_PNAME',
                (int)Configuration::get('PS_SEARCH_WEIGHT_PNAME')
            )
            || !Configuration::updateValue(
                'PS_ELASTICSEARCH_WEIGHT_REF',
                (int)Configuration::get('PS_SEARCH_WEIGHT_REF')
            )
            || !Configuration::updateValue(
                'PS_ELASTICSEARCH_WEIGHT_SHORTDESC',
                (int)Configuration::get('PS_SEARCH_WEIGHT_SHORTDESC')
            )
            || !Configuration::updateValue(
                'PS_ELASTICSEARCH_WEIGHT_DESC',
                (int)Configuration::get('PS_SEARCH_WEIGHT_DESC')
            )
            || !Configuration::updateValue(
                'PS_ELASTICSEARCH_WEIGHT_CNAME',
                (int)Configuration::get('PS_SEARCH_WEIGHT_CNAME')
            )
            || !Configuration::updateValue(
                'PS_ELASTICSEARCH_WEIGHT_MNAME',
                (int)Configuration::get('PS_SEARCH_WEIGHT_MNAME')
            )
            || !Configuration::updateValue(
                'PS_ELASTICSEARCH_WEIGHT_SNAME',
                1
            )
            || !Configuration::updateValue(
                'PS_ELASTICSEARCH_WEIGHT_TAG',
                (int)Configuration::get('PS_SEARCH_WEIGHT_TAG')
            )
            || !Configuration::updateValue(
                'PS_ELASTICSEARCH_WEIGHT_ATTRIBUTE',
                (int)Configuration::get('PS_SEARCH_WEIGHT_ATTRIBUTE')
            )
            || !Configuration::updateValue(
                'PS_ELASTICSEARCH_WEIGHT_FEATURE',
                (int)Configuration::get('PS_SEARCH_WEIGHT_FEATURE')
            )
            || !Configuration::updateValue(
                'PS_ELASTICSEARCH_WEIGHT_EAN13',
                1
            )
            || !Configuration::updateValue('PS_ELASTICSEARCH_ADVANCED_SEARCH_FLAG', 0)
            // end search settings

            // start indexation progress settings
            || !Configuration::updateValue('PS_ELASTICSEARCH_INDEXATION_WORKING', 0)
            // end indexation progress settings

            // start first time flag
            || !Configuration::updateValue('PS_ELASTICSEARCH_FIRST_TIME', 1)
            // start first time flag

            || !$this->installBlacklistConfiguration()
            || !$this->installAdvancedIndexConfiguration()
            || !$this->installAdvancedSearchConfiguration()
        ) {
            return false;
        }

        return true;
    }

    /*
     * Take default PS search blacklist configuration
     * and use it as default value for elasticsearch configuration
     */
    private function installBlacklistConfiguration()
    {
        $valueBlacklist = array();

        $languages = Language::getLanguages(false);
        foreach ($languages as $language) {
            $valueBlacklist[$language['id_lang']] = Configuration::get('PS_SEARCH_BLACKLIST', $language['id_lang']);
        }

        if (!Configuration::updateValue('PS_ELASTICSEARCH_BLACKLIST', $valueBlacklist)) {
            return false;
        }

        return true;
    }

    private function installAdvancedIndexConfiguration()
    {
        $advancedIndex = array();

        $languages = Language::getLanguages(false);
        foreach ($languages as $language) {
            $advancedIndex[$language['id_lang']] = $this->buildIndexConfigurationByLang($language['id_lang']);
        }

        if (!Configuration::updateValue('PS_ELASTICSEARCH_ADVANCED_INDEX', $advancedIndex)) {
            return false;
        }

        return true;
    }

    /**
     * Function to build advanced index configuration from ui configurations
     */
    public function buildIndexConfiguration()
    {
        $configArr = array();

        $languages = Language::getLanguages(false);
        foreach ($languages as $language) {
            $configArr[$language['id_lang']] = $this->buildIndexConfigurationByLang($language['id_lang']);
        }

        return $configArr;
    }

    /**
     * Function to build advanced index configuration from ui configurations for one lang only
     *
     * @param $idLang
     * @return string
     */
    private function buildIndexConfigurationByLang($idLang)
    {
        $config = array(
            'settings' => array(
                'analysis' => array(
                    'analyzer' => array(
                        'default' => array(),
                    ),
                    'filter' => array(
                        'custom_length' => array(),
                    ),
                ),
            ),
        );

        $config['settings']['analysis']['analyzer']['default']['tokenizer'] = 'standard';
        $config['settings']['analysis']['analyzer']['default']['filter'] = array(
            'standard',
            'lowercase',
            'asciifolding',
            'custom_length',
        );

        if (Configuration::get('PS_ELASTICSEARCH_EXACT') == 0) {
            $config['settings']['analysis']['analyzer']['default']['filter'][] = 'custom_ngram';
            $config['settings']['analysis']['analyzer']['default']['filter'][] = 'custom_shingle';
        }

        $stopwords = Configuration::get('PS_ELASTICSEARCH_BLACKLIST', $idLang);
        if (!empty($stopwords)) {
            $config['settings']['analysis']['analyzer']['default']['stopwords'] = explode('|', $stopwords);
        }

        $config['settings']['analysis']['filter']['custom_length']['type'] = 'length';
        $config['settings']['analysis']['filter']['custom_length']['min'] =
            Configuration::get('PS_ELASTICSEARCH_MINWORDLEN');
        $config['settings']['analysis']['filter']['custom_length']['max'] =
            Configuration::get('PS_ELASTICSEARCH_MAXWORDLEN');

        if (Configuration::get('PS_ELASTICSEARCH_EXACT') == 0) {
            $config['settings']['analysis']['filter']['custom_ngram'] = array();
            $config['settings']['analysis']['filter']['custom_ngram']['type'] = 'nGram';
            $config['settings']['analysis']['filter']['custom_ngram']['min'] =
                Configuration::get('PS_ELASTICSEARCH_MINWORDLEN');
            $config['settings']['analysis']['filter']['custom_ngram']['max'] =
                Configuration::get('PS_ELASTICSEARCH_MAXWORDLEN');

            $config['settings']['analysis']['filter']['custom_shingle'] = array();
            $config['settings']['analysis']['filter']['custom_shingle']['type'] = 'shingle';
            $config['settings']['analysis']['filter']['custom_shingle']['min'] =
                Configuration::get('PS_ELASTICSEARCH_MINWORDLEN');
            $config['settings']['analysis']['filter']['custom_shingle']['max'] =
                Configuration::get('PS_ELASTICSEARCH_MAXWORDLEN');
        }

        //$configJson = Tools::jsonEncode($config, JSON_PRETTY_PRINT);
        $configJson = $this->jsonReadablEncode($config);

        return $configJson;
    }

    /**
     * @return bool
     */
    private function installAdvancedSearchConfiguration()
    {
        $advancedSearch = $this->buildSearchConfiguration();

        if (!Configuration::updateValue('PS_ELASTICSEARCH_ADVANCED_SEARCH', $advancedSearch)) {
            return false;
        }

        return true;
    }

    /**
     * Function to build advanced search configuration from ui configurations
     *
     * @return string
     */
    public function buildSearchConfiguration()
    {
        $operator = 'AND';
        if (Configuration::get('PS_ELASTICSEARCH_OPERATOR') == 'OR') {
            $operator = 'OR';
        }

        $config = array(
            '_source' => array(),
            'query' => array(
                'multi_match' => array(
                    'query' => '||SEARCH_QUERY||',
                    'fields' => $this->getSearchFields(), // used to increase score
                    'type' => 'most_fields',
                    'operator' => $operator,
                    'minimum_should_match' => '80%', // usefull in case on ngram indexation (to match inside words)
                )
            ),
            'from' => '0',
            'size' => '10000',
        );

        if (Configuration::get('PS_ELASTICSEARCH_INTELIGENT_SEARCH') == 1) {
            $config['query']['multi_match']['fuzziness'] = 'auto';
        }

        //$configJson = Tools::jsonEncode($config);
        $configJson = $this->jsonReadablEncode($config);

        return $configJson;
    }

    /**
     * @param $in
     * @param int $indent
     * @return string
     */
    private function jsonReadablEncode($in, $indent = 0)
    {
        $_escape = function ($str) {
            return preg_replace("!([\b\t\n\r\f\"\\'])!", "\\\\\\1", $str);
        };

        $out = '';

        foreach ($in as $key => $value) {
            $out .= str_repeat("\t", $indent + 1);
            $out .= "\"".$_escape((string)$key)."\": ";

            if (is_object($value) || is_array($value)) {
                $out .= "\n";
                $out .= $this->jsonReadablEncode($value, $indent + 1);
            } elseif (is_bool($value)) {
                $out .= $value ? 'true' : 'false';
            } elseif (is_null($value)) {
                $out .= 'null';
            } elseif (is_string($value)) {
                $out .= "\"" . $_escape($value) ."\"";
            } else {
                $out .= $value;
            }

            $out .= ",\n";
        }

        if (!empty($out)) {
            $out = Tools::substr($out, 0, -2);
        }

        $out = str_repeat("\t", $indent) . "{\n" . $out;
        $out .= "\n" . str_repeat("\t", $indent) . "}";

        return $out;
    }

    /**
     * Function to get search fields and boost as array
     *
     * @param bool $boost
     * @return string[] $fields
     */
    private function getSearchFields($boost = true)
    {
        $fields = array();

        if (Configuration::get('PS_ELASTICSEARCH_PNAME') == 1) {
            $fields[] = 'pname' . (
                ($boost) ?
                ('^' . Configuration::get('PS_ELASTICSEARCH_WEIGHT_PNAME')) :
                ('')
            );
        }
        if (Configuration::get('PS_ELASTICSEARCH_REF') == 1) {
            $fields[] = 'ref' . (
                ($boost) ?
                ('^' . Configuration::get('PS_ELASTICSEARCH_WEIGHT_REF')) :
                ('')
            );
        }
        if (Configuration::get('PS_ELASTICSEARCH_SHORTDESC') == 1) {
            $fields[] = 'shortdesc' . (
                ($boost) ?
                ('^' . Configuration::get('PS_ELASTICSEARCH_WEIGHT_SHORTDESC')) :
                ('')
            );
        }
        if (Configuration::get('PS_ELASTICSEARCH_DESC') == 1) {
            $fields[] = 'desc' . (
                ($boost) ?
                ('^' . Configuration::get('PS_ELASTICSEARCH_WEIGHT_DESC')) :
                ('')
            );
        }
        if (Configuration::get('PS_ELASTICSEARCH_CNAME') == 1) {
            $fields[] = 'cname' . (
                ($boost) ?
                ('^' . Configuration::get('PS_ELASTICSEARCH_WEIGHT_CNAME')) :
                ('')
            );
        }
        if (Configuration::get('PS_ELASTICSEARCH_MNAME') == 1) {
            $fields[] = 'mname' . (
                ($boost) ?
                ('^' . Configuration::get('PS_ELASTICSEARCH_WEIGHT_MNAME')) :
                ('')
            );
        }
        if (Configuration::get('PS_ELASTICSEARCH_SNAME') == 1) {
            $fields[] = 'sname' . (
                ($boost) ?
                ('^' . Configuration::get('PS_ELASTICSEARCH_WEIGHT_SNAME')) :
                ('')
            );
        }
        if (Configuration::get('PS_ELASTICSEARCH_TAG') == 1) {
            $fields[] = 'tag' . (
                ($boost) ?
                ('^' . Configuration::get('PS_ELASTICSEARCH_WEIGHT_TAG')) :
                ('')
            );
        }
        if (Configuration::get('PS_ELASTICSEARCH_ATTRIBUTE') == 1) {
            $fields[] = 'attribute' . (
                ($boost) ?
                ('^' . Configuration::get('PS_ELASTICSEARCH_WEIGHT_ATTRIBUTE')) :
                ('')
            );
        }
        if (Configuration::get('PS_ELASTICSEARCH_FEATURE') == 1) {
            $fields[] = 'feature' . (
                ($boost) ?
                ('^' . Configuration::get('PS_ELASTICSEARCH_WEIGHT_FEATURE')) :
                ('')
            );
        }
        if (Configuration::get('PS_ELASTICSEARCH_EAN13') == 1) {
            $fields[] = 'ean13' . (
                ($boost) ?
                ('^' . Configuration::get('PS_ELASTICSEARCH_WEIGHT_EAN13')) :
                ('')
            );
        }

        return $fields;
    }

    /**
     * @return bool
     */
    public function uninstall()
    {
        if (!parent::uninstall()
            // start general settings
            || !Configuration::deleteByName('PS_ELASTICSEARCH_HOST1')
            || !Configuration::deleteByName('PS_ELASTICSEARCH_HOST2')
            || !Configuration::deleteByName('PS_ELASTICSEARCH_HOST3')
            || !Configuration::deleteByName('PS_ELASTICSEARCH_LOG')
            || !Configuration::deleteByName('PS_ELASTICSEARCH_LOG_PATH')
            || !Configuration::deleteByName('PS_ELASTICSEARCH_LOG_LEVEL')
            // end general settings

            // start index fields
            || !Configuration::deleteByName('PS_ELASTICSEARCH_PNAME')
            || !Configuration::deleteByName('PS_ELASTICSEARCH_REF')
            || !Configuration::deleteByName('PS_ELASTICSEARCH_SHORTDESC')
            || !Configuration::deleteByName('PS_ELASTICSEARCH_DESC')
            || !Configuration::deleteByName('PS_ELASTICSEARCH_CNAME')
            || !Configuration::deleteByName('PS_ELASTICSEARCH_MNAME')
            || !Configuration::deleteByName('PS_ELASTICSEARCH_SNAME')
            || !Configuration::deleteByName('PS_ELASTICSEARCH_TAG')
            || !Configuration::deleteByName('PS_ELASTICSEARCH_ATTRIBUTE')
            || !Configuration::deleteByName('PS_ELASTICSEARCH_FEATURE')
            || !Configuration::deleteByName('PS_ELASTICSEARCH_EAN13')
            // end index fields

            // start indexing settings
            || !Configuration::deleteByName('PS_ELASTICSEARCH_MINWORDLEN')
            || !Configuration::deleteByName('PS_ELASTICSEARCH_MAXWORDLEN')
            || !Configuration::deleteByName('PS_ELASTICSEARCH_EXACT')
            || !Configuration::deleteByName('PS_ELASTICSEARCH_BLACKLIST')
            || !Configuration::deleteByName('PS_ELASTICSEARCH_INDEXATION_STOP')
            || !Configuration::deleteByName('PS_ELASTICSEARCH_ADVANCED_INDEX_FLAG')
            || !Configuration::deleteByName('PS_ELASTICSEARCH_ADVANCED_INDEX')
            // end indexing settings

            // start search settings
            || !Configuration::deleteByName('PS_ELASTICSEARCH_OPERATOR')
            || !Configuration::deleteByName('PS_ELASTICSEARCH_INTELIGENT_SEARCH')
            || !Configuration::deleteByName('PS_ELASTICSEARCH_WEIGHT_PNAME')
            || !Configuration::deleteByName('PS_ELASTICSEARCH_WEIGHT_REF')
            || !Configuration::deleteByName('PS_ELASTICSEARCH_WEIGHT_SHORTDESC')
            || !Configuration::deleteByName('PS_ELASTICSEARCH_WEIGHT_DESC')
            || !Configuration::deleteByName('PS_ELASTICSEARCH_WEIGHT_CNAME')
            || !Configuration::deleteByName('PS_ELASTICSEARCH_WEIGHT_MNAME')
            || !Configuration::deleteByName('PS_ELASTICSEARCH_WEIGHT_SNAME')
            || !Configuration::deleteByName('PS_ELASTICSEARCH_WEIGHT_TAG')
            || !Configuration::deleteByName('PS_ELASTICSEARCH_WEIGHT_ATTRIBUTE')
            || !Configuration::deleteByName('PS_ELASTICSEARCH_WEIGHT_FEATURE')
            || !Configuration::deleteByName('PS_ELASTICSEARCH_WEIGHT_EAN13')
            || !Configuration::deleteByName('PS_ELASTICSEARCH_ADVANCED_SEARCH_FLAG')
            || !Configuration::deleteByName('PS_ELASTICSEARCH_ADVANCED_SEARCH')
            // end search settings

            // start indexation progress settings
            || !Configuration::deleteByName('PS_ELASTICSEARCH_INDEXATION_WORKING')
            // end indexation progress settings

            // start first time flag
            || !Configuration::deleteByName('PS_ELASTICSEARCH_FIRST_TIME')
            // start first time flag
        ) {
            return false;
        }

        return true;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        $html = '';

        $this->context->controller->addJS($this->_path.'views/js/admin.js');

        if (Tools::isSubmit('submitElasticsearchConnector')) {
            // start general settings
            Configuration::updateValue(
                'PS_ELASTICSEARCH_HOST1',
                Tools::getValue('PS_ELASTICSEARCH_HOST1')
            );
            Configuration::updateValue(
                'PS_ELASTICSEARCH_HOST2',
                Tools::getValue('PS_ELASTICSEARCH_HOST2')
            );
            Configuration::updateValue(
                'PS_ELASTICSEARCH_HOST3',
                Tools::getValue('PS_ELASTICSEARCH_HOST3')
            );
            Configuration::updateValue(
                'PS_ELASTICSEARCH_LOG',
                (int)Tools::getValue('PS_ELASTICSEARCH_LOG')
            );
            Configuration::updateValue(
                'PS_ELASTICSEARCH_LOG_PATH',
                Tools::getValue('PS_ELASTICSEARCH_LOG_PATH')
            );
            Configuration::updateValue(
                'PS_ELASTICSEARCH_LOG_LEVEL',
                Tools::getValue('PS_ELASTICSEARCH_LOG_LEVEL')
            );
            // end general settings

            // start index fields
            Configuration::updateValue(
                'PS_ELASTICSEARCH_PNAME',
                (int)Tools::getValue('PS_ELASTICSEARCH_PNAME')
            );
            Configuration::updateValue(
                'PS_ELASTICSEARCH_REF',
                (int)Tools::getValue('PS_ELASTICSEARCH_REF')
            );
            Configuration::updateValue(
                'PS_ELASTICSEARCH_SHORTDESC',
                (int)Tools::getValue('PS_ELASTICSEARCH_SHORTDESC')
            );
            Configuration::updateValue(
                'PS_ELASTICSEARCH_DESC',
                (int)Tools::getValue('PS_ELASTICSEARCH_DESC')
            );
            Configuration::updateValue(
                'PS_ELASTICSEARCH_CNAME',
                (int)Tools::getValue('PS_ELASTICSEARCH_CNAME')
            );
            Configuration::updateValue(
                'PS_ELASTICSEARCH_MNAME',
                (int)Tools::getValue('PS_ELASTICSEARCH_MNAME')
            );
            Configuration::updateValue(
                'PS_ELASTICSEARCH_SNAME',
                (int)Tools::getValue('PS_ELASTICSEARCH_SNAME')
            );
            Configuration::updateValue(
                'PS_ELASTICSEARCH_TAG',
                (int)Tools::getValue('PS_ELASTICSEARCH_TAG')
            );
            Configuration::updateValue(
                'PS_ELASTICSEARCH_ATTRIBUTE',
                (int)Tools::getValue('PS_ELASTICSEARCH_ATTRIBUTE')
            );
            Configuration::updateValue(
                'PS_ELASTICSEARCH_FEATURE',
                (int)Tools::getValue('PS_ELASTICSEARCH_FEATURE')
            );
            Configuration::updateValue(
                'PS_ELASTICSEARCH_EAN13',
                (int)Tools::getValue('PS_ELASTICSEARCH_EAN13')
            );
            // end index fields

            // start indexing settings
            Configuration::updateValue(
                'PS_ELASTICSEARCH_MINWORDLEN',
                (int)Tools::getValue('PS_ELASTICSEARCH_MINWORDLEN')
            );
            Configuration::updateValue(
                'PS_ELASTICSEARCH_MAXWORDLEN',
                (int)Tools::getValue('PS_ELASTICSEARCH_MAXWORDLEN')
            );
            Configuration::updateValue(
                'PS_ELASTICSEARCH_EXACT',
                (int)Tools::getValue('PS_ELASTICSEARCH_EXACT')
            );

            $valueBlacklist = array();
            $languages = Language::getLanguages(false);
            foreach ($languages as $language) {
                if (Tools::getValue('PS_ELASTICSEARCH_BLACKLIST_'.$language['id_lang'], false) !== false) {
                    $valueBlacklist[$language['id_lang']] = Tools::getValue(
                        'PS_ELASTICSEARCH_BLACKLIST_'.$language['id_lang']
                    );
                }
            }
            Configuration::updateValue('PS_ELASTICSEARCH_BLACKLIST', $valueBlacklist);

            Configuration::updateValue(
                'PS_ELASTICSEARCH_INDEXATION_STOP',
                (int)Tools::getValue('PS_ELASTICSEARCH_INDEXATION_STOP')
            );

            Configuration::updateValue(
                'PS_ELASTICSEARCH_ADVANCED_INDEX_FLAG',
                (int)Tools::getValue('PS_ELASTICSEARCH_ADVANCED_INDEX_FLAG')
            );

            $valueAdvanced = array();
            if (Configuration::get('PS_ELASTICSEARCH_ADVANCED_INDEX_FLAG') == 1) {
                $languages = Language::getLanguages(false);
                foreach ($languages as $language) {
                    if (Tools::getValue('PS_ELASTICSEARCH_ADVANCED_INDEX_'.$language['id_lang'], false) !== false) {
                        $valueAdvanced[$language['id_lang']] = Tools::getValue(
                            'PS_ELASTICSEARCH_ADVANCED_INDEX_'.$language['id_lang']
                        );
                    }
                }
            } else {
                $valueAdvanced = $this->buildIndexConfiguration();
            }
            Configuration::updateValue('PS_ELASTICSEARCH_ADVANCED_INDEX', $valueAdvanced);
            // end indexing settings

            // start search settigs
            Configuration::updateValue(
                'PS_ELASTICSEARCH_OPERATOR',
                Tools::getValue('PS_ELASTICSEARCH_OPERATOR')
            );
            Configuration::updateValue(
                'PS_ELASTICSEARCH_INTELIGENT_SEARCH',
                Tools::getValue('PS_ELASTICSEARCH_INTELIGENT_SEARCH')
            );
            Configuration::updateValue(
                'PS_ELASTICSEARCH_WEIGHT_PNAME',
                (int)Tools::getValue('PS_ELASTICSEARCH_WEIGHT_PNAME')
            );
            Configuration::updateValue(
                'PS_ELASTICSEARCH_WEIGHT_REF',
                (int)Tools::getValue('PS_ELASTICSEARCH_WEIGHT_REF')
            );
            Configuration::updateValue(
                'PS_ELASTICSEARCH_WEIGHT_SHORTDESC',
                (int)Tools::getValue('PS_ELASTICSEARCH_WEIGHT_SHORTDESC')
            );
            Configuration::updateValue(
                'PS_ELASTICSEARCH_WEIGHT_DESC',
                (int)Tools::getValue('PS_ELASTICSEARCH_WEIGHT_DESC')
            );
            Configuration::updateValue(
                'PS_ELASTICSEARCH_WEIGHT_CNAME',
                (int)Tools::getValue('PS_ELASTICSEARCH_WEIGHT_CNAME')
            );
            Configuration::updateValue(
                'PS_ELASTICSEARCH_WEIGHT_MNAME',
                (int)Tools::getValue('PS_ELASTICSEARCH_WEIGHT_MNAME')
            );
            Configuration::updateValue(
                'PS_ELASTICSEARCH_WEIGHT_SNAME',
                (int)Tools::getValue('PS_ELASTICSEARCH_WEIGHT_SNAME')
            );
            Configuration::updateValue(
                'PS_ELASTICSEARCH_WEIGHT_TAG',
                (int)Tools::getValue('PS_ELASTICSEARCH_WEIGHT_TAG')
            );
            Configuration::updateValue(
                'PS_ELASTICSEARCH_WEIGHT_ATTRIBUTE',
                (int)Tools::getValue('PS_ELASTICSEARCH_WEIGHT_ATTRIBUTE')
            );
            Configuration::updateValue(
                'PS_ELASTICSEARCH_WEIGHT_FEATURE',
                (int)Tools::getValue('PS_ELASTICSEARCH_WEIGHT_FEATURE')
            );
            Configuration::updateValue(
                'PS_ELASTICSEARCH_WEIGHT_EAN13',
                (int)Tools::getValue('PS_ELASTICSEARCH_WEIGHT_EAN13')
            );
            Configuration::updateValue(
                'PS_ELASTICSEARCH_ADVANCED_SEARCH_FLAG',
                (int)Tools::getValue('PS_ELASTICSEARCH_ADVANCED_SEARCH_FLAG')
            );

            if (Configuration::get('PS_ELASTICSEARCH_ADVANCED_SEARCH_FLAG') == 1) {
                $valueAdvanced = Tools::getValue('PS_ELASTICSEARCH_ADVANCED_SEARCH');
            } else {
                $valueAdvanced = $this->buildSearchConfiguration();
            }
            Configuration::updateValue('PS_ELASTICSEARCH_ADVANCED_SEARCH', $valueAdvanced);
            // end search settings

            // start prestashop settings
            Configuration::updateValue(
                'PS_SEARCH_INDEXATION',
                (int)Tools::getValue('PS_SEARCH_INDEXATION')
            );
            // end prestashop settings

            $html .= $this->displayConfirmation($this->l('Settings updated'));
        } elseif (Tools::isSubmit('submitIndexGenerate')) {
            if ($this->regenerateIndex()) {
                Tools::redirectAdmin(
                    AdminController::$currentIndex.
                    '&configure='.$this->name.
                    '&token='.Tools::getAdminTokenLite('AdminModules').
                    '&submitIndexGenerateConfirmation'
                );
            } else {
                if (!is_null($this->error_msg)) {
                    $html .= $this->displayError($this->error_msg);
                }
            }
        } elseif (Tools::isSubmit('submitIndexGenerateConfirmation')) {
            $html .= $this->displayConfirmation($this->l('Index regenerated'));
        }

        /* Configuration form */
        $html .= $this->renderForm();

        return $html;
    }

    /**
     * @return mixed
     */
    public function renderForm()
    {
        $fields_form1 = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('General settings'),
                    'icon' => 'icon-cogs'
                ),
                'input' => array(
                    array(
                        'type' => 'text',
                        'label' => $this->l('Host 1:'),
                        'name' => 'PS_ELASTICSEARCH_HOST1',
                        'desc' => $this->l('Set the 1st elasticsearch node server (default: http://localhost:9200)'),
                        'required' => true,
                        'col' => '4',
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Host 2:'),
                        'name' => 'PS_ELASTICSEARCH_HOST2',
                        'desc' => $this->l('Set the 2nd elasticsearch node server of the cluster (default: empty)'),
                        'col' => '4',
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Host 3:'),
                        'name' => 'PS_ELASTICSEARCH_HOST3',
                        'desc' => $this->l('Set the 3rd elasticsearch node server of the cluster (default: empty)'),
                        'col' => '4',
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Logging:'),
                        'name' => 'PS_ELASTICSEARCH_LOG',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'PS_ELASTICSEARCH_LOG_on',
                                'value' => 1,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'PS_ELASTICSEARCH_LOG_off',
                                'value' => 0,
                                'label' => $this->l('Disabled')
                            ),
                        ),
                        'desc' => $this->l('Set logging system on or off'),
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Log file path:'),
                        'name' => 'PS_ELASTICSEARCH_LOG_PATH',
                        'desc' => sprintf(
                            $this->l('Set the path to the file used for elasticsearch logging (default: %s)'),
                            $this->local_path.'log/log.txt'
                        ),
                        'col' => '4',
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->l('Log level:'),
                        'name' => 'PS_ELASTICSEARCH_LOG_LEVEL',
                        'required' => false,
                        'default_value' => 'INFO',
                        'options' => array(
                            'query' => array(
                                array('name' => 'EMERGENCY'),
                                array('name' => 'ALERT'),
                                array('name' => 'CRITICAL'),
                                array('name' => 'ERROR'),
                                array('name' => 'WARNING'),
                                array('name' => 'NOTICE'),
                                array('name' => 'INFO'),
                                array('name' => 'DEBUG'),
                            ),
                            'id' => 'name',
                            'name' => 'name',
                        )
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                )
            ),
        );

        $fields_form2 = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Index Fields'),
                    'icon' => 'icon-cogs'
                ),
                'description' => $this->l('Please note that edit any of this group setting need to full index rebuild.'),
                'input' => array(
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Product name:'),
                        'name' => 'PS_ELASTICSEARCH_PNAME',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'PS_ELASTICSEARCH_PNAME_on',
                                'value' => 1,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'PS_ELASTICSEARCH_PNAME_off',
                                'value' => 0,
                                'label' => $this->l('Disabled')
                            ),
                        ),
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Product reference:'),
                        'name' => 'PS_ELASTICSEARCH_REF',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'PS_ELASTICSEARCH_REF_on',
                                'value' => 1,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'PS_ELASTICSEARCH_REF_off',
                                'value' => 0,
                                'label' => $this->l('Disabled')
                            ),
                        ),
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Product short description:'),
                        'name' => 'PS_ELASTICSEARCH_SHORTDESC',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'PS_ELASTICSEARCH_SHORTDESC_on',
                                'value' => 1,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'PS_ELASTICSEARCH_SHORTDESC_off',
                                'value' => 0,
                                'label' => $this->l('Disabled')
                            ),
                        ),
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Product description:'),
                        'name' => 'PS_ELASTICSEARCH_DESC',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'PS_ELASTICSEARCH_DESC_on',
                                'value' => 1,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'PS_ELASTICSEARCH_DESC_off',
                                'value' => 0,
                                'label' => $this->l('Disabled')
                            ),
                        ),
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Category name:'),
                        'name' => 'PS_ELASTICSEARCH_CNAME',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'PS_ELASTICSEARCH_CNAME_on',
                                'value' => 1,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'PS_ELASTICSEARCH_CNAME_off',
                                'value' => 0,
                                'label' => $this->l('Disabled')
                            ),
                        ),
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Manufacturer name:'),
                        'name' => 'PS_ELASTICSEARCH_MNAME',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'PS_ELASTICSEARCH_MNAME_on',
                                'value' => 1,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'PS_ELASTICSEARCH_MNAME_off',
                                'value' => 0,
                                'label' => $this->l('Disabled')
                            )
                        ),
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Supplier name:'),
                        'name' => 'PS_ELASTICSEARCH_SNAME',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'PS_ELASTICSEARCH_SNAME_on',
                                'value' => 1,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'PS_ELASTICSEARCH_SNAME_off',
                                'value' => 0,
                                'label' => $this->l('Disabled')
                            )
                        ),
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Tag:'),
                        'name' => 'PS_ELASTICSEARCH_TAG',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'PS_ELASTICSEARCH_TAG_on',
                                'value' => 1,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'PS_ELASTICSEARCH_TAG_off',
                                'value' => 0,
                                'label' => $this->l('Disabled')
                            )
                        ),
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Product attribute:'),
                        'name' => 'PS_ELASTICSEARCH_ATTRIBUTE',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'PS_ELASTICSEARCH_ATTRIBUTE_on',
                                'value' => 1,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'PS_ELASTICSEARCH_ATTRIBUTE_off',
                                'value' => 0,
                                'label' => $this->l('Disabled')
                            )
                        ),
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Product feature:'),
                        'name' => 'PS_ELASTICSEARCH_FEATURE',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'PS_ELASTICSEARCH_FEATURE_on',
                                'value' => 1,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'PS_ELASTICSEARCH_FEATURE_off',
                                'value' => 0,
                                'label' => $this->l('Disabled')
                            )
                        ),
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Product EAN13:'),
                        'name' => 'PS_ELASTICSEARCH_EAN13',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'PS_ELASTICSEARCH_EAN13_on',
                                'value' => 1,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'PS_ELASTICSEARCH_EAN13_off',
                                'value' => 0,
                                'label' => $this->l('Disabled')
                            )
                        ),
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                ),
            ),
        );

        $fields_form3 = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Index Settings'),
                    'icon' => 'icon-cogs'
                ),
                'description' => $this->l('Please note that edit any of this group setting need to full index rebuild.'),
                'input' => array(
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Advanced:'),
                        'name' => 'PS_ELASTICSEARCH_ADVANCED_INDEX_FLAG',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'PS_ELASTICSEARCH_ADVANCED_INDEX_FLAG_on',
                                'value' => 1,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'PS_ELASTICSEARCH_ADVANCED_INDEX_FLAG_off',
                                'value' => 0,
                                'label' => $this->l('Disabled')
                            )
                        ),
                    ),
                    array(
                        'type' => 'html',
                        'name' => 'index_setting_br',
                        'html_content' => '<br />',
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Minimum word length:'),
                        'name' => 'PS_ELASTICSEARCH_MINWORDLEN',
                        'desc' => $this->l('Only words this size or larger will be indexed. (default: 3)'),
                        'col' => '4',
                        'class' => 'advanced_index_off',
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Maximum word length:'),
                        'name' => 'PS_ELASTICSEARCH_MAXWORDLEN',
                        'desc' => $this->l('Only words this size or smaller will be indexed. (default: 255)'),
                        'col' => '4',
                        'class' => 'advanced_index_off',
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Search exact match:'),
                        'name' => 'PS_ELASTICSEARCH_EXACT',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'PS_ELASTICSEARCH_EXACT_on',
                                'value' => 1,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'PS_ELASTICSEARCH_EXACT_off',
                                'value' => 0,
                                'label' => $this->l('Disabled')
                            ),
                        ),
                        'desc' => $this->l('By default, if you search "book", you will have "book", "bookcase" and "bookend".').'<br/>'.
                        $this->l('With this option enabled, it only gives one result “book”, as exact end of the indexed word is matching.'),
                        'class' => 'advanced_index_off',
                    ),
                    array(
                        'type' => 'textarea',
                        'label' => $this->l('Blacklisted words:'),
                        'name' => 'PS_ELASTICSEARCH_BLACKLIST',
                        'lang' => true,
                        'desc' => $this->l('Please enter the index words separated by a "|".'),
                        'class' => 'advanced_index_off',
                    ),
                    array(
                        'type' => 'textarea',
                        'name' => 'PS_ELASTICSEARCH_ADVANCED_INDEX',
                        'lang' => true,
                        'class' => 'advanced_index_on',
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Disable ElasticSearch while indexing:'),
                        'name' => 'PS_ELASTICSEARCH_INDEXATION_STOP',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'PS_ELASTICSEARCH_INDEXATION_STOP_on',
                                'value' => 1,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'PS_ELASTICSEARCH_INDEXATION_STOP_off',
                                'value' => 0,
                                'label' => $this->l('Disabled')
                            ),
                        ),
                        'desc' => $this->l('Full indexation can take from few min to few hours depending on how many products Your shop has.').'<br/>'.
                            $this->l('To not block customers from searching while indexation working You can enable this option.').'<br/>'.
                            $this->l('Your shop will use default PrestaShop search engine and after indexation finish it will automaticly start using ElasticSearch engine.'),
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                ),
            ),
        );

        $fields_form4 = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Search Settings'),
                    'icon' => 'icon-cogs'
                ),
                'input' => array(
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Advanced:'),
                        'name' => 'PS_ELASTICSEARCH_ADVANCED_SEARCH_FLAG',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'PS_ELASTICSEARCH_ADVANCED_SEARCH_FLAG_on',
                                'value' => 1,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'PS_ELASTICSEARCH_ADVANCED_SEARCH_FLAG_off',
                                'value' => 0,
                                'label' => $this->l('Disabled')
                            )
                        ),
                    ),
                    array(
                        'type' => 'html',
                        'name' => 'search_setting_br1',
                        'html_content' => '<br />',
                    ),
                    array(
                        'type' => 'select',
                        'label' => $this->l('Search operator:'),
                        'name' => 'PS_ELASTICSEARCH_OPERATOR',
                        'required' => false,
                        'default_value' => 'AND',
                        'options' => array(
                            'query' => array(
                                array('name' => 'AND'),
                                array('name' => 'OR'),
                            ),
                            'id' => 'name',
                            'name' => 'name',
                        ),
                        'desc' => $this->l('By default (AND), if you search "dressed summer"').
                        $this->l(', you will have only products with word "dressed" and "summer" only.').'<br/>'.
                        $this->l('With this option set to OR, it only gives all products with word "dressed" or "summer".'),
                        'class' => 'advanced_search_off',
                    ),
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Inteligent search:'),
                        'name' => 'PS_ELASTICSEARCH_INTELIGENT_SEARCH',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'PS_ELASTICSEARCH_INTELIGENT_SEARCH_on',
                                'value' => 1,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'PS_ELASTICSEARCH_INTELIGENT_SEARCH_off',
                                'value' => 0,
                                'label' => $this->l('Disabled')
                            )
                        ),
                        'desc' => $this->l('Advanced elasticsearch feature that allow to search using typoes and mispelings correction').'<br/>'.
                        $this->l('More about this feature here: https://www.elastic.co/guide/en/elasticsearch/guide/current/fuzzy-matching.html'),
                        'class' => 'advanced_search_off',
                    ),
                    array(
                        'type' => 'html',
                        'name' => 'search_setting_br2',
                        'html_content' => '<br class="advanced_search_off" />',
                        'class' => 'advanced_search_off',
                    ),
                    array(
                        'type' => 'text',
                        'name' => 'PS_ELASTICSEARCH_WEIGHT_PNAME',
                        'label' => $this->l('Product name weight:'),
                        'validation' => 'isUnsignedInt',
                        'cast' => 'intval',
                        'col' => '4',
                        'class' => 'advanced_search_off',
                    ),
                    array(
                        'type' => 'text',
                        'name' => 'PS_ELASTICSEARCH_WEIGHT_REF',
                        'label' => $this->l('Product reference weight:'),
                        'validation' => 'isUnsignedInt',
                        'cast' => 'intval',
                        'col' => '4',
                        'class' => 'advanced_search_off',
                    ),
                    array(
                        'type' => 'text',
                        'name' => 'PS_ELASTICSEARCH_WEIGHT_SHORTDESC',
                        'label' => $this->l('Product short description weight:'),
                        'validation' => 'isUnsignedInt',
                        'cast' => 'intval',
                        'col' => '4',
                        'class' => 'advanced_search_off',
                    ),
                    array(
                        'type' => 'text',
                        'name' => 'PS_ELASTICSEARCH_WEIGHT_DESC',
                        'label' => $this->l('Product description weight:'),
                        'validation' => 'isUnsignedInt',
                        'cast' => 'intval',
                        'col' => '4',
                        'class' => 'advanced_search_off',
                    ),
                    array(
                        'type' => 'text',
                        'name' => 'PS_ELASTICSEARCH_WEIGHT_CNAME',
                        'label' => $this->l('Category name weight:'),
                        'validation' => 'isUnsignedInt',
                        'cast' => 'intval',
                        'col' => '4',
                        'class' => 'advanced_search_off',
                    ),
                    array(
                        'type' => 'text',
                        'name' => 'PS_ELASTICSEARCH_WEIGHT_MNAME',
                        'label' => $this->l('Manufacturer name weight:'),
                        'validation' => 'isUnsignedInt',
                        'cast' => 'intval',
                        'col' => '4',
                        'class' => 'advanced_search_off',
                    ),
                    array(
                        'type' => 'text',
                        'name' => 'PS_ELASTICSEARCH_WEIGHT_SNAME',
                        'label' => $this->l('Supplier name weight:'),
                        'validation' => 'isUnsignedInt',
                        'cast' => 'intval',
                        'col' => '4',
                        'class' => 'advanced_search_off',
                    ),
                    array(
                        'type' => 'text',
                        'name' => 'PS_ELASTICSEARCH_WEIGHT_TAG',
                        'label' => $this->l('Tag weight:'),
                        'validation' => 'isUnsignedInt',
                        'cast' => 'intval',
                        'col' => '4',
                        'class' => 'advanced_search_off',
                    ),
                    array(
                        'type' => 'text',
                        'name' => 'PS_ELASTICSEARCH_WEIGHT_ATTRIBUTE',
                        'label' => $this->l('Product attribute weight:'),
                        'validation' => 'isUnsignedInt',
                        'cast' => 'intval',
                        'col' => '4',
                        'class' => 'advanced_search_off',
                    ),
                    array(
                        'type' => 'text',
                        'name' => 'PS_ELASTICSEARCH_WEIGHT_FEATURE',
                        'label' => $this->l('Product feature weight:'),
                        'validation' => 'isUnsignedInt',
                        'cast' => 'intval',
                        'col' => '4',
                        'class' => 'advanced_search_off',
                    ),
                    array(
                        'type' => 'text',
                        'name' => 'PS_ELASTICSEARCH_WEIGHT_EAN13',
                        'label' => $this->l('Product EAN13 weight:'),
                        'validation' => 'isUnsignedInt',
                        'cast' => 'intval',
                        'col' => '4',
                        'class' => 'advanced_search_off',
                    ),
                    array(
                        'type' => 'textarea',
                        'name' => 'PS_ELASTICSEARCH_ADVANCED_SEARCH',
                        'class' => 'advanced_search_on',
                        'desc' => $this->l('||SEARCH_QUERY|| is the constant string that is replaced by real search query on the search time.').'<br/>'.
                        $this->l('Available fild names that are enabled on index fields are: ') . implode(', ', $this->getSearchFields(false)),
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                )
            ),
        );

        // start get total number of products and indexed products
        $totalNbProducts = $this->getTotalNumberOfProducts();
        $indexedNbProducts = $this->getIndexedNumberOfProducts();

        $this->context->smarty->assign(array(
            'totalNbProducts' => $totalNbProducts,
            'indexedNbProducts' => $indexedNbProducts,
        ));
        // end get total number of products and indexed products

        // start get cron urls
        $cronUrl = Tools::getProtocol(Tools::usingSecureMode()) .
            $_SERVER['HTTP_HOST'] .
            _MODULE_DIR_ .
            'elasticsearchconnector/' .
            'cron.php?token=' .
            Tools::substr(Tools::encrypt('elasticsearchconnector'), 0, 10);

        $cronSearchFullUrl = Tools::getHttpHost(true, true) .
            __PS_BASE_URI__ .
            basename(_PS_ADMIN_DIR_).
            '/searchcron.php?full=1&token=' .
            Tools::substr(_COOKIE_KEY_, 34, 8);

        $cronSearchMissingUrl = Tools::getHttpHost(true, true) .
            __PS_BASE_URI__ .
            basename(_PS_ADMIN_DIR_).
            '/searchcron.php?full=0&token=' .
            Tools::substr(_COOKIE_KEY_, 34, 8);

        $this->context->smarty->assign(array(
            'cronUrl' => $cronUrl,
            'cronSearchFullUrl' => $cronSearchFullUrl,
            'cronSearchMissingUrl' => $cronSearchMissingUrl,
        ));
        // end get cron urls

        // start get first time flag
        $this->context->smarty->assign(
            'escFirstTime',
            (int)Configuration::get('PS_ELASTICSEARCH_FIRST_TIME')
        );
        // end get first time flag

        $description = $this->context->smarty->fetch($this->local_path.'views/templates/admin/configure.tpl');

        $fields_form5 = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Indexing'),
                    'icon' => 'icon-cogs'
                ),

                'description' => $description,

                'input' => array(
                    array(
                        'type' => 'switch',
                        'label' => $this->l('Indexing:'),
                        'name' => 'PS_SEARCH_INDEXATION',
                        'is_bool' => true,
                        'values' => array(
                            array(
                                'id' => 'PS_SEARCH_INDEXATION_on',
                                'value' => 1,
                                'label' => $this->l('Enabled')
                            ),
                            array(
                                'id' => 'PS_SEARCH_INDEXATION_off',
                                'value' => 0,
                                'label' => $this->l('Disabled')
                            )
                        ),
                        'desc' => $this->l('Enable the automatic indexing of products.') . '<br />' .
                            $this->l('If you enable this feature, the products will be indexed in the search automatically when they are saved.') . '<br />' .
                            $this->l('If the feature is disabled, you will have to index products manually by using the links provided in the field set.'),
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                )
            ),
        );

        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
        $helper->default_form_language = $lang->id;
        $helper->allow_employee_form_lang = (
            Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ?
            Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') :
            0
        );
        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitElasticsearchConnector';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).
            '&configure='.$this->name.
            '&tab_module='.$this->tab.
            '&module_name='.$this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->tpl_vars = array(
                'fields_value' => $this->getConfigFieldsValues(),
                'languages' => $this->context->controller->getLanguages(),
                'id_language' => $this->context->language->id
        );

        return $helper->generateForm(array($fields_form1, $fields_form2, $fields_form3, $fields_form4, $fields_form5));
    }

    /**
     * @return array
     */
    public function getConfigFieldsValues()
    {
        $field_values = array(
            // start general settings
            'PS_ELASTICSEARCH_HOST1' => Tools::getValue(
                'PS_ELASTICSEARCH_HOST1',
                Configuration::get('PS_ELASTICSEARCH_HOST1')
            ),
            'PS_ELASTICSEARCH_HOST2' => Tools::getValue(
                'PS_ELASTICSEARCH_HOST2',
                Configuration::get('PS_ELASTICSEARCH_HOST2')
            ),
            'PS_ELASTICSEARCH_HOST3' => Tools::getValue(
                'PS_ELASTICSEARCH_HOST3',
                Configuration::get('PS_ELASTICSEARCH_HOST3')
            ),
            'PS_ELASTICSEARCH_LOG' => Tools::getValue(
                'PS_ELASTICSEARCH_LOG',
                Configuration::get('PS_ELASTICSEARCH_LOG')
            ),
            'PS_ELASTICSEARCH_LOG_PATH' => Tools::getValue(
                'PS_ELASTICSEARCH_LOG_PATH',
                Configuration::get('PS_ELASTICSEARCH_LOG_PATH')
            ),
            'PS_ELASTICSEARCH_LOG_LEVEL' => Tools::getValue(
                'PS_ELASTICSEARCH_LOG_LEVEL',
                Configuration::get('PS_ELASTICSEARCH_LOG_LEVEL')
            ),
            // end general settings

            // start index fields
            'PS_ELASTICSEARCH_PNAME' => Tools::getValue(
                'PS_ELASTICSEARCH_PNAME',
                Configuration::get('PS_ELASTICSEARCH_PNAME')
            ),
            'PS_ELASTICSEARCH_REF' => Tools::getValue(
                'PS_ELASTICSEARCH_REF',
                Configuration::get('PS_ELASTICSEARCH_REF')
            ),
            'PS_ELASTICSEARCH_SHORTDESC' => Tools::getValue(
                'PS_ELASTICSEARCH_SHORTDESC',
                Configuration::get('PS_ELASTICSEARCH_SHORTDESC')
            ),
            'PS_ELASTICSEARCH_DESC' => Tools::getValue(
                'PS_ELASTICSEARCH_DESC',
                Configuration::get('PS_ELASTICSEARCH_DESC')
            ),
            'PS_ELASTICSEARCH_CNAME' => Tools::getValue(
                'PS_ELASTICSEARCH_CNAME',
                Configuration::get('PS_ELASTICSEARCH_CNAME')
            ),
            'PS_ELASTICSEARCH_MNAME' => Tools::getValue(
                'PS_ELASTICSEARCH_MNAME',
                Configuration::get('PS_ELASTICSEARCH_MNAME')
            ),
            'PS_ELASTICSEARCH_SNAME' => Tools::getValue(
                'PS_ELASTICSEARCH_SNAME',
                Configuration::get('PS_ELASTICSEARCH_SNAME')
            ),
            'PS_ELASTICSEARCH_TAG' => Tools::getValue(
                'PS_ELASTICSEARCH_TAG',
                Configuration::get('PS_ELASTICSEARCH_TAG')
            ),
            'PS_ELASTICSEARCH_ATTRIBUTE' => Tools::getValue(
                'PS_ELASTICSEARCH_ATTRIBUTE',
                Configuration::get('PS_ELASTICSEARCH_ATTRIBUTE')
            ),
            'PS_ELASTICSEARCH_FEATURE' => Tools::getValue(
                'PS_ELASTICSEARCH_FEATURE',
                Configuration::get('PS_ELASTICSEARCH_FEATURE')
            ),
            'PS_ELASTICSEARCH_EAN13' => Tools::getValue(
                'PS_ELASTICSEARCH_EAN13',
                Configuration::get('PS_ELASTICSEARCH_EAN13')
            ),
            // end index fields

            // start indexing settings
            'PS_ELASTICSEARCH_MINWORDLEN' => Tools::getValue(
                'PS_ELASTICSEARCH_MINWORDLEN',
                Configuration::get('PS_ELASTICSEARCH_MINWORDLEN')
            ),
            'PS_ELASTICSEARCH_MAXWORDLEN' => Tools::getValue(
                'PS_ELASTICSEARCH_MAXWORDLEN',
                Configuration::get('PS_ELASTICSEARCH_MAXWORDLEN')
            ),
            'PS_ELASTICSEARCH_EXACT' => Tools::getValue(
                'PS_ELASTICSEARCH_EXACT',
                Configuration::get('PS_ELASTICSEARCH_EXACT')
            ),
            'PS_ELASTICSEARCH_INDEXATION_STOP' => Tools::getValue(
                'PS_ELASTICSEARCH_INDEXATION_STOP',
                Configuration::get('PS_ELASTICSEARCH_INDEXATION_STOP')
            ),
            'PS_ELASTICSEARCH_ADVANCED_INDEX_FLAG' => Tools::getValue(
                'PS_ELASTICSEARCH_ADVANCED_INDEX_FLAG',
                Configuration::get('PS_ELASTICSEARCH_ADVANCED_INDEX_FLAG')
            ),
            // end indexing settings

            // start search settings
            'PS_ELASTICSEARCH_OPERATOR' => Tools::getValue(
                'PS_ELASTICSEARCH_OPERATOR',
                Configuration::get('PS_ELASTICSEARCH_OPERATOR')
            ),
            'PS_ELASTICSEARCH_INTELIGENT_SEARCH' => Tools::getValue(
                'PS_ELASTICSEARCH_INTELIGENT_SEARCH',
                Configuration::get('PS_ELASTICSEARCH_INTELIGENT_SEARCH')
            ),
            'PS_ELASTICSEARCH_WEIGHT_PNAME' => Tools::getValue(
                'PS_ELASTICSEARCH_WEIGHT_PNAME',
                Configuration::get('PS_ELASTICSEARCH_WEIGHT_PNAME')
            ),
            'PS_ELASTICSEARCH_WEIGHT_REF' => Tools::getValue(
                'PS_ELASTICSEARCH_WEIGHT_REF',
                Configuration::get('PS_ELASTICSEARCH_WEIGHT_REF')
            ),
            'PS_ELASTICSEARCH_WEIGHT_SHORTDESC' => Tools::getValue(
                'PS_ELASTICSEARCH_WEIGHT_SHORTDESC',
                Configuration::get('PS_ELASTICSEARCH_WEIGHT_SHORTDESC')
            ),
            'PS_ELASTICSEARCH_WEIGHT_DESC' => Tools::getValue(
                'PS_ELASTICSEARCH_WEIGHT_DESC',
                Configuration::get('PS_ELASTICSEARCH_WEIGHT_DESC')
            ),
            'PS_ELASTICSEARCH_WEIGHT_CNAME' => Tools::getValue(
                'PS_ELASTICSEARCH_WEIGHT_CNAME',
                Configuration::get('PS_ELASTICSEARCH_WEIGHT_CNAME')
            ),
            'PS_ELASTICSEARCH_WEIGHT_MNAME' => Tools::getValue(
                'PS_ELASTICSEARCH_WEIGHT_MNAME',
                Configuration::get('PS_ELASTICSEARCH_WEIGHT_MNAME')
            ),
            'PS_ELASTICSEARCH_WEIGHT_SNAME' => Tools::getValue(
                'PS_ELASTICSEARCH_WEIGHT_SNAME',
                Configuration::get('PS_ELASTICSEARCH_WEIGHT_SNAME')
            ),
            'PS_ELASTICSEARCH_WEIGHT_TAG' => Tools::getValue(
                'PS_ELASTICSEARCH_WEIGHT_TAG',
                Configuration::get('PS_ELASTICSEARCH_WEIGHT_TAG')
            ),
            'PS_ELASTICSEARCH_WEIGHT_ATTRIBUTE' => Tools::getValue(
                'PS_ELASTICSEARCH_WEIGHT_ATTRIBUTE',
                Configuration::get('PS_ELASTICSEARCH_WEIGHT_ATTRIBUTE')
            ),
            'PS_ELASTICSEARCH_WEIGHT_FEATURE' => Tools::getValue(
                'PS_ELASTICSEARCH_WEIGHT_FEATURE',
                Configuration::get('PS_ELASTICSEARCH_WEIGHT_FEATURE')
            ),
            'PS_ELASTICSEARCH_WEIGHT_EAN13' => Tools::getValue(
                'PS_ELASTICSEARCH_WEIGHT_EAN13',
                Configuration::get('PS_ELASTICSEARCH_WEIGHT_EAN13')
            ),
            'PS_ELASTICSEARCH_ADVANCED_SEARCH_FLAG' => Tools::getValue(
                'PS_ELASTICSEARCH_ADVANCED_SEARCH_FLAG',
                Configuration::get('PS_ELASTICSEARCH_ADVANCED_SEARCH_FLAG')
            ),
            'PS_ELASTICSEARCH_ADVANCED_SEARCH' => Configuration::get('PS_ELASTICSEARCH_ADVANCED_SEARCH'),
            // end search settings

            // start prestashop settings
            'PS_SEARCH_INDEXATION' => Configuration::get('PS_SEARCH_INDEXATION'),
            // end prestashop settings
        );

        $languages = Language::getLanguages(false);
        foreach ($languages as $language) {
            $field_values['PS_ELASTICSEARCH_BLACKLIST'][$language['id_lang']] = Tools::getValue(
                'PS_ELASTICSEARCH_BLACKLIST'.$language['id_lang'],
                Configuration::get('PS_ELASTICSEARCH_BLACKLIST', $language['id_lang'])
            );

            $field_values['PS_ELASTICSEARCH_ADVANCED_INDEX'][$language['id_lang']] =
                Configuration::get('PS_ELASTICSEARCH_ADVANCED_INDEX', $language['id_lang']);
        }

        return $field_values;
    }

    /**
     * @return bool
     */
    private function iniClient()
    {
        try {
            require_once dirname(__FILE__) . '/vendor/autoload.php';

            $hosts = array(Configuration::get('PS_ELASTICSEARCH_HOST1'));
            $host2 = Configuration::get('PS_ELASTICSEARCH_HOST2');
            if (!empty($host2)) {
                $hosts[] = $host2;
            }
            $host3 = Configuration::get('PS_ELASTICSEARCH_HOST3');
            if (!empty($host3)) {
                $hosts[] = $host3;
            }

            $loggingEnabled = (bool)Configuration::get('PS_ELASTICSEARCH_LOG');
            if ($loggingEnabled) {
                $logPath  = Configuration::get('PS_ELASTICSEARCH_LOG_PATH');
                $logLevel = Configuration::get('PS_ELASTICSEARCH_LOG_LEVEL');
                $logger = \Elasticsearch\ClientBuilder::defaultLogger($logPath, $logLevel);

                $builder = \Elasticsearch\ClientBuilder::create()
                    ->setHosts($hosts)
                    ->setLogger($logger);
            } else {
                $builder = \Elasticsearch\ClientBuilder::create()
                    ->setHosts($hosts);
            }

            if (version_compare(phpversion(), '5.6.6', '<') || !defined('JSON_PRESERVE_ZERO_FRACTION')) {
                $builder->allowBadJSONSerialization();
            }
            
            $this->client = $builder->build();
        } catch (Exception $e) {
            $this->error_msg = $this->l('Can\'t connect to elasticsearch server.');

            return false;
        }

        if (empty($this->client)) {
            $this->error_msg = $this->l('Elasticsearch client couldn\'t be initialized.');

            return false;
        }

        return true;
    }

    /**
     * @return bool
     */
    public function regenerateIndex()
    {
        if ($this->iniClient()) {
            try {
                $shops = Shop::getShops(true, null, true);
                foreach ($shops as $id_shop) {
                    $languages = Language::getLanguages(true, $id_shop);
                    foreach ($languages as $language) {
                        $id_lang = $language['id_lang'];

                        // start delete index
                        $delete_params = array();
                        $delete_params['index'] = 's'.$id_shop.'_l'.$id_lang;

                        if ($this->client->indices()->exists($delete_params)) {
                            $this->client->indices()->delete($delete_params);
                        }
                        // end delete index

                        // start create index
                        $index_params = array();
                        $index_params['index'] = 's'.$id_shop.'_l'.$id_lang;

                        $advanced = Configuration::get('PS_ELASTICSEARCH_ADVANCED_INDEX', $id_lang);
                        if (!empty($advanced)) {
                            $advanced_arr = Tools::jsonDecode($advanced, true);
                            if (!empty($advanced_arr)) {
                                $index_params['body'] = $advanced_arr;
                            }
                        }

                        $this->client->indices()->create($index_params);
                        // end create index

                        // start get products
                        $products = Db::getInstance()->executeS(
                            $this->buildSql(false, null, $id_lang, $id_shop)
                        );

                        if (Configuration::get('PS_ELASTICSEARCH_FEATURE', 0) == 1) {
                            foreach ($products as &$product) {
                                $sql = 'SELECT IFNULL(GROUP_CONCAT(DISTINCT fvl.`value`), \'\') AS `feature`
                                        FROM `'._DB_PREFIX_.'product` p
                                        LEFT JOIN `'._DB_PREFIX_.'feature_product` pf
                                            ON p.`id_product` = pf.`id_product`
                                        LEFT JOIN `'._DB_PREFIX_.'feature_value_lang` fvl
                                            ON pf.`id_feature_value` = fvl.`id_feature_value`
                                            AND fvl.`id_lang` = '.(int)$id_lang.'
                                        WHERE p.`id_product` = '.(int)$product['id'].'
                                        GROUP BY p.`id_product`';
                                $product['feature'] = Db::getInstance()->getValue($sql);
                            }
                        }

                        if (Configuration::get('PS_ELASTICSEARCH_ATTRIBUTE', 0) == 1) {
                            foreach ($products as &$product) {
                                $sql = 'SELECT IFNULL(GROUP_CONCAT(DISTINCT al.`name`), \'\') AS `attribute`
                                        FROM `'._DB_PREFIX_.'product` p
                                        LEFT JOIN `'._DB_PREFIX_.'product_attribute` pa
                                            ON p.`id_product` = pa.`id_product`
                                        LEFT JOIN `'._DB_PREFIX_.'product_attribute_combination` pac
                                            ON pa.`id_product_attribute` = pac.`id_product_attribute`
                                        LEFT JOIN `'._DB_PREFIX_.'attribute_lang` al
                                            ON pac.`id_attribute` = al.`id_attribute`
                                            AND al.`id_lang` = '.(int)$id_lang.'
                                        WHERE p.`id_product` = '.(int)$product['id'].'
                                        GROUP BY p.`id_product`';
                                $product['attribute'] = Db::getInstance()->getValue($sql);
                            }
                        }
                        // end get products

                        $product_chunks = array_chunk($products, 100);
                        foreach ($product_chunks as $product_chunk) {
                            foreach ($product_chunk as &$product) {
                                // start insert index
                                $params = array();
                                $params['body']  = $product;

                                $params['index'] = 's'.$id_shop.'_l'.$id_lang;
                                $params['type']  = 'product';
                                $params['id']    = $product['id'];

                                $this->client->index($params);
                                // end insert index
                            }
                        }
                    }
                }
            } catch (Exception $e) {
                $this->error_msg = $this->l('Regenerate index failed.');

                return false;
            }
        } else {
            return false;
        }

        return true;
    }

    /**
     * @param $id_product
     * @return bool
     */
    public function regenerateProductIndex($id_product)
    {
        if ($this->iniClient()) {
            try {
                $shops = Shop::getShops(true, null, true);
                foreach ($shops as $id_shop) {
                    $languages = Language::getLanguages(true, $id_shop);
                    foreach ($languages as $language) {
                        $id_lang = $language['id_lang'];

                        // start create index in case not exist
                        $check_params = array();
                        $check_params['index'] = 's'.$id_shop.'_l'.$id_lang;

                        if (!$this->client->indices()->exists($check_params)) {
                            $index_params = array();
                            $index_params['index'] = 's'.$id_shop.'_l'.$id_lang;

                            $advanced = Configuration::get('PS_ELASTICSEARCH_ADVANCED_INDEX', $id_lang);
                            if (!empty($advanced)) {
                                $advanced_arr = Tools::jsonDecode($advanced, true);
                                if (!empty($advanced_arr)) {
                                    $index_params['body'] = $advanced_arr;
                                }
                            }

                            $this->client->indices()->create($index_params);
                        }
                        // end create index in case not exist

                        // start get product
                        $products = Db::getInstance()->executeS(
                            $this->buildSql(false, $id_product, $id_lang, $id_shop)
                        );

                        if (Configuration::get('PS_ELASTICSEARCH_FEATURE', 0) == 1) {
                            foreach ($products as &$product) {
                                $sql = 'SELECT IFNULL(GROUP_CONCAT(DISTINCT fvl.`value`), \'\') AS `feature`
                                        FROM `'._DB_PREFIX_.'product` p
                                        LEFT JOIN `'._DB_PREFIX_.'feature_product` pf
                                            ON p.`id_product` = pf.`id_product`
                                        LEFT JOIN `'._DB_PREFIX_.'feature_value_lang` fvl
                                            ON pf.`id_feature_value` = fvl.`id_feature_value`
                                            AND fvl.`id_lang` = '.(int)$id_lang.'
                                        WHERE p.`id_product` = '.(int)$product['id'].'
                                        GROUP BY p.`id_product`';
                                $product['feature'] = Db::getInstance()->getValue($sql);
                            }
                        }

                        if (Configuration::get('PS_ELASTICSEARCH_ATTRIBUTE', 0) == 1) {
                            foreach ($products as &$product) {
                                $sql = 'SELECT IFNULL(GROUP_CONCAT(DISTINCT al.`name`), \'\') AS `attribute`
                                        FROM `'._DB_PREFIX_.'product` p
                                        LEFT JOIN `'._DB_PREFIX_.'product_attribute` pa
                                            ON p.`id_product` = pa.`id_product`
                                        LEFT JOIN `'._DB_PREFIX_.'product_attribute_combination` pac
                                            ON pa.`id_product_attribute` = pac.`id_product_attribute`
                                        LEFT JOIN `'._DB_PREFIX_.'attribute_lang` al
                                            ON pac.`id_attribute` = al.`id_attribute`
                                            AND al.`id_lang` = '.(int)$id_lang.'
                                        WHERE p.`id_product` = '.(int)$product['id'].'
                                        GROUP BY p.`id_product`';
                                $product['attribute'] = Db::getInstance()->getValue($sql);
                            }
                        }
                        // end get product

                        $product_chunks = array_chunk($products, 100);
                        foreach ($product_chunks as $product_chunk) {
                            foreach ($product_chunk as &$product) {
                                // start insert index
                                $params = array();
                                $params['body']  = $product;

                                $params['index'] = 's'.$id_shop.'_l'.$id_lang;
                                $params['type']  = 'product';
                                $params['id']    = $product['id'];

                                $this->client->index($params);
                                // end insert index
                            }
                        }
                    }
                }
            } catch (Exception $e) {
                $this->error_msg = $this->l('Regenerate product index failed.');

                return false;
            }
        } else {
            return false;
        }

        return true;
    }

    /**
     * @param bool $eol
     * @param null $id_product
     * @param int $id_lang
     * @param int $id_shop
     * @return mixed|string
     */
    private function buildSql($eol = false, $id_product = null, $id_lang = 0, $id_shop = 0)
    {
        $select = '';
        $select_arr = array();
        $left_join = '';
        $left_join_arr = array();
        $group_by = '';
        $group_by_arr = array();

        if (Configuration::get('PS_ELASTICSEARCH_PNAME', 0) == 1) {
            $select_arr[] = 'pl.`name` AS `pname`';
            $left_join_arr[] = 'LEFT JOIN `'._DB_PREFIX_.'product_lang` pl
                                ON p.`id_product` = pl.`id_product`
                                AND pl.`id_lang` = '.(int)$id_lang.'
                                AND pl.`id_shop` = '.(int)$id_shop;
        }
        if (Configuration::get('PS_ELASTICSEARCH_REF', 0) == 1) {
            $select_arr[] = 'p.`reference` AS `ref`';
        }
        if (Configuration::get('PS_ELASTICSEARCH_EAN13', 0) == 1) {
            $select_arr[] = 'p.`ean13` AS `ean13`';
        }
        if (Configuration::get('PS_ELASTICSEARCH_SHORTDESC', 0) == 1) {
            $select_arr[] = 'pl.`description_short` AS `shortdesc`';
            $left_join_arr[] = 'LEFT JOIN `'._DB_PREFIX_.'product_lang` pl
                                ON p.`id_product` = pl.`id_product`
                                AND pl.`id_lang` = '.(int)$id_lang.'
                                AND pl.`id_shop` = '.(int)$id_shop;
        }
        if (Configuration::get('PS_ELASTICSEARCH_DESC', 0) == 1) {
            $select_arr[] = 'pl.`description` AS `desc`';
            $left_join_arr[] = 'LEFT JOIN `'._DB_PREFIX_.'product_lang` pl
                                ON p.`id_product` = pl.`id_product`
                                AND pl.`id_lang` = '.(int)$id_lang.'
                                AND pl.`id_shop` = '.(int)$id_shop;
        }
        if (Configuration::get('PS_ELASTICSEARCH_CNAME', 0) == 1) {
            $select_arr[] = 'IFNULL(GROUP_CONCAT(DISTINCT cl.`name`), \'\') AS `cname`';
            $left_join_arr[] = 'LEFT JOIN `'._DB_PREFIX_.'category_product` cp
                                ON p.`id_product` = cp.`id_product`';
            $left_join_arr[] = 'LEFT JOIN `'._DB_PREFIX_.'category_lang` cl
                                ON cp.`id_category` = cl.`id_category`
                                AND cl.`id_lang` = '.(int)$id_lang.'
                                AND cl.`id_shop` = '.(int)$id_shop;
            $group_by_arr[] = 'p.`id_product`';
        }
        if (Configuration::get('PS_ELASTICSEARCH_MNAME', 0) == 1) {
            $select_arr[] = 'IFNULL(m.`name`, \'\') AS `mname`';
            $left_join_arr[] = 'LEFT JOIN `'._DB_PREFIX_.'manufacturer` m
                                ON p.`id_manufacturer` = m.`id_manufacturer`';
        }
        if (Configuration::get('PS_ELASTICSEARCH_SNAME', 0) == 1) {
            $select_arr[] = 'IFNULL(GROUP_CONCAT(DISTINCT s1.`name`), \'\') AS `sname`';
            $left_join_arr[] = 'LEFT JOIN `'._DB_PREFIX_.'product_supplier` ps1
                                ON p.`id_product` = ps1.`id_product`';
            $left_join_arr[] = 'LEFT JOIN `'._DB_PREFIX_.'supplier` s1
                                ON ps1.`id_supplier` = s1.`id_supplier`';
        }
        if (Configuration::get('PS_ELASTICSEARCH_TAG', 0) == 1) {
            $select_arr[] = 'IFNULL(GROUP_CONCAT(DISTINCT t.`name`), \'\') AS `tag`';
            $left_join_arr[] = 'LEFT JOIN `'._DB_PREFIX_.'product_tag` pt
                                ON p.`id_product` = pt.`id_product`';
            $left_join_arr[] = 'LEFT JOIN `'._DB_PREFIX_.'tag` t
                                ON pt.`id_tag` = t.`id_tag` AND t.`id_lang` = '.(int)$id_lang;
            $group_by_arr[] = 'p.`id_product`';
        }
        /*
        if (Configuration::get('PS_ELASTICSEARCH_ATTRIBUTE', 0) == 1)
        {
            $select_arr[] = 'IFNULL(GROUP_CONCAT(DISTINCT al.`name`), \'\') AS `attribute`';
            $left_join_arr[] = 'LEFT JOIN `'._DB_PREFIX_.'product_attribute` pa ON p.`id_product` = pa.`id_product`';
            $left_join_arr[] = 'LEFT JOIN `'._DB_PREFIX_.'product_attribute_combination` pac
                                ON pa.`id_product_attribute` = pac.`id_product_attribute`';
            $left_join_arr[] = 'LEFT JOIN `'._DB_PREFIX_.'attribute_lang` al ON pac.`id_attribute` = al.`id_attribute`
                                AND al.`id_lang` = '.(int)$id_lang;
            $group_by_arr[] = 'p.`id_product`';
        }
        if (Configuration::get('PS_ELASTICSEARCH_FEATURE', 0) == 1)
        {
            $select_arr[] = 'IFNULL(GROUP_CONCAT(DISTINCT fvl.`value`), \'\') AS `feature`';
            $left_join_arr[] = 'LEFT JOIN `'._DB_PREFIX_.'feature_product` pf
                                ON p.`id_product` = pf.`id_product`';
            $left_join_arr[] = 'LEFT JOIN `'._DB_PREFIX_.'feature_value_lang` fvl
                                ON pf.`id_feature_value` = fvl.`id_feature_value`
                                AND fvl.`id_lang` = '.(int)$id_lang;
            $group_by_arr[] = 'p.`id_product`';
        }
        */

        $select_arr = array_unique($select_arr);
        $left_join_arr = array_unique($left_join_arr);
        $group_by_arr = array_unique($group_by_arr);

        if (! empty($select_arr)) {
            $select = ','.implode(',', $select_arr);
        }
        if (! empty($left_join_arr)) {
            $left_join = ' '.implode(' ', $left_join_arr);
        }
        if (! empty($group_by_arr)) {
            $group_by = ' GROUP BY '.implode(',', $group_by_arr);
        }

        $where = '';
        if (! empty($id_product)) {
            $where = ' AND p.`id_product` = '.(int)$id_product;
        }

        $sql = 'SELECT p.`id_product` AS `id` '.$select.'
                FROM `'._DB_PREFIX_.'product` p
                LEFT JOIN `'._DB_PREFIX_.'product_shop` ps ON p.`id_product` = ps.`id_product`
                '.$left_join.'
                WHERE ps.`active` = 1
                AND ps.`available_for_order` = 1
                AND ps.`visibility` IN (\'both\', \'search\')
                AND ps.`id_shop` = '.(int)$id_shop.'
                '.$where.'
                '.$group_by;

        if ($eol) {
            $sql = str_replace(PHP_EOL, ' \\'.PHP_EOL, $sql);
        }

        return $sql;
    }

    /**
     * Function to handle search
     *
     * @param $id_lang
     * @param $expr
     * @param int $page_number
     * @param int $page_size
     * @param string $order_by
     * @param string $order_way
     * @param bool $ajax
     * @param bool $use_cookie
     * @param Context|null $context
     * @return array|bool
     */
    public function find(
        $id_lang,
        $expr,
        $page_number = 1,
        $page_size = 1,
        $order_by = 'position',
        $order_way = 'desc',
        $ajax = false,
        $use_cookie = true,
        Context $context = null
    ) {
        unset($page_number);
        unset($page_size);
        unset($order_by);
        unset($order_way);
        unset($use_cookie);

        if ($this->iniClient()) {
            try {
                $advanced = Configuration::get('PS_ELASTICSEARCH_ADVANCED_SEARCH');
                $advancedArr = Tools::jsonDecode($advanced, true);
                array_walk_recursive(
                    $advancedArr,
                    function (&$item, $key, $expr) {
                        unset($key);
                        $item = str_replace('||SEARCH_QUERY||', $expr, $item);
                    },
                    $expr
                );

                if ($ajax) {
                    $advancedArr['size'] = 100;
                }

                $params = array(
                    'index' => 's'.$context->shop->id.'_l'.$id_lang,
                    'type' => 'product',
                    'body' => $advancedArr
                );

                $result = $this->client->search($params);

                return $result;
            } catch (Exception $e) {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * @param null $cursor
     * @param bool $ajax
     * @param bool $full
     * @param bool $smart
     * @return int|string
     */
    public function cronProcess($cursor = null, $ajax = false, $full = false, $smart = false)
    {
        if ($this->iniClient()) {
            try {
                $this->shops = Shop::getShops(true, null, true);

                if ($full == true && (is_null($cursor) || $cursor == 0)) {
                    Configuration::updateValue('PS_ELASTICSEARCH_INDEXATION_WORKING', 1);

                    foreach ($this->shops as $id_shop) {
                        $this->languages = Language::getLanguages(true, $id_shop);

                        foreach ($this->languages as $language) {
                            $id_lang = $language['id_lang'];

                            // start delete index
                            $delete_params = array();
                            $delete_params['index'] = 's'.$id_shop.'_l'.$id_lang;

                            if ($this->client->indices()->exists($delete_params)) {
                                $this->client->indices()->delete($delete_params);
                            }
                            // end delete index

                            // start create index
                            $index_params = array();
                            $index_params['index'] = 's'.$id_shop.'_l'.$id_lang;

                            $advanced = Configuration::get('PS_ELASTICSEARCH_ADVANCED_INDEX', $id_lang);
                            if (!empty($advanced)) {
                                $advanced_arr = Tools::jsonDecode($advanced, true);
                                if (!empty($advanced_arr)) {
                                    $index_params['body'] = $advanced_arr;
                                }
                            }

                            $this->client->indices()->create($index_params);
                            // end create index
                        }
                    }

                    // start set all products as not indexed
                    $sql = 'UPDATE `' . _DB_PREFIX_ . 'product`
                            SET `indexed` = 0';
                    Db::getInstance()->execute($sql);
                    // end set all products as not indexed
                }

                if ($full) {
                    $nb_products = $this->getTotalNumberOfProducts();
                } else {
                    $nb_products = $this->getNotIndexedNumberOfProducts();
                }

                $max_executiontime = ini_get('max_execution_time');
                if ($max_executiontime > 5 || $max_executiontime <= 0) {
                    $max_executiontime = 5;
                }

                $start_time = microtime(true);

                if (function_exists('memory_get_peak_usage')) {
                    do {
                        $cursor = (int)$this->insertProductUnbreakable((int)$cursor, $full, $smart);
                        $time_elapsed = microtime(true) - $start_time;
                    } while ($cursor < $nb_products
                        && Tools::getMemoryLimit() > memory_get_peak_usage()
                        && $time_elapsed < $max_executiontime
                    );
                } else {
                    do {
                        $cursor = (int)$this->insertProductUnbreakable((int)$cursor, $full, $smart);
                        $time_elapsed = microtime(true) - $start_time;
                    } while ($cursor < $nb_products && $time_elapsed < $max_executiontime);
                }

                if (($nb_products > 0 || $cursor < $nb_products) && !$ajax) {
                    $token = Tools::substr(Tools::encrypt('elasticsearchconnector'), 0, 10);
                    if (Tools::usingSecureMode()) {
                        $domain = Tools::getShopDomainSsl(true);
                    } else {
                        $domain = Tools::getShopDomain(true);
                    }

                    if (!Tools::file_get_contents(
                        $domain . __PS_BASE_URI__ .
                        'modules/elasticsearchconnector/cron.php?token=' . $token .
                        '&cursor=' . (int)$cursor . '&full=' . (int)$full
                    )) {
                        $this->cronProcess((int)$cursor, $ajax, $full, $smart);
                    }

                    return $cursor;
                }

                if ($ajax && $nb_products > 0 && $cursor < $nb_products) {
                    return '{"cursor": ' . $cursor . ', "count": ' . ($nb_products - $cursor) . '}';
                } else {
                    Configuration::updateValue('PS_ELASTICSEARCH_INDEXATION_WORKING', 0);
                    Configuration::updateValue('PS_ELASTICSEARCH_FIRST_TIME', 0);

                    if ($ajax) {
                        return '{"result": "ok"}';
                    } else {
                        return -1;
                    }
                }
            } catch (Exception $e) {
                if ($ajax) {
                    return '{"result": "error"}';
                } else {
                    return - 1;
                }
            }
        } else {
            if ($ajax) {
                return '{"result": "error"}';
            } else {
                return - 1;
            }
        }
    }

    /**
     * @return int
     */
    private function getTotalNumberOfProducts()
    {
        $nb_products = (int) Db::getInstance()->getValue('
                    SELECT COUNT(DISTINCT `id_product`)
                    FROM `'._DB_PREFIX_.'product`
                    ORDER BY `id_product`
                ');
        return $nb_products;
    }

    /**
     * @return int
     */
    private function getIndexedNumberOfProducts()
    {
        $nb_products = (int) Db::getInstance()->getValue('
                    SELECT COUNT(DISTINCT `id_product`)
                    FROM `'._DB_PREFIX_.'product`
                    WHERE `indexed` = 1
                    ORDER BY `id_product`
                ');
        return $nb_products;
    }

    /**
     * @return int
     */
    private function getNotIndexedNumberOfProducts()
    {
        $nb_products = (int) Db::getInstance()->getValue('
                    SELECT COUNT(DISTINCT `id_product`)
                    FROM `'._DB_PREFIX_.'product`
                    WHERE `indexed` = 0
                    ORDER BY `id_product`
                ');
        return $nb_products;
    }

    /**
     * @param $cursor
     * @param bool $full
     * @param bool $smart
     * @return int
     */
    private function insertProductUnbreakable($cursor, $full = false, $smart = false)
    {
        static $length = 10; // Nb of products to handle

        if (is_null($cursor)) {
            $cursor = 0;
        }

        if ($full) {
            $sql = 'SELECT DISTINCT `id_product`
                FROM `' . _DB_PREFIX_ . 'product`
                ORDER BY `id_product`
                LIMIT ' . (int)$cursor . ',' . (int)$length;
        } else {
            $sql = 'SELECT DISTINCT `id_product`
                    FROM `' . _DB_PREFIX_ . 'product`
                    WHERE `indexed` = 0
                    ORDER BY `id_product`
                    LIMIT ' . (int)$cursor . ',' . (int)$length;
        }
        $result = Db::getInstance()->executeS($sql);
        foreach ($result as $row) {
            $this->insertProduct($row['id_product'], $smart);
        }

        return ($cursor + $length);
    }

    public function insertProduct($id_product, $smart = true)
    {
        unset($smart);

        foreach ($this->shops as $id_shop) {
            $this->languages = Language::getLanguages(true, $id_shop);

            foreach ($this->languages as $language) {
                $id_lang = $language['id_lang'];

                // start get products
                $products = Db::getInstance()->executeS(
                    $this->buildSql(false, $id_product, $id_lang, $id_shop)
                );

                if (Configuration::get('PS_ELASTICSEARCH_FEATURE', 0) == 1) {
                    foreach ($products as &$product) {
                        $sql = 'SELECT IFNULL(GROUP_CONCAT(DISTINCT fvl.`value`), \'\') AS `feature`
                                 FROM `'._DB_PREFIX_.'product` p
                                LEFT JOIN `'._DB_PREFIX_.'feature_product` pf
                                    ON p.`id_product` = pf.`id_product`
                                LEFT JOIN `'._DB_PREFIX_.'feature_value_lang` fvl
                                    ON pf.`id_feature_value` = fvl.`id_feature_value`
                                    AND fvl.`id_lang` = '.(int)$id_lang.'
                                WHERE p.`id_product` = '.(int)$product['id'].'
                                GROUP BY p.`id_product`';
                        $product['feature'] = Db::getInstance()->getValue($sql);
                    }
                }

                if (Configuration::get('PS_ELASTICSEARCH_ATTRIBUTE', 0) == 1) {
                    foreach ($products as &$product) {
                        $sql = 'SELECT IFNULL(GROUP_CONCAT(DISTINCT al.`name`), \'\') AS `attribute`
                                FROM `'._DB_PREFIX_.'product` p
                                LEFT JOIN `'._DB_PREFIX_.'product_attribute` pa
                                    ON p.`id_product` = pa.`id_product`
                                LEFT JOIN `'._DB_PREFIX_.'product_attribute_combination` pac
                                    ON pa.`id_product_attribute` = pac.`id_product_attribute`
                                LEFT JOIN `'._DB_PREFIX_.'attribute_lang` al
                                    ON pac.`id_attribute` = al.`id_attribute`
                                    AND al.`id_lang` = '.(int)$id_lang.'
                                WHERE p.`id_product` = '.(int)$product['id'].'
                                GROUP BY p.`id_product`';
                        $product['attribute'] = Db::getInstance()->getValue($sql);
                    }
                }
                // end get products

                foreach ($products as &$product) {
                    // start insert index
                    $params = array();
                    $params['body']  = $product;

                    $params['index'] = 's'.$id_shop.'_l'.$id_lang;
                    $params['type']  = 'product';
                    $params['id']    = $product['id'];

                    $this->client->index($params);
                    // end insert index
                }
            }
        }

        // start set product as indexed
        $sql = 'UPDATE `' . _DB_PREFIX_ . 'product`
                SET `indexed` = 1
                WHERE `id_product` = ' . (int)$id_product;
        Db::getInstance()->execute($sql);
        // end set product as indexed
    }
}
