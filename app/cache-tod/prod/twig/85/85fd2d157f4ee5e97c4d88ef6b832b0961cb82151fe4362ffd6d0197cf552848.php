<?php

/* PrestaShopBundle:Admin/Product/Include:form_feature.html.twig */
class __TwigTemplate_030162ccd0b8dda49fceeb3704c9ab7f5b6642dfdf9c06ae1e2f1e09584e72cb extends Twig_Template
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
        // line 25
        echo "<div class=\"row\">
    <div class=\"col-lg-12 col-xl-4\">
        <fieldset class=\"form-group\">
            <label class=\"form-control-label\">";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "feature", array()), "vars", array()), "label", array()), "html", null, true);
        echo "</label>
            ";
        // line 29
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "feature", array()), 'widget');
        echo "
        </fieldset>
    </div>
    <div class=\"col-lg-12 col-xl-4\">
        <fieldset class=\"form-group\">
            <label class=\"form-control-label\">";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "value", array()), "vars", array()), "label", array()), "html", null, true);
        echo "</label>
            ";
        // line 35
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "value", array()), 'widget');
        echo "
        </fieldset>
    </div>
    <div class=\"col-lg-11 col-xl-3\">
        <fieldset class=\"form-group\">
            <label class=\"form-control-label\">";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "custom_value", array()), "vars", array()), "label", array()), "html", null, true);
        echo "</label>
            ";
        // line 41
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "custom_value", array()), 'widget');
        echo "
        </fieldset>
    </div>
    <div class=\"col-lg-1 col-xl-1\">
        <fieldset class=\"form-group\">
            <label class=\"form-control-label\">&nbsp;</label>
            <button type=\"button\" class=\"btn btn-invisible btn-block delete p-l-0 p-r-0\"><i class=\"material-icons\">delete</i></button>
        </fieldset>
    </div>
</div>
<hr class=\"m-b-2 hidden-xl-up\" />
";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Product/Include:form_feature.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 41,  48 => 40,  40 => 35,  36 => 34,  28 => 29,  24 => 28,  19 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin/Product/Include:form_feature.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Product/Include/form_feature.html.twig");
    }
}
