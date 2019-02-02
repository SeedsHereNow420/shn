<?php

/* PrestaShopBundle:Admin/Module/Includes:card_grid_addons.html.twig */
class __TwigTemplate_cc7f62d990d93642c81e955d4f5e4502620007a5be3eb3f3f21f242de80a1f4c extends Twig_Template
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
        $__internal_773ec2c4714b6b7d1e87f3393791439b1976dd3a6753cf1582167a496dc74cc7 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_773ec2c4714b6b7d1e87f3393791439b1976dd3a6753cf1582167a496dc74cc7->enter($__internal_773ec2c4714b6b7d1e87f3393791439b1976dd3a6753cf1582167a496dc74cc7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "PrestaShopBundle:Admin/Module/Includes:card_grid_addons.html.twig"));

        // line 25
        echo "<div class=\"module-addons-item-grid col-md-12 col-lg-6 col-xl-3\">
    <div class=\"module-addons-item-wrapper-grid\">
      <span class=\"module-icon-addons-exit-grid\">
        <img src=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/img/preston.png"), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Exit to PrestaShop Addons Marketplace", array(), "Admin.Modules.Feature"), "html", null, true);
        echo "\" />
      </span>
      ";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("See all results for your search on", array(), "Admin.Modules.Feature"), "html", null, true);
        echo "<br/>
      <a class=\"url\" href=\"#\">";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("PrestaShop Addons Marketplace", array(), "Admin.Modules.Feature"), "html", null, true);
        echo "</a>
    </div>
</div>
";
        
        $__internal_773ec2c4714b6b7d1e87f3393791439b1976dd3a6753cf1582167a496dc74cc7->leave($__internal_773ec2c4714b6b7d1e87f3393791439b1976dd3a6753cf1582167a496dc74cc7_prof);

    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Module/Includes:card_grid_addons.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 31,  34 => 30,  27 => 28,  22 => 25,);
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
<div class=\"module-addons-item-grid col-md-12 col-lg-6 col-xl-3\">
    <div class=\"module-addons-item-wrapper-grid\">
      <span class=\"module-icon-addons-exit-grid\">
        <img src=\"{{ asset('themes/default/img/preston.png') }}\" alt=\"{{ 'Exit to PrestaShop Addons Marketplace'|trans({}, 'Admin.Modules.Feature') }}\" />
      </span>
      {{ 'See all results for your search on'|trans({}, 'Admin.Modules.Feature') }}<br/>
      <a class=\"url\" href=\"#\">{{ 'PrestaShop Addons Marketplace'|trans({}, 'Admin.Modules.Feature') }}</a>
    </div>
</div>
", "PrestaShopBundle:Admin/Module/Includes:card_grid_addons.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Module/Includes/card_grid_addons.html.twig");
    }
}
