{**
 *  2017 ModuleFactory.co
 *
 *  @author    ModuleFactory.co <info@modulefactory.co>
 *  @copyright 2017 ModuleFactory.co
 *  @license   ModuleFactory.co Commercial License
 *}

<input type="checkbox" name="multishop_override_enabled[]" value="{$params.name|escape:'htmlall':'UTF-8'}"
       id="conf_helper_{$params.name|escape:'htmlall':'UTF-8'}" {if !$params.is_disabled} checked="checked"{/if}
       onclick="FSAU.toggleMultishopDefaultValue($(this), '{$params.name|escape:'htmlall':'UTF-8'}')">
<input type="hidden" name="multishop_override_fields[]" value="{$params.name|escape:'htmlall':'UTF-8'}">
<script>
    $(document).ready(function(){
        FSAU.toggleMultishopDefaultValue($('#conf_helper_{$params.name|escape:'htmlall':'UTF-8'}'), '{$params.name|escape:'htmlall':'UTF-8'}');
    });
</script>