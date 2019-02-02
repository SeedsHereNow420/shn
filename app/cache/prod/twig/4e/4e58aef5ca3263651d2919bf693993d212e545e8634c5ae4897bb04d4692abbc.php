<?php

/* PrestaShopBundle:Admin:Product/Include/form_max_length.html.twig */
class __TwigTemplate_9eda4b2e43745e7d347a168cb591fa94912cb1b68b582072bfe38e2dfb538f9f extends Twig_Template
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
        if ($this->getAttribute(($context["attr"] ?? null), "counter", array(), "any", true, true)) {
            // line 26
            echo "  ";
            $context["isRecommandedType"] = ($this->getAttribute(($context["attr"] ?? null), "counter_type", array(), "any", true, true) && ($this->getAttribute(($context["attr"] ?? null), "counter_type", array()) == "recommended"));
            // line 27
            echo "  <span class=\"maxLength ";
            echo (( !($context["isRecommandedType"] ?? null)) ? ("maxType") : (""));
            echo "\">
    ";
            // line 28
            if (($context["isRecommandedType"] ?? null)) {
                // line 29
                echo "      ";
                echo twig_replace_filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("[1][/1] of [2][/2] characters used (recommended)", array(), "Admin.Catalog.Feature"), array("[1]" => "<span class=\"currentLength\">", "[/1]" => "</span>", "[2]" => ("<span class=\"currentTotalMax\">" . $this->getAttribute(                // line 32
($context["attr"] ?? null), "counter", array())), "[/2]" => "</span>"));
                // line 34
                echo "
    ";
            } else {
                // line 36
                echo "      ";
                echo twig_replace_filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("[1][/1] of [2][/2] characters allowed", array(), "Admin.Catalog.Feature"), array("[1]" => "<span class=\"currentLength\">", "[/1]" => "</span>", "[2]" => ("<span class=\"currentTotalMax\">" . $this->getAttribute(                // line 39
($context["attr"] ?? null), "counter", array())), "[/2]" => "</span>"));
                // line 41
                echo "
    ";
            }
            // line 43
            echo "  </span>
";
        }
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin:Product/Include/form_max_length.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 43,  43 => 41,  41 => 39,  39 => 36,  35 => 34,  33 => 32,  31 => 29,  29 => 28,  24 => 27,  21 => 26,  19 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin:Product/Include/form_max_length.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Product/Include/form_max_length.html.twig");
    }
}
