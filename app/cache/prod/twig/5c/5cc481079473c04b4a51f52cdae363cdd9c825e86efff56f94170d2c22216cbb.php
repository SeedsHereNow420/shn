<?php

/* PrestaShopBundle:Admin/TwigTemplateForm:form_div_layout.html.twig */
class __TwigTemplate_143ab9a0eddbfbbe95b30ae2206bc8c9b2ab3b3176ea19aebfcb0793a23d5ba0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'form_widget' => array($this, 'block_form_widget'),
            'form_widget_simple' => array($this, 'block_form_widget_simple'),
            'form_widget_compound' => array($this, 'block_form_widget_compound'),
            'collection_widget' => array($this, 'block_collection_widget'),
            'textarea_widget' => array($this, 'block_textarea_widget'),
            'choice_widget' => array($this, 'block_choice_widget'),
            'choice_widget_expanded' => array($this, 'block_choice_widget_expanded'),
            'choice_widget_collapsed' => array($this, 'block_choice_widget_collapsed'),
            'choice_widget_options' => array($this, 'block_choice_widget_options'),
            'checkbox_widget' => array($this, 'block_checkbox_widget'),
            'radio_widget' => array($this, 'block_radio_widget'),
            'datetime_widget' => array($this, 'block_datetime_widget'),
            'date_widget' => array($this, 'block_date_widget'),
            'time_widget' => array($this, 'block_time_widget'),
            'number_widget' => array($this, 'block_number_widget'),
            'integer_widget' => array($this, 'block_integer_widget'),
            'money_widget' => array($this, 'block_money_widget'),
            'url_widget' => array($this, 'block_url_widget'),
            'search_widget' => array($this, 'block_search_widget'),
            'percent_widget' => array($this, 'block_percent_widget'),
            'password_widget' => array($this, 'block_password_widget'),
            'hidden_widget' => array($this, 'block_hidden_widget'),
            'email_widget' => array($this, 'block_email_widget'),
            'button_widget' => array($this, 'block_button_widget'),
            'submit_widget' => array($this, 'block_submit_widget'),
            'reset_widget' => array($this, 'block_reset_widget'),
            'form_label' => array($this, 'block_form_label'),
            'button_label' => array($this, 'block_button_label'),
            'repeated_row' => array($this, 'block_repeated_row'),
            'form_row' => array($this, 'block_form_row'),
            'button_row' => array($this, 'block_button_row'),
            'hidden_row' => array($this, 'block_hidden_row'),
            'form' => array($this, 'block_form'),
            'form_start' => array($this, 'block_form_start'),
            'form_end' => array($this, 'block_form_end'),
            'form_enctype' => array($this, 'block_form_enctype'),
            'form_errors' => array($this, 'block_form_errors'),
            'form_rest' => array($this, 'block_form_rest'),
            'form_rows' => array($this, 'block_form_rows'),
            'widget_attributes' => array($this, 'block_widget_attributes'),
            'widget_container_attributes' => array($this, 'block_widget_container_attributes'),
            'button_attributes' => array($this, 'block_button_attributes'),
            'attributes' => array($this, 'block_attributes'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 27
        $this->displayBlock('form_widget', $context, $blocks);
        // line 35
        $this->displayBlock('form_widget_simple', $context, $blocks);
        // line 41
        $this->displayBlock('form_widget_compound', $context, $blocks);
        // line 51
        $this->displayBlock('collection_widget', $context, $blocks);
        // line 58
        $this->displayBlock('textarea_widget', $context, $blocks);
        // line 63
        $this->displayBlock('choice_widget', $context, $blocks);
        // line 71
        $this->displayBlock('choice_widget_expanded', $context, $blocks);
        // line 80
        $this->displayBlock('choice_widget_collapsed', $context, $blocks);
        // line 101
        $this->displayBlock('choice_widget_options', $context, $blocks);
        // line 116
        $this->displayBlock('checkbox_widget', $context, $blocks);
        // line 122
        $this->displayBlock('radio_widget', $context, $blocks);
        // line 127
        $this->displayBlock('datetime_widget', $context, $blocks);
        // line 140
        $this->displayBlock('date_widget', $context, $blocks);
        // line 154
        $this->displayBlock('time_widget', $context, $blocks);
        // line 165
        $this->displayBlock('number_widget', $context, $blocks);
        // line 171
        $this->displayBlock('integer_widget', $context, $blocks);
        // line 176
        $this->displayBlock('money_widget', $context, $blocks);
        // line 180
        $this->displayBlock('url_widget', $context, $blocks);
        // line 185
        $this->displayBlock('search_widget', $context, $blocks);
        // line 190
        $this->displayBlock('percent_widget', $context, $blocks);
        // line 195
        $this->displayBlock('password_widget', $context, $blocks);
        // line 200
        $this->displayBlock('hidden_widget', $context, $blocks);
        // line 205
        $this->displayBlock('email_widget', $context, $blocks);
        // line 210
        $this->displayBlock('button_widget', $context, $blocks);
        // line 224
        $this->displayBlock('submit_widget', $context, $blocks);
        // line 229
        $this->displayBlock('reset_widget', $context, $blocks);
        // line 236
        $this->displayBlock('form_label', $context, $blocks);
        // line 271
        $this->displayBlock('button_label', $context, $blocks);
        // line 275
        $this->displayBlock('repeated_row', $context, $blocks);
        // line 283
        $this->displayBlock('form_row', $context, $blocks);
        // line 291
        $this->displayBlock('button_row', $context, $blocks);
        // line 297
        $this->displayBlock('hidden_row', $context, $blocks);
        // line 303
        $this->displayBlock('form', $context, $blocks);
        // line 309
        $this->displayBlock('form_start', $context, $blocks);
        // line 323
        $this->displayBlock('form_end', $context, $blocks);
        // line 330
        $this->displayBlock('form_enctype', $context, $blocks);
        // line 334
        $this->displayBlock('form_errors', $context, $blocks);
        // line 344
        $this->displayBlock('form_rest', $context, $blocks);
        // line 351
        echo "
";
        // line 354
        $this->displayBlock('form_rows', $context, $blocks);
        // line 360
        $this->displayBlock('widget_attributes', $context, $blocks);
        // line 377
        $this->displayBlock('widget_container_attributes', $context, $blocks);
        // line 391
        $this->displayBlock('button_attributes', $context, $blocks);
        // line 405
        $this->displayBlock('attributes', $context, $blocks);
    }

    // line 27
    public function block_form_widget($context, array $blocks = array())
    {
        // line 28
        if (($context["compound"] ?? null)) {
            // line 29
            $this->displayBlock("form_widget_compound", $context, $blocks);
        } else {
            // line 31
            $this->displayBlock("form_widget_simple", $context, $blocks);
        }
    }

    // line 35
    public function block_form_widget_simple($context, array $blocks = array())
    {
        // line 36
        $context["type"] = ((array_key_exists("type", $context)) ? (_twig_default_filter(($context["type"] ?? null), "text")) : ("text"));
        // line 37
        echo "<input type=\"";
        echo twig_escape_filter($this->env, ($context["type"] ?? null), "html", null, true);
        echo "\" ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        echo " ";
        if ( !twig_test_empty(($context["value"] ?? null))) {
            echo "value=\"";
            echo twig_escape_filter($this->env, ($context["value"] ?? null), "html", null, true);
            echo "\" ";
        }
        echo "/>
  ";
        // line 38
        $this->loadTemplate("PrestaShopBundle:Admin:Product/Include/form_max_length.html.twig", "PrestaShopBundle:Admin/TwigTemplateForm:form_div_layout.html.twig", 38)->display(array_merge($context, array("attr" => ($context["attr"] ?? null))));
    }

    // line 41
    public function block_form_widget_compound($context, array $blocks = array())
    {
        // line 42
        echo "<div ";
        $this->displayBlock("widget_container_attributes", $context, $blocks);
        echo ">";
        // line 43
        if (twig_test_empty($this->getAttribute(($context["form"] ?? null), "parent", array()))) {
            // line 44
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["form"] ?? null), 'errors');
        }
        // line 46
        $this->displayBlock("form_rows", $context, $blocks);
        // line 47
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["form"] ?? null), 'rest');
        // line 48
        echo "</div>";
    }

    // line 51
    public function block_collection_widget($context, array $blocks = array())
    {
        // line 52
        if (array_key_exists("prototype", $context)) {
            // line 53
            $context["attr"] = twig_array_merge(($context["attr"] ?? null), array("data-prototype" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["prototype"] ?? null), 'row')));
        }
        // line 55
        $this->displayBlock("form_widget", $context, $blocks);
    }

    // line 58
    public function block_textarea_widget($context, array $blocks = array())
    {
        // line 59
        echo "<textarea ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        echo ">";
        echo twig_escape_filter($this->env, ($context["value"] ?? null), "html", null, true);
        echo "</textarea>
  ";
        // line 60
        $this->loadTemplate("PrestaShopBundle:Admin:Product/Include/form_max_length.html.twig", "PrestaShopBundle:Admin/TwigTemplateForm:form_div_layout.html.twig", 60)->display(array_merge($context, array("attr" => ($context["attr"] ?? null))));
    }

    // line 63
    public function block_choice_widget($context, array $blocks = array())
    {
        // line 64
        if (($context["expanded"] ?? null)) {
            // line 65
            $this->displayBlock("choice_widget_expanded", $context, $blocks);
        } else {
            // line 67
            $this->displayBlock("choice_widget_collapsed", $context, $blocks);
        }
    }

    // line 71
    public function block_choice_widget_expanded($context, array $blocks = array())
    {
        // line 72
        echo "<div ";
        $this->displayBlock("widget_container_attributes", $context, $blocks);
        echo ">";
        // line 73
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 74
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["child"], 'widget');
            // line 75
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["child"], 'label', array("translation_domain" => ($context["choice_translation_domain"] ?? null)));
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 77
        echo "</div>";
    }

    // line 80
    public function block_choice_widget_collapsed($context, array $blocks = array())
    {
        // line 81
        if ((((($context["required"] ?? null) && (null === ($context["placeholder"] ?? null))) &&  !($context["placeholder_in_choices"] ?? null)) &&  !($context["multiple"] ?? null))) {
            // line 82
            $context["required"] = false;
        }
        // line 84
        echo "<select ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        if (($context["multiple"] ?? null)) {
            echo " multiple=\"multiple\"";
        }
        echo " data-toggle=\"select2\">";
        // line 85
        if ( !(null === ($context["placeholder"] ?? null))) {
            // line 86
            echo "<option
        value=\"\"";
            // line 87
            if ((($context["required"] ?? null) && twig_test_empty(($context["value"] ?? null)))) {
                echo " selected=\"selected\"";
            }
            echo ">";
            echo twig_escape_filter($this->env, (((($context["placeholder"] ?? null) != "")) ? (($context["placeholder"] ?? null)) : ("")), "html", null, true);
            echo "</option>";
        }
        // line 89
        if ((twig_length_filter($this->env, ($context["preferred_choices"] ?? null)) > 0)) {
            // line 90
            $context["options"] = ($context["preferred_choices"] ?? null);
            // line 91
            $this->displayBlock("choice_widget_options", $context, $blocks);
            // line 92
            if (((twig_length_filter($this->env, ($context["choices"] ?? null)) > 0) &&  !(null === ($context["separator"] ?? null)))) {
                // line 93
                echo "<option disabled=\"disabled\">";
                echo twig_escape_filter($this->env, ($context["separator"] ?? null), "html", null, true);
                echo "</option>";
            }
        }
        // line 96
        $context["options"] = ($context["choices"] ?? null);
        // line 97
        $this->displayBlock("choice_widget_options", $context, $blocks);
        // line 98
        echo "</select>";
    }

    // line 101
    public function block_choice_widget_options($context, array $blocks = array())
    {
        // line 102
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["options"] ?? null));
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
        foreach ($context['_seq'] as $context["group_label"] => $context["choice"]) {
            // line 103
            if (twig_test_iterable($context["choice"])) {
                // line 104
                echo "<optgroup label=\"";
                echo twig_escape_filter($this->env, (((($context["choice_translation_domain"] ?? null) === false)) ? ($context["group_label"]) : ($context["group_label"])), "html", null, true);
                echo "\">
        ";
                // line 105
                $context["options"] = $context["choice"];
                // line 106
                $this->displayBlock("choice_widget_options", $context, $blocks);
                // line 107
                echo "</optgroup>";
            } else {
                // line 109
                $context["attr"] = $this->getAttribute($context["choice"], "attr", array());
                // line 110
                echo "      <option
        value=\"";
                // line 111
                echo twig_escape_filter($this->env, $this->getAttribute($context["choice"], "value", array()), "html", null, true);
                echo "\" ";
                $this->displayBlock("attributes", $context, $blocks);
                if ($this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->isSelectedChoice($context["choice"], ($context["value"] ?? null))) {
                    echo " selected=\"selected\"";
                }
                echo ">";
                echo twig_escape_filter($this->env, (((($context["choice_translation_domain"] ?? null) === false)) ? ($this->getAttribute($context["choice"], "label", array())) : ($this->getAttribute($context["choice"], "label", array()))), "html", null, true);
                echo "</option>";
            }
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
        unset($context['_seq'], $context['_iterated'], $context['group_label'], $context['choice'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    // line 116
    public function block_checkbox_widget($context, array $blocks = array())
    {
        // line 117
        $context["switch"] = ((array_key_exists("switch", $context)) ? (_twig_default_filter(($context["switch"] ?? null), "")) : (""));
        // line 118
        echo "<input type=\"checkbox\"
         ";
        // line 119
        if (($context["switch"] ?? null)) {
            echo "data-toggle=\"switch\"";
        }
        echo " ";
        if (($context["switch"] ?? null)) {
            echo "class=\"";
            echo twig_escape_filter($this->env, ($context["switch"] ?? null), "html", null, true);
            echo "\"";
        }
        echo " ";
        $this->displayBlock("widget_attributes", $context, $blocks);
        if (array_key_exists("value", $context)) {
            echo " value=\"";
            echo twig_escape_filter($this->env, ($context["value"] ?? null), "html", null, true);
            echo "\"";
        }
        if (($context["checked"] ?? null)) {
            echo " checked=\"checked\"";
        }
        echo " />
";
    }

    // line 122
    public function block_radio_widget($context, array $blocks = array())
    {
        // line 123
        echo "<input
    type=\"radio\" ";
        // line 124
        $this->displayBlock("widget_attributes", $context, $blocks);
        if (array_key_exists("value", $context)) {
            echo " value=\"";
            echo twig_escape_filter($this->env, ($context["value"] ?? null), "html", null, true);
            echo "\"";
        }
        if (($context["checked"] ?? null)) {
            echo " checked=\"checked\"";
        }
        echo " />
";
    }

    // line 127
    public function block_datetime_widget($context, array $blocks = array())
    {
        // line 128
        if ((($context["widget"] ?? null) == "single_text")) {
            // line 129
            $this->displayBlock("form_widget_simple", $context, $blocks);
        } else {
            // line 131
            echo "<div ";
            $this->displayBlock("widget_container_attributes", $context, $blocks);
            echo ">";
            // line 132
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "date", array()), 'errors');
            // line 133
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "time", array()), 'errors');
            // line 134
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "date", array()), 'widget');
            // line 135
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "time", array()), 'widget');
            // line 136
            echo "</div>";
        }
    }

    // line 140
    public function block_date_widget($context, array $blocks = array())
    {
        // line 141
        if ((($context["widget"] ?? null) == "single_text")) {
            // line 142
            $this->displayBlock("form_widget_simple", $context, $blocks);
        } else {
            // line 144
            echo "<div ";
            $this->displayBlock("widget_container_attributes", $context, $blocks);
            echo ">";
            // line 145
            echo twig_replace_filter(($context["date_pattern"] ?? null), array("{{ year }}" =>             // line 146
$this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "year", array()), 'widget'), "{{ month }}" =>             // line 147
$this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "month", array()), 'widget'), "{{ day }}" =>             // line 148
$this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "day", array()), 'widget')));
            // line 150
            echo "</div>";
        }
    }

    // line 154
    public function block_time_widget($context, array $blocks = array())
    {
        // line 155
        if ((($context["widget"] ?? null) == "single_text")) {
            // line 156
            $this->displayBlock("form_widget_simple", $context, $blocks);
        } else {
            // line 158
            $context["vars"] = (((($context["widget"] ?? null) == "text")) ? (array("attr" => array("size" => 1))) : (array()));
            // line 159
            echo "<div ";
            $this->displayBlock("widget_container_attributes", $context, $blocks);
            echo ">
      ";
            // line 160
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "hour", array()), 'widget', ($context["vars"] ?? null));
            if (($context["with_minutes"] ?? null)) {
                echo ":";
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "minute", array()), 'widget', ($context["vars"] ?? null));
            }
            if (($context["with_seconds"] ?? null)) {
                echo ":";
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "second", array()), 'widget', ($context["vars"] ?? null));
            }
            // line 161
            echo "    </div>";
        }
    }

    // line 165
    public function block_number_widget($context, array $blocks = array())
    {
        // line 167
        $context["type"] = ((array_key_exists("type", $context)) ? (_twig_default_filter(($context["type"] ?? null), "text")) : ("text"));
        // line 168
        $this->displayBlock("form_widget_simple", $context, $blocks);
    }

    // line 171
    public function block_integer_widget($context, array $blocks = array())
    {
        // line 172
        $context["type"] = ((array_key_exists("type", $context)) ? (_twig_default_filter(($context["type"] ?? null), "number")) : ("number"));
        // line 173
        $this->displayBlock("form_widget_simple", $context, $blocks);
    }

    // line 176
    public function block_money_widget($context, array $blocks = array())
    {
        // line 177
        echo twig_replace_filter(($context["money_pattern"] ?? null), array("{{ widget }}" =>         $this->renderBlock("form_widget_simple", $context, $blocks)));
    }

    // line 180
    public function block_url_widget($context, array $blocks = array())
    {
        // line 181
        $context["type"] = ((array_key_exists("type", $context)) ? (_twig_default_filter(($context["type"] ?? null), "url")) : ("url"));
        // line 182
        $this->displayBlock("form_widget_simple", $context, $blocks);
    }

    // line 185
    public function block_search_widget($context, array $blocks = array())
    {
        // line 186
        $context["type"] = ((array_key_exists("type", $context)) ? (_twig_default_filter(($context["type"] ?? null), "search")) : ("search"));
        // line 187
        $this->displayBlock("form_widget_simple", $context, $blocks);
    }

    // line 190
    public function block_percent_widget($context, array $blocks = array())
    {
        // line 191
        $context["type"] = ((array_key_exists("type", $context)) ? (_twig_default_filter(($context["type"] ?? null), "text")) : ("text"));
        // line 192
        $this->displayBlock("form_widget_simple", $context, $blocks);
        echo " %";
    }

    // line 195
    public function block_password_widget($context, array $blocks = array())
    {
        // line 196
        $context["type"] = ((array_key_exists("type", $context)) ? (_twig_default_filter(($context["type"] ?? null), "password")) : ("password"));
        // line 197
        $this->displayBlock("form_widget_simple", $context, $blocks);
    }

    // line 200
    public function block_hidden_widget($context, array $blocks = array())
    {
        // line 201
        $context["type"] = ((array_key_exists("type", $context)) ? (_twig_default_filter(($context["type"] ?? null), "hidden")) : ("hidden"));
        // line 202
        $this->displayBlock("form_widget_simple", $context, $blocks);
    }

    // line 205
    public function block_email_widget($context, array $blocks = array())
    {
        // line 206
        $context["type"] = ((array_key_exists("type", $context)) ? (_twig_default_filter(($context["type"] ?? null), "email")) : ("email"));
        // line 207
        $this->displayBlock("form_widget_simple", $context, $blocks);
    }

    // line 210
    public function block_button_widget($context, array $blocks = array())
    {
        // line 211
        if (twig_test_empty(($context["label"] ?? null))) {
            // line 212
            if ( !twig_test_empty(($context["label_format"] ?? null))) {
                // line 213
                $context["label"] = twig_replace_filter(($context["label_format"] ?? null), array("%name%" =>                 // line 214
($context["name"] ?? null), "%id%" =>                 // line 215
($context["id"] ?? null)));
            } else {
                // line 218
                $context["label"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->humanize(($context["name"] ?? null));
            }
        }
        // line 221
        echo "<button type=\"";
        echo twig_escape_filter($this->env, ((array_key_exists("type", $context)) ? (_twig_default_filter(($context["type"] ?? null), "button")) : ("button")), "html", null, true);
        echo "\" ";
        $this->displayBlock("button_attributes", $context, $blocks);
        echo ">";
        echo twig_escape_filter($this->env, ($context["label"] ?? null), "html", null, true);
        echo "</button>";
    }

    // line 224
    public function block_submit_widget($context, array $blocks = array())
    {
        // line 225
        $context["type"] = ((array_key_exists("type", $context)) ? (_twig_default_filter(($context["type"] ?? null), "submit")) : ("submit"));
        // line 226
        $this->displayBlock("button_widget", $context, $blocks);
    }

    // line 229
    public function block_reset_widget($context, array $blocks = array())
    {
        // line 230
        $context["type"] = ((array_key_exists("type", $context)) ? (_twig_default_filter(($context["type"] ?? null), "reset")) : ("reset"));
        // line 231
        $this->displayBlock("button_widget", $context, $blocks);
    }

    // line 236
    public function block_form_label($context, array $blocks = array())
    {
        // line 237
        if ( !(($context["label"] ?? null) === false)) {
            // line 238
            if ( !($context["compound"] ?? null)) {
                // line 239
                $context["label_attr"] = twig_array_merge(($context["label_attr"] ?? null), array("for" => ($context["id"] ?? null)));
            }
            // line 241
            echo "    ";
            if (($context["required"] ?? null)) {
                // line 242
                $context["label_attr"] = twig_array_merge(($context["label_attr"] ?? null), array("class" => twig_trim_filter(((($this->getAttribute(($context["label_attr"] ?? null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["label_attr"] ?? null), "class", array()), "")) : ("")) . " required"))));
            }
            // line 244
            echo "    ";
            if (twig_test_empty(($context["label"] ?? null))) {
                // line 245
                if ( !twig_test_empty(($context["label_format"] ?? null))) {
                    // line 246
                    $context["label"] = twig_replace_filter(($context["label_format"] ?? null), array("%name%" =>                     // line 247
($context["name"] ?? null), "%id%" =>                     // line 248
($context["id"] ?? null)));
                } else {
                    // line 251
                    $context["label"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->humanize(($context["name"] ?? null));
                }
            }
            // line 254
            echo "<label";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["label_attr"] ?? null));
            foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
                echo " ";
                echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, $context["attrvalue"], "html", null, true);
                echo "\"";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo ">";
            echo (((($context["translation_domain"] ?? null) === false)) ? (($context["label"] ?? null)) : (($context["label"] ?? null)));
            echo "
      ";
            // line 255
            if ($this->getAttribute(($context["label_attr"] ?? null), "tooltip", array(), "array", true, true)) {
                // line 256
                echo "        ";
                $context["placement"] = (($this->getAttribute(($context["label_attr"] ?? null), "tooltip_placement", array(), "array", true, true)) ? ($this->getAttribute(($context["label_attr"] ?? null), "tooltip_placement", array(), "array")) : ("top"));
                // line 257
                echo "        <i class=\"icon-question\" data-toggle=\"tooltip\" data-placement=\"";
                echo twig_escape_filter($this->env, ($context["placement"] ?? null), "html", null, true);
                echo "\"
           title=\"";
                // line 258
                echo twig_escape_filter($this->env, $this->getAttribute(($context["label_attr"] ?? null), "tooltip", array(), "array"), "html", null, true);
                echo "\"></i>
      ";
            }
            // line 260
            echo "
      ";
            // line 261
            if ($this->getAttribute(($context["label_attr"] ?? null), "popover", array(), "array", true, true)) {
                // line 262
                echo "        ";
                $context["placement"] = (($this->getAttribute(($context["label_attr"] ?? null), "popover_placement", array(), "array", true, true)) ? ($this->getAttribute(($context["label_attr"] ?? null), "popover_placement", array(), "array")) : ("top"));
                // line 263
                echo "        <span class=\"help-box\" data-toggle=\"popover\" data-placement=\"";
                echo twig_escape_filter($this->env, ($context["placement"] ?? null), "html", null, true);
                echo "\"
           data-content=\"";
                // line 264
                echo twig_escape_filter($this->env, $this->getAttribute(($context["label_attr"] ?? null), "popover", array(), "array"), "html", null, true);
                echo "\"></span>
      ";
            }
            // line 266
            echo "    </label>";
        }
    }

    // line 271
    public function block_button_label($context, array $blocks = array())
    {
    }

    // line 275
    public function block_repeated_row($context, array $blocks = array())
    {
        // line 280
        $this->displayBlock("form_rows", $context, $blocks);
    }

    // line 283
    public function block_form_row($context, array $blocks = array())
    {
        // line 284
        echo "<div>";
        // line 285
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["form"] ?? null), 'label');
        // line 286
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["form"] ?? null), 'errors');
        // line 287
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        // line 288
        echo "</div>";
    }

    // line 291
    public function block_button_row($context, array $blocks = array())
    {
        // line 292
        echo "<div>";
        // line 293
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        // line 294
        echo "</div>";
    }

    // line 297
    public function block_hidden_row($context, array $blocks = array())
    {
        // line 298
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["form"] ?? null), 'widget');
    }

    // line 303
    public function block_form($context, array $blocks = array())
    {
        // line 304
        echo         $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->renderBlock(($context["form"] ?? null), 'form_start');
        // line 305
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        // line 306
        echo         $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->renderBlock(($context["form"] ?? null), 'form_end');
    }

    // line 309
    public function block_form_start($context, array $blocks = array())
    {
        // line 310
        $context["method"] = twig_upper_filter($this->env, ($context["method"] ?? null));
        // line 311
        if (twig_in_filter(($context["method"] ?? null), array(0 => "GET", 1 => "POST"))) {
            // line 312
            $context["form_method"] = ($context["method"] ?? null);
        } else {
            // line 314
            $context["form_method"] = "POST";
        }
        // line 316
        echo "<form name=\"";
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "\"
        method=\"";
        // line 317
        echo twig_escape_filter($this->env, twig_lower_filter($this->env, ($context["form_method"] ?? null)), "html", null, true);
        echo "\" action=\"";
        echo twig_escape_filter($this->env, ($context["action"] ?? null), "html", null, true);
        echo "\"";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["attr"] ?? null));
        foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
            echo " ";
            echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
            echo "=\"";
            echo twig_escape_filter($this->env, $context["attrvalue"], "html", null, true);
            echo "\"";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        if (($context["multipart"] ?? null)) {
            echo " enctype=\"multipart/form-data\"";
        }
        echo ">";
        // line 318
        if ((($context["form_method"] ?? null) != ($context["method"] ?? null))) {
            // line 319
            echo "<input type=\"hidden\" name=\"_method\" value=\"";
            echo twig_escape_filter($this->env, ($context["method"] ?? null), "html", null, true);
            echo "\"/>";
        }
    }

    // line 323
    public function block_form_end($context, array $blocks = array())
    {
        // line 324
        if (( !array_key_exists("render_rest", $context) || ($context["render_rest"] ?? null))) {
            // line 325
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["form"] ?? null), 'rest');
        }
        // line 327
        echo "</form>";
    }

    // line 330
    public function block_form_enctype($context, array $blocks = array())
    {
        // line 331
        if (($context["multipart"] ?? null)) {
            echo "enctype=\"multipart/form-data\"";
        }
    }

    // line 334
    public function block_form_errors($context, array $blocks = array())
    {
        // line 335
        if ((twig_length_filter($this->env, ($context["errors"] ?? null)) > 0)) {
            // line 336
            echo "<ul>";
            // line 337
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["errors"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 338
                echo "<li>";
                echo twig_escape_filter($this->env, $this->getAttribute($context["error"], "message", array()), "html", null, true);
                echo "</li>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 340
            echo "</ul>";
        }
    }

    // line 344
    public function block_form_rest($context, array $blocks = array())
    {
        // line 345
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 346
            if ( !$this->getAttribute($context["child"], "rendered", array())) {
                // line 347
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["child"], 'row');
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    // line 354
    public function block_form_rows($context, array $blocks = array())
    {
        // line 355
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 356
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["child"], 'row');
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    // line 360
    public function block_widget_attributes($context, array $blocks = array())
    {
        // line 361
        echo "id=\"";
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "\" name=\"";
        echo twig_escape_filter($this->env, ($context["full_name"] ?? null), "html", null, true);
        echo "\"";
        // line 362
        if ((($context["read_only"] ?? null) &&  !$this->getAttribute(($context["attr"] ?? null), "readonly", array(), "any", true, true))) {
            echo " readonly=\"readonly\"";
        }
        // line 363
        if (($context["disabled"] ?? null)) {
            echo " disabled=\"disabled\"";
        }
        // line 364
        if (($context["required"] ?? null)) {
            echo " required=\"required\"";
        }
        // line 365
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["attr"] ?? null));
        foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
            // line 366
            echo " ";
            // line 367
            if (twig_in_filter($context["attrname"], array(0 => "placeholder", 1 => "title"))) {
                // line 368
                echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, $context["attrvalue"], "html", null, true);
                echo "\"";
            } elseif ((            // line 369
$context["attrvalue"] === true)) {
                // line 370
                echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                echo "\"";
            } elseif ( !(            // line 371
$context["attrvalue"] === false)) {
                // line 372
                echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, $context["attrvalue"], "html", null, true);
                echo "\"";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    // line 377
    public function block_widget_container_attributes($context, array $blocks = array())
    {
        // line 378
        if ( !twig_test_empty(($context["id"] ?? null))) {
            echo "id=\"";
            echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
            echo "\"";
        }
        // line 379
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["attr"] ?? null));
        foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
            // line 380
            echo " ";
            // line 381
            if (twig_in_filter($context["attrname"], array(0 => "placeholder", 1 => "title"))) {
                // line 382
                echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, $context["attrvalue"], "html", null, true);
                echo "\"";
            } elseif ((            // line 383
$context["attrvalue"] === true)) {
                // line 384
                echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                echo "\"";
            } elseif ( !(            // line 385
$context["attrvalue"] === false)) {
                // line 386
                echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, $context["attrvalue"], "html", null, true);
                echo "\"";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    // line 391
    public function block_button_attributes($context, array $blocks = array())
    {
        // line 392
        echo "id=\"";
        echo twig_escape_filter($this->env, ($context["id"] ?? null), "html", null, true);
        echo "\" name=\"";
        echo twig_escape_filter($this->env, ($context["full_name"] ?? null), "html", null, true);
        echo "\"";
        if (($context["disabled"] ?? null)) {
            echo " disabled=\"disabled\"";
        }
        // line 393
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["attr"] ?? null));
        foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
            // line 394
            echo " ";
            // line 395
            if (twig_in_filter($context["attrname"], array(0 => "placeholder", 1 => "title"))) {
                // line 396
                echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, $context["attrvalue"], "html", null, true);
                echo "\"";
            } elseif ((            // line 397
$context["attrvalue"] === true)) {
                // line 398
                echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                echo "\"";
            } elseif ( !(            // line 399
$context["attrvalue"] === false)) {
                // line 400
                echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, $context["attrvalue"], "html", null, true);
                echo "\"";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    // line 405
    public function block_attributes($context, array $blocks = array())
    {
        // line 406
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["attr"] ?? null));
        foreach ($context['_seq'] as $context["attrname"] => $context["attrvalue"]) {
            // line 407
            echo " ";
            // line 408
            if (twig_in_filter($context["attrname"], array(0 => "placeholder", 1 => "title"))) {
                // line 409
                echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, $context["attrvalue"], "html", null, true);
                echo "\"";
            } elseif ((            // line 410
$context["attrvalue"] === true)) {
                // line 411
                echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                echo "\"";
            } elseif ( !(            // line 412
$context["attrvalue"] === false)) {
                // line 413
                echo twig_escape_filter($this->env, $context["attrname"], "html", null, true);
                echo "=\"";
                echo twig_escape_filter($this->env, $context["attrvalue"], "html", null, true);
                echo "\"";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['attrname'], $context['attrvalue'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/TwigTemplateForm:form_div_layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  1074 => 413,  1072 => 412,  1067 => 411,  1065 => 410,  1060 => 409,  1058 => 408,  1056 => 407,  1052 => 406,  1049 => 405,  1037 => 400,  1035 => 399,  1030 => 398,  1028 => 397,  1023 => 396,  1021 => 395,  1019 => 394,  1015 => 393,  1006 => 392,  1003 => 391,  991 => 386,  989 => 385,  984 => 384,  982 => 383,  977 => 382,  975 => 381,  973 => 380,  969 => 379,  963 => 378,  960 => 377,  948 => 372,  946 => 371,  941 => 370,  939 => 369,  934 => 368,  932 => 367,  930 => 366,  926 => 365,  922 => 364,  918 => 363,  914 => 362,  908 => 361,  905 => 360,  897 => 356,  893 => 355,  890 => 354,  881 => 347,  879 => 346,  875 => 345,  872 => 344,  867 => 340,  859 => 338,  855 => 337,  853 => 336,  851 => 335,  848 => 334,  842 => 331,  839 => 330,  835 => 327,  832 => 325,  830 => 324,  827 => 323,  820 => 319,  818 => 318,  797 => 317,  792 => 316,  789 => 314,  786 => 312,  784 => 311,  782 => 310,  779 => 309,  775 => 306,  773 => 305,  771 => 304,  768 => 303,  764 => 298,  761 => 297,  757 => 294,  755 => 293,  753 => 292,  750 => 291,  746 => 288,  744 => 287,  742 => 286,  740 => 285,  738 => 284,  735 => 283,  731 => 280,  728 => 275,  723 => 271,  718 => 266,  713 => 264,  708 => 263,  705 => 262,  703 => 261,  700 => 260,  695 => 258,  690 => 257,  687 => 256,  685 => 255,  667 => 254,  663 => 251,  660 => 248,  659 => 247,  658 => 246,  656 => 245,  653 => 244,  650 => 242,  647 => 241,  644 => 239,  642 => 238,  640 => 237,  637 => 236,  633 => 231,  631 => 230,  628 => 229,  624 => 226,  622 => 225,  619 => 224,  609 => 221,  605 => 218,  602 => 215,  601 => 214,  600 => 213,  598 => 212,  596 => 211,  593 => 210,  589 => 207,  587 => 206,  584 => 205,  580 => 202,  578 => 201,  575 => 200,  571 => 197,  569 => 196,  566 => 195,  561 => 192,  559 => 191,  556 => 190,  552 => 187,  550 => 186,  547 => 185,  543 => 182,  541 => 181,  538 => 180,  534 => 177,  531 => 176,  527 => 173,  525 => 172,  522 => 171,  518 => 168,  516 => 167,  513 => 165,  508 => 161,  498 => 160,  493 => 159,  491 => 158,  488 => 156,  486 => 155,  483 => 154,  478 => 150,  476 => 148,  475 => 147,  474 => 146,  473 => 145,  469 => 144,  466 => 142,  464 => 141,  461 => 140,  456 => 136,  454 => 135,  452 => 134,  450 => 133,  448 => 132,  444 => 131,  441 => 129,  439 => 128,  436 => 127,  422 => 124,  419 => 123,  416 => 122,  392 => 119,  389 => 118,  387 => 117,  384 => 116,  359 => 111,  356 => 110,  354 => 109,  351 => 107,  349 => 106,  347 => 105,  342 => 104,  340 => 103,  323 => 102,  320 => 101,  316 => 98,  314 => 97,  312 => 96,  306 => 93,  304 => 92,  302 => 91,  300 => 90,  298 => 89,  290 => 87,  287 => 86,  285 => 85,  278 => 84,  275 => 82,  273 => 81,  270 => 80,  266 => 77,  260 => 75,  258 => 74,  254 => 73,  250 => 72,  247 => 71,  242 => 67,  239 => 65,  237 => 64,  234 => 63,  230 => 60,  223 => 59,  220 => 58,  216 => 55,  213 => 53,  211 => 52,  208 => 51,  204 => 48,  202 => 47,  200 => 46,  197 => 44,  195 => 43,  191 => 42,  188 => 41,  184 => 38,  171 => 37,  169 => 36,  166 => 35,  161 => 31,  158 => 29,  156 => 28,  153 => 27,  149 => 405,  147 => 391,  145 => 377,  143 => 360,  141 => 354,  138 => 351,  136 => 344,  134 => 334,  132 => 330,  130 => 323,  128 => 309,  126 => 303,  124 => 297,  122 => 291,  120 => 283,  118 => 275,  116 => 271,  114 => 236,  112 => 229,  110 => 224,  108 => 210,  106 => 205,  104 => 200,  102 => 195,  100 => 190,  98 => 185,  96 => 180,  94 => 176,  92 => 171,  90 => 165,  88 => 154,  86 => 140,  84 => 127,  82 => 122,  80 => 116,  78 => 101,  76 => 80,  74 => 71,  72 => 63,  70 => 58,  68 => 51,  66 => 41,  64 => 35,  62 => 27,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin/TwigTemplateForm:form_div_layout.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/TwigTemplateForm/form_div_layout.html.twig");
    }
}
