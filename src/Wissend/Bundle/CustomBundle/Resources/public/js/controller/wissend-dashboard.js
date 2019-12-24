'use strict';
define(['pim/controller/front', 'pim/form-builder'],
    function (BaseController, FormBuilder) {
        return BaseController.extend({
            renderForm: function (route) {
                return FormBuilder.build('wissend-dashboard-index').then((form) => {
                    form.setElement(this.$el).render();
                });
            }
        });
    }
);