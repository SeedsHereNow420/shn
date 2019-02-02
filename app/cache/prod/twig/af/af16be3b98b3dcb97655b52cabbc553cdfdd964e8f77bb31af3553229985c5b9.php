<?php

/* PrestaShopBundle:Admin/Module:notifications.html.twig */
class __TwigTemplate_2656f761b815bb4a730037ab42af1199c11be7ec62f9133c7d7693b450e655b3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 25
        $this->parent = $this->loadTemplate("PrestaShopBundle:Admin:layout.html.twig", "PrestaShopBundle:Admin/Module:notifications.html.twig", 25);
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
    }

    // line 41
    public function block_content($context, array $blocks = array())
    {
        // line 42
        echo "    ";
        // line 43
        echo "    ";
        $this->loadTemplate("PrestaShopBundle:Admin/Module/Includes:modal_addons_connect.html.twig", "PrestaShopBundle:Admin/Module:notifications.html.twig", 43)->display(array_merge($context, array("level" => ($context["level"] ?? null), "errorMessage" => ($context["errorMessage"] ?? null))));
        // line 44
        echo "    ";
        // line 45
        echo "    ";
        $this->loadTemplate("PrestaShopBundle:Admin/Module/Includes:modal_import.html.twig", "PrestaShopBundle:Admin/Module:notifications.html.twig", 45)->display(array_merge($context, array("level" => ($context["level"] ?? null), "errorMessage" => ($context["errorMessage"] ?? null))));
        // line 46
        echo "    ";
        // line 47
        echo "    ";
        $this->loadTemplate("PrestaShopBundle:Admin/Module/Includes:notification_kpis.html.twig", "PrestaShopBundle:Admin/Module:notifications.html.twig", 47)->display($context);
        // line 48
        echo "    ";
        // line 49
        echo "    <div class=\"row\">
        <div class=\"col-lg-10 col-lg-offset-1\">
            <div id=\"module-short-list-configure\" class=\"module-short-list\">
                <span class=\"module-search-result-wording\">";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("%nbModules% modules to configure", array("%nbModules%" => twig_length_filter($this->env, $this->getAttribute(($context["modules"] ?? null), "to_configure", array()))), "Admin.Modules.Feature"), "html", null, true);
        echo "</span>
                <span class=\"help-box\" data-toggle=\"popover\"
                      data-title=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Modules to configure", array(), "Admin.Modules.Feature"), "html", null, true);
        echo "\"
                      data-content=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("These modules require your attention: you need to take some action to ensure they are fully operational.", array(), "Admin.Modules.Help"), "html", null, true);
        echo "\">
                </span>
            </div>
            ";
        // line 58
        $this->loadTemplate("PrestaShopBundle:Admin/Module/Includes:grid_notification_configure.html.twig", "PrestaShopBundle:Admin/Module:notifications.html.twig", 58)->display(array_merge($context, array("modules" => $this->getAttribute(($context["modules"] ?? null), "to_configure", array()), "display_type" => "list", "id" => "notification")));
        // line 59
        echo "
            <hr class=\"top-menu-separator\">
            <div id=\"module-short-list-update\" class=\"module-short-list\">
                <span class=\"module-search-result-wording\">";
        // line 62
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("%nbModules% modules to update", array("%nbModules%" => twig_length_filter($this->env, $this->getAttribute(($context["modules"] ?? null), "to_update", array()))), "Admin.Modules.Feature"), "html", null, true);
        echo "</span>
                <span class=\"help-box\" data-toggle=\"popover\"
                      data-title=\"";
        // line 64
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Modules to update", array(), "Admin.Modules.Feature"), "html", null, true);
        echo "\"
                      data-content=\"";
        // line 65
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Update these modules to enjoy their latest versions.", array(), "Admin.Modules.Help"), "html", null, true);
        echo "\">
                </span>
                ";
        // line 67
        if (((twig_length_filter($this->env, $this->getAttribute(($context["modules"] ?? null), "to_update", array())) > 1) && (($context["level"] ?? null) >= twig_constant("PrestaShopBundle\\Security\\Voter\\PageVoter::LEVEL_UPDATE")))) {
            // line 68
            echo "                <a class=\"btn btn-primary-reverse pull-right btn-primary-outline light-button module_action_menu_upgrade_all\" href=\"#\" data-confirm_modal=\"module-modal-confirm-upgrade-all\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Upgrade All", array(), "Admin.Modules.Feature"), "html", null, true);
            echo "</a>
                ";
        }
        // line 70
        echo "            </div>
            ";
        // line 71
        $this->loadTemplate("PrestaShopBundle:Admin/Module/Includes:grid_notification_update.html.twig", "PrestaShopBundle:Admin/Module:notifications.html.twig", 71)->display(array_merge($context, array("modules" => $this->getAttribute(($context["modules"] ?? null), "to_update", array()), "display_type" => "list", "id" => "update", "level" => ($context["level"] ?? null))));
        // line 72
        echo "        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Module:notifications.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  148 => 72,  146 => 71,  143 => 70,  137 => 68,  135 => 67,  130 => 65,  126 => 64,  121 => 62,  116 => 59,  114 => 58,  108 => 55,  104 => 54,  99 => 52,  94 => 49,  92 => 48,  89 => 47,  87 => 46,  84 => 45,  82 => 44,  79 => 43,  77 => 42,  74 => 41,  68 => 38,  64 => 37,  60 => 36,  56 => 35,  51 => 34,  48 => 33,  42 => 30,  38 => 29,  33 => 28,  30 => 27,  11 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin/Module:notifications.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Module/notifications.html.twig");
    }
}
