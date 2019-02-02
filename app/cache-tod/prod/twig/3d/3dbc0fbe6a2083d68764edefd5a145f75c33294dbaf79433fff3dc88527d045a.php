<?php

/* PrestaShopBundle:Admin/TwigTemplateForm:bootstrap_3_layout.html.twig */
class __TwigTemplate_082acfa45b6ebe08940bfb774448586394778bacd0dc123682fe3219a48e63b0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $_trait_0 = $this->loadTemplate("PrestaShopBundle:Admin/TwigTemplateForm:form_div_layout.html.twig", "PrestaShopBundle:Admin/TwigTemplateForm:bootstrap_3_layout.html.twig", 25);
        // line 25
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."PrestaShopBundle:Admin/TwigTemplateForm:form_div_layout.html.twig".'" cannot be used as a trait.');
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $_trait_1 = $this->loadTemplate("PrestaShopBundle:Admin/TwigTemplateForm:typeahead.html.twig", "PrestaShopBundle:Admin/TwigTemplateForm:bootstrap_3_layout.html.twig", 26);
        // line 26
        if (!$_trait_1->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."PrestaShopBundle:Admin/TwigTemplateForm:typeahead.html.twig".'" cannot be used as a trait.');
        }
        $_trait_1_blocks = $_trait_1->getBlocks();

        $this->traits = array_merge(
            $_trait_0_blocks,
            $_trait_1_blocks
        );

        $this->blocks = array_merge(
            $this->traits,
            array(
                'form_widget_simple' => array($this, 'block_form_widget_simple'),
                'textarea_widget' => array($this, 'block_textarea_widget'),
                'button_widget' => array($this, 'block_button_widget'),
                'money_widget' => array($this, 'block_money_widget'),
                'percent_widget' => array($this, 'block_percent_widget'),
                'datetime_widget' => array($this, 'block_datetime_widget'),
                'date_widget' => array($this, 'block_date_widget'),
                'time_widget' => array($this, 'block_time_widget'),
                'choice_widget_collapsed' => array($this, 'block_choice_widget_collapsed'),
                'choice_widget_expanded' => array($this, 'block_choice_widget_expanded'),
                'checkbox_widget' => array($this, 'block_checkbox_widget'),
                'radio_widget' => array($this, 'block_radio_widget'),
                'choice_tree_widget' => array($this, 'block_choice_tree_widget'),
                'choice_tree_item_widget' => array($this, 'block_choice_tree_item_widget'),
                'translatefields_widget' => array($this, 'block_translatefields_widget'),
                'translate_fields_widget' => array($this, 'block_translate_fields_widget'),
                'date_picker_widget' => array($this, 'block_date_picker_widget'),
                '_form_step6_attachments_widget' => array($this, 'block__form_step6_attachments_widget'),
                'form_label' => array($this, 'block_form_label'),
                'choice_label' => array($this, 'block_choice_label'),
                'checkbox_label' => array($this, 'block_checkbox_label'),
                'radio_label' => array($this, 'block_radio_label'),
                'checkbox_radio_label' => array($this, 'block_checkbox_radio_label'),
                'form_row' => array($this, 'block_form_row'),
                'button_row' => array($this, 'block_button_row'),
                'choice_row' => array($this, 'block_choice_row'),
                'date_row' => array($this, 'block_date_row'),
                'time_row' => array($this, 'block_time_row'),
                'datetime_row' => array($this, 'block_datetime_row'),
                'checkbox_row' => array($this, 'block_checkbox_row'),
                'radio_row' => array($this, 'block_radio_row'),
                'form_errors' => array($this, 'block_form_errors'),
            )
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 27
        echo "
";
        // line 29
        echo "
";
        // line 30
        $this->displayBlock('form_widget_simple', $context, $blocks);
        // line 36
        echo "
";
        // line 37
        $this->displayBlock('textarea_widget', $context, $blocks);
        // line 41
        echo "
";
        // line 42
        $this->displayBlock('button_widget', $context, $blocks);
        // line 46
        echo "
";
        // line 47
        $this->displayBlock('money_widget', $context, $blocks);
        // line 59
        echo "
";
        // line 60
        $this->displayBlock('percent_widget', $context, $blocks);
        // line 66
        echo "
";
        // line 67
        $this->displayBlock('datetime_widget', $context, $blocks);
        // line 80
        echo "
";
        // line 81
        $this->displayBlock('date_widget', $context, $blocks);
        // line 99
        echo "
";
        // line 100
        $this->displayBlock('time_widget', $context, $blocks);
        // line 114
        echo "
";
        // line 115
        $this->displayBlock('choice_widget_collapsed', $context, $blocks);
        // line 119
        echo "
";
        // line 120
        $this->displayBlock('choice_widget_expanded', $context, $blocks);
        // line 141
        echo "
";
        // line 142
        $this->displayBlock('checkbox_widget', $context, $blocks);
        // line 152
        echo "
";
        // line 153
        $this->displayBlock('radio_widget', $context, $blocks);
        // line 163
        echo "
";
        // line 164
        $this->displayBlock('choice_tree_widget', $context, $blocks);
        // line 173
        echo "
";
        // line 174
        $this->displayBlock('choice_tree_item_widget', $context, $blocks);
        // line 213
        echo "
";
        // line 214
        $this->displayBlock('translatefields_widget', $context, $blocks);
        // line 239
        echo "
";
        // line 240
        $this->displayBlock('translate_fields_widget', $context, $blocks);
        // line 246
        echo "
";
        // line 247
        $this->displayBlock('date_picker_widget', $context, $blocks);
        // line 258
        echo "
";
        // line 259
        $this->displayBlock('_form_step6_attachments_widget', $context, $blocks);
        // line 288
        echo "
";
        // line 290
        echo "
";
        // line 291
        $this->displayBlock('form_label', $context, $blocks);
        // line 295
        echo "
";
        // line 296
        $this->displayBlock('choice_label', $context, $blocks);
        // line 301
        echo "
";
        // line 302
        $this->displayBlock('checkbox_label', $context, $blocks);
        // line 305
        echo "
";
        // line 306
        $this->displayBlock('radio_label', $context, $blocks);
        // line 309
        echo "
";
        // line 310
        $this->displayBlock('checkbox_radio_label', $context, $blocks);
        // line 328
        echo "
";
        // line 330
        echo "
";
        // line 331
        $this->displayBlock('form_row', $context, $blocks);
        // line 338
        echo "
";
        // line 339
        $this->displayBlock('button_row', $context, $blocks);
        // line 344
        echo "
";
        // line 345
        $this->displayBlock('choice_row', $context, $blocks);
        // line 349
        echo "
";
        // line 350
        $this->displayBlock('date_row', $context, $blocks);
        // line 354
        echo "
";
        // line 355
        $this->displayBlock('time_row', $context, $blocks);
        // line 359
        echo "
";
        // line 360
        $this->displayBlock('datetime_row', $context, $blocks);
        // line 364
        echo "
";
        // line 365
        $this->displayBlock('checkbox_row', $context, $blocks);
        // line 371
        echo "
";
        // line 372
        $this->displayBlock('radio_row', $context, $blocks);
        // line 378
        echo "
";
        // line 380
        echo "
";
        // line 381
        $this->displayBlock('form_errors', $context, $blocks);
    }

    // line 30
    public function block_form_widget_simple($context, array $blocks = array())
    {
        // line 31
        if (( !array_key_exists("type", $context) || ("file" != ($context["type"] ?? null)))) {
            // line 32
            $context["attr"] = twig_array_merge(($context["attr"] ?? null), array("class" => twig_trim_filter(((($this->getAttribute(($context["attr"] ?? null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["attr"] ?? null), "class", array()), "")) : ("")) . " form-control"))));
        }
        // line 34
        $this->displayParentBlock("form_widget_simple", $context, $blocks);
    }

    // line 37
    public function block_textarea_widget($context, array $blocks = array())
    {
        // line 38
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), array("class" => twig_trim_filter(((($this->getAttribute(($context["attr"] ?? null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["attr"] ?? null), "class", array()), "")) : ("")) . " form-control"))));
        // line 39
        $this->displayParentBlock("textarea_widget", $context, $blocks);
    }

    // line 42
    public function block_button_widget($context, array $blocks = array())
    {
        // line 43
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), array("class" => twig_trim_filter(((($this->getAttribute(($context["attr"] ?? null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["attr"] ?? null), "class", array()), "btn-default")) : ("btn-default")) . " btn"))));
        // line 44
        $this->displayParentBlock("button_widget", $context, $blocks);
    }

    // line 47
    public function block_money_widget($context, array $blocks = array())
    {
        // line 48
        echo "<div class=\"input-group money-type\">
        ";
        // line 49
        $context["prepend"] = ("{{" == twig_slice($this->env, ($context["money_pattern"] ?? null), 0, 2));
        // line 50
        echo "        ";
        if ( !($context["prepend"] ?? null)) {
            // line 51
            echo "            <span class=\"input-group-addon\">";
            echo twig_escape_filter($this->env, twig_replace_filter(($context["money_pattern"] ?? null), array("{{ widget }}" => "")), "html", null, true);
            echo "</span>
        ";
        }
        // line 53
        $this->displayBlock("form_widget_simple", $context, $blocks);
        // line 54
        if (($context["prepend"] ?? null)) {
            // line 55
            echo "            <span class=\"input-group-addon\">";
            echo twig_escape_filter($this->env, twig_replace_filter(($context["money_pattern"] ?? null), array("{{ widget }}" => "")), "html", null, true);
            echo "</span>
        ";
        }
        // line 57
        echo "    </div>";
    }

    // line 60
    public function block_percent_widget($context, array $blocks = array())
    {
        // line 61
        echo "<div class=\"input-group\">";
        // line 62
        $this->displayBlock("form_widget_simple", $context, $blocks);
        // line 63
        echo "<span class=\"input-group-addon\">%</span>
    </div>";
    }

    // line 67
    public function block_datetime_widget($context, array $blocks = array())
    {
        // line 68
        if ((($context["widget"] ?? null) == "single_text")) {
            // line 69
            $this->displayBlock("form_widget_simple", $context, $blocks);
        } else {
            // line 71
            $context["attr"] = twig_array_merge(($context["attr"] ?? null), array("class" => twig_trim_filter(((($this->getAttribute(($context["attr"] ?? null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["attr"] ?? null), "class", array()), "")) : ("")) . " form-inline"))));
            // line 72
            echo "<div ";
            $this->displayBlock("widget_container_attributes", $context, $blocks);
            echo ">";
            // line 73
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "date", array()), 'errors');
            // line 74
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "time", array()), 'errors');
            // line 75
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "date", array()), 'widget', array("datetime" => true));
            // line 76
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "time", array()), 'widget', array("datetime" => true));
            // line 77
            echo "</div>";
        }
    }

    // line 81
    public function block_date_widget($context, array $blocks = array())
    {
        // line 82
        if ((($context["widget"] ?? null) == "single_text")) {
            // line 83
            $this->displayBlock("form_widget_simple", $context, $blocks);
        } else {
            // line 85
            $context["attr"] = twig_array_merge(($context["attr"] ?? null), array("class" => twig_trim_filter(((($this->getAttribute(($context["attr"] ?? null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["attr"] ?? null), "class", array()), "")) : ("")) . " form-inline"))));
            // line 86
            if (( !array_key_exists("datetime", $context) ||  !($context["datetime"] ?? null))) {
                // line 87
                echo "<div ";
                $this->displayBlock("widget_container_attributes", $context, $blocks);
                echo ">";
            }
            // line 89
            echo twig_replace_filter(($context["date_pattern"] ?? null), array("{{ year }}" =>             // line 90
$this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "year", array()), 'widget'), "{{ month }}" =>             // line 91
$this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "month", array()), 'widget'), "{{ day }}" =>             // line 92
$this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "day", array()), 'widget')));
            // line 94
            if (( !array_key_exists("datetime", $context) ||  !($context["datetime"] ?? null))) {
                // line 95
                echo "</div>";
            }
        }
    }

    // line 100
    public function block_time_widget($context, array $blocks = array())
    {
        // line 101
        if ((($context["widget"] ?? null) == "single_text")) {
            // line 102
            $this->displayBlock("form_widget_simple", $context, $blocks);
        } else {
            // line 104
            $context["attr"] = twig_array_merge(($context["attr"] ?? null), array("class" => twig_trim_filter(((($this->getAttribute(($context["attr"] ?? null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["attr"] ?? null), "class", array()), "")) : ("")) . " form-inline"))));
            // line 105
            if (( !array_key_exists("datetime", $context) || (false == ($context["datetime"] ?? null)))) {
                // line 106
                echo "<div ";
                $this->displayBlock("widget_container_attributes", $context, $blocks);
                echo ">";
            }
            // line 108
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "hour", array()), 'widget');
            echo ":";
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "minute", array()), 'widget');
            if (($context["with_seconds"] ?? null)) {
                echo ":";
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "second", array()), 'widget');
            }
            // line 109
            echo "        ";
            if (( !array_key_exists("datetime", $context) || (false == ($context["datetime"] ?? null)))) {
                // line 110
                echo "</div>";
            }
        }
    }

    // line 115
    public function block_choice_widget_collapsed($context, array $blocks = array())
    {
        // line 116
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), array("class" => twig_trim_filter(((($this->getAttribute(($context["attr"] ?? null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["attr"] ?? null), "class", array()), "")) : ("")) . " form-control"))));
        // line 117
        $this->displayParentBlock("choice_widget_collapsed", $context, $blocks);
    }

    // line 120
    public function block_choice_widget_expanded($context, array $blocks = array())
    {
        // line 121
        if (twig_in_filter("-inline", (($this->getAttribute(($context["label_attr"] ?? null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["label_attr"] ?? null), "class", array()), "")) : ("")))) {
            // line 122
            echo "<div class=\"control-group\">";
            // line 123
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                // line 124
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["child"], 'widget', array("parent_label_class" => (($this->getAttribute(                // line 125
($context["label_attr"] ?? null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["label_attr"] ?? null), "class", array()), "")) : ("")), "translation_domain" =>                 // line 126
($context["choice_translation_domain"] ?? null)));
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 129
            echo "</div>";
        } else {
            // line 131
            echo "<div ";
            $this->displayBlock("widget_container_attributes", $context, $blocks);
            echo ">";
            // line 132
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                // line 133
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["child"], 'widget', array("parent_label_class" => (($this->getAttribute(                // line 134
($context["label_attr"] ?? null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["label_attr"] ?? null), "class", array()), "")) : ("")), "translation_domain" =>                 // line 135
($context["choice_translation_domain"] ?? null)));
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 138
            echo "</div>";
        }
    }

    // line 142
    public function block_checkbox_widget($context, array $blocks = array())
    {
        // line 143
        $context["parent_label_class"] = ((array_key_exists("parent_label_class", $context)) ? (_twig_default_filter(($context["parent_label_class"] ?? null), "")) : (""));
        // line 144
        if (twig_in_filter("checkbox-inline", ($context["parent_label_class"] ?? null))) {
            // line 145
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["form"] ?? null), 'label', array("widget" => $this->renderParentBlock("checkbox_widget", $context, $blocks)));
        } else {
            // line 147
            echo "<div class=\"checkbox\">";
            // line 148
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["form"] ?? null), 'label', array("widget" => $this->renderParentBlock("checkbox_widget", $context, $blocks)));
            // line 149
            echo "</div>";
        }
    }

    // line 153
    public function block_radio_widget($context, array $blocks = array())
    {
        // line 154
        $context["parent_label_class"] = ((array_key_exists("parent_label_class", $context)) ? (_twig_default_filter(($context["parent_label_class"] ?? null), "")) : (""));
        // line 155
        if (twig_in_filter("radio-inline", ($context["parent_label_class"] ?? null))) {
            // line 156
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["form"] ?? null), 'label', array("widget" => $this->renderParentBlock("radio_widget", $context, $blocks)));
        } else {
            // line 158
            echo "<div class=\"radio\">";
            // line 159
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["form"] ?? null), 'label', array("widget" => $this->renderParentBlock("radio_widget", $context, $blocks)));
            // line 160
            echo "</div>";
        }
    }

    // line 164
    public function block_choice_tree_widget($context, array $blocks = array())
    {
        // line 165
        echo "<div ";
        $this->displayBlock("widget_container_attributes", $context, $blocks);
        echo ">
        <ul class=\"category-tree\">";
        // line 167
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["choices"] ?? null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 168
            echo "            ";
            $this->displayBlock("choice_tree_item_widget", $context, $blocks);
            echo "
        ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 170
        echo "</ul>
    </div>";
    }

    // line 174
    public function block_choice_tree_item_widget($context, array $blocks = array())
    {
        // line 175
        echo "<li>
        ";
        // line 176
        $context["checked"] = ((($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", array(), "any", false, true), "submitted_values", array(), "any", true, true) && $this->getAttribute(($context["submitted_values"] ?? null), $this->getAttribute(($context["child"] ?? null), "id_category", array()), array(), "array", true, true))) ? ("checked=\"checked\"") : (""));
        // line 177
        echo "        ";
        if (($context["multiple"] ?? null)) {
            // line 178
            echo "<div class=\"checkbox\">
                <label>
                    <input type=\"checkbox\" name=\"";
            // line 180
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", array()), "full_name", array()), "html", null, true);
            echo "[tree][]\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["child"] ?? null), "id_category", array()), "html", null, true);
            echo "\" class=\"category\" ";
            echo twig_escape_filter($this->env, ($context["checked"] ?? null), "html", null, true);
            echo ">
                    ";
            // line 181
            if (($this->getAttribute(($context["child"] ?? null), "active", array(), "any", true, true) && ($this->getAttribute(($context["child"] ?? null), "active", array()) == 0))) {
                // line 182
                echo "                        <i>";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["child"] ?? null), "name", array()), "html", null, true);
                echo "</i>";
            } else {
                // line 184
                echo twig_escape_filter($this->env, $this->getAttribute(($context["child"] ?? null), "name", array()), "html", null, true);
                echo "
                    ";
            }
            // line 186
            echo "                </label>
                ";
            // line 187
            if (array_key_exists("defaultCategory", $context)) {
                // line 188
                echo "                <div class=\"radio pull-right\">
                    <input type=\"radio\" value=\"";
                // line 189
                echo twig_escape_filter($this->env, $this->getAttribute(($context["child"] ?? null), "id_category", array()), "html", null, true);
                echo "\" name=\"ignore\" class=\"default-category\" />
                </div>
                ";
            }
            // line 192
            echo "            </div>";
        } else {
            // line 194
            echo "<div class=\"radio\">
                <label><input type=\"radio\" name=\"form[";
            // line 195
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", array()), "id", array()), "html", null, true);
            echo "][tree]\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["child"] ?? null), "id_category", array()), "html", null, true);
            echo "\" ";
            echo twig_escape_filter($this->env, ($context["checked"] ?? null), "html", null, true);
            echo " class=\"category\">";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["child"] ?? null), "name", array()), "html", null, true);
            echo "</label>
                ";
            // line 196
            if (array_key_exists("defaultCategory", $context)) {
                // line 197
                echo "                <div class=\"radio pull-right\">
                    <input type=\"radio\" value=\"";
                // line 198
                echo twig_escape_filter($this->env, $this->getAttribute(($context["child"] ?? null), "id_category", array()), "html", null, true);
                echo "\" name=\"ignore\" class=\"default-category\" />
                </div>
                ";
            }
            // line 201
            echo "            </div>";
        }
        // line 203
        echo "        ";
        if ($this->getAttribute(($context["child"] ?? null), "children", array(), "any", true, true)) {
            // line 204
            echo "            <ul>
                ";
            // line 205
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["child"] ?? null), "children", array()));
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
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 206
                echo "                    ";
                $context["child"] = $context["item"];
                // line 207
                echo "                    ";
                $this->displayBlock("choice_tree_item_widget", $context, $blocks);
                echo "
                ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 209
            echo "</ul>
        ";
        }
        // line 211
        echo "    </li>";
    }

    // line 214
    public function block_translatefields_widget($context, array $blocks = array())
    {
        // line 215
        echo "    ";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["form"] ?? null), 'errors');
        echo "
    <div class=\"translations tabbable\" id=\"";
        // line 216
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", array()), "id", array()), "html", null, true);
        echo "\">
        ";
        // line 217
        if (((($context["hideTabs"] ?? null) == false) && (twig_length_filter($this->env, ($context["form"] ?? null)) > 1))) {
            // line 218
            echo "        <ul class=\"translationsLocales nav nav-tabs\">
            ";
            // line 219
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["translationsFields"]) {
                // line 220
                echo "                <li class=\"";
                if (($this->getAttribute(($context["defaultLocale"] ?? null), "id_lang", array()) == $this->getAttribute($this->getAttribute($context["translationsFields"], "vars", array()), "name", array()))) {
                    echo "active";
                }
                echo " nav-link\">
                    <a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-target=\".translationsFields-";
                // line 221
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["translationsFields"], "vars", array()), "id", array()), "html", null, true);
                echo "\">
                        ";
                // line 222
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute($context["translationsFields"], "vars", array()), "label", array())), "html", null, true);
                echo "
                    </a>
                </li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['translationsFields'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 226
            echo "        </ul>
        ";
        }
        // line 228
        echo "
        <div class=\"translationsFields tab-content \">
            ";
        // line 230
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["translationsFields"]) {
            // line 231
            echo "                <div class=\"translationsFields-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["translationsFields"], "vars", array()), "id", array()), "html", null, true);
            echo " tab-pane ";
            if (((($context["hideTabs"] ?? null) == false) && (twig_length_filter($this->env, ($context["form"] ?? null)) > 1))) {
                echo "panel panel-default";
            }
            echo " ";
            if (($this->getAttribute(($context["defaultLocale"] ?? null), "id_lang", array()) == $this->getAttribute($this->getAttribute($context["translationsFields"], "vars", array()), "name", array()))) {
                echo "active";
            }
            echo " ";
            if ( !$this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", array()), "valid", array())) {
                echo "field-error";
            }
            echo " translation-label-";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["translationsFields"], "vars", array()), "label", array()), "html", null, true);
            echo "\">
                    ";
            // line 232
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["translationsFields"], 'errors');
            echo "
                    ";
            // line 233
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["translationsFields"], 'widget');
            echo "
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['translationsFields'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 236
        echo "        </div>
    </div>
";
    }

    // line 240
    public function block_translate_fields_widget($context, array $blocks = array())
    {
        // line 241
        if (( !array_key_exists("type", $context) || ("file" != ($context["type"] ?? null)))) {
            // line 242
            $context["attr"] = twig_array_merge(($context["attr"] ?? null), array("class" => twig_trim_filter(((($this->getAttribute(($context["attr"] ?? null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["attr"] ?? null), "class", array()), "")) : ("")) . " form-control"))));
        }
        // line 244
        $this->displayParentBlock("translate_fields_widget", $context, $blocks);
    }

    // line 247
    public function block_date_picker_widget($context, array $blocks = array())
    {
        // line 248
        echo "    ";
        ob_start();
        // line 249
        echo "        ";
        $context["attr"] = twig_array_merge(($context["attr"] ?? null), array("class" => twig_trim_filter(((($this->getAttribute(($context["attr"] ?? null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["attr"] ?? null), "class", array()), "")) : ("")) . " datepicker"))));
        // line 250
        echo "        <div class=\"input-group datepicker\">
            <input type=\"text\" class=\"form-control\" ";
        // line 251
        $this->displayBlock("widget_attributes", $context, $blocks);
        echo " ";
        if ( !twig_test_empty(($context["value"] ?? null))) {
            echo "value=\"";
            echo twig_escape_filter($this->env, ($context["value"] ?? null), "html", null, true);
            echo "\" ";
        }
        echo "/>
            <div class=\"input-group-addon\">
                <i class=\"material-icons\">date_range</i>
            </div>
        </div>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    // line 259
    public function block__form_step6_attachments_widget($context, array $blocks = array())
    {
        // line 260
        echo "    <div class=\"js-options-no-attachments ";
        echo (((twig_length_filter($this->env, ($context["form"] ?? null)) > 1)) ? ("hide") : (""));
        echo "\">
        <small>";
        // line 261
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("There is no attachment yet.", array(), "Admin.Catalog.Notification"), "html", null, true);
        echo "</small>
    </div>
    <div id=\"product-attachments\" class=\"panel panel-default\">
      <div class=\"panel-body js-options-with-attachments ";
        // line 264
        echo (((twig_length_filter($this->env, ($context["form"] ?? null)) == 0)) ? ("hide") : (""));
        echo "\">
        <div>
          <table id=\"product-attachment-file\" class=\"table table-striped\">
            <thead class=\"text-uppercase\">
              <tr>
                <th class=\"col-md-3\"><input type=\"checkbox\" id=\"product-attachment-files-check\"> ";
        // line 269
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Title", array(), "Admin.Global"), "html", null, true);
        echo "</th>
                <th class=\"col-md-6\">";
        // line 270
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("File name", array(), "Admin.Global"), "html", null, true);
        echo "</th>
                <th class=\"col-md-2\">";
        // line 271
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Type", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "</th>
              </tr>
            </thead>
            <tbody>";
        // line 275
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 276
            echo "              <tr>
                <td class=\"col-md-3\">";
            // line 277
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["child"], 'widget');
            echo "</td>
                <td class=\"col-md-6\"><span>";
            // line 278
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", array()), "attr", array()), "data", array()), $this->getAttribute($context["loop"], "index0", array()), array(), "array"), "file_name", array(), "array"), "html", null, true);
            echo "</span></td>
                <td class=\"col-md-2\">";
            // line 279
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", array()), "attr", array()), "data", array()), $this->getAttribute($context["loop"], "index0", array()), array(), "array"), "mime", array(), "array"), "html", null, true);
            echo "</td>
              </tr>
            ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 282
        echo "</tbody>
          </table>
        </div>
      </div>
    </div>
";
    }

    // line 291
    public function block_form_label($context, array $blocks = array())
    {
        // line 292
        $context["label_attr"] = twig_array_merge(($context["label_attr"] ?? null), array("class" => twig_trim_filter(((($this->getAttribute(($context["label_attr"] ?? null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["label_attr"] ?? null), "class", array()), "")) : ("")) . " control-label"))));
        // line 293
        $this->displayParentBlock("form_label", $context, $blocks);
    }

    // line 296
    public function block_choice_label($context, array $blocks = array())
    {
        // line 298
        $context["label_attr"] = twig_array_merge(($context["label_attr"] ?? null), array("class" => twig_trim_filter(twig_replace_filter((($this->getAttribute(($context["label_attr"] ?? null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["label_attr"] ?? null), "class", array()), "")) : ("")), array("checkbox-inline" => "", "radio-inline" => "")))));
        // line 299
        $this->displayBlock("form_label", $context, $blocks);
    }

    // line 302
    public function block_checkbox_label($context, array $blocks = array())
    {
        // line 303
        $this->displayBlock("checkbox_radio_label", $context, $blocks);
    }

    // line 306
    public function block_radio_label($context, array $blocks = array())
    {
        // line 307
        $this->displayBlock("checkbox_radio_label", $context, $blocks);
    }

    // line 310
    public function block_checkbox_radio_label($context, array $blocks = array())
    {
        // line 311
        echo "    ";
        // line 312
        echo "    ";
        if (array_key_exists("widget", $context)) {
            // line 313
            echo "        ";
            if (($context["required"] ?? null)) {
                // line 314
                echo "    ";
                $context["label_attr"] = twig_array_merge(($context["label_attr"] ?? null), array("class" => twig_trim_filter(((($this->getAttribute(($context["label_attr"] ?? null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["label_attr"] ?? null), "class", array()), "")) : ("")) . " required"))));
            }
            // line 316
            echo "        ";
            if (array_key_exists("parent_label_class", $context)) {
                // line 317
                echo "    ";
                $context["label_attr"] = twig_array_merge(($context["label_attr"] ?? null), array("class" => twig_trim_filter((((($this->getAttribute(($context["label_attr"] ?? null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["label_attr"] ?? null), "class", array()), "")) : ("")) . " ") . ($context["parent_label_class"] ?? null)))));
            }
            // line 319
            echo "        ";
            if (( !(($context["label"] ?? null) === false) && twig_test_empty(($context["label"] ?? null)))) {
                // line 320
                echo "    ";
                $context["label"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->humanize(($context["name"] ?? null));
            }
            // line 322
            echo "        <label";
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
            // line 323
            echo ($context["widget"] ?? null);
            // line 324
            echo twig_escape_filter($this->env, (( !(($context["label"] ?? null) === false)) ? ((((($context["translation_domain"] ?? null) === false)) ? (($context["label"] ?? null)) : (($context["label"] ?? null)))) : ("")), "html", null, true);
            // line 325
            echo "</label>
    ";
        }
    }

    // line 331
    public function block_form_row($context, array $blocks = array())
    {
        // line 332
        echo "<div class=\"form-group";
        if ((( !($context["compound"] ?? null) || ((array_key_exists("force_error", $context)) ? (_twig_default_filter(($context["force_error"] ?? null), false)) : (false))) &&  !($context["valid"] ?? null))) {
            echo " has-error";
        }
        echo "\">";
        // line 333
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["form"] ?? null), 'label');
        // line 334
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        // line 335
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["form"] ?? null), 'errors');
        // line 336
        echo "</div>";
    }

    // line 339
    public function block_button_row($context, array $blocks = array())
    {
        // line 340
        echo "<div class=\"form-group\">";
        // line 341
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        // line 342
        echo "</div>";
    }

    // line 345
    public function block_choice_row($context, array $blocks = array())
    {
        // line 346
        $context["force_error"] = true;
        // line 347
        $this->displayBlock("form_row", $context, $blocks);
    }

    // line 350
    public function block_date_row($context, array $blocks = array())
    {
        // line 351
        $context["force_error"] = true;
        // line 352
        $this->displayBlock("form_row", $context, $blocks);
    }

    // line 355
    public function block_time_row($context, array $blocks = array())
    {
        // line 356
        $context["force_error"] = true;
        // line 357
        $this->displayBlock("form_row", $context, $blocks);
    }

    // line 360
    public function block_datetime_row($context, array $blocks = array())
    {
        // line 361
        $context["force_error"] = true;
        // line 362
        $this->displayBlock("form_row", $context, $blocks);
    }

    // line 365
    public function block_checkbox_row($context, array $blocks = array())
    {
        // line 366
        echo "<div class=\"form-group";
        if ( !($context["valid"] ?? null)) {
            echo " has-error";
        }
        echo "\">";
        // line 367
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        // line 368
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["form"] ?? null), 'errors');
        // line 369
        echo "</div>";
    }

    // line 372
    public function block_radio_row($context, array $blocks = array())
    {
        // line 373
        echo "<div class=\"form-group";
        if ( !($context["valid"] ?? null)) {
            echo " has-error";
        }
        echo "\">";
        // line 374
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        // line 375
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["form"] ?? null), 'errors');
        // line 376
        echo "</div>";
    }

    // line 381
    public function block_form_errors($context, array $blocks = array())
    {
        // line 382
        if ((twig_length_filter($this->env, ($context["errors"] ?? null)) > 0)) {
            // line 383
            if ($this->getAttribute(($context["form"] ?? null), "parent", array())) {
                echo "<span class=\"help-block\">";
            } else {
                echo "<div class=\"alert alert-danger\">";
            }
            // line 384
            echo "    <ul class=\"list-unstyled\">";
            // line 385
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["errors"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 386
                echo "<li><span class=\"glyphicon glyphicon-exclamation-sign\"></span> ";
                echo twig_escape_filter($this->env, (((null === $this->getAttribute(                // line 387
$context["error"], "messagePluralization", array()))) ? ($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans($this->getAttribute(                // line 388
$context["error"], "messageTemplate", array()), $this->getAttribute($context["error"], "messageParameters", array()), "form_error")) : ($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->transchoice($this->getAttribute(                // line 389
$context["error"], "messageTemplate", array()), $this->getAttribute($context["error"], "messagePluralization", array()), $this->getAttribute($context["error"], "messageParameters", array()), "form_error"))), "html", null, true);
                // line 390
                echo "
    </li>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 393
            echo "</ul>
    ";
            // line 394
            if ($this->getAttribute(($context["form"] ?? null), "parent", array())) {
                echo "</span>";
            } else {
                echo "</div>";
            }
        }
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/TwigTemplateForm:bootstrap_3_layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  1120 => 394,  1117 => 393,  1110 => 390,  1108 => 389,  1107 => 388,  1106 => 387,  1104 => 386,  1100 => 385,  1098 => 384,  1092 => 383,  1090 => 382,  1087 => 381,  1083 => 376,  1081 => 375,  1079 => 374,  1073 => 373,  1070 => 372,  1066 => 369,  1064 => 368,  1062 => 367,  1056 => 366,  1053 => 365,  1049 => 362,  1047 => 361,  1044 => 360,  1040 => 357,  1038 => 356,  1035 => 355,  1031 => 352,  1029 => 351,  1026 => 350,  1022 => 347,  1020 => 346,  1017 => 345,  1013 => 342,  1011 => 341,  1009 => 340,  1006 => 339,  1002 => 336,  1000 => 335,  998 => 334,  996 => 333,  990 => 332,  987 => 331,  981 => 325,  979 => 324,  977 => 323,  962 => 322,  958 => 320,  955 => 319,  951 => 317,  948 => 316,  944 => 314,  941 => 313,  938 => 312,  936 => 311,  933 => 310,  929 => 307,  926 => 306,  922 => 303,  919 => 302,  915 => 299,  913 => 298,  910 => 296,  906 => 293,  904 => 292,  901 => 291,  892 => 282,  875 => 279,  871 => 278,  867 => 277,  864 => 276,  847 => 275,  841 => 271,  837 => 270,  833 => 269,  825 => 264,  819 => 261,  814 => 260,  811 => 259,  794 => 251,  791 => 250,  788 => 249,  785 => 248,  782 => 247,  778 => 244,  775 => 242,  773 => 241,  770 => 240,  764 => 236,  755 => 233,  751 => 232,  732 => 231,  728 => 230,  724 => 228,  720 => 226,  710 => 222,  706 => 221,  699 => 220,  695 => 219,  692 => 218,  690 => 217,  686 => 216,  681 => 215,  678 => 214,  674 => 211,  670 => 209,  653 => 207,  650 => 206,  633 => 205,  630 => 204,  627 => 203,  624 => 201,  618 => 198,  615 => 197,  613 => 196,  603 => 195,  600 => 194,  597 => 192,  591 => 189,  588 => 188,  586 => 187,  583 => 186,  578 => 184,  573 => 182,  571 => 181,  563 => 180,  559 => 178,  556 => 177,  554 => 176,  551 => 175,  548 => 174,  543 => 170,  526 => 168,  509 => 167,  504 => 165,  501 => 164,  496 => 160,  494 => 159,  492 => 158,  489 => 156,  487 => 155,  485 => 154,  482 => 153,  477 => 149,  475 => 148,  473 => 147,  470 => 145,  468 => 144,  466 => 143,  463 => 142,  458 => 138,  452 => 135,  451 => 134,  450 => 133,  446 => 132,  442 => 131,  439 => 129,  433 => 126,  432 => 125,  431 => 124,  427 => 123,  425 => 122,  423 => 121,  420 => 120,  416 => 117,  414 => 116,  411 => 115,  405 => 110,  402 => 109,  394 => 108,  389 => 106,  387 => 105,  385 => 104,  382 => 102,  380 => 101,  377 => 100,  371 => 95,  369 => 94,  367 => 92,  366 => 91,  365 => 90,  364 => 89,  359 => 87,  357 => 86,  355 => 85,  352 => 83,  350 => 82,  347 => 81,  342 => 77,  340 => 76,  338 => 75,  336 => 74,  334 => 73,  330 => 72,  328 => 71,  325 => 69,  323 => 68,  320 => 67,  315 => 63,  313 => 62,  311 => 61,  308 => 60,  304 => 57,  298 => 55,  296 => 54,  294 => 53,  288 => 51,  285 => 50,  283 => 49,  280 => 48,  277 => 47,  273 => 44,  271 => 43,  268 => 42,  264 => 39,  262 => 38,  259 => 37,  255 => 34,  252 => 32,  250 => 31,  247 => 30,  243 => 381,  240 => 380,  237 => 378,  235 => 372,  232 => 371,  230 => 365,  227 => 364,  225 => 360,  222 => 359,  220 => 355,  217 => 354,  215 => 350,  212 => 349,  210 => 345,  207 => 344,  205 => 339,  202 => 338,  200 => 331,  197 => 330,  194 => 328,  192 => 310,  189 => 309,  187 => 306,  184 => 305,  182 => 302,  179 => 301,  177 => 296,  174 => 295,  172 => 291,  169 => 290,  166 => 288,  164 => 259,  161 => 258,  159 => 247,  156 => 246,  154 => 240,  151 => 239,  149 => 214,  146 => 213,  144 => 174,  141 => 173,  139 => 164,  136 => 163,  134 => 153,  131 => 152,  129 => 142,  126 => 141,  124 => 120,  121 => 119,  119 => 115,  116 => 114,  114 => 100,  111 => 99,  109 => 81,  106 => 80,  104 => 67,  101 => 66,  99 => 60,  96 => 59,  94 => 47,  91 => 46,  89 => 42,  86 => 41,  84 => 37,  81 => 36,  79 => 30,  76 => 29,  73 => 27,  21 => 26,  14 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin/TwigTemplateForm:bootstrap_3_layout.html.twig", "/var/www/html/SHN/src/PrestaShopBundle/Resources/views/Admin/TwigTemplateForm/bootstrap_3_layout.html.twig");
    }
}
