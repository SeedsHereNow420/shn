<?php

/* PrestaShopBundle:Admin/Product/Include:form-categories.html.twig */
class __TwigTemplate_18c7838653cb9f2ed1de2f52e530a7269e3e7890d4a1a1b4243cb8e644bcacb6 extends Twig_Template
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
        echo "<h2>";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Categories", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "
  <span class=\"help-box\" data-toggle=\"popover\"
    data-content=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Where should the product be available on your site? The main category is where the product appears by default: this is the category which is seen in the product page's URL. Disabled categories are written in italics.", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\" ></span>
</h2>
<div class=\"categories-tree js-categories-tree\">
  <fieldset class=\"form-group\">
    <div class=\"ui-widget\">
      <input type=\"text\" id=\"ps-select-product-category\" class=\"form-control autocomplete search m-b-1\" placeholder=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Search categories", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\">
      <label class=\"form-control-label text-uppercase\">";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Associated categories", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</label>
      ";
        // line 34
        echo twig_include($this->env, $context, "PrestaShopBundle:Admin:Category/categories.html.twig", array("categories" => ($context["categories"] ?? null)));
        echo "
      ";
        // line 35
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "id_category_default", array()), 'errors');
        echo "
      ";
        // line 36
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "id_category_default", array()), 'widget');
        echo "
      <div class=\"categories-tree-actions js-categories-tree-actions\">
        <span class=\"form-control-label\" data-action=\"expand\"><i class=\"material-icons\">expand_more</i>";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Expand", array(), "Admin.Actions"), "html", null, true);
        echo "</span>
        <span class=\"form-control-label\" data-action=\"reduce\"><i class=\"material-icons\">expand_less</i>";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Collapse", array(), "Admin.Actions"), "html", null, true);
        echo "</span>
        <span class=\"form-control-label pull-xl-right pull-lg-left\">";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Main category", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</span>
        <hr class=\"category-hr\"/>
      </div>
      ";
        // line 43
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "categories", array()), 'widget', array("defaultCategory" => true));
        echo " ";
        // line 44
        echo "    </div>
  </fieldset>
  ";
        // line 46
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "categories", array()), 'errors');
        echo "
  ";
        // line 47
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "categories", array()), 'widget');
        echo " ";
        // line 48
        echo "</div>
<div id=\"add-categories\">
  <h2>
    ";
        // line 51
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Create a new category", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "
    <span class=\"help-box\" data-toggle=\"popover\"
      data-content=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("If you want to quickly create a new category, you can do it here. Don’t forget to then go to the Categories page to fill in the needed details (description, image, etc.).  A new category will not automatically appear in your shop's menu, please read the Help about it.", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\" ></span>
  </h2>
  <div id=\"add-categories-content\" class=\"hide\">
    <div id=\"form_step1_new_category\" data-action=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_category_simple_add_form", array("id_product" => ($context["productId"] ?? null))), "html", null, true);
        echo "\">
      <fieldset class=\"form-group\">
        <label class=\"form-control-label\">";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("New category name", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</label>
        ";
        // line 59
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "new_category", array()), 'errors');
        echo "
        ";
        // line 60
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "new_category", array()), "name", array()), 'widget');
        echo "
      </fieldset>

    </div>

      <fieldset class=\"form-group\">
        <label class=\"form-control-label\">";
        // line 66
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "new_category", array()), "id_parent", array()), "vars", array()), "label", array()), "html", null, true);
        echo "</label>
        ";
        // line 67
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "new_category", array()), "id_parent", array()), 'widget');
        echo "
      </fieldset>

      <fieldset class=\"form-group text-xs-right\">
        <button type=\"reset\" id=\"form_step1_new_category_reset\" class=\"btn btn-tertiary-outline btn-sm\">";
        // line 71
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Cancel", array(), "Admin.Actions"), "html", null, true);
        echo "</button>
        <button type=\"button\" id=\"form_step1_new_category_save\" class=\"btn btn-primary save\">";
        // line 72
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Create", array(), "Admin.Actions"), "html", null, true);
        echo "</button>
      </fieldset>
    </div>

  <a href=\"#\" class=\"btn btn-action open\" id=\"add-category-button\">
    <i class=\"material-icons\">add</i>
    ";
        // line 78
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Create a category", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "
  </a>
</div>
";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Product/Include:form-categories.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  144 => 78,  135 => 72,  131 => 71,  124 => 67,  120 => 66,  111 => 60,  107 => 59,  103 => 58,  98 => 56,  92 => 53,  87 => 51,  82 => 48,  79 => 47,  75 => 46,  71 => 44,  68 => 43,  62 => 40,  58 => 39,  54 => 38,  49 => 36,  45 => 35,  41 => 34,  37 => 33,  33 => 32,  25 => 27,  19 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin/Product/Include:form-categories.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Product/Include/form-categories.html.twig");
    }
}
