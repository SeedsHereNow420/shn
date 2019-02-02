<?php

/* PrestaShopBundle:Admin/Module/Includes:menu_top.html.twig */
class __TwigTemplate_f1b09cd5d065e4234287555b494b7a0a71ff8e0a3ec90aba1332a9aa42826d69 extends Twig_Template
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
        $__internal_7cd04be5133ae926542e22ae270894ae55787b19e752cf0582265530717ccad8 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_7cd04be5133ae926542e22ae270894ae55787b19e752cf0582265530717ccad8->enter($__internal_7cd04be5133ae926542e22ae270894ae55787b19e752cf0582265530717ccad8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "PrestaShopBundle:Admin/Module/Includes:menu_top.html.twig"));

        // line 25
        echo "<div class=\"module-top-menu\">
    <div class=\"row\">
        <div class=\"col-md-8\">
            <div class=\"input-group module-search-block\">
                <input id=\"module-search-bar\" class=\"module-search-bar form-control\" type=\"text\">
                <button class=\"btn btn-primary pull-right search-button\">
                    <i class=\"material-icons\">search</i>
                    ";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Search", array(), "Admin.Actions"), "html", null, true);
        echo "
                </button>
            </div>
        </div>

        <div class=\"col-md-4 module-menu-item\">    
            ";
        // line 38
        if (array_key_exists("topMenuData", $context)) {
            // line 39
            echo "                ";
            $this->loadTemplate("PrestaShopBundle:Admin/Module/Includes:dropdown_categories.html.twig", "PrestaShopBundle:Admin/Module/Includes:menu_top.html.twig", 39)->display(array_merge($context, array("topMenuData" => ($context["topMenuData"] ?? $this->getContext($context, "topMenuData")))));
            // line 40
            echo "            ";
        }
        // line 41
        echo "            ";
        if ((array_key_exists("requireFilterStatus", $context) && (($context["requireFilterStatus"] ?? $this->getContext($context, "requireFilterStatus")) == true))) {
            // line 42
            echo "                ";
            $this->loadTemplate("PrestaShopBundle:Admin/Module/Includes:dropdown_status.html.twig", "PrestaShopBundle:Admin/Module/Includes:menu_top.html.twig", 42)->display($context);
            // line 43
            echo "            ";
        }
        // line 44
        echo "        </div>
    </div>
</div>

<hr class=\"top-menu-separator\"/>

";
        // line 50
        $context["js_translatable"] = twig_array_merge(array("Search - placeholder" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Search modules: keyword, name, author...", array(), "Admin.Modules.Help")),         // line 52
($context["js_translatable"] ?? $this->getContext($context, "js_translatable")));
        
        $__internal_7cd04be5133ae926542e22ae270894ae55787b19e752cf0582265530717ccad8->leave($__internal_7cd04be5133ae926542e22ae270894ae55787b19e752cf0582265530717ccad8_prof);

    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Module/Includes:menu_top.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 52,  65 => 50,  57 => 44,  54 => 43,  51 => 42,  48 => 41,  45 => 40,  42 => 39,  40 => 38,  31 => 32,  22 => 25,);
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
<div class=\"module-top-menu\">
    <div class=\"row\">
        <div class=\"col-md-8\">
            <div class=\"input-group module-search-block\">
                <input id=\"module-search-bar\" class=\"module-search-bar form-control\" type=\"text\">
                <button class=\"btn btn-primary pull-right search-button\">
                    <i class=\"material-icons\">search</i>
                    {{ 'Search'|trans({}, 'Admin.Actions') }}
                </button>
            </div>
        </div>

        <div class=\"col-md-4 module-menu-item\">    
            {% if topMenuData is defined %}
                {% include 'PrestaShopBundle:Admin/Module/Includes:dropdown_categories.html.twig' with { 'topMenuData': topMenuData } %}
            {% endif %}
            {% if requireFilterStatus is defined and requireFilterStatus == true %}
                {% include 'PrestaShopBundle:Admin/Module/Includes:dropdown_status.html.twig' %}
            {% endif %}
        </div>
    </div>
</div>

<hr class=\"top-menu-separator\"/>

{% set js_translatable = {
\"Search - placeholder\": \"Search modules: keyword, name, author...\"|trans({}, 'Admin.Modules.Help'),
}|merge(js_translatable) %}
", "PrestaShopBundle:Admin/Module/Includes:menu_top.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Module/Includes/menu_top.html.twig");
    }
}
