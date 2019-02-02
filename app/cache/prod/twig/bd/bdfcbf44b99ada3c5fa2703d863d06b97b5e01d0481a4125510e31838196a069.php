<?php

/* PrestaShopBundle:Admin\ProductImage:form.html.twig */
class __TwigTemplate_b6408b7acbd5cb63d3ccf20f9b465fb7f298f41a2132421a18943e284df5d48a extends Twig_Template
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
        echo "<button type=\"button\" class=\"pull-right close\" onclick=\"formImagesProduct.close()\"><i class=\"material-icons\">close</i></button>

<div class=\"row\">
    <div class=\"col-lg-12 col-xl-7\">
      ";
        // line 29
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "cover", array()), 'widget');
        echo "
    </div>
    <div class=\"col-lg-12 col-xl-4\">
        <a href=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute(($context["image"] ?? null), "base_image_url", array()), "html", null, true);
        echo ".";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["image"] ?? null), "format", array()), "html", null, true);
        echo "\" class=\"btn btn-invisible btn-sm open-image\" target=\"_blank\">
          <i class=\"material-icons\">zoom_in</i> ";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Zoom", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "
        </a>
    </div>
</div>

<label class=\"control-label\">";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "legend", array()), "vars", array()), "label", array()), "html", null, true);
        echo "</label>
";
        // line 39
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "legend", array()), 'widget');
        echo "
";
        // line 40
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "legend", array()), 'errors');
        echo "

<div class=\"actions\">
    <button type=\"button\" class=\"btn btn-sm btn-primary pull-sm-right\" onclick=\"formImagesProduct.send(";
        // line 43
        echo twig_escape_filter($this->env, $this->getAttribute(($context["image"] ?? null), "id", array()), "html", null, true);
        echo ")\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save image settings", array(), "Admin.Actions"), "html", null, true);
        echo "</button>
    <button type=\"button\" class=\"btn btn-sm btn-invisible\" onclick=\"formImagesProduct.delete(";
        // line 44
        echo twig_escape_filter($this->env, $this->getAttribute(($context["image"] ?? null), "id", array()), "html", null, true);
        echo ")\"><i class=\"material-icons\">delete</i> ";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Delete", array(), "Admin.Actions"), "html", null, true);
        echo "</button>
</div>
";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin\\ProductImage:form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 44,  59 => 43,  53 => 40,  49 => 39,  45 => 38,  37 => 33,  31 => 32,  25 => 29,  19 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin\\ProductImage:form.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/ProductImage/form.html.twig");
    }
}
