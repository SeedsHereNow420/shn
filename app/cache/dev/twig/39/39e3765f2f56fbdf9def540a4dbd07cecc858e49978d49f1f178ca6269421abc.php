<?php

/* PrestaShopBundle:Admin/Module/Includes:dropdown_status.html.twig */
class __TwigTemplate_6b2c25c02bcb8e522f3c7b9f78f071c909a3a7750d7181333847d42955ca43ae extends Twig_Template
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
        $__internal_a2ac4ff3a1b0d7adf22d7a95b61e79181703c4ff47678d5a3bc4ec2182807277 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_a2ac4ff3a1b0d7adf22d7a95b61e79181703c4ff47678d5a3bc4ec2182807277->enter($__internal_a2ac4ff3a1b0d7adf22d7a95b61e79181703c4ff47678d5a3bc4ec2182807277_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "PrestaShopBundle:Admin/Module/Includes:dropdown_status.html.twig"));

        // line 25
        echo "<div class=\"ps-dropdown dropdown btn-group bordered\">
    <div id=\"module-status-dropdown\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
        <span class=\"js-selected-item selected-item module-status-selector-label\">";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Show all modules", array(), "Admin.Modules.Feature"), "html", null, true);
        echo "</span>
        <i class=\"material-icons arrow-down pull-right\">keyboard_arrow_down</i>
    </div>

    <div class=\"ps-dropdown-menu dropdown-menu\" aria-labelledby=\"module-status-dropdown\">
        <ul class=\"items-list js-items-list module-status-selector\">
            <li class=\"module-status-reset\">
                <a class=\"dropdown-item\" href=\"#\">
                    ";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Show all modules", array(), "Admin.Modules.Feature"), "html", null, true);
        echo "
                </a>
            </li>
            <li class=\"module-status-menu\" data-status-ref=\"1\">
                <a class=\"dropdown-item\" href=\"#\">
                    ";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Enabled Modules", array(), "Admin.Modules.Feature"), "html", null, true);
        echo "
                </a>
            </li>
            <li class=\"module-status-menu\" data-status-ref=\"0\">
                <a class=\"dropdown-item\" href=\"#\">
                    ";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Disabled Modules", array(), "Admin.Modules.Feature"), "html", null, true);
        echo "
                </a>
            </li>
        </ul>
    </div>
</div>
";
        
        $__internal_a2ac4ff3a1b0d7adf22d7a95b61e79181703c4ff47678d5a3bc4ec2182807277->leave($__internal_a2ac4ff3a1b0d7adf22d7a95b61e79181703c4ff47678d5a3bc4ec2182807277_prof);

    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Module/Includes:dropdown_status.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 45,  45 => 40,  37 => 35,  26 => 27,  22 => 25,);
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
<div class=\"ps-dropdown dropdown btn-group bordered\">
    <div id=\"module-status-dropdown\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
        <span class=\"js-selected-item selected-item module-status-selector-label\">{{ 'Show all modules'|trans({}, 'Admin.Modules.Feature') }}</span>
        <i class=\"material-icons arrow-down pull-right\">keyboard_arrow_down</i>
    </div>

    <div class=\"ps-dropdown-menu dropdown-menu\" aria-labelledby=\"module-status-dropdown\">
        <ul class=\"items-list js-items-list module-status-selector\">
            <li class=\"module-status-reset\">
                <a class=\"dropdown-item\" href=\"#\">
                    {{ 'Show all modules'|trans({}, 'Admin.Modules.Feature') }}
                </a>
            </li>
            <li class=\"module-status-menu\" data-status-ref=\"1\">
                <a class=\"dropdown-item\" href=\"#\">
                    {{ 'Enabled Modules'|trans({}, 'Admin.Modules.Feature') }}
                </a>
            </li>
            <li class=\"module-status-menu\" data-status-ref=\"0\">
                <a class=\"dropdown-item\" href=\"#\">
                    {{ 'Disabled Modules'|trans({}, 'Admin.Modules.Feature') }}
                </a>
            </li>
        </ul>
    </div>
</div>
", "PrestaShopBundle:Admin/Module/Includes:dropdown_status.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Module/Includes/dropdown_status.html.twig");
    }
}
