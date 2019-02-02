{**
 *  2017 ModuleFactory.co
 *
 *  @author    ModuleFactory.co <info@modulefactory.co>
 *  @copyright 2017 ModuleFactory.co
 *  @license   ModuleFactory.co Commercial License
 *}

<script type="text/javascript">
    var FSAU = FSAU || { };
    FSAU.isPs15 = {if $is_ps_15}true{else}false{/if};
    FSAU.isPsMin16 = {if $is_ps_min_16}true{else}false{/if};
    FSAU.isPs16 = {if $is_ps_16}true{else}false{/if};
    FSAU.isPsMin17 = {if $is_ps_min_17}true{else}false{/if};
    FSAU.generateLinkRewriteUrl = '{$fsau_js.generate_link_rewrite_url|escape:'html':'UTF-8'|fsauCorrectTheMess}';
    FSAU.redirectUrl = '{$fsau_js.redirect_url|escape:'html':'UTF-8'|fsauCorrectTheMess}';
    FSAU.translateOk = '{l s='OK' mod='fsadvancedurl'}';
</script>