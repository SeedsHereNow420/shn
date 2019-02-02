{**
 *  2017 ModuleFactory.co
 *
 *  @author    ModuleFactory.co <info@modulefactory.co>
 *  @copyright 2017 ModuleFactory.co
 *  @license   ModuleFactory.co Commercial License
 *}

{extends file="helpers/form/form.tpl"}

{block name="legend"}
    {$smarty.block.parent}
    {if isset($field.show_multishop_header) && $field.show_multishop_header}
    <div class="well clearfix">
        <label class="control-label col-lg-3">
            <i class="icon-sitemap"></i> {l s='Multistore' mod='fsadvancedurl'}
        </label>
        <div class="col-lg-9">
            <div class="row">
                <div class="col-lg-12">
                    <p class="help-block">
                        <strong>{l s='You are editing this page for a specific shop or group.' mod='fsadvancedurl'}</strong><br />
                        {l s='If you check a field, change its value, and save, the multistore behavior will not apply to this shop (or group), for this particular parameter.' mod='fsadvancedurl'}
                    </p>
                </div>
            </div>
        </div>
    </div>
    {/if}
{/block}