<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_f3dc05dabe2f373203a6dc98293adfdaf3cbc764b8f58b4b3ffee62a446daa73 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_e9c0a6159142ae05e2bfa714f6f1ce7e90e85342fa9ae7f0b033d9c4d81f3f8d = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_e9c0a6159142ae05e2bfa714f6f1ce7e90e85342fa9ae7f0b033d9c4d81f3f8d->enter($__internal_e9c0a6159142ae05e2bfa714f6f1ce7e90e85342fa9ae7f0b033d9c4d81f3f8d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_e9c0a6159142ae05e2bfa714f6f1ce7e90e85342fa9ae7f0b033d9c4d81f3f8d->leave($__internal_e9c0a6159142ae05e2bfa714f6f1ce7e90e85342fa9ae7f0b033d9c4d81f3f8d_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_8d905b0f21a885b8ea9126a44f3e56e17d6197492112950b2d1a60004e856a06 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_8d905b0f21a885b8ea9126a44f3e56e17d6197492112950b2d1a60004e856a06->enter($__internal_8d905b0f21a885b8ea9126a44f3e56e17d6197492112950b2d1a60004e856a06_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_8d905b0f21a885b8ea9126a44f3e56e17d6197492112950b2d1a60004e856a06->leave($__internal_8d905b0f21a885b8ea9126a44f3e56e17d6197492112950b2d1a60004e856a06_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_55ebecf44fd680ed12ea2f1c332ed6f9f09d2550d1af9c1791c7c765932cde0a = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_55ebecf44fd680ed12ea2f1c332ed6f9f09d2550d1af9c1791c7c765932cde0a->enter($__internal_55ebecf44fd680ed12ea2f1c332ed6f9f09d2550d1af9c1791c7c765932cde0a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_55ebecf44fd680ed12ea2f1c332ed6f9f09d2550d1af9c1791c7c765932cde0a->leave($__internal_55ebecf44fd680ed12ea2f1c332ed6f9f09d2550d1af9c1791c7c765932cde0a_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_3038eb0377ec74d81bfb6f663a2824680ea9b0462b75eccb324f4667e90ecac6 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_3038eb0377ec74d81bfb6f663a2824680ea9b0462b75eccb324f4667e90ecac6->enter($__internal_3038eb0377ec74d81bfb6f663a2824680ea9b0462b75eccb324f4667e90ecac6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_router", array("token" => ($context["token"] ?? $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_3038eb0377ec74d81bfb6f663a2824680ea9b0462b75eccb324f4667e90ecac6->leave($__internal_3038eb0377ec74d81bfb6f663a2824680ea9b0462b75eccb324f4667e90ecac6_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  67 => 12,  56 => 7,  53 => 6,  47 => 5,  36 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% block toolbar %}{% endblock %}

{% block menu %}
<span class=\"label\">
    <span class=\"icon\">{{ include('@WebProfiler/Icon/router.svg') }}</span>
    <strong>Routing</strong>
</span>
{% endblock %}

{% block panel %}
    {{ render(path('_profiler_router', { token: token })) }}
{% endblock %}
", "@WebProfiler/Collector/router.html.twig", "/var/www/html/SHN/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views/Collector/router.html.twig");
    }
}
