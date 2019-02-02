<?php

/* PrestaShopBundle:Admin/Product/Include:form_manufacturer.html.twig */
class __TwigTemplate_26834706086f9142f0b93ac615c2336e2cce9ba3e93aaf939f36f9e6716d6443 extends Twig_Template
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
        echo "<div id=\"manufacturer-content\" class=\"";
        echo ((($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", array()), "value", array()) == "")) ? ("hide") : (""));
        echo "\">
  <h2>";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Brand", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</h2>
  <div class=\"row\">
    <div class=\"col-md-4\">
      <fieldset class=\"form-group\">
      ";
        // line 30
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        echo "
      <div class=\"col-md-12\">
        ";
        // line 32
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["form"] ?? null), 'errors');
        echo "
      </div>
      </fieldset>
    </div>
    <div class=\"col-md-1\">
      <fieldset class=\"form-group\">
        <button type=\"button\" id=\"reset_brand_product\" class=\"btn btn-invisible btn-block delete p-l-0 p-r-0\"><i class=\"material-icons\">delete</i></button>
      </fieldset>
    </div>
  </div>
</div>
<div class=\"row\">
  <div class=\"col-md-4\">
    <button type=\"button\" class=\"btn btn-primary-outline sensitive open ";
        // line 45
        echo ((($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", array()), "value", array()) != "")) ? ("hide") : (""));
        echo "\" id=\"add_brand_button\">
      <i class=\"material-icons\">add_circle</i> ";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Add a brand", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "
    </button>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Product/Include:form_manufacturer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 46,  52 => 45,  36 => 32,  31 => 30,  24 => 26,  19 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin/Product/Include:form_manufacturer.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Product/Include/form_manufacturer.html.twig");
    }
}
