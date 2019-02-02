<?php

/* PrestaShopBundle:Admin/Module/Includes:modal_addons_connect.html.twig */
class __TwigTemplate_80e7487bb6abaf92936744c77b6f8a7022e49ab8ae5b1ff613de93d15bd5f3d0 extends Twig_Template
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
        echo "<div id=\"module-modal-addons-connect\" class=\"modal  modal-vcenter fade\" role=\"dialog\">
  <div class=\"modal-dialog\">
    <!-- Modal content-->
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
        <h4 class=\"modal-title module-modal-title\">";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Connect to Addons marketplace", array(), "Admin.Modules.Feature"), "html", null, true);
        echo "</h4>
      </div>
      <div class=\"modal-body\">
        ";
        // line 34
        if ((($context["level"] ?? null) <= twig_constant("PrestaShopBundle\\Security\\Voter\\PageVoter::LEVEL_UPDATE"))) {
            // line 35
            echo "          <div class=\"row\">
            <div class=\"col-md-12\">
              <div class=\"alert alert-danger\">
                <p>
                  ";
            // line 39
            echo twig_escape_filter($this->env, ($context["errorMessage"] ?? null), "html", null, true);
            echo "
                </p>
              </div>
            </div>
          </div>
        ";
        } else {
            // line 45
            echo "          <div class=\"row\">
              <div class=\"col-md-12\">
                  <p>
                      ";
            // line 48
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Link your shop to your Addons account to automatically receive important updates for the modules you purchased. Don't have an account yet?", array(), "Admin.Modules.Feature"), "html", null, true);
            echo "
                      <a href=\"http://addons.prestashop.com/authentication.php\" target=\"_blank\">";
            // line 49
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Sign up now", array(), "Admin.Modules.Feature"), "html", null, true);
            echo "</a>
                  </p>
                  <form id=\"addons-connect-form\"  action=\"";
            // line 51
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_addons_login");
            echo "\" method=\"POST\">
                  <div class=\"form-group\">
                    <label for=\"module-addons-connect-email\">";
            // line 53
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Email address", array(), "Admin.Global"), "html", null, true);
            echo "</label>
                    <input name=\"username_addons\" type=\"email\" class=\"form-control\" id=\"module-addons-connect-email\" placeholder=\"Email\">
                  </div>
                  <div class=\"form-group\">
                    <label for=\"module-addons-connect-password\">";
            // line 57
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Password", array(), "Admin.Global"), "html", null, true);
            echo "</label>
                    <input name=\"password_addons\" type=\"password\" class=\"form-control\" id=\"module-addons-connect-password\" placeholder=\"Password\">
                  </div>
                  <div class=\"checkbox\">
                    <label>
                      <input name=\"addons_remember_me\" type=\"checkbox\"> ";
            // line 62
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Remember me", array(), "Admin.Global"), "html", null, true);
            echo "
                    </label>
                  </div>
                  <button type=\"submit\" class=\"btn btn-primary\">";
            // line 65
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Let's go!", array(), "Admin.Actions"), "html", null, true);
            echo "</button>
                  <button id=\"addons_login_btn\" class=\"btn btn-primary-reverse btn-lg onclick\" style=\"display:none;\"></button>
                </form>
                <p>
                    <a href=\"http://addons.prestashop.com/password.php\" target=\"_blank\">";
            // line 69
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Forgot your password?", array(), "Admin.Global"), "html", null, true);
            echo "</a>
                </p>
              </div>
          </div>
        ";
        }
        // line 74
        echo "      </div>
    </div>
  </div>
</div>
<div id=\"module-modal-addons-logout\" class=\"modal  modal-vcenter fade\" role=\"dialog\">
  <div class=\"modal-dialog\">
    <!-- Modal content-->
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
        <h4 class=\"modal-title module-modal-title\">";
        // line 84
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Confirm logout", array(), "Admin.Modules.Feature"), "html", null, true);
        echo "</h4>
      </div>
      <div class=\"modal-body\">
          <div class=\"row\">
              <div class=\"col-md-12\">
                  <p>
                    ";
        // line 90
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("You are about to log out your Addons account. You might miss important updates of Addons you've bought.", array(), "Admin.Modules.Notification"), "html", null, true);
        echo "
                  </p>
              </div>
          </div>
      </div>
      <div class=\"modal-footer\">
          <input type=\"button\" class=\"btn btn-default uppercase\" data-dismiss=\"modal\" value=\"";
        // line 96
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Cancel", array(), "Admin.Actions"), "html", null, true);
        echo "\">
          <a class=\"btn btn-primary uppercase\" href=\"";
        // line 97
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_addons_logout");
        echo "\" id=\"module-modal-addons-logout-ack\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Yes, log out", array(), "Admin.Modules.Feature"), "html", null, true);
        echo "</a>
      </div>

    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Module/Includes:modal_addons_connect.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  139 => 97,  135 => 96,  126 => 90,  117 => 84,  105 => 74,  97 => 69,  90 => 65,  84 => 62,  76 => 57,  69 => 53,  64 => 51,  59 => 49,  55 => 48,  50 => 45,  41 => 39,  35 => 35,  33 => 34,  27 => 31,  19 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin/Module/Includes:modal_addons_connect.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Module/Includes/modal_addons_connect.html.twig");
    }
}
