<?php

/* PrestaShopBundle:Admin/Module/Includes:card_list.html.twig */
class __TwigTemplate_9164ee549c38b1a6ba2a9da1b5ae0a7a3f4340aef470d5e4a1294d6b8e4a37c3 extends Twig_Template
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
        $__internal_04b302de183db7fc991a93a1fb034b2429eba2380ea73fa461a9877c414e0a50 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_04b302de183db7fc991a93a1fb034b2429eba2380ea73fa461a9877c414e0a50->enter($__internal_04b302de183db7fc991a93a1fb034b2429eba2380ea73fa461a9877c414e0a50_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "PrestaShopBundle:Admin/Module/Includes:card_list.html.twig"));

        // line 25
        $context["isModuleActive"] = (($this->getAttribute($this->getAttribute(($context["module"] ?? null), "database", array(), "any", false, true), "active", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["module"] ?? null), "database", array(), "any", false, true), "active", array()), "0")) : ("0"));
        // line 26
        echo "
<div
  class=\"module-item module-item-list col-md-12 ";
        // line 28
        if (((($context["origin"] ?? $this->getContext($context, "origin")) == "manage") && (($context["isModuleActive"] ?? $this->getContext($context, "isModuleActive")) == "0"))) {
            echo "module-item-list-isNotActive";
        }
        echo "\"
  data-id=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "id", array()), "html", null, true);
        echo "\"
  data-name=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "displayName", array()), "html", null, true);
        echo "\"
  data-scoring=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "avgRate", array()), "html", null, true);
        echo "\"
  data-logo=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "img", array()), "html", null, true);
        echo "\"
  data-author=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "author", array()), "html", null, true);
        echo "\"
  data-version=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "version", array()), "html", null, true);
        echo "\"
  data-description=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "description", array()), "html", null, true);
        echo "\"
  data-tech-name=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "name", array()), "html", null, true);
        echo "\"
  data-child-categories=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "categoryName", array()), "html", null, true);
        echo "\"
  data-categories=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "categoryParent", array()), "html", null, true);
        echo "\"
  data-type=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "productType", array()), "html", null, true);
        echo "\"
  data-price=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "price", array()), "raw", array()), "html", null, true);
        echo "\"
  data-active=\"";
        // line 41
        echo twig_escape_filter($this->env, ($context["isModuleActive"] ?? $this->getContext($context, "isModuleActive")), "html", null, true);
        echo "\"
  data-last-access=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "database", array()), "last_access_date", array()), "html", null, true);
        echo "\"
>
  <div class=\"container-fluid\">
    <div class=\"module-item-wrapper-list row\">
      <div class=\"module-logo-thumb-list col-sm-12 col-md-12 col-lg-1 text-sm-center\">
        <img src=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "img", array()), "html", null, true);
        echo "\" class=\"text-md-center\" alt=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "displayName", array()), "html", null, true);
        echo "\"/>
      </div>
      <div class=\"col-sm-12 col-md-10 col-lg-11\">
        <h3
          class=\"text-ellipsis module-name-list\"
          data-toggle=\"tooltip\"
          data-placement=\"top\"
          title=\"";
        // line 54
        echo $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "displayName", array());
        echo "\"
        >
          ";
        // line 56
        if ($this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "displayName", array())) {
            // line 57
            echo "            ";
            echo $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "displayName", array());
            echo "
          ";
        } else {
            // line 59
            echo "            ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "name", array()), "html", null, true);
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
        if ((array_key_exists("requireBulkActions", $context) && (($context["requireBulkActions"] ?? $this->getContext($context, "requireBulkActions")) == true))) {
            // line 89
            echo "          <div class=\"pull-right module-checkbox-bulk-list\">
            <input type=\"checkbox\" data-name=\"";
            // line 90
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "displayName", array()), "html", null, true);
            echo "\" data-tech-name=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "name", array()), "html", null, true);
            echo "\" />
          </div>
        ";
        }
        // line 93
        echo "        ";
        $this->loadTemplate("PrestaShopBundle:Admin/Module/Includes:action_menu.html.twig", "PrestaShopBundle:Admin/Module/Includes:card_list.html.twig", 93)->display(array_merge($context, array("module" => ($context["module"] ?? $this->getContext($context, "module")))));
        // line 94
        echo "      </div>
      ";
        // line 95
        $this->loadTemplate("PrestaShopBundle:Admin/Module/Includes:modal_read_more.html.twig", "PrestaShopBundle:Admin/Module/Includes:card_list.html.twig", 95)->display(array_merge($context, array("module" => ($context["module"] ?? $this->getContext($context, "module")), "additionalModalSuffix" => ((array_key_exists("additionalModalSuffix", $context)) ? (_twig_default_filter(($context["additionalModalSuffix"] ?? $this->getContext($context, "additionalModalSuffix")), "")) : ("")))));
        // line 96
        echo "      ";
        $this->loadTemplate("PrestaShopBundle:Admin/Module/Includes:modal_confirm.html.twig", "PrestaShopBundle:Admin/Module/Includes:card_list.html.twig", 96)->display(array_merge($context, array("module" => ($context["module"] ?? $this->getContext($context, "module")))));
        // line 97
        echo "    </div>
  </div>
</div>
";
        
        $__internal_04b302de183db7fc991a93a1fb034b2429eba2380ea73fa461a9877c414e0a50->leave($__internal_04b302de183db7fc991a93a1fb034b2429eba2380ea73fa461a9877c414e0a50_prof);

    }

    // line 65
    public function block_addon_version($context, array $blocks = array())
    {
        $__internal_38c20c2af07e10c7335965f5e92bfc33cec2f97e951473a279db6de295df772e = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_38c20c2af07e10c7335965f5e92bfc33cec2f97e951473a279db6de295df772e->enter($__internal_38c20c2af07e10c7335965f5e92bfc33cec2f97e951473a279db6de295df772e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "addon_version"));

        // line 66
        echo "            ";
        if (($this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "productType", array()) == "service")) {
            // line 67
            echo "              ";
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Service by %author%", array("%author%" => (("<b>" . $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "author", array())) . "</b>")), "Admin.Modules.Feature");
            echo "
            ";
        } else {
            // line 69
            echo "              ";
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("v%version% - by %author%", array("%version%" => $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "version", array()), "%author%" => (("<b>" . $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "author", array())) . "</b>")), "Admin.Modules.Feature");
            echo "
            ";
        }
        // line 71
        echo "          ";
        
        $__internal_38c20c2af07e10c7335965f5e92bfc33cec2f97e951473a279db6de295df772e->leave($__internal_38c20c2af07e10c7335965f5e92bfc33cec2f97e951473a279db6de295df772e_prof);

    }

    // line 75
    public function block_addon_description($context, array $blocks = array())
    {
        $__internal_cd1ee9e333da3a82bd61035e46e2589e91db0494b45841a7583abc5fb024aaec = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_cd1ee9e333da3a82bd61035e46e2589e91db0494b45841a7583abc5fb024aaec->enter($__internal_cd1ee9e333da3a82bd61035e46e2589e91db0494b45841a7583abc5fb024aaec_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "addon_description"));

        // line 76
        echo "          ";
        echo $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "description", array());
        echo "
          ";
        // line 77
        if (((twig_length_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "description", array())) > 0) && (twig_length_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "description", array())) < twig_length_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "fullDescription", array()))))) {
            // line 78
            echo "            ...
          ";
        }
        // line 80
        echo "          <span>
            ";
        // line 81
        if (($this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "id", array()) != "0")) {
            // line 82
            echo "              <a class=\"module-read-more-list-btn url\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_module_cart", array("moduleId" => $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "id", array()))), "html", null, true);
            echo "\" data-toggle=\"modal\" data-target=\"#module-modal-read-more-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "name", array()), "html", null, true);
            echo twig_escape_filter($this->env, ((array_key_exists("additionalModalSuffix", $context)) ? (_twig_default_filter(($context["additionalModalSuffix"] ?? $this->getContext($context, "additionalModalSuffix")), "")) : ("")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Read More", array(), "Admin.Modules.Feature"), "html", null, true);
            echo "</a>
            ";
        }
        // line 84
        echo "          </span>
        ";
        
        $__internal_cd1ee9e333da3a82bd61035e46e2589e91db0494b45841a7583abc5fb024aaec->leave($__internal_cd1ee9e333da3a82bd61035e46e2589e91db0494b45841a7583abc5fb024aaec_prof);

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
        return array (  241 => 84,  230 => 82,  228 => 81,  225 => 80,  221 => 78,  219 => 77,  214 => 76,  208 => 75,  201 => 71,  195 => 69,  189 => 67,  186 => 66,  180 => 65,  170 => 97,  167 => 96,  165 => 95,  162 => 94,  159 => 93,  151 => 90,  148 => 89,  146 => 88,  142 => 86,  140 => 75,  135 => 72,  133 => 65,  127 => 61,  121 => 59,  115 => 57,  113 => 56,  108 => 54,  96 => 47,  88 => 42,  84 => 41,  80 => 40,  76 => 39,  72 => 38,  68 => 37,  64 => 36,  60 => 35,  56 => 34,  52 => 33,  48 => 32,  44 => 31,  40 => 30,  36 => 29,  30 => 28,  26 => 26,  24 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{#**
 * 2007-2017 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/OSL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2017 PrestaShop SA
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *#}
{% set isModuleActive = module.database.active|default('0') %}

<div
  class=\"module-item module-item-list col-md-12 {% if origin == 'manage' and isModuleActive == '0' %}module-item-list-isNotActive{% endif %}\"
  data-id=\"{{ module.attributes.id }}\"
  data-name=\"{{ module.attributes.displayName }}\"
  data-scoring=\"{{ module.attributes.avgRate }}\"
  data-logo=\"{{ module.attributes.img }}\"
  data-author=\"{{ module.attributes.author }}\"
  data-version=\"{{ module.attributes.version }}\"
  data-description=\"{{ module.attributes.description }}\"
  data-tech-name=\"{{ module.attributes.name }}\"
  data-child-categories=\"{{ module.attributes.categoryName }}\"
  data-categories=\"{{ module.attributes.categoryParent }}\"
  data-type=\"{{ module.attributes.productType }}\"
  data-price=\"{{ module.attributes.price.raw }}\"
  data-active=\"{{ isModuleActive }}\"
  data-last-access=\"{{ module.database.last_access_date }}\"
>
  <div class=\"container-fluid\">
    <div class=\"module-item-wrapper-list row\">
      <div class=\"module-logo-thumb-list col-sm-12 col-md-12 col-lg-1 text-sm-center\">
        <img src=\"{{ module.attributes.img }}\" class=\"text-md-center\" alt=\"{{ module.attributes.displayName }}\"/>
      </div>
      <div class=\"col-sm-12 col-md-10 col-lg-11\">
        <h3
          class=\"text-ellipsis module-name-list\"
          data-toggle=\"tooltip\"
          data-placement=\"top\"
          title=\"{{ module.attributes.displayName|raw }}\"
        >
          {% if module.attributes.displayName %}
            {{ module.attributes.displayName|raw }}
          {% else %}
            {{ module.attributes.name }}
          {% endif %}
        </h3>
      </div>
      <div class=\"col-sm-12 col-md-2\">
        <span class=\"text-ellipsis xsmall\">
          {% block addon_version %}
            {% if module.attributes.productType == \"service\" %}
              {{ 'Service by %author%'|trans({'%author%' : '<b>' ~ module.attributes.author ~ '</b>'}, 'Admin.Modules.Feature')|raw }}
            {% else %}
              {{ 'v%version% - by %author%'|trans({ '%version%' : module.attributes.version, '%author%' : '<b>' ~ module.attributes.author ~ '</b>' }, 'Admin.Modules.Feature')|raw }}
            {% endif %}
          {% endblock %}
        </span>
      </div>
      <div class=\"col-sm-12 col-md-8 col-lg-6\">
        {% block addon_description %}
          {{ module.attributes.description|raw }}
          {% if module.attributes.description|length > 0 and module.attributes.description|length < module.attributes.fullDescription|length %}
            ...
          {% endif %}
          <span>
            {% if module.attributes.id != \"0\" %}
              <a class=\"module-read-more-list-btn url\" href=\"{{ path('admin_module_cart', {\"moduleId\": module.attributes.id }) }}\" data-toggle=\"modal\" data-target=\"#module-modal-read-more-{{module.attributes.name }}{{ additionalModalSuffix|default('') }}\">{{ 'Read More'|trans({}, 'Admin.Modules.Feature') }}</a>
            {% endif %}
          </span>
        {% endblock %}
      </div>
      <div class=\"col-sm-12 col-md-12 col-lg-3 text-md-right\">
        {% if requireBulkActions is defined and requireBulkActions == true %}
          <div class=\"pull-right module-checkbox-bulk-list\">
            <input type=\"checkbox\" data-name=\"{{ module.attributes.displayName }}\" data-tech-name=\"{{module.attributes.name}}\" />
          </div>
        {% endif %}
        {% include 'PrestaShopBundle:Admin/Module/Includes:action_menu.html.twig' with { 'module': module } %}
      </div>
      {% include 'PrestaShopBundle:Admin/Module/Includes:modal_read_more.html.twig' with { 'module': module, 'additionalModalSuffix': additionalModalSuffix|default('') } %}
      {% include 'PrestaShopBundle:Admin/Module/Includes:modal_confirm.html.twig' with { 'module': module } %}
    </div>
  </div>
</div>
", "PrestaShopBundle:Admin/Module/Includes:card_list.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Module/Includes/card_list.html.twig");
    }
}
