<?php

/* PrestaShopBundle:Admin:layout.html.twig */
class __TwigTemplate_9a9fa52bbde1ea843f8858b023e0a63efd8ecdbde39c19e48338473570910cf0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'translate_javascripts' => array($this, 'block_translate_javascripts'),
            'content_header' => array($this, 'block_content_header'),
            'sidebar_right' => array($this, 'block_sidebar_right'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 25
        return $this->loadTemplate(twig_template_from_string($this->env, $this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getLegacyLayout($this->getAttribute($this->getAttribute($this->getAttribute(        // line 27
($context["app"] ?? $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_legacy_controller"), "method"), ((        // line 28
array_key_exists("layoutTitle", $context)) ? (($context["layoutTitle"] ?? $this->getContext($context, "layoutTitle"))) : ("")), ((        // line 29
array_key_exists("layoutHeaderToolbarBtn", $context)) ? (($context["layoutHeaderToolbarBtn"] ?? $this->getContext($context, "layoutHeaderToolbarBtn"))) : (array())), ((        // line 30
array_key_exists("layoutDisplayType", $context)) ? (($context["layoutDisplayType"] ?? $this->getContext($context, "layoutDisplayType"))) : ("")), ((        // line 31
array_key_exists("showContentHeader", $context)) ? (($context["showContentHeader"] ?? $this->getContext($context, "showContentHeader"))) : (true)), ((        // line 32
array_key_exists("headerTabContent", $context)) ? (($context["headerTabContent"] ?? $this->getContext($context, "headerTabContent"))) : ("")), ((        // line 33
array_key_exists("enableSidebar", $context)) ? (($context["enableSidebar"] ?? $this->getContext($context, "enableSidebar"))) : (false)), ((        // line 34
array_key_exists("help_link", $context)) ? (($context["help_link"] ?? $this->getContext($context, "help_link"))) : ("")))), "PrestaShopBundle:Admin:layout.html.twig", 25);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_251c5a350666b4d2f7b1a298b28fed0d861736da8ce29061d61240c65050fc93 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_251c5a350666b4d2f7b1a298b28fed0d861736da8ce29061d61240c65050fc93->enter($__internal_251c5a350666b4d2f7b1a298b28fed0d861736da8ce29061d61240c65050fc93_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "PrestaShopBundle:Admin:layout.html.twig"));

        // line 38
        $context["ps"] = $this->loadTemplate("PrestaShopBundle:Admin:macros.html.twig", "PrestaShopBundle:Admin:layout.html.twig", 38);
        // line 25
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_251c5a350666b4d2f7b1a298b28fed0d861736da8ce29061d61240c65050fc93->leave($__internal_251c5a350666b4d2f7b1a298b28fed0d861736da8ce29061d61240c65050fc93_prof);

    }

    // line 40
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_9681931e17f25cb36de29dcc80efaa59e13dfbbc21cacb473866480867ba260b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_9681931e17f25cb36de29dcc80efaa59e13dfbbc21cacb473866480867ba260b->enter($__internal_9681931e17f25cb36de29dcc80efaa59e13dfbbc21cacb473866480867ba260b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 41
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <link rel=\"stylesheet\" href=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/css/bundle/right-sidebar.css"), "html", null, true);
        echo "\" />
";
        
        $__internal_9681931e17f25cb36de29dcc80efaa59e13dfbbc21cacb473866480867ba260b->leave($__internal_9681931e17f25cb36de29dcc80efaa59e13dfbbc21cacb473866480867ba260b_prof);

    }

    // line 45
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_8df6b3a429da2c826768c807e9848fff0efd34320a5c38a0eece4897ed7f493c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_8df6b3a429da2c826768c807e9848fff0efd34320a5c38a0eece4897ed7f493c->enter($__internal_8df6b3a429da2c826768c807e9848fff0efd34320a5c38a0eece4897ed7f493c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 46
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/default.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/right-sidebar.js"), "html", null, true);
        echo "\"></script>
";
        
        $__internal_8df6b3a429da2c826768c807e9848fff0efd34320a5c38a0eece4897ed7f493c->leave($__internal_8df6b3a429da2c826768c807e9848fff0efd34320a5c38a0eece4897ed7f493c_prof);

    }

    // line 50
    public function block_translate_javascripts($context, array $blocks = array())
    {
        $__internal_5ff506124d02a7bf988162252993c136dd43a2fc23fe7d211b5638709ac0348e = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_5ff506124d02a7bf988162252993c136dd43a2fc23fe7d211b5638709ac0348e->enter($__internal_5ff506124d02a7bf988162252993c136dd43a2fc23fe7d211b5638709ac0348e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "translate_javascripts"));

        // line 51
        echo "    <script>
        var translate_javascripts = ";
        // line 52
        echo twig_jsonencode_filter(($context["js_translatable"] ?? $this->getContext($context, "js_translatable")));
        echo ";
        var PS_ALLOW_ACCENTED_CHARS_URL = ";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('PrestaShopBundle\Twig\DataFormatterExtension')->intCast($this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getConfiguration("PS_ALLOW_ACCENTED_CHARS_URL")), "html", null, true);
        echo ";
    </script>
";
        
        $__internal_5ff506124d02a7bf988162252993c136dd43a2fc23fe7d211b5638709ac0348e->leave($__internal_5ff506124d02a7bf988162252993c136dd43a2fc23fe7d211b5638709ac0348e_prof);

    }

    // line 57
    public function block_content_header($context, array $blocks = array())
    {
        $__internal_e88770627e5d246659b9699434f3f71fb53d67a496fd2796b9dfdd864de77992 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_e88770627e5d246659b9699434f3f71fb53d67a496fd2796b9dfdd864de77992->enter($__internal_e88770627e5d246659b9699434f3f71fb53d67a496fd2796b9dfdd864de77992_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content_header"));

        // line 58
        echo "    ";
        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", array()), "flashbag", array()), "peek", array(0 => "error"), "method")) > 0)) {
            // line 59
            echo "        <div class=\"flash-message-list alert alert-danger\">
            <ul>
            ";
            // line 61
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "error"), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
                // line 62
                echo "                <li>";
                echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
                echo "</li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 64
            echo "            </ul>
        </div>
    ";
        }
        // line 67
        echo "    ";
        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", array()), "flashbag", array()), "peek", array(0 => "failure"), "method")) > 0)) {
            // line 68
            echo "        <div class=\"flash-message-list alert alert-danger\">
            <ul>
            ";
            // line 70
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "failure"), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
                // line 71
                echo "                <li>";
                echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
                echo "</li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 73
            echo "            </ul>
        </div>
    ";
        }
        // line 76
        echo "    ";
        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", array()), "flashbag", array()), "peek", array(0 => "success"), "method")) > 0)) {
            // line 77
            echo "        <div class=\"flash-message-list alert alert-success\">
            <ul>
            ";
            // line 79
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "success"), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
                // line 80
                echo "                <li>";
                echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
                echo "</li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 82
            echo "            </ul>
        </div>
    ";
        }
        
        $__internal_e88770627e5d246659b9699434f3f71fb53d67a496fd2796b9dfdd864de77992->leave($__internal_e88770627e5d246659b9699434f3f71fb53d67a496fd2796b9dfdd864de77992_prof);

    }

    // line 87
    public function block_sidebar_right($context, array $blocks = array())
    {
        $__internal_cf715eb332d3a06e42250048be3d2cad00db0c47748423980dcd5283de161068 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_cf715eb332d3a06e42250048be3d2cad00db0c47748423980dcd5283de161068->enter($__internal_cf715eb332d3a06e42250048be3d2cad00db0c47748423980dcd5283de161068_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sidebar_right"));

        // line 88
        echo "    <nav
        id=\"right-sidebar\"
        role=\"navigation\"
        class=\"col-xs-5 col-sm-4 col-md-4 col-lg-3 sidebar sidebar-right sidebar-animate text-xs-center\"
    >
        <img
            src=\"";
        // line 94
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/img/bundle/dashboard_loading.gif"), "html", null, true);
        echo "\"
            style=\"margin-top: 10em;\" alt=\"";
        // line 95
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Loading...", array(), "Admin.Global"), "html", null, true);
        echo "\"
        />
    </nav>
";
        
        $__internal_cf715eb332d3a06e42250048be3d2cad00db0c47748423980dcd5283de161068->leave($__internal_cf715eb332d3a06e42250048be3d2cad00db0c47748423980dcd5283de161068_prof);

    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin:layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  215 => 95,  211 => 94,  203 => 88,  197 => 87,  187 => 82,  178 => 80,  174 => 79,  170 => 77,  167 => 76,  162 => 73,  153 => 71,  149 => 70,  145 => 68,  142 => 67,  137 => 64,  128 => 62,  124 => 61,  120 => 59,  117 => 58,  111 => 57,  101 => 53,  97 => 52,  94 => 51,  88 => 50,  79 => 47,  74 => 46,  68 => 45,  59 => 42,  54 => 41,  48 => 40,  41 => 25,  39 => 38,  30 => 34,  29 => 33,  28 => 32,  27 => 31,  26 => 30,  25 => 29,  24 => 28,  23 => 27,  22 => 25,);
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
{% extends(template_from_string(
    getLegacyLayout(
        app.request.attributes.get('_legacy_controller'),
        layoutTitle is defined ? layoutTitle : '',
        layoutHeaderToolbarBtn is defined ? layoutHeaderToolbarBtn : [],
        layoutDisplayType is defined ? layoutDisplayType : '',
        showContentHeader is defined ? showContentHeader : true,
        headerTabContent is defined ? headerTabContent : '',
        enableSidebar is defined ? enableSidebar : false,
        help_link is defined ? help_link : ''
    )
)) %}

{% import 'PrestaShopBundle:Admin:macros.html.twig' as ps %}

{% block stylesheets %}
    {{ parent() }}
    <link rel=\"stylesheet\" href=\"{{ asset('themes/default/css/bundle/right-sidebar.css') }}\" />
{% endblock %}

{% block javascripts %}
    <script src=\"{{ asset('themes/default/js/bundle/default.js') }}\"></script>
    <script src=\"{{ asset('themes/default/js/bundle/right-sidebar.js') }}\"></script>
{% endblock %}

{% block translate_javascripts %}
    <script>
        var translate_javascripts = {{ js_translatable|json_encode()|raw }};
        var PS_ALLOW_ACCENTED_CHARS_URL = {{ 'PS_ALLOW_ACCENTED_CHARS_URL'|configuration|intCast }};
    </script>
{% endblock %}

{% block content_header %}
    {% if app.session.flashbag.peek('error')|length() > 0 %}
        <div class=\"flash-message-list alert alert-danger\">
            <ul>
            {% for flashMessage in app.session.flashbag.get('error') %}
                <li>{{ flashMessage }}</li>
            {% endfor %}
            </ul>
        </div>
    {% endif %}
    {% if app.session.flashbag.peek('failure')|length() > 0 %}
        <div class=\"flash-message-list alert alert-danger\">
            <ul>
            {% for flashMessage in app.session.flashbag.get('failure') %}
                <li>{{ flashMessage }}</li>
            {% endfor %}
            </ul>
        </div>
    {% endif %}
    {% if app.session.flashbag.peek('success')|length() > 0 %}
        <div class=\"flash-message-list alert alert-success\">
            <ul>
            {% for flashMessage in app.session.flashbag.get('success') %}
                <li>{{ flashMessage }}</li>
            {% endfor %}
            </ul>
        </div>
    {% endif %}
{% endblock %}

{% block sidebar_right %}
    <nav
        id=\"right-sidebar\"
        role=\"navigation\"
        class=\"col-xs-5 col-sm-4 col-md-4 col-lg-3 sidebar sidebar-right sidebar-animate text-xs-center\"
    >
        <img
            src=\"{{ asset('themes/default/img/bundle/dashboard_loading.gif') }}\"
            style=\"margin-top: 10em;\" alt=\"{{ 'Loading...'|trans({}, 'Admin.Global') }}\"
        />
    </nav>
{% endblock %}

", "PrestaShopBundle:Admin:layout.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/layout.html.twig");
    }
}
