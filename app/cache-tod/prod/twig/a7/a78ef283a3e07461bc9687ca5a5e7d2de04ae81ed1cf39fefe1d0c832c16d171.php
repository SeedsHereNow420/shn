<?php

/* PrestaShopBundle:Admin/Module/Includes:card_list.html.twig */
class __TwigTemplate_9a786dbd1fecc642e0e430272ae93e6eb755cb537a849bb667c30a6852c04cef extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'addon_version' => array($this, 'block_addon_version'),
            'addon_description' => array($this, 'block_addon_description'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 25
        $context["isModuleActive"] = (($this->getAttribute($this->getAttribute(($context["module"] ?? null), "database", array(), "any", false, true), "active", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["module"] ?? null), "database", array(), "any", false, true), "active", array()), "0")) : ("0"));
        // line 26
        echo "
<div
  class=\"module-item module-item-list col-md-12 ";
        // line 28
        if (((($context["origin"] ?? null) == "manage") && (($context["isModuleActive"] ?? null) == "0"))) {
            echo "module-item-list-isNotActive";
        }
        echo "\"
  data-id=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "id", array()), "html", null, true);
        echo "\"
  data-name=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "displayName", array()), "html", null, true);
        echo "\"
  data-scoring=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "avgRate", array()), "html", null, true);
        echo "\"
  data-logo=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "img", array()), "html", null, true);
        echo "\"
  data-author=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "author", array()), "html", null, true);
        echo "\"
  data-version=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "version", array()), "html", null, true);
        echo "\"
  data-description=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "description", array()), "html", null, true);
        echo "\"
  data-tech-name=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "name", array()), "html", null, true);
        echo "\"
  data-child-categories=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "categoryName", array()), "html", null, true);
        echo "\"
  data-categories=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "categoryParent", array()), "html", null, true);
        echo "\"
  data-type=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "productType", array()), "html", null, true);
        echo "\"
  data-price=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "price", array()), "raw", array()), "html", null, true);
        echo "\"
  data-active=\"";
        // line 41
        echo twig_escape_filter($this->env, ($context["isModuleActive"] ?? null), "html", null, true);
        echo "\"
  data-last-access=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "database", array()), "last_access_date", array()), "html", null, true);
        echo "\"
>
  <div class=\"container-fluid\">
    <div class=\"module-item-wrapper-list row\">
      <div class=\"module-logo-thumb-list col-sm-12 col-md-12 col-lg-1 text-sm-center\">
        <img src=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "img", array()), "html", null, true);
        echo "\" class=\"text-md-center\" alt=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "displayName", array()), "html", null, true);
        echo "\"/>
      </div>
      <div class=\"col-sm-12 col-md-10 col-lg-11\">
        <h3
          class=\"text-ellipsis module-name-list\"
          data-toggle=\"tooltip\"
          data-placement=\"top\"
          title=\"";
        // line 54
        echo $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "displayName", array());
        echo "\"
        >
          ";
        // line 56
        if ($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "displayName", array())) {
            // line 57
            echo "            ";
            echo $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "displayName", array());
            echo "
          ";
        } else {
            // line 59
            echo "            ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "name", array()), "html", null, true);
            echo "
          ";
        }
        // line 61
        echo "        </h3>
      </div>
      <div class=\"col-sm-12 col-md-2\">
        <span class=\"text-ellipsis xsmall\">
          ";
        // line 65
        $this->displayBlock('addon_version', $context, $blocks);
        // line 72
        echo "        </span>
      </div>
      <div class=\"col-sm-12 col-md-8 col-lg-6\">
        ";
        // line 75
        $this->displayBlock('addon_description', $context, $blocks);
        // line 86
        echo "      </div>
      <div class=\"col-sm-12 col-md-12 col-lg-3 text-md-right\">
        ";
        // line 88
        if ((array_key_exists("requireBulkActions", $context) && (($context["requireBulkActions"] ?? null) == true))) {
            // line 89
            echo "          <div class=\"pull-right module-checkbox-bulk-list\">
            <input type=\"checkbox\" data-name=\"";
            // line 90
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "displayName", array()), "html", null, true);
            echo "\" data-tech-name=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "name", array()), "html", null, true);
            echo "\" />
          </div>
        ";
        }
        // line 93
        echo "        ";
        $this->loadTemplate("PrestaShopBundle:Admin/Module/Includes:action_menu.html.twig", "PrestaShopBundle:Admin/Module/Includes:card_list.html.twig", 93)->display(array_merge($context, array("module" => ($context["module"] ?? null))));
        // line 94
        echo "      </div>
      ";
        // line 95
        $this->loadTemplate("PrestaShopBundle:Admin/Module/Includes:modal_read_more.html.twig", "PrestaShopBundle:Admin/Module/Includes:card_list.html.twig", 95)->display(array_merge($context, array("module" => ($context["module"] ?? null), "additionalModalSuffix" => ((array_key_exists("additionalModalSuffix", $context)) ? (_twig_default_filter(($context["additionalModalSuffix"] ?? null), "")) : ("")))));
        // line 96
        echo "      ";
        $this->loadTemplate("PrestaShopBundle:Admin/Module/Includes:modal_confirm.html.twig", "PrestaShopBundle:Admin/Module/Includes:card_list.html.twig", 96)->display(array_merge($context, array("module" => ($context["module"] ?? null))));
        // line 97
        echo "    </div>
  </div>
</div>
";
    }

    // line 65
    public function block_addon_version($context, array $blocks = array())
    {
        // line 66
        echo "            ";
        if (($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "productType", array()) == "service")) {
            // line 67
            echo "              ";
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Service by %author%", array("%author%" => (("<b>" . $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "author", array())) . "</b>")), "Admin.Modules.Feature");
            echo "
            ";
        } else {
            // line 69
            echo "              ";
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("v%version% - by %author%", array("%version%" => $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "version", array()), "%author%" => (("<b>" . $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "author", array())) . "</b>")), "Admin.Modules.Feature");
            echo "
            ";
        }
        // line 71
        echo "          ";
    }

    // line 75
    public function block_addon_description($context, array $blocks = array())
    {
        // line 76
        echo "          ";
        echo $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "description", array());
        echo "
          ";
        // line 77
        if (((twig_length_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "description", array())) > 0) && (twig_length_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "description", array())) < twig_length_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "fullDescription", array()))))) {
            // line 78
            echo "            ...
          ";
        }
        // line 80
        echo "          <span>
            ";
        // line 81
        if (($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "id", array()) != "0")) {
            // line 82
            echo "              <a class=\"module-read-more-list-btn url\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_module_cart", array("moduleId" => $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "id", array()))), "html", null, true);
            echo "\" data-toggle=\"modal\" data-target=\"#module-modal-read-more-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "name", array()), "html", null, true);
            echo twig_escape_filter($this->env, ((array_key_exists("additionalModalSuffix", $context)) ? (_twig_default_filter(($context["additionalModalSuffix"] ?? null), "")) : ("")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Read More", array(), "Admin.Modules.Feature"), "html", null, true);
            echo "</a>
            ";
        }
        // line 84
        echo "          </span>
        ";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Module/Includes:card_list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  226 => 84,  215 => 82,  213 => 81,  210 => 80,  206 => 78,  204 => 77,  199 => 76,  196 => 75,  192 => 71,  186 => 69,  180 => 67,  177 => 66,  174 => 65,  167 => 97,  164 => 96,  162 => 95,  159 => 94,  156 => 93,  148 => 90,  145 => 89,  143 => 88,  139 => 86,  137 => 75,  132 => 72,  130 => 65,  124 => 61,  118 => 59,  112 => 57,  110 => 56,  105 => 54,  93 => 47,  85 => 42,  81 => 41,  77 => 40,  73 => 39,  69 => 38,  65 => 37,  61 => 36,  57 => 35,  53 => 34,  49 => 33,  45 => 32,  41 => 31,  37 => 30,  33 => 29,  27 => 28,  23 => 26,  21 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin/Module/Includes:card_list.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Module/Includes/card_list.html.twig");
    }
}
