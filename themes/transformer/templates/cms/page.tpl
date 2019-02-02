{**
 * 2007-2016 PrestaShop
 *
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
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2016 PrestaShop SA
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
{extends file='page.tpl'}

{*in order to hide page title, extend page_header_container, not page_title*}
{block name='page_header_container'}
{if !$sttheme.cms_title}
<h1 class="page_heading">{$cms.meta_title}</h1>
{/if}
{/block}

{block name='page_content_container'}
  <section id="content" class="page-content page-cms page-cms-{$cms.id}">
    {block name='cms_content'}
      <div class="style_content cms_content">{$cms.content nofilter}</div>
    {/block}

    {block name='hook_cms_dispute_information'}
      {hook h='displayCMSDisputeInformation'}
    {/block}

    {block name='hook_cms_print_button'}
      {hook h='displayCMSPrintButton'}
    {/block}
  </section>
{/block}

{block name="full_width_bottom" prepend}
    {hook h='displayCMSExtra'}
{/block}