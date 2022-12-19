define([
    'jquery',
    'underscore',
    'uiRegistry',
    'Magento_Ui/js/form/element/select'
], function ($, _, uiRegistry, select) {
    'use strict';
    return select.extend({
 
        initialize: function (){
            var status = this._super().initialValue;
            this.fieldDepend(status);
            return this;
        },
 
 
        /**
         * On value change handler.
         *
         * @param {String} value
         */
        onUpdate: function (value) {
 
            this.fieldDepend(value);
            return this._super();
        },
 
        /**
         * Update field dependency
         *
         * @param {String} value
         */
        fieldDepend: function (value) {
            setTimeout(function () {
                console.log(value);
                var fieldlanguage = uiRegistry.get('index = id_language');
                var fieldesigne = uiRegistry.get('index = id_designer');
 
                if (value == 'developer') {
                    fieldlanguage.show();
                    fieldesigne.hide();

                }else {
                    fieldlanguage.hide();
                    fieldesigne.show();
                }
            }, 500);
            return this;
        }
    });
});