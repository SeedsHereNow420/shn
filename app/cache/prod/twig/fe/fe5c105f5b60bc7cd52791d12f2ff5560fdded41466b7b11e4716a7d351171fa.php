<?php

/* PrestaShopBundle:Admin\Stock:overview.html.twig */
class __TwigTemplate_85f905d493c76878bea5b22d3e601e098485dcc2fa3a09164e567496aa03a839 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 25
        $this->parent = $this->loadTemplate("PrestaShopBundle:Admin:layout.html.twig", "PrestaShopBundle:Admin\\Stock:overview.html.twig", 25);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'javascripts' => array($this, 'block_javascripts'),
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
    public function block_content($context, array $blocks = array())
    {
        // line 28
        echo "
    ";
        // line 29
        if (($context["is_shop_context"] ?? null)) {
            // line 30
            echo "        <div id=\"stock-app\"></div>

    ";
        } else {
            // line 33
            echo "        <div class=\"col-md-12\">
            <div class=\"alert alert-danger\" role=\"alert\">
                <i class=\"material-icons\">info_outline</i><p class=\"alert-text\">";
            // line 35
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("You can't manage your stock in this shop context: select a shop instead of a group of shops.", array(), "Admin.Catalog.Notification"), "html", null, true);
            echo "</p>
            </div>
        </div>
    ";
        }
        // line 39
        echo "
";
    }

    // line 42
    public function block_javascripts($context, array $blocks = array())
    {
        // line 43
        echo "
    ";
        // line 44
        if (($context["is_shop_context"] ?? null)) {
            // line 45
            echo "        ";
            $this->displayParentBlock("javascripts", $context, $blocks);
            echo "

        ";
            // line 47
            $context["productId"] = (($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? null), "request", array()), "query", array()), "get", array(0 => "productId"), "method")) ? ($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? null), "request", array()), "query", array()), "get", array(0 => "productId"), "method")) : (false));
            // line 48
            echo "        <script>
            var data = {
                baseUrl: '";
            // line 50
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "request", array()), "getBasePath", array(), "method"), "html", null, true);
            echo "',
                catalogUrl: '";
            // line 51
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("admin_product_catalog");
            echo "',
                stockUrl: '";
            // line 52
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("admin_stock_overview");
            echo "',
                apiStockUrl: '";
            // line 53
            echo twig_escape_filter($this->env, ((($context["productId"] ?? null)) ? ($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("api_stock_list_product_combinations", array("productId" => ($context["productId"] ?? null)))) : ($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("api_stock_list_products"))), "html", null, true);
            echo "',
                apiMovementsUrl: '";
            // line 54
            echo twig_escape_filter($this->env, ((($context["productId"] ?? null)) ? ($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("api_stock_product_list_movements", array("productId" => ($context["productId"] ?? null)))) : ($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("api_stock_list_movements"))), "html", null, true);
            echo "',
                employeesUrl: '";
            // line 55
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("api_stock_list_movements_employees");
            echo "',
                suppliersUrl: '";
            // line 56
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("api_stock_list_suppliers");
            echo "',
                categoriesUrl: '";
            // line 57
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("api_stock_list_categories");
            echo "',
                movementsTypesUrl: '";
            // line 58
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("api_stock_list_movements_types", array("grouped" => true));
            echo "',
                translationUrl: '";
            // line 59
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("api_i18n_translations_list", array("page" => "stock"));
            echo "',
                locale: '";
            // line 60
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "request", array()), "locale", array()), "html", null, true);
            echo "'
            }
        </script>

        ";
            // line 64
            if (($context["webpack_server"] ?? null)) {
                // line 65
                echo "            <script src=\"http://localhost:8080/stock.bundle.js\"></script>
        ";
            } else {
                // line 67
                echo "            <script src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/new-theme/public/stock.bundle.js"), "html", null, true);
                echo "\"></script>
        ";
            }
            // line 69
            echo "    ";
        }
        // line 70
        echo "
";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin\\Stock:overview.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  140 => 70,  137 => 69,  131 => 67,  127 => 65,  125 => 64,  118 => 60,  114 => 59,  110 => 58,  106 => 57,  102 => 56,  98 => 55,  94 => 54,  90 => 53,  86 => 52,  82 => 51,  78 => 50,  74 => 48,  72 => 47,  66 => 45,  64 => 44,  61 => 43,  58 => 42,  53 => 39,  46 => 35,  42 => 33,  37 => 30,  35 => 29,  32 => 28,  29 => 27,  11 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin\\Stock:overview.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Stock/overview.html.twig");
    }
}
