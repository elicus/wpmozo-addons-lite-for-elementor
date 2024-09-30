jQuery( window ).on( "elementor/frontend/init", function () {
    var e = elementorModules.frontend.handlers.Base.extend( {
        bindEvents: function () {
            this.change();
        },
        change: function () {
            jQuery(window).on('load', function() {
                if ( jQuery('body').find('.wpmozo_button_horizontal_shutter_fill').length > 0 ) {
                    jQuery('.wpmozo_button_horizontal_shutter_fill').on('mouseenter',function(){
                        let parentElem  = jQuery(this).parents('.elementor-element').prop('class').match(/wpmozo_button_item_\d+/);
                        if ( jQuery('head style[data-class="'+parentElem+'"]').length < 1 ) {
                            let btnWidth    = jQuery(this).innerWidth();
                            let beforePos   = 'background-position: ' + parseInt( btnWidth/2 ) + 'px center';
                            let afterPos    = 'background-position: -' + parseInt( btnWidth/2 ) + 'px center';
                            let style       = '<style data-class="'+parentElem+'">.wpmozo_button .'+parentElem+' .wpmozo_button_horizontal_shutter_fill .wpmozo_background_effect_wrap:before{'+beforePos+'} .wpmozo_button .'+parentElem+' .wpmozo_button_horizontal_shutter_fill .wpmozo_background_effect_wrap:after{'+afterPos+'}</style>';
                            jQuery('head').append(style);
                        }
                    });
                }
                if ( jQuery('body').find('.wpmozo_button_vertical_shutter_fill').length > 0 ) {
                    jQuery('.wpmozo_button_vertical_shutter_fill').on('mouseenter',function(){
                        let parentElem  = jQuery(this).parents('.elementor-element').prop('class').match(/wpmozo_button_item_\d+/);
                        if ( jQuery('head style[data-class="'+parentElem+'"]').length < 1 ) {
                            let btnHeight   = jQuery(this).innerHeight();
                            let beforePos   = 'background-position: center ' + parseInt( btnHeight/2 ) + 'px';
                            let afterPos    = 'background-position: center -' + parseInt( btnHeight/2 ) + 'px';
                            let style       = '<style data-class="'+parentElem+'">.wpmozo_button .'+parentElem+' .wpmozo_button_vertical_shutter_fill .wpmozo_background_effect_wrap:before{'+beforePos+'} .wpmozo_button .'+parentElem+' .wpmozo_button_vertical_shutter_fill .wpmozo_background_effect_wrap:after{'+afterPos+'}</style>';
                            jQuery('head').append(style);
                        }
                    });
                }
            });
        },
    } );
    elementorFrontend.elementsHandler.attachHandler( "wpmozo_ae_advanced_button", e );
} );