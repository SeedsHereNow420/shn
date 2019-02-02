<?php

/* PrestaShopBundle:Admin/Module/Includes:grid_loader.html.twig */
class __TwigTemplate_791b49f721970de8f1e69e36eca513d5a8e4b2b037472df69d1f2d82dcbdecfe extends Twig_Template
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
        // line 26
        echo "<div class=\"module-placeholders-wrapper row\">
    ";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(0, 8));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 28
            echo "
      <div class=\"timeline-item col-xl-3 col-lg-6 col-md-12 col-sm-12\">
        <div class=\"timeline-item-wrapper\">
            <div class=\"animated-background\">
              <div class=\"background-masker header-top\"></div>
              <div class=\"background-masker header-left\"></div>
              <div class=\"background-masker header-right\"></div>
              <div class=\"background-masker header-bottom\"></div>
              <div class=\"background-masker subheader-left\"></div>
              <div class=\"background-masker subheader-right\"></div>
              <div class=\"background-masker subheader-bottom\"></div>
              <div class=\"background-masker content-top\"></div>
              <div class=\"background-masker content-first-end\"></div>
              <div class=\"background-masker content-second-line\"></div>
              <div class=\"background-masker content-second-end\"></div>
              <div class=\"background-masker content-third-line\"></div>
              <div class=\"background-masker content-third-end\"></div>
            </div>
          </div>
      </div>

    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        echo "</div>

<div class=\"module-placeholders-failure row\">
      <div class=\"module-placeholders-failure-wrapper col-md-12\">
          <div class='module-placeholders-failure-msg'>
          </div>
          <button id='module-placeholders-failure-retry' type=\"button\" class=\"btn btn-primary\">";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Try again", array(), "Admin.Actions"), "html", null, true);
        echo "</button>
      </div>

</div>
";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Module/Includes:grid_loader.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 56,  53 => 50,  26 => 28,  22 => 27,  19 => 26,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin/Module/Includes:grid_loader.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Module/Includes/grid_loader.html.twig");
    }
}
