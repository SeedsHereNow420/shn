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
{block name='step'}
<section  id    = "{$identifier}"
          class = "{[
                      'checkout-step'   => true,
                      '-current'        => $step_is_current,
                      '-reachable'      => $step_is_reachable,
                      '-complete'       => $step_is_complete,
                      'js-current-step' => $step_is_current
                  ]|classnames}"
>
  <div class="step-title flex_container">
    <div class="heading_color fs_lg font-weight-bold">
      <i class="fto-ok-1 fs_md done"></i>
      <span class="step-number">{$position}</span>
      {$title}
    </div>
    <a href="javascript:;" class="step-edit text_color" title="{l s='Edit' d='Shop.Theme.Actions'}"><i class="fto-edit fs_md mar_r4 edit"></i>{l s='Edit' d='Shop.Theme.Actions'}</a>
  </div>

  <div class="content">
    {block name='step_content'}DUMMY STEP CONTENT{/block}
  </div>
</section>
{/block}