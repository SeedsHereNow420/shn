<?php

/* PrestaShopBundle:Admin/Common/_partials:_header_tab.html.twig */
class __TwigTemplate_3766c03e4b95438209e20d57adb0bba96a5650a60b3844be9ec28e556f9a1890 extends Twig_Template
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
        echo "<a class=\"tab";
        if ($this->getAttribute(($context["tabData"] ?? null), "isCurrent", array())) {
            echo " current";
        }
        echo "\"
   href=\"";
        // line 26
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath($this->getAttribute(($context["tabData"] ?? null), "route", array()));
        echo "\">";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans($this->getAttribute(($context["tabData"] ?? null), "title", array()), array(), "AdminControllersListener"), "html", null, true);
        // line 28
        if ($this->getAttribute(($context["tabData"] ?? null), "notificationsCounter", array(), "any", true, true)) {
            // line 29
            echo "  <div class=\"notification-container\">
    <span class=\"notification-counter\">";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute(($context["tabData"] ?? null), "notificationsCounter", array()), "html", null, true);
            echo "</span>
  </div>
  ";
        }
        // line 33
        echo "</a>
";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Common/_partials:_header_tab.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 33,  36 => 30,  33 => 29,  31 => 28,  29 => 27,  26 => 26,  19 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin/Common/_partials:_header_tab.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Common/_partials/_header_tab.html.twig");
    }
}
