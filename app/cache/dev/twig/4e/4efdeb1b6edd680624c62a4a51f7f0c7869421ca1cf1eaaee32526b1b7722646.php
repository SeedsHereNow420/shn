<?php

/* PrestaShopBundle:Admin/Module/Includes:notification_kpis.html.twig */
class __TwigTemplate_e09991ffed69351001318ceaac1f87fdec2472d0ecd407f6b3287e1e1777854a extends Twig_Template
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
        $__internal_57163199291576191013cdf85743af95b5f4f7d0e212c487ccd5d38ec7f12476 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_57163199291576191013cdf85743af95b5f4f7d0e212c487ccd5d38ec7f12476->enter($__internal_57163199291576191013cdf85743af95b5f4f7d0e212c487ccd5d38ec7f12476_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "PrestaShopBundle:Admin/Module/Includes:notification_kpis.html.twig"));

        // line 25
        echo "<div class=\"row\">
    <div class=\"col-lg-10 col-lg-offset-1\">
        <div class=\"module-notification-kpis\">

            <div id=\"module-kpi-settings\" class=\"module-kpi\">
                <i class=\"material-icons\">settings</i>
                ";
        // line 31
        echo twig_replace_filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("%nbModules% modules to configure", array("%nbModules%" => twig_length_filter($this->env, $this->getAttribute(($context["modules"] ?? $this->getContext($context, "modules")), "to_configure", array()))), "Admin.Modules.Feature"), array("[1]" => "<span class=\"module-kpi-number\">", "[/1]" => "</span>"));
        echo "
            </div>

            <div id=\"module-kpi-update\" class=\"module-kpi\">
                <i class=\"material-icons\">update</i>
                ";
        // line 36
        echo twig_replace_filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("%nbModules% modules to update", array("%nbModules%" => twig_length_filter($this->env, $this->getAttribute(($context["modules"] ?? $this->getContext($context, "modules")), "to_update", array()))), "Admin.Modules.Feature"), array("[1]" => "<span class=\"module-kpi-number\">", "[/1]" => "</span>"));
        echo "
            </div>

        </div>
    </div>
</div>

<hr class=\"top-menu-separator\"/>
";
        
        $__internal_57163199291576191013cdf85743af95b5f4f7d0e212c487ccd5d38ec7f12476->leave($__internal_57163199291576191013cdf85743af95b5f4f7d0e212c487ccd5d38ec7f12476_prof);

    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Module/Includes:notification_kpis.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 36,  30 => 31,  22 => 25,);
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
<div class=\"row\">
    <div class=\"col-lg-10 col-lg-offset-1\">
        <div class=\"module-notification-kpis\">

            <div id=\"module-kpi-settings\" class=\"module-kpi\">
                <i class=\"material-icons\">settings</i>
                {{ '%nbModules% modules to configure'|trans({'%nbModules%' : modules.to_configure|length}, 'Admin.Modules.Feature')|replace({'[1]' : '<span class=\"module-kpi-number\">', '[/1]' : '</span>'})|raw }}
            </div>

            <div id=\"module-kpi-update\" class=\"module-kpi\">
                <i class=\"material-icons\">update</i>
                {{ '%nbModules% modules to update'|trans({'%nbModules%' : modules.to_update|length}, 'Admin.Modules.Feature')|replace({'[1]' : '<span class=\"module-kpi-number\">', '[/1]' : '</span>'})|raw }}
            </div>

        </div>
    </div>
</div>

<hr class=\"top-menu-separator\"/>
", "PrestaShopBundle:Admin/Module/Includes:notification_kpis.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Module/Includes/notification_kpis.html.twig");
    }
}
