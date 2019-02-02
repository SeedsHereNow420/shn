<?php

/* PrestaShopBundle:Admin/Security:compromised.html.twig */
class __TwigTemplate_b27b8cc960d8120c1d53ce3ab3de6fdc126e81b54b4bb296ea77be35b47156cf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 25
        $this->parent = $this->loadTemplate("::base.html.twig", "PrestaShopBundle:Admin/Security:compromised.html.twig", 25);
        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 27
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 28
        echo "  <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/new-theme/public/theme.css"), "html", null, true);
        echo "\" />
  <style>
    .fake-button {
      height: 40px;
      line-height: 30px;
    }

    #csrf-white-container div:first-child {
      background: white;
      padding: 50px;
    }

    #security-compromised-page h1 {
      padding-top: 40px;
      padding-bottom: 40px;
    }
  </style>
";
    }

    // line 47
    public function block_title($context, array $blocks = array())
    {
        // line 48
        echo "  ";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Invalid token", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "
";
    }

    // line 50
    public function block_body($context, array $blocks = array())
    {
        // line 51
        echo "  <div class=\"fluid-container\" id=\"security-compromised-page\" >
      <div id=\"csrf-white-container\" class=\"col-md-offset-1 col-md-10\">
        <div class=\"col-md-10 col-md-offset-1\">
          <div class=\"alert alert-danger\" role=\"alert\">
            <i class=\"material-icons\">error_outline</i>
            <p>
              ";
        // line 57
        echo twig_replace_filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("[1]Invalid token[/1]: direct access to this link may lead to a potential security breach.", array(), "Admin.Catalog.Help"), array("[1]" => "<b>", "[/1]" => "</b>"));
        echo "
            </p>
          </div>

          <h1 class=\"text-md-center\">";
        // line 61
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Do you want to display this page?", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "</h1>
          <div class=\"col-md-8 col-md-offset-3\">
            <a class=\"btn btn-danger-outline fake-button col-md-4\" href=\"";
        // line 63
        echo twig_escape_filter($this->env, ($context["requestUri"] ?? null), "html", null, true);
        echo "\">
              ";
        // line 64
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Yes, I understand the risks", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "
            </a>
            <a class=\"btn btn-primary fake-button col-md-4 col-md-offset-1\" href=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getAdminLink("AdminDashboard"), "html", null, true);
        echo "\">
              ";
        // line 67
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Take me out of there!", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "
            </a>
          </div>
        </div>
      </div>
  </div>
";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Security:compromised.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  102 => 67,  98 => 66,  93 => 64,  89 => 63,  84 => 61,  77 => 57,  69 => 51,  66 => 50,  59 => 48,  56 => 47,  33 => 28,  30 => 27,  11 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin/Security:compromised.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Security/compromised.html.twig");
    }
}
