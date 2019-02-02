<?php

/* PrestaShopBundle:Admin/Module:catalog.html.twig */
class __TwigTemplate_cee61626d00197b76cfb32ab3bffc1e38ae98fc994da79266fc2ecedd1548499 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 25
        $this->parent = $this->loadTemplate("PrestaShopBundle:Admin:layout.html.twig", "PrestaShopBundle:Admin/Module:catalog.html.twig", 25);
        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "PrestaShopBundle:Admin:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 27
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 28
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <link rel=\"stylesheet\" href=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/css/bundle/module/drop.css"), "html", null, true);
        echo "\" />
    <link rel=\"stylesheet\" href=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/css/bundle/plugins/jquery.pstagger.css"), "html", null, true);
        echo "\" />
";
    }

    // line 33
    public function block_javascripts($context, array $blocks = array())
    {
        // line 34
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script src=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/plugins/jquery.pstagger.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/module/loader.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/module/module_card.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/module/module.js"), "html", null, true);
        echo "\"></script>
    ";
        // line 39
        if ($this->getAttribute($this->getAttribute(($context["app"] ?? null), "request", array()), "get", array(0 => "filterCategoryTab"), "method")) {
            // line 40
            echo "      <script>
        \$('body').on('moduleCatalogLoaded', function() {
          \$('.module-category-menu[data-category-tab=\"";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "request", array()), "get", array(0 => "filterCategoryTab"), "method"), "html", null, true);
            echo "\"]').click();
      });
      </script>
    ";
        }
    }

    // line 48
    public function block_content($context, array $blocks = array())
    {
        // line 49
        echo "    <div class=\"row\">
        <div class=\"col-lg-10 col-lg-offset-1 module-catalog-page\">
            ";
        // line 52
        echo "            ";
        $this->loadTemplate("PrestaShopBundle:Admin/Module/Includes:modal_addons_connect.html.twig", "PrestaShopBundle:Admin/Module:catalog.html.twig", 52)->display(array_merge($context, array("level" => ($context["level"] ?? null), "errorMessage" => ($context["errorMessage"] ?? null))));
        // line 53
        echo "            ";
        // line 54
        echo "            ";
        $this->loadTemplate("PrestaShopBundle:Admin/Module/Includes:modal_import.html.twig", "PrestaShopBundle:Admin/Module:catalog.html.twig", 54)->display(array_merge($context, array("level" => ($context["level"] ?? null), "errorMessage" => ($context["errorMessage"] ?? null))));
        // line 55
        echo "            ";
        // line 56
        echo "            ";
        $this->loadTemplate("PrestaShopBundle:Admin/Module/Includes:menu_top.html.twig", "PrestaShopBundle:Admin/Module:catalog.html.twig", 56)->display($context);
        // line 57
        echo "            ";
        // line 58
        echo "            ";
        $this->loadTemplate("PrestaShopBundle:Admin/Module/Includes:grid_loader.html.twig", "PrestaShopBundle:Admin/Module:catalog.html.twig", 58)->display($context);
        // line 59
        echo "            ";
        // line 60
        echo "            ";
        if ($this->getAttribute(($context["topMenuData"] ?? null), "categories", array(), "any", true, true)) {
            // line 61
            echo "                ";
            $this->loadTemplate("PrestaShopBundle:Admin/Module/Includes:categories_grid.html.twig", "PrestaShopBundle:Admin/Module:catalog.html.twig", 61)->display(array_merge($context, array("categories" => $this->getAttribute(($context["topMenuData"] ?? null), "categories", array()))));
            // line 62
            echo "            ";
        }
        // line 63
        echo "        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Module:catalog.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 63,  120 => 62,  117 => 61,  114 => 60,  112 => 59,  109 => 58,  107 => 57,  104 => 56,  102 => 55,  99 => 54,  97 => 53,  94 => 52,  90 => 49,  87 => 48,  78 => 42,  74 => 40,  72 => 39,  68 => 38,  64 => 37,  60 => 36,  56 => 35,  51 => 34,  48 => 33,  42 => 30,  38 => 29,  33 => 28,  30 => 27,  11 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin/Module:catalog.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Module/catalog.html.twig");
    }
}
