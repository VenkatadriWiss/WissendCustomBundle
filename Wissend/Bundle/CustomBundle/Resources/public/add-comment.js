'use strict';
define(['underscore', 'pim/mass-edit-form/product/operation', 'wissend/template/add-comment', 'pim/user-context'],
    function (_, BaseOperation, template, UserContext) {
        return BaseOperation.extend({
            template: _.template(template),
            events: {
                'change .comment-field': 'updateModel'
            },

            render: function () {
                this.$el.html(this.template({
                    value: this.getValue(),
                    readOnly: this.readOnly
                }));
                return this;
            },

            updateModel: function (event) {
                this.setValue(event.target.value);
            },

            setValue: function (comment) {
                let data = this.getFormData();
                data.actions = [{
                    field: 'comment',
                    value: comment,
                    username: UserContext.get('username')
                }];
                this.setData(data);
            },

            getValue: function () {
                const action = _.findWhere(this.getFormData().actions, { field: 'comment' });
                return action ? action.value : null;
            }
        });
    }
);