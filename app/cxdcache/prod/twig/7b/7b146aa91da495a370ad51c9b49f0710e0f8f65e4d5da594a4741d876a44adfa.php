<?php

/* PrestaShopBundle:Admin:Product/Include/form-supplier-combination.html.twig */
class __TwigTemplate_8932c5408037907c6013cb615b647135bb2d9b8a9b9defecc77c4e74363d57c6 extends Twig_Template
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
        if ((twig_length_filter($this->env, ($context["suppliers"] ?? null)) > 0)) {
            // line 26
            echo "  <h4>";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Supplier reference(s)", array(), "Admin.Catalog.Feature"), "html", null, true);
            echo "</h4>
  <div class=\"row\">
    <div class=\"col-md-12\">
      <div class=\"alert alert-info\" role=\"alert\">
        <i class=\"material-icons\">help</i>
        <p>
          ";
            // line 32
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("You can specify product reference(s) for each associated supplier. Click \"Save\" after changing selected suppliers to display the associated product references.", array(), "Admin.Catalog.Help");
            echo "
        </p>
      </div>
    </div>
  </div>
";
        }
        // line 38
        echo "
";
        // line 39
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["suppliers"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["supplierId"]) {
            // line 40
            echo "  ";
            $context["collectionName"] = ("supplier_combination_" . $context["supplierId"]);
            // line 41
            echo "  <div class=\"panel panel-default\">
    <div class=\"panel-heading\"><strong>";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), ($context["collectionName"] ?? null), array(), "array"), "vars", array()), "label", array()), "html", null, true);
            echo "</strong></div>
    <div class=\"panel-body\" id=\"supplier_combination_";
            // line 43
            echo twig_escape_filter($this->env, $context["supplierId"], "html", null, true);
            echo "\">
      <div>
        ";
            // line 45
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), ($context["collectionName"] ?? null), array(), "array"), 'errors');
            echo "
        <table class=\"table table-striped\">
          <thead>
            <tr class=\"text-uppercase\">
              <th width=\"30%\">";
            // line 49
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Product name", array(), "Admin.Catalog.Feature"), "html", null, true);
            echo "</th>
              <th width=\"30%\">";
            // line 50
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Supplier reference", array(), "Admin.Catalog.Feature"), "html", null, true);
            echo "</th>
              <th width=\"20%\">";
            // line 51
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Price (tax excl.)", array(), "Admin.Catalog.Feature"), "html", null, true);
            echo "</th>
              <th width=\"20%\">";
            // line 52
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Currency", array(), "Admin.Global"), "html", null, true);
            echo "</th>
            </tr>
          </thead>
          <tbody>
          ";
            // line 56
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["form"] ?? null), ($context["collectionName"] ?? null), array(), "array"));
            foreach ($context['_seq'] as $context["_key"] => $context["supplier_combination"]) {
                // line 57
                echo "            <tr>
              <td>";
                // line 58
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["supplier_combination"], "vars", array()), "value", array()), "label", array()), "html", null, true);
                echo "</td>
              <td>";
                // line 59
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($context["supplier_combination"], "supplier_reference", array()), 'widget');
                echo "</td>
              <td>";
                // line 60
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($context["supplier_combination"], "product_price", array()), 'widget');
                echo "</td>
              <td>
                ";
                // line 62
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($context["supplier_combination"], "product_price_currency", array()), 'widget');
                echo "
                ";
                // line 63
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($context["supplier_combination"], "id_product_attribute", array()), 'widget');
                echo "
                ";
                // line 64
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($context["supplier_combination"], "supplier_id", array()), 'widget');
                echo "
              </td>
            </tr>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['supplier_combination'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 68
            echo "          </tbody>
        </table>
      </div>
    </div>
  </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['supplierId'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin:Product/Include/form-supplier-combination.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 68,  116 => 64,  112 => 63,  108 => 62,  103 => 60,  99 => 59,  95 => 58,  92 => 57,  88 => 56,  81 => 52,  77 => 51,  73 => 50,  69 => 49,  62 => 45,  57 => 43,  53 => 42,  50 => 41,  47 => 40,  43 => 39,  40 => 38,  31 => 32,  21 => 26,  19 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin:Product/Include/form-supplier-combination.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Product/Include/form-supplier-combination.html.twig");
    }
}
