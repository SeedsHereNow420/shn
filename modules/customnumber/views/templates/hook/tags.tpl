{*
* Custom Number
*
*  @author    motionSeed <ecommerce@motionseed.com>
*  @copyright 2016 motionSeed. All rights reserved.
*  @license   https://www.motionseed.com/en/license-module.html
*}
<div class="col-lg-2">
    <a href="" class="dropdown-toggle" tabindex="-1" data-toggle="dropdown">
        {l s='Supported tags' mod='customnumber'}
        <i class="icon-caret-down"></i>
    </a>
    <ul class="dropdown-menu supported-tags">
        <li><a data-tag="COUNTER">{l s='{COUNTER} : Current counter. You can configure it in Counter Configuration section.' mod='customnumber'}</a></li>
        <li><a data-tag="SHOP_ID">{l s='{SHOP_ID} : Shop ID' mod='customnumber'}</a></li>
        <li><a data-tag="CART_ID">{l s='{CART_ID} : Cart ID' mod='customnumber'}</a></li>
        <li><a data-tag="ORDER_ID">{l s='{ORDER_ID} : Order ID' mod='customnumber'}</a></li>
        <li><a data-tag="ORDER_NR">{l s='{ORDER_NR} : Order number' mod='customnumber'}</a></li>
        <li><a data-tag="CUSTOMER_ID">{l s='{CUSTOMER_ID} : Customer ID' mod='customnumber'}</a></li>
        <li><a data-tag="INVOICE_NR">{l s='{INVOICE_NR} : Invoice number' mod='customnumber'}</a></li>
        <li><a data-tag="YYYY">{l s='{YYYY} : Numeric representation of the year, 4 digits (e.g. : %s)' sprintf=$smarty.now|date_format:"Y" mod='customnumber'}</a></li>
        <li><a data-tag="YY">{l s='{YY} : Numeric representation of the year, 2 digits (e.g. : %s)' sprintf=$smarty.now|date_format:"y" mod='customnumber'}</a></li>
        <li><a data-tag="MM">{l s='{MM} : Numeric representation of the month, with leading zeros (e.g. : %s)' sprintf=$smarty.now|date_format:"03" mod='customnumber'}</a></li>
        <li><a data-tag="M">{l s='{M} : Numeric representation of the month, without leading zeros (e.g. : %s)' sprintf=$smarty.now|date_format:"3" mod='customnumber'}</a></li>
        <li><a data-tag="DD">{l s='{DD} : Day of the month, 2 digits with leading zeros (e.g. : %s)' sprintf=$smarty.now|date_format:"07" mod='customnumber'}</a></li>
        <li><a data-tag="D">{l s='{D} : Day of the month without leading zeros (e.g. : %s)' sprintf=$smarty.now|date_format:"7" mod='customnumber'}</a></li>
    </ul>
</div>
