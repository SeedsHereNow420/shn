<?php

/* PrestaShopBundle:Admin/Module/Includes:card_list_addons.html.twig */
class __TwigTemplate_b543bbb554ada4060b4132cf2a094e061521524a23da8036948e0e4cee107088 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_7490811f2185c3e9cf364e6f14a3dc458c30924b5bda4979b53df733d73c9e28 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_7490811f2185c3e9cf364e6f14a3dc458c30924b5bda4979b53df733d73c9e28->enter($__internal_7490811f2185c3e9cf364e6f14a3dc458c30924b5bda4979b53df733d73c9e28_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "PrestaShopBundle:Admin/Module/Includes:card_list_addons.html.twig"));

        // line 25
        echo "<div class=\"module-item-list module-addons-item-list col-md-12\">
    <div class=\"container-fluid\">
        <div class=\"module-addons-item-wrapper-list\">
          <span class=\"module-icon-addons-exit-list\">
            <img src=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/img/preston.png"), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Exit to PrestaShop Addons Marketplace", array(), "Admin.Modules.Feature"), "html", null, true);
        echo "\" />
          </span>
          ";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("See all results for your search on", array(), "Admin.Modules.Feature"), "html", null, true);
        echo "<br/>
          <a class=\"url\" href=\"#\">";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("PrestaShop Addons Marketplace", array(), "Admin.Modules.Feature"), "html", null, true);
        echo "</a>
        </div>
    </div>
</div>
";
        
        $__internal_7490811f2185c3e9cf364e6f14a3dc458c30924b5bda4979b53df733d73c9e28->leave($__internal_7490811f2185c3e9cf364e6f14a3dc458c30924b5bda4979b53df733d73c9e28_prof);

    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Module/Includes:card_list_addons.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 32,  35 => 31,  28 => 29,  22 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{#**
 * 2007-2017 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/OSL-3.0
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
 * @copyright 2007-2017 PrestaShop SA
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *#}
<div class=\"module-item-list module-addons-item-list col-md-12\">
    <div class=\"container-fluid\">
        <div class=\"module-addons-item-wrapper-list\">
          <span class=\"module-icon-addons-exit-list\">
            <img src=\"{{ asset('themes/default/img/preston.png') }}\" alt=\"{{ 'Exit to PrestaShop Addons Marketplace'|trans({}, 'Admin.Modules.Feature') }}\" />
          </span>
          {{ 'See all results for your search on'|trans({}, 'Admin.Modules.Feature') }}<br/>
          <a class=\"url\" href=\"#\">{{ 'PrestaShop Addons Marketplace'|trans({}, 'Admin.Modules.Feature') }}</a>
        </div>
    </div>
</div>
", "PrestaShopBundle:Admin/Module/Includes:card_list_addons.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Module/Includes/card_list_addons.html.twig");
    }
}
