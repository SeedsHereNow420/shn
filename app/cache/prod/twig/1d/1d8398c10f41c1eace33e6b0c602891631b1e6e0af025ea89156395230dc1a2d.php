<?php

/* PrestaShopBundle:Admin\Product:list.html.twig */
class __TwigTemplate_197ddcb3d75faa82a62cc80e1ab10a06f571a0586c706c344383eb6b175c845a extends Twig_Template
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
        echo "<tbody
  ";
        // line 26
        if ((($context["activate_drag_and_drop"] ?? null) && ($context["has_category_filter"] ?? null))) {
            echo "class=\"sortable\"";
        }
        // line 27
        echo "  last_sql=\"";
        echo twig_escape_filter($this->env, ($context["last_sql_query"] ?? null), "html_attr");
        echo "\"
>
  ";
        // line 29
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
        $context['_iterated'] = false;
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
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 30
            echo "        <tr data-uniturl=\"";
            echo twig_escape_filter($this->env, (($this->getAttribute($context["product"], "unit_action_url", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["product"], "unit_action_url", array()), "#")) : ("#")), "html", null, true);
            echo "\" data-product-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "id_product", array()), "html", null, true);
            echo "\">
            <td class=\"checkbox-column\">
              <div class=\"checkbox\">
                <label>
                  <input type=\"checkbox\" name=\"bulk_action_selected_products[]\" value=\"";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "id_product", array()), "html", null, true);
            echo "\" />
                  ";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "id_product", array()), "html", null, true);
            echo "
                </label>
              </div>
            </td>
            <td>
              <a href=\"";
            // line 40
            echo twig_escape_filter($this->env, (($this->getAttribute($context["product"], "url", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["product"], "url", array()), "")) : ("")), "html", null, true);
            echo "#tab-step1\">";
            echo $this->getAttribute($context["product"], "image", array());
            echo "</a>
            </td>
            <td>
              <a href=\"";
            // line 43
            echo twig_escape_filter($this->env, (($this->getAttribute($context["product"], "url", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["product"], "url", array()), "")) : ("")), "html", null, true);
            echo "#tab-step1\">";
            echo twig_escape_filter($this->env, (($this->getAttribute($context["product"], "name", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["product"], "name", array()), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("N/A", array(), "Admin.Global"))) : ($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("N/A", array(), "Admin.Global"))), "html", null, true);
            echo "</a>
            </td>
            <td>
              ";
            // line 46
            echo twig_escape_filter($this->env, (($this->getAttribute($context["product"], "reference", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["product"], "reference", array()), "")) : ("")), "html", null, true);
            echo "
            </td>
            <td>
              ";
            // line 49
            echo twig_escape_filter($this->env, (($this->getAttribute($context["product"], "name_category", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["product"], "name_category", array()), "")) : ("")), "html", null, true);
            echo "
            </td>
            <td>
              <a href=\"";
            // line 52
            echo twig_escape_filter($this->env, (($this->getAttribute($context["product"], "url", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["product"], "url", array()), "")) : ("")), "html", null, true);
            echo "#tab-step2\">";
            echo twig_escape_filter($this->env, (($this->getAttribute($context["product"], "price", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["product"], "price", array()), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("N/A", array(), "Admin.Global"))) : ($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("N/A", array(), "Admin.Global"))), "html", null, true);
            echo "</a>
            </td>

            ";
            // line 55
            if ($this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getConfiguration("PS_STOCK_MANAGEMENT")) {
                // line 56
                echo "            <td class=\"product-sav-quantity\" data-product-quantity-value=\"";
                echo twig_escape_filter($this->env, (($this->getAttribute($context["product"], "sav_quantity", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["product"], "sav_quantity", array()), "")) : ("")), "html", null, true);
                echo "\">
              <a href=\"";
                // line 57
                echo twig_escape_filter($this->env, (($this->getAttribute($context["product"], "url", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["product"], "url", array()), "")) : ("")), "html", null, true);
                echo "#tab-step3\">
                ";
                // line 58
                if (($this->getAttribute($context["product"], "sav_quantity", array(), "any", true, true) && ($this->getAttribute($context["product"], "sav_quantity", array()) > 0))) {
                    // line 59
                    echo "                  ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "sav_quantity", array()), "html", null, true);
                    echo "
                ";
                } else {
                    // line 61
                    echo "                  <span class=\"badge badge-danger\">";
                    echo twig_escape_filter($this->env, (($this->getAttribute($context["product"], "sav_quantity", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["product"], "sav_quantity", array()), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("N/A", array(), "Admin.Global"))) : ($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("N/A", array(), "Admin.Global"))), "html", null, true);
                    echo "</span>
                ";
                }
                // line 63
                echo "              </a>
            </td>
            ";
            } else {
                // line 66
                echo "                <td></td>
            ";
            }
            // line 68
            echo "            <td>
              ";
            // line 69
            if (((($this->getAttribute($context["product"], "active", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["product"], "active", array()), 0)) : (0)) == 0)) {
                // line 70
                echo "                <a href=\"#\" onclick=\"unitProductAction(this, 'activate'); return false;\">
                  <i class=\"material-icons action-disabled\">clear</i>
                </a>
              ";
            } else {
                // line 74
                echo "                <a href=\"#\" onclick=\"unitProductAction(this, 'deactivate'); return false;\">
                  <i class=\"material-icons action-enabled \">check</i>
                </a>
              ";
            }
            // line 78
            echo "            </td>
            ";
            // line 79
            if ($this->getAttribute($context["product"], "position", array(), "any", true, true)) {
                // line 80
                echo "              <td ";
                if (($context["activate_drag_and_drop"] ?? null)) {
                    echo "class=\"placeholder\"";
                }
                echo " style=\"cursor: pointer; cursor: hand;\">
                ";
                // line 81
                if (($context["activate_drag_and_drop"] ?? null)) {
                    // line 82
                    echo "                    <big><big>⇅</big></big>
                ";
                }
                // line 84
                echo "                <span class=\"position\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "position", array()), "html", null, true);
                echo "</span>
                <input type=\"hidden\" name=\"mass_edit_action_sorted_products[]\" value=\"";
                // line 85
                echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "id_product", array()), "html", null, true);
                echo "\" />
                <input type=\"hidden\" name=\"mass_edit_action_sorted_positions[]\" value=\"";
                // line 86
                echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "position", array()), "html", null, true);
                echo "\" />
              </td>
            ";
            }
            // line 89
            echo "            <td>
                <div class=\"btn-group-action\">

                    ";
            // line 92
            $context["buttons_action"] = array(0 => array("href" => (($this->getAttribute(            // line 94
$context["product"], "preview_url", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["product"], "preview_url", array()), "#")) : ("#")), "target" => "_blank", "icon" => "remove_red_eye", "label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Preview", array(), "Admin.Actions")));
            // line 100
            echo "
                    ";
            // line 101
            $context["buttons_action"] = twig_array_merge(($context["buttons_action"] ?? null), array(0 => array("onclick" => "unitProductAction(this, 'duplicate');", "icon" => "content_copy", "label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Duplicate", array(), "Admin.Actions"))));
            // line 108
            echo "
                    ";
            // line 109
            $context["buttons_action"] = twig_array_merge(($context["buttons_action"] ?? null), array(0 => array("onclick" => "unitProductAction(this, 'delete');", "icon" => "delete", "label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Delete", array(), "Admin.Actions"))));
            // line 116
            echo "
                    ";
            // line 117
            $this->loadTemplate("PrestaShopBundle:Admin/Product/Include:form_edit_dropdown.html.twig", "PrestaShopBundle:Admin\\Product:list.html.twig", 117)->display(array_merge($context, array("button_id" => (("product_list_id_" . $this->getAttribute(            // line 118
$context["product"], "id_product", array())) . "_menu"), "default_item" => array("href" => (($this->getAttribute(            // line 120
$context["product"], "url", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["product"], "url", array()), "#")) : ("#")), "icon" => "mode_edit"), "right" => true, "items" =>             // line 124
($context["buttons_action"] ?? null))));
            // line 126
            echo "                </div>
            </td>
        </tr>
    ";
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        if (!$context['_iterated']) {
            // line 130
            echo "        <tr><td colspan=\"11\">
            ";
            // line 131
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("There is no result for this search. Update your filters to view other products.", array(), "Admin.Catalog.Notification"), "html", null, true);
            echo "
        </td></tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 134
        echo "</tbody>
";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin\\Product:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  246 => 134,  237 => 131,  234 => 130,  218 => 126,  216 => 124,  215 => 120,  214 => 118,  213 => 117,  210 => 116,  208 => 109,  205 => 108,  203 => 101,  200 => 100,  198 => 94,  197 => 92,  192 => 89,  186 => 86,  182 => 85,  177 => 84,  173 => 82,  171 => 81,  164 => 80,  162 => 79,  159 => 78,  153 => 74,  147 => 70,  145 => 69,  142 => 68,  138 => 66,  133 => 63,  127 => 61,  121 => 59,  119 => 58,  115 => 57,  110 => 56,  108 => 55,  100 => 52,  94 => 49,  88 => 46,  80 => 43,  72 => 40,  64 => 35,  60 => 34,  50 => 30,  32 => 29,  26 => 27,  22 => 26,  19 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin\\Product:list.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Product/list.html.twig");
    }
}
