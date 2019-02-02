<?php
return array(
    'st_location' => array(
        'title' => $this->getTranslator()->trans('Show on', array(), 'Admin.Theme.Transformer'),
        'width' => 120,
        'type' => 'text',
        'search' => false,
        'orderby' => false,
        'callback' => 'showCookieLawLocation',
        'callback_object' => 'StEasyContent',
    ),
    'st_content' => array(
        'title' => $this->getTranslator()->trans('Content', array(), 'Admin.Theme.Transformer'),
        'width' => 200,
        'type' => 'text',
        'search' => false,
        'orderby' => false,
    ),
    'active' => array(
        'title' => $this->getTranslator()->trans('Status', array(), 'Admin.Theme.Transformer'),
        'align' => 'center',
        'active' => 'status',
        'type' => 'bool',
        'width' => 25,
        'search' => false,
        'orderby' => false,
    ),
    'parameters' => array(
        'show_setting_link' => false,
    ),
);