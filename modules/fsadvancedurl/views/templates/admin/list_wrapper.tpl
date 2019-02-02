{**
 *  2017 ModuleFactory.co
 *
 *  @author    ModuleFactory.co <info@modulefactory.co>
 *  @copyright 2017 ModuleFactory.co
 *  @license   ModuleFactory.co Commercial License
 *}

{if $is_ps_15}
<br /><br />
<fieldset>
    <legend>{$list_title_15|escape:'html':'UTF-8'}</legend>
{/if}
    {$generated_list|escape:'html':'UTF-8'|fsauCorrectTheMess}
{if $is_ps_15}
</fieldset>
<br /><br />
{/if}