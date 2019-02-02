<?php

/* PrestaShopBundle:Admin/Module/Includes:modal_read_more.html.twig */
class __TwigTemplate_c530fdef726b5cd55a2a755555f575c793d4e809bbecec990b44ca72c9257006 extends Twig_Template
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
        $__internal_ed7ebdcfc993f7b09b5578e5741412d044089a677790d42195fe8a27a069d2ad = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_ed7ebdcfc993f7b09b5578e5741412d044089a677790d42195fe8a27a069d2ad->enter($__internal_ed7ebdcfc993f7b09b5578e5741412d044089a677790d42195fe8a27a069d2ad_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "PrestaShopBundle:Admin/Module/Includes:modal_read_more.html.twig"));

        // line 25
        echo "<div id=\"module-modal-read-more-";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "name", array()), "html", null, true);
        echo twig_escape_filter($this->env, ((array_key_exists("additionalModalSuffix", $context)) ? (_twig_default_filter(($context["additionalModalSuffix"] ?? $this->getContext($context, "additionalModalSuffix")), "")) : ("")), "html", null, true);
        echo "\" class=\"modal modal-vcenter ps-modal-card fade\" role=\"dialog\">

</div>
";
        
        $__internal_ed7ebdcfc993f7b09b5578e5741412d044089a677790d42195fe8a27a069d2ad->leave($__internal_ed7ebdcfc993f7b09b5578e5741412d044089a677790d42195fe8a27a069d2ad_prof);

    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Module/Includes:modal_read_more.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 25,);
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
<div id=\"module-modal-read-more-{{module.attributes.name}}{{ additionalModalSuffix|default('') }}\" class=\"modal modal-vcenter ps-modal-card fade\" role=\"dialog\">

</div>
", "PrestaShopBundle:Admin/Module/Includes:modal_read_more.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Module/Includes/modal_read_more.html.twig");
    }
}
