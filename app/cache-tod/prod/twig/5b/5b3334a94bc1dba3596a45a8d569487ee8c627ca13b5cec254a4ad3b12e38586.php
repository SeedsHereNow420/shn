<?php

/* PrestaShopBundle:Admin/Product:form_combinations_bulk.html.twig */
class __TwigTemplate_797daf67bd439147e9da63378d26548bb772f7236c90b26011921f6e649fca94 extends Twig_Template
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
  ";
        // line 26
        if ($this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getConfiguration("PS_STOCK_MANAGEMENT")) {
            // line 27
            echo "    <div class=\"col-xl-2 col-lg-6 custom-width m-b-1\">
      <label class=\"form-control-label\">";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "quantity", array()), "vars", array()), "label", array()), "html", null, true);
            echo "</label>
      ";
            // line 29
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "quantity", array()), 'errors');
            echo "
      ";
            // line 30
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "quantity", array()), 'widget');
            echo "
    </div>
  ";
        }
        // line 33
        echo "
  <div class=\"col-xl-2 col-lg-6 custom-width m-b-1\">
    <label class=\"form-control-label\">";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "cost_price", array()), "vars", array()), "label", array()), "html", null, true);
        echo "</label>
    ";
        // line 36
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "cost_price", array()), 'errors');
        echo "
    ";
        // line 37
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "cost_price", array()), 'widget');
        echo "
  </div>

  <div class=\"col-xl-2 col-lg-6 custom-width m-b-1\">
    <label class=\"form-control-label\">";
        // line 41
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "impact_on_weight", array()), "vars", array()), "label", array()), "html", null, true);
        echo "</label>
    ";
        // line 42
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "impact_on_weight", array()), 'errors');
        echo "
    ";
        // line 43
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "impact_on_weight", array()), 'widget');
        echo "
  </div>

  <div class=\"col-xl-3 col-lg-6 custom-width m-b-1\">
    <label class=\"form-control-label\">";
        // line 47
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "impact_on_price_te", array()), "vars", array()), "label", array()), "html", null, true);
        echo "</label>
    ";
        // line 48
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "impact_on_price_te", array()), 'errors');
        echo "
    ";
        // line 49
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "impact_on_price_te", array()), 'widget');
        echo "
  </div>

  <div class=\"col-xl-3 col-lg-6 custom-width m-b-1\">
    <label class=\"form-control-label\">";
        // line 53
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "impact_on_price_ti", array()), "vars", array()), "label", array()), "html", null, true);
        echo "</label>
    ";
        // line 54
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "impact_on_price_ti", array()), 'errors');
        echo "
    ";
        // line 55
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "impact_on_price_ti", array()), 'widget');
        echo "
  </div>

  <div class=\"col-xl-4 col-lg-6 custom-width m-b-1\">
    <label class=\"form-control-label\">";
        // line 59
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "date_availability", array()), "vars", array()), "label", array()), "html", null, true);
        echo "</label>
    ";
        // line 60
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "date_availability", array()), 'errors');
        echo "
    ";
        // line 61
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "date_availability", array()), 'widget');
        echo "
  </div>

  <div class=\"col-xl-4 col-lg-6 custom-width\">
    <label class=\"form-control-label\">";
        // line 65
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "reference", array()), "vars", array()), "label", array()), "html", null, true);
        echo "</label>
    ";
        // line 66
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "reference", array()), 'errors');
        echo "
    ";
        // line 67
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "reference", array()), 'widget');
        echo "
  </div>

  <div class=\"col-xl-4 col-lg-6 custom-width\">
    <label class=\"form-control-label\">";
        // line 71
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "minimal_quantity", array()), "vars", array()), "label", array()), "html", null, true);
        echo "</label>
    ";
        // line 72
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "minimal_quantity", array()), 'errors');
        echo "
    ";
        // line 73
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "minimal_quantity", array()), 'widget');
        echo "
  </div>
</div>
<div class=\"row\">
    <div class=\"col-md-3 col-md-offset-7\">
      <label class=\"form-control-label\">&nbsp;</label>
      <button id=\"delete-combinations\" class=\"btn btn-tertiary-outline btn-block\" data=\"";
        // line 79
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_delete_attribute", array("idProduct" => ($context["id_product"] ?? null))), "html", null, true);
        echo "\">
        <i class=\"material-icons\">delete</i>
        ";
        // line 81
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Delete combinations", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "
      </button>
    </div>
    <div class=\"col-md-2\">
      <label class=\"form-control-label\">&nbsp;</label>
      <button id=\"apply-on-combinations\" class=\"btn btn-primary-outline btn-block\">
        ";
        // line 87
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Apply", array(), "Admin.Actions"), "html", null, true);
        echo "
      </button>
    </div>
  ";
        // line 90
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Product:form_combinations_bulk.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  172 => 90,  166 => 87,  157 => 81,  152 => 79,  143 => 73,  139 => 72,  135 => 71,  128 => 67,  124 => 66,  120 => 65,  113 => 61,  109 => 60,  105 => 59,  98 => 55,  94 => 54,  90 => 53,  83 => 49,  79 => 48,  75 => 47,  68 => 43,  64 => 42,  60 => 41,  53 => 37,  49 => 36,  45 => 35,  41 => 33,  35 => 30,  31 => 29,  27 => 28,  24 => 27,  22 => 26,  19 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin/Product:form_combinations_bulk.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Product/form_combinations_bulk.html.twig");
    }
}
