( function ( $ ) {
    $( window ).on( "elementor/frontend/init", function () {
        var WPMOZOTestimonialSlider = elementorModules.frontend.handlers.Base.extend( {
            bindEvents: function () {
                this.change();
            },
            change: function () {
                let a = this.$element
                if( true === a.hasClass( "wpmozo_ae_equal_height" ) ){
                    let b = [  ];
                    let c = 0;
                    let d = a.find( ".swiper-wrapper" );
                    d.children().each( function(){
                        b[ c ] = $( this ).height();
                        c++;
                    } );
                    d.children().each( function(){
                        $( this ).height( Math.max.apply( Math,b ) );
                    } );
                }
            },
        } );
        elementorFrontend.elementsHandler.attachHandler( "wpmozo_ae_testimonial_slider", WPMOZOTestimonialSlider );
    } );
} )( jQuery );