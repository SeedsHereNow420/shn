<?php

/* PrestaShopBundle:Admin/Module/Includes:notification_kpis.html.twig */
class __TwigTemplate_bec5dbb1f46291cbdd6ae915a95eb7448a04e567f17a38ee13b20a81b9096ffc extends Twig_Template
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
        echo "<div class=\"row\">
    <div class=\"col-lg-10 col-lg-offset-1\">
        <div class=\"module-notification-kpis\">

            <div id=\"module-kpi-settings\" class=\"module-kpi\">
                <i class=\"material-icons\">settings</i>
                ";
        // line 31
        echo twig_replace_filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("%nbModules% modules to configure", array("%nbModules%" => twig_length_filter($this->env, $this->getAttribute(($context["modules"] ?? null), "to_configure", array()))), "Admin.Modules.Feature"), array("[1]" => "<span class=\"module-kpi-number\">", "[/1]" => "</span>"));
        echo "
            </div>

            <div id=\"module-kpi-update\" class=\"module-kpi\">
                <i class=\"material-icons\">update</i>
                ";
        // line 36
        echo twig_replace_filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("%nbModules% modules to update", array("%nbModules%" => twig_length_filter($this->env, $this->getAttribute(($context["modules"] ?? null), "to_update", array()))), "Admin.Modules.Feature"), array("[1]" => "<span class=\"module-kpi-number\">", "[/1]" => "</span>"));
        echo "
            </div>

        </div>
    </div>
</div>

<hr class=\"top-menu-separator\"/>
";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Module/Includes:notification_kpis.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 36,  27 => 31,  19 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin/Module/Includes:notification_kpis.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Module/Includes/notification_kpis.html.twig");
    }
}
