<?php

/* PrestaShopBundle:Admin\Common:pagination.html.twig */
class __TwigTemplate_4ebe8e05188e4ab1ab58d298308d7c816d3def561dfe9a9d5131fcfd1b6c3fef extends Twig_Template
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
        echo "<div>
    <ul class=\"pagination\">
        <li class=\"page-item ";
        // line 27
        if (($context["first_url"] ?? null)) {
        } else {
            echo "disabled";
        }
        echo "\">
            <a class=\"page-link\" ";
        // line 28
        if (($context["first_url"] ?? null)) {
            echo "href=\"";
            echo twig_escape_filter($this->env, ($context["first_url"] ?? null), "html", null, true);
            echo "\"";
        } else {
            echo "nohref";
        }
        echo ">1</a>
        </li>
        <li class=\"page-item ";
        // line 30
        if (($context["previous_url"] ?? null)) {
        } else {
            echo "disabled";
        }
        echo "\">
            <a class=\"page-link\" ";
        // line 31
        if (($context["previous_url"] ?? null)) {
            echo "href=\"";
            echo twig_escape_filter($this->env, ($context["previous_url"] ?? null), "html", null, true);
            echo "\"";
        } else {
            echo "nohref";
        }
        echo ">&lt;</a>
        </li>
        <li class=\"page-item active\" style=\"float: left;\">
            <input name=\"paginator_jump_page\" class=\"page-link\" type=\"text\" style=\"width: 4em;\"
                   value=\"";
        // line 35
        echo twig_escape_filter($this->env, ($context["current_page"] ?? null), "html", null, true);
        echo "\" psurl=\"";
        echo twig_escape_filter($this->env, ($context["jump_page_url"] ?? null), "html", null, true);
        echo "\" psmax=\"";
        echo twig_escape_filter($this->env, ($context["page_count"] ?? null), "html", null, true);
        echo "\" pslimit=\"";
        echo twig_escape_filter($this->env, ($context["limit"] ?? null), "html", null, true);
        echo "\" />
        </li>
        <li class=\"page-item ";
        // line 37
        if ((array_key_exists("next_url", $context) && (($context["next_url"] ?? null) != false))) {
        } else {
            echo "disabled";
        }
        echo "\">
            <a class=\"page-link\" id=\"pagination_next_url\" ";
        // line 38
        if ((array_key_exists("next_url", $context) && (($context["next_url"] ?? null) != false))) {
            echo "href=\"";
            echo twig_escape_filter($this->env, ($context["next_url"] ?? null), "html", null, true);
            echo "\"";
        } else {
            echo "nohref";
        }
        echo ">&gt;</a>
        </li>
        <li class=\"page-item ";
        // line 40
        if ((array_key_exists("last_url", $context) && (($context["last_url"] ?? null) != false))) {
        } else {
            echo "disabled";
        }
        echo "\">
            <a class=\"page-link\" ";
        // line 41
        if ((array_key_exists("last_url", $context) && (($context["last_url"] ?? null) != false))) {
            echo "href=\"";
            echo twig_escape_filter($this->env, ($context["last_url"] ?? null), "html", null, true);
            echo "\"";
        } else {
            echo "nohref";
        }
        echo ">";
        echo twig_escape_filter($this->env, ($context["page_count"] ?? null), "html", null, true);
        echo "</a>
        </li>
    </ul>
    <ul class=\"pagination\">
        <li style=\"float: left; margin-left: 2em;\">
            ";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Viewing %from%-%to% on %total% (page %current_page% / %page_count%)", array("%from%" => (        // line 47
($context["from"] ?? null) + 1), "%to%" => min((        // line 48
($context["to"] ?? null) + 1), ($context["total"] ?? null)), "%total%" =>         // line 49
($context["total"] ?? null), "%current_page%" =>         // line 50
($context["current_page"] ?? null), "%page_count%" =>         // line 51
($context["page_count"] ?? null)), "Admin.Catalog.Feature"), "html", null, true);
        // line 53
        echo "
            &nbsp;
            |
            &nbsp;
            ";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Items per page:", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "&nbsp;
            <select name=\"paginator_select_page_limit\" psurl=\"";
        // line 58
        echo twig_escape_filter($this->env, ($context["changeLimitUrl"] ?? null), "html", null, true);
        echo "\" style=\"display:inline;width:6em;\" class=\"pagination-link\">
                ";
        // line 59
        if (!twig_in_filter(($context["limit"] ?? null), ($context["limit_choices"] ?? null))) {
            echo "<option value=\"";
            echo twig_escape_filter($this->env, ($context["limit"] ?? null), "html", null, true);
            echo "\" selected=\"selected\">";
            echo twig_escape_filter($this->env, ($context["limit"] ?? null), "html", null, true);
            echo "</option>";
        }
        // line 60
        echo "                ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["limit_choices"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["limit_choice"]) {
            // line 61
            echo "                    <option value=\"";
            echo twig_escape_filter($this->env, $context["limit_choice"], "html", null, true);
            echo "\" ";
            if ((($context["limit"] ?? null) == $context["limit_choice"])) {
                echo "selected=\"selected\"";
            }
            echo ">";
            echo twig_escape_filter($this->env, $context["limit_choice"], "html", null, true);
            echo "</option>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['limit_choice'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 63
        echo "            </select>
        </li>
    </ul>
</div>
";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin\\Common:pagination.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  162 => 63,  147 => 61,  142 => 60,  134 => 59,  130 => 58,  126 => 57,  120 => 53,  118 => 51,  117 => 50,  116 => 49,  115 => 48,  114 => 47,  113 => 46,  97 => 41,  90 => 40,  79 => 38,  72 => 37,  61 => 35,  48 => 31,  41 => 30,  30 => 28,  23 => 27,  19 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin\\Common:pagination.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Common/pagination.html.twig");
    }
}
