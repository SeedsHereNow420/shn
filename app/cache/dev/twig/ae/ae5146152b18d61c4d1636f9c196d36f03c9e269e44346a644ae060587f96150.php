<?php

/* PrestaShopBundle:Admin/Module/Includes:card_manage_installed.html.twig */
class __TwigTemplate_90ed7d318b6f0997b752af508180b7149fdaaf95acd90fbed5d7fa136e91b5f5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 25
        $this->parent = $this->loadTemplate("PrestaShopBundle:Admin/Module/Includes:card_list.html.twig", "PrestaShopBundle:Admin/Module/Includes:card_manage_installed.html.twig", 25);
        $this->blocks = array(
            'addon_version' => array($this, 'block_addon_version'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "PrestaShopBundle:Admin/Module/Includes:card_list.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_969af38340ca593acd2ddbff738d85b1e9be07ab17a324783169a92b84a115c0 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_969af38340ca593acd2ddbff738d85b1e9be07ab17a324783169a92b84a115c0->enter($__internal_969af38340ca593acd2ddbff738d85b1e9be07ab17a324783169a92b84a115c0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "PrestaShopBundle:Admin/Module/Includes:card_manage_installed.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_969af38340ca593acd2ddbff738d85b1e9be07ab17a324783169a92b84a115c0->leave($__internal_969af38340ca593acd2ddbff738d85b1e9be07ab17a324783169a92b84a115c0_prof);

    }

    // line 30
    public function block_addon_version($context, array $blocks = array())
    {
        $__internal_45b6a4444eafd569ff334056b6f92915506988f5ff401c06716b263851cb7c59 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_45b6a4444eafd569ff334056b6f92915506988f5ff401c06716b263851cb7c59->enter($__internal_45b6a4444eafd569ff334056b6f92915506988f5ff401c06716b263851cb7c59_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "addon_version"));

        // line 31
        echo "  ";
        if (($this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "productType", array()) == "service")) {
            // line 32
            echo "    ";
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Service by %author%", array("%author%" => (("<b>" . $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "author", array())) . "</b>")), "Admin.Modules.Feature");
            echo "
  ";
        } else {
            // line 34
            echo "    ";
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("v%version% - by %author%", array("%version%" => $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "version", array()), "%author%" => (("<b>" . $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "author", array())) . "</b>")), "Admin.Modules.Feature");
            echo "
  ";
        }
        
        $__internal_45b6a4444eafd569ff334056b6f92915506988f5ff401c06716b263851cb7c59->leave($__internal_45b6a4444eafd569ff334056b6f92915506988f5ff401c06716b263851cb7c59_prof);

    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Module/Includes:card_manage_installed.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 34,  43 => 32,  40 => 31,  34 => 30,  11 => 25,);
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
{% extends \"PrestaShopBundle:Admin/Module/Includes:card_list.html.twig\" %}

{# Twig extension for \"Addons to update\" part in notification page #}

{# Display database version #}
{% block addon_version %}
  {% if module.attributes.productType == \"service\" %}
    {{ 'Service by %author%'|trans({'%author%' : '<b>' ~ module.attributes.author ~ '</b>'}, 'Admin.Modules.Feature')|raw }}
  {% else %}
    {{ 'v%version% - by %author%'|trans({ '%version%' : module.attributes.version, '%author%' : '<b>' ~ module.attributes.author ~ '</b>' }, 'Admin.Modules.Feature')|raw }}
  {% endif %}
{% endblock %}

", "PrestaShopBundle:Admin/Module/Includes:card_manage_installed.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Module/Includes/card_manage_installed.html.twig");
    }
}
