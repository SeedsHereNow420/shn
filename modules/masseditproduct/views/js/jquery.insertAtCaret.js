/**
 * 2007-2016 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    SeoSA <885588@bk.ru>
 * @copyright 2012-2017 SeoSA
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */

$.fn.insertAtCaret = function (text)
{

    $.each(this, function (index, elem)
    {
        var j_element = $(elem).get(0);
        var scrollPos = j_element.scrollTop;
        var strPos = 0;
        var br = ((j_element.selectionStart || j_element.selectionStart == '0') ?
            "ff" : (document.selection ? "ie" : false ) );
        if (br == "ie") {
            j_element.focus();
            var range = document.selection.createRange();
            range.moveStart ('character', -j_element.value.length);
            strPos = range.text.length;
        }
        else if (br == "ff") strPos = j_element.selectionStart;

        var front = (j_element.value).substring(0,strPos);
        var back = (j_element.value).substring(strPos,j_element.value.length);
        j_element.value=front+text+back;
        strPos = strPos + text.length;
        if (br == "ie") {
            j_element.focus();
            var range = document.selection.createRange();
            range.moveStart ('character', -j_element.value.length);
            range.moveStart ('character', strPos);
            range.moveEnd ('character', 0);
            range.select();
        }
        else if (br == "ff") {
            j_element.selectionStart = strPos;
            j_element.selectionEnd = strPos;
            j_element.focus();
        }
        j_element.scrollTop = scrollPos;
    });
};

$.fn.insertAtCaretRedactor = function (text)
{
    $(this).insertHtml(text);
};