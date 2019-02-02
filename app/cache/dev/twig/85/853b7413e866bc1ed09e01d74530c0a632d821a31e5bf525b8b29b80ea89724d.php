<?php

/* PrestaShopBundle:Admin:macros.html.twig */
class __TwigTemplate_c78ade3c4bb389df52de770d93d3d7f136386afa1ab94ebac713966013e38503 extends Twig_Template
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
        $__internal_84f2a1a354c7c474e7fc85a06f62b9d0c9a3179d89680408a7e73f4388e784e5 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_84f2a1a354c7c474e7fc85a06f62b9d0c9a3179d89680408a7e73f4388e784e5->enter($__internal_84f2a1a354c7c474e7fc85a06f62b9d0c9a3179d89680408a7e73f4388e784e5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "PrestaShopBundle:Admin:macros.html.twig"));

        // line 28
        echo "
";
        // line 32
        echo "
";
        
        $__internal_84f2a1a354c7c474e7fc85a06f62b9d0c9a3179d89680408a7e73f4388e784e5->leave($__internal_84f2a1a354c7c474e7fc85a06f62b9d0c9a3179d89680408a7e73f4388e784e5_prof);

    }

    // line 25
    public function getform_label_tooltip($__name__ = null, $__tooltip__ = null, $__placement__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "name" => $__name__,
            "tooltip" => $__tooltip__,
            "placement" => $__placement__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            $__internal_adf261fb7931c41dca9465efc446f7d901997c56f8b808bbdfe737358ae8a4ae = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
            $__internal_adf261fb7931c41dca9465efc446f7d901997c56f8b808bbdfe737358ae8a4ae->enter($__internal_adf261fb7931c41dca9465efc446f7d901997c56f8b808bbdfe737358ae8a4ae_prof = new Twig_Profiler_Profile($this->getTemplateName(), "macro", "form_label_tooltip"));

            // line 26
            echo "    ";
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["name"] ?? $this->getContext($context, "name")), 'label', array("label_attr" => array("tooltip" => ($context["tooltip"] ?? $this->getContext($context, "tooltip")), "tooltip_placement" => ((array_key_exists("placement", $context)) ? (_twig_default_filter(($context["placement"] ?? $this->getContext($context, "placement")), "top")) : ("top")))));
            echo "
";
            
            $__internal_adf261fb7931c41dca9465efc446f7d901997c56f8b808bbdfe737358ae8a4ae->leave($__internal_adf261fb7931c41dca9465efc446f7d901997c56f8b808bbdfe737358ae8a4ae_prof);

        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 29
    public function getcheck($__variable__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "variable" => $__variable__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            $__internal_991e37067d55f6de10b709bbc5afd07a09f47ff7023de1ed70d9f9d0d5d9b5c6 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
            $__internal_991e37067d55f6de10b709bbc5afd07a09f47ff7023de1ed70d9f9d0d5d9b5c6->enter($__internal_991e37067d55f6de10b709bbc5afd07a09f47ff7023de1ed70d9f9d0d5d9b5c6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "macro", "check"));

            // line 30
            echo "  ";
            echo twig_escape_filter($this->env, (((array_key_exists("variable", $context) && (twig_length_filter($this->env, ($context["variable"] ?? $this->getContext($context, "variable"))) > 0))) ? (($context["variable"] ?? $this->getContext($context, "variable"))) : (false)), "html", null, true);
            echo "
";
            
            $__internal_991e37067d55f6de10b709bbc5afd07a09f47ff7023de1ed70d9f9d0d5d9b5c6->leave($__internal_991e37067d55f6de10b709bbc5afd07a09f47ff7023de1ed70d9f9d0d5d9b5c6_prof);

        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 33
    public function gettooltip($__text__ = null, $__icon__ = null, $__position__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "text" => $__text__,
            "icon" => $__icon__,
            "position" => $__position__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            $__internal_2d2a6e1dabfef5102f3247879589ba617e3e0832b392cb5f1dfbe098df465510 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
            $__internal_2d2a6e1dabfef5102f3247879589ba617e3e0832b392cb5f1dfbe098df465510->enter($__internal_2d2a6e1dabfef5102f3247879589ba617e3e0832b392cb5f1dfbe098df465510_prof = new Twig_Profiler_Profile($this->getTemplateName(), "macro", "tooltip"));

            // line 34
            echo "  <span data-toggle=\"tooltip\" class=\"label-tooltip\" data-original-title=\"";
            echo twig_escape_filter($this->env, ($context["text"] ?? $this->getContext($context, "text")), "html", null, true);
            echo "\" data-html=\"true\" data-placement=\"";
            echo twig_escape_filter($this->env, ((array_key_exists("position", $context)) ? (_twig_default_filter(($context["position"] ?? $this->getContext($context, "position")), "top")) : ("top")), "html", null, true);
            echo "\">
    <i class=\"material-icons\">";
            // line 35
            echo twig_escape_filter($this->env, ($context["icon"] ?? $this->getContext($context, "icon")), "html", null, true);
            echo "</i>
  </span>
";
            
            $__internal_2d2a6e1dabfef5102f3247879589ba617e3e0832b392cb5f1dfbe098df465510->leave($__internal_2d2a6e1dabfef5102f3247879589ba617e3e0832b392cb5f1dfbe098df465510_prof);

        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin:macros.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 35,  124 => 34,  107 => 33,  86 => 30,  71 => 29,  50 => 26,  33 => 25,  25 => 32,  22 => 28,);
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
{% macro form_label_tooltip(name, tooltip, placement) %}
    {{ form_label(name, null, {'label_attr': {'tooltip': tooltip, 'tooltip_placement': placement|default('top')}}) }}
{% endmacro %}

{% macro check(variable) %}
  {{ variable is defined and variable|length > 0 ? variable : false }}
{% endmacro %}

{% macro tooltip(text, icon, position) %}
  <span data-toggle=\"tooltip\" class=\"label-tooltip\" data-original-title=\"{{ text }}\" data-html=\"true\" data-placement=\"{{ position|default('top') }}\">
    <i class=\"material-icons\">{{ icon }}</i>
  </span>
{% endmacro %}
", "PrestaShopBundle:Admin:macros.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/macros.html.twig");
    }
}
