<?php

/* PrestaShopBundle:Admin/Module/Includes:dropdown_status.html.twig */
class __TwigTemplate_3f4ea5aa33ed14226c1be889b9c18e05237ded31425c6ba0bffb13b7c045abe7 extends Twig_Template
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
        echo "<div class=\"ps-dropdown dropdown btn-group bordered\">
    <div id=\"module-status-dropdown\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
        <span class=\"js-selected-item selected-item module-status-selector-label\">";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Show all modules", array(), "Admin.Modules.Feature"), "html", null, true);
        echo "</span>
        <i class=\"material-icons arrow-down pull-right\">keyboard_arrow_down</i>
    </div>

    <div class=\"ps-dropdown-menu dropdown-menu\" aria-labelledby=\"module-status-dropdown\">
        <ul class=\"items-list js-items-list module-status-selector\">
            <li class=\"module-status-reset\">
                <a class=\"dropdown-item\" href=\"#\">
                    ";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Show all modules", array(), "Admin.Modules.Feature"), "html", null, true);
        echo "
                </a>
            </li>
            <li class=\"module-status-menu\" data-status-ref=\"1\">
                <a class=\"dropdown-item\" href=\"#\">
                    ";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Enabled Modules", array(), "Admin.Modules.Feature"), "html", null, true);
        echo "
                </a>
            </li>
            <li class=\"module-status-menu\" data-status-ref=\"0\">
                <a class=\"dropdown-item\" href=\"#\">
                    ";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Disabled Modules", array(), "Admin.Modules.Feature"), "html", null, true);
        echo "
                </a>
            </li>
        </ul>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Module/Includes:dropdown_status.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 45,  42 => 40,  34 => 35,  23 => 27,  19 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin/Module/Includes:dropdown_status.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Module/Includes/dropdown_status.html.twig");
    }
}
