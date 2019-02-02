<?php

/* PrestaShopBundle:Admin\Product:catalog.html.twig */
class __TwigTemplate_cd169656af0d5e8b09596335d851f2e67eb5936f11f6ad131a97b702b70c1c5f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 26
        $this->parent = $this->loadTemplate("PrestaShopBundle:Admin:layout.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 26);
        $this->blocks = array(
            'javascripts' => array($this, 'block_javascripts'),
            'choice_tree_widget' => array($this, 'block_choice_tree_widget'),
            'choice_tree_item_widget' => array($this, 'block_choice_tree_item_widget'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "PrestaShopBundle:Admin:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 25
        $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->setTheme(($context["categories"] ?? null), array(0 => $this));
        // line 26
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 28
    public function block_javascripts($context, array $blocks = array())
    {
        // line 29
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
  <script src=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/product/catalog.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/pagination.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/category-tree.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("../js/jquery/ui/jquery.ui.sortable.min.js"), "html", null, true);
        echo "\"></script>
";
    }

    // line 36
    public function block_choice_tree_widget($context, array $blocks = array())
    {
        // line 37
        echo "<div ";
        $this->displayBlock("widget_container_attributes", $context, $blocks);
        echo ">
        <ul class=\"category-tree\">";
        // line 39
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["choices"] ?? null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 40
            echo "            ";
            $this->displayBlock("choice_tree_item_widget", $context, $blocks);
            echo "
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "</ul>
    </div>";
    }

    // line 46
    public function block_choice_tree_item_widget($context, array $blocks = array())
    {
        // line 47
        echo "<li>
        ";
        // line 48
        $context["checked"] = ((($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", array(), "any", false, true), "submitted_values", array(), "any", true, true) && $this->getAttribute(($context["submitted_values"] ?? null), $this->getAttribute(($context["child"] ?? null), "id_category", array()), array(), "array", true, true))) ? ("checked=\"checked\"") : (""));
        // line 49
        echo "
         <div class=\"radio\">
             <label class=\"category-label\" for=\"form[";
        // line 51
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", array()), "id", array()), "html", null, true);
        echo "][tree]\">";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["child"] ?? null), "name", array()), "html", null, true);
        echo "
                 <input
                   type=\"radio\"
                   name=\"form[";
        // line 54
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", array()), "id", array()), "html", null, true);
        echo "][tree]\"
                   value=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->getAttribute(($context["child"] ?? null), "id_category", array()), "html", null, true);
        echo "\" ";
        echo twig_escape_filter($this->env, ($context["checked"] ?? null), "html", null, true);
        echo "
                   class=\"category pull-right\"
                 >
             </label>
         </div>

        ";
        // line 61
        if ($this->getAttribute(($context["child"] ?? null), "children", array(), "any", true, true)) {
            // line 62
            echo "            <ul>
                ";
            // line 63
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["child"] ?? null), "children", array()));
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
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 64
                echo "                    ";
                $context["child"] = $context["item"];
                // line 65
                echo "                    ";
                $this->displayBlock("choice_tree_item_widget", $context, $blocks);
                echo "
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 67
            echo "</ul>
        ";
        }
        // line 69
        echo "    </li>";
    }

    // line 72
    public function block_content($context, array $blocks = array())
    {
        // line 73
        echo "
  <div class=\"products-catalog\">

    ";
        // line 76
        echo $this->env->getExtension('PrestaShopBundle\Twig\HookExtension')->renderHook("legacy_block_kpi", array("kpi_controller" => "AdminProductsController"));
        echo "

    <div class=\"content container-fluid\">

      ";
        // line 80
        if (twig_length_filter($this->env, ($context["permission_error"] ?? null))) {
            // line 81
            echo "      <div class=\"row\">
        <div class=\"col-md-12\">
          <div class=\"alert alert-danger\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
            <i class=\"material-icons\">error_outline</i>
            <p>
              ";
            // line 87
            echo twig_escape_filter($this->env, ($context["permission_error"] ?? null), "html", null, true);
            echo "
            </p>
          </div>
        </div>
      </div>
      ";
        }
        // line 93
        echo "
      <div class=\"row\">
        <div class=\"col-md-12\">
          <div class=\"pull-right\">
            <a id=\"desc-product-export\" class=\"list-toolbar-btn\" href=\"";
        // line 97
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_export_action");
        echo "\">
              ";
        // line 98
        echo twig_escape_filter($this->env, $this->getAttribute(($context["ps"] ?? null), "tooltip", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Export", array(), "Admin.Actions"), 1 => "cloud_upload"), "method"), "html", null, true);
        echo "
            </a>
            <a id=\"desc-product-import\" class=\"list-toolbar-btn\" href=\"";
        // line 100
        echo twig_escape_filter($this->env, ($context["import_link"] ?? null), "html", null, true);
        echo "\">
              ";
        // line 101
        echo twig_escape_filter($this->env, $this->getAttribute(($context["ps"] ?? null), "tooltip", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Import", array(), "Admin.Actions"), 1 => "cloud_download"), "method"), "html", null, true);
        echo "
            </a>
            <a id=\"desc-product-show-sql\" class=\"list-toolbar-btn\" href=\"javascript:void(0);\" onclick=\"showLastSqlQuery();\">
              ";
        // line 104
        echo twig_escape_filter($this->env, $this->getAttribute(($context["ps"] ?? null), "tooltip", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Show SQL query", array(), "Admin.Actions"), 1 => "code"), "method"), "html", null, true);
        echo "
            </a>
            <a id=\"desc-product-sql-manager\" class=\"list-toolbar-btn\" href=\"javascript:void(0);\" onclick=\"sendLastSqlQuery(createSqlQueryName());\">
              ";
        // line 107
        echo twig_escape_filter($this->env, $this->getAttribute(($context["ps"] ?? null), "tooltip", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Export to SQL Manager", array(), "Admin.Actions"), 1 => "storage"), "method"), "html", null, true);
        echo "
            </a>
          </div>
        </div>
      </div>

      <div class=\"row\">
        <div class=\"col-md-1\">
          <div class=\"checkbox\">
            <label>
              <input
                type=\"checkbox\"
                id=\"bulk_action_select_all\"
                onclick=\"\$('#product_catalog_list').find('table td.checkbox-column input:checkbox').prop('checked', \$(this).prop('checked')); updateBulkMenu();\"
              />
              ";
        // line 122
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Select all", array(), "Admin.Actions"), "html", null, true);
        echo "
            </label>
          </div>
        </div>

        <div
          class=\"col-md-2\"
          bulkurl=\"";
        // line 129
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_bulk_action", array("action" => "activate_all"));
        echo "\"
          massediturl=\"";
        // line 130
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_mass_edit_action", array("action" => "sort"));
        echo "\"
          redirecturl=\"";
        // line 131
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_catalog", array("limit" => ($context["limit"] ?? null), "offset" => ($context["offset"] ?? null), "orderBy" => ($context["orderBy"] ?? null), "sortOrder" => ($context["sortOrder"] ?? null))), "html", null, true);
        echo "\"
          redirecturlnextpage=\"";
        // line 132
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_catalog", array("limit" => ($context["limit"] ?? null), "offset" => (($context["offset"] ?? null) + ($context["limit"] ?? null)), "orderBy" => ($context["orderBy"] ?? null), "sortOrder" => ($context["sortOrder"] ?? null))), "html", null, true);
        echo "\"
        >
          ";
        // line 134
        $context["buttons_action"] = array(0 => array("onclick" => "bulkProductAction(this, 'activate_all');", "icon" => "radio_button_checked", "label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Activate selection", array(), "Admin.Actions")), 1 => array("onclick" => "bulkProductAction(this, 'deactivate_all');", "icon" => "radio_button_unchecked", "label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Deactivate selection", array(), "Admin.Actions")));
        // line 146
        echo "
          ";
        // line 147
        $context["buttons_action"] = twig_array_merge(($context["buttons_action"] ?? null), array(0 => array("divider" => true), 1 => array("onclick" => "bulkProductAction(this, 'duplicate_all');", "icon" => "content_copy", "label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Duplicate selection", array(), "Admin.Actions"))));
        // line 157
        echo "

          ";
        // line 159
        $context["buttons_action"] = twig_array_merge(($context["buttons_action"] ?? null), array(0 => array("divider" => true), 1 => array("onclick" => "bulkProductAction(this, 'delete_all');", "icon" => "delete", "label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Delete selection", array(), "Admin.Actions"))));
        // line 169
        echo "
          ";
        // line 170
        $this->loadTemplate("PrestaShopBundle:Admin/Helpers:dropdown_menu.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 170)->display(array_merge($context, array("div_style" => "btn-group dropup", "button_id" => "product_bulk_menu", "disabled" => true, "menu_label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Bulk actions", array(), "Admin.Global"), "buttonType" => "tertiary-outline", "menu_icon" => "icon-caret-up", "items" =>         // line 177
($context["buttons_action"] ?? null))));
        // line 179
        echo "        </div>
        <div id=\"product_catalog_category_tree_filter\" class=\"pull-right col-md-3\">
          <button
            class=\"btn btn-tertiary-outline\"
            data-toggle=\"collapse\"
            data-target=\"#tree-categories\"
          >
          ";
        // line 186
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Filter by categories", array(), "Admin.Actions"), "html", null, true);
        echo "
          <i class=\"material-icons\">expand_more</i>
          </button>
          <div id=\"tree-categories\" class=\"collapse p-t-1\">
            <a
              class=\"categories-tree-actions\"
              href=\"#\"
              name=\"product_catalog_category_tree_filter_expand\"
              onclick=\"productCategoryFilterExpand(\$('div#product_catalog_category_tree_filter'), this);\"
              id=\"product_catalog_category_tree_filter_expand\"
            >
              <i class=\"material-icons\">expand_more</i>
              ";
        // line 198
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Expand", array(), "Admin.Actions"), "html", null, true);
        echo "
            </a>
            <a
            class=\"categories-tree-actions\"
              href=\"#\"
              name=\"product_catalog_category_tree_filter_collapse\"
              onclick=\"productCategoryFilterCollapse(\$('div#product_catalog_category_tree_filter'), this);\"
              id=\"product_catalog_category_tree_filter_collapse\"
            >
              <i class=\"material-icons\">expand_less</i>
              ";
        // line 208
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Collapse", array(), "Admin.Actions"), "html", null, true);
        echo "
            </a>
            <a
              class=\"categories-tree-actions\"
              href=\"#\"
              name=\"product_catalog_category_tree_filter_reset\"
              onclick=\"productCategoryFilterReset(\$('div#product_catalog_category_tree_filter'));\"
              id=\"product_catalog_category_tree_filter_reset\"
            >
              <i class=\"material-icons\">radio_button_unchecked</i>
              ";
        // line 218
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Unselect", array(), "Admin.Actions"), "html", null, true);
        echo "
            </a>
            <hr>
            ";
        // line 221
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["categories"] ?? null), 'widget');
        echo "
          </div>
        </div>
      </div>

      <form
        name=\"product_catalog_list\"
        id=\"product_catalog_list\"
        method=\"post\"
        action=\"";
        // line 230
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_catalog", array("limit" => ($context["limit"] ?? null), "orderBy" => ($context["orderBy"] ?? null), "sortOrder" => ($context["sortOrder"] ?? null))), "html", null, true);
        echo "\"
        orderingurl=\"";
        // line 231
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_catalog", array("limit" => ($context["limit"] ?? null), "orderBy" => "name", "sortOrder" => "asc")), "html", null, true);
        echo "\"
        newproducturl=\"";
        // line 232
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_new");
        echo "\"
      >
        <div class=\"row\">
          <div class=\"col-md-12\">
            <input type=\"hidden\" name=\"filter_category\" value=\"";
        // line 236
        echo twig_escape_filter($this->env, ((array_key_exists("filter_category", $context)) ? (_twig_default_filter(($context["filter_category"] ?? null), "")) : ("")), "html", null, true);
        echo "\" />
          </div>
        </div>

        <div class=\"row\">
          <div class=\"col-md-12\">
            <table
              class=\"table table-condensed table-striped product m-t-1\"
              redirecturl=\"";
        // line 244
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_catalog", array("limit" =>         // line 245
($context["limit"] ?? null), "offset" =>         // line 246
($context["offset"] ?? null), "orderBy" =>         // line 247
($context["orderBy"] ?? null), "sortOrder" =>         // line 248
($context["sortOrder"] ?? null))), "html", null, true);
        // line 249
        echo "\"
            >
              <thead>
                <tr class=\"column-headers\">
                  <th style=\"width: 8%\">
                    ";
        // line 254
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("ID", array(), "Admin.Global"), "html", null, true);
        echo "
                    ";
        // line 255
        $this->loadTemplate("PrestaShopBundle:Admin/Product/Include:catalog_order_carrets.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 255)->display(array_merge($context, array("column" => "id_product")));
        // line 258
        echo "                  </th>
                  <th>
                    ";
        // line 260
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Image", array(), "Admin.Global"), "html", null, true);
        echo "
                  </th>
                  <th>
                    ";
        // line 263
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Name", array(), "Admin.Global"), "html", null, true);
        echo "
                    ";
        // line 264
        $this->loadTemplate("PrestaShopBundle:Admin/Product/Include:catalog_order_carrets.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 264)->display(array_merge($context, array("column" => "name")));
        // line 267
        echo "                  </th>
                  <th style=\"width: 9%\">
                    ";
        // line 269
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Reference", array(), "Admin.Global"), "html", null, true);
        echo "
                    ";
        // line 270
        $this->loadTemplate("PrestaShopBundle:Admin/Product/Include:catalog_order_carrets.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 270)->display(array_merge($context, array("column" => "reference")));
        // line 273
        echo "                  </th>
                  <th>
                    ";
        // line 275
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Category", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "
                    ";
        // line 276
        $this->loadTemplate("PrestaShopBundle:Admin/Product/Include:catalog_order_carrets.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 276)->display(array_merge($context, array("column" => "name_category")));
        // line 279
        echo "                  </th>
                  <th style=\"width: 9%\">
                    ";
        // line 281
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Price (tax excl.)", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "
                    ";
        // line 282
        $this->loadTemplate("PrestaShopBundle:Admin/Product/Include:catalog_order_carrets.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 282)->display(array_merge($context, array("column" => "price")));
        // line 285
        echo "                  </th>

                  ";
        // line 287
        if ($this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getConfiguration("PS_STOCK_MANAGEMENT")) {
            // line 288
            echo "                  <th style=\"width: 9%\">
                    ";
            // line 289
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Quantity", array(), "Admin.Catalog.Feature"), "html", null, true);
            echo "
                    ";
            // line 290
            $this->loadTemplate("PrestaShopBundle:Admin/Product/Include:catalog_order_carrets.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 290)->display(array_merge($context, array("column" => "sav_quantity")));
            // line 293
            echo "                  </th>
                  ";
        } else {
            // line 295
            echo "                    <th></th>
                  ";
        }
        // line 297
        echo "
                  <th>
                    ";
        // line 299
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Status", array(), "Admin.Global"), "html", null, true);
        echo "
                    ";
        // line 300
        $this->loadTemplate("PrestaShopBundle:Admin/Product/Include:catalog_order_carrets.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 300)->display(array_merge($context, array("column" => "active")));
        // line 303
        echo "                  </th>
                  ";
        // line 304
        if ((($context["has_category_filter"] ?? null) == true)) {
            // line 305
            echo "                    <th>
                      ";
            // line 306
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Position", array(), "Admin.Global"), "html", null, true);
            echo "
                      ";
            // line 307
            $this->loadTemplate("PrestaShopBundle:Admin/Product/Include:catalog_order_carrets.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 307)->display(array_merge($context, array("column" => "position")));
            // line 310
            echo "                    </th>
                  ";
        }
        // line 312
        echo "                  <th style=\"width: 6%\"></th>
                </tr>
                <tr class=\"column-filters\">
                  <th>
                    ";
        // line 316
        $this->loadTemplate("PrestaShopBundle:Admin/Helpers:range_inputs.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 316)->display(array_merge($context, array("input_name" => "filter_column_id_product", "min" => "0", "max" => "1000000", "minLabel" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Min", array(), "Admin.Global"), "maxLabel" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Max", array(), "Admin.Global"), "value" =>         // line 322
($context["filter_column_id_product"] ?? null))));
        // line 324
        echo "                  </th>
                  <th>&nbsp;</th>
                  <th>
                    <input
                      type=\"text\"
                      class=\"form-control\"
                      placeholder=\"";
        // line 330
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Search name", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\"
                      name=\"filter_column_name\"
                      value=\"";
        // line 332
        echo twig_escape_filter($this->env, ($context["filter_column_name"] ?? null), "html", null, true);
        echo "\"
                    />
                  </th>
                  <th>
                    <input
                      type=\"text\"
                      class=\"form-control\"
                      placeholder=\"";
        // line 339
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Search ref.", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\"
                      name=\"filter_column_reference\"
                      value=\"";
        // line 341
        echo twig_escape_filter($this->env, ($context["filter_column_reference"] ?? null), "html", null, true);
        echo "\"
                    />
                  </th>
                  <th>
                    <input
                      type=\"text\"
                      class=\"form-control\"
                      placeholder=\"";
        // line 348
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Search category", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\"
                      name=\"filter_column_name_category\"
                      value=\"";
        // line 350
        echo twig_escape_filter($this->env, ($context["filter_column_name_category"] ?? null), "html", null, true);
        echo "\"
                    />
                  </th>
                  <th>
                    ";
        // line 354
        $this->loadTemplate("PrestaShopBundle:Admin/Helpers:range_inputs.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 354)->display(array_merge($context, array("input_name" => "filter_column_price", "min" => "0", "max" => "1000000", "minLabel" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Min", array(), "Admin.Global"), "maxLabel" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Max", array(), "Admin.Global"), "value" =>         // line 360
($context["filter_column_price"] ?? null))));
        // line 362
        echo "                  </th>

                  ";
        // line 364
        if ($this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getConfiguration("PS_STOCK_MANAGEMENT")) {
            // line 365
            echo "                  <th>
                    ";
            // line 366
            $this->loadTemplate("PrestaShopBundle:Admin/Helpers:range_inputs.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 366)->display(array_merge($context, array("input_name" => "filter_column_sav_quantity", "min" => "-1000000", "max" => "1000000", "minLabel" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Min", array(), "Admin.Global"), "maxLabel" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Max", array(), "Admin.Global"), "value" =>             // line 372
($context["filter_column_sav_quantity"] ?? null))));
            // line 374
            echo "                  </th>
                  ";
        } else {
            // line 376
            echo "                    <th></th>
                  ";
        }
        // line 378
        echo "
                  <th id=\"product_filter_column_active\">
                    <select data-toggle=\"select2\" name=\"filter_column_active\">
                      <option value=\"\"></option>
                      <option value=\"1\" ";
        // line 382
        if ((array_key_exists("filter_column_active", $context) && (($context["filter_column_active"] ?? null) == "1"))) {
            echo "selected=\"selected\"";
        }
        echo ">Active</option>
                      <option value=\"0\" ";
        // line 383
        if ((array_key_exists("filter_column_active", $context) && (($context["filter_column_active"] ?? null) == "0"))) {
            echo "selected=\"selected\"";
        }
        echo ">Inactive</option>
                    </select>
                  </th>
                  ";
        // line 386
        if ((($context["has_category_filter"] ?? null) == true)) {
            // line 387
            echo "                    <th>
                      ";
            // line 388
            if ( !($context["activate_drag_and_drop"] ?? null)) {
                // line 389
                echo "                        <input type=\"button\" class=\"btn btn-tertiary-outline\" name=\"products_filter_position_asc\" value=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Reorder", array(), "Admin.Actions"), "html", null, true);
                echo "\" onclick=\"productOrderPrioritiesTable();\" />
                        ";
            } else {
                // line 391
                echo "                        <input type=\"button\" id=\"bulk_edition_save_keep\" class=\"btn\" onclick=\"bulkProductAction(this, 'edition');\" value=\"";
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save & refresh", array(), "Admin.Actions");
                echo "\" />
                    ";
            }
            // line 393
            echo "
                    </th>
                  ";
        }
        // line 396
        echo "                  <th style=\"width: 12%\">
                    <button
                      type=\"submit\"
                      class=\"btn btn-primary\"
                      name=\"products_filter_submit\"
                      title=\"";
        // line 401
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Filter", array(), "Admin.Actions"), "html", null, true);
        echo "\"
                    >
                      <i class=\"material-icons\">search</i>
                      ";
        // line 404
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Apply", array(), "Admin.Actions"), "html", null, true);
        echo "
                    </button>
                    <button
                      type=\"reset\"
                      class=\"btn btn-invisible\"
                      name=\"products_filter_reset\"
                      onclick=\"productColumnFilterReset(\$(this).closest('tr.column-filters'))\"
                      title=\"";
        // line 411
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Reset", array(), "Admin.Actions"), "html", null, true);
        echo "\"
                    >
                      <i class=\"material-icons\">clear</i>
                      ";
        // line 414
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Reset", array(), "Admin.Actions"), "html", null, true);
        echo "
                    </button>
                  </th>
                </tr>
              </thead>
              ";
        // line 419
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->controller("PrestaShopBundle\\Controller\\Admin\\ProductController::listAction", array("limit" =>         // line 420
($context["limit"] ?? null), "offset" =>         // line 421
($context["offset"] ?? null), "orderBy" =>         // line 422
($context["orderBy"] ?? null), "sortOrder" =>         // line 423
($context["sortOrder"] ?? null), "products" =>         // line 424
($context["products"] ?? null), "last_sql" =>         // line 425
($context["last_sql"] ?? null))));
        // line 426
        echo "
            </table>
          </div>
        </div>

        ";
        // line 431
        if ((($context["product_count_filtered"] ?? null) > 20)) {
            // line 432
            echo "          <div class=\"row\">
            <div class=\"col-md-12\">
              ";
            // line 434
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->controller("PrestaShopBundle:Admin\\Common:pagination", array("limit" =>             // line 435
($context["limit"] ?? null), "offset" => ($context["offset"] ?? null), "total" => ($context["product_count_filtered"] ?? null), "caller_parameters" => ($context["pagination_parameters"] ?? null), "limit_choices" => ($context["pagination_limit_choices"] ?? null))));
            // line 436
            echo "
            </div>
          </div>
        ";
        }
        // line 440
        echo "
      </form>

    </div>
  </div>

  ";
        // line 447
        echo "  ";
        $this->loadTemplate("PrestaShopBundle:Admin\\Product:catalog.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 447, "1074542822")->display(array_merge($context, array("id" => "catalog_duplicate_all_modal", "title" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Duplicating products", array(), "Admin.Catalog.Notification"), "closable" => true, "progressbar" => array("id" => "catalog_duplicate_all_progression", "label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Duplicating...", array(), "Admin.Catalog.Notification")), "actions" => array())));
        // line 466
        echo "

  ";
        // line 469
        echo "  ";
        $this->loadTemplate("PrestaShopBundle:Admin\\Product:catalog.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 469, "1033219905")->display(array_merge($context, array("id" => "catalog_activate_all_modal", "title" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Activating products", array(), "Admin.Catalog.Notification"), "closable" => true, "progressbar" => array("id" => "catalog_activate_all_progression", "label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Activating...", array(), "Admin.Catalog.Notification")), "actions" => array())));
        // line 488
        echo "

  ";
        // line 491
        echo "  ";
        $this->loadTemplate("PrestaShopBundle:Admin\\Product:catalog.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 491, "1528188005")->display(array_merge($context, array("id" => "catalog_deactivate_all_modal", "title" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Deactivating products", array(), "Admin.Catalog.Notification"), "closable" => true, "progressbar" => array("id" => "catalog_deactivate_all_progression", "label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Deactivating...", array(), "Admin.Catalog.Notification")), "actions" => array())));
        // line 510
        echo "

  ";
        // line 513
        echo "  ";
        $this->loadTemplate("PrestaShopBundle:Admin\\Product:catalog.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 513, "1310607006")->display(array_merge($context, array("id" => "catalog_delete_all_modal", "title" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Deleting products", array(), "Admin.Catalog.Notification"), "closable" => true, "progressbar" => array("id" => "catalog_delete_all_progression", "label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Deleting...", array(), "Admin.Catalog.Notification")), "actions" => array())));
        // line 532
        echo "

  ";
        // line 535
        echo "  ";
        $this->loadTemplate("PrestaShopBundle:Admin\\Product:catalog.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 535, "1885643448")->display(array_merge($context, array("id" => "catalog_deletion_modal", "title" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Delete products?", array(), "Admin.Catalog.Feature"), "closable" => true, "actions" => array(0 => array("type" => "button", "label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Delete now", array(), "Admin.Actions"), "value" => "confirm", "class" => "btn btn-primary btn-lg")))));
        // line 552
        echo "
  ";
        // line 553
        $this->loadTemplate("PrestaShopBundle:Admin\\Product:catalog.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 553, "2110926903")->display(array_merge($context, array("id" => "catalog_sql_query_modal", "title" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("SQL query", array(), "Admin.Global"), "closable" => true, "actions" => array(0 => array("type" => "button", "label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Export to SQL Manager", array(), "Admin.Actions"), "value" => "sql_manager", "class" => "btn btn-primary btn-lg")))));
        // line 573
        echo "
";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin\\Product:catalog.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  768 => 573,  766 => 553,  763 => 552,  760 => 535,  756 => 532,  753 => 513,  749 => 510,  746 => 491,  742 => 488,  739 => 469,  735 => 466,  732 => 447,  724 => 440,  718 => 436,  716 => 435,  715 => 434,  711 => 432,  709 => 431,  702 => 426,  700 => 425,  699 => 424,  698 => 423,  697 => 422,  696 => 421,  695 => 420,  694 => 419,  686 => 414,  680 => 411,  670 => 404,  664 => 401,  657 => 396,  652 => 393,  646 => 391,  640 => 389,  638 => 388,  635 => 387,  633 => 386,  625 => 383,  619 => 382,  613 => 378,  609 => 376,  605 => 374,  603 => 372,  602 => 366,  599 => 365,  597 => 364,  593 => 362,  591 => 360,  590 => 354,  583 => 350,  578 => 348,  568 => 341,  563 => 339,  553 => 332,  548 => 330,  540 => 324,  538 => 322,  537 => 316,  531 => 312,  527 => 310,  525 => 307,  521 => 306,  518 => 305,  516 => 304,  513 => 303,  511 => 300,  507 => 299,  503 => 297,  499 => 295,  495 => 293,  493 => 290,  489 => 289,  486 => 288,  484 => 287,  480 => 285,  478 => 282,  474 => 281,  470 => 279,  468 => 276,  464 => 275,  460 => 273,  458 => 270,  454 => 269,  450 => 267,  448 => 264,  444 => 263,  438 => 260,  434 => 258,  432 => 255,  428 => 254,  421 => 249,  419 => 248,  418 => 247,  417 => 246,  416 => 245,  415 => 244,  404 => 236,  397 => 232,  393 => 231,  389 => 230,  377 => 221,  371 => 218,  358 => 208,  345 => 198,  330 => 186,  321 => 179,  319 => 177,  318 => 170,  315 => 169,  313 => 159,  309 => 157,  307 => 147,  304 => 146,  302 => 134,  297 => 132,  293 => 131,  289 => 130,  285 => 129,  275 => 122,  257 => 107,  251 => 104,  245 => 101,  241 => 100,  236 => 98,  232 => 97,  226 => 93,  217 => 87,  209 => 81,  207 => 80,  200 => 76,  195 => 73,  192 => 72,  188 => 69,  184 => 67,  167 => 65,  164 => 64,  147 => 63,  144 => 62,  142 => 61,  131 => 55,  127 => 54,  119 => 51,  115 => 49,  113 => 48,  110 => 47,  107 => 46,  102 => 42,  85 => 40,  68 => 39,  63 => 37,  60 => 36,  54 => 33,  50 => 32,  46 => 31,  42 => 30,  37 => 29,  34 => 28,  30 => 26,  28 => 25,  11 => 26,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin\\Product:catalog.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Product/catalog.html.twig");
    }
}


/* PrestaShopBundle:Admin\Product:catalog.html.twig */
class __TwigTemplate_cd169656af0d5e8b09596335d851f2e67eb5936f11f6ad131a97b702b70c1c5f_1074542822 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 447
        $this->parent = $this->loadTemplate("PrestaShopBundle:Admin/Helpers:bootstrap_popup.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 447);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "PrestaShopBundle:Admin/Helpers:bootstrap_popup.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 457
    public function block_content($context, array $blocks = array())
    {
        // line 458
        echo "      <div class=\"modal-body\">
        ";
        // line 459
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Duplication in progress...", array(), "Admin.Catalog.Notification"), "html", null, true);
        echo "
        <span id=\"catalog_duplicate_all_failure\" style=\"display: none;color: darkred;\">
          ";
        // line 461
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Duplication failed.", array(), "Admin.Catalog.Notification"), "html", null, true);
        echo "
        </span>
      </div>
    ";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin\\Product:catalog.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  838 => 461,  833 => 459,  830 => 458,  827 => 457,  810 => 447,  768 => 573,  766 => 553,  763 => 552,  760 => 535,  756 => 532,  753 => 513,  749 => 510,  746 => 491,  742 => 488,  739 => 469,  735 => 466,  732 => 447,  724 => 440,  718 => 436,  716 => 435,  715 => 434,  711 => 432,  709 => 431,  702 => 426,  700 => 425,  699 => 424,  698 => 423,  697 => 422,  696 => 421,  695 => 420,  694 => 419,  686 => 414,  680 => 411,  670 => 404,  664 => 401,  657 => 396,  652 => 393,  646 => 391,  640 => 389,  638 => 388,  635 => 387,  633 => 386,  625 => 383,  619 => 382,  613 => 378,  609 => 376,  605 => 374,  603 => 372,  602 => 366,  599 => 365,  597 => 364,  593 => 362,  591 => 360,  590 => 354,  583 => 350,  578 => 348,  568 => 341,  563 => 339,  553 => 332,  548 => 330,  540 => 324,  538 => 322,  537 => 316,  531 => 312,  527 => 310,  525 => 307,  521 => 306,  518 => 305,  516 => 304,  513 => 303,  511 => 300,  507 => 299,  503 => 297,  499 => 295,  495 => 293,  493 => 290,  489 => 289,  486 => 288,  484 => 287,  480 => 285,  478 => 282,  474 => 281,  470 => 279,  468 => 276,  464 => 275,  460 => 273,  458 => 270,  454 => 269,  450 => 267,  448 => 264,  444 => 263,  438 => 260,  434 => 258,  432 => 255,  428 => 254,  421 => 249,  419 => 248,  418 => 247,  417 => 246,  416 => 245,  415 => 244,  404 => 236,  397 => 232,  393 => 231,  389 => 230,  377 => 221,  371 => 218,  358 => 208,  345 => 198,  330 => 186,  321 => 179,  319 => 177,  318 => 170,  315 => 169,  313 => 159,  309 => 157,  307 => 147,  304 => 146,  302 => 134,  297 => 132,  293 => 131,  289 => 130,  285 => 129,  275 => 122,  257 => 107,  251 => 104,  245 => 101,  241 => 100,  236 => 98,  232 => 97,  226 => 93,  217 => 87,  209 => 81,  207 => 80,  200 => 76,  195 => 73,  192 => 72,  188 => 69,  184 => 67,  167 => 65,  164 => 64,  147 => 63,  144 => 62,  142 => 61,  131 => 55,  127 => 54,  119 => 51,  115 => 49,  113 => 48,  110 => 47,  107 => 46,  102 => 42,  85 => 40,  68 => 39,  63 => 37,  60 => 36,  54 => 33,  50 => 32,  46 => 31,  42 => 30,  37 => 29,  34 => 28,  30 => 26,  28 => 25,  11 => 26,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin\\Product:catalog.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Product/catalog.html.twig");
    }
}


/* PrestaShopBundle:Admin\Product:catalog.html.twig */
class __TwigTemplate_cd169656af0d5e8b09596335d851f2e67eb5936f11f6ad131a97b702b70c1c5f_1033219905 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 469
        $this->parent = $this->loadTemplate("PrestaShopBundle:Admin/Helpers:bootstrap_popup.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 469);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "PrestaShopBundle:Admin/Helpers:bootstrap_popup.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 479
    public function block_content($context, array $blocks = array())
    {
        // line 480
        echo "      <div class=\"modal-body\">
        ";
        // line 481
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Activation in progress...", array(), "Admin.Catalog.Notification"), "html", null, true);
        echo "
        <span id=\"catalog_activate_all_failure\" style=\"display: none;color: darkred;\">
          ";
        // line 483
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Activation failed.", array(), "Admin.Catalog.Notification"), "html", null, true);
        echo "
        </span>
      </div>
    ";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin\\Product:catalog.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  911 => 483,  906 => 481,  903 => 480,  900 => 479,  883 => 469,  838 => 461,  833 => 459,  830 => 458,  827 => 457,  810 => 447,  768 => 573,  766 => 553,  763 => 552,  760 => 535,  756 => 532,  753 => 513,  749 => 510,  746 => 491,  742 => 488,  739 => 469,  735 => 466,  732 => 447,  724 => 440,  718 => 436,  716 => 435,  715 => 434,  711 => 432,  709 => 431,  702 => 426,  700 => 425,  699 => 424,  698 => 423,  697 => 422,  696 => 421,  695 => 420,  694 => 419,  686 => 414,  680 => 411,  670 => 404,  664 => 401,  657 => 396,  652 => 393,  646 => 391,  640 => 389,  638 => 388,  635 => 387,  633 => 386,  625 => 383,  619 => 382,  613 => 378,  609 => 376,  605 => 374,  603 => 372,  602 => 366,  599 => 365,  597 => 364,  593 => 362,  591 => 360,  590 => 354,  583 => 350,  578 => 348,  568 => 341,  563 => 339,  553 => 332,  548 => 330,  540 => 324,  538 => 322,  537 => 316,  531 => 312,  527 => 310,  525 => 307,  521 => 306,  518 => 305,  516 => 304,  513 => 303,  511 => 300,  507 => 299,  503 => 297,  499 => 295,  495 => 293,  493 => 290,  489 => 289,  486 => 288,  484 => 287,  480 => 285,  478 => 282,  474 => 281,  470 => 279,  468 => 276,  464 => 275,  460 => 273,  458 => 270,  454 => 269,  450 => 267,  448 => 264,  444 => 263,  438 => 260,  434 => 258,  432 => 255,  428 => 254,  421 => 249,  419 => 248,  418 => 247,  417 => 246,  416 => 245,  415 => 244,  404 => 236,  397 => 232,  393 => 231,  389 => 230,  377 => 221,  371 => 218,  358 => 208,  345 => 198,  330 => 186,  321 => 179,  319 => 177,  318 => 170,  315 => 169,  313 => 159,  309 => 157,  307 => 147,  304 => 146,  302 => 134,  297 => 132,  293 => 131,  289 => 130,  285 => 129,  275 => 122,  257 => 107,  251 => 104,  245 => 101,  241 => 100,  236 => 98,  232 => 97,  226 => 93,  217 => 87,  209 => 81,  207 => 80,  200 => 76,  195 => 73,  192 => 72,  188 => 69,  184 => 67,  167 => 65,  164 => 64,  147 => 63,  144 => 62,  142 => 61,  131 => 55,  127 => 54,  119 => 51,  115 => 49,  113 => 48,  110 => 47,  107 => 46,  102 => 42,  85 => 40,  68 => 39,  63 => 37,  60 => 36,  54 => 33,  50 => 32,  46 => 31,  42 => 30,  37 => 29,  34 => 28,  30 => 26,  28 => 25,  11 => 26,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin\\Product:catalog.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Product/catalog.html.twig");
    }
}


/* PrestaShopBundle:Admin\Product:catalog.html.twig */
class __TwigTemplate_cd169656af0d5e8b09596335d851f2e67eb5936f11f6ad131a97b702b70c1c5f_1528188005 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 491
        $this->parent = $this->loadTemplate("PrestaShopBundle:Admin/Helpers:bootstrap_popup.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 491);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "PrestaShopBundle:Admin/Helpers:bootstrap_popup.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 501
    public function block_content($context, array $blocks = array())
    {
        // line 502
        echo "      <div class=\"modal-body\">
        ";
        // line 503
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Deactivation in progress...", array(), "Admin.Catalog.Notification"), "html", null, true);
        echo "
        <span id=\"catalog_deactivate_all_failure\" style=\"display: none;color: darkred;\">
          ";
        // line 505
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Deactivation failed.", array(), "Admin.Catalog.Notification"), "html", null, true);
        echo "
        </span>
      </div>
    ";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin\\Product:catalog.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  984 => 505,  979 => 503,  976 => 502,  973 => 501,  956 => 491,  911 => 483,  906 => 481,  903 => 480,  900 => 479,  883 => 469,  838 => 461,  833 => 459,  830 => 458,  827 => 457,  810 => 447,  768 => 573,  766 => 553,  763 => 552,  760 => 535,  756 => 532,  753 => 513,  749 => 510,  746 => 491,  742 => 488,  739 => 469,  735 => 466,  732 => 447,  724 => 440,  718 => 436,  716 => 435,  715 => 434,  711 => 432,  709 => 431,  702 => 426,  700 => 425,  699 => 424,  698 => 423,  697 => 422,  696 => 421,  695 => 420,  694 => 419,  686 => 414,  680 => 411,  670 => 404,  664 => 401,  657 => 396,  652 => 393,  646 => 391,  640 => 389,  638 => 388,  635 => 387,  633 => 386,  625 => 383,  619 => 382,  613 => 378,  609 => 376,  605 => 374,  603 => 372,  602 => 366,  599 => 365,  597 => 364,  593 => 362,  591 => 360,  590 => 354,  583 => 350,  578 => 348,  568 => 341,  563 => 339,  553 => 332,  548 => 330,  540 => 324,  538 => 322,  537 => 316,  531 => 312,  527 => 310,  525 => 307,  521 => 306,  518 => 305,  516 => 304,  513 => 303,  511 => 300,  507 => 299,  503 => 297,  499 => 295,  495 => 293,  493 => 290,  489 => 289,  486 => 288,  484 => 287,  480 => 285,  478 => 282,  474 => 281,  470 => 279,  468 => 276,  464 => 275,  460 => 273,  458 => 270,  454 => 269,  450 => 267,  448 => 264,  444 => 263,  438 => 260,  434 => 258,  432 => 255,  428 => 254,  421 => 249,  419 => 248,  418 => 247,  417 => 246,  416 => 245,  415 => 244,  404 => 236,  397 => 232,  393 => 231,  389 => 230,  377 => 221,  371 => 218,  358 => 208,  345 => 198,  330 => 186,  321 => 179,  319 => 177,  318 => 170,  315 => 169,  313 => 159,  309 => 157,  307 => 147,  304 => 146,  302 => 134,  297 => 132,  293 => 131,  289 => 130,  285 => 129,  275 => 122,  257 => 107,  251 => 104,  245 => 101,  241 => 100,  236 => 98,  232 => 97,  226 => 93,  217 => 87,  209 => 81,  207 => 80,  200 => 76,  195 => 73,  192 => 72,  188 => 69,  184 => 67,  167 => 65,  164 => 64,  147 => 63,  144 => 62,  142 => 61,  131 => 55,  127 => 54,  119 => 51,  115 => 49,  113 => 48,  110 => 47,  107 => 46,  102 => 42,  85 => 40,  68 => 39,  63 => 37,  60 => 36,  54 => 33,  50 => 32,  46 => 31,  42 => 30,  37 => 29,  34 => 28,  30 => 26,  28 => 25,  11 => 26,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin\\Product:catalog.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Product/catalog.html.twig");
    }
}


/* PrestaShopBundle:Admin\Product:catalog.html.twig */
class __TwigTemplate_cd169656af0d5e8b09596335d851f2e67eb5936f11f6ad131a97b702b70c1c5f_1310607006 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 513
        $this->parent = $this->loadTemplate("PrestaShopBundle:Admin/Helpers:bootstrap_popup.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 513);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "PrestaShopBundle:Admin/Helpers:bootstrap_popup.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 523
    public function block_content($context, array $blocks = array())
    {
        // line 524
        echo "      <div class=\"modal-body\">
        ";
        // line 525
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Deletion in progress...", array(), "Admin.Catalog.Notification"), "html", null, true);
        echo "
        <span id=\"catalog_delete_all_failure\" style=\"display: none;color: darkred;\">
          ";
        // line 527
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Deletion failed.", array(), "Admin.Catalog.Notification"), "html", null, true);
        echo "
        </span>
      </div>
    ";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin\\Product:catalog.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1057 => 527,  1052 => 525,  1049 => 524,  1046 => 523,  1029 => 513,  984 => 505,  979 => 503,  976 => 502,  973 => 501,  956 => 491,  911 => 483,  906 => 481,  903 => 480,  900 => 479,  883 => 469,  838 => 461,  833 => 459,  830 => 458,  827 => 457,  810 => 447,  768 => 573,  766 => 553,  763 => 552,  760 => 535,  756 => 532,  753 => 513,  749 => 510,  746 => 491,  742 => 488,  739 => 469,  735 => 466,  732 => 447,  724 => 440,  718 => 436,  716 => 435,  715 => 434,  711 => 432,  709 => 431,  702 => 426,  700 => 425,  699 => 424,  698 => 423,  697 => 422,  696 => 421,  695 => 420,  694 => 419,  686 => 414,  680 => 411,  670 => 404,  664 => 401,  657 => 396,  652 => 393,  646 => 391,  640 => 389,  638 => 388,  635 => 387,  633 => 386,  625 => 383,  619 => 382,  613 => 378,  609 => 376,  605 => 374,  603 => 372,  602 => 366,  599 => 365,  597 => 364,  593 => 362,  591 => 360,  590 => 354,  583 => 350,  578 => 348,  568 => 341,  563 => 339,  553 => 332,  548 => 330,  540 => 324,  538 => 322,  537 => 316,  531 => 312,  527 => 310,  525 => 307,  521 => 306,  518 => 305,  516 => 304,  513 => 303,  511 => 300,  507 => 299,  503 => 297,  499 => 295,  495 => 293,  493 => 290,  489 => 289,  486 => 288,  484 => 287,  480 => 285,  478 => 282,  474 => 281,  470 => 279,  468 => 276,  464 => 275,  460 => 273,  458 => 270,  454 => 269,  450 => 267,  448 => 264,  444 => 263,  438 => 260,  434 => 258,  432 => 255,  428 => 254,  421 => 249,  419 => 248,  418 => 247,  417 => 246,  416 => 245,  415 => 244,  404 => 236,  397 => 232,  393 => 231,  389 => 230,  377 => 221,  371 => 218,  358 => 208,  345 => 198,  330 => 186,  321 => 179,  319 => 177,  318 => 170,  315 => 169,  313 => 159,  309 => 157,  307 => 147,  304 => 146,  302 => 134,  297 => 132,  293 => 131,  289 => 130,  285 => 129,  275 => 122,  257 => 107,  251 => 104,  245 => 101,  241 => 100,  236 => 98,  232 => 97,  226 => 93,  217 => 87,  209 => 81,  207 => 80,  200 => 76,  195 => 73,  192 => 72,  188 => 69,  184 => 67,  167 => 65,  164 => 64,  147 => 63,  144 => 62,  142 => 61,  131 => 55,  127 => 54,  119 => 51,  115 => 49,  113 => 48,  110 => 47,  107 => 46,  102 => 42,  85 => 40,  68 => 39,  63 => 37,  60 => 36,  54 => 33,  50 => 32,  46 => 31,  42 => 30,  37 => 29,  34 => 28,  30 => 26,  28 => 25,  11 => 26,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin\\Product:catalog.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Product/catalog.html.twig");
    }
}


/* PrestaShopBundle:Admin\Product:catalog.html.twig */
class __TwigTemplate_cd169656af0d5e8b09596335d851f2e67eb5936f11f6ad131a97b702b70c1c5f_1885643448 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 535
        $this->parent = $this->loadTemplate("PrestaShopBundle:Admin/Helpers:bootstrap_popup.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 535);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "PrestaShopBundle:Admin/Helpers:bootstrap_popup.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 546
    public function block_content($context, array $blocks = array())
    {
        // line 547
        echo "      <div class=\"modal-body\">
        ";
        // line 548
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("These products will be deleted for good. Please confirm.", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "
      </div>
    ";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin\\Product:catalog.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1125 => 548,  1122 => 547,  1119 => 546,  1102 => 535,  1057 => 527,  1052 => 525,  1049 => 524,  1046 => 523,  1029 => 513,  984 => 505,  979 => 503,  976 => 502,  973 => 501,  956 => 491,  911 => 483,  906 => 481,  903 => 480,  900 => 479,  883 => 469,  838 => 461,  833 => 459,  830 => 458,  827 => 457,  810 => 447,  768 => 573,  766 => 553,  763 => 552,  760 => 535,  756 => 532,  753 => 513,  749 => 510,  746 => 491,  742 => 488,  739 => 469,  735 => 466,  732 => 447,  724 => 440,  718 => 436,  716 => 435,  715 => 434,  711 => 432,  709 => 431,  702 => 426,  700 => 425,  699 => 424,  698 => 423,  697 => 422,  696 => 421,  695 => 420,  694 => 419,  686 => 414,  680 => 411,  670 => 404,  664 => 401,  657 => 396,  652 => 393,  646 => 391,  640 => 389,  638 => 388,  635 => 387,  633 => 386,  625 => 383,  619 => 382,  613 => 378,  609 => 376,  605 => 374,  603 => 372,  602 => 366,  599 => 365,  597 => 364,  593 => 362,  591 => 360,  590 => 354,  583 => 350,  578 => 348,  568 => 341,  563 => 339,  553 => 332,  548 => 330,  540 => 324,  538 => 322,  537 => 316,  531 => 312,  527 => 310,  525 => 307,  521 => 306,  518 => 305,  516 => 304,  513 => 303,  511 => 300,  507 => 299,  503 => 297,  499 => 295,  495 => 293,  493 => 290,  489 => 289,  486 => 288,  484 => 287,  480 => 285,  478 => 282,  474 => 281,  470 => 279,  468 => 276,  464 => 275,  460 => 273,  458 => 270,  454 => 269,  450 => 267,  448 => 264,  444 => 263,  438 => 260,  434 => 258,  432 => 255,  428 => 254,  421 => 249,  419 => 248,  418 => 247,  417 => 246,  416 => 245,  415 => 244,  404 => 236,  397 => 232,  393 => 231,  389 => 230,  377 => 221,  371 => 218,  358 => 208,  345 => 198,  330 => 186,  321 => 179,  319 => 177,  318 => 170,  315 => 169,  313 => 159,  309 => 157,  307 => 147,  304 => 146,  302 => 134,  297 => 132,  293 => 131,  289 => 130,  285 => 129,  275 => 122,  257 => 107,  251 => 104,  245 => 101,  241 => 100,  236 => 98,  232 => 97,  226 => 93,  217 => 87,  209 => 81,  207 => 80,  200 => 76,  195 => 73,  192 => 72,  188 => 69,  184 => 67,  167 => 65,  164 => 64,  147 => 63,  144 => 62,  142 => 61,  131 => 55,  127 => 54,  119 => 51,  115 => 49,  113 => 48,  110 => 47,  107 => 46,  102 => 42,  85 => 40,  68 => 39,  63 => 37,  60 => 36,  54 => 33,  50 => 32,  46 => 31,  42 => 30,  37 => 29,  34 => 28,  30 => 26,  28 => 25,  11 => 26,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin\\Product:catalog.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Product/catalog.html.twig");
    }
}


/* PrestaShopBundle:Admin\Product:catalog.html.twig */
class __TwigTemplate_cd169656af0d5e8b09596335d851f2e67eb5936f11f6ad131a97b702b70c1c5f_2110926903 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 553
        $this->parent = $this->loadTemplate("PrestaShopBundle:Admin/Helpers:bootstrap_popup.html.twig", "PrestaShopBundle:Admin\\Product:catalog.html.twig", 553);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "PrestaShopBundle:Admin/Helpers:bootstrap_popup.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 564
    public function block_content($context, array $blocks = array())
    {
        // line 565
        echo "      <form method=\"post\" action=\"";
        echo twig_escape_filter($this->env, ($context["sql_manager_add_link"] ?? null), "html", null, true);
        echo "\" id=\"catalog_sql_query_modal_content\">
        <div class=\"modal-body\">
          <textarea name=\"sql\" rows=\"20\" cols=\"65\"></textarea>
          <input type=\"hidden\" name=\"name\" value=\"\" />
        </div>
      </form>
    ";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin\\Product:catalog.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1189 => 565,  1186 => 564,  1169 => 553,  1125 => 548,  1122 => 547,  1119 => 546,  1102 => 535,  1057 => 527,  1052 => 525,  1049 => 524,  1046 => 523,  1029 => 513,  984 => 505,  979 => 503,  976 => 502,  973 => 501,  956 => 491,  911 => 483,  906 => 481,  903 => 480,  900 => 479,  883 => 469,  838 => 461,  833 => 459,  830 => 458,  827 => 457,  810 => 447,  768 => 573,  766 => 553,  763 => 552,  760 => 535,  756 => 532,  753 => 513,  749 => 510,  746 => 491,  742 => 488,  739 => 469,  735 => 466,  732 => 447,  724 => 440,  718 => 436,  716 => 435,  715 => 434,  711 => 432,  709 => 431,  702 => 426,  700 => 425,  699 => 424,  698 => 423,  697 => 422,  696 => 421,  695 => 420,  694 => 419,  686 => 414,  680 => 411,  670 => 404,  664 => 401,  657 => 396,  652 => 393,  646 => 391,  640 => 389,  638 => 388,  635 => 387,  633 => 386,  625 => 383,  619 => 382,  613 => 378,  609 => 376,  605 => 374,  603 => 372,  602 => 366,  599 => 365,  597 => 364,  593 => 362,  591 => 360,  590 => 354,  583 => 350,  578 => 348,  568 => 341,  563 => 339,  553 => 332,  548 => 330,  540 => 324,  538 => 322,  537 => 316,  531 => 312,  527 => 310,  525 => 307,  521 => 306,  518 => 305,  516 => 304,  513 => 303,  511 => 300,  507 => 299,  503 => 297,  499 => 295,  495 => 293,  493 => 290,  489 => 289,  486 => 288,  484 => 287,  480 => 285,  478 => 282,  474 => 281,  470 => 279,  468 => 276,  464 => 275,  460 => 273,  458 => 270,  454 => 269,  450 => 267,  448 => 264,  444 => 263,  438 => 260,  434 => 258,  432 => 255,  428 => 254,  421 => 249,  419 => 248,  418 => 247,  417 => 246,  416 => 245,  415 => 244,  404 => 236,  397 => 232,  393 => 231,  389 => 230,  377 => 221,  371 => 218,  358 => 208,  345 => 198,  330 => 186,  321 => 179,  319 => 177,  318 => 170,  315 => 169,  313 => 159,  309 => 157,  307 => 147,  304 => 146,  302 => 134,  297 => 132,  293 => 131,  289 => 130,  285 => 129,  275 => 122,  257 => 107,  251 => 104,  245 => 101,  241 => 100,  236 => 98,  232 => 97,  226 => 93,  217 => 87,  209 => 81,  207 => 80,  200 => 76,  195 => 73,  192 => 72,  188 => 69,  184 => 67,  167 => 65,  164 => 64,  147 => 63,  144 => 62,  142 => 61,  131 => 55,  127 => 54,  119 => 51,  115 => 49,  113 => 48,  110 => 47,  107 => 46,  102 => 42,  85 => 40,  68 => 39,  63 => 37,  60 => 36,  54 => 33,  50 => 32,  46 => 31,  42 => 30,  37 => 29,  34 => 28,  30 => 26,  28 => 25,  11 => 26,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin\\Product:catalog.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Product/catalog.html.twig");
    }
}
