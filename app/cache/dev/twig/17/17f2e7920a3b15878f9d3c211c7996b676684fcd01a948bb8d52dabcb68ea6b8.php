<?php

/* @WebProfiler/Profiler/toolbar.html.twig */
class __TwigTemplate_fbc1cadd2ac1cc38db4db217a36c29cbe4a21ee50c97213117cac8a1554115b8 extends Twig_Template
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
        $__internal_f2a1936edf98b59cbb2beafabf0b6a05ca3e6a29199feb7e553ca7be7a3a0fd2 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_f2a1936edf98b59cbb2beafabf0b6a05ca3e6a29199feb7e553ca7be7a3a0fd2->enter($__internal_f2a1936edf98b59cbb2beafabf0b6a05ca3e6a29199feb7e553ca7be7a3a0fd2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Profiler/toolbar.html.twig"));

        // line 1
        echo "<!-- START of Symfony Web Debug Toolbar -->
<div id=\"sfMiniToolbar-";
        // line 2
        echo twig_escape_filter($this->env, ($context["token"] ?? $this->getContext($context, "token")), "html", null, true);
        echo "\" class=\"sf-minitoolbar\" data-no-turbolink>
    <a href=\"javascript:void(0);\" title=\"Show Symfony toolbar\" tabindex=\"-1\" accesskey=\"D\" onclick=\"
        var elem = this.parentNode;
        if (elem.style.display == 'none') {
            document.getElementById('sfToolbarMainContent-";
        // line 6
        echo twig_escape_filter($this->env, ($context["token"] ?? $this->getContext($context, "token")), "html", null, true);
        echo "').style.display = 'none';
            document.getElementById('sfToolbarClearer-";
        // line 7
        echo twig_escape_filter($this->env, ($context["token"] ?? $this->getContext($context, "token")), "html", null, true);
        echo "').style.display = 'none';
            elem.style.display = 'block';
        } else {
            document.getElementById('sfToolbarMainContent-";
        // line 10
        echo twig_escape_filter($this->env, ($context["token"] ?? $this->getContext($context, "token")), "html", null, true);
        echo "').style.display = 'block';
            document.getElementById('sfToolbarClearer-";
        // line 11
        echo twig_escape_filter($this->env, ($context["token"] ?? $this->getContext($context, "token")), "html", null, true);
        echo "').style.display = 'block';
            elem.style.display = 'none'
        }

        Sfjs.setPreference('toolbar/displayState', 'block');
    \">
        ";
        // line 17
        echo twig_include($this->env, $context, "@WebProfiler/Icon/symfony.svg");
        echo "
    </a>
</div>
<style>
    ";
        // line 21
        echo twig_include($this->env, $context, "@WebProfiler/Profiler/toolbar.css.twig", array("position" => ($context["position"] ?? $this->getContext($context, "position")), "floatable" => true));
        echo "
</style>
<div id=\"sfToolbarClearer-";
        // line 23
        echo twig_escape_filter($this->env, ($context["token"] ?? $this->getContext($context, "token")), "html", null, true);
        echo "\" style=\"clear: both; height: 36px;\"></div>

<div id=\"sfToolbarMainContent-";
        // line 25
        echo twig_escape_filter($this->env, ($context["token"] ?? $this->getContext($context, "token")), "html", null, true);
        echo "\" class=\"sf-toolbarreset clear-fix\" data-no-turbolink>
    ";
        // line 26
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["templates"] ?? $this->getContext($context, "templates")));
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
        foreach ($context['_seq'] as $context["name"] => $context["template"]) {
            // line 27
            echo "        ";
            if (            $this->loadTemplate($context["template"], "@WebProfiler/Profiler/toolbar.html.twig", 27)->hasBlock("toolbar", $context)) {
                // line 28
                echo "            ";
                $__internal_f58256efa867148c02cdeb5481de8664f0cb47f7478c646f1082ff8e8c6454c3 = array("collector" => $this->getAttribute(                // line 29
($context["profile"] ?? $this->getContext($context, "profile")), "getcollector", array(0 => $context["name"]), "method"), "profiler_url" =>                 // line 30
($context["profiler_url"] ?? $this->getContext($context, "profiler_url")), "token" => $this->getAttribute(                // line 31
($context["profile"] ?? $this->getContext($context, "profile")), "token", array()), "name" =>                 // line 32
$context["name"], "profiler_markup_version" =>                 // line 33
($context["profiler_markup_version"] ?? $this->getContext($context, "profiler_markup_version")));
                if (!is_array($__internal_f58256efa867148c02cdeb5481de8664f0cb47f7478c646f1082ff8e8c6454c3)) {
                    throw new Twig_Error_Runtime('Variables passed to the "with" tag must be a hash.');
                }
                $context['_parent'] = $context;
                $context = array_merge($context, $__internal_f58256efa867148c02cdeb5481de8664f0cb47f7478c646f1082ff8e8c6454c3);
                // line 35
                echo "                ";
                $this->loadTemplate($context["template"], "@WebProfiler/Profiler/toolbar.html.twig", 35)->displayBlock("toolbar", $context);
                echo "
            ";
                $context = $context['_parent'];
                // line 37
                echo "        ";
            }
            // line 38
            echo "    ";
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
        unset($context['_seq'], $context['_iterated'], $context['name'], $context['template'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "
    <a class=\"hide-button\" title=\"Close Toolbar\" tabindex=\"-1\" accesskey=\"D\" onclick=\"
        var p = this.parentNode;
        p.style.display = 'none';
        (p.previousElementSibling || p.previousSibling).style.display = 'none';
        document.getElementById('sfMiniToolbar-";
        // line 44
        echo twig_escape_filter($this->env, ($context["token"] ?? $this->getContext($context, "token")), "html", null, true);
        echo "').style.display = 'block';
        Sfjs.setPreference('toolbar/displayState', 'none');
    \">
        ";
        // line 47
        echo twig_include($this->env, $context, "@WebProfiler/Icon/close.svg");
        echo "
    </a>
</div>
<!-- END of Symfony Web Debug Toolbar -->
";
        
        $__internal_f2a1936edf98b59cbb2beafabf0b6a05ca3e6a29199feb7e553ca7be7a3a0fd2->leave($__internal_f2a1936edf98b59cbb2beafabf0b6a05ca3e6a29199feb7e553ca7be7a3a0fd2_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Profiler/toolbar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  145 => 47,  139 => 44,  132 => 39,  118 => 38,  115 => 37,  109 => 35,  102 => 33,  101 => 32,  100 => 31,  99 => 30,  98 => 29,  96 => 28,  93 => 27,  76 => 26,  72 => 25,  67 => 23,  62 => 21,  55 => 17,  46 => 11,  42 => 10,  36 => 7,  32 => 6,  25 => 2,  22 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!-- START of Symfony Web Debug Toolbar -->
<div id=\"sfMiniToolbar-{{ token }}\" class=\"sf-minitoolbar\" data-no-turbolink>
    <a href=\"javascript:void(0);\" title=\"Show Symfony toolbar\" tabindex=\"-1\" accesskey=\"D\" onclick=\"
        var elem = this.parentNode;
        if (elem.style.display == 'none') {
            document.getElementById('sfToolbarMainContent-{{ token }}').style.display = 'none';
            document.getElementById('sfToolbarClearer-{{ token }}').style.display = 'none';
            elem.style.display = 'block';
        } else {
            document.getElementById('sfToolbarMainContent-{{ token }}').style.display = 'block';
            document.getElementById('sfToolbarClearer-{{ token }}').style.display = 'block';
            elem.style.display = 'none'
        }

        Sfjs.setPreference('toolbar/displayState', 'block');
    \">
        {{ include('@WebProfiler/Icon/symfony.svg') }}
    </a>
</div>
<style>
    {{ include('@WebProfiler/Profiler/toolbar.css.twig', { 'position': position, 'floatable': true }) }}
</style>
<div id=\"sfToolbarClearer-{{ token }}\" style=\"clear: both; height: 36px;\"></div>

<div id=\"sfToolbarMainContent-{{ token }}\" class=\"sf-toolbarreset clear-fix\" data-no-turbolink>
    {% for name, template in templates %}
        {% if block('toolbar', template) is defined %}
            {% with {
                collector: profile.getcollector(name),
                profiler_url: profiler_url,
                token: profile.token,
                name: name,
                profiler_markup_version: profiler_markup_version
              } %}
                {{ block('toolbar', template) }}
            {% endwith %}
        {% endif %}
    {% endfor %}

    <a class=\"hide-button\" title=\"Close Toolbar\" tabindex=\"-1\" accesskey=\"D\" onclick=\"
        var p = this.parentNode;
        p.style.display = 'none';
        (p.previousElementSibling || p.previousSibling).style.display = 'none';
        document.getElementById('sfMiniToolbar-{{ token }}').style.display = 'block';
        Sfjs.setPreference('toolbar/displayState', 'none');
    \">
        {{ include('@WebProfiler/Icon/close.svg') }}
    </a>
</div>
<!-- END of Symfony Web Debug Toolbar -->
", "@WebProfiler/Profiler/toolbar.html.twig", "/var/www/html/SHN/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views/Profiler/toolbar.html.twig");
    }
}
