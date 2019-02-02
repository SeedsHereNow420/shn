(function ($) {
    "use strict";
    
    var OrderDocument = function (options) {
        this.init('orderdocument', options, OrderDocument.defaults);
    };

    //inherit from Abstract input
    $.fn.editableutils.inherit(OrderDocument, $.fn.editabletypes.abstractinput);

    $.extend(OrderDocument.prototype, {
        /**
        Renders input from tpl

        @method render() 
        **/        
        render: function() {
           this.$input = this.$tpl.find('input');
        },
        
        /**
        Default method to show value in element. Can be overwritten by display option.
        
        @method value2html(value, element) 
        **/
        value2html: function(value, element) {
            if(!value) {
                $(element).empty();
                return; 
            }
            var html = $('<div>').text(value.date_add).html() + ', ' + $('<div>').text(value.number).html() + ' st., bld. ';
            $(element).html(html); 
        },
        
        /**
        Gets value from element's html
        
        @method html2value(html) 
        **/        
        html2value: function(html) {
          return null;  
        },
      
       /**
        Converts value to string. 
        It is used in internal comparing (not for sending to server).
        
        @method value2str(value)  
       **/
       value2str: function(value) {
           var str = '';
           if(value) {
               for(var k in value) {
                   str = str + k + ':' + value[k] + ';';  
               }
           }
           return str;
       }, 
       
       /*
        Converts string to value. Used for reading value from 'data-value' attribute.
        
        @method str2value(str)  
       */
       str2value: function(str) {
           /*
           this is mainly for parsing value defined in data-value attribute. 
           If you will always set value by javascript, no need to overwrite it
           */
           return str;
       },                
       
       /**
        Sets value of input.
        
        @method value2input(value) 
        @param {mixed} value
       **/         
       value2input: function(value) {
           if(!value) {
             return;
           }
           
           this.$input.filter('[name="date_add"]').val($.isFunction(value) ? value : value.date_add);
           this.$input.filter('[name="number"]').val($.isFunction(value) ? value : value.number);
       },       
       
       /**
        Returns value of input.
        
        @method input2value() 
       **/          
       input2value: function() { 
           return {
              date_add: this.$input.filter('[name="date_add"]').val(), 
              number: this.$input.filter('[name="number"]').val()
           };
       },        
       
        /**
        Activates input: sets focus on the first field.
        
        @method activate() 
       **/        
       activate: function() {
            this.$input.filter('[name="number"]').focus();
       },  
       
       /**
        Attaches handler to submit form in case of 'showbuttons=false' mode
        
        @method autosubmit() 
       **/       
       autosubmit: function() {
           this.$input.keydown(function (e) {
                if (e.which === 13) {
                    $(this).closest('form').submit();
                }
           });
       }       
    });

    OrderDocument.defaults = $.extend({}, $.fn.editabletypes.abstractinput.defaults, {
        tpl: '<div class="editable-orderdocument"><label><span>City: </span><input type="text" name="date_add" class="input-small"></label></div>'+
             '<div class="editable-orderdocument"><label><span>Street: </span><input type="text" name="number" class="input-small"></label></div>',
             
        inputclass: ''
    });

    $.fn.editabletypes.orderdocument = OrderDocument;

}(window.jQuery));