<?php

/* PrestaShopBundle:Admin/Module/Includes:grid_notification_configure.html.twig */
class __TwigTemplate_4118f1cc7c2c6aad9fac7c67800fbbef4b997f13d59173029e8f38bd621bd57b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 25
        $this->parent = $this->loadTemplate("PrestaShopBundle:Admin/Module/Includes:grid.html.twig", "PrestaShopBundle:Admin/Module/Includes:grid_notification_configure.html.twig", 25);
        $this->blocks = array(
            'addon_card' => array($this, 'block_addon_card'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "PrestaShopBundle:Admin/Module/Includes:grid.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_e7bbc77498c9cea86997cc994942857b38f00a48de212ebc10f0f052ee597be6 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_e7bbc77498c9cea86997cc994942857b38f00a48de212ebc10f0f052ee597be6->enter($__internal_e7bbc77498c9cea86997cc994942857b38f00a48de212ebc10f0f052ee597be6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "PrestaShopBundle:Admin/Module/Includes:grid_notification_configure.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_e7bbc77498c9cea86997cc994942857b38f00a48de212ebc10f0f052ee597be6->leave($__internal_e7bbc77498c9cea86997cc994942857b38f00a48de212ebc10f0f052ee597be6_prof);

    }

    // line 27
    public function block_addon_card($context, array $blocks = array())
    {
        $__internal_d971df714445786fd6b235d1bbcd7176a4164ae8062cd3e64175a68d897200a3 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_d971df714445786fd6b235d1bbcd7176a4164ae8062cd3e64175a68d897200a3->enter($__internal_d971df714445786fd6b235d1bbcd7176a4164ae8062cd3e64175a68d897200a3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "addon_card"));

        // line 28
        echo "    ";
        $this->loadTemplate("PrestaShopBundle:Admin/Module/Includes:card_notification_configure.html.twig", "PrestaShopBundle:Admin/Module/Includes:grid_notification_configure.html.twig", 28)->display(array_merge($context, array("module" =>         // line 30
($context["module"] ?? $this->getContext($context, "module")), "display_type" =>         // line 31
($context["display_type"] ?? $this->getContext($context, "display_type")), "origin" => ((        // line 32
array_key_exists("origin", $context)) ? (_twig_default_filter(($context["origin"] ?? $this->getContext($context, "origin")), "none")) : ("none")))));
        
        $__internal_d971df714445786fd6b235d1bbcd7176a4164ae8062cd3e64175a68d897200a3->leave($__internal_d971df714445786fd6b235d1bbcd7176a4164ae8062cd3e64175a68d897200a3_prof);

    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Module/Includes:grid_notification_configure.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 32,  43 => 31,  42 => 30,  40 => 28,  34 => 27,  11 => 25,);
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
{% extends \"PrestaShopBundle:Admin/Module/Includes:grid.html.twig\" %}

{% block addon_card %}
    {% include 'PrestaShopBundle:Admin/Module/Includes:card_notification_configure.html.twig'
        with {
            'module': module,
            'display_type': display_type,
            'origin': origin|default('none')
        }
    %}
{% endblock %}
", "PrestaShopBundle:Admin/Module/Includes:grid_notification_configure.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Module/Includes/grid_notification_configure.html.twig");
    }
}
