<?php
class AdminOrdersController extends AdminOrdersControllerCore
{
    public function __construct()
    {
        parent::__construct();
        $field_list_new = array();
        foreach ($this->fields_list as $key => $v) {
            $field_list_new[$key] = $v;
            if ($key == 'osname') {
                $field_list_new['osname'] = array(
                    'title' => $this->l('Custom Order Status'),
                    'type' => 'select',
                    'list' => $this->statuses_array,
                    'filter_key' => 'os!id_order_state',
                    'filter_type' => 'int',
                    'order_key' => 'osname',
                    'align' => 'text-center',
                    'class' => 'fixed-width-xs',
                    'callback' => 'changeStatus',
                    'remove_onclick' => true,
                );
            }
        }
        $this->fields_list = $field_list_new;
    }
    
    public function changeStatus($var, $arr)
    {
        if ($var) {
            return Hook::exec('actionChangeOrderStatus', array('params' => $arr));
        }
    }
    
    public function setMedia()
    {
        parent::setMedia();
        $this->addJS(_MODULE_DIR_.'orderstatuschange/views/js/change.js');
    }
}
