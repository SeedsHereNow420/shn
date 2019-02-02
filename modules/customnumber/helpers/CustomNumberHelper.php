<?php
/**
 * Custom Number
 *
 *  @author    motionSeed <ecommerce@motionseed.com>
 *  @copyright 2016 motionSeed. All rights reserved.
 *  @license   https://www.motionseed.com/en/license-module.html
 */

class CustomNumberHelper
{

    const INVOICE = 'INVOICE';
    const ORDER = 'ORDER';
    const DELIVERY = 'DELIVERY';
    const CREDIT_SLIP = 'CREDIT_SLIP';

    public static $date_maps = array(
        'YYYY' => 'Y',
        'YY' => 'y',
        'MM' => 'm',
        'M' => 'n',
        'DD' => 'd',
        'D' => 'j'
    );
    public static $number_maps = array(
        self::INVOICE => array(
            'table' => 'order_invoice',
            'identifier' => 'id_order_invoice',
            'column' => 'number'
        ),
        self::ORDER => array(
            'table' => 'orders',
            'identifier' => 'id_order',
            'column' => 'reference'
        ),
        self::DELIVERY => array(
            'table' => 'order_invoice',
            'identifier' => 'id_order_invoice',
            'column' => 'delivery_number'
        ),
        self::CREDIT_SLIP => array(
            'table' => 'order_slip',
            'identifier' => 'id_order_slip',
            'column' => 'number'
        )
    );

    public static function format($context, $id_lang, $id_shop, $object, $test = false)
    {
        $number = Db::getInstance()->getValue(
            'SELECT number
                FROM `' . _DB_PREFIX_ .'customnumber_document`
                WHERE type = "' . pSQL($context) . '" AND id_document = ' . (int) $object->id
        );
        
        if ($number) {
            return $number;
        }
        
        $stop_propagation = Hook::exec(
            'actionCustomNumberFormat',
            array(
                'context' => $context,
                'id_lang' => $id_lang,
                'id_shop' => $id_shop,
                'object' => $object,
                'test' => $test
            )
        );
        
        if ($stop_propagation === true) {
            return true;
        }
        
        if ($test) {
            $id_shop = Shop::getContextShopID();
        } else {
            $id_shop = static::getShopID($context, $object);
        }
        
        $configuration = Configuration::get('MS_CUSTOMNUMBER_' . $context, null, null, $id_shop);
        $params =  $test ? $test : explode('||', $configuration);
        $ts = strtotime($object->date_add);

        if (count($params) == 6 && $params[0] > 0 && $ts > Configuration::get('MS_CUSTOMNUMBER_INIT_TS')) {
            // External service
            if ($params[0] == 2) {
                switch ($context) {
                    case CustomNumberHelper::DELIVERY:
                        $number = $object->delivery_number;
                    // Fall-through
                    case CustomNumberHelper::CREDIT_SLIP:
                        $number = $object->number;
                    // Fall-through
                    default:
                        $number = $object->number;
                }

                return $number;
            }
            
            return preg_replace_callback(
                '#{([A-Z_]+)}#',
                function ($m) use ($context, $id_lang, $id_shop, $object, $params, $ts, $test) {
                    switch ($m[1]) {
                        case 'COUNTER':
                            $column = CustomNumberHelper::$number_maps[$context]['column'];

                            $pad = explode(':', $params[4]);

                            return str_pad($object->{$column}, $pad[0], isset($pad[1]) ? $pad[1] : '0', STR_PAD_LEFT);
                        case 'SHOP_ID':
                            return $id_shop;
                        case 'CART_ID':
                            if ($test) {
                                return 1;
                            }
                            
                            $order = new Order($context != CustomNumberHelper::ORDER ? $object->id_order : $object->id);
                            
                            return $order->id_cart;
                        case 'ORDER_ID':
                            return $context === CustomNumberHelper::ORDER ? $object->id : $object->id_order;
                        case 'ORDER_NR':
                            if ($context != self::ORDER) {
                                return (new Order($object->id_order))->reference;
                            }
                            
                            return '--';
                        case 'INVOICE_NR':
                        // Fall-through
                        case 'INV_NR':
                            if ($context == self::DELIVERY || $context == self::CREDIT_SLIP) {
                                if ($context == self::CREDIT_SLIP) {
                                    $orderInvoiceId = (int)Db::getInstance()->getValue(
                                        'SELECT oi.`id_order_invoice`
                                        FROM `' . _DB_PREFIX_ . 'order_invoice` oi 
                                        INNER JOIN `' . _DB_PREFIX_ . 'order_detail` od
                                            ON od.`id_order` = oi.`id_order`
                                        INNER JOIN `' . _DB_PREFIX_ . 'order_slip_detail` osd
                                            ON osd.`id_order_detail` = od.`id_order_detail` 
                                            AND osd.`id_order_slip` = ' . (int)$object->id
                                    );
                                } else {
                                    $orderInvoiceId = $object->id_order_invoice;
                                }
                                
                                if ($orderInvoiceId > 0) {
                                    return self::format(
                                        'INVOICE',
                                        $id_lang,
                                        $id_shop,
                                        new OrderInvoice($orderInvoiceId)
                                    );
                                }
                            }
                            
                            return '--';
                        case 'CUSTOMER_ID':
                            if ($test) {
                                return 1;
                            } elseif ($context == self::ORDER || $context == self::CREDIT_SLIP) {
                                return $object->id_customer;
                            }
                            
                            return (new Order($object->id_order))->id_customer;
                        default:
                            if (isset(CustomNumberHelper::$date_maps[$m[1]])) {
                                return date(CustomNumberHelper::$date_maps[$m[1]], $ts);
                            }
                            
                            return Hook::exec(
                                'actionCustomNumberFormatTag',
                                array(
                                    'tag' => $m[1],
                                    'context' => $context,
                                    'id_lang' => $id_lang,
                                    'id_shop' => $id_shop,
                                    'object' => $object,
                                    'params' => $params,
                                    'ts' => $ts
                                )
                            );
                    }
                },
                $params[1]
            );
        } else {
            switch ($context) {
                case CustomNumberHelper::DELIVERY:
                    $number = $object->delivery_number;
                // Fall-through
                case CustomNumberHelper::CREDIT_SLIP:
                    $number = $object->id;
                // Fall-through
                default:
                    $number = $object->number;
            }

            return '#' . Configuration::get('PS_' . $context . '_PREFIX', $id_lang, null, $id_shop)
                . sprintf('%06d', $number);
        }
    }

    public static function setNumber($context, $id, $object = null, $test = false)
    {
        $where = array();
        
        $stop_propagation = Hook::exec(
            'actionCustomNumberSetNumber',
            array(
                'context' => $context,
                'id' => $id,
                'object' => $object,
                'test' => $test,
                'where' => &$where
            )
        );
        
        if ($stop_propagation === true) {
            return true;
        }
        
        $id_shop = static::getShopID($context, $object);
        
        $configuration = Configuration::get('MS_CUSTOMNUMBER_' . $context, null, null, $id_shop);
        $params =  $test ? $test : explode('||', $configuration);

        if (count($params) == 6
            && $params[0] == 1
            && (time() >= (int)Configuration::get('MS_CUSTOMNUMBER_INIT_NR_TS'))
        ) {
            if (!isset(CustomNumberHelper::$number_maps[$context])) {
                return false;
            }

            $table = CustomNumberHelper::$number_maps[$context]['table'];
            $identifier = CustomNumberHelper::$number_maps[$context]['identifier'];
            $column = CustomNumberHelper::$number_maps[$context]['column'];
            
            $sql = $test ? '' : 'UPDATE `' . bqSQL(_DB_PREFIX_ . $table) . '` SET ' . bqSQL($column) . ' =';

            $reset = explode(':', $params[5]);

            // Date column
            $order_date_column = 'ref.date_add';
            
            if ($context != CustomNumberHelper::ORDER) {
                array_unshift(
                    $where,
                    'INNER JOIN ' . _DB_PREFIX_ . 'orders o 
                        ON o.id_order = ref.id_order AND ref.'. bqSQL($column) . ' <> 0'
                );
                
                if (Configuration::get('MS_CUSTOMNUMBER_USE_ORDER_DATE')) {
                    $order_date_column = 'o.date_add';
                }
            } else {
                $where[] = 'WHERE ref.'. bqSQL($column) . " <> ''";
            }

            // MultiShop
            if ($id_shop = static::getShopID($context, $object)) {
                if ($context != CustomNumberHelper::ORDER) {
                    $where[] = 'o.id_shop = ' . (int) $id_shop;
                } else {
                    $where[] = 'ref.id_shop = ' . (int) $id_shop;
                }
            }
            
            $shift = (bool)Configuration::get('MS_CUSTOMNUMBER_NEW_NUMBER_SHIFT');

            if ($context == CustomNumberHelper::ORDER) {
                $shift = true;
            }

            if (!Configuration::get('MS_CUSTOMNUMBER_SHIFT_NR_TS')) {
                $where[] = sprintf(
                    'UNIX_TIMESTAMP(%1$s) >= \'%2$s\'',
                    $order_date_column,
                    Configuration::get('MS_CUSTOMNUMBER_INIT_NR_TS')
                );
            }

            switch ($reset[0]) {
                case 'V':
                    // Number reset
                    $sql .= sprintf(
                        '(SELECT new_number 
							FROM (SELECT GREATEST(%s + MOD(COUNT(' . bqSQL($identifier) . ') - %d, %s + 1) * %s, 1) AS new_number
                            FROM `' . bqSQL(_DB_PREFIX_ . $table) . '` AS ref %s) AS result)',
                        (int) $params[2],
                        ($shift && ($context != CustomNumberHelper::ORDER || !$test) ? 1 : 0),
                        floor(((int) $reset[1] - (int) $params[2]) / (int) $params[3]),
                        (int) $params[3],
                        implode(' AND ', $where)
                    );

                    break;
                case 'D':
                    // Date reset
                    $date = date(str_replace(
                        array_keys(CustomNumberHelper::$date_maps),
                        array_values(CustomNumberHelper::$date_maps),
                        $reset[1]
                    ));
                    
                    $time = strtotime($date);
                    
                    if (date('Ymd', $time) > date('Ymd')) {
                        if (strpos($reset[1], 'MM') !== false) {
                            $date = date('Y-m-d', strtotime('-1 month', $time));
                        } elseif (strpos($reset[1], 'YYYY') !== false) {
                            $date = date('Y-m-d', strtotime('-1 year', $time));
                        } else {
                            $date = '0000-00-00';
                        }
                    }
                    
                    $where[] = bqSQL($order_date_column) . " >= '" . $date . "'";

                    $sql .= sprintf(
                        '(SELECT new_number 
							FROM (SELECT GREATEST(%s + (COUNT(' . bqSQL($identifier) . ') - %d) * %s, 1) AS new_number
                            FROM `' . bqSQL(_DB_PREFIX_ . $table) . '` AS ref %s) AS result)',
                        (int) $params[2],
                        ($shift && ($context != CustomNumberHelper::ORDER || !$test) ? 1 : 0),
                        (int) $params[3],
                        implode(' AND ', $where)
                    );

                    break;
                default:
                    $sql .= sprintf(
                        '(SELECT new_number 
							FROM (SELECT GREATEST(%s + (COUNT(' . bqSQL($identifier) . ') - %d) * %s, 1) AS new_number
                            FROM `' . _DB_PREFIX_ . $table . '` AS ref %s) AS result)',
                        (int) $params[2],
                        ($shift && ($context != CustomNumberHelper::ORDER || !$test) ? 1 : 0),
                        (int) $params[3],
                        implode(' AND ', $where)
                    );
            }

            $sql .= $test ? '' : ' WHERE ' . bqSQL($identifier) . ' = ' . (int) $id;
            
            $return = $test ? Db::getInstance()->getValue($sql) : Db::getInstance()->execute($sql);

            // Order
            if (!$test && $return && $context == CustomNumberHelper::ORDER) {
                $order = new Order((int) $id);
                $order->reference = CustomNumberHelper::format(
                    CustomNumberHelper::ORDER,
                    $order->id_lang,
                    $order->id_shop,
                    $order
                );
                
                $order->save();

                $object->reference = $order->reference;
            }

            if (!$test && $context != CustomNumberHelper::ORDER) {
                $sql = 'SELECT ' . bqSQL($column) . '
                        FROM `' . bqSQL(_DB_PREFIX_ . $table) . '`
                        WHERE ' . bqSQL($identifier) . ' = ' . (int) $id;
                
                $object->$column = Db::getInstance()->getValue($sql);
                $object->update();
            }

            return $return;
        } else {
            return false;
        }
    }

    public static function dateYears($start = 0, $limit = 10, $addition = true)
    {
        $tab = array();

        for ($i = (date('Y') + $start), $j = 0; $j <= $limit; $j++) {
            $tab[] = $addition ? $i + $j : $i - $j;
        }

        return $tab;
    }

    public static function formatInvoiceFileName($filename, $id_lang, $id_shop)
    {
        $matches = array();

        if (preg_match(
            '/^(?:' . Configuration::get('PS_INVOICE_PREFIX', $id_lang, null, $id_shop) . ')\s*([0-9]+)(.pdf)?$/i',
            $filename,
            $matches
        )) {
            $id_order_invoice = ltrim($matches[1], '0');
        }

        if (!$id_order_invoice) {
            return $filename;
        }

        $obj = new OrderInvoice($id_order_invoice);

        $id_shop = static::getShopID(static::INVOICE, $obj);

        return static::format(static::INVOICE, $id_lang, $id_shop, $obj) . '.pdf';
    }

    public static function formatDeliveryFileName($filename, $id_lang, $id_shop)
    {
        $matches = array();

        if (preg_match(
            '/^(?:' . Configuration::get('PS_INVOICE_PREFIX', $id_lang, null, $id_shop) . ')\s*([0-9]+)(.pdf)?$/i',
            $filename,
            $matches
        )) {
            $id_order_invoice = ltrim($matches[1], '0');
        }

        if (!$id_order_invoice) {
            return $filename;
        }

        $obj = new OrderInvoice($id_order_invoice);

        $id_shop = static::getShopID(static::DELIVERY, $obj);

        return static::format(static::DELIVERY, $id_lang, $id_shop, $obj) . '.pdf';
    }
    
    public static function getShopID($context, $object)
    {
        if (Configuration::get('MS_CUSTOMNUMBER_SHARE_COUNTER') && Shop::isFeatureActive()) {
            return null;
        }
        
        if (!isset($object->id)) {
            return Shop::getContextShopID();
        }
        
        $table = CustomNumberHelper::$number_maps[$context]['table'];
        $identifier = CustomNumberHelper::$number_maps[$context]['identifier'];

        $sql = 'SELECT id_shop 
                FROM ' . bqSQL(_DB_PREFIX_ . $table) . ' AS ref';

        if ($context != CustomNumberHelper::ORDER) {
            $sql .= ' INNER JOIN ' . _DB_PREFIX_ . 'orders o 
                        ON o.id_order = ref.id_order 
                        AND ref.' . bqSQL($identifier) . ' = ' . (int) $object->id;
        } else {
            $sql .= ' WHERE ref.' . bqSQL($identifier) . ' = ' . (int) $object->id;
        }
        
        return Db::getInstance()->getValue($sql);
    }
}
