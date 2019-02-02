<?php

/* PrestaShopBundle:Admin/Module/Includes:grid_manage_installed.html.twig */
class __TwigTemplate_a051314c82f865933afa7c7a47cf7528cb99f758c6dcd921f3daea999345ba3a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 25
        $this->parent = $this->loadTemplate("PrestaShopBundle:Admin/Module/Includes:grid.html.twig", "PrestaShopBundle:Admin/Module/Includes:grid_manage_installed.html.twig", 25);
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
        $__internal_ded0ee56f0036ba5197fd79d1bd4b9f35d329a33a307ba07317d6e9207ddd6cf = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_ded0ee56f0036ba5197fd79d1bd4b9f35d329a33a307ba07317d6e9207ddd6cf->enter($__internal_ded0ee56f0036ba5197fd79d1bd4b9f35d329a33a307ba07317d6e9207ddd6cf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "PrestaShopBundle:Admin/Module/Includes:grid_manage_installed.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_ded0ee56f0036ba5197fd79d1bd4b9f35d329a33a307ba07317d6e9207ddd6cf->leave($__internal_ded0ee56f0036ba5197fd79d1bd4b9f35d329a33a307ba07317d6e9207ddd6cf_prof);

    }

    // line 27
    public function block_addon_card($context, array $blocks = array())
    {
        $__internal_5617314b8728dcbc53b76dbfd2d9525ca9b32b5aebb5b5491a0d6fe68d462286 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_5617314b8728dcbc53b76dbfd2d9525ca9b32b5aebb5b5491a0d6fe68d462286->enter($__internal_5617314b8728dcbc53b76dbfd2d9525ca9b32b5aebb5b5491a0d6fe68d462286_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "addon_card"));

        // line 28
        echo "  ";
        $this->loadTemplate("PrestaShopBundle:Admin/Module/Includes:card_manage_installed.html.twig", "PrestaShopBundle:Admin/Module/Includes:grid_manage_installed.html.twig", 28)->display(array_merge($context, array("display_type" => ($context["display_type"] ?? $this->getContext($context, "display_type")), "module" => ($context["module"] ?? $this->getContext($context, "module")), "origin" => ((array_key_exists("origin", $context)) ? (_twig_default_filter(($context["origin"] ?? $this->getContext($context, "origin")), "none")) : ("none")))));
        
        $__internal_5617314b8728dcbc53b76dbfd2d9525ca9b32b5aebb5b5491a0d6fe68d462286->leave($__internal_5617314b8728dcbc53b76dbfd2d9525ca9b32b5aebb5b5491a0d6fe68d462286_prof);

    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Module/Includes:grid_manage_installed.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 28,  34 => 27,  11 => 25,);
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
  {% include 'PrestaShopBundle:Admin/Module/Includes:card_manage_installed.html.twig' with { 'display_type': display_type, 'module': module, 'origin': origin|default('none') } %}
{% endblock %}
", "PrestaShopBundle:Admin/Module/Includes:grid_manage_installed.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Module/Includes/grid_manage_installed.html.twig");
    }
}
