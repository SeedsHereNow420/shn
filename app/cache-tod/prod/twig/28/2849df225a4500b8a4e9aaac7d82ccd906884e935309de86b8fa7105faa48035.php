<?php

/* PrestaShopBundle:Admin/Module/Includes:modal_confirm_bulk_action.html.twig */
class __TwigTemplate_2da7740755b7a89aaec5d95d549227f7ce3231f49d95925262cd4c32f725df1e extends Twig_Template
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
        echo "<div id=\"module-modal-bulk-confirm\" class=\"modal  modal-vcenter fade\" role=\"dialog\">
  <div class=\"modal-dialog\">
    <!-- Modal content-->
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
        <h4 class=\"modal-title module-modal-title\">";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Bulk action confirmation", array(), "Admin.Modules.Feature"), "html", null, true);
        echo "</h4>
      </div>
      <div class=\"modal-body\">
          <div class=\"row\">
              <div class=\"col-md-12\">
                  <p>
                    ";
        // line 37
        echo twig_replace_filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("You are about to [1] the following modules:", array(), "Admin.Modules.Notification"), array("[1]" => "<span id=\"module-modal-bulk-confirm-action-name\">[Module Action]</span>"));
        echo "
                  </p>
                  <p id=\"module-modal-bulk-confirm-list\">
                      [Module List Up To 10 Max]
                  </p>

                  <div id=\"module-modal-bulk-checkbox\">
                    <label>
                      <input type=\"checkbox\" id=\"force_bulk_deletion\" name=\"force_bulk_deletion\"> ";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Optional: delete module folder after uninstall.", array(), "Admin.Modules.Feature"), "html", null, true);
        echo "
                    </label>
                  </div>
              </div>
          </div>
      </div>
      <div class=\"modal-footer\">
          <input type=\"button\" class=\"btn btn-default uppercase\" data-dismiss=\"modal\" value=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Cancel", array(), "Admin.Actions"), "html", null, true);
        echo "\">
          <a class=\"btn btn-primary uppercase\" data-dismiss=\"modal\" id=\"module-modal-confirm-bulk-ack\">";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Yes, I want to do it", array(), "Admin.Modules.Feature"), "html", null, true);
        echo "</a>
      </div>

    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Module/Includes:modal_confirm_bulk_action.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 53,  57 => 52,  47 => 45,  36 => 37,  27 => 31,  19 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin/Module/Includes:modal_confirm_bulk_action.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Module/Includes/modal_confirm_bulk_action.html.twig");
    }
}
