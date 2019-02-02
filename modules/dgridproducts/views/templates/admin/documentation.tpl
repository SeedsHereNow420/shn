{*
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
*  @author    SeoSA <885588@bk.ru>
*  @copyright 2012-2017 SeoSA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

<div class="custom_bootstrap">
    <div class="form-group tab_manager clearfix">
        <div class="col-lg-3">
            <div class="panel">
                <div class="panel-body">
                    <ul class="tab_links nav nav-pills nav-stacked">
                        {$tree|no_escape}
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="panel">
                <div class="panel-body tab_contents">
                    {foreach item='documentation_page' from=$documentation_pages}
                        <div data-tab-content="{str_replace(array($documentation_folder|cat:'/', '.tpl'), '', $documentation_page)|no_escape}">
                            {include file=$documentation_page}
                        </div>
                    {/foreach}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $.fn.tabManager = function () {
        function TabManager(elem)
        {
            var self = this;
            self.element = $(elem);

            self.element.find('[data-tab]').live('click', function (e) {
                e.preventDefault();
                self.element.find('[data-tab-content]').hide();
                self.element.find('[data-tab-content="'+$(this).data('tab')+'"]').show();
            });

            self.element.find('[book-link]').live('click', function (e) {
                e.preventDefault();
                if (!self.element.find('[data-tab-content="'+$(this).attr('book-link')+'"]').length)
                    return false;
                self.element.find('[data-tab-content]').hide();
                self.element.find('[data-tab-content="'+$(this).attr('book-link')+'"]').show();
            });

            self.element.find('[data-tab]').eq(0).trigger('click');
        }

        $.each(this, function (index, elem) {
            if (!$(elem).data('tab-manager'))
                $(elem).data('tab-manager', new TabManager(elem));
        });
    };

    $('.tab_manager').tabManager();

    $('[name="doc_switch"]').live('change', function () {
        if (parseInt($(this).val()))
        {
            if ($(this).val() == 1) {
                $('.grid_products').show();
                $('.grid_combinations').hide()
            }
            else {
                $('.grid_products').hide();
                $('.grid_combinations').show()
            }
            $('.wrap_documentation').hide();
        }
        else
        {
            $('.wrap_not_documentation').hide();
            $('.wrap_documentation').show();
        }
    });
</script>