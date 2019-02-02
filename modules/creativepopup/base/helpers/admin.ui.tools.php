<?php
/**
* Creative Popup v1.6.4 - https://creativepopup.webshopworks.com
*
*  @author    WebshopWorks <info@webshopworks.com>
*  @copyright 2018 WebshopWorks
*  @license   One Domain Licence
*/

defined('_PS_VERSION_') or exit;

function cp_option_row($type, $default, $current, $attrs = array(), $trClasses = '', $forceOptionVal = false)
{

    $wrapperStart = '';
    $wrapperEnd = '';
    $control = '';


    if (! empty($default['advanced'])) {
        $trClasses .= ' cp-advanced cp-hidden';
        $wrapperStart = '<div><i class="dashicons dashicons-flag" data-help="'.cp__('Advanced option').'"></i>';
        $wrapperEnd = '</div>';
    }


    switch ($type) {
        case 'input':
            $control = cp_get_input($default, $current, $attrs, true);
            break;

        case 'checkbox':
            $control = cp_get_checkbox($default, $current, $attrs, true);
            break;

        case 'select':
            $control = cp_get_select($default, $current, $attrs, $forceOptionVal, true);
            break;
    }

    $trClasses = ! empty($trClasses) ? ' class="'.$trClasses.'"' : '';

    echo '<tr'.$trClasses.'>
    <td>'.$wrapperStart.''.$default['name'].''.$wrapperEnd.'</td>
    <td>'.$control.'</td>
    <td class="desc">'.(isset($default['desc']) ? $default['desc'] : '').'</td>
</tr>';
}

function cp_get_input($default, $current, $attrs = array(), $return = false)
{

    // Markup
    $el         = CpQuery::newDocumentHTML('<input>');
    $attributes = array();

    $attributes['value'] = $default['value'];
    $attributes['type']  = is_string($default['value']) ? 'text' : 'number';
    $attributes['name']  = $name = is_string($default['keys']) ? $default['keys'] : $default['keys'][0];

    $attrs = isset($default['attrs']) ? array_merge($default['attrs'], $attrs) : $attrs;
    if (! empty($attrs) && is_array($attrs)) {
        $attributes = array_merge($attributes, $attrs);
    }

    if (isset($default['tooltip'])) {
        $attributes['data-help'] = $default['tooltip'];
    }

    // Combo box
    if (! empty($attributes['data-options'])) {
        if (empty($attributes['class'])) {
            $attributes['class'] = '';
        }

        $attributes['class'] .= ' km-combo-input';
        // $attributes['autocomplete'] = 'off';
    }

    // Override the default
    if (isset($current[$name]) && $current[$name] !== '') {
        $attributes['value'] = htmlspecialchars(cp_ss($current[$name]));
    }

    $attributes['data-value'] = $attributes['value'];
    $el->attr($attributes);

    $ret = (string) $el;
    CpQuery::unloadDocuments();

    if ($return) {
        return $ret;
    } else {
        echo $ret;
    }
}



function cp_get_checkbox($default, $current, $attrs = array(), $return = false)
{

    // Markup
    $el         = CpQuery::newDocumentHTML('<input>');
    $attributes = array();

    $attributes['value'] = $default['value'];
    $attributes['type']  = 'checkbox';
    $attributes['name']  = $name = is_string($default['keys']) ? $default['keys'] : $default['keys'][0];

    $attrs = isset($default['attrs']) ? array_merge($default['attrs'], $attrs) : $attrs;
    if (! empty($attrs) && is_array($attrs)) {
        $attributes = array_merge($attributes, $attrs);
    }

    if (isset($default['tooltip'])) {
        $attributes['data-help'] = $default['tooltip'];
    }

    // Checked?
    $attributes['data-value'] = false;
    if ($default['value'] === true && (! isset($current[$name]) || count($current) < 3)) {
        $attributes['checked'] = 'checked';
        $attributes['data-value'] = 'true';
    } elseif (isset($current[$name]) && $current[$name] != false && $current[$name] !== 'false') {
        $attributes['checked'] = 'checked';
        $attributes['data-value'] = 'true';
    }

    $attributes['value'] = $attributes['data-value'];
    $el->attr($attributes);

    $ret = (string) $el;
    CpQuery::unloadDocuments();

    if ($return) {
        return $ret;
    } else {
        echo $ret;
    }
}



function cp_get_select($default, $current, $attrs = array(), $forceOptionVal = false, $return = false)
{

    // Var to hold data to print
    $el = CpQuery::newDocumentHTML('<select>');
    $attributes = array();
    $options = array();
    $listItems = array();

    $attributes['value'] = $value = $default['value'];
    $attributes['name']  = $name  = is_string($default['keys']) ? $default['keys'] : $default['keys'][0];

    // Attributes
    $attrs = isset($default['attrs']) ? array_merge($default['attrs'], $attrs) : $attrs;
    if (! empty($attrs) && is_array($attrs)) {
        $attributes = array_merge($attributes, $attrs);
    }

    // Get options
    if (isset($default['options']) && is_array($default['options'])) {
        $options = $default['options'];
    } elseif (isset($attrs['options']) && is_array($attrs['options'])) {
        $options = $attrs['options'];
    }

    // Override the default
    if (isset($current[$name]) && $current[$name] !== '') {
        $attributes['value'] = $value = $current[$name];
    }

    // Tooltip
    if (isset($default['tooltip'])) {
        $attributes['data-help'] = $default['tooltip'];
    }

    // Add options
    foreach ($options as $name => $val) {
        $name = (is_string($name) || $forceOptionVal) ? $name : $val;
        $name = ($name === 'zero') ? 0 : $name;

        $checked = (is_array($value) ? in_array($name, $value) : $name == $value) ? ' selected="selected"' : '';
        $listItems[] = "<option value=\"$name\" $checked>$val</option>";
    }

    $attributes['data-value'] = $attributes['value'];
    $el->append(implode('', $listItems))->attr($attributes);

    $ret = (string) $el;
    CpQuery::unloadDocuments();

    if ($return) {
        return $ret;
    } else {
        echo $ret;
    }
}
