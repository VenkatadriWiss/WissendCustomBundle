'use strict';

/**
 * Extension to display breadcrumbItems on every page
 *
 * @author    Pierre Allard <pierre.allard@akeneo.com>
 * @copyright 2017 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
define([
        'jquery',
        'underscore',
        'oro/translator',
        'pim/form',
        'wissend_dashboard/template',
        'oro/mediator',
        'pim/form-registry',
        'pim/common/property',
        'pim/router'

    ],
    function (
        $,
        _,
        __,
        BaseForm,
        template,
        mediator,
        FormRegistry,
        propertyAccessor,
        Routing
    ) {
        return BaseForm.extend({
            className: 'AknWissendDashboardData',
            template: _.template(template),
            

            /**
             * {@inheritdoc}
             *
             * @param {string} config.tab The main tab to highlight
             * @param {string} [config.item] The sub item to highlight (optional)
             */
            initialize: function (config) {
                this.config = config.config;
                
                return BaseForm.prototype.initialize.apply(this, arguments);
            },

            /**
             * This method will configure the breadcrumb. The configuration of this module contains backbone extension
             * codes related to the menu. To avoid duplication of the labels, we load the configuration of these modules
             * to bring back the labels into this module.
             *
             * {@inheritdoc}
             */
            configure: function () {
                mediator.trigger('pim_menu:highlight:tab', { extension: this.config.tab });
                mediator.trigger('pim_menu:highlight:item', { extension: this.config.item });

                return BaseForm.prototype.configure.apply(this, arguments);
            },

            /**
             * {@inheritdoc}
             */
            render: function () {
                
                return $.when(
                    FormRegistry.getFormMeta(this.config.tab),
                    FormRegistry.getFormMeta(this.config.item)
                ).then(function (metaTab, metaItem) {
                   
                    var datagridLoadUrl ="datagrid/product-grid?dataLocale=en_US";
                    $.get(
                        Routing.generate(datagridLoadUrl),
                        this.loadDataGrid.bind(this)
                    );
                    this.$el.empty().append(this.template());

                    this.delegateEvents();
                }.bind(this));

                return this;
            },

            loadDataGrid(resp){
                console.log(resp);
            },

            /**
             * Redirects to the linked tab
             */
            /*redirectTab: function () {
                mediator.trigger('pim_menu:redirect:tab', { extension: this.config.tab });
            },*/

            /**
             * Redirects to the linked item
             */
            /*redirectItem: function () {
                mediator.trigger('pim_menu:redirect:item', { extension: this.config.item });
            }*/
        });
    });
