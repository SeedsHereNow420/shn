<?php

/* PrestaShopBundle:Admin/Module/Includes:action_menu.html.twig */
class __TwigTemplate_4d4afb32fc15d0ce8378732e1b6fa12c570f176589c8c066b585a0d8fc810dbe extends Twig_Template
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
        list($context["url"], $context["priceRaw"], $context["priceDisplay"], $context["url_active"], $context["urls"], $context["name"]) =         array($this->getAttribute($this->getAttribute(        // line 26
($context["module"] ?? null), "attributes", array()), "url", array()), $this->getAttribute($this->getAttribute($this->getAttribute(        // line 27
($context["module"] ?? null), "attributes", array()), "price", array()), "raw", array()), $this->getAttribute($this->getAttribute($this->getAttribute(        // line 28
($context["module"] ?? null), "attributes", array()), "price", array()), "displayPrice", array()), $this->getAttribute($this->getAttribute(        // line 29
($context["module"] ?? null), "attributes", array()), "url_active", array()), $this->getAttribute($this->getAttribute(        // line 30
($context["module"] ?? null), "attributes", array()), "urls", array()), $this->getAttribute($this->getAttribute(        // line 31
($context["module"] ?? null), "attributes", array()), "name", array()));
        // line 33
        echo "
";
        // line 34
        if ((($context["level"] ?? null) > twig_constant("PrestaShopBundle\\Security\\Voter\\PageVoter::LEVEL_READ"))) {
            // line 35
            echo "  ";
            if ((($context["url_active"] ?? null) == "buy")) {
                // line 36
                echo "  <div class=\"form-action-button-container\">
    <a class=\"btn btn-primary btn-primary-reverse btn-block btn-primary-outline light-button module_action_menu_go_to_addons\" href=\"";
                // line 37
                echo twig_escape_filter($this->env, ($context["url"] ?? null), "html", null, true);
                echo "\" target=\"_blank\">
      ";
                // line 38
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Discover", array(), "Admin.Modules.Feature"), "html", null, true);
                echo "
    </a>
  </div>
  ";
            } else {
                // line 42
                echo "  <div class=\"btn-group form-action-button-container\">
    <form class=\"btn-group form-action-button\" method=\"post\" action=\"";
                // line 43
                echo twig_escape_filter($this->env, $this->getAttribute(($context["urls"] ?? null), ($context["url_active"] ?? null), array(), "array"), "html", null, true);
                echo "\">
      <button type=\"submit\" class=\"btn btn-primary-reverse btn-primary-outline light-button module_action_menu_";
                // line 44
                echo twig_escape_filter($this->env, ($context["url_active"] ?? null), "html", null, true);
                echo "\"
          data-confirm_modal=\"module-modal-confirm-";
                // line 45
                echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
                echo "-";
                echo twig_escape_filter($this->env, ($context["url_active"] ?? null), "html", null, true);
                echo "\" ";
                if (((($context["level"] ?? null) < twig_constant("PrestaShopBundle\\Security\\Voter\\PageVoter::LEVEL_UPDATE")) || ((($context["level"] ?? null) < twig_constant("PrestaShopBundle\\Security\\Voter\\PageVoter::LEVEL_DELETE")) && !twig_in_filter(($context["url_active"] ?? null), array(0 => "configure", 1 => "install", 2 => "upgrade"))))) {
                    echo " disabled=\"disabled\" ";
                }
                echo ">
          ";
                // line 46
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans(twig_replace_filter(twig_capitalize_string_filter($this->env, ($context["url_active"] ?? null)), array("_" => " ")), array(), "Admin.Actions"), "html", null, true);
                echo "
      </button>
      ";
                // line 48
                if ((twig_length_filter($this->env, ($context["urls"] ?? null)) > 1)) {
                    // line 49
                    echo "      <input type=\"hidden\" class=\"btn\">
      ";
                }
                // line 51
                echo "    </form>
    ";
                // line 52
                if ((twig_length_filter($this->env, ($context["urls"] ?? null)) > 1)) {
                    // line 53
                    echo "      ";
                    if (((($context["level"] ?? null) > twig_constant("PrestaShopBundle\\Security\\Voter\\PageVoter::LEVEL_CREATE")) || ((twig_in_filter("configure", twig_get_array_keys_filter(($context["urls"] ?? null))) && twig_in_filter("upgrade", twig_get_array_keys_filter(($context["urls"] ?? null)))) && twig_in_filter(($context["url_active"] ?? null), array(0 => "configure", 1 => "install", 2 => "upgrade"))))) {
                        // line 54
                        echo "          <button type=\"button\" class=\"btn btn-primary-outline  dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
            <span class=\"caret\"></span>
            <span class=\"sr-only\">";
                        // line 56
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Toggle Dropdown", array(), "Admin.Modules.Feature"), "html", null, true);
                        echo "</span>
          </button>
          <div class=\"dropdown-menu\">
            ";
                        // line 59
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(($context["urls"] ?? null));
                        foreach ($context['_seq'] as $context["module_action"] => $context["module_url"]) {
                            // line 60
                            echo "              ";
                            if (($context["module_action"] != ($context["url_active"] ?? null))) {
                                // line 61
                                echo "                ";
                                if (((($context["level"] ?? null) >= twig_constant("PrestaShopBundle\\Security\\Voter\\PageVoter::LEVEL_DELETE")) || ((($context["level"] ?? null) < twig_constant("PrestaShopBundle\\Security\\Voter\\PageVoter::LEVEL_DELETE")) && twig_in_filter($context["module_action"], array(0 => "configure", 1 => "install", 2 => "upgrade"))))) {
                                    // line 62
                                    echo "                  <li>
                    <form method=\"post\" action=\"";
                                    // line 63
                                    echo twig_escape_filter($this->env, $context["module_url"], "html", null, true);
                                    echo "\">
                      <button type=\"submit\" class=\"dropdown-item module_action_menu_";
                                    // line 64
                                    echo twig_escape_filter($this->env, $context["module_action"], "html", null, true);
                                    echo "\" data-confirm_modal=\"module-modal-confirm-";
                                    echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
                                    echo "-";
                                    echo twig_escape_filter($this->env, $context["module_action"], "html", null, true);
                                    echo "\">
                        ";
                                    // line 65
                                    echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans(twig_replace_filter(twig_capitalize_string_filter($this->env, $context["module_action"]), array("_" => " ")), array(), "Admin.Actions"), "html", null, true);
                                    echo "
                      </button>
                    </form>
                  </li>
                ";
                                }
                                // line 70
                                echo "              ";
                            }
                            // line 71
                            echo "            ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['module_action'], $context['module_url'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 72
                        echo "          </div>
      ";
                    }
                    // line 74
                    echo "    ";
                }
                // line 75
                echo "  </div>
  ";
            }
        }
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Module/Includes:action_menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  148 => 75,  145 => 74,  141 => 72,  135 => 71,  132 => 70,  124 => 65,  116 => 64,  112 => 63,  109 => 62,  106 => 61,  103 => 60,  99 => 59,  93 => 56,  89 => 54,  86 => 53,  84 => 52,  81 => 51,  77 => 49,  75 => 48,  70 => 46,  60 => 45,  56 => 44,  52 => 43,  49 => 42,  42 => 38,  38 => 37,  35 => 36,  32 => 35,  30 => 34,  27 => 33,  25 => 31,  24 => 30,  23 => 29,  22 => 28,  21 => 27,  20 => 26,  19 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin/Module/Includes:action_menu.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Module/Includes/action_menu.html.twig");
    }
}
