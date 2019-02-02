<?php

/* PrestaShopBundle:Admin/Helpers:range_inputs.html.twig */
class __TwigTemplate_9cfa28338d34bd78a7cb1a7433a5531c17aed938b2e4b66616fd1351d6380495 extends Twig_Template
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
        echo "<script>
    \$(document).ready(function() {
        var sliderInput = \$('#";
        // line 27
        echo twig_escape_filter($this->env, ($context["input_name"] ?? null), "html", null, true);
        echo "');
        var minInput = \$('#";
        // line 28
        echo twig_escape_filter($this->env, ($context["input_name"] ?? null), "html", null, true);
        echo "_min');
        var maxInput = \$('#";
        // line 29
        echo twig_escape_filter($this->env, ($context["input_name"] ?? null), "html", null, true);
        echo "_max');

        // parse and fix init value
        var value = sliderInput.attr('sql');
        if (value != '') {
\t        value = value.replace('BETWEEN ', '');
\t        value = value.replace(' AND ', ',');
\t        value = value.replace('<=', '";
        // line 36
        echo twig_escape_filter($this->env, ((array_key_exists("min", $context)) ? (_twig_default_filter(($context["min"] ?? null), "0")) : ("0")), "html", null, true);
        echo ",');
\t        value = value.replace('>=', '";
        // line 37
        echo twig_escape_filter($this->env, ((array_key_exists("max", $context)) ? (_twig_default_filter(($context["max"] ?? null), "1000000000")) : ("1000000000")), "html", null, true);
        echo ",');
\t        value = value.split(',');
\t        value[0] = Number(value[0]);
\t        value[1] = Number(value[1]);
        } else {
            value = [";
        // line 42
        echo twig_escape_filter($this->env, ((array_key_exists("min", $context)) ? (_twig_default_filter(($context["min"] ?? null), "0")) : ("0")), "html", null, true);
        echo ", ";
        echo twig_escape_filter($this->env, ((array_key_exists("max", $context)) ? (_twig_default_filter(($context["max"] ?? null), "1000000000")) : ("1000000000")), "html", null, true);
        echo "];
        }
        value = value.sort(function sortNumber(a,b) {
            return a - b;
        });

        // Init inputs
        if (value[0] > ";
        // line 49
        echo twig_escape_filter($this->env, ((array_key_exists("min", $context)) ? (_twig_default_filter(($context["min"] ?? null), "0")) : ("0")), "html", null, true);
        echo ")
            minInput.val(value[0]);
        if (value[1] < ";
        // line 51
        echo twig_escape_filter($this->env, ((array_key_exists("max", $context)) ? (_twig_default_filter(($context["max"] ?? null), "1000000000")) : ("1000000000")), "html", null, true);
        echo ")
            maxInput.val(value[1]);

        // Change events
        var inputFlasher = function(input) {
            // animate input to highlight it (like a pulsate effect on jqueryUI)
            \$(input).stop().delay(100)
                    .fadeIn(100).fadeOut(100)
                    .queue(function() { \$(this).css(\"background-color\", \"#FF5555\").dequeue(); })
                    .fadeIn(160).fadeOut(160).fadeIn(160).fadeOut(160).fadeIn(160)
                    .animate({ backgroundColor: \"#FFFFFF\"}, 800);
        };
        var updater = function(srcElement) {
            var isMinModified = (srcElement.attr('id') == minInput.attr('id'));

            // retrieve values, replace ',' by '.', cast them into numbers (float/int)
            var newValues = [(minInput.val()!='')?Number(minInput.val().replace(',', '.')):";
        // line 67
        echo twig_escape_filter($this->env, ((array_key_exists("min", $context)) ? (_twig_default_filter(($context["min"] ?? null), "0")) : ("0")), "html", null, true);
        echo ", (maxInput.val()!='')?Number(maxInput.val().replace(',', '.')):";
        echo twig_escape_filter($this->env, ((array_key_exists("max", $context)) ? (_twig_default_filter(($context["max"] ?? null), "1000000000")) : ("1000000000")), "html", null, true);
        echo "];

            // if newValues are out of bounds, or not valid, fix the element.
            if (isMinModified && !(newValues[0] >= ";
        // line 70
        echo twig_escape_filter($this->env, ((array_key_exists("min", $context)) ? (_twig_default_filter(($context["min"] ?? null), "0")) : ("0")), "html", null, true);
        echo " && newValues[0] <= ";
        echo twig_escape_filter($this->env, ((array_key_exists("max", $context)) ? (_twig_default_filter(($context["max"] ?? null), "1000000000")) : ("1000000000")), "html", null, true);
        echo ")) {
                newValues[0] = ";
        // line 71
        echo twig_escape_filter($this->env, ((array_key_exists("min", $context)) ? (_twig_default_filter(($context["min"] ?? null), "0")) : ("0")), "html", null, true);
        echo ";
                minInput.val('');
                inputFlasher(minInput);
            }
            if (!isMinModified && !(newValues[1] >= ";
        // line 75
        echo twig_escape_filter($this->env, ((array_key_exists("min", $context)) ? (_twig_default_filter(($context["min"] ?? null), "0")) : ("0")), "html", null, true);
        echo " && newValues[1] <= ";
        echo twig_escape_filter($this->env, ((array_key_exists("max", $context)) ? (_twig_default_filter(($context["max"] ?? null), "1000000000")) : ("1000000000")), "html", null, true);
        echo ")) {
                newValues[1] = ";
        // line 76
        echo twig_escape_filter($this->env, ((array_key_exists("max", $context)) ? (_twig_default_filter(($context["max"] ?? null), "1000000000")) : ("1000000000")), "html", null, true);
        echo ";
                maxInput.val('');
                inputFlasher(maxInput);
            }

            // if newValues are not ordered, fix the opposite input.
            if (isMinModified && newValues[0] > newValues[1]) {
                newValues[1] = newValues[0];
                maxInput.val(newValues[0]);
                inputFlasher(maxInput);
            }
            if (!isMinModified && newValues[0] > newValues[1]) {
                newValues[0] = newValues[1];
                minInput.val(newValues[0]);
                inputFlasher(minInput);
            }

            if (newValues[0] == ";
        // line 93
        echo twig_escape_filter($this->env, ((array_key_exists("min", $context)) ? (_twig_default_filter(($context["min"] ?? null), "0")) : ("0")), "html", null, true);
        echo " && newValues[1] == ";
        echo twig_escape_filter($this->env, ((array_key_exists("max", $context)) ? (_twig_default_filter(($context["max"] ?? null), "1000000000")) : ("1000000000")), "html", null, true);
        echo ") {
                sliderInput.attr('sql', '');
            } else if (newValues[0] == ";
        // line 95
        echo twig_escape_filter($this->env, ((array_key_exists("min", $context)) ? (_twig_default_filter(($context["min"] ?? null), "0")) : ("0")), "html", null, true);
        echo ") {
                sliderInput.attr('sql', '<='+newValues[1]);
            } else if (newValues[1] == ";
        // line 97
        echo twig_escape_filter($this->env, ((array_key_exists("max", $context)) ? (_twig_default_filter(($context["max"] ?? null), "1000000000")) : ("1000000000")), "html", null, true);
        echo ") {
                sliderInput.attr('sql', '>='+newValues[0]);
            } else {
                sliderInput.attr('sql', 'BETWEEN ' + newValues[0] + ' AND ' + newValues[1]);
            }

            ";
        // line 103
        if (array_key_exists("on_change_func_name", $context)) {
            // line 104
            echo "            var afterUpdate = function() {
                ";
            // line 105
            echo ($context["on_change_func_name"] ?? null);
            echo "
            };
            afterUpdate();
            ";
        }
        // line 109
        echo "        }
        minInput.on('change', function(event) {
            updater(\$(event.srcElement));
        });
        maxInput.on('change', function(event) {
            updater(\$(event.srcElement));
        });
    });
</script>
<div id=\"";
        // line 118
        echo twig_escape_filter($this->env, ($context["input_name"] ?? null), "html", null, true);
        echo "_div\">
    <input type=\"hidden\" id=\"";
        // line 119
        echo twig_escape_filter($this->env, ($context["input_name"] ?? null), "html", null, true);
        echo "\" name=\"";
        echo twig_escape_filter($this->env, ($context["input_name"] ?? null), "html", null, true);
        echo "\" value=\"\" sql=\"";
        echo twig_escape_filter($this->env, ($context["value"] ?? null), "html", null, true);
        echo "\" />
    <input class=\"form-control form-min-max\" type=\"text\" id=\"";
        // line 120
        echo twig_escape_filter($this->env, ($context["input_name"] ?? null), "html", null, true);
        echo "_min\" value=\"\" placeholder=\"";
        echo twig_escape_filter($this->env, ((array_key_exists("minLabel", $context)) ? (_twig_default_filter(($context["minLabel"] ?? null), "Min")) : ("Min")), "html", null, true);
        echo "\" />
    <input class=\"form-control form-min-max\" type=\"text\" id=\"";
        // line 121
        echo twig_escape_filter($this->env, ($context["input_name"] ?? null), "html", null, true);
        echo "_max\" value=\"\" placeholder=\"";
        echo twig_escape_filter($this->env, ((array_key_exists("maxLabel", $context)) ? (_twig_default_filter(($context["maxLabel"] ?? null), "Max")) : ("Max")), "html", null, true);
        echo "\" />
</div>
";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Helpers:range_inputs.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  198 => 121,  192 => 120,  184 => 119,  180 => 118,  169 => 109,  162 => 105,  159 => 104,  157 => 103,  148 => 97,  143 => 95,  136 => 93,  116 => 76,  110 => 75,  103 => 71,  97 => 70,  89 => 67,  70 => 51,  65 => 49,  53 => 42,  45 => 37,  41 => 36,  31 => 29,  27 => 28,  23 => 27,  19 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin/Helpers:range_inputs.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/Helpers/range_inputs.html.twig");
    }
}
