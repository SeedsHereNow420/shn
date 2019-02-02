<?php

/* PrestaShopBundle:Admin/Module/Includes:modal_confirm.html.twig */
class __TwigTemplate_e44ed7b5f8ccc320cc59ccbd40b73edb0d82b6b2c13923d506cfd2d5da3a71f0 extends Twig_Template
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
        if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "urls", array())) >= 1)) {
            // line 26
            echo "  ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "urls", array()));
            foreach ($context['_seq'] as $context["module_action"] => $context["module_url"]) {
                // line 27
                echo "    ";
                if (twig_in_filter($context["module_action"], array(0 => "disable", 1 => "uninstall", 2 => "reset"))) {
                    // line 28
                    echo "      <div id=\"module-modal-confirm-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "name", array()), "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $context["module_action"], "html", null, true);
                    echo "\" class=\"modal modal-vcenter fade\" role=\"dialog\">
        <div class=\"modal-dialog\">
          <!-- Modal content-->
          <div class=\"modal-content\">
            <div class=\"modal-header\">
              <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
              <h4 class=\"modal-title module-modal-title\">
                ";
                    // line 35
                    if (($context["module_action"] == "disable")) {
                        // line 36
                        echo "                  ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Disable module?", array(), "Admin.Modules.Feature"), "html", null, true);
                        echo "
                ";
                    }
                    // line 38
                    echo "                ";
                    if (($context["module_action"] == "uninstall")) {
                        // line 39
                        echo "                  ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Uninstall module?", array(), "Admin.Modules.Feature"), "html", null, true);
                        echo "
                ";
                    }
                    // line 41
                    echo "                ";
                    if (($context["module_action"] == "reset")) {
                        // line 42
                        echo "                  ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Reset module?", array(), "Admin.Modules.Feature"), "html", null, true);
                        echo "
                ";
                    }
                    // line 44
                    echo "              </h4>
            </div>
            <div class=\"modal-body row\">
              <div class=\"col-md-12\">
                <p>
                  ";
                    // line 49
                    if (($context["module_action"] == "disable")) {
                        // line 50
                        echo "                    ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("You are about to disable %moduleName% module.", array("%moduleName%" => $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "displayName", array())), "Admin.Modules.Notification"), "html", null, true);
                        echo "
                    <br>
                    <br>
                    ";
                        // line 53
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Your current settings will be saved, but the module will no longer be active.", array(), "Admin.Modules.Notification"), "html", null, true);
                        echo "
                  ";
                    }
                    // line 55
                    echo "                  ";
                    if (($context["module_action"] == "uninstall")) {
                        // line 56
                        echo "                    ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("You are about to uninstall %moduleName% module.", array("%moduleName%" => $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "displayName", array())), "Admin.Modules.Notification"), "html", null, true);
                        echo "
                    <br>
                    ";
                        // line 58
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "confirmUninstall", array()), "html", null, true);
                        echo "
                    <br>
                    <br>
                    ";
                        // line 61
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("This will disable the module and delete all its files. For good.", array(), "Admin.Modules.Notification"), "html", null, true);
                        echo "
                    <br>
                    <label>
                      <input type=\"checkbox\" id=\"force_deletion\" name=\"force_deletion\" data-tech-name=\"";
                        // line 64
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "name", array()), "html", null, true);
                        echo "\"> ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Optional: delete module folder after uninstall.", array(), "Admin.Modules.Feature"), "html", null, true);
                        echo "
                    </label>
                    <br>
                    <span class=\"italic red\">
                      ";
                        // line 68
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("This action cannot be undone.", array(), "Admin.Modules.Notification"), "html", null, true);
                        echo "
                    </span>
                  ";
                    }
                    // line 71
                    echo "                  ";
                    if (($context["module_action"] == "reset")) {
                        // line 72
                        echo "                    ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("You're about to reset %moduleName% module.", array("%moduleName%" => $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "displayName", array())), "Admin.Modules.Notification"), "html", null, true);
                        echo "
                    <br>
                    <br>
                    ";
                        // line 75
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("This will restore the defaults settings.", array(), "Admin.Modules.Notification"), "html", null, true);
                        echo "
                    <br>
                    <span class=\"italic red\">
                      ";
                        // line 78
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("This action cannot be undone.", array(), "Admin.Modules.Notification"), "html", null, true);
                        echo "
                    </span>
                  ";
                    }
                    // line 81
                    echo "                </p>
              </div>
            </div>
            <div class=\"modal-footer\">
              <input type=\"button\" class=\"btn btn-default uppercase\" data-dismiss=\"modal\" value=\"";
                    // line 85
                    echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Cancel", array(), "Admin.Actions"), "html", null, true);
                    echo "\" />
              ";
                    // line 86
                    if (($context["module_action"] == "disable")) {
                        // line 87
                        echo "                <a
                  class=\"btn btn-primary uppercase module_action_modal_";
                        // line 88
                        echo twig_escape_filter($this->env, $context["module_action"], "html", null, true);
                        echo "\"
                  href=\"";
                        // line 89
                        echo twig_escape_filter($this->env, $context["module_url"], "html", null, true);
                        echo "\"
                  data-dismiss=\"modal\"
                  data-tech-name=\"";
                        // line 91
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "name", array()), "html", null, true);
                        echo "\"
                >
                  ";
                        // line 93
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Yes, disable it", array(), "Admin.Modules.Feature"), "html", null, true);
                        echo "
                </a>
              ";
                    }
                    // line 96
                    echo "              ";
                    if (($context["module_action"] == "uninstall")) {
                        // line 97
                        echo "                <a
                  class=\"btn btn-primary uppercase module_action_modal_";
                        // line 98
                        echo twig_escape_filter($this->env, $context["module_action"], "html", null, true);
                        echo "\"
                  href=\"";
                        // line 99
                        echo twig_escape_filter($this->env, $context["module_url"], "html", null, true);
                        echo "\"
                  data-dismiss=\"modal\"
                  data-tech-name=\"";
                        // line 101
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "name", array()), "html", null, true);
                        echo "\"
                >
                  ";
                        // line 103
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Yes, uninstall it", array(), "Admin.Modules.Feature"), "html", null, true);
                        echo "
                </a>
              ";
                    }
                    // line 106
                    echo "              ";
                    if (($context["module_action"] == "reset")) {
                        // line 107
                        echo "                <a
                  class=\"btn btn-primary uppercase module_action_modal_";
                        // line 108
                        echo twig_escape_filter($this->env, $context["module_action"], "html", null, true);
                        echo "\"
                  href=\"";
                        // line 109
                        echo twig_escape_filter($this->env, $context["module_url"], "html", null, true);
                        echo "\"
                  data-dismiss=\"modal\"
                  data-tech-name=\"";
                        // line 111
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "name", array()), "html", null, true);
                        echo "\"
                >
                  ";
                        // line 113
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Yes, reset it", array(), "Admin.Modules.Feature"), "html", null, true);
                        echo "
                </a>
              ";
                    }
                    // line 116
                    echo "            </div>
          </div>
        </div>
      </div>
    ";
                }
                // line 121
                echo "  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['module_action'], $context['module_url'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Module/Includes:modal_confirm.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  241 => 121,  234 => 116,  228 => 113,  223 => 111,  218 => 109,  214 => 108,  211 => 107,  208 => 106,  202 => 103,  197 => 101,  192 => 99,  188 => 98,  185 => 97,  182 => 96,  176 => 93,  171 => 91,  166 => 89,  162 => 88,  159 => 87,  157 => 86,  153 => 85,  147 => 81,  141 => 78,  135 => 75,  128 => 72,  125 => 71,  119 => 68,  110 => 64,  104 => 61,  98 => 58,  92 => 56,  89 => 55,  84 => 53,  77 => 50,  75 => 49,  68 => 44,  62 => 42,  59 => 41,  53 => 39,  50 => 38,  44 => 36,  42 => 35,  29 => 28,  26 => 27,  21 => 26,  19 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin/Module/Includes:modal_confirm.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Module/Includes/modal_confirm.html.twig");
    }
}
