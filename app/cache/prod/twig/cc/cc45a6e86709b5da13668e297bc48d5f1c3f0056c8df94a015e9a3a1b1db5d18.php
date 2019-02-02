<?php

/* PrestaShopBundle:Admin/Product/Include:form_combinations.html.twig */
class __TwigTemplate_000b216353c712ffbf4724c43abba0ef7033309458554f19ee395fde4b520ec3 extends Twig_Template
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
        echo "<div class=\"row\" id=\"combinations\">
  <div class=\"col-md-9\">
    <h2>
      ";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Manage your product combinations", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "
      <span
        class=\"help-box\"
        data-toggle=\"popover\"
        data-content=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Combinations are the different variations of a product, with attributes like its size, weight or color taking different values. To create a combination, you need to create your product attributes first. Go to Catalog > Attributes & Features for this!", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\"
      ></span>
    </h2>
    <div id=\"attributes-generator\">
      <div class=\"alert alert-info\" role=\"alert\">
        <i class=\"material-icons\">help</i>
        <p class=\"alert-text\">
          ";
        // line 39
        echo twig_replace_filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("To add combinations, you first need to create proper attributes and values in [1]Attributes & Features[/1]. <br> When done, you may enter the wanted attributes (like \"size\" or \"color\") and their respective values (\"XS\", \"red\", \"all\", etc.) in the field below; or simply select them from the right column. Then click on \"Generate\": it will automatically create all the combinations for you!", array(), "Admin.Catalog.Help"), array("[1]" => (("<a class=\"alert-link\" href=" . $this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getAdminLink("AdminAttributesGroups")) . " target=\"_blank\">"), "[/1]" => "</a>"));
        echo "
        </p>
      </div>
      <div class=\"row\">
        <div class=\"col-xl-10 col-lg-9\">
          <fieldset class=\"form-group\">
            ";
        // line 45
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "attributes", array()), 'errors');
        echo "
            ";
        // line 46
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "attributes", array()), 'widget');
        echo "
          </fieldset>
        </div>
        <div class=\"col-xl-2 col-lg-3\">
          <button class=\"btn btn-primary-outline\" id=\"create-combinations\">
            Generate
          </button>
        </div>
      </div>
    </div>

    <div id=\"combinations-bulk-form\">
      <div class=\"row\">
        <div class=\"col-md-12\">
          <p
            class=\"form-control bulk-action\"
            data-toggle=\"collapse\"
            href=\"#bulk-combinations-container\"
            aria-expanded=\"false\"
            aria-controls=\"bulk-combinations-container\"
          >
            ";
        // line 68
        echo "            <strong>";
        echo twig_replace_filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Bulk actions ([1]/[2] combination(s) selected)", array(), "Admin.Catalog.Feature"), array("[1]" => "<span class=\"js-bulk-combinations\">0</span>", "[2]" => (("<span id=\"js-bulk-combinations-total\">" . ($context["combinations_count"] ?? null)) . "</span>")));
        echo "</strong>
            <i class=\"material-icons pull-right\">keyboard_arrow_down</i>
          </p>
        </div>
        <div class=\"col-md-12 collapse js-collapse\" id=\"bulk-combinations-container\">
          ";
        // line 73
        echo twig_include($this->env, $context, "PrestaShopBundle:Admin/Product:form_combinations_bulk.html.twig", array("form" => ($context["form_combination_bulk"] ?? null)));
        echo "
        </div>
      </div>
    </div>

    <div class=\"combinations-list\">
      <table class=\"table table-striped table-no-bordered\">
        <thead id=\"combinations_thead\" ";
        // line 80
        if ( !($context["has_combinations"] ?? null)) {
            echo "style=\"display: none;\"";
        }
        echo ">
          <tr class=\"uppercase\">
            <th>
              <span>";
        // line 83
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Select", array(), "Admin.Actions"), "html", null, true);
        echo "</span>
              <input type=\"checkbox\" id=\"toggle-all-combinations\" >
            </th>
            <th></th>
            <th>";
        // line 87
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Combinations", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</th>
            <th>";
        // line 88
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Impact on price", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</th>
            <th>";
        // line 89
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Final price", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</th>
            ";
        // line 90
        if ($this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getConfiguration("PS_STOCK_MANAGEMENT")) {
            // line 91
            echo "                <th>";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Quantity", array(), "Admin.Catalog.Feature"), "html", null, true);
            echo "</th>
            ";
        }
        // line 93
        echo "            <th colspan=\"3\" class=\"text-xs-right\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Default combination", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</th>
          </tr>
        </thead>
        <tbody class=\"js-combinations-list panel-group accordion\" id=\"accordion_combinations\" data-action-delete-all=\"";
        // line 96
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_delete_all_attributes", array("idProduct" => 1));
        echo "\" data-weight-unit=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getConfiguration("PS_WEIGHT_UNIT"), "html", null, true);
        echo "\" data-action-refresh-images=\"";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_get_form_images_combination", array("idProduct" => 1));
        echo "\"  data-id-product= ";
        echo twig_escape_filter($this->env, ($context["id_product"] ?? null), "html", null, true);
        echo " data-ids-product-attribute=\"";
        echo twig_escape_filter($this->env, ($context["ids_product_attribute"] ?? null), "html", null, true);
        echo "\" data-combinations-url=\"";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_combination_generate_form", array("combinationIds" => 1));
        echo "\">
          ";
        // line 97
        if (($context["has_combinations"] ?? null)) {
            // line 98
            echo "            <tr class=\"combination loading timeline-wrapper\" id=\"loading-attribute\">
              <td class=\"timeline-item\" width=\"1%\">
              </td>
              <td class=\"timeline-item img\">
                <div class=\"animated-background\"></div>
              </td>
              <td>
                <div class=\"animated-background\"></div>
              </td>
              <td class=\"attribute-price\">
                <div class=\"animated-background\"></div>
              </td>
              <td class=\"attribute-finalprice\">
                <div class=\"animated-background\"></div>
              </td>
              ";
            // line 113
            if ($this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getConfiguration("PS_STOCK_MANAGEMENT")) {
                // line 114
                echo "                <td class=\"attribute-quantity\">
                  <div class=\"animated-background\"></div>
                </td>
              ";
            }
            // line 118
            echo "              <td colspan=\"6\"></td>
            </tr>
          ";
        }
        // line 121
        echo "        </tbody>
      </table>
    </div>
  </div>

  <div id=\"attributes-list\" class=\"col-md-3\">
    ";
        // line 127
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["attribute_groups"] ?? null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["attribute_group"]) {
            // line 128
            echo "      <div class=\"attribute-group\">
        <a
          class=\"attribute-group-name ";
            // line 130
            if (($this->getAttribute($context["loop"], "index", array()) <= 3)) {
                echo " collapsed ";
            }
            echo "\"
          data-toggle=\"collapse\"
          href=\"#attribute-group-";
            // line 132
            echo twig_escape_filter($this->env, $this->getAttribute($context["attribute_group"], "id", array()), "html", null, true);
            echo "\"
          aria-expanded=\"false\"
        >
          ";
            // line 135
            echo twig_escape_filter($this->env, $this->getAttribute($context["attribute_group"], "name", array()), "html", null, true);
            echo "
        </a>
        <div class=\"collapse ";
            // line 137
            if (($this->getAttribute($context["loop"], "index", array()) <= 3)) {
                echo " in ";
            }
            echo " attributes \" id=\"attribute-group-";
            echo twig_escape_filter($this->env, $this->getAttribute($context["attribute_group"], "id", array()), "html", null, true);
            echo "\">
          <div class=\"attributes-overflow ";
            // line 138
            if ((twig_length_filter($this->env, $this->getAttribute($context["attribute_group"], "attributes", array())) > 7)) {
                echo " two-columns ";
            }
            echo "\">
            ";
            // line 139
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["attribute_group"], "attributes", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["attribute"]) {
                // line 140
                echo "              <div class=\"attribute\">
                <input
                  class=\"js-attribute-checkbox\"
                  id=\"attribute-";
                // line 143
                echo twig_escape_filter($this->env, $this->getAttribute($context["attribute"], "id", array()), "html", null, true);
                echo "\"
                  data-label=\"";
                // line 144
                echo twig_escape_filter($this->env, $this->getAttribute($context["attribute_group"], "name", array()), "html", null, true);
                echo " : ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["attribute"], "name", array()), "html", null, true);
                echo "\"
                  data-value=\"";
                // line 145
                echo twig_escape_filter($this->env, $this->getAttribute($context["attribute"], "id", array()), "html", null, true);
                echo "\"
                  data-group-id=\"";
                // line 146
                echo twig_escape_filter($this->env, $this->getAttribute($context["attribute_group"], "id", array()), "html", null, true);
                echo "\"
                  type=\"checkbox\"
                >
                <label class=\"attribute-label\" for=\"attribute-";
                // line 149
                echo twig_escape_filter($this->env, $this->getAttribute($context["attribute"], "id", array()), "html", null, true);
                echo "\">
                  <span
                    class=\"pretty-checkbox ";
                // line 151
                if ((twig_test_empty($this->getAttribute($context["attribute"], "color", array())) && twig_test_empty($this->getAttribute($context["attribute"], "texture", array())))) {
                    echo " not-color ";
                }
                echo "\"
                    ";
                // line 152
                if ( !twig_test_empty($this->getAttribute($context["attribute"], "color", array()))) {
                    echo " style=\"background-color: ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["attribute"], "color", array()), "html", null, true);
                    echo "\" ";
                }
                // line 153
                echo "                    ";
                if ( !twig_test_empty($this->getAttribute($context["attribute"], "texture", array()))) {
                    echo " style=\"content: url(";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["attribute"], "texture", array()), "html", null, true);
                    echo ")\" ";
                }
                // line 154
                echo "                  >
                  </span>
                  ";
                // line 156
                echo twig_escape_filter($this->env, $this->getAttribute($context["attribute"], "name", array()), "html", null, true);
                echo "
                </label>
              </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attribute'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 160
            echo "          </div>
        </div>
      </div>
    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attribute_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 164
        echo "  </div>
</div>

<div class=\"form-group\">
  <div class=\"row\">

    <div class=\"col-md-12\">
      <h2>";
        // line 171
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Availability preferences", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</h2>
    </div>
    ";
        // line 173
        if ($this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getConfiguration("PS_STOCK_MANAGEMENT")) {
            // line 174
            echo "      <div class=\"col-md-12\">
        <label class=\"form-control-label\">";
            // line 175
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Behavior when out of stock", array(), "Admin.Catalog.Feature"), "html", null, true);
            echo "</label>
        ";
            // line 176
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "out_of_stock", array()), 'errors');
            echo "
        ";
            // line 177
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "out_of_stock", array()), 'widget');
            echo "
      </div>

      <div class=\"col-md-4\">
        <label class=\"form-control-label\">";
            // line 181
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "available_now", array()), "vars", array()), "label", array()), "html", null, true);
            echo "</label>
        ";
            // line 182
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "available_now", array()), 'errors');
            echo "
        ";
            // line 183
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "available_now", array()), 'widget');
            echo "
      </div>

      <div class=\"col-md-4 \">
        <label class=\"form-control-label\">";
            // line 187
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "available_later", array()), "vars", array()), "label", array()), "html", null, true);
            echo "</label>
        ";
            // line 188
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "available_later", array()), 'errors');
            echo "
        ";
            // line 189
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "available_later", array()), 'widget');
            echo "
      </div>
    ";
        } else {
            // line 192
            echo "      <div class=\"col-md-12\">
        <h3>";
            // line 193
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Stock management is disabled", array(), "Admin.Catalog.Feature"), "html", null, true);
            echo "</h3>
      </div>
    ";
        }
        // line 196
        echo "
    ";
        // line 197
        if ( !($context["has_combinations"] ?? null)) {
            // line 198
            echo "    <div class=\"col-md-4 \">
      <label class=\"form-control-label\">";
            // line 199
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "available_date", array()), "vars", array()), "label", array()), "html", null, true);
            echo "</label>
      ";
            // line 200
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "available_date", array()), 'errors');
            echo "
      ";
            // line 201
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "available_date", array()), 'widget');
            echo "
    </div>
    ";
        }
        // line 204
        echo "
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Product/Include:form_combinations.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  424 => 204,  418 => 201,  414 => 200,  410 => 199,  407 => 198,  405 => 197,  402 => 196,  396 => 193,  393 => 192,  387 => 189,  383 => 188,  379 => 187,  372 => 183,  368 => 182,  364 => 181,  357 => 177,  353 => 176,  349 => 175,  346 => 174,  344 => 173,  339 => 171,  330 => 164,  313 => 160,  303 => 156,  299 => 154,  292 => 153,  286 => 152,  280 => 151,  275 => 149,  269 => 146,  265 => 145,  259 => 144,  255 => 143,  250 => 140,  246 => 139,  240 => 138,  232 => 137,  227 => 135,  221 => 132,  214 => 130,  210 => 128,  193 => 127,  185 => 121,  180 => 118,  174 => 114,  172 => 113,  155 => 98,  153 => 97,  139 => 96,  132 => 93,  126 => 91,  124 => 90,  120 => 89,  116 => 88,  112 => 87,  105 => 83,  97 => 80,  87 => 73,  78 => 68,  54 => 46,  50 => 45,  41 => 39,  31 => 32,  24 => 28,  19 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin/Product/Include:form_combinations.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Product/Include/form_combinations.html.twig");
    }
}
