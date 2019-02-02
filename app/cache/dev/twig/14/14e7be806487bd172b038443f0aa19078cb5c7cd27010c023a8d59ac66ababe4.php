<?php

/* PrestaShopBundle:Admin/Module:catalog.html.twig */
class __TwigTemplate_e180ca7fa41d33493bfa7fccd55a79f10309c2e7ea24f0353f6e769732e70d18 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 25
        $this->parent = $this->loadTemplate("PrestaShopBundle:Admin:layout.html.twig", "PrestaShopBundle:Admin/Module:catalog.html.twig", 25);
        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "PrestaShopBundle:Admin:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_760701ab17ae1210735053cebd3071f55255c7d1260f67446dfb3730b5b34535 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_760701ab17ae1210735053cebd3071f55255c7d1260f67446dfb3730b5b34535->enter($__internal_760701ab17ae1210735053cebd3071f55255c7d1260f67446dfb3730b5b34535_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "PrestaShopBundle:Admin/Module:catalog.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_760701ab17ae1210735053cebd3071f55255c7d1260f67446dfb3730b5b34535->leave($__internal_760701ab17ae1210735053cebd3071f55255c7d1260f67446dfb3730b5b34535_prof);

    }

    // line 27
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_dee426a9969c47dd1cfbd77b2099bb6c25b4bb1677632cf8ca5d7ffaf9fd0f15 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_dee426a9969c47dd1cfbd77b2099bb6c25b4bb1677632cf8ca5d7ffaf9fd0f15->enter($__internal_dee426a9969c47dd1cfbd77b2099bb6c25b4bb1677632cf8ca5d7ffaf9fd0f15_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 28
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <link rel=\"stylesheet\" href=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/css/bundle/module/drop.css"), "html", null, true);
        echo "\" />
    <link rel=\"stylesheet\" href=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/css/bundle/plugins/jquery.pstagger.css"), "html", null, true);
        echo "\" />
";
        
        $__internal_dee426a9969c47dd1cfbd77b2099bb6c25b4bb1677632cf8ca5d7ffaf9fd0f15->leave($__internal_dee426a9969c47dd1cfbd77b2099bb6c25b4bb1677632cf8ca5d7ffaf9fd0f15_prof);

    }

    // line 33
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_60c9f647e76868ed81d562073fee326a42a103470635b0a27c7eda82c3916a1f = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_60c9f647e76868ed81d562073fee326a42a103470635b0a27c7eda82c3916a1f->enter($__internal_60c9f647e76868ed81d562073fee326a42a103470635b0a27c7eda82c3916a1f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 34
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script src=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/plugins/jquery.pstagger.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/module/loader.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/module/module_card.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/module/module.js"), "html", null, true);
        echo "\"></script>
    ";
        // line 39
        if ($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "request", array()), "get", array(0 => "filterCategoryTab"), "method")) {
            // line 40
            echo "      <script>
        \$('body').on('moduleCatalogLoaded', function() {
          \$('.module-category-menu[data-category-tab=\"";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "request", array()), "get", array(0 => "filterCategoryTab"), "method"), "html", null, true);
            echo "\"]').click();
      });
      </script>
    ";
        }
        
        $__internal_60c9f647e76868ed81d562073fee326a42a103470635b0a27c7eda82c3916a1f->leave($__internal_60c9f647e76868ed81d562073fee326a42a103470635b0a27c7eda82c3916a1f_prof);

    }

    // line 48
    public function block_content($context, array $blocks = array())
    {
        $__internal_36f55283c167dc55af76f12cf82b4aa44b9c35ac2653e3574b504f77c3daae0c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_36f55283c167dc55af76f12cf82b4aa44b9c35ac2653e3574b504f77c3daae0c->enter($__internal_36f55283c167dc55af76f12cf82b4aa44b9c35ac2653e3574b504f77c3daae0c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 49
        echo "    <div class=\"row\">
        <div class=\"col-lg-10 col-lg-offset-1 module-catalog-page\">
            ";
        // line 52
        echo "            ";
        $this->loadTemplate("PrestaShopBundle:Admin/Module/Includes:modal_addons_connect.html.twig", "PrestaShopBundle:Admin/Module:catalog.html.twig", 52)->display(array_merge($context, array("level" => ($context["level"] ?? $this->getContext($context, "level")), "errorMessage" => ($context["errorMessage"] ?? $this->getContext($context, "errorMessage")))));
        // line 53
        echo "            ";
        // line 54
        echo "            ";
        $this->loadTemplate("PrestaShopBundle:Admin/Module/Includes:modal_import.html.twig", "PrestaShopBundle:Admin/Module:catalog.html.twig", 54)->display(array_merge($context, array("level" => ($context["level"] ?? $this->getContext($context, "level")), "errorMessage" => ($context["errorMessage"] ?? $this->getContext($context, "errorMessage")))));
        // line 55
        echo "            ";
        // line 56
        echo "            ";
        $this->loadTemplate("PrestaShopBundle:Admin/Module/Includes:menu_top.html.twig", "PrestaShopBundle:Admin/Module:catalog.html.twig", 56)->display($context);
        // line 57
        echo "            ";
        // line 58
        echo "            ";
        $this->loadTemplate("PrestaShopBundle:Admin/Module/Includes:grid_loader.html.twig", "PrestaShopBundle:Admin/Module:catalog.html.twig", 58)->display($context);
        // line 59
        echo "            ";
        // line 60
        echo "            ";
        if ($this->getAttribute(($context["topMenuData"] ?? null), "categories", array(), "any", true, true)) {
            // line 61
            echo "                ";
            $this->loadTemplate("PrestaShopBundle:Admin/Module/Includes:categories_grid.html.twig", "PrestaShopBundle:Admin/Module:catalog.html.twig", 61)->display(array_merge($context, array("categories" => $this->getAttribute(($context["topMenuData"] ?? $this->getContext($context, "topMenuData")), "categories", array()))));
            // line 62
            echo "            ";
        }
        // line 63
        echo "        </div>
    </div>
";
        
        $__internal_36f55283c167dc55af76f12cf82b4aa44b9c35ac2653e3574b504f77c3daae0c->leave($__internal_36f55283c167dc55af76f12cf82b4aa44b9c35ac2653e3574b504f77c3daae0c_prof);

    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Module:catalog.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  144 => 63,  141 => 62,  138 => 61,  135 => 60,  133 => 59,  130 => 58,  128 => 57,  125 => 56,  123 => 55,  120 => 54,  118 => 53,  115 => 52,  111 => 49,  105 => 48,  93 => 42,  89 => 40,  87 => 39,  83 => 38,  79 => 37,  75 => 36,  71 => 35,  66 => 34,  60 => 33,  51 => 30,  47 => 29,  42 => 28,  36 => 27,  11 => 25,);
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
{% extends 'PrestaShopBundle:Admin:layout.html.twig' %}

{% block stylesheets %}
    {{ parent() }}
    <link rel=\"stylesheet\" href=\"{{ asset('themes/default/css/bundle/module/drop.css') }}\" />
    <link rel=\"stylesheet\" href=\"{{ asset('themes/default/css/bundle/plugins/jquery.pstagger.css') }}\" />
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <script src=\"{{ asset('themes/default/js/bundle/plugins/jquery.pstagger.js') }}\"></script>
    <script src=\"{{ asset('themes/default/js/bundle/module/loader.js') }}\"></script>
    <script src=\"{{ asset('themes/default/js/bundle/module/module_card.js') }}\"></script>
    <script src=\"{{ asset('themes/default/js/bundle/module/module.js') }}\"></script>
    {% if app.request.get('filterCategoryTab') %}
      <script>
        \$('body').on('moduleCatalogLoaded', function() {
          \$('.module-category-menu[data-category-tab=\"{{ app.request.get('filterCategoryTab') }}\"]').click();
      });
      </script>
    {% endif %}
{% endblock %}

{% block content %}
    <div class=\"row\">
        <div class=\"col-lg-10 col-lg-offset-1 module-catalog-page\">
            {# Addons connect modal #}
            {% include 'PrestaShopBundle:Admin/Module/Includes:modal_addons_connect.html.twig' with { 'level' : level, 'errorMessage' : errorMessage } %}
            {# Contains toolbar-nav for module page #}
            {% include 'PrestaShopBundle:Admin/Module/Includes:modal_import.html.twig' with { 'level' : level, 'errorMessage' : errorMessage } %}
            {# Contains menu with Selection/Categories/Popular and Tag Search #}
            {% include 'PrestaShopBundle:Admin/Module/Includes:menu_top.html.twig' %}
            {# Temporary loader until ajax has finished and display the full catalog #}
            {% include 'PrestaShopBundle:Admin/Module/Includes:grid_loader.html.twig' %}
            {# Module Categories Grid #}
            {% if topMenuData.categories is defined %}
                {% include 'PrestaShopBundle:Admin/Module/Includes:categories_grid.html.twig' with { 'categories' : topMenuData.categories }  %}
            {% endif %}
        </div>
    </div>
{% endblock %}
", "PrestaShopBundle:Admin/Module:catalog.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Module/catalog.html.twig");
    }
}
