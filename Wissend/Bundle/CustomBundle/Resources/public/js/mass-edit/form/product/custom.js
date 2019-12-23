'use strict';

define(
    [
        'underscore',
        'pim/mass-edit-form/product/operation',
        'pim/template/mass-edit/product/change-status'
    ],
    function (
        _,
        BaseOperation,
        template
    ) {
        return BaseOperation.extend({
            template: _.template(template),

            /**
             * {@inheritdoc}
             */
            render: function () {
                this.$el.html(this.template());

                return this;
            },
        });
    }
);