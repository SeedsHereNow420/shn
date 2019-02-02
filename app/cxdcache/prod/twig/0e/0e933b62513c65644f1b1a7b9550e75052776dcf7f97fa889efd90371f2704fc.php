<?php

/* PrestaShopBundle:Admin\Product:form.html.twig */
class __TwigTemplate_a9454949ed2392b8ab91660b7c09ca11ac69998610ad382581fccfdbb3e9ffb4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 25
        $this->parent = $this->loadTemplate("PrestaShopBundle:Admin:layout.html.twig", "PrestaShopBundle:Admin\\Product:form.html.twig", 25);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
            '__internal_3b4fdce1d18ca46905c35a3ca81f6201cb026e7f73ad26bf172997d6e79f342f' => array($this, 'block___internal_3b4fdce1d18ca46905c35a3ca81f6201cb026e7f73ad26bf172997d6e79f342f'),
            '__internal_d1b62579fc3e9b5e801e24ec2aa4164445667c2b0c0e089d70dee53616188b58' => array($this, 'block___internal_d1b62579fc3e9b5e801e24ec2aa4164445667c2b0c0e089d70dee53616188b58'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "PrestaShopBundle:Admin:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1234
        $context["js_translatable"] = twig_array_merge(array("Are you sure to disable variations ? they will all be deleted" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("This will delete all the combinations. Do you wish to proceed?", array(), "Admin.Catalog.Notification")),         // line 1236
($context["js_translatable"] ?? null));
        // line 1238
        $context["js_translatable"] = twig_array_merge(array("Form update success" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Settings updated.", array(), "Admin.Notifications.Success"), "Form update errors" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Unable to update settings.", array(), "Admin.Notifications.Error"), "Delete" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Delete", array(), "Admin.Actions"), "ToLargeFile" => twig_replace_filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("The file is too large. Maximum size allowed is: [1]. The file you are trying to upload is [2].", array(), "Admin.Notifications.Error"), array("[1]" => "{{maxFilesize}}", "[2]" => "{{filesize}}")), "Drop images here" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Drop images here", array(), "Admin.Catalog.Feature"), "or select files" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("or select files", array(), "Admin.Catalog.Feature"), "files recommandations" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Recommended size 800 x 800px for default theme.", array(), "Admin.Catalog.Feature"), "files recommandations2" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("JPG, GIF or PNG format.", array(), "Admin.Catalog.Feature"), "Cover" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Cover", array(), "Admin.Catalog.Feature"), "Are you sure to delete this?" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Are you sure to delete this?", array(), "Admin.Notifications.Warning"), "This will delete the specific price. Do you wish to proceed?" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("This will delete the specific price. Do you wish to proceed?", array(), "Admin.Catalog.Notification"), "Quantities" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Quantities", array(), "Admin.Catalog.Feature"), "Combinations" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Combinations", array(), "Admin.Catalog.Feature"), "Virtual product" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Virtual product", array(), "Admin.Catalog.Feature"), "tax incl." => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("tax incl.", array(), "Admin.Catalog.Feature"), "tax excl." => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("tax excl.", array(), "Admin.Catalog.Feature"), "You can't create pack product with variations. Are you sure to disable variations ? they will all be deleted." => (($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("A pack of products can't have combinations.", array(), "Admin.Catalog.Notification") . " ") . $this->getAttribute(        // line 1255
($context["js_translatable"] ?? null), "Are you sure to disable variations ? they will all be deleted", array(), "array")), "You can't create virtual product with variations. Are you sure to disable variations ? they will all be deleted." => (($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("A virtual product can't have combinations.", array(), "Admin.Catalog.Notification") . " ") . $this->getAttribute(        // line 1256
($context["js_translatable"] ?? null), "Are you sure to disable variations ? they will all be deleted", array(), "array"))),         // line 1257
($context["js_translatable"] ?? null));
        // line 25
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 27
    public function block_content($context, array $blocks = array())
    {
        // line 28
        echo "
  <form name=\"form\" id=\"form\" method=\"post\" class=\"form-horizontal product-page row\" novalidate=\"novalidate\">

    ";
        // line 31
        if ( !($context["editable"] ?? null)) {
            echo " <fieldset disabled id=\"field-disabled\"> ";
        }
        // line 32
        echo "    ";
        // line 33
        echo "    <div class=\"product-header\">
      ";
        // line 34
        if (($context["is_multishop_context"] ?? null)) {
            // line 35
            echo "        <div class=\"col-md-12\">
          <div class=\"alert alert-warning\" role=\"alert\">
            <i class=\"material-icons\">info_outline</i><p class=\"alert-text\">";
            // line 37
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("You are in a multistore context: any modification will impact all your shops, or each shop of the active group.", array(), "Admin.Catalog.Notification"), "html", null, true);
            echo "</p>
          </div>
        </div>
      ";
        }
        // line 41
        echo "
      <div class=\"col-md-10 col-md-offset-1\">
        <div class=\"row\">
          <div class=\"col-md-7 big-input ";
        // line 44
        echo ((($this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getConfiguration("PS_FORCE_FRIENDLY_PRODUCT") == 1)) ? ("friendly-url-force-update") : (""));
        echo "\" id=\"form_step1_names\">
            ";
        // line 45
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step1", array()), "name", array()), 'widget');
        echo "
          </div>
          <div class=\"col-md-2 form_step1_type_product\">
            ";
        // line 48
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step1", array()), "type_product", array()), 'widget');
        echo "
            <span class=\"help-box pull-xs-right\" data-toggle=\"popover\"
              data-content=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Is the product a pack (a combination of at least two existing products), a virtual product (downloadable file, service, etc.), or simply a standard, physical product?", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\"></span>
          </div>
          <div class=\"col-md-1 form_switch_language\">
            <div class=\"";
        // line 53
        echo (((twig_length_filter($this->env, ($context["languages"] ?? null)) == 1)) ? ("hide") : (""));
        echo "\">
              <select id=\"form_switch_language\" class=\"form-control\" data-toggle=\"select2\">
                ";
        // line 55
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 56
            echo "                  <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "iso_code", array()), "html", null, true);
            echo "\" ";
            if ((($context["default_language_iso"] ?? null) == $this->getAttribute($context["language"], "iso_code", array()))) {
                echo "selected=\"selected\"";
            }
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "iso_code", array()), "html", null, true);
            echo "</option>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 58
        echo "              </select>
            </div>
          </div>
          <div class=\"toolbar col-lg-2 text-md-right\">
            <a class=\"toolbar-button btn-sales\" href=\"";
        // line 62
        echo twig_escape_filter($this->env, ($context["stats_link"] ?? null), "html", null, true);
        echo "\" target=\"_blank\" title=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Sales", array(), "Admin.Global"), "html", null, true);
        echo "\"
               id=\"product_form_go_to_sales\">
              <i class=\"material-icons\">assessment</i>
              <span class=\"title\">";
        // line 65
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Sales", array(), "Admin.Global"), "html", null, true);
        echo "</span>
            </a>

            <a
              class=\"toolbar-button btn-quicknav btn-sidebar\"
              href=\"#\"
              title=\"";
        // line 71
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Quick navigation", array(), "Admin.Global"), "html", null, true);
        echo "\"
              data-toggle=\"sidebar\"
              data-target=\"#right-sidebar\"
              data-url=\"";
        // line 74
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_list", array("limit" => "last", "offset" => "last", "view" => "quicknav")), "html", null, true);
        echo "\"
              id=\"product_form_open_quicknav\"
            >
              <i class=\"material-icons\">list</i>
              <span class=\"title\">";
        // line 78
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Product list", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</span>
            </a>

            <a class=\"toolbar-button btn-help btn-sidebar\" href=\"#\"
               title=\"";
        // line 82
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Help", array(), "Admin.Global"), "html", null, true);
        echo "\"
               data-toggle=\"sidebar\"
               data-target=\"#right-sidebar\"
               data-url=\"";
        // line 85
        echo twig_escape_filter($this->env, ($context["help_link"] ?? null), "html", null, true);
        echo "\"
               id=\"product_form_open_help\"
            >
              <i class=\"material-icons\">help</i>
              <span class=\"title\">";
        // line 89
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Help", array(), "Admin.Global"), "html", null, true);
        echo "</span>
            </a>
          </div>
        </div>
        <div class=\"row\">
          <div class=\"col-lg-12\">
            ";
        // line 95
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step1", array()), "name", array()), 'errors');
        echo "
            ";
        // line 96
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step1", array()), "type_product", array()), 'errors');
        echo "
          </div>
        </div>
      </div>
      <div class=\"clearfix\"></div>
    </div>

    <div class=\"col-md-10 col-md-offset-1\">
      <div id=\"form_bubbling_errors\">
        ";
        // line 105
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["form"] ?? null), 'errors');
        echo "
      </div>
    </div>

    ";
        // line 110
        echo "    <div id=\"form-loading\" class=\"col-md-10 col-md-offset-1\">
      <div class=\"tabs js-tabs\">
        <div class=\"arrow js-arrow left-arrow pull-left\">
          <i class=\"material-icons hide\">chevron_left</i>
        </div>
        <ul class=\"nav nav-tabs js-nav-tabs\" id=\"form-nav\" role=\"tablist\">
          <li id=\"tab_step1\" class=\"nav-item\"><a href=\"#step1\" role=\"tab\" data-toggle=\"tab\" class=\"nav-link active\">";
        // line 116
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Basic settings", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</a></li>
          <li id=\"tab_step3\" class=\"nav-item\"><a href=\"#step3\" role=\"tab\" data-toggle=\"tab\" class=\"nav-link\">";
        // line 117
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Quantities", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</a></li>
          <li id=\"tab_step4\" class=\"nav-item\"><a href=\"#step4\" role=\"tab\" data-toggle=\"tab\" class=\"nav-link\">";
        // line 118
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Shipping", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</a></li>
          <li id=\"tab_step2\" class=\"nav-item\"><a href=\"#step2\" role=\"tab\" data-toggle=\"tab\" class=\"nav-link\">";
        // line 119
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Pricing", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</a></li>
          <li id=\"tab_step5\" class=\"nav-item\"><a href=\"#step5\" role=\"tab\" data-toggle=\"tab\" class=\"nav-link\">";
        // line 120
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("SEO", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</a></li>
          <li id=\"tab_step6\" class=\"nav-item\"><a href=\"#step6\" role=\"tab\" data-toggle=\"tab\" class=\"nav-link\">";
        // line 121
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Options", array(), "Admin.Global"), "html", null, true);
        echo "</a></li>
          ";
        // line 122
        if (($this->env->getExtension('PrestaShopBundle\Twig\HookExtension')->hookCount("displayAdminProductsExtra") > 0)) {
            // line 123
            echo "            <li id=\"tab_hooks\" class=\"nav-item\"><a href=\"#hooks\" role=\"tab\" data-toggle=\"tab\" class=\"nav-link\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Modules", array(), "Admin.Catalog.Feature"), "html", null, true);
            echo "</a></li>
          ";
        }
        // line 125
        echo "        </ul>
        <div class=\"arrow js-arrow right-arrow visible pull-right\">
          <i class=\"material-icons hide\">chevron_right</i>
        </div>
      </div>
      <div id=\"form_content\" class=\"tab-content\">

        ";
        // line 133
        echo "        <div role=\"tabpanel\" class=\"form-contenttab tab-pane active\" id=\"step1\">
          <div class=\"row\">
            <div class=\"col-md-12\">
              <div class=\"container-fluid\">
                <div class=\"row\">

                  ";
        // line 140
        echo "                  <div class=\"col-md-9 left-column\">

                    <div id=\"js_form_step1_inputPackItems\">
                      ";
        // line 143
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step1", array()), "inputPackItems", array()), 'errors');
        echo "
                      ";
        // line 144
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step1", array()), "inputPackItems", array()), 'widget');
        echo "
                    </div>

                    <div id=\"product-images-container\" class=\"m-b-2\">
                      <div id=\"product-images-dropzone\" class=\"panel dropzone ui-sortable col-md-12\"
                           url-upload=\"";
        // line 149
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_image_upload", array("idProduct" => ($context["id_product"] ?? null))), "html", null, true);
        echo "\"
                           url-position=\"";
        // line 150
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_image_positions");
        echo "\"
                           data-max-size=\"";
        // line 151
        echo twig_escape_filter($this->env, $this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getConfiguration("PS_LIMIT_UPLOAD_IMAGE_VALUE"), "html", null, true);
        echo "\"
                      >
                        <div id=\"product-images-dropzone-error\" class=\"text-danger\"></div>
                        <div class=\"dz-default dz-message openfilemanager\">
                            <i class=\"material-icons\">add_a_photo</i><br/>
                            ";
        // line 156
        echo twig_escape_filter($this->env, $this->getAttribute(($context["js_translatable"] ?? null), "Drop images here", array(), "array"), "html", null, true);
        echo "<br/>
                            <a>";
        // line 157
        echo twig_escape_filter($this->env, $this->getAttribute(($context["js_translatable"] ?? null), "or select files", array(), "array"), "html", null, true);
        echo "</a><br/>
                            <small>
                                ";
        // line 159
        echo twig_escape_filter($this->env, $this->getAttribute(($context["js_translatable"] ?? null), "files recommandations", array(), "array"), "html", null, true);
        echo "<br/>
                                ";
        // line 160
        echo twig_escape_filter($this->env, $this->getAttribute(($context["js_translatable"] ?? null), "files recommandations2", array(), "array"), "html", null, true);
        echo "
                            </small>
                        </div>
                        ";
        // line 163
        if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step1", array(), "any", false, true), "vars", array(), "any", false, true), "value", array(), "any", false, true), "images", array(), "any", true, true)) {
            // line 164
            echo "                            ";
            if (($context["editable"] ?? null)) {
                // line 165
                echo "                                <div class=\"dz-preview disabled openfilemanager\">
                                    <div><span>+</span></div>
                                </div>
                            ";
            }
            // line 169
            echo "                          ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step1", array()), "vars", array()), "value", array()), "images", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
                // line 170
                echo "                            <div class=\"dz-preview dz-processing dz-image-preview dz-complete ui-sortable-handle\"
                                 data-id=\"";
                // line 171
                echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "id", array()), "html", null, true);
                echo "\"
                                 url-delete=\"";
                // line 172
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_image_delete", array("idImage" => $this->getAttribute($context["image"], "id", array()))), "html", null, true);
                echo "\"
                                 url-update=\"";
                // line 173
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_image_form", array("idImage" => $this->getAttribute($context["image"], "id", array()))), "html", null, true);
                echo "\"
                            >
                              <div class=\"dz-image bg\" style=\"background-image: url('";
                // line 175
                echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "base_image_url", array()), "html", null, true);
                echo "-home_default.";
                echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "format", array()), "html", null, true);
                echo "');\"></div>
                              <div class=\"dz-details\">
                                <div class=\"dz-size\"><span data-dz-size=\"\"></span></div>
                                <div class=\"dz-filename\"><span data-dz-name=\"\"></span></div>
                              </div>
                              <div class=\"dz-progress\"><span class=\"dz-upload\" data-dz-uploadprogress=\"\" style=\"width: 100%;\"></span></div>
                              <div class=\"dz-error-message\"><span data-dz-errormessage=\"\"></span></div>
                              <div class=\"dz-success-mark\"></div>
                              <div class=\"dz-error-mark\"></div>
                              ";
                // line 184
                if ($this->getAttribute($context["image"], "cover", array())) {
                    // line 185
                    echo "                                <div class=\"iscover\">";
                    echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Cover", array(), "Admin.Catalog.Feature"), "html", null, true);
                    echo "</div>
                              ";
                }
                // line 187
                echo "                            </div>
                          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 189
            echo "                        ";
        }
        // line 190
        echo "                      </div>
                      <div id=\"product-images-form-container\" class=\"col-md-4\">
                        <div id=\"product-images-form\"></div>
                      </div>
                      <div class=\"dropzone-expander text-xs-center col-md-12\">
                        <span class=\"expand\">";
        // line 195
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("View all images", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</span>
                        <span class=\"compress\">";
        // line 196
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("View less", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</span>
                      </div>

                    </div>

                    <ul class=\"nav nav-tabs bordered\">
                      <li id=\"tab_description_short\" class=\"nav-item\"><a href=\"#description_short\" data-toggle=\"tab\" class=\"nav-link description-tab active\">";
        // line 202
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Summary", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</a></li>
                      <li id=\"tab_description\" class=\"nav-item\"><a href=\"#description\" data-toggle=\"tab\" class=\"nav-link description-tab\">";
        // line 203
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Description", array(), "Admin.Global"), "html", null, true);
        echo "</a></li>
                    </ul>

                    <div class=\"tab-content bordered\">
                      <div class=\"tab-pane panel panel-default active\" id=\"description_short\">
                        ";
        // line 208
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step1", array()), "description_short", array()), 'widget');
        echo "
                      </div>
                      <div class=\"tab-pane panel panel-default \" id=\"description\">
                        ";
        // line 211
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step1", array()), "description", array()), 'widget');
        echo "
                      </div>
                    </div>

                    ";
        // line 215
        echo $this->env->getExtension('PrestaShopBundle\Twig\HookExtension')->renderHook("displayAdminProductsMainStepLeftColumnMiddle", array("id_product" => ($context["id_product"] ?? null)));
        echo "

                    <div id=\"features\" class=\"m-b-1 m-t-1\">
                      <div id=\"features-content\" class=\"content ";
        // line 218
        echo (((twig_length_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "step1", array()), "features", array())) == 0)) ? ("hide") : (""));
        echo "\">
                        <h2>";
        // line 219
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Features", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</h2>
                        ";
        // line 220
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step1", array()), "features", array()), 'errors');
        echo "
                        <div
                          class=\"feature-collection nostyle\"
                          data-prototype=\"";
        // line 223
        echo twig_escape_filter($this->env,         $this->renderBlock("__internal_3b4fdce1d18ca46905c35a3ca81f6201cb026e7f73ad26bf172997d6e79f342f", $context, $blocks));
        // line 225
        echo "\"
                        >
                          ";
        // line 227
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step1", array()), "features", array()));
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
        foreach ($context['_seq'] as $context["_key"] => $context["feature"]) {
            // line 228
            echo "                            ";
            echo twig_include($this->env, $context, "PrestaShopBundle:Admin/Product/Include:form_feature.html.twig", array("form" => $context["feature"]));
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['feature'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 230
        echo "                        </div>
                      </div>
                      <div class=\"row\">
                        <div class=\"col-md-4\">
                          <button type=\"button\" class=\"btn btn-primary-outline sensitive add\" id=\"add_feature_button\"><i class=\"material-icons\">add_circle</i> ";
        // line 234
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Add a feature", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</button>
                        </div>
                      </div>
                    </div>

                    <div id=\"manufacturer\" class=\"m-b-1\">
                      ";
        // line 240
        echo twig_include($this->env, $context, "PrestaShopBundle:Admin/Product/Include:form_manufacturer.html.twig", array("form" => $this->getAttribute($this->getAttribute(($context["form"] ?? null), "step1", array()), "id_manufacturer", array())));
        echo "
                    </div>

                    <div id=\"related-product\" class=\"m-b-1\">
                      ";
        // line 244
        echo twig_include($this->env, $context, "PrestaShopBundle:Admin/Product/Include:form_related_products.html.twig", array("form" => $this->getAttribute($this->getAttribute(($context["form"] ?? null), "step1", array()), "related_products", array())));
        echo "
                    </div>

                    ";
        // line 247
        echo $this->env->getExtension('PrestaShopBundle\Twig\HookExtension')->renderHook("displayAdminProductsMainStepLeftColumnBottom", array("id_product" => ($context["id_product"] ?? null)));
        echo "

                  </div>

                  ";
        // line 252
        echo "                  <div class=\"col-md-3 right-column\">

                      <div class=\"row\">
                        <div class=\"col-md-12\">

                          ";
        // line 257
        if (($context["is_combination_active"] ?? null)) {
            // line 258
            echo "                            <div class=\"form-group\" id=\"show_variations_selector\">
                              <h2>
                                ";
            // line 260
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Combinations", array(), "Admin.Catalog.Feature"), "html", null, true);
            echo "
                                <span class=\"help-box\" data-toggle=\"popover\"
                                  data-content=\"";
            // line 262
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Combinations are the different variations of a product, with attributes like its size, weight or color taking different values. Does your product require combinations?", array(), "Admin.Catalog.Help"), "html", null, true);
            echo "\" ></span>
                              </h2>
                              <div class=\"radio\">
                                <label>
                                  <input type=\"radio\" name=\"show_variations\" value=\"0\" ";
            // line 266
            if ( !($context["has_combinations"] ?? null)) {
                echo "checked=\"checked\"";
            }
            echo ">
                                  ";
            // line 267
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Simple product", array(), "Admin.Catalog.Feature"), "html", null, true);
            echo "
                                </label>
                              </div>
                              <div class=\"radio\">
                                <label>
                                  <input type=\"radio\" name=\"show_variations\" value=\"1\" ";
            // line 272
            if (($context["has_combinations"] ?? null)) {
                echo "checked=\"checked\"";
            }
            echo ">
                                  ";
            // line 273
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Product with combinations", array(), "Admin.Catalog.Feature"), "html", null, true);
            echo "
                                </label>
                                <div id=\"product_type_combinations_shortcut\">
                                  <span class=\"small font-secondary\">
                                    ";
            // line 278
            echo "                                    ";
            echo twig_replace_filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Advanced settings in [1][2]Combinations[/1]", array(), "Admin.Catalog.Help"), array("[1]" => "<a href=\"#tab-step3\" onclick=\"\$('a[href=\\'#step3\\']').tab('show');\" class=\"btn sensitive p-x-0\">", "[/1]" => "</a>", "[2]" => "<i class=\"material-icons\">open_in_new</i>"));
            echo "
                                  </span>
                                </div>
                              </div>
                            </div>
                          ";
        }
        // line 284
        echo "
                          <div class=\"form-group\">
                            <h2>
                              ";
        // line 287
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Reference", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "
                              <span class=\"help-box\" data-toggle=\"popover\"
                                data-content=\"";
        // line 289
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Your reference code for this product. Allowed special characters: .-_#.", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\" ></span>
                            </h2>
                            ";
        // line 291
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step6", array()), "reference", array()), 'errors');
        echo "
                            <div class=\"row\">
                              <div class=\"col-xl-12 col-lg-12\" id=\"product_reference_field\">
                                  ";
        // line 294
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step6", array()), "reference", array()), 'widget');
        echo "
                              </div>
                            </div>
                          </div>

                          ";
        // line 299
        if ($this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getConfiguration("PS_STOCK_MANAGEMENT")) {
            // line 300
            echo "                            <div class=\"form-group\" id=\"product_qty_0_shortcut_div\">
                              <h2>
                                ";
            // line 302
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Quantity", array(), "Admin.Catalog.Feature"), "html", null, true);
            echo "
                                <span class=\"help-box\" data-toggle=\"popover\"
                                  data-content=\"";
            // line 304
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("How many products should be available for sale?", array(), "Admin.Catalog.Help"), "html", null, true);
            echo "\" ></span>
                              </h2>
                              ";
            // line 306
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step1", array()), "qty_0_shortcut", array()), 'errors');
            echo "
                              <div class=\"row\">
                                <div class=\"col-xl-6 col-lg-12\">
                                  ";
            // line 309
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step1", array()), "qty_0_shortcut", array()), 'widget');
            echo "
                                </div>
                              </div>
                              <span class=\"small font-secondary\">
                                ";
            // line 314
            echo "                                ";
            echo twig_replace_filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Advanced settings in [1][2]Quantities[/1]", array(), "Admin.Catalog.Help"), array("[1]" => "<a href=\"#tab-step3\" onclick=\"\$('a[href=\\'#step3\\']').tab('show');\" class=\"btn sensitive p-x-0\">", "[/1]" => "</a>", "[2]" => "<i class=\"material-icons\">open_in_new</i>"));
            echo "
                              </span>
                            </div>
                          ";
        }
        // line 318
        echo "
                          <div class=\"form-group\">
                            <h2>
                              ";
        // line 321
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Price", array(), "Admin.Global"), "html", null, true);
        echo "
                              <span class=\"help-box\" data-toggle=\"popover\"
                                data-content=\"";
        // line 323
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("This is the retail price at which you intend to sell this product to your customers. The tax included price will change according to the tax rule you select.", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\" ></span>
                            </h2>
                            <div class=\"row\">
                              <div class=\"col-md-6\">
                                <label class=\"form-control-label\">";
        // line 327
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Tax excluded", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</label>
                                ";
        // line 328
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step1", array()), "price_shortcut", array()), 'widget');
        echo "
                                ";
        // line 329
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step1", array()), "price_shortcut", array()), 'errors');
        echo "
                              </div>
                              <div class=\"col-md-6 col-offset-md-1\">
                                <label class=\"form-control-label\">";
        // line 332
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Tax included", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</label>
                                ";
        // line 333
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step1", array()), "price_ttc_shortcut", array()), 'widget');
        echo "
                                ";
        // line 334
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step1", array()), "price_ttc_shortcut", array()), 'errors');
        echo "
                              </div>
                              <div class=\"col-md-12 m-t-1\">
                                <label class=\"form-control-label\">";
        // line 337
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Tax rule", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</label>
                                ";
        // line 338
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->controller("PrestaShopBundle:Admin/Product:renderField", array("productId" => ($context["id_product"] ?? null), "step" => "step2", "fieldName" => "id_tax_rules_group")));
        echo "
                              </div>
                              <div class=\"col-md-12\">
                                <span class=\"small font-secondary\">
                                  ";
        // line 343
        echo "                                  ";
        echo twig_replace_filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Advanced settings in [1][2]Pricing[/1]", array(), "Admin.Catalog.Help"), array("[1]" => "<a href=\"#tab-step2\" onclick=\"\$('a[href=\\'#step2\\']').tab('show');\" class=\"btn sensitive p-x-0\">", "[/1]" => "</a>", "[2]" => "<i class=\"material-icons\">open_in_new</i>"));
        echo "
                                </span>
                              </div>
                            </div>
                            <div class=\"row hide\">
                              <div class=\"col-md-12\">
                                <label>";
        // line 349
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Tax rule", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</label>
                              </div>
                              <div class=\"clearfix\"></div>
                              <div class=\"col-md-11\" id=\"tax_rule_shortcut\">
                              </div>
                              <a href=\"#\" onclick=\"\$(this).parent().hide()\">&times;</a>
                            </div>
                          </div>

                          <div class=\"form-group\">
                            ";
        // line 359
        echo twig_include($this->env, $context, "PrestaShopBundle:Admin/Product/Include:form-categories.html.twig", array("form" => $this->getAttribute(($context["form"] ?? null), "step1", array()), "productId" => ($context["id_product"] ?? null)));
        echo "
                          </div>

                          ";
        // line 362
        echo $this->env->getExtension('PrestaShopBundle\Twig\HookExtension')->renderHook("displayAdminProductsMainStepRightColumnBottom", array("id_product" => ($context["id_product"] ?? null)));
        echo "

                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        ";
        // line 374
        echo "        <div role=\"tabpanel\" class=\"form-contenttab tab-pane\" id=\"step3\">
          <div class=\"row\">
            <div class=\"col-md-12\">
              <div class=\"container-fluid\">
                <div class=\"row\">

                  <div class=\"col-md-12\">

                    <div id=\"quantities\" style=\"";
        // line 382
        if ((($context["has_combinations"] ?? null) || ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step3", array()), "depends_on_stock", array()), "vars", array()), "value", array()) != "0"))) {
            echo "display: none;";
        }
        echo "\">
                      <h2>";
        // line 383
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Quantities", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</h2>
                      <fieldset class=\"form-group\">
                        <div class=\"row\">
                          ";
        // line 386
        if ($this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getConfiguration("PS_STOCK_MANAGEMENT")) {
            // line 387
            echo "                            <div class=\"col-md-4\">
                              <label class=\"form-control-label\">";
            // line 388
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step3", array()), "qty_0", array()), "vars", array()), "label", array()), "html", null, true);
            echo "</label>
                              ";
            // line 389
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step3", array()), "qty_0", array()), 'errors');
            echo "
                              ";
            // line 390
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step3", array()), "qty_0", array()), 'widget');
            echo "
                            </div>
                          ";
        }
        // line 393
        echo "                          <div class=\"col-md-4\">
                            <label class=\"form-control-label\">";
        // line 394
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step3", array()), "minimal_quantity", array()), "vars", array()), "label", array()), "html", null, true);
        echo "</label>
                            <span class=\"help-box\" data-toggle=\"popover\"
                                  data-content=\"";
        // line 396
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("The minimum quantity required to buy this product (set to 1 to disable this feature). E.g.: if set to 3, customers will be able to purchase the product only if they take at least 3 in quantity.", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\" ></span>
                            ";
        // line 397
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step3", array()), "minimal_quantity", array()), 'errors');
        echo "
                            ";
        // line 398
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step3", array()), "minimal_quantity", array()), 'widget');
        echo "
                          </div>
                        </div>
                      </fieldset>
                    </div>

                    <div id=\"virtual_product\" data-action=\"";
        // line 404
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_virtual_save_action", array("idProduct" => 1));
        echo "\" data-action-remove=\"";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_virtual_remove_action", array("idProduct" => 1));
        echo "\">

                      <div class=\"row\">
                        <div class=\"col-md-4\">
                          <h2>";
        // line 408
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step3", array()), "virtual_product", array()), "vars", array()), "label", array()), "html", null, true);
        echo "</h2>
                        </div>
                        <div class=\"col-md-8\">
                          <fieldset class=\"form-group\">
                            ";
        // line 412
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step3", array()), "virtual_product", array()), "is_virtual_file", array()), 'widget');
        echo "
                          </fieldset>
                        </div>
                      </div>

                      <div id=\"virtual_product_content\" class=\"row col-md-8\">
                        ";
        // line 418
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step3", array()), "virtual_product", array()), 'errors');
        echo "
                        <div class=\"col-md-12\">
                          <fieldset class=\"form-group\">
                            <label class=\"form-control-label\">";
        // line 421
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step3", array()), "virtual_product", array()), "file", array()), "vars", array()), "label", array()), "html", null, true);
        echo "</label>
                            <span class=\"help-box\" data-toggle=\"popover\"
                                  data-content=\"";
        // line 423
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Upload a file from your computer (%maxUploadSize% max.)", array("%maxUploadSize%" => ($context["max_upload_size"] ?? null)), "Admin.Catalog.Help"), "html", null, true);
        echo "\" ></span>
                            <div id=\"form_step3_virtual_product_file_input\" class=\"";
        // line 424
        echo (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step3", array(), "any", false, true), "virtual_product", array(), "any", false, true), "vars", array(), "any", false, true), "value", array(), "any", false, true), "filename", array(), "any", true, true)) ? ("hide") : ("show"));
        echo "\">
                              ";
        // line 425
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step3", array()), "virtual_product", array()), "file", array()), 'widget');
        echo "
                            </div>
                            <div id=\"form_step3_virtual_product_file_details\" class=\"";
        // line 427
        echo (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step3", array(), "any", false, true), "virtual_product", array(), "any", false, true), "vars", array(), "any", false, true), "value", array(), "any", false, true), "filename", array(), "any", true, true)) ? ("show") : ("hide"));
        echo "\">
                              <a href=\"";
        // line 428
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step3", array(), "any", false, true), "virtual_product", array(), "any", false, true), "vars", array(), "any", false, true), "value", array(), "any", false, true), "file_download_link", array(), "any", true, true)) ? ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step3", array()), "virtual_product", array()), "vars", array()), "value", array()), "file_download_link", array())) : ("")), "html", null, true);
        echo "\" class=\"btn btn-default btn-sm download\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Download file", array(), "Admin.Actions"), "html", null, true);
        echo "</a>
                              <a href=\"";
        // line 429
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_virtual_remove_file_action", array("idProduct" => ($context["id_product"] ?? null))), "html", null, true);
        echo "\" class=\"btn btn-danger btn-sm delete\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Delete this file", array(), "Admin.Actions"), "html", null, true);
        echo "</a>
                            </div>
                          </fieldset>
                        </div>
                        <div class=\"col-md-6\">
                          <fieldset class=\"form-group\">
                            <label class=\"form-control-label\">";
        // line 435
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step3", array()), "virtual_product", array()), "name", array()), "vars", array()), "label", array()), "html", null, true);
        echo "</label>
                            <span class=\"help-box\" data-toggle=\"popover\"
                                  data-content=\"";
        // line 437
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("The full filename with its extension (e.g. Book.pdf)", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\" ></span>
                            ";
        // line 438
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step3", array()), "virtual_product", array()), "name", array()), 'errors');
        echo "
                            ";
        // line 439
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step3", array()), "virtual_product", array()), "name", array()), 'widget');
        echo "
                          </fieldset>
                        </div>
                        <div class=\"col-md-6\">
                          <fieldset class=\"form-group\">
                            <label class=\"form-control-label\">";
        // line 444
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step3", array()), "virtual_product", array()), "nb_downloadable", array()), "vars", array()), "label", array()), "html", null, true);
        echo "</label>
                            <span class=\"help-box\" data-toggle=\"popover\"
                                  data-content=\"";
        // line 446
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Number of downloads allowed per customer. Set to 0 for unlimited downloads.", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\" ></span>
                            ";
        // line 447
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step3", array()), "virtual_product", array()), "nb_downloadable", array()), 'errors');
        echo "
                            ";
        // line 448
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step3", array()), "virtual_product", array()), "nb_downloadable", array()), 'widget');
        echo "
                          </fieldset>
                        </div>
                        <div class=\"col-md-6\">
                          <fieldset class=\"form-group\">
                            <label class=\"form-control-label\">";
        // line 453
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step3", array()), "virtual_product", array()), "expiration_date", array()), "vars", array()), "label", array()), "html", null, true);
        echo "</label>
                            <span class=\"help-box\" data-toggle=\"popover\"
                                  data-content=\"";
        // line 455
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("If set, the file will not be downloadable after this date. Leave blank if you do not wish to attach an expiration date.", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\" ></span>
                            ";
        // line 456
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step3", array()), "virtual_product", array()), "expiration_date", array()), 'errors');
        echo "
                            ";
        // line 457
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step3", array()), "virtual_product", array()), "expiration_date", array()), 'widget');
        echo "
                          </fieldset>
                        </div>
                        <div class=\"col-md-6\">
                          <fieldset class=\"form-group\">
                            <label class=\"form-control-label\">";
        // line 462
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step3", array()), "virtual_product", array()), "nb_days", array()), "vars", array()), "label", array()), "html", null, true);
        echo "</label>
                            <span class=\"help-box\" data-toggle=\"popover\"
                                  data-content=\"";
        // line 464
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Number of days this file can be accessed by customers. Set to zero for unlimited access.", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\" ></span>
                            ";
        // line 465
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step3", array()), "virtual_product", array()), "nb_days", array()), 'errors');
        echo "
                            ";
        // line 466
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step3", array()), "virtual_product", array()), "nb_days", array()), 'widget');
        echo "
                          </fieldset>
                        </div>
                        <div class=\"col-md-12\">
                          ";
        // line 470
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step3", array()), "virtual_product", array()), "save", array()), 'widget');
        echo "
                        </div>
                      </div>
                    </div>

                    ";
        // line 475
        if ((($context["asm_globally_activated"] ?? null) && ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step1", array()), "type_product", array()), "vars", array()), "value", array()) != "2"))) {
            // line 476
            echo "                      <div class=\"form-group\" id=\"asm_quantity_management\">
                        <label class=\"col-sm-2 control-label\" for=\"form_step3_advanced_stock_management\"></label>
                        <div class=\"col-sm-10\">
                          ";
            // line 479
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step3", array()), "advanced_stock_management", array()), 'errors');
            echo "
                          ";
            // line 480
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step3", array()), "advanced_stock_management", array()), 'widget');
            echo "
                          ";
            // line 481
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step1", array()), "type_product", array()), "vars", array()), "value", array()) == "1")) {
                // line 482
                echo "                            ";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("When enabling advanced stock management for a pack, please make sure it is also enabled for its product(s) – if you choose to decrement product quantities.", array(), "Admin.Catalog.Notification"), "html", null, true);
                echo "
                          ";
            }
            // line 484
            echo "                        </div>
                      </div>
                      <div class=\"form-group\" id=\"depends_on_stock_div\" style=\"";
            // line 486
            if ( !$this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step3", array()), "advanced_stock_management", array()), "vars", array()), "checked", array())) {
                echo "display: none;";
            }
            echo "\">
                        <label class=\"col-sm-2 control-label\" for=\"form_step3_depends_on_stock\"></label>
                        <div class=\"col-sm-10\">
                          ";
            // line 489
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step3", array()), "depends_on_stock", array()), 'errors');
            echo "
                          ";
            // line 490
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step3", array()), "depends_on_stock", array()), 'widget');
            echo "
                        </div>
                      </div>
                    ";
        }
        // line 494
        echo "                    ";
        if ($this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getConfiguration("PS_STOCK_MANAGEMENT")) {
            // line 495
            echo "                      <div id=\"pack_stock_type\">
                        <h2>";
            // line 496
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step3", array()), "pack_stock_type", array()), "vars", array()), "label", array()), "html", null, true);
            echo "</h2>
                        <div class=\"row col-md-4\">
                          <fieldset class=\"form-group\">
                            ";
            // line 499
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step3", array()), "pack_stock_type", array()), 'errors');
            echo "
                            ";
            // line 500
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step3", array()), "pack_stock_type", array()), 'widget');
            echo "
                          </fieldset>
                        </div>
                      </div>
                    ";
        }
        // line 505
        echo "                    ";
        echo twig_include($this->env, $context, "PrestaShopBundle:Admin/Product/Include:form_combinations.html.twig", array("form" => $this->getAttribute(($context["form"] ?? null), "step3", array()), "form_combination_bulk" => ($context["formCombinations"] ?? null)));
        echo "

                    ";
        // line 507
        echo $this->env->getExtension('PrestaShopBundle\Twig\HookExtension')->renderHook("displayAdminProductsQuantitiesStepBottom", array("id_product" => ($context["id_product"] ?? null)));
        echo "

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        ";
        // line 517
        echo "        <div role=\"tabpanel\" class=\"form-contenttab tab-pane\" id=\"step4\">
          <div class=\"row\">
            <div class=\"col-md-12\">
              <div class=\"container-fluid\">
                <div class=\"row\">
                  ";
        // line 522
        echo twig_include($this->env, $context, "PrestaShopBundle:Admin/Product/Include:form_shipping.html.twig", array("form" => $this->getAttribute(        // line 523
($context["form"] ?? null), "step4", array()), "asm_globally_activated" =>         // line 524
($context["asm_globally_activated"] ?? null), "isNotVirtual" => ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(        // line 525
($context["form"] ?? null), "step1", array()), "type_product", array()), "vars", array()), "value", array()) != "2"), "isChecked" => $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(        // line 526
($context["form"] ?? null), "step3", array()), "advanced_stock_management", array()), "vars", array()), "checked", array()), "warehouses" =>         // line 527
($context["warehouses"] ?? null)));
        // line 528
        echo "
                </div>
              </div>
            </div>
          </div>
        </div>

        ";
        // line 536
        echo "        <div role=\"tabpanel\" class=\"form-contenttab tab-pane\" id=\"step2\">
          <div class=\"row\">
            <div class=\"col-md-12\">
              <div class=\"container-fluid\">
                <div class=\"row\">

                  <div class=\"col-md-12\">
                    <h2>";
        // line 543
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Retail price", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "
                      <span class=\"help-box\" data-toggle=\"popover\"
                        data-content=\"";
        // line 545
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("This is the price at which you intend to sell this product to your customers. The tax included price will change according to the tax rule you select.", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\" ></span>
                    </h2>
                  </div>

                  <div class=\"col-md-12 form-group\">
                    <div class=\"row\">

                      <div class=\"col-xl-2 col-lg-3\">
                        <label class=\"form-control-label\">";
        // line 553
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step2", array()), "price", array()), "vars", array()), "label", array()), "html", null, true);
        echo "</label>
                        ";
        // line 554
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step2", array()), "price", array()), 'errors');
        echo "
                        ";
        // line 555
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step2", array()), "price", array()), 'widget');
        echo "
                      </div>
                      <div class=\"col-xl-2 col-lg-3\">
                        <label class=\"form-control-label\">";
        // line 558
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step2", array()), "price_ttc", array()), "vars", array()), "label", array()), "html", null, true);
        echo "</label>
                        ";
        // line 559
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step2", array()), "price_ttc", array()), 'errors');
        echo "
                        ";
        // line 560
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step2", array()), "price_ttc", array()), 'widget');
        echo "
                      </div>

                      <div class=\"col-xl-4 col-lg-6 col-xl-offset-1 col-lg-offset-0\">
                        <label class=\"form-control-label\">
                          ";
        // line 565
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step2", array()), "unit_price", array()), "vars", array()), "label", array()), "html", null, true);
        echo "
                          <span class=\"help-box\" data-toggle=\"popover\"
                            data-content=\"";
        // line 567
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Some products can be purchased by unit (per bottle, per pound, etc.),  and this is the price for one unit. For instance, if you’re selling fabrics, it would be the price per meter.", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\" ></span>
                        </label>
                        <div class=\"row\">
                          <div class=\"col-md-6\">
                            ";
        // line 571
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step2", array()), "unit_price", array()), 'errors');
        echo "
                            ";
        // line 572
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step2", array()), "unit_price", array()), 'widget');
        echo "
                          </div>
                          <div class=\"col-md-6\">
                            ";
        // line 575
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step2", array()), "unity", array()), 'errors');
        echo "
                            ";
        // line 576
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step2", array()), "unity", array()), 'widget');
        echo "
                          </div>
                        </div>
                      </div>
                      <div class=\"col-md-2 col-md-offset-1 ";
        // line 580
        if (($this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getConfiguration("PS_USE_ECOTAX") != 1)) {
            echo "hide";
        }
        echo "\">
                        <label class=\"form-control-label\">";
        // line 581
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step2", array()), "ecotax", array()), "vars", array()), "label", array()), "html", null, true);
        echo "</label>
                        ";
        // line 582
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step2", array()), "ecotax", array()), 'errors');
        echo "
                        ";
        // line 583
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step2", array()), "ecotax", array()), 'widget');
        echo "
                      </div>
                    </div>
                  </div>

                  <div class=\"col-md-12\">
                    <div class=\"row form-group\">
                      <div class=\"col-md-4\">
                        <label class=\"form-control-label\">";
        // line 591
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step2", array()), "id_tax_rules_group", array()), "vars", array()), "label", array()), "html", null, true);
        echo "</label>
                        ";
        // line 592
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step2", array()), "id_tax_rules_group", array()), 'errors');
        echo "
                        ";
        // line 593
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step2", array()), "id_tax_rules_group", array()), 'widget');
        echo "
                      </div>
                      <div class=\"col-md-8\">
                        <label class=\"form-control-label\">&nbsp;</label>
                        <a class=\"form-control-static external-link\" href=\"";
        // line 597
        echo twig_escape_filter($this->env, $this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getAdminLink("AdminTaxes"), "html", null, true);
        echo "\">
                          <i class=\"material-icons\">open_in_new</i> ";
        // line 598
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Manage tax rules", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "
                        </a>
                      </div>
                      <div class=\"col-md-12 p-t-1\">
                        ";
        // line 602
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step2", array()), "on_sale", array()), 'widget');
        echo "
                      </div>
                      <div class=\"col-md-12\">
                        <div class=\"row\">
                          <div class=\"col-xl-5 col-lg-12\">
                            <div class=\"alert alert-info\" role=\"alert\">
                              <i class=\"material-icons\">help</i>
                              <p class=\"alert-text\">
                                ";
        // line 610
        echo twig_replace_filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Final retail price: [1][2][/2] tax incl.[/1] / [3][/3] tax excl.", array(), "Admin.Catalog.Feature"), array("[1]" => "<strong>", "[/1]" => "</strong>", "[2]" => "<span id=\"final_retail_price_ti\">", "[/2]" => "</span>", "[3]" => "<span id=\"final_retail_price_te\">", "[/3]" => "</span>"));
        echo "
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class=\"col-md-12\">
                    <div class=\"row\">
                      <div class=\"col-md-12\">
                        <h2>
                          ";
        // line 623
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Cost price", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "
                          <span class=\"help-box\" data-toggle=\"popover\"
                            data-content=\"";
        // line 625
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("The cost price is the price you paid for the product. Do not include the tax. It should be lower than the retail price: the difference between the two will be your margin.", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\" ></span>
                        </h2>
                      </div>
                      <div class=\"col-xl-2 col-lg-3 form-group\">
                        <label class=\"form-control-label\">";
        // line 629
        echo $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step2", array()), "wholesale_price", array()), "vars", array()), "label", array());
        echo "</label>
                        ";
        // line 630
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step2", array()), "wholesale_price", array()), 'errors');
        echo "
                        ";
        // line 631
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step2", array()), "wholesale_price", array()), 'widget');
        echo "
                      </div>
                    </div>
                  </div>

                  <div class=\"col-md-12\">
                    <div class=\"row\">
                      <div class=\"col-md-12\">
                        <h2>
                          ";
        // line 640
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Specific prices", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "
                          <span class=\"help-box\" data-toggle=\"popover\"
                            data-content=\"";
        // line 642
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("You can set specific prices for customers belonging to different groups, different countries, etc.", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\" ></span>
                        </h2>
                      </div>
                      <div class=\"col-md-12\">
                        <div id=\"specific-price\" class=\"m-b-2\">
                          <a class=\"btn btn-action m-b-2\" data-toggle=\"collapse\" href=\"#specific_price_form\" aria-expanded=\"false\">
                            <i class=\"material-icons\">add_circle</i>
                            ";
        // line 649
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Add a specific price", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "
                          </a>
                          <table id=\"js-specific-price-list\" class=\"table table-striped hide seo-table\" data=\"";
        // line 651
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_specific_price_list", array("idProduct" => 1));
        echo "\" data-action-delete=\"";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_delete_specific_price", array("idSpecificPrice" => 1));
        echo "\">
                            <thead>
                            <tr>
                              <th>";
        // line 654
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Rule", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</th>
                              <th>";
        // line 655
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Combination", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</th>
                              <th>";
        // line 656
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Currency", array(), "Admin.Global"), "html", null, true);
        echo "</th>
                              <th>";
        // line 657
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Country", array(), "Admin.Global"), "html", null, true);
        echo "</th>
                              <th>";
        // line 658
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Group", array(), "Admin.Global"), "html", null, true);
        echo "</th>
                              <th>";
        // line 659
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Customer", array(), "Admin.Global"), "html", null, true);
        echo "</th>
                              <th>";
        // line 660
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Fixed price", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</th>
                              <th>";
        // line 661
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Impact", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</th>
                              <th>";
        // line 662
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Period", array(), "Admin.Global"), "html", null, true);
        echo "</th>
                              <th>";
        // line 663
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("From", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</th>
                              <th></th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                          </table>
                        </div>
                        <div class=\"collapse\" id=\"specific_price_form\" data-action=\"";
        // line 670
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_specific_price_add");
        echo "\">
                          ";
        // line 671
        echo twig_include($this->env, $context, "PrestaShopBundle:Admin:Product/Include/form-specific-price.html.twig", array("form" => $this->getAttribute($this->getAttribute(($context["form"] ?? null), "step2", array()), "specific_price", array()), "is_multishop_context" => ($context["is_multishop_context"] ?? null)));
        echo "
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class=\"col-md-12\">
                    <div class=\"row\">
                      <div class=\"col-md-12\">
                        <h2>
                          ";
        // line 681
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Priority management", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "
                          <span class=\"help-box\" data-toggle=\"popover\"
                            data-content=\"";
        // line 683
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Sometimes one customer can fit into multiple price rules. Priorities allow you to define which rules apply first.", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\" ></span>
                        </h2>
                      </div>
                      <div class=\"col-md-3\">
                        <fieldset class=\"form-group\">
                          <label>";
        // line 688
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Priorities", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</label>
                          ";
        // line 689
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step2", array()), "specificPricePriority_0", array()), 'errors');
        echo "
                          ";
        // line 690
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step2", array()), "specificPricePriority_0", array()), 'widget');
        echo "
                        </fieldset>
                      </div>
                      <div class=\"col-md-3\">
                        <fieldset class=\"form-group\">
                          <label>&nbsp;</label>
                          ";
        // line 696
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step2", array()), "specificPricePriority_1", array()), 'errors');
        echo "
                          ";
        // line 697
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step2", array()), "specificPricePriority_1", array()), 'widget');
        echo "
                        </fieldset>
                      </div>
                      <div class=\"col-md-3\">
                        <fieldset class=\"form-group\">
                          <label>&nbsp;</label>
                          ";
        // line 703
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step2", array()), "specificPricePriority_2", array()), 'errors');
        echo "
                          ";
        // line 704
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step2", array()), "specificPricePriority_2", array()), 'widget');
        echo "
                        </fieldset>
                      </div>
                      <div class=\"col-md-3\">
                        <fieldset class=\"form-group\">
                          <label>&nbsp;</label>
                          ";
        // line 710
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step2", array()), "specificPricePriority_3", array()), 'errors');
        echo "
                          ";
        // line 711
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step2", array()), "specificPricePriority_3", array()), 'widget');
        echo "
                        </fieldset>
                      </div>
                      <div class=\"col-md-12\">
                        ";
        // line 715
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step2", array()), "specificPricePriorityToAll", array()), 'widget');
        echo "
                      </div>
                    </div>
                  </div>

                  ";
        // line 720
        echo $this->env->getExtension('PrestaShopBundle\Twig\HookExtension')->renderHook("displayAdminProductsPriceStepBottom", array("id_product" => ($context["id_product"] ?? null)));
        echo "

                </div>
              </div>
            </div>
          </div>
        </div>

        ";
        // line 729
        echo "        <div role=\"tabpanel\" class=\"form-contenttab tab-pane\" id=\"step5\">
          <div class=\"row\">
            <div class=\"col-md-12\">
              <div class=\"container-fluid\">
                <div class=\"row\">

                  ";
        // line 735
        echo twig_include($this->env, $context, "PrestaShopBundle:Admin/Product/Include:form_seo.html.twig", array("form" => $this->getAttribute(($context["form"] ?? null), "step5", array())));
        echo "

                </div>
              </div>
            </div>
          </div>
        </div>

        ";
        // line 744
        echo "        <div role=\"tabpanel\" class=\"form-contenttab tab-pane\" id=\"step6\">
          <div class=\"row\">
            <div class=\"col-md-12\">
              <div class=\"container-fluid\">
                <div class=\"row\">

                  <div class=\"col-md-12\">

                    ";
        // line 752
        echo $this->env->getExtension('PrestaShopBundle\Twig\HookExtension')->renderHook("displayAdminProductsOptionsStepTop", array("id_product" => ($context["id_product"] ?? null)));
        echo "

                    <div class=\"row\">
                      <div class=\"col-md-12\">
                        <h2>";
        // line 756
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Visibility", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</h2>
                        <p class=\"subtitle\">";
        // line 757
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Where do you want your product to appear?", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</p>
                      </div>
                    </div>

                    <div class=\"row\">
                      <div class=\"col-md-4 form-group\">
                        ";
        // line 763
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step6", array()), "visibility", array()), 'errors');
        echo "
                        ";
        // line 764
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step6", array()), "visibility", array()), 'widget');
        echo "
                      </div>
                    </div>

                    <div class=\"row\">
                      <div class=\"col-md-7 form-group\">
                          ";
        // line 770
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step6", array()), "display_options", array()), 'errors');
        echo "
                          <div class=\"row\">
                            <div class=\"col-md-4 js-available-for-order\">
                              ";
        // line 773
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step6", array()), "display_options", array()), "available_for_order", array()), 'widget');
        echo "
                            </div>
                            <div class=\"col-md-3 js-show-price\">
                              ";
        // line 776
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step6", array()), "display_options", array()), "show_price", array()), 'widget');
        echo "
                            </div>
                            <div class=\"col-md-5\">
                              ";
        // line 779
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step6", array()), "display_options", array()), "online_only", array()), 'widget');
        echo "
                            </div>
                          </div>
                      </div>
                    </div>
                    <div class=\"row form-group\">
                      <div class=\"col-md-8\">
                        <label class=\"form-control-label\">";
        // line 786
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Tags", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</label>
                        ";
        // line 787
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step6", array()), "tags", array()), 'errors');
        echo "
                        ";
        // line 788
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step6", array()), "tags", array()), 'widget');
        echo "
                        <div class=\"alert alert-info alert-drop m-t-1\" role=\"alert\">
                          <i class=\"material-icons\">help</i>
                          <p class=\"alert-text\" data-title=\"";
        // line 791
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Read more", array(), "Admin.Actions");
        echo "\">
                            ";
        // line 792
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Tags are meant to help your customers find your products via the search bar.", array(), "Admin.Catalog.Help");
        echo "
                            <strong>";
        // line 793
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Read more", array(), "Admin.Actions");
        echo "</strong>
                          </p>
                        </div>
                        <div class=\"alert alert-info alert-down\" role=\"alert\">
                          <p class=\"alert-down-text\">
                            ";
        // line 798
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Choose terms and keywords that your customers will use to search for this product and make sure you are consistent with the tags you may have already used.", array(), "Admin.Catalog.Help");
        echo "<br>
                            ";
        // line 799
        echo twig_replace_filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("You can manage tag aliases in the [1]Search section[/1]. If you add new tags, you have to rebuild the index.", array(), "Admin.Catalog.Help"), array("[1]" => (("<a href=\"" . $this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getAdminLink("AdminSearchConf")) . "\" target=\"_blank\">"), "[/1]" => "</a>"));
        // line 804
        echo "
                          </p>
                        </div>
                      </div>
                    </div>

                    <div class=\"row\">
                      <div class=\"col-md-12\">
                        <h2>";
        // line 812
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Condition & References", array(), "Admin.Catalog.Feature");
        echo "</h2>
                      </div>
                    </div>

                    <div class=\"row\">
                      <fieldset class=\"col-md-4 form-group\">
                        <label class=\"form-control-label\">
                          ";
        // line 819
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step6", array()), "condition", array()), "vars", array()), "label", array()), "html", null, true);
        echo "
                          <span class=\"help-box\" data-toggle=\"popover\"
                            data-content=\"";
        // line 821
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Not all shops sell new products. This option enables you to indicate the condition of the product. It can be required on some marketplaces.", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\" ></span>
                        </label>
                        ";
        // line 823
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step6", array()), "condition", array()), 'errors');
        echo "
                        ";
        // line 824
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step6", array()), "condition", array()), 'widget');
        echo "
                      </fieldset>
                      <fieldset class=\"col-md-4 form-group\">
                        <label class=\"form-control-label\">&nbsp;</label>
                        ";
        // line 828
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step6", array()), "show_condition", array()), 'widget');
        echo "
                      </fieldset>
                    </div>
                    <div class=\"row\">
                      <fieldset class=\"col-md-4 form-group\">
                        <label class=\"form-control-label\">
                          ";
        // line 834
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step6", array()), "isbn", array()), "vars", array()), "label", array()), "html", null, true);
        echo "
                          <span class=\"help-box\" data-toggle=\"popover\"
                            data-content=\"";
        // line 836
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("ISBN is used internationally to identify books and their various editions.", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\" ></span>
                        </label>
                        ";
        // line 838
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step6", array()), "isbn", array()), 'errors');
        echo "
                        ";
        // line 839
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step6", array()), "isbn", array()), 'widget');
        echo "
                      </fieldset>
                      <fieldset class=\"col-md-4 form-group\">
                        <label class=\"form-control-label\">
                          ";
        // line 843
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step6", array()), "ean13", array()), "vars", array()), "label", array()), "html", null, true);
        echo "
                          <span class=\"help-box\" data-toggle=\"popover\"
                            data-content=\"";
        // line 845
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("This type of product code is specific to Europe and Japan, but is widely used internationally. It is a superset of the UPC code: all products marked with an EAN will be accepted in North America.", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\" ></span>
                        </label>
                        ";
        // line 847
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step6", array()), "ean13", array()), 'errors');
        echo "
                        ";
        // line 848
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step6", array()), "ean13", array()), 'widget');
        echo "
                      </fieldset>
                    </div>
                    <div class=\"row\">
                      <fieldset class=\"col-md-4 form-group\">
                        <label class=\"form-control-label\">
                          ";
        // line 854
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step6", array()), "upc", array()), "vars", array()), "label", array()), "html", null, true);
        echo "
                          <span class=\"help-box\" data-toggle=\"popover\"
                            data-content=\"";
        // line 856
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("This type of product code is widely used in the United States, Canada, the United Kingdom, Australia, New Zealand and in other countries.", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\" ></span>
                        </label>
                        ";
        // line 858
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step6", array()), "upc", array()), 'errors');
        echo "
                        ";
        // line 859
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step6", array()), "upc", array()), 'widget');
        echo "
                      </fieldset>
                    </div>

                    <div class=\"row\">
                      <div class=\"col-md-12\">
                        <div id=\"custom_fields\" class=\"m-b-2\">
                          <h2>";
        // line 866
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step6", array()), "custom_fields", array()), "vars", array()), "label", array()), "html", null, true);
        echo "</h2>
                          <p class=\"subtitle\">";
        // line 867
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Customers can personalize the product by entering some text or by providing custom image files.", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</p>
                          ";
        // line 868
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step6", array()), "custom_fields", array()), 'errors');
        echo "
                          <ul class=\"customFieldCollection nostyle\" data-prototype=\"
                                      ";
        // line 870
        echo twig_escape_filter($this->env,         $this->renderBlock("__internal_d1b62579fc3e9b5e801e24ec2aa4164445667c2b0c0e089d70dee53616188b58", $context, $blocks));
        // line 872
        echo "\">
                            ";
        // line 873
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step6", array()), "custom_fields", array()));
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
        foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
            // line 874
            echo "                              <li>
                                ";
            // line 875
            echo twig_include($this->env, $context, "PrestaShopBundle:Admin/Product/Include:form_custom_fields.html.twig", array("form" => $context["field"]));
            echo "
                              </li>
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 878
        echo "                          </ul>
                          <a href=\"#\" class=\"btn btn-action add\">
                            <i class=\"material-icons\">add_circle</i>
                            ";
        // line 881
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Add a customization field", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "
                          </a>
                        </div>
                      </div>
                    </div>

                    <div class=\"row\">
                      <div class=\"col-md-8\">
                        <h2>";
        // line 889
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Attached files", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</h2>
                        <p class=\"subtitle\">";
        // line 890
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Add files that customers can download directly on the product page (instructions, manual, recipe, etc.).", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</p>
                        ";
        // line 891
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step6", array()), "attachments", array()), 'widget');
        echo "
                      </div>
                    </div>
                    <div class=\"row\">
                      <div class=\"col-md-8\">
                        <a
                          class=\"btn btn-action add m-b-1\"
                          href=\"#collapsedForm\"
                          data-toggle=\"collapse\"
                          aria-expanded=\"false\"
                          aria-controls=\"collapsedForm\"
                        >
                          <i class=\"material-icons\">add_circle</i>
                          ";
        // line 904
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Attach a new file", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "
                        </a>
                        <fieldset class=\"form-group collapse\" id=\"collapsedForm\">
                          ";
        // line 907
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step6", array()), "attachment_product", array()), 'errors');
        echo "
                          <div id=\"form_step6_attachment_product\" data-action=\"";
        // line 908
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step6", array()), "attachment_product", array()), "vars", array()), "attr", array()), "data-action", array(), "array"), "html", null, true);
        echo "\">
                            <div class=\"form-group\">";
        // line 909
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step6", array()), "attachment_product", array()), "file", array()), 'widget');
        echo "</div>
                            <div class=\"form-group\">";
        // line 910
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step6", array()), "attachment_product", array()), "name", array()), 'widget');
        echo "</div>
                            <div class=\"form-group\">";
        // line 911
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step6", array()), "attachment_product", array()), "description", array()), 'widget');
        echo "</div>
                            <div class=\"form-group\">
                              ";
        // line 913
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step6", array()), "attachment_product", array()), "add", array()), 'widget');
        echo "
                              ";
        // line 914
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step6", array()), "attachment_product", array()), "cancel", array()), 'widget');
        echo "
                            </div>
                          </div>
                        </fieldset>
                      </div>
                    </div>

                    <div class=\"row\">
                      <div class=\"col-md-8\" id=\"supplier_collection\">
                        ";
        // line 923
        echo twig_include($this->env, $context, "PrestaShopBundle:Admin:Product/Include/form-supplier-choice.html.twig", array("form" => $this->getAttribute(($context["form"] ?? null), "step6", array())));
        echo "
                      </div>
                    </div>
                    <div class=\"row\">
                      <div id=\"supplier_combination_collection\" class=\"col-md-12\" data-url=\"";
        // line 927
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_supplier_refresh_product_supplier_combination_form", array("idProduct" => 1, "supplierIds" => 1)), "html", null, true);
        echo "\">
                        ";
        // line 928
        echo twig_include($this->env, $context, "PrestaShopBundle:Admin:Product/Include/form-supplier-combination.html.twig", array("suppliers" => $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step6", array()), "suppliers", array()), "vars", array()), "value", array()), "form" => $this->getAttribute(($context["form"] ?? null), "step6", array())));
        echo "
                      </div>
                    </div>

                    ";
        // line 932
        echo $this->env->getExtension('PrestaShopBundle\Twig\HookExtension')->renderHook("displayAdminProductsOptionsStepBottom", array("id_product" => ($context["id_product"] ?? null)));
        echo "

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        ";
        // line 942
        echo "        ";
        if (($this->env->getExtension('PrestaShopBundle\Twig\HookExtension')->hookCount("displayAdminProductsExtra") > 0)) {
            // line 943
            echo "          <div role=\"tabpanel\" class=\"form-contenttab tab-pane\" id=\"hooks\">
            <div class=\"row\">
              <div class=\"col-md-12\">
                <div class=\"container-fluid\">
                  <div class=\"row\">

                    ";
            // line 950
            echo "                    <div class=\"col-md-12\">
                      ";
            // line 951
            $context["hooks"] = $this->env->getExtension('PrestaShopBundle\Twig\HookExtension')->renderHooksArray("displayAdminProductsExtra", array("id_product" => ($context["id_product"] ?? null)));
            // line 952
            echo "
                      <div class=\"row module-selection\" style=\"display: none;\">
                        <div class=\"col-md-12 col-lg-7\">
                          ";
            // line 955
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["hooks"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
                // line 956
                echo "                            <div class=\"module-render-container module-";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["module"], "attributes", array()), "name", array()), "html", null, true);
                echo "\">
                              <div>
                                <img class=\"top-logo\" src=\"";
                // line 958
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["module"], "attributes", array()), "img", array()), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["module"], "attributes", array()), "displayName", array()), "html", null, true);
                echo "\">
                                <h2 class=\"text-ellipsis module-name-grid\">
                                  ";
                // line 960
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["module"], "attributes", array()), "displayName", array()), "html", null, true);
                echo "
                                </h2>
                                <div class=\"text-ellipsis xsmall module-version\">
                                  ";
                // line 963
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["module"], "attributes", array()), "version", array()), "html", null, true);
                echo " by ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["module"], "attributes", array()), "author", array()), "html", null, true);
                echo "
                                </div>
                              </div>
                              <div class=\"small no-padding\">
                                ";
                // line 967
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["module"], "attributes", array()), "description", array()), "html", null, true);
                echo "
                              </div>
                            </div>
                          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 971
            echo "                        </div>
                        <div class=\"col-md-12 col-lg-5\">
                          <h2>";
            // line 973
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Module to configure", array(), "Admin.Catalog.Feature"), "html", null, true);
            echo "</h2>
                          <select class=\"modules-list-select\" data-toggle=\"select2\">
                            ";
            // line 975
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["hooks"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
                // line 976
                echo "                              <option value=\"module-";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["module"], "attributes", array()), "name", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["module"], "attributes", array()), "displayName", array()), "html", null, true);
                echo "</option>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 978
            echo "                          </select>
                        </div>
                      </div>

                      <div class=\"module-render-container all-modules\">
                        <p>
                          <h2>";
            // line 984
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Choose a module to configure", array(), "Admin.Catalog.Feature"), "html", null, true);
            echo "</h2>
                          ";
            // line 985
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("These modules are relative to the product page of your shop.", array(), "Admin.Catalog.Feature"), "html", null, true);
            echo "<br />
                          ";
            // line 986
            echo twig_replace_filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("To manage all your modules go to the [1]Installed module page[/1]", array(), "Admin.Catalog.Feature"), array("[1]" => (("<a href=\"" . $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_module_manage")) . "\">"), "[/1]" => "</a>"));
            echo "
                        </p>
                        <div class=\"row\">
                          ";
            // line 989
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["hooks"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
                // line 990
                echo "                            <div class=\"col-md-12 col-lg-6 col-xl-4\">
                              <div class=\"module-item-wrapper-grid\">
                                <div class=\"module-item-heading-grid\">
                                  <img class=\"module-logo-thumb-grid\" src=\"";
                // line 993
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["module"], "attributes", array()), "img", array()), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["module"], "attributes", array()), "displayName", array()), "html", null, true);
                echo "\">
                                  <h3 class=\"text-ellipsis module-name-grid\">
                                    ";
                // line 995
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["module"], "attributes", array()), "displayName", array()), "html", null, true);
                echo "
                                  </h3>
                                  <div class=\"text-ellipsis xsmall module-version-author-grid\">
                                    ";
                // line 998
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["module"], "attributes", array()), "version", array()), "html", null, true);
                echo " by ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["module"], "attributes", array()), "author", array()), "html", null, true);
                echo "
                                  </div>
                                </div>
                                <div class=\"module-quick-description-grid small no-padding\">
                                  ";
                // line 1002
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["module"], "attributes", array()), "description", array()), "html", null, true);
                echo "
                                </div>
                                <div class=\"module-container\">
                                  <div class=\"module-quick-action-grid clearfix\">
                                    <button class=\"modules-list-button btn btn-primary-outline pull-xs-right\" data-target=\"module-";
                // line 1006
                echo twig_escape_filter($this->env, $this->getAttribute($context["module"], "id", array()), "html", null, true);
                echo "\">
                                      ";
                // line 1007
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Configure", array(), "Admin.Actions"), "html", null, true);
                echo "
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 1014
            echo "                        </div>
                      </div>

                      ";
            // line 1017
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["hooks"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
                // line 1018
                echo "                        <div
                          id=\"module_";
                // line 1019
                echo twig_escape_filter($this->env, $this->getAttribute($context["module"], "id", array()), "html", null, true);
                echo "\"
                          class=\"module-render-container module-";
                // line 1020
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["module"], "attributes", array()), "name", array()), "html", null, true);
                echo "\"
                          style=\"display: none;\"
                        >
                          <div>
                            ";
                // line 1024
                echo $this->getAttribute($context["module"], "content", array());
                echo "
                          </div>
                        </div>
                      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 1028
            echo "                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        ";
        }
        // line 1036
        echo "
      </div>

      ";
        // line 1039
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "id_product", array()), 'widget');
        echo "
      ";
        // line 1040
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "_token", array()), 'widget');
        echo "

    </div>
    ";
        // line 1044
        echo "    <div class=\"product-footer\">
      <div class=\"col-lg-5\">
        <a
          href=\"";
        // line 1047
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_unit_action", array("action" => "delete", "id" => ($context["id_product"] ?? null))), "html", null, true);
        echo "\"
          class=\"btn btn-invisible btn-lg delete\"
          data-toggle=\"tooltip\"
          id=\"product_form_delete_btn\"
          title=\"";
        // line 1051
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Permanently delete this product.", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\"
        >
          <i class=\"material-icons\">delete</i>
        </a>
        <a
          data-redirect=\"";
        // line 1056
        echo twig_escape_filter($this->env, ($context["preview_link"] ?? null), "html", null, true);
        echo "\"
          data-url_deactive=\"";
        // line 1057
        echo twig_escape_filter($this->env, ($context["preview_link_deactivate"] ?? null), "html", null, true);
        echo "\"
          target=\"_blank\"
          class=\"btn btn-tertiary btn-submit preview\"
          data-toggle=\"tooltip\"
          id=\"product_form_preview_btn\"
          title=\"";
        // line 1062
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("See how your product sheet will look online: ALT+SHIFT+V", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\"
         >
          ";
        // line 1064
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Preview", array(), "Admin.Actions"), "html", null, true);
        echo "
        </a>
        ";
        // line 1066
        if (($context["editable"] ?? null)) {
            // line 1067
            echo "        <h2 class=\"for-switch online-title\" ";
            if ( !$this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step1", array()), "vars", array()), "value", array()), "active", array())) {
                echo "style=\"display:none;\"";
            }
            echo " data-toggle=\"tooltip\"
            title=\"";
            // line 1068
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Enable or disable the product on your shop: ALT+SHIFT+O", array(), "Admin.Catalog.Help"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Online", array(), "Admin.Global"), "html", null, true);
            echo "</h2>
        <h2 class=\"for-switch offline-title\" ";
            // line 1069
            if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step1", array()), "vars", array()), "value", array()), "active", array())) {
                echo "style=\"display:none;\"";
            }
            echo " data-toggle=\"tooltip\"
            title=\"";
            // line 1070
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Enable or disable the product on your shop: ALT+SHIFT+O", array(), "Admin.Catalog.Help"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Offline", array(), "Admin.Global"), "html", null, true);
            echo "</h2>
        <input
          id=\"form_step1_active\"
          data-toggle=\"switch\"
          type=\"checkbox\"
          name=\"form[step1][active]\"
          value=\"1\"
          ";
            // line 1077
            echo (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step1", array()), "vars", array()), "value", array()), "active", array())) ? ("checked=\"checked\"") : (""));
            echo "
        />
        ";
        }
        // line 1080
        echo "      </div>
      <div class=\"col-lg-6 text-lg-right\">
        ";
        // line 1082
        if (($context["is_shop_context"] ?? null)) {
            // line 1083
            echo "          <button
            type=\"button\"
            class=\"btn btn-tertiary-outline btn-submit hidden-xs uppercase duplicate\"
            id=\"product_form_save_duplicate_btn\"
            data-redirect=\"";
            // line 1087
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_unit_action", array("action" => "duplicate", "id" => ($context["id_product"] ?? null))), "html", null, true);
            echo "\"
            data-toggle=\"tooltip\"
            title=\"";
            // line 1089
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save and duplicate this product, then go to the new product: ALT+SHIFT+D", array(), "Admin.Catalog.Help"), "html", null, true);
            echo "\"
            >
            ";
            // line 1091
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Duplicate", array(), "Admin.Actions");
            echo "
          </button>
        ";
        }
        // line 1094
        echo "        <button
          type=\"button\"
          class=\"btn btn-tertiary-outline btn-submit hidden-xs uppercase go-catalog\"
          id=\"product_form_save_go_to_catalog_btn\"
          data-redirect=\"";
        // line 1098
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_catalog", array("offset" => "last", "limit" => "last")), "html", null, true);
        echo "\"
          data-toggle=\"tooltip\"
          title=\"";
        // line 1100
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save and go back to the catalog: ALT+SHIFT+Q", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\"
          >
          ";
        // line 1102
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Go to catalog", array(), "Admin.Catalog.Feature");
        echo "
        </button>
        <button
          type=\"button\"
          class=\"btn btn-tertiary-outline btn-submit hidden-xs uppercase new-product\"
          id=\"product_form_save_new_btn\"
          data-redirect=\"";
        // line 1108
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_new");
        echo "\"
          data-toggle=\"tooltip\"
          title=\"";
        // line 1110
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save and create a new product: ALT+SHIFT+P", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\"
          >
          ";
        // line 1112
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Add new product", array(), "Admin.Catalog.Feature");
        echo "
        </button>
        <input
          id=\"submit\"
          type=\"submit\"
          class=\"btn btn-primary save uppercase\"
          value=\"";
        // line 1118
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save", array(), "Admin.Actions"), "html", null, true);
        echo "\"
          data-toggle=\"tooltip\"
          title=\"";
        // line 1120
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save the product and stay on the current page: ALT+SHIFT+S", array(), "Admin.Catalog.Help"), "html", null, true);
        echo "\"
          />

          <div class=\"btn-group hide dropdown pull-right\">
            <div class=\"js-spinner spinner hide btn-primary-reverse onclick pull-left m-r-1\"></div>
            <button
             class=\"btn btn-primary js-btn-save\"
             type=\"submit\"
             >
              <span>";
        // line 1129
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save", array(), "Admin.Actions"), "html", null, true);
        echo "</span>
            </button>
            <button
              class=\"btn btn-primary dropdown-toggle\"
              type=\"button\"
              id=\"dropdownMenu\"
              data-toggle=\"dropdown\"
              aria-expanded=\"false\"
            >

            </button>
            <div class=\"dropdown-menu\" aria-labelledby=\"dropdownMenu\">
              ";
        // line 1141
        if (($context["is_shop_context"] ?? null)) {
            // line 1142
            echo "                <a
                 class=\"dropdown-item duplicate js-btn-save\"
                 href=\"";
            // line 1144
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_unit_action", array("action" => "duplicate", "id" => ($context["id_product"] ?? null))), "html", null, true);
            echo "\"
                >
                ";
            // line 1146
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Duplicate", array(), "Admin.Actions");
            echo "
                </a>
              ";
        }
        // line 1149
        echo "             <a
              class=\"dropdown-item go-catalog js-btn-save\"
              href=\"";
        // line 1151
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_catalog", array("offset" => "last", "limit" => "last")), "html", null, true);
        echo "\"
              >
              ";
        // line 1153
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Go to catalog", array(), "Admin.Catalog.Feature");
        echo "
             </a>
             <a
              class=\"dropdown-item new-product js-btn-save\"
              href=\"";
        // line 1157
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_new");
        echo "\"
              >
              ";
        // line 1159
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Add new product", array(), "Admin.Catalog.Feature");
        echo "
            </a>
          </div>
        </div>
      </div>
    </div>
    ";
        // line 1165
        if ( !($context["editable"] ?? null)) {
            echo " </fieldset> ";
        }
        // line 1166
        echo "  </form>


  ";
        // line 1169
        $this->loadTemplate("PrestaShopBundle:Admin\\Product:form.html.twig", "PrestaShopBundle:Admin\\Product:form.html.twig", 1169, "2072200634")->display(array_merge($context, array("id" => "confirmation_modal", "title" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Warning", array(), "Admin.Notifications.Warning"), "closable" => false, "actions" => array(0 => array("type" => "button", "label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("No", array(), "Admin.Global"), "class" => "btn btn-tertiary-outline btn-lg cancel"), 1 => array("type" => "button", "label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Yes", array(), "Admin.Global"), "class" => "btn btn-primary btn-lg continue")))));
        // line 1190
        echo "
";
    }

    // line 223
    public function block___internal_3b4fdce1d18ca46905c35a3ca81f6201cb026e7f73ad26bf172997d6e79f342f($context, array $blocks = array())
    {
        // line 224
        echo "                            ";
        echo twig_include($this->env, $context, "PrestaShopBundle:Admin/Product/Include:form_feature.html.twig", array("form" => $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step1", array()), "features", array()), "vars", array()), "prototype", array())));
        echo "
                          ";
    }

    // line 870
    public function block___internal_d1b62579fc3e9b5e801e24ec2aa4164445667c2b0c0e089d70dee53616188b58($context, array $blocks = array())
    {
        // line 871
        echo "                                      ";
        echo twig_include($this->env, $context, "PrestaShopBundle:Admin/Product/Include:form_custom_fields.html.twig", array("form" => $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "step6", array()), "custom_fields", array()), "vars", array()), "prototype", array())));
        echo "
                                      ";
    }

    // line 1193
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 1194
        echo "  ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
";
    }

    // line 1197
    public function block_javascripts($context, array $blocks = array())
    {
        // line 1198
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
  <script src=\"";
        // line 1199
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/product/form.js"), "html", null, true);
        echo "\"></script>

  <script src=\"";
        // line 1201
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/product/product-manufacturer.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 1202
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/product/product-related.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 1203
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/product/product-category-tags.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 1204
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/product/default-category.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 1205
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/product/product-combinations.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 1206
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/category-tree.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 1207
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/module/module_card.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 1208
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/modal-confirmation.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 1209
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("../js/tiny_mce/tiny_mce.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 1210
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("../js/admin/tinymce.inc.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 1211
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("../js/admin/tinymce_loader.js"), "html", null, true);
        echo "\"></script>

  <script>
      \$(function() {
        var editable = '";
        // line 1215
        echo twig_escape_filter($this->env, ($context["editable"] ?? null), "html", null, true);
        echo "';

        if (editable !== '1'){
          \$('#field-disabled').find(\"select\").each(function() {
            \$(this).removeClass('select2-hidden-accessible');
          });
          \$('#field-disabled').find(\"span.select2\").each(function() {
            \$(this).hide();
          });
          \$('#field-disabled').find(\"a.pstaggerClosingCross\").each(function() {
            \$(this).attr(\"disabled\", \"disabled\").on(\"click\", function() {
              return false;
            });
          });
        }
      });
  </script>
";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin\\Product:form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  2434 => 1215,  2427 => 1211,  2423 => 1210,  2419 => 1209,  2415 => 1208,  2411 => 1207,  2407 => 1206,  2403 => 1205,  2399 => 1204,  2395 => 1203,  2391 => 1202,  2387 => 1201,  2382 => 1199,  2377 => 1198,  2374 => 1197,  2367 => 1194,  2364 => 1193,  2357 => 871,  2354 => 870,  2347 => 224,  2344 => 223,  2339 => 1190,  2337 => 1169,  2332 => 1166,  2328 => 1165,  2319 => 1159,  2314 => 1157,  2307 => 1153,  2302 => 1151,  2298 => 1149,  2292 => 1146,  2287 => 1144,  2283 => 1142,  2281 => 1141,  2266 => 1129,  2254 => 1120,  2249 => 1118,  2240 => 1112,  2235 => 1110,  2230 => 1108,  2221 => 1102,  2216 => 1100,  2211 => 1098,  2205 => 1094,  2199 => 1091,  2194 => 1089,  2189 => 1087,  2183 => 1083,  2181 => 1082,  2177 => 1080,  2171 => 1077,  2159 => 1070,  2153 => 1069,  2147 => 1068,  2140 => 1067,  2138 => 1066,  2133 => 1064,  2128 => 1062,  2120 => 1057,  2116 => 1056,  2108 => 1051,  2101 => 1047,  2096 => 1044,  2090 => 1040,  2086 => 1039,  2081 => 1036,  2071 => 1028,  2061 => 1024,  2054 => 1020,  2050 => 1019,  2047 => 1018,  2043 => 1017,  2038 => 1014,  2025 => 1007,  2021 => 1006,  2014 => 1002,  2005 => 998,  1999 => 995,  1992 => 993,  1987 => 990,  1983 => 989,  1977 => 986,  1973 => 985,  1969 => 984,  1961 => 978,  1950 => 976,  1946 => 975,  1941 => 973,  1937 => 971,  1927 => 967,  1918 => 963,  1912 => 960,  1905 => 958,  1899 => 956,  1895 => 955,  1890 => 952,  1888 => 951,  1885 => 950,  1877 => 943,  1874 => 942,  1862 => 932,  1855 => 928,  1851 => 927,  1844 => 923,  1832 => 914,  1828 => 913,  1823 => 911,  1819 => 910,  1815 => 909,  1811 => 908,  1807 => 907,  1801 => 904,  1785 => 891,  1781 => 890,  1777 => 889,  1766 => 881,  1761 => 878,  1744 => 875,  1741 => 874,  1724 => 873,  1721 => 872,  1719 => 870,  1714 => 868,  1710 => 867,  1706 => 866,  1696 => 859,  1692 => 858,  1687 => 856,  1682 => 854,  1673 => 848,  1669 => 847,  1664 => 845,  1659 => 843,  1652 => 839,  1648 => 838,  1643 => 836,  1638 => 834,  1629 => 828,  1622 => 824,  1618 => 823,  1613 => 821,  1608 => 819,  1598 => 812,  1588 => 804,  1586 => 799,  1582 => 798,  1574 => 793,  1570 => 792,  1566 => 791,  1560 => 788,  1556 => 787,  1552 => 786,  1542 => 779,  1536 => 776,  1530 => 773,  1524 => 770,  1515 => 764,  1511 => 763,  1502 => 757,  1498 => 756,  1491 => 752,  1481 => 744,  1470 => 735,  1462 => 729,  1451 => 720,  1443 => 715,  1436 => 711,  1432 => 710,  1423 => 704,  1419 => 703,  1410 => 697,  1406 => 696,  1397 => 690,  1393 => 689,  1389 => 688,  1381 => 683,  1376 => 681,  1363 => 671,  1359 => 670,  1349 => 663,  1345 => 662,  1341 => 661,  1337 => 660,  1333 => 659,  1329 => 658,  1325 => 657,  1321 => 656,  1317 => 655,  1313 => 654,  1305 => 651,  1300 => 649,  1290 => 642,  1285 => 640,  1273 => 631,  1269 => 630,  1265 => 629,  1258 => 625,  1253 => 623,  1237 => 610,  1226 => 602,  1219 => 598,  1215 => 597,  1208 => 593,  1204 => 592,  1200 => 591,  1189 => 583,  1185 => 582,  1181 => 581,  1175 => 580,  1168 => 576,  1164 => 575,  1158 => 572,  1154 => 571,  1147 => 567,  1142 => 565,  1134 => 560,  1130 => 559,  1126 => 558,  1120 => 555,  1116 => 554,  1112 => 553,  1101 => 545,  1096 => 543,  1087 => 536,  1078 => 528,  1076 => 527,  1075 => 526,  1074 => 525,  1073 => 524,  1072 => 523,  1071 => 522,  1064 => 517,  1052 => 507,  1046 => 505,  1038 => 500,  1034 => 499,  1028 => 496,  1025 => 495,  1022 => 494,  1015 => 490,  1011 => 489,  1003 => 486,  999 => 484,  993 => 482,  991 => 481,  987 => 480,  983 => 479,  978 => 476,  976 => 475,  968 => 470,  961 => 466,  957 => 465,  953 => 464,  948 => 462,  940 => 457,  936 => 456,  932 => 455,  927 => 453,  919 => 448,  915 => 447,  911 => 446,  906 => 444,  898 => 439,  894 => 438,  890 => 437,  885 => 435,  874 => 429,  868 => 428,  864 => 427,  859 => 425,  855 => 424,  851 => 423,  846 => 421,  840 => 418,  831 => 412,  824 => 408,  815 => 404,  806 => 398,  802 => 397,  798 => 396,  793 => 394,  790 => 393,  784 => 390,  780 => 389,  776 => 388,  773 => 387,  771 => 386,  765 => 383,  759 => 382,  749 => 374,  735 => 362,  729 => 359,  716 => 349,  706 => 343,  699 => 338,  695 => 337,  689 => 334,  685 => 333,  681 => 332,  675 => 329,  671 => 328,  667 => 327,  660 => 323,  655 => 321,  650 => 318,  642 => 314,  635 => 309,  629 => 306,  624 => 304,  619 => 302,  615 => 300,  613 => 299,  605 => 294,  599 => 291,  594 => 289,  589 => 287,  584 => 284,  574 => 278,  567 => 273,  561 => 272,  553 => 267,  547 => 266,  540 => 262,  535 => 260,  531 => 258,  529 => 257,  522 => 252,  515 => 247,  509 => 244,  502 => 240,  493 => 234,  487 => 230,  470 => 228,  453 => 227,  449 => 225,  447 => 223,  441 => 220,  437 => 219,  433 => 218,  427 => 215,  420 => 211,  414 => 208,  406 => 203,  402 => 202,  393 => 196,  389 => 195,  382 => 190,  379 => 189,  372 => 187,  366 => 185,  364 => 184,  350 => 175,  345 => 173,  341 => 172,  337 => 171,  334 => 170,  329 => 169,  323 => 165,  320 => 164,  318 => 163,  312 => 160,  308 => 159,  303 => 157,  299 => 156,  291 => 151,  287 => 150,  283 => 149,  275 => 144,  271 => 143,  266 => 140,  258 => 133,  249 => 125,  243 => 123,  241 => 122,  237 => 121,  233 => 120,  229 => 119,  225 => 118,  221 => 117,  217 => 116,  209 => 110,  202 => 105,  190 => 96,  186 => 95,  177 => 89,  170 => 85,  164 => 82,  157 => 78,  150 => 74,  144 => 71,  135 => 65,  127 => 62,  121 => 58,  106 => 56,  102 => 55,  97 => 53,  91 => 50,  86 => 48,  80 => 45,  76 => 44,  71 => 41,  64 => 37,  60 => 35,  58 => 34,  55 => 33,  53 => 32,  49 => 31,  44 => 28,  41 => 27,  37 => 25,  35 => 1257,  34 => 1256,  33 => 1255,  32 => 1238,  30 => 1236,  29 => 1234,  11 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin\\Product:form.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Product/form.html.twig");
    }
}


/* PrestaShopBundle:Admin\Product:form.html.twig */
class __TwigTemplate_a9454949ed2392b8ab91660b7c09ca11ac69998610ad382581fccfdbb3e9ffb4_2072200634 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1169
        $this->parent = $this->loadTemplate("PrestaShopBundle:Admin/Helpers:bootstrap_popup.html.twig", "PrestaShopBundle:Admin\\Product:form.html.twig", 1169);
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

    // line 1186
    public function block_content($context, array $blocks = array())
    {
        // line 1187
        echo "      <div class=\"modal-body\"></div>
    ";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin\\Product:form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  2513 => 1187,  2510 => 1186,  2493 => 1169,  2434 => 1215,  2427 => 1211,  2423 => 1210,  2419 => 1209,  2415 => 1208,  2411 => 1207,  2407 => 1206,  2403 => 1205,  2399 => 1204,  2395 => 1203,  2391 => 1202,  2387 => 1201,  2382 => 1199,  2377 => 1198,  2374 => 1197,  2367 => 1194,  2364 => 1193,  2357 => 871,  2354 => 870,  2347 => 224,  2344 => 223,  2339 => 1190,  2337 => 1169,  2332 => 1166,  2328 => 1165,  2319 => 1159,  2314 => 1157,  2307 => 1153,  2302 => 1151,  2298 => 1149,  2292 => 1146,  2287 => 1144,  2283 => 1142,  2281 => 1141,  2266 => 1129,  2254 => 1120,  2249 => 1118,  2240 => 1112,  2235 => 1110,  2230 => 1108,  2221 => 1102,  2216 => 1100,  2211 => 1098,  2205 => 1094,  2199 => 1091,  2194 => 1089,  2189 => 1087,  2183 => 1083,  2181 => 1082,  2177 => 1080,  2171 => 1077,  2159 => 1070,  2153 => 1069,  2147 => 1068,  2140 => 1067,  2138 => 1066,  2133 => 1064,  2128 => 1062,  2120 => 1057,  2116 => 1056,  2108 => 1051,  2101 => 1047,  2096 => 1044,  2090 => 1040,  2086 => 1039,  2081 => 1036,  2071 => 1028,  2061 => 1024,  2054 => 1020,  2050 => 1019,  2047 => 1018,  2043 => 1017,  2038 => 1014,  2025 => 1007,  2021 => 1006,  2014 => 1002,  2005 => 998,  1999 => 995,  1992 => 993,  1987 => 990,  1983 => 989,  1977 => 986,  1973 => 985,  1969 => 984,  1961 => 978,  1950 => 976,  1946 => 975,  1941 => 973,  1937 => 971,  1927 => 967,  1918 => 963,  1912 => 960,  1905 => 958,  1899 => 956,  1895 => 955,  1890 => 952,  1888 => 951,  1885 => 950,  1877 => 943,  1874 => 942,  1862 => 932,  1855 => 928,  1851 => 927,  1844 => 923,  1832 => 914,  1828 => 913,  1823 => 911,  1819 => 910,  1815 => 909,  1811 => 908,  1807 => 907,  1801 => 904,  1785 => 891,  1781 => 890,  1777 => 889,  1766 => 881,  1761 => 878,  1744 => 875,  1741 => 874,  1724 => 873,  1721 => 872,  1719 => 870,  1714 => 868,  1710 => 867,  1706 => 866,  1696 => 859,  1692 => 858,  1687 => 856,  1682 => 854,  1673 => 848,  1669 => 847,  1664 => 845,  1659 => 843,  1652 => 839,  1648 => 838,  1643 => 836,  1638 => 834,  1629 => 828,  1622 => 824,  1618 => 823,  1613 => 821,  1608 => 819,  1598 => 812,  1588 => 804,  1586 => 799,  1582 => 798,  1574 => 793,  1570 => 792,  1566 => 791,  1560 => 788,  1556 => 787,  1552 => 786,  1542 => 779,  1536 => 776,  1530 => 773,  1524 => 770,  1515 => 764,  1511 => 763,  1502 => 757,  1498 => 756,  1491 => 752,  1481 => 744,  1470 => 735,  1462 => 729,  1451 => 720,  1443 => 715,  1436 => 711,  1432 => 710,  1423 => 704,  1419 => 703,  1410 => 697,  1406 => 696,  1397 => 690,  1393 => 689,  1389 => 688,  1381 => 683,  1376 => 681,  1363 => 671,  1359 => 670,  1349 => 663,  1345 => 662,  1341 => 661,  1337 => 660,  1333 => 659,  1329 => 658,  1325 => 657,  1321 => 656,  1317 => 655,  1313 => 654,  1305 => 651,  1300 => 649,  1290 => 642,  1285 => 640,  1273 => 631,  1269 => 630,  1265 => 629,  1258 => 625,  1253 => 623,  1237 => 610,  1226 => 602,  1219 => 598,  1215 => 597,  1208 => 593,  1204 => 592,  1200 => 591,  1189 => 583,  1185 => 582,  1181 => 581,  1175 => 580,  1168 => 576,  1164 => 575,  1158 => 572,  1154 => 571,  1147 => 567,  1142 => 565,  1134 => 560,  1130 => 559,  1126 => 558,  1120 => 555,  1116 => 554,  1112 => 553,  1101 => 545,  1096 => 543,  1087 => 536,  1078 => 528,  1076 => 527,  1075 => 526,  1074 => 525,  1073 => 524,  1072 => 523,  1071 => 522,  1064 => 517,  1052 => 507,  1046 => 505,  1038 => 500,  1034 => 499,  1028 => 496,  1025 => 495,  1022 => 494,  1015 => 490,  1011 => 489,  1003 => 486,  999 => 484,  993 => 482,  991 => 481,  987 => 480,  983 => 479,  978 => 476,  976 => 475,  968 => 470,  961 => 466,  957 => 465,  953 => 464,  948 => 462,  940 => 457,  936 => 456,  932 => 455,  927 => 453,  919 => 448,  915 => 447,  911 => 446,  906 => 444,  898 => 439,  894 => 438,  890 => 437,  885 => 435,  874 => 429,  868 => 428,  864 => 427,  859 => 425,  855 => 424,  851 => 423,  846 => 421,  840 => 418,  831 => 412,  824 => 408,  815 => 404,  806 => 398,  802 => 397,  798 => 396,  793 => 394,  790 => 393,  784 => 390,  780 => 389,  776 => 388,  773 => 387,  771 => 386,  765 => 383,  759 => 382,  749 => 374,  735 => 362,  729 => 359,  716 => 349,  706 => 343,  699 => 338,  695 => 337,  689 => 334,  685 => 333,  681 => 332,  675 => 329,  671 => 328,  667 => 327,  660 => 323,  655 => 321,  650 => 318,  642 => 314,  635 => 309,  629 => 306,  624 => 304,  619 => 302,  615 => 300,  613 => 299,  605 => 294,  599 => 291,  594 => 289,  589 => 287,  584 => 284,  574 => 278,  567 => 273,  561 => 272,  553 => 267,  547 => 266,  540 => 262,  535 => 260,  531 => 258,  529 => 257,  522 => 252,  515 => 247,  509 => 244,  502 => 240,  493 => 234,  487 => 230,  470 => 228,  453 => 227,  449 => 225,  447 => 223,  441 => 220,  437 => 219,  433 => 218,  427 => 215,  420 => 211,  414 => 208,  406 => 203,  402 => 202,  393 => 196,  389 => 195,  382 => 190,  379 => 189,  372 => 187,  366 => 185,  364 => 184,  350 => 175,  345 => 173,  341 => 172,  337 => 171,  334 => 170,  329 => 169,  323 => 165,  320 => 164,  318 => 163,  312 => 160,  308 => 159,  303 => 157,  299 => 156,  291 => 151,  287 => 150,  283 => 149,  275 => 144,  271 => 143,  266 => 140,  258 => 133,  249 => 125,  243 => 123,  241 => 122,  237 => 121,  233 => 120,  229 => 119,  225 => 118,  221 => 117,  217 => 116,  209 => 110,  202 => 105,  190 => 96,  186 => 95,  177 => 89,  170 => 85,  164 => 82,  157 => 78,  150 => 74,  144 => 71,  135 => 65,  127 => 62,  121 => 58,  106 => 56,  102 => 55,  97 => 53,  91 => 50,  86 => 48,  80 => 45,  76 => 44,  71 => 41,  64 => 37,  60 => 35,  58 => 34,  55 => 33,  53 => 32,  49 => 31,  44 => 28,  41 => 27,  37 => 25,  35 => 1257,  34 => 1256,  33 => 1255,  32 => 1238,  30 => 1236,  29 => 1234,  11 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin\\Product:form.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Product/form.html.twig");
    }
}
