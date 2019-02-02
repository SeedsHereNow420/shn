<?php

/* PrestaShopBundle:Admin/Product/Include:form_shipping.html.twig */
class __TwigTemplate_63449de1dafbc07714a4d64d2b692302af8e94ebce004010148a4cd317797aa2 extends Twig_Template
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
        list($context["dimension_unit"], $context["weight_unit"]) =         array($this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getConfiguration("PS_DIMENSION_UNIT"), $this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getConfiguration("PS_WEIGHT_UNIT"));
        // line 26
        echo "
<div class=\"col-md-12 p-b-1\">
  <h2>";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Package dimension", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</h2>
  <p class=\"subtitle\">";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Adjust your shipping costs by filling in the product dimensions.", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</p>
</div>

<div class=\"col-xl-2 col-lg-3\">
  <div class=\"form-group\">
    <label class=\"form-control-label\">";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "width", array()), "vars", array()), "label", array()), "html", null, true);
        echo "</label>
    ";
        // line 35
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "width", array()), 'errors');
        echo "
    <div class=\"input-group\">
      ";
        // line 37
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "width", array()), 'widget');
        echo "
      <span class=\"input-group-addon\">";
        // line 38
        echo twig_escape_filter($this->env, ($context["dimension_unit"] ?? null), "html", null, true);
        echo "</span>
    </div>
  </div>
</div>
<div class=\"col-xl-2 col-lg-3\">
  <div class=\"form-group\">
    <label class=\"form-control-label\">";
        // line 44
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "height", array()), "vars", array()), "label", array()), "html", null, true);
        echo "</label>
    ";
        // line 45
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "height", array()), 'errors');
        echo "
    <div class=\"input-group\">
      ";
        // line 47
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "height", array()), 'widget');
        echo "
      <span class=\"input-group-addon\">";
        // line 48
        echo twig_escape_filter($this->env, ($context["dimension_unit"] ?? null), "html", null, true);
        echo "</span>
    </div>
  </div>
</div>
<div class=\"col-xl-2 col-lg-3\">
  <div class=\"form-group\">
    <label class=\"form-control-label\">";
        // line 54
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "depth", array()), "vars", array()), "label", array()), "html", null, true);
        echo "</label>
    ";
        // line 55
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "depth", array()), 'errors');
        echo "
    <div class=\"input-group\">
      ";
        // line 57
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "depth", array()), 'widget');
        echo "
      <span class=\"input-group-addon\">";
        // line 58
        echo twig_escape_filter($this->env, ($context["dimension_unit"] ?? null), "html", null, true);
        echo "</span>
    </div>
  </div>
</div>
<div class=\"col-xl-2 col-lg-3\">
  <div class=\"form-group\">
    <label class=\"form-control-label\">";
        // line 64
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "weight", array()), "vars", array()), "label", array()), "html", null, true);
        echo "</label>
    ";
        // line 65
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "weight", array()), 'errors');
        echo "
    <div class=\"input-group\">
      ";
        // line 67
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "weight", array()), 'widget');
        echo "
      <span class=\"input-group-addon\">";
        // line 68
        echo twig_escape_filter($this->env, ($context["weight_unit"] ?? null), "html", null, true);
        echo "</span>
    </div>
  </div>
</div>

<div class=\"col-md-12\">
  <div class=\"form-group\">
    <h2>
      ";
        // line 76
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "additional_shipping_cost", array()), "vars", array()), "label", array()), "html", null, true);
        echo "
      <span class=\"help-box\" data-toggle=\"popover\"
        data-content=\"";
        // line 78
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("If a carrier has a tax, it will be added to the shipping fees.", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\" ></span>
    </h2>
    <label class=\"form-control-label\">";
        // line 80
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Does this product incur additional shipping costs?", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</label>
    <div class=\"row\">
      <div class=\"col-md-2\">
        ";
        // line 83
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "additional_shipping_cost", array()), 'widget');
        echo "
      </div>
    </div>
  </div>
</div>

<div class=\"col-md-12\">
  <div class=\"form-group\">
    <h2>";
        // line 91
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "selectedCarriers", array()), "vars", array()), "label", array()), "html", null, true);
        echo "</h2>
    ";
        // line 92
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "selectedCarriers", array()), 'widget');
        echo "
  </div>
</div>

<div class=\"col-md-12\">
  <div class=\"alert alert-warning\" role=\"alert\">
    <i class=\"material-icons\">info_outline</i>
    <p>";
        // line 99
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("If no carrier is selected then all the carriers will be available for customers orders.", array(), "Admin.Catalog.Notification");
        echo "</p>
  </div>
</div>

<div class=\"col-md-12\">
  <div id=\"warehouse_combination_collection\" class=\"col-md-12 form-group\" data-url=\"";
        // line 104
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_warehouse_refresh_product_warehouse_combination_form");
        echo "\">
    ";
        // line 105
        if (((($context["asm_globally_activated"] ?? null) && ($context["isNotVirtual"] ?? null)) && ($context["isChecked"] ?? null))) {
            // line 106
            echo "      ";
            echo twig_include($this->env, $context, "PrestaShopBundle:Admin:Product/Include/form-warehouse-combination.html.twig", array("warehouses" => ($context["warehouses"] ?? null), "form" => ($context["form"] ?? null)));
            echo "
    ";
        }
        // line 108
        echo "  </div>
</div>

";
        // line 111
        echo $this->env->getExtension('PrestaShopBundle\Twig\HookExtension')->renderHook("displayAdminProductsShippingStepBottom", array("id_product" => ($context["id_product"] ?? null)));
        echo "
";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Product/Include:form_shipping.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  193 => 111,  188 => 108,  182 => 106,  180 => 105,  176 => 104,  168 => 99,  158 => 92,  154 => 91,  143 => 83,  137 => 80,  132 => 78,  127 => 76,  116 => 68,  112 => 67,  107 => 65,  103 => 64,  94 => 58,  90 => 57,  85 => 55,  81 => 54,  72 => 48,  68 => 47,  63 => 45,  59 => 44,  50 => 38,  46 => 37,  41 => 35,  37 => 34,  29 => 29,  25 => 28,  21 => 26,  19 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin/Product/Include:form_shipping.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Product/Include/form_shipping.html.twig");
    }
}
