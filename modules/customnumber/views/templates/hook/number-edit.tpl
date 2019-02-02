{*
* Custom Number
*
*  @author    motionSeed <ecommerce@motionseed.com>
*  @copyright 2017 motionSeed. All rights reserved.
*  @license   https://www.motionseed.com/en/license-module.html
*}
<script type="text/javascript">
    (function ($) {
        $(function () {
            $('.icon-credit-card + .badge').append($('#number-edit-order').html());
            $('#documents_table tbody tr > td:last-child:not(.list-empty)').append($('#number-edit-document').html());
            
            $.fn.editableform.buttons = $('#number-edit-form-buttons').html();
            $.fn.editabletypes.orderdocument.defaults.tpl = $('#number-edit-form-document').html();
            
            $('[data-number-edit]').editable({
                value: function() {
                    var el = $(this).closest('.editable-container').prev();
                    
                    if (el.data('number-edit') === 'order') {
                        return $.trim($(this).closest('.badge').contents().filter(function(){ 
                            return this.nodeType == 3; 
                        })[0].nodeValue);
                    } else {
                        var document_selected = el.closest('tr');
                        var values = {
                            date_add: $.trim($('td:eq(0)', document_selected).text()), 
                            number: $.trim($('td:eq(2)', document_selected).text())
                        };
                        
                        return values[$(this).attr('name')];
                    }
                },
                display: false,
                params: function(params) {
                    if ($(this).data('number-edit') === 'order') {
                        params.document = 'order_' + $(this).data('pk');
                    } else {
                        params.document = $(this).closest('tr').attr('id');
                    }

                    return params;
                },
                ajaxOptions: {
                    dataType: 'json'
                },
                success: function(response, newValue) {
                    if(response.success) {
                        if ($(this).data('number-edit') === 'order') {
                            $(this).closest('.badge').contents().filter(function(){ 
                                return this.nodeType === 3; 
                            })[0].nodeValue = newValue;
                        } else {
                            var el = $(this).closest('tr');
                            
                            $('td:eq(0)', el).text(newValue.date_add);
                            $('td:eq(2) a', el).text(newValue.number)
                        }
                    } else {
                        return '';
                    }
                }
            }).on('shown', function(e, editable) {
                $('.datepicker', $(this).next()).datepicker({
                    dateFormat: "{$date_format|escape:'html':'UTF-8'}"
                });
            });
            
            $('[data-number-remove]').on('click', function(e) {
                if (confirm('{l s='Do you want to remove this document?' mod='customnumber'}')) {
                    var document_selected = $(this).closest('tr');
                    
                    $.ajax({
                        type:"POST",
                        url: "{$url}",
                        async: true,
                        dataType: "json",
                        data : {
                                delete_document: "1",
                                document: document_selected.attr('id')
                                },
                        success : function(res)
                        {
                            if (res) {
                                document_selected.slideUp();
                                var documents_nb = $('#tabOrder a[href="#documents"] .badge');
                                
                                documents_nb.text(parseInt(documents_nb.text()) - 1);
                            }
                        }
                    });
                }
                
                return false;
            });
        });
    })(jQuery);
</script>

<script type="text/template" id="number-edit-order">
    <a href="#" data-number-edit="order" style="display: inline;" data-type="text" data-pk="{$order->id|intval}" data-url="{$url|escape:'html':'UTF-8'}"><i class="icon-pencil"></i></a>
</script>

<script type="text/template" id="number-edit-document">
    <a href="#" data-number-edit="true" data-type="orderdocument" data-pk="{$order->id|intval}" data-url="{$url|escape:'html':'UTF-8'}"><i class="icon-pencil"></i></a>
    <a href="#" data-number-remove="true"><i class="icon-trash"></i></a>
</script>

<script type="text/template" id="number-edit-form-buttons">
    <button type="submit" class="btn btn-primary btn-sm editable-submit"><i class="icon-check"></i></button>
    <button type="button" class="btn btn-default btn-sm editable-cancel"><i class="icon-remove"></i></button>
</script>

<script type="text/template" id="number-edit-form-document">
    <div class="editable-orderdocument"><label><div>{l s='Number' mod='customnumber'}</div><input type="text" name="number" class="input-small"></label></div>
    <div class="editable-orderdocument"><label><div>{l s='Date' mod='customnumber'}</div><input type="text" name="date_add" class="input-small datepicker"></label></div>
</script>
