<?php

/* PrestaShopBundle:Admin/Module/Includes:card_notification_update.html.twig */
class __TwigTemplate_359380fb48885dc5f98f13a85b4a54e35e6f5fcc8207e3485bb59bf9f37d16ca extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 25
        $this->parent = $this->loadTemplate("PrestaShopBundle:Admin/Module/Includes:card_list.html.twig", "PrestaShopBundle:Admin/Module/Includes:card_notification_update.html.twig", 25);
        $this->blocks = array(
            'addon_version' => array($this, 'block_addon_version'),
            'addon_description' => array($this, 'block_addon_description'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "PrestaShopBundle:Admin/Module/Includes:card_list.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 30
    public function block_addon_version($context, array $blocks = array())
    {
        // line 31
        echo "  v";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "database", array()), "version", array()), "html", null, true);
        echo " <i class=\"material-icons\" style=\"font-size: 10px; \">arrow_forward</i> v";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "version_available", array()), "html", null, true);
        echo "
";
    }

    // line 35
    public function block_addon_description($context, array $blocks = array())
    {
        // line 36
        echo "  ";
        if ($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array(), "any", false, true), "changeLog", array(), "any", true, true)) {
            // line 37
            echo "    <ul>
      ";
            // line 38
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["module"] ?? null), "attributes", array()), "changeLog", array()));
            foreach ($context['_seq'] as $context["version"] => $context["lines"]) {
                // line 39
                echo "        <li><b>";
                echo twig_escape_filter($this->env, $context["version"], "html", null, true);
                echo ":</b>
          ";
                // line 40
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["lines"]);
                foreach ($context['_seq'] as $context["_key"] => $context["line"]) {
                    // line 41
                    echo "            ";
                    echo twig_escape_filter($this->env, $context["line"], "html", null, true);
                    echo "<br/>
          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['line'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 43
                echo "        </li>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['version'], $context['lines'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 45
            echo "    </ul>
  ";
        } else {
            // line 47
            echo "    <i>";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("No changelog provided", array(), "Admin.Modules.Notification"), "html", null, true);
            echo "</i>
  ";
        }
        // line 49
        echo "
";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Module/Includes:card_notification_update.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 49,  83 => 47,  79 => 45,  72 => 43,  63 => 41,  59 => 40,  54 => 39,  50 => 38,  47 => 37,  44 => 36,  41 => 35,  32 => 31,  29 => 30,  11 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin/Module/Includes:card_notification_update.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Module/Includes/card_notification_update.html.twig");
    }
}
