define([
        'ko',
        'uiComponent',
        'underscore',
        'Magento_Customer/js/step-navigator',
        'Magento_Customer/js/customer',
    ],
    function (
        ko,
        Component,
        _,
        stepNavigator,
        customer
    ) {
        'use strict';

        return Component.extend( {
                defaults: {
                    template: 'ELogic_Sample/check-login'
                },

                isVisible: ko.observable(true),
                isLogedIn: customer.isLoggedIn(),

                stepCode: 'isLogedCheck',

                stepTitle:  'Logging Status',


            /**
             *
             * @returns {*}
             */
            initialize: function () {
                    this._super();

                    stepNavigator.registerStep(
                        this.stepCode,
                        null,
                        this.stepTitle,
                        this.isVisible,

                        _.bind(this.navigate(), this),

                        15
                    );

                    return this;
                },

                navigate: function (){

                },

                navigateToNextStep: function (){
                    stepNavigator.next();
                }

            }
        );
    }
);



