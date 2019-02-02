<?php

/* PrestaShopBundle:Admin/Module/Includes:card_grid.html.twig */
class __TwigTemplate_a7c5ca195a7dcd4e2b75b96c9414bac9f97629b118edb4bf18262978d4e64cba extends Twig_Template
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
  class=\"module-item module-item-grid col-md-12 col-lg-6 col-xl-3 ";
        // line 28
        if (((($context["origin"] ?? null) == "manage") && (($context["isModuleActive"] ?? null) == "0"))) {
            echo "module-item-grid-isNotActive";
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
>
  <div class=\"module-item-wrapper-grid\">
    <div class=\"module-item-heading-grid\">
      <div class=\"module-logo-thumb-grid\">
        <img src=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "img", array()), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "displayName", array()), "html", null, true);
        echo "\"/>
      </div>
      <h3
        class=\"text-ellipsis module-name-grid\"
        data-toggle=\"tooltip\"
        data-placement=\"top\"
        title=\"";
        // line 52
        echo $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "displayName", array());
        echo "\"
      >
      ";
        // line 54
        $context["ats"] = $this->getAttribute(($context["module"] ?? null), "attributes", array());
        // line 55
        echo "        ";
        if ($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "displayName", array())) {
            // line 56
            echo "          ";
            echo $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "displayName", array());
            echo "
        ";
        } else {
            // line 58
            echo "          ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "name", array()), "html", null, true);
            echo "
        ";
        }
        // line 60
        echo "      </h3>
      <div class=\"text-ellipsis xsmall module-version-author-grid\">
        ";
        // line 62
        $this->displayBlock('addon_version', $context, $blocks);
        // line 69
        echo "      </div>
    </div>
    <div class=\"module-quick-description-grid small no-padding m-b-0\">
      ";
        // line 72
        $this->displayBlock('addon_description', $context, $blocks);
        // line 85
        echo "    </div>

    <div class=\"module-container module-quick-action-grid clearfix\">
        <div class=\"badges-container\">
          ";
        // line 89
        $context["badges"] = $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "badges", array());
        // line 90
        echo "          ";
        if (($context["badges"] ?? null)) {
            // line 91
            echo "            ";
            $context["badge"] = twig_first($this->env, ($context["badges"] ?? null));
            // line 92
            echo "            <img src=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["badge"] ?? null), "img", array()), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["badge"] ?? null), "label", array()), "html", null, true);
            echo "\"/>
            ";
            // line 93
            echo twig_escape_filter($this->env, $this->getAttribute(($context["badge"] ?? null), "label", array()), "html", null, true);
            echo "
          ";
        }
        // line 95
        echo "        </div>
      <hr />
      ";
        // line 97
        if (($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "nbRates", array()) > 0)) {
            // line 98
            echo "        <div class=\"module-stars module-star-ranking-grid-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "starsRate", array()), "html", null, true);
            echo " small\">
          (";
            // line 99
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "nbRates", array()), "html", null, true);
            echo ")
        </div>
      ";
        }
        // line 102
        echo "      <div class=\"pull-right module-price\">
      ";
        // line 103
        if ((($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "url_active", array()) == "buy") && ($this->getAttribute($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "price", array()), "raw", array()) != "0.00"))) {
            // line 104
            echo "        ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "price", array()), "displayPrice", array()), "html", null, true);
            echo "
      ";
        } elseif (($this->getAttribute($this->getAttribute(        // line 105
($context["module"] ?? null), "attributes", array()), "url_active", array()) != "buy")) {
            // line 106
            echo "        ";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Free", array(), "Admin.Modules.Feature"), "html", null, true);
            echo "
      ";
        }
        // line 108
        echo "      </div>
      ";
        // line 109
        if ((array_key_exists("requireBulkActions", $context) && (($context["requireBulkActions"] ?? null) == true))) {
            // line 110
            echo "        <div class=\"pull-right module-checkbox-bulk-grid\">
          <input type=\"checkbox\" data-name=\"";
            // line 111
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "displayName", array()), "html", null, true);
            echo "\" data-tech-name=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "name", array()), "html", null, true);
            echo "\" />
        </div>
      ";
        }
        // line 114
        echo "      ";
        $this->loadTemplate("PrestaShopBundle:Admin/Module/Includes:action_menu.html.twig", "PrestaShopBundle:Admin/Module/Includes:card_grid.html.twig", 114)->display(array_merge($context, array("module" => ($context["module"] ?? null), "level" => ($context["level"] ?? null))));
        // line 115
        echo "    </div>
    ";
        // line 116
        $this->loadTemplate("PrestaShopBundle:Admin/Module/Includes:modal_read_more.html.twig", "PrestaShopBundle:Admin/Module/Includes:card_grid.html.twig", 116)->display(array_merge($context, array("module" => ($context["module"] ?? null), "additionalModalSuffix" => ((array_key_exists("additionalModalSuffix", $context)) ? (_twig_default_filter(($context["additionalModalSuffix"] ?? null), "")) : ("")), "level" => ($context["level"] ?? null))));
        // line 117
        echo "    ";
        $this->loadTemplate("PrestaShopBundle:Admin/Module/Includes:modal_confirm.html.twig", "PrestaShopBundle:Admin/Module/Includes:card_grid.html.twig", 117)->display(array_merge($context, array("module" => ($context["module"] ?? null))));
        // line 118
        echo "  </div>
</div>
";
    }

    // line 62
    public function block_addon_version($context, array $blocks = array())
    {
        // line 63
        echo "          ";
        if (($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "productType", array()) == "service")) {
            // line 64
            echo "            ";
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Service by %author%", array("%author%" => (("<b>" . $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "author", array())) . "</b>")), "Admin.Modules.Feature");
            echo "
          ";
        } else {
            // line 66
            echo "            ";
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("v%version% - by %author%", array("%version%" => $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "version", array()), "%author%" => (("<b>" . $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "author", array())) . "</b>")), "Admin.Modules.Feature");
            echo "
          ";
        }
        // line 68
        echo "        ";
    }

    // line 72
    public function block_addon_description($context, array $blocks = array())
    {
        // line 73
        echo "        <div class=\"module-quick-description-text\">
          ";
        // line 74
        echo $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "description", array());
        echo "
          ";
        // line 75
        if (((twig_length_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "description", array())) > 0) && (twig_length_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "description", array())) < twig_length_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "fullDescription", array()))))) {
            // line 76
            echo "            ...
          ";
        }
        // line 78
        echo "        </div>
        <div class=\"module-read-more-grid\">
          ";
        // line 80
        if (($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "id", array()) != "0")) {
            // line 81
            echo "            <a class=\"module-read-more-grid-btn url\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_module_cart", array("moduleId" => $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "id", array()))), "html", null, true);
            echo "\" data-toggle=\"modal\" data-target=\"#module-modal-read-more-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "name", array()), "html", null, true);
            echo twig_escape_filter($this->env, ((array_key_exists("additionalModalSuffix", $context)) ? (_twig_default_filter(($context["additionalModalSuffix"] ?? null), "")) : ("")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Read More", array(), "Admin.Modules.Feature"), "html", null, true);
            echo "</a>
          ";
        }
        // line 83
        echo "        </div>
      ";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Module/Includes:card_grid.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  284 => 83,  273 => 81,  271 => 80,  267 => 78,  263 => 76,  261 => 75,  257 => 74,  254 => 73,  251 => 72,  247 => 68,  241 => 66,  235 => 64,  232 => 63,  229 => 62,  223 => 118,  220 => 117,  218 => 116,  215 => 115,  212 => 114,  204 => 111,  201 => 110,  199 => 109,  196 => 108,  190 => 106,  188 => 105,  183 => 104,  181 => 103,  178 => 102,  172 => 99,  167 => 98,  165 => 97,  161 => 95,  156 => 93,  149 => 92,  146 => 91,  143 => 90,  141 => 89,  135 => 85,  133 => 72,  128 => 69,  126 => 62,  122 => 60,  116 => 58,  110 => 56,  107 => 55,  105 => 54,  100 => 52,  89 => 46,  81 => 41,  77 => 40,  73 => 39,  69 => 38,  65 => 37,  61 => 36,  57 => 35,  53 => 34,  49 => 33,  45 => 32,  41 => 31,  37 => 30,  33 => 29,  27 => 28,  23 => 26,  21 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin/Module/Includes:card_grid.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Module/Includes/card_grid.html.twig");
    }
}
