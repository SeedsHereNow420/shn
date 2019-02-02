<?php

/* PrestaShopBundle:Admin/Module/Includes:sorting.html.twig */
class __TwigTemplate_891c4a0abb9da279b1590d63d003eaeb459ad5ec28e0ff91526b4d93a86ac165 extends Twig_Template
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
        $__internal_7f3df26a2f9d14cb57f834a911739a382f80dcadffe1b51aaf421e2e9e20b919 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_7f3df26a2f9d14cb57f834a911739a382f80dcadffe1b51aaf421e2e9e20b919->enter($__internal_7f3df26a2f9d14cb57f834a911739a382f80dcadffe1b51aaf421e2e9e20b919_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "PrestaShopBundle:Admin/Module/Includes:sorting.html.twig"));

        // line 25
        echo "<div class=\"module-sorting-menu\">
    <div class=\"row\">
        <div class=\"col-lg-6\">
            <div class=\"module-sorting-search-wording\">
                <span class=\"module-search-result-wording\">";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("%nbModules% modules and services selected for you", array("%nbModules%" => ($context["totalModules"] ?? $this->getContext($context, "totalModules"))), "Admin.Modules.Feature"), "html", null, true);
        echo "</span>
                <span class=\"help-box\" data-toggle=\"popover\"
                    data-title=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Selection", array(), "Admin.Modules.Feature"), "html", null, true);
        echo "\"
                    data-content=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Customize your store with this selection of modules recommended for your shop, based on your country, language and version of PrestaShop. It includes the most popular modules from our Addons marketplace, and free partner modules.", array(), "Admin.Modules.Help"), "html", null, true);
        echo "\">
                </span>
            </div>
        </div>
        <div class=\"col-lg-6\">
            <div class=\"module-sorting module-sorting-author pull-right\">
                <select data-toggle=\"select2\" class=\"sort-component\">
                  <option value=\"\" disabled selected>- ";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Sort by", array(), "Admin.Actions"), "html", null, true);
        echo " -</option>
                  <option value=\"name\">";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Name", array(), "Admin.Global"), "html", null, true);
        echo "</option>
                  <option value=\"price\">";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Increasing Price", array(), "Admin.Modules.Feature"), "html", null, true);
        echo "</option>
                  <option value=\"price-desc\">";
        // line 42
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Decreasing Price", array(), "Admin.Modules.Feature"), "html", null, true);
        echo "</option>
                  <option value=\"scoring-desc\">";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Popularity", array(), "Admin.Modules.Feature"), "html", null, true);
        echo "</option>
                </select>
            </div>
        </div>
    </div>
</div>
";
        
        $__internal_7f3df26a2f9d14cb57f834a911739a382f80dcadffe1b51aaf421e2e9e20b919->leave($__internal_7f3df26a2f9d14cb57f834a911739a382f80dcadffe1b51aaf421e2e9e20b919_prof);

    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Module/Includes:sorting.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 43,  59 => 42,  55 => 41,  51 => 40,  47 => 39,  37 => 32,  33 => 31,  28 => 29,  22 => 25,);
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
<div class=\"module-sorting-menu\">
    <div class=\"row\">
        <div class=\"col-lg-6\">
            <div class=\"module-sorting-search-wording\">
                <span class=\"module-search-result-wording\">{{ '%nbModules% modules and services selected for you'|trans({'%nbModules%' : totalModules}, 'Admin.Modules.Feature') }}</span>
                <span class=\"help-box\" data-toggle=\"popover\"
                    data-title=\"{{ \"Selection\"|trans({}, 'Admin.Modules.Feature') }}\"
                    data-content=\"{{ \"Customize your store with this selection of modules recommended for your shop, based on your country, language and version of PrestaShop. It includes the most popular modules from our Addons marketplace, and free partner modules.\"|trans({}, 'Admin.Modules.Help') }}\">
                </span>
            </div>
        </div>
        <div class=\"col-lg-6\">
            <div class=\"module-sorting module-sorting-author pull-right\">
                <select data-toggle=\"select2\" class=\"sort-component\">
                  <option value=\"\" disabled selected>- {{ 'Sort by'|trans({}, 'Admin.Actions') }} -</option>
                  <option value=\"name\">{{ 'Name'|trans({}, 'Admin.Global') }}</option>
                  <option value=\"price\">{{ 'Increasing Price'|trans({}, 'Admin.Modules.Feature') }}</option>
                  <option value=\"price-desc\">{{ 'Decreasing Price'|trans({}, 'Admin.Modules.Feature') }}</option>
                  <option value=\"scoring-desc\">{{ 'Popularity'|trans({}, 'Admin.Modules.Feature') }}</option>
                </select>
            </div>
        </div>
    </div>
</div>
", "PrestaShopBundle:Admin/Module/Includes:sorting.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Module/Includes/sorting.html.twig");
    }
}
