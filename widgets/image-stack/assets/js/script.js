jQuery( window ).on( "elementor/frontend/init", function () {    
    var e = elementorModules.frontend.handlers.Base.extend( {
        bindEvents: function () {
            this.change();
        },     
        change: function () {
            let $this  = this.$element.find('.wpmozo_image_stack_wrap');

            let singleId            = $this.data( "tooltip-id" ).replace( 'elementor-','' ),
                dataTrigger         = $this.data( "trigger" ),
                speechBubble        = $this.data( "speech-bubble" ),
                dataAnimationName   = $this.data( 'animation-name' ),  
                animationDuration   = $this.data( 'animation-duration' ),
                options             = {
                    allowHTML: true,
                    placement: 'top',
                    theme: 'light',
                    trigger: 'click' === dataTrigger ? dataTrigger : 'mouseenter focus',
                    arrow: '' === speechBubble ? false : true,
                    duration: animationDuration,
                    animation: dataAnimationName,
                    content: function( element ){
                        let id          = element.getAttribute( 'data-template' ),
                            template    = document.getElementById( id );
                        return '<div class="wpmozo-floating-container wpmozo-wrapper-'+singleId+'">'+template.innerHTML+'</div>';
                    }
                };
            
            tippy( '.elementor-' + singleId + ' .wpmozo_image_stack_item', options );
        },
    } );    
    elementorFrontend.elementsHandler.attachHandler( "wpmozo_ae_image_stack", e );
} );
