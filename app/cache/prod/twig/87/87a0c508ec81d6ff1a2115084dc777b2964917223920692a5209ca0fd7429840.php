<?php

/* PrestaShopBundle:Admin/Helpers:bootstrap_popup.html.twig */
class __TwigTemplate_677703fbfc5b15fee5a849a3dcc3fcb0379e0e9dbf10a08bd41a3fdf11fb4db1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'header' => array($this, 'block_header'),
            'content' => array($this, 'block_content'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 25
        echo "<div class=\"modal fade\" id=\"";
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "\" tabindex=\"-1\">
    <div class=\"modal-dialog ";
        // line 26
        if (array_key_exists("class", $context)) {
            echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
        }
        echo "\">
        <div class=\"modal-content\">
            ";
        // line 28
        $this->displayBlock('header', $context, $blocks);
        // line 36
        echo "
            ";
        // line 37
        $this->displayBlock('content', $context, $blocks);
        // line 39
        echo "
            ";
        // line 40
        if (array_key_exists("progressbar", $context)) {
            // line 41
            echo "                <div class=\"modal-body\" id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["progressbar"] ?? null), "id", array()), "html", null, true);
            echo "\">
                    <div class=\"pull-right progress-details-text\" default-value=\"";
            // line 42
            echo twig_escape_filter($this->env, (($this->getAttribute(($context["progressbar"] ?? null), "label", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["progressbar"] ?? null), "label", array()), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Processing...", array(), "Admin.Global"))) : ($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Processing...", array(), "Admin.Global"))), "html", null, true);
            echo "\">
                        ";
            // line 43
            echo twig_escape_filter($this->env, (($this->getAttribute(($context["progressbar"] ?? null), "label", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["progressbar"] ?? null), "label", array()), $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Processing...", array(), "Admin.Global"))) : ($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Processing...", array(), "Admin.Global"))), "html", null, true);
            echo "
                    </div>
                    <div class=\"progress active progress-striped\" style=\"display: block; width: 100%\">
                        <div class=\"progress-bar progress-bar-success\" role=\"progressbar\" style=\"width: 0%\">
                            <span>0 %</span>
                        </div>
                    </div>
                </div>
            ";
        }
        // line 52
        echo "
            ";
        // line 53
        $this->displayBlock('footer', $context, $blocks);
        // line 71
        echo "        </div>
    </div>
</div>
<script>
    \$(document).ready(function() {
        var closable = ";
        // line 76
        if ((array_key_exists("closable", $context) && (($context["closable"] ?? null) == true))) {
            echo "true";
        } else {
            echo "false";
        }
        echo ";
        \$('#";
        // line 77
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "').modal({
            backdrop: (closable ? true : 'static'),
            keyboard: closable,
            closable: closable,
            show: false
        });
    });
</script>
";
    }

    // line 28
    public function block_header($context, array $blocks = array())
    {
        // line 29
        echo "                ";
        if (array_key_exists("title", $context)) {
            // line 30
            echo "                    <div class=\"modal-header\">
                        ";
            // line 31
            if ((array_key_exists("closable", $context) && (($context["closable"] ?? null) == true))) {
                echo "<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>";
            }
            // line 32
            echo "                        <h4 class=\"modal-title\">";
            echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
            echo "</h4>
                    </div>
                ";
        }
        // line 35
        echo "            ";
    }

    // line 37
    public function block_content($context, array $blocks = array())
    {
        // line 38
        echo "            ";
    }

    // line 53
    public function block_footer($context, array $blocks = array())
    {
        // line 54
        echo "                ";
        if (array_key_exists("actions", $context)) {
            // line 55
            echo "                    <div class=\"modal-footer\">
                        ";
            // line 56
            if ((array_key_exists("closable", $context) && (($context["closable"] ?? null) == true))) {
                // line 57
                echo "                            <button type=\"button\" class=\"btn btn-tertiary-outline btn-lg\" data-dismiss=\"modal\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Close", array(), "Admin.Actions"), "html", null, true);
                echo "</button>
                        ";
            }
            // line 59
            echo "                        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["actions"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
                // line 60
                echo "                            ";
                if (($this->getAttribute($context["action"], "type", array(), "any", true, true) && ($this->getAttribute($context["action"], "type", array()) == "link"))) {
                    // line 61
                    echo "                                <a href=\"";
                    echo twig_escape_filter($this->env, (($this->getAttribute($context["action"], "href", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["action"], "href", array()), "#")) : ("#")), "html", null, true);
                    echo "\" class=\"";
                    echo twig_escape_filter($this->env, (($this->getAttribute($context["action"], "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["action"], "class", array()), "btn")) : ("btn")), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, (($this->getAttribute($context["action"], "label", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["action"], "label", array()), "Label is missing")) : ("Label is missing")), "html", null, true);
                    echo "</a>
                            ";
                } elseif (($this->getAttribute(                // line 62
$context["action"], "type", array(), "any", true, true) && ($this->getAttribute($context["action"], "type", array()) == "button"))) {
                    // line 63
                    echo "                                <button type=\"button\" value=\"";
                    echo twig_escape_filter($this->env, (($this->getAttribute($context["action"], "value", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["action"], "value", array()), "")) : ("")), "html", null, true);
                    echo "\" class=\"";
                    echo twig_escape_filter($this->env, (($this->getAttribute($context["action"], "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["action"], "class", array()), "btn")) : ("btn")), "html", null, true);
                    echo "\">
                                    ";
                    // line 64
                    echo twig_escape_filter($this->env, (($this->getAttribute($context["action"], "label", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["action"], "label", array()), "Label is missing")) : ("Label is missing")), "html", null, true);
                    echo "
                                </button>
                            ";
                }
                // line 67
                echo "                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['action'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 68
            echo "                    </div>
                ";
        }
        // line 70
        echo "            ";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Helpers:bootstrap_popup.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  190 => 70,  186 => 68,  180 => 67,  174 => 64,  167 => 63,  165 => 62,  156 => 61,  153 => 60,  148 => 59,  142 => 57,  140 => 56,  137 => 55,  134 => 54,  131 => 53,  127 => 38,  124 => 37,  120 => 35,  113 => 32,  109 => 31,  106 => 30,  103 => 29,  100 => 28,  87 => 77,  79 => 76,  72 => 71,  70 => 53,  67 => 52,  55 => 43,  51 => 42,  46 => 41,  44 => 40,  41 => 39,  39 => 37,  36 => 36,  34 => 28,  27 => 26,  22 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin/Helpers:bootstrap_popup.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Helpers/bootstrap_popup.html.twig");
    }
}
