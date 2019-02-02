<?php

/* PrestaShopBundle:Admin:Product/Include/form-specific-price.html.twig */
class __TwigTemplate_7889ffec3f591a1627e98bd021372c4f5f239b6842fe1d6c71089dd0266a024d extends Twig_Template
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
        echo "<div class=\"card card-block\">
  <h4><b>";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Specific price conditions", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</b></h4>
  ";
        // line 27
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["form"] ?? null), 'errors');
        echo "

  ";
        // line 29
        if ($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "sp_id_shop", array(), "any", false, true), "vars", array(), "any", false, true), "choices", array(), "any", true, true)) {
            // line 30
            echo "  <div class=\"row\">
    <div class=\"col-md-4\">
      <fieldset class=\"form-group\">
        <label>";
            // line 33
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Shop", array(), "Admin.Global"), "html", null, true);
            echo "</label>
        ";
            // line 34
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "sp_id_shop", array()), 'errors');
            echo "
        ";
            // line 35
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "sp_id_shop", array()), 'widget');
            echo "
      </fieldset>
    </div>
  </div>
  ";
        } else {
            // line 40
            echo "      ";
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "sp_id_shop", array()), 'widget');
            echo "
  ";
        }
        // line 42
        echo "
  <div class=\"row\">
    <div class=\"col-md-3\">
      <fieldset class=\"form-group\">
        <label>";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("For", array(), "Admin.Global"), "html", null, true);
        echo "</label>
        ";
        // line 47
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "sp_id_currency", array()), 'errors');
        echo "
        ";
        // line 48
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "sp_id_currency", array()), 'widget');
        echo "
      </fieldset>
    </div>
    <div class=\"col-md-3\">
      <fieldset class=\"form-group\">
        <label>&nbsp;</label>
        ";
        // line 54
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "sp_id_country", array()), 'errors');
        echo "
        ";
        // line 55
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "sp_id_country", array()), 'widget');
        echo "
      </fieldset>
    </div>
    <div class=\"col-md-3\">
      <fieldset class=\"form-group\">
        <label>&nbsp;</label>
        ";
        // line 61
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "sp_id_group", array()), 'errors');
        echo "
        ";
        // line 62
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "sp_id_group", array()), 'widget');
        echo "
      </fieldset>
    </div>
    <div class=\"col-md-6\">
      <fieldset class=\"form-group autocomplete-search\">
        <label>";
        // line 67
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Customer", array(), "Admin.Global"), "html", null, true);
        echo "</label>
        ";
        // line 68
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "sp_id_customer", array()), 'errors');
        echo "
        ";
        // line 69
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "sp_id_customer", array()), 'widget');
        echo "
      </fieldset>
    </div>
  </div>
  <div class=\"row\">
    <div id=\"specific-price-combination-selector\" class=\"col-md-6 ";
        // line 74
        echo ((($context["has_combinations"] ?? null)) ? ("") : ("hide"));
        echo "\">
      <fieldset class=\"form-group\">
        <label>";
        // line 76
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "sp_id_product_attribute", array()), "vars", array()), "label", array()), "html", null, true);
        echo "</label>
        ";
        // line 77
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "sp_id_product_attribute", array()), 'errors');
        echo "
        ";
        // line 78
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "sp_id_product_attribute", array()), 'widget');
        echo "
      </fieldset>
    </div>
    <div class=\"clearfix\"></div>
    <div class=\"col-md-3\">
      <fieldset class=\"form-group\">
        <label>";
        // line 84
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "sp_from", array()), "vars", array()), "label", array()), "html", null, true);
        echo "</label>
        ";
        // line 85
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "sp_from", array()), 'errors');
        echo "
        ";
        // line 86
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "sp_from", array()), 'widget');
        echo "
      </fieldset>
    </div>
    <div class=\"col-md-3\">
      <fieldset class=\"form-group\">
        <label>";
        // line 91
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("to", array(), "Admin.Global");
        echo "</label>
        ";
        // line 92
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "sp_to", array()), 'errors');
        echo "
        ";
        // line 93
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "sp_to", array()), 'widget');
        echo "
      </fieldset>
    </div>
    <div class=\"col-md-2\">
      <fieldset class=\"form-group\">
        <label>";
        // line 98
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "sp_from_quantity", array()), "vars", array()), "label", array()), "html", null, true);
        echo "</label>
        ";
        // line 99
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "sp_from_quantity", array()), 'errors');
        echo "
        <div class=\"input-group\">
          ";
        // line 101
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "sp_from_quantity", array()), 'widget');
        echo "
          <span class=\"input-group-addon\">";
        // line 102
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Unit(s)", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</span>
        </div>
      </fieldset>
    </div>
  </div>
  <br>

  <h4><b>";
        // line 109
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Impact on price", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</b></h4>
  <div class=\"row\">
    <div class=\"col-md-3\">
      <fieldset class=\"form-group\">
        <label>";
        // line 113
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "sp_price", array()), "vars", array()), "label", array()), "html", null, true);
        echo "</label>
        ";
        // line 114
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "sp_price", array()), 'errors');
        echo "
        ";
        // line 115
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "sp_price", array()), 'widget');
        echo "
      </fieldset>
    </div>
    <div class=\"col-md-3\">
      <fieldset class=\"form-group\">
        <label>&nbsp;</label>
        ";
        // line 121
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "leave_bprice", array()), 'errors');
        echo "
        ";
        // line 122
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "leave_bprice", array()), 'widget');
        echo "
      </fieldset>
    </div>
  </div>
  <div class=\"row\">
    <div class=\"col-xl-2 col-lg-3\">
      <fieldset class=\"form-group\">
        <label>";
        // line 129
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Apply a discount of", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</label>
        ";
        // line 130
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "sp_reduction", array()), 'errors');
        echo "
        ";
        // line 131
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "sp_reduction", array()), 'widget');
        echo "
      </fieldset>
    </div>
    <div class=\"col-xl-2 col-lg-3\">
      <fieldset class=\"form-group\">
        <label>&nbsp;</label>
        ";
        // line 137
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "sp_reduction_type", array()), 'errors');
        echo "
        ";
        // line 138
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "sp_reduction_type", array()), 'widget');
        echo "
      </fieldset>
    </div>
    <div class=\"col-xl-2 col-lg-3\">
      <fieldset class=\"form-group\">
        <label>&nbsp;</label>
        ";
        // line 144
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "sp_reduction_tax", array()), 'errors');
        echo "
        ";
        // line 145
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "sp_reduction_tax", array()), 'widget');
        echo "
      </fieldset>
    </div>
  </div>
  <div class=\"col-md-12 text-xs-right\">
    ";
        // line 150
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "cancel", array()), 'widget');
        echo "
    ";
        // line 151
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "save", array()), 'widget');
        echo "
  </div>
  <div class=\"clearfix\"></div>
</div>
";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin:Product/Include/form-specific-price.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  285 => 151,  281 => 150,  273 => 145,  269 => 144,  260 => 138,  256 => 137,  247 => 131,  243 => 130,  239 => 129,  229 => 122,  225 => 121,  216 => 115,  212 => 114,  208 => 113,  201 => 109,  191 => 102,  187 => 101,  182 => 99,  178 => 98,  170 => 93,  166 => 92,  162 => 91,  154 => 86,  150 => 85,  146 => 84,  137 => 78,  133 => 77,  129 => 76,  124 => 74,  116 => 69,  112 => 68,  108 => 67,  100 => 62,  96 => 61,  87 => 55,  83 => 54,  74 => 48,  70 => 47,  66 => 46,  60 => 42,  54 => 40,  46 => 35,  42 => 34,  38 => 33,  33 => 30,  31 => 29,  26 => 27,  22 => 26,  19 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin:Product/Include/form-specific-price.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Product/Include/form-specific-price.html.twig");
    }
}
