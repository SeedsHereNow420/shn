<?php
return array(
    'id_st_easy_content_element' => array(
        'title' => $this->getTranslator()->trans('Id', array(), 'Admin.Theme.Transformer'),
        'width' => 120,
        'type' => 'text',
        'search' => false,
        'orderby' => false
    ),
    'st_el_text' => array(
        'title' => $this->getTranslator()->trans('Content', array(), 'Admin.Theme.Transformer'),
        'width' => 140,
        'type' => 'text',
        'search' => false,
        'orderby' => false,
        'callback' => 'displayContent',
        'callback_object' => 'StEasyContent',
    ),
    'position' => array(
        'title' => $this->getTranslator()->trans('Position', array(), 'Admin.Theme.Transformer'),
        'width' => 40,
        'position' => 'position',
        'align' => 'center',
        'search' => false,
        'orderby' => false
    ),
    'active' => array(
        'title' => $this->getTranslator()->trans('Status', array(), 'Admin.Theme.Transformer'),
        'align' => 'center',
        'active' => 'status',
        'type' => 'bool',
        'width' => 25,
        'search' => false,
        'orderby' => false
    ),
);