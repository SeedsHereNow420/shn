<?php

/* PrestaShopBundle:Admin:Product/Include/form-supplier-choice.html.twig */
class __TwigTemplate_c2e7625c64ca932a275a606b81ff287f87fde4162f8b29d5eed03526943f95a9 extends Twig_Template
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
        if ((twig_length_filter($this->env, $this->getAttribute(($context["form"] ?? null), "suppliers", array())) > 0)) {
            // line 26
            echo "  <div id=\"custom_fields\">
    <h2>";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "suppliers", array()), "vars", array()), "label", array()), "html", null, true);
            echo "</h2>
    <div class=\"row m-b-1\">
      <div class=\"col-md-12\">
        <div class=\"alert alert-info alert-drop\" role=\"alert\">
          <i class=\"material-icons\">help</i>
          <p class=\"alert-text\">
            ";
            // line 33
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("This interface allows you to specify the suppliers of the current product and its combinations, if any.", array(), "Admin.Catalog.Help");
            echo "<br>
            ";
            // line 34
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("You can specify supplier references according to previously associated suppliers.", array(), "Admin.Catalog.Help");
            echo "
            <strong>";
            // line 35
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Read more", array(), "Admin.Actions");
            echo "</strong>
          </p>
        </div>
        <div class=\"alert alert-info alert-down\" role=\"alert\">
          <p class=\"alert-down-text\">
            ";
            // line 40
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("When using the advanced stock management tool (see Shop Parameters > Products settings), the values you define (price, references) will be used in supply orders.", array(), "Admin.Catalog.Help");
            echo "
          </p>
        </div>
      </div>
    </div>

    <div class=\"panel panel-default\">
      <div class=\"panel-body\">
        <div>
          ";
            // line 49
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "suppliers", array()), 'errors');
            echo "
          <table class=\"table table-striped\" id=\"form_step6_suppliers\">
            <thead>
            <tr class=\"text-uppercase\">
              <th width=\"70%\">";
            // line 53
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Choose the suppliers associated with this product", array(), "Admin.Catalog.Feature"), "html", null, true);
            echo "</th>
              <th width=30%\">";
            // line 54
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Default supplier", array(), "Admin.Catalog.Feature"), "html", null, true);
            echo "</th>
            </tr>
            </thead>
            <tbody>
            ";
            // line 58
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["form"] ?? null), "suppliers", array()));
            foreach ($context['_seq'] as $context["key"] => $context["supplier"]) {
                // line 59
                echo "              <tr>
                <td>";
                // line 60
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["supplier"], 'widget');
                echo "</td>
                <td>";
                // line 61
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "default_supplier", array()), $context["key"], array(), "array"), 'widget');
                echo "</td>
              </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['supplier'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 64
            echo "            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
";
        }
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin:Product/Include/form-supplier-choice.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 64,  90 => 61,  86 => 60,  83 => 59,  79 => 58,  72 => 54,  68 => 53,  61 => 49,  49 => 40,  41 => 35,  37 => 34,  33 => 33,  24 => 27,  21 => 26,  19 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin:Product/Include/form-supplier-choice.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Product/Include/form-supplier-choice.html.twig");
    }
}
