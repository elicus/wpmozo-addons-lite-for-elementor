( function ( $ ) {
    $( window ).on( "elementor/frontend/init", function () {
        var WPMOZOScrollStackCards = elementorModules.frontend.handlers.Base.extend( {
            bindEvents: function () {
                this.change();
            },
            change: function () {
				jQuery( document ).ready( function($) {
					$( document ).find( '.dipl_advanced_tooltip' ).each( function() {
						let thisObj         = $( this ),
							wrapObj         = thisObj.find( '.dipl_tooltip_trigger_element_wrap' ),
							triggerType     = wrapObj.data( 'trigger-action' ) || 'mouseenter',
							animationType   = wrapObj.data( 'animation' ) || 'fade',
							durartion       = wrapObj.data( 'durartion' ) || '350',
							interactive     = wrapObj.data( 'interactive' ) || 'false',
							width           = wrapObj.data( 'tooltip-width' ) || '350',
							triggerEl       = wrapObj.data( 'trigger-element' ) || 'button',
							triggerSelector = wrapObj.data( 'trigger-selector' ) || '';
				
						let $orderClass   = thisObj.prop('class').match(/(dipl_advanced_tooltip\_[^\s]*)/)[0],
							tooltipEl     = $( '#' + $orderClass + '_content_wrap' );
				
						// If no content found return.
						if ( ! tooltipEl.length ) return;
				
						let selector = '.' + $orderClass + ' .dipl_tooltip_trigger_element';
						if ( 'id' === triggerEl ) {
							selector = '#' + triggerSelector;
						}
						if ( 'class' === triggerEl ) {
							selector = '.' + triggerSelector;
						}
				
						tippy( selector, {
							content: tooltipEl.html(),
							placement: 'auto',
							trigger: triggerType,
							animation: animationType,
							duration: durartion,
							theme: '.' + $orderClass + '_0',
							delay: [ 100, 100 ],
							arrow: false,
							allowHTML: true,
							interactive: interactive,
							appendTo: () => document.body,
							maxWidth: width,
							popperOptions: {
								modifiers: [
									{
										name: 'flip',
										options: { fallbackPlacements: [ 'top', 'bottom', 'left', 'right' ] }
									},
									{
										name: 'zIndex',
										enabled: true,
										phase: 'write',
										fn( { state } ) { state.elements.popper.style.zIndex = '99999'; }
									}
								]
							}
						} );
				
						if ( 'click' === triggerType && thisObj.find( '.dipl_tooltip_trigger_button' ).length > 0 ) {
							thisObj.on( 'click', '.dipl_tooltip_trigger_button', function(e) {
								e.preventDefault();
							} );
						}
					} );
				} ); // Document ready.								
			},
		} );
		elementorFrontend.elementsHandler.attachHandler( "wpmozo_ae_scroll_stack_cards", WPMOZOScrollStackCards );
	} );
} )( jQuery );
