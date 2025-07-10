( function ( $ ) {
    $( window ).on( "elementor/frontend/init", function () {    
        var ImageStackTooltipHandler = elementorModules.frontend.handlers.Base.extend( {
            bindEvents: function () {
                this.change();
            },     
            change: function () {
                const $this  = this.$element.find('.wpmozo_image_stack_wrap');
                if (!$this.length) return;

                const {
                    tooltipId,
                    trigger,
                    speechBubble,
                    animationName,
                    animationDuration
                } = $this.data();

                const singleId = tooltipId.replace( 'elementor-','' ),
                    options    = {
                        allowHTML: true,
                        placement: 'top',
                        theme: 'light',
                        trigger: 'click' === trigger ? trigger : 'mouseenter focus',
                        arrow: '' === speechBubble ? false : true,
                        duration: animationDuration,
                        animation: animationName,
                        content: function( element ){
                            let id          = element.getAttribute( 'data-template' ),
                                template    = $( '#'+id );
                            return '<div class="wpmozo-floating-container wpmozo-wrapper-'+singleId+'">'+template.html()+'</div>';
                        }
                    };
                if( trigger ) {
                    tippy( '.elementor-' + singleId + ' .wpmozo_image_stack_item', options );
                }
            },
        } );    
        elementorFrontend.elementsHandler.attachHandler( "wpmozo_ae_image_stack", ImageStackTooltipHandler );
    } );
} )( jQuery );
