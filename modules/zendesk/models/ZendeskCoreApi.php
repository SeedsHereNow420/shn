<?php
/**
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
*  @author    Presta-Module
*  @author    202 ecommerce
*  @copyright 2009-2016 Presta-Module
*  @copyright 2017-2018 202 ecommerce
*  @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
*/

class ZendeskCoreApi
{
    private $errors = array();

    protected $type = 'core';
    protected $domain = '';

    private static $debug = false;
    private static $error;
    private static $static_cache;

    /**
     * Prepare request
     *
     * @param array $params
     */
    public function sendRequest($params)
    {
        if (!is_array($params)) {
            return array('error' => 'An array was expected to send a request to Zendesk.');
        }

        $waited = array("item", "action");
        foreach ($waited as $field) {
            if (!isset($params[$field])) {
                return array('error' => 'Missing field ('.$field.')');
            } elseif (Tools::strlen($params[$field]) < 2) {
                return array('error' => 'Empty field ('.$field.')');
            }
        }

        /* Cache */
        if (isset($params['id']) && $params['item'] == 'users') {
            if (isset(self::$static_cache['users'][$params['id']])) {
                return self::$static_cache['users'][$params['id']];
            }
        }

        $data = array();
        if (isset($params['data']) && !is_array($params['data'])) {
            return array('error' => 'The data sent to zendesk should be an array.');
        } elseif (isset($params['data'])) {
            $data = $params['data'];
        }

        if (count($this->errors)) {
            return count($this->errors);
        }

        $item = Tools::strtolower($params['item']);
        $action = Tools::strtoupper($params["action"]);

        if ($action == "POST" || $action == "PUT") {
            if (!isset($params['data'])) {
                return array('error' => 'When the action is a type of "PUT" or "POST", an array of data should be passed.');
            }
        }

        $url='/';
        if (isset($params['id'])) {
            if (!is_numeric($params['id']) && $params['item'] != 'apps/job_statuses') {
                return array('error' => 'The attribute "id" has to be a numeric value');
            }
            $url .= $item.'/'.$params['id'];
        } else {
            $url .= $item;
        }

        if (isset($params['endpoint'])) {
            $url .= '/'.$params['endpoint'];
        }

        if (($action != 'GET' || isset($params['endpoint']) || isset($params['id'])) && !isset($params['notjson'])) {
            $url .= '.json';
        }

        if ($item == "search") {
            if (!isset($params['data'])) {
                return array('error' => 'When you launch a search on zendesk, you need to pass an array of queries');
            }

            if (!isset($params['data']['type'])) {
                return array('error' => 'Field "type" missing for a search on zendesk');
            }

            $url .= '?query=';
            $query='';

            if (isset($params['data']['type_name'])) {
                $query .= $params['data']['type_name'].':'.$params['data']['type'].' ';
            } else {
                $query .= 'type:'.$params['data']['type'].' ';
            }

            if (isset($params['data']['field']) && isset($params['data']['value'])) {
                $query .= $params['data']['field'].':'.$params['data']['value'].' ';
            }

            if (isset($params['data']['search'])) {
                if (!is_array($params['data']['search'])) {
                    $params['data']['search'] = array( 'exact' => $params['data']['search'], 'before' => '*', 'after' => '*' );
                }
                if (isset($params['data']['search']['before'])) {
                    $query .=$params['data']['search']['before'];
                }
                if (isset($params['data']['search']['exact'])) {
                    $query .=$params['data']['search']['exact'];
                }
                if (isset($params['data']['search']['after'])) {
                    $query .=$params['data']['search']['after'];
                }
                if (isset($params['data']['search']['plus'])) {
                    if (!is_array($params['data']['search']['plus'])) {
                        $params['data']['search']['plus'] = array($params['data']['search']['plus']);
                    }
                    foreach ($params['data']['search']['plus'] as $plus) {
                        $query .= ' +'.$plus;
                    }
                }
                if (isset($params['data']['search']['minus'])) {
                    if (!is_array($params['data']['search']['minus'])) {
                        $params['data']['search']['minus'] = array($params['data']['search']['minus']);
                    }
                    foreach ($params['data']['search']['minus'] as $minus) {
                        $query .= ' -'.$minus;
                    }
                }

                //$query = rtrim($query);
            }

            $query = urlencode(str_replace("  ", " ", $query));
            $url .= $query;

            $sort_bys = array('updated_at', 'created_at', 'priority', 'status', 'ticket_type', 'default');
            if (isset($params['data']['sort_by']) && in_array($params['data']['sort_by'], $sort_bys)) {
                if ($params['data']['sort_by'] == 'default') {
                    $params['data']['sort_by'] = 'updated_at';
                }
                $url .= '&sort_by='.$params['data']['sort_by'];
            }
            $sort_orders = array('relevance', 'asc', 'desc', 'default');
            if (isset($params['data']['sort_order']) && in_array($params['data']['sort_order'], $sort_orders)) {
                if ($params['data']['sort_order'] == 'default') {
                    $params['data']['sort_order'] = 'relevance';
                }
                $url .= '&sort_order='.$params['data']['sort_order'];
            }
            if (isset($params['data']['page']) && is_numeric($params['data']['page'])) {
                $url .= '&page='.$params['data']['page'];
            }
            if (isset($params['data']['per_page']) && is_numeric($params['data']['per_page'])) {
                $url .= '&per_page='.$params['data']['per_page'];
            }
        } elseif (isset($params['page']) || isset($params['per_page']) || isset($params['include']) || isset($params['sort_order'])) {
            // handle additionnal parameters
            $url .= '?';

            if (isset($params['per_page'])) {
                if (!is_numeric($params['per_page'])) {
                    $this->errors[] = $this->module->l('The attribute "per_page" has to be a numeric value');
                } elseif (isset($params['id'])) {
                    $this->errors[] = $this->module->l('Can\'t have a "per_page" attribute with an "id" attribute');
                } else {
                    $url .= 'per_page='.$params['per_page'].'&';
                }
            }
            if (isset($params['page'])) {
                if (!is_numeric($params['page'])) {
                    $this->errors[] = $this->module->l('The attribute "page" has to be a numeric value');
                } elseif (isset($params['id'])) {
                    $this->errors[] = $this->module->l('Can\'t have a "page" attribute with an "id" attribute');
                } else {
                    $url .= 'page='.$params['page'].'&';
                }
            }
            if (isset($params['include'])) {
                if (!is_array($params['include'])) {
                    $params['include'] = array($params['include']);
                }
                $url .= 'include='.implode(',', $params['include']).'&';
            }
            if (isset($params['sort_order'])) {
                $sort_order = Tools::strtolower($params['sort_order']);
                if ($sort_order != "desc" && $sort_order != "asc") {
                    $this->errors[] = $this->module->l('The attribute "sort_order" can only be "asc" or "desc"');
                } elseif (isset($params['id'])) {
                    $this->errors[] = $this->module->l('Can\'t have a "sort_order" attribute with an "id" attribute');
                } else {
                    $url .= 'sort_order='.$params['sort_order'];
                }
            }

            // remove the final "&" if there is one
            $url = rtrim($url, "&");
        }

        $datas = $this->curlWrap($url, $data, $action);

        /* Cache */
        if (isset($params['id']) && $params['item'] == 'users') {
            self::$static_cache['users'][$params['id']] = $datas;
        }

        return $datas;
    }
    
    /**
     * Do the cURL request
     *
     * @param string $url
     * @param array $array datas
     * @param string $action action (GET/POST/PUT)
     * @param bool $end_user
     * @return request ouput
     */
    public function curlWrap($url, $array, $action, $end_user = false)
    {
        $json = Tools::jsonEncode($array);
        $ch = curl_init();

        if ($this->type == 'core') {
            $subdomain = Configuration::get('ZENDESK_SUBDOMAIN');
            $api_url = 'https://'.$subdomain.'.zendesk.com/api/v2';
            $api_user = Configuration::get('ZENDESK_USERNAME');
            $api_key = Configuration::get('ZENDESK_APIKEY');

            curl_setopt($ch, CURLOPT_MAXREDIRS, 20);
            curl_setopt($ch, CURLOPT_URL, $api_url.$url);
            if (!$end_user) {
                curl_setopt($ch, CURLOPT_USERPWD, $api_user."/token:".$api_key);
            } else {
                curl_setopt($ch, CURLOPT_USERPWD, $end_user."/token:".$api_key);
            }
        } else {
            $api_url = 'https://'.$this->domain.'.zendesk.com/api/v2';
            curl_setopt($ch, CURLOPT_URL, $api_url.$url);
        }

        switch ($action) {
            case "POST":
                if (isset($array['content_type'])) {
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array($array['content_type']));
                } elseif (!isset($array['uploaded_data'])) {
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
                }

                if (isset($array['file'])) {
                    curl_setopt($ch, CURLOPT_URL, $api_url.$url.'?filename='.$array['filename']);
                    curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
                    $file = fopen($array['file'], 'r');
                    $size = filesize($array['file']);
                    $fildata = fread($file, $size);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $fildata);
                    curl_setopt($ch, CURLOPT_INFILE, $file);
                    curl_setopt($ch, CURLOPT_INFILESIZE, $size);
                } elseif (isset($array['uploaded_data'])) {
                    curl_setopt($ch, CURLOPT_POSTFIELDS, array('uploaded_data' => "@".$array['uploaded_data']));
                } else {
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
                }

                curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                if (!isset($array['uploaded_data'])) {
                    curl_setopt($ch, CURLOPT_POST, 1);
                }
                break;
            case "GET":
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
                break;
            case "PUT":
                if (isset($array['content_type'])) {
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array($array['content_type']));
                } else {
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
                }
                curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
                curl_setopt($ch, CURLOPT_POST, 1);
                break;
            case "DELETE":
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
                break;
            default:
                break;
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $output = curl_exec($ch);
        curl_close($ch);

        $decoded = Tools::jsonDecode($output);
  
        if (is_object($decoded) && isset($decoded->error)) {
            $decoded->success = false;
            if (version_compare(_PS_VERSION_, '1.6', '>=')) {
                PrestaShopLogger::addLog('Zendesk '.(isset($decoded->description) ? $decoded->description : print_r($decoded->error, true)), 1, null, 'ZendeskCoreApi', null, true, is_object(Context::getContext()->employee) ? (int)Context::getContext()->employee->id : 0);
            } else {
                Logger::addLog('Zendesk '.(isset($decoded->description) ? $decoded->description : print_r($decoded->error, true)), 1, null, 'ZendeskCoreApi', null, true, is_object(Context::getContext()->employee) ? (int)Context::getContext()->employee->id : 0);
            }
            
            self::$error = array(
                'code' => $decoded->error,
                'description' => (isset($decoded->description) ? $decoded->description : ''),
                'details' => (isset($decoded->details) ? $decoded->details :'')
            );

            if (self::$debug) {
                throw new PrestaShopException($this->getLastError(true));
            }
        }
        return $decoded;
    }

    /**
     * Return error
     *
     * @param string $error_code
     * @param string $error_message
     * @return array Error
     */
    public function returnError($error_code = '', $error_message = '')
    {
        self::$error = array(
            'code' => $error_code,
            'description' => $error_message,
            'details' => ''
        );

        $obj = new stdClass();
        $obj->error = $error_code.($error_message != '' ? ' ('.$error_message.')' : '');
        
        return $obj;
    }

    /**
     * Get the last error
     *
     * @param bool $full
     * @return array Error
     */
    public function getLastError($full = false)
    {
        $error_details = '';
        $details = (array)self::$error['details'];
        foreach ($details as $detail) {
            $error_details .= $detail[0]->description;
        }

        return self::$error['code'].($full ? ' ('.self::$error['description'].' - '.$error_details.')' : '');
    }

    /**
     * Convert a Zendesk date to PrestaShop date
     *
     * @param string $value Zendesk date
     * @return PrestaShop date
     */
    public function convertDate($date)
    {
        $date = DateTime::createFromFormat('Y-m-d\TH:i:s\Z', $date);
        return $date->format('Y-m-d H:i:s');
    }

    /**
     * Validate::isSubdomain()
     *
     * Specify the name of the subdomain you want to verify. The name can't contain underscores, hyphens, or spaces.
     *
     * @param string $subdomain
     * @return bool
     */
    public static function isSubDomain($subdomain = '')
    {
        return preg_match('/^[a-zA-Z0-9-]*$/', $subdomain);
    }

    /**
     * Non-static method which uses AdminController::translate()
     *
     * @param string  $string Term or expression in english
     * @param string|null $class Name of the class
     * @param bool $addslashes If set to true, the return value will pass through addslashes(). Otherwise, stripslashes().
     * @param bool $htmlentities If set to true(default), the return value will pass through htmlentities($string, ENT_QUOTES, 'utf-8')
     * @return string The translation if available, or the english default text.
     */
    protected function l($string, $class = 'AdminZendesk', $addslashes = false, $htmlentities = true)
    {
        return Translate::getAdminTranslation($string, $class, $addslashes, $htmlentities);
    }
}
