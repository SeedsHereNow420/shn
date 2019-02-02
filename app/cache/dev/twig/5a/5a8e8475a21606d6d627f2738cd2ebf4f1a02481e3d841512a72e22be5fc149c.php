<?php

/* PrestaShopBundle:Admin/Module/Includes:card_grid.html.twig */
class __TwigTemplate_a56e1d32942d524c6b12afa05fbe689454a5d1686671381faa198546e86dc6c0 extends Twig_Template
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
        $__internal_c1f5dec50d8e4f99c86f6ed806862bf77a2ae9cabe6cb7ff1ff7798968cf691d = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_c1f5dec50d8e4f99c86f6ed806862bf77a2ae9cabe6cb7ff1ff7798968cf691d->enter($__internal_c1f5dec50d8e4f99c86f6ed806862bf77a2ae9cabe6cb7ff1ff7798968cf691d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "PrestaShopBundle:Admin/Module/Includes:card_grid.html.twig"));

        // line 25
        $context["isModuleActive"] = (($this->getAttribute($this->getAttribute(($context["module"] ?? null), "database", array(), "any", false, true), "active", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["module"] ?? null), "database", array(), "any", false, true), "active", array()), "0")) : ("0"));
        // line 26
        echo "
<div
  class=\"module-item module-item-grid col-md-12 col-lg-6 col-xl-3 ";
        // line 28
        if (((($context["origin"] ?? $this->getContext($context, "origin")) == "manage") && (($context["isModuleActive"] ?? $this->getContext($context, "isModuleActive")) == "0"))) {
            echo "module-item-grid-isNotActive";
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
>
  <div class=\"module-item-wrapper-grid\">
    <div class=\"module-item-heading-grid\">
      <div class=\"module-logo-thumb-grid\">
        <img src=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "img", array()), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "displayName", array()), "html", null, true);
        echo "\"/>
      </div>
      <h3
        class=\"text-ellipsis module-name-grid\"
        data-toggle=\"tooltip\"
        data-placement=\"top\"
        title=\"";
        // line 52
        echo $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "displayName", array());
        echo "\"
      >
      ";
        // line 54
        $context["ats"] = $this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array());
        // line 55
        echo "        ";
        if ($this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "displayName", array())) {
            // line 56
            echo "          ";
            echo $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "displayName", array());
            echo "
        ";
        } else {
            // line 58
            echo "          ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "name", array()), "html", null, true);
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
        $context["badges"] = $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "badges", array());
        // line 90
        echo "          ";
        if (($context["badges"] ?? $this->getContext($context, "badges"))) {
            // line 91
            echo "            ";
            $context["badge"] = twig_first($this->env, ($context["badges"] ?? $this->getContext($context, "badges")));
            // line 92
            echo "            <img src=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["badge"] ?? $this->getContext($context, "badge")), "img", array()), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["badge"] ?? $this->getContext($context, "badge")), "label", array()), "html", null, true);
            echo "\"/>
            ";
            // line 93
            echo twig_escape_filter($this->env, $this->getAttribute(($context["badge"] ?? $this->getContext($context, "badge")), "label", array()), "html", null, true);
            echo "
          ";
        }
        // line 95
        echo "        </div>
      <hr />
      ";
        // line 97
        if (($this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "nbRates", array()) > 0)) {
            // line 98
            echo "        <div class=\"module-stars module-star-ranking-grid-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "starsRate", array()), "html", null, true);
            echo " small\">
          (";
            // line 99
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "nbRates", array()), "html", null, true);
            echo ")
        </div>
      ";
        }
        // line 102
        echo "      <div class=\"pull-right module-price\">
      ";
        // line 103
        if ((($this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "url_active", array()) == "buy") && ($this->getAttribute($this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "price", array()), "raw", array()) != "0.00"))) {
            // line 104
            echo "        ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "price", array()), "displayPrice", array()), "html", null, true);
            echo "
      ";
        } elseif (($this->getAttribute($this->getAttribute(        // line 105
($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "url_active", array()) != "buy")) {
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
        if ((array_key_exists("requireBulkActions", $context) && (($context["requireBulkActions"] ?? $this->getContext($context, "requireBulkActions")) == true))) {
            // line 110
            echo "        <div class=\"pull-right module-checkbox-bulk-grid\">
          <input type=\"checkbox\" data-name=\"";
            // line 111
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "displayName", array()), "html", null, true);
            echo "\" data-tech-name=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "name", array()), "html", null, true);
            echo "\" />
        </div>
      ";
        }
        // line 114
        echo "      ";
        $this->loadTemplate("PrestaShopBundle:Admin/Module/Includes:action_menu.html.twig", "PrestaShopBundle:Admin/Module/Includes:card_grid.html.twig", 114)->display(array_merge($context, array("module" => ($context["module"] ?? $this->getContext($context, "module")), "level" => ($context["level"] ?? $this->getContext($context, "level")))));
        // line 115
        echo "    </div>
    ";
        // line 116
        $this->loadTemplate("PrestaShopBundle:Admin/Module/Includes:modal_read_more.html.twig", "PrestaShopBundle:Admin/Module/Includes:card_grid.html.twig", 116)->display(array_merge($context, array("module" => ($context["module"] ?? $this->getContext($context, "module")), "additionalModalSuffix" => ((array_key_exists("additionalModalSuffix", $context)) ? (_twig_default_filter(($context["additionalModalSuffix"] ?? $this->getContext($context, "additionalModalSuffix")), "")) : ("")), "level" => ($context["level"] ?? $this->getContext($context, "level")))));
        // line 117
        echo "    ";
        $this->loadTemplate("PrestaShopBundle:Admin/Module/Includes:modal_confirm.html.twig", "PrestaShopBundle:Admin/Module/Includes:card_grid.html.twig", 117)->display(array_merge($context, array("module" => ($context["module"] ?? $this->getContext($context, "module")))));
        // line 118
        echo "  </div>
</div>
";
        
        $__internal_c1f5dec50d8e4f99c86f6ed806862bf77a2ae9cabe6cb7ff1ff7798968cf691d->leave($__internal_c1f5dec50d8e4f99c86f6ed806862bf77a2ae9cabe6cb7ff1ff7798968cf691d_prof);

    }

    // line 62
    public function block_addon_version($context, array $blocks = array())
    {
        $__internal_9a0fe95288725b92d631795f407b970d75440a2fa6513a30ffe4085c333821b4 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_9a0fe95288725b92d631795f407b970d75440a2fa6513a30ffe4085c333821b4->enter($__internal_9a0fe95288725b92d631795f407b970d75440a2fa6513a30ffe4085c333821b4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "addon_version"));

        // line 63
        echo "          ";
        if (($this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "productType", array()) == "service")) {
            // line 64
            echo "            ";
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Service by %author%", array("%author%" => (("<b>" . $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "author", array())) . "</b>")), "Admin.Modules.Feature");
            echo "
          ";
        } else {
            // line 66
            echo "            ";
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("v%version% - by %author%", array("%version%" => $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "version", array()), "%author%" => (("<b>" . $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "author", array())) . "</b>")), "Admin.Modules.Feature");
            echo "
          ";
        }
        // line 68
        echo "        ";
        
        $__internal_9a0fe95288725b92d631795f407b970d75440a2fa6513a30ffe4085c333821b4->leave($__internal_9a0fe95288725b92d631795f407b970d75440a2fa6513a30ffe4085c333821b4_prof);

    }

    // line 72
    public function block_addon_description($context, array $blocks = array())
    {
        $__internal_2e2c219b3ee9f5e6327d6f7cb38b29628e2f655a9c59694aef079b5c7695be91 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_2e2c219b3ee9f5e6327d6f7cb38b29628e2f655a9c59694aef079b5c7695be91->enter($__internal_2e2c219b3ee9f5e6327d6f7cb38b29628e2f655a9c59694aef079b5c7695be91_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "addon_description"));

        // line 73
        echo "        <div class=\"module-quick-description-text\">
          ";
        // line 74
        echo $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "description", array());
        echo "
          ";
        // line 75
        if (((twig_length_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "description", array())) > 0) && (twig_length_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "description", array())) < twig_length_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "fullDescription", array()))))) {
            // line 76
            echo "            ...
          ";
        }
        // line 78
        echo "        </div>
        <div class=\"module-read-more-grid\">
          ";
        // line 80
        if (($this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "id", array()) != "0")) {
            // line 81
            echo "            <a class=\"module-read-more-grid-btn url\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_module_cart", array("moduleId" => $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "id", array()))), "html", null, true);
            echo "\" data-toggle=\"modal\" data-target=\"#module-modal-read-more-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? $this->getContext($context, "module")), "attributes", array()), "name", array()), "html", null, true);
            echo twig_escape_filter($this->env, ((array_key_exists("additionalModalSuffix", $context)) ? (_twig_default_filter(($context["additionalModalSuffix"] ?? $this->getContext($context, "additionalModalSuffix")), "")) : ("")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Read More", array(), "Admin.Modules.Feature"), "html", null, true);
            echo "</a>
          ";
        }
        // line 83
        echo "        </div>
      ";
        
        $__internal_2e2c219b3ee9f5e6327d6f7cb38b29628e2f655a9c59694aef079b5c7695be91->leave($__internal_2e2c219b3ee9f5e6327d6f7cb38b29628e2f655a9c59694aef079b5c7695be91_prof);

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
        return array (  299 => 83,  288 => 81,  286 => 80,  282 => 78,  278 => 76,  276 => 75,  272 => 74,  269 => 73,  263 => 72,  256 => 68,  250 => 66,  244 => 64,  241 => 63,  235 => 62,  226 => 118,  223 => 117,  221 => 116,  218 => 115,  215 => 114,  207 => 111,  204 => 110,  202 => 109,  199 => 108,  193 => 106,  191 => 105,  186 => 104,  184 => 103,  181 => 102,  175 => 99,  170 => 98,  168 => 97,  164 => 95,  159 => 93,  152 => 92,  149 => 91,  146 => 90,  144 => 89,  138 => 85,  136 => 72,  131 => 69,  129 => 62,  125 => 60,  119 => 58,  113 => 56,  110 => 55,  108 => 54,  103 => 52,  92 => 46,  84 => 41,  80 => 40,  76 => 39,  72 => 38,  68 => 37,  64 => 36,  60 => 35,  56 => 34,  52 => 33,  48 => 32,  44 => 31,  40 => 30,  36 => 29,  30 => 28,  26 => 26,  24 => 25,);
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
  class=\"module-item module-item-grid col-md-12 col-lg-6 col-xl-3 {% if origin == 'manage' and isModuleActive == '0' %}module-item-grid-isNotActive{% endif %}\"
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
>
  <div class=\"module-item-wrapper-grid\">
    <div class=\"module-item-heading-grid\">
      <div class=\"module-logo-thumb-grid\">
        <img src=\"{{ module.attributes.img }}\" alt=\"{{ module.attributes.displayName }}\"/>
      </div>
      <h3
        class=\"text-ellipsis module-name-grid\"
        data-toggle=\"tooltip\"
        data-placement=\"top\"
        title=\"{{ module.attributes.displayName|raw }}\"
      >
      {% set ats = module.attributes %}
        {% if module.attributes.displayName %}
          {{ module.attributes.displayName|raw }}
        {% else %}
          {{ module.attributes.name }}
        {% endif %}
      </h3>
      <div class=\"text-ellipsis xsmall module-version-author-grid\">
        {% block addon_version %}
          {% if module.attributes.productType == \"service\" %}
            {{ 'Service by %author%'|trans({'%author%' : '<b>' ~ module.attributes.author ~ '</b>'}, 'Admin.Modules.Feature')|raw }}
          {% else %}
            {{ 'v%version% - by %author%'|trans({ '%version%' : module.attributes.version, '%author%' : '<b>' ~ module.attributes.author ~ '</b>' }, 'Admin.Modules.Feature')|raw }}
          {% endif %}
        {% endblock %}
      </div>
    </div>
    <div class=\"module-quick-description-grid small no-padding m-b-0\">
      {% block addon_description %}
        <div class=\"module-quick-description-text\">
          {{ module.attributes.description|raw }}
          {% if module.attributes.description|length > 0 and module.attributes.description|length < module.attributes.fullDescription|length %}
            ...
          {% endif %}
        </div>
        <div class=\"module-read-more-grid\">
          {% if module.attributes.id != \"0\" %}
            <a class=\"module-read-more-grid-btn url\" href=\"{{ path('admin_module_cart', {\"moduleId\": module.attributes.id }) }}\" data-toggle=\"modal\" data-target=\"#module-modal-read-more-{{module.attributes.name }}{{ additionalModalSuffix|default('') }}\">{{ 'Read More'|trans({}, 'Admin.Modules.Feature') }}</a>
          {% endif %}
        </div>
      {% endblock %}
    </div>

    <div class=\"module-container module-quick-action-grid clearfix\">
        <div class=\"badges-container\">
          {% set badges = module.attributes.badges %}
          {% if badges %}
            {% set badge = badges|first %}
            <img src=\"{{badge.img}}\" alt=\"{{badge.label}}\"/>
            {{badge.label}}
          {% endif %}
        </div>
      <hr />
      {% if module.attributes.nbRates > 0 %}
        <div class=\"module-stars module-star-ranking-grid-{{ module.attributes.starsRate}} small\">
          ({{ module.attributes.nbRates }})
        </div>
      {% endif %}
      <div class=\"pull-right module-price\">
      {% if module.attributes.url_active == 'buy' and module.attributes.price.raw != '0.00' %}
        {{ module.attributes.price.displayPrice }}
      {% elseif module.attributes.url_active != 'buy' %}
        {{ 'Free'|trans({}, 'Admin.Modules.Feature') }}
      {% endif %}
      </div>
      {% if requireBulkActions is defined and requireBulkActions == true %}
        <div class=\"pull-right module-checkbox-bulk-grid\">
          <input type=\"checkbox\" data-name=\"{{ module.attributes.displayName }}\" data-tech-name=\"{{module.attributes.name}}\" />
        </div>
      {% endif %}
      {% include 'PrestaShopBundle:Admin/Module/Includes:action_menu.html.twig' with { 'module': module, 'level' : level } %}
    </div>
    {% include 'PrestaShopBundle:Admin/Module/Includes:modal_read_more.html.twig' with { 'module': module, 'additionalModalSuffix': additionalModalSuffix|default(''), 'level' : level } %}
    {% include 'PrestaShopBundle:Admin/Module/Includes:modal_confirm.html.twig' with { 'module': module } %}
  </div>
</div>
", "PrestaShopBundle:Admin/Module/Includes:card_grid.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Module/Includes/card_grid.html.twig");
    }
}
