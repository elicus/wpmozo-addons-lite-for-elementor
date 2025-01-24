
( function ( $ ) {
    $( window ).on( "elementor/frontend/init", function () {
        var WPMOZOProductGallery = elementorModules.frontend.handlers.Base.extend( {
            bindEvents: function () {
                this.change();
            },
            change: function () {    
                (function($) {
                    $.fn.WPMozoJustifiedGalleryPagination = function($options = {}) {
                        let $defaults = {
                                paginationClass: 'wpmozo_justified_gallery_pagination',
                                hideOnlyOnePage: true,
                                totalPages: 1,
                                visiblePages: 10,
                                startPage: 1,
                                initiateStartPageClick: false,
                                first: false,
                                last: false,
                                prev: false,
                                next: false,
                            },
                            $pagination = this;

                        $options = $.extend({}, $defaults, $options);
                        $pagination.twbsPagination($options);
                    }
                })(jQuery);
                jQuery( document ).ready( function($) {
                    
                    //return false;
                    if (  $( '.elementor-widget-wpmozo_ae_justified_gallery' ).length > 0 ) {
                        $( '.elementor-widget-wpmozo_ae_justified_gallery' ).each(function() {
                            let $this     = $( this ),
                                $wrapper  = $this.find('.wpmozo-justified-gallery-wrap'),
                                $settings = $wrapper.data( 'settings' );
                            let justified_settings = {
                                rowHeight : ( $settings.row_height ) ? $settings.row_height : 200,
                                captions : false, 
                                margins : ( $settings.column_spacing ) ? $settings.column_spacing : 10,
                                lastRow: ( $settings.lastrow_align ) ? $settings.lastrow_align : 'justify',
                                waitThumbnailsLoad: true,
                                refreshTime: 250,
                                filter: 'div:not(.wpmozo-hidden-item)', // init filter.
                                sizeRangeSuffixes: {
                                    'lt100': '_t', 
                                    'lt240': '_m', 
                                    'lt320': '_n', 
                                    'lt500': '', 
                                    'lt640': '_z', 
                                    'lt1024': '_b'
                                }
                            };
                            // Init justified gallery
                            $wrapper.find( '.wpmozo-justified-gallery-container' ).imagesLoaded( function() {
                                $wrapper.find( '.wpmozo-justified-gallery-container' ).justifiedGallery( justified_settings );
                            } );

                            if (  $( '.wpmozo-justified-gallery-load-more' ).length > 0 ) {
                                // Load other images
                                $wrapper.find( '.wpmozo-justified-gallery-load-more' ).on( 'click', function(e) {
                                    e.preventDefault();
                                    let $load_more_btn = $( this ),
                                        $options       = $load_more_btn.parent().data( 'options' );
                                        $settings      = $wrapper.data( 'settings' );
                    
                                    $load_more_btn.css( 'opacity', '0.5' ).prop( 'disabled', true );
                                    
                                    // Get selected category if filter exists.
                                    let selected_cat = '';
                                    if ( $wrapper.find( '.wpmozo-justified-gallery-filter' ).length > 0 ) {
                                        selected_cat = $wrapper.find( '.wpmozo-justified-gallery-filter li.active a' ).data( 'filter' );
                                    }
                    
                                    // Selected category class to filter.
                                    let selectedCatClass = selected_cat;
                                    if ( '*' === selected_cat ) {
                                        selectedCatClass = '';
                                    }
                                    const perPage     = ( $options.images_per_page ) ? $options.images_per_page : 8;
                                    const totalImages = parseInt( $wrapper.find( '.wpmozo-justified-gallery-item' + selectedCatClass ).length );
                                    const totalPages  = Math.ceil( totalImages / parseInt( perPage ) );
                    
                                    let loadPage = ( $options.page ) ? $options.page : 2;
                                    // If all pages are visibled.
                                    if ( loadPage > totalPages ) {
                                        $load_more_btn.hide();
                                        return;
                                    }
                    
                                    let $startIndex = 0;
                                    let $endIndex   = perPage;
                                    if ( 1 !== loadPage ) {
                                        $startIndex = ( perPage * ( loadPage - 1 ) );
                                        $endIndex   = perPage * loadPage;
                                    }
                    
                                    for ( $i = $startIndex; $i < $endIndex; $i++ ) {
                                        $wrapper.find( '.wpmozo-justified-gallery-item.wpmozo-hidden-item' + selectedCatClass + ':first' ).removeClass( 'wpmozo-hidden-item' );
                                    }
                    
                                    // no review to view with new images.
                                    $wrapper.find( '.wpmozo-justified-gallery-container' ).justifiedGallery( justified_settings )
                                        .on( 'jg.complete', function (e) {
                                            $wrapper.find( '.wpmozo-justified-gallery-container .wpmozo-justified-gallery-item' ).fadeIn('slow');
                                        } );
                    
                                    // Update the options.
                                    $options['page'] = parseInt( $options['page'] ) + 1;
                                    $load_more_btn.parent().data( 'options', $options );
                    
                                    $load_more_btn.css( 'opacity', '1' ).prop( 'disabled', false );
                                    if ( $endIndex >= totalImages ) {
                                        $load_more_btn.hide();
                                    }
                                } );  // End of clicked on load more button
                            }

                            // Number pagination.
                            if ( $wrapper.find( '.wpmozo_button_wrapper ul' ).length > 0 ) {
                                
                                let $pagin_wrapper = $wrapper.find( '.wpmozo_button_wrapper' ),
                                    $pagination    = $pagin_wrapper.find( 'ul' ),
                                    $options       = $pagin_wrapper.data( 'options' );

                                // Get selected category if filter exists.
                                let selected_cat = '';
                                if ( $wrapper.find( '.wpmozo-justified-gallery-filter' ).length > 0 ) {
                                    selected_cat = $wrapper.find( '.wpmozo-justified-gallery-filter li.active a' ).data( 'filter' );
                                }
                                // Selected category class to filter.
                                let selectedCatClass = selected_cat;
                                if ( '*' === selected_cat ) {
                                    selectedCatClass = '';
                                }

                                const perPage      = ( $options.images_per_page ) ? $options.images_per_page : 8;
                                const totalImages  = parseInt( $options.total_images );
                                const totalPages   = Math.ceil( totalImages / parseInt( perPage ) );

                                let	$paginationArgs = {
                                    totalPages: totalPages,
                                    onPageClick: function (event, page) {
                                        let $startIndex = 0;
                                        let $endIndex   = perPage;
                                        if ( 1 !== page ) {
                                            $startIndex = ( perPage * ( page - 1 ) );
                                            $endIndex   = perPage * page;
                                        }
                                        // Hide all first.
                                        $wrapper.find( '.wpmozo-justified-gallery-container .wpmozo-justified-gallery-item' ).addClass( 'wpmozo-hidden-item' );

                                        const $elements = $wrapper.find( '.wpmozo-justified-gallery-container .wpmozo-justified-gallery-item.wpmozo-hidden-item' + selectedCatClass );
                                        $elements.each( function( $index ) {
                                            if ( parseInt($index) + 1 > $startIndex && parseInt($index) + 1 <= $endIndex ) {
                                                $( this ).removeClass( 'wpmozo-hidden-item' );
                                            }
                                        } );

                                        // no review to view with new images.
                                        $wrapper.find( '.wpmozo-justified-gallery-container' ).justifiedGallery( justified_settings )
                                            .on( 'jg.complete', function (e) {
                                                $wrapper.find( '.wpmozo-justified-gallery-container .wpmozo-justified-gallery-item' ).fadeIn('slow');
                                            } );

                                        if ( $wrapper.offset().top > 0 ) {
                                            let topHeaderHeight  = 0,
                                                mainHeaderHeight = 0,
                                                tbHeaderHeight   = 0;

                                            if ( $('body').find('#top-header').length > 0 && $('body').hasClass('et_fixed_nav') ) {
                                                topHeaderHeight = parseFloat( $('#top-header').innerHeight() );
                                            }
                                            if ( $('body').find('#main-header').length > 0 && $('body').hasClass('et_fixed_nav') ) {
                                                mainHeaderHeight = parseFloat( $('#main-header').innerHeight() );
                                            }
                                            if ( $('body').find('.et-l--header').length > 0 && $('body').find('.et-l--header .et_builder_inner_content').hasClass('has_et_pb_sticky') ) {
                                                tbHeaderHeight = parseFloat( $('.et-l--header').innerHeight() );
                                            }

                                            let headerHeight = topHeaderHeight + mainHeaderHeight + tbHeaderHeight + 50;
                                            $( 'html, body' ).animate( {
                                                scrollTop: ( $wrapper.offset().top - headerHeight )
                                            } );
                                        }
                                    }
                                };

                                if ( 'yes' === $options.show_prev_next ) {
                                    $paginationArgs.prev = $options.prev_text;
                                    $paginationArgs.next = $options.next_text;
                                }
                                
                                $pagination.WPMozoJustifiedGalleryPagination( $paginationArgs );
                            }
                
                            // Filter the gallery.
                            $wrapper.find( '.wpmozo-justified-gallery-filter a' ).on( 'click', function(e) {
                                e.preventDefault();

                                const $this = $( this );
                                if ( $this.parent().hasClass( 'active' ) ) {
                                    return false;
                                }

                                let $options = $wrapper.find( '.wpmozo_button_wrapper' ).data( 'options' );

                                const selected_cat   = $this.data( 'filter' );
                                let selectedCatClass = selected_cat;
                                if ( '*' === selected_cat ) {
                                    selectedCatClass = '';
                                }

                                // Check if load more, re-render it.
                                if ( $wrapper.find( '.wpmozo_button_wrapper .wpmozo-justified-gallery-load-more' ).length > 0 ||
                                    $wrapper.find( '.wpmozo_button_wrapper ul' ).length > 0
                                ) {

                                    $wrapper.find( '.wpmozo-justified-gallery-container .wpmozo-justified-gallery-item' ).addClass( 'wpmozo-hidden-item' );

                                    const perPage    = ( $options.images_per_page ) ? $options.images_per_page : 8;
                                    const totalImage = parseInt( $wrapper.find( '.wpmozo-justified-gallery-container .wpmozo-justified-gallery-item' + selectedCatClass ).length );
                                    
                                    if ( totalImage > perPage ) {
                                        let $startIndex = 0;
                                        let $endIndex   = perPage;
                                        for ( $i = $startIndex; $i < $endIndex; $i++ ) {
                                            $wrapper.find( '.wpmozo-justified-gallery-container .wpmozo-justified-gallery-item.wpmozo-hidden-item' + selectedCatClass + ':first' ).removeClass( 'wpmozo-hidden-item' );
                                        }

                                        // Show button, it hidden.
                                        $wrapper.find( '.wpmozo_button_wrapper .wpmozo-justified-gallery-load-more' ).show();
                                    } else {
                                        $wrapper.find( '.wpmozo-justified-gallery-container .wpmozo-justified-gallery-item' + selectedCatClass ).removeClass( 'wpmozo-hidden-item' );
                                        $wrapper.find( '.wpmozo_button_wrapper .wpmozo-justified-gallery-load-more' ).hide();
                                    }

                                    // Update the options.
                                    $options['page'] = 2;
                                    $wrapper.find( '.wpmozo_button_wrapper' ).data( 'options', $options );

                                    // Re-render number pagination.
                                    if ( $wrapper.find( '.wpmozo_button_wrapper ul' ).length > 0 ) {
                                        let $pagin_wrapper = $wrapper.find( '.wpmozo_button_wrapper' ),
                                            $pagination    = $pagin_wrapper.find( 'ul' );

                                        let	$paginationArgs = {
                                            totalPages: parseInt( Math.ceil( totalImage / perPage ) ),
                                            onPageClick: function (event, page) {

                                                let $startIndex = 0;
                                                let $endIndex   = perPage;
                                                if ( 1 !== page ) {
                                                    $startIndex = ( perPage * ( page - 1 ) );
                                                    $endIndex   = perPage * page;
                                                }
                        
                                                // Hide all first.
                                                $wrapper.find( '.wpmozo-justified-gallery-container .wpmozo-justified-gallery-item' ).addClass( 'wpmozo-hidden-item' );

                                                const $elements = $wrapper.find( '.wpmozo-justified-gallery-container .wpmozo-justified-gallery-item.wpmozo-hidden-item' + selectedCatClass );
                                                $elements.each( function( $index ) {
                                                    if ( parseInt($index) + 1 > $startIndex && parseInt($index) + 1 <= $endIndex ) {
                                                        $( this ).removeClass( 'wpmozo-hidden-item' );
                                                    }
                                                } );
                        
                                                // no review to view with new images.
                                                $wrapper.find( '.wpmozo-justified-gallery-container' ).justifiedGallery( justified_settings )
                                                    .on( 'jg.complete', function (e) {
                                                        $wrapper.find( '.wpmozo-justified-gallery-container .wpmozo-justified-gallery-item' ).fadeIn('slow');
                                                    } );
                                            }
                                        };
                        
                                        if ( 'yes' === $options.show_prev_next ) {
                                            $paginationArgs.prev = $options.prev_text;
                                            $paginationArgs.next = $options.next_text;
                                        }
                                        
                                        $pagination.twbsPagination( 'destroy' );
                                        $pagination.WPMozoJustifiedGalleryPagination( $paginationArgs );
                                    }
                                } else {
                                    // Hide all first.
                                    $wrapper.find( '.wpmozo-justified-gallery-container .wpmozo-justified-gallery-item' ).addClass( 'wpmozo-hidden-item' );
                                    $wrapper.find( '.wpmozo-justified-gallery-container .wpmozo-justified-gallery-item' + selectedCatClass ).removeClass( 'wpmozo-hidden-item' );
                                }
                                
                                $wrapper.find( '.wpmozo-justified-gallery-filter li' ).removeClass( 'active' );
                                $this.parent().addClass( 'active' );

                                // Add category to filtered.
                                $wrapper.find( '.wpmozo-justified-gallery-container' ).justifiedGallery( justified_settings )
                                    .on( 'jg.complete', function (e) {
                                        $wrapper.find( '.wpmozo-justified-gallery-container .wpmozo-justified-gallery-item' ).fadeIn('slow');
                                    } );
                            } ); // End of clicked on filter.
                            
                            // Lightbox.
                            if ( $settings.click_trigger && ( 'lightbox' === $settings.click_trigger || 'zoom_n_link' === $settings.click_trigger ) ) {
                                
                                let $orderClass  = $this.closest('.elementor-widget-wpmozo_ae_justified_gallery').prop('class').match(/(elementor-widget-wpmozo_ae_justified_gallery)/)[0] + '_lightbox',
                                    $effect     = $settings.lightbox_effect,
                                    $zoom       = 'zoom' === $effect ? true : false,
                                    $duration   = 'none' !== $effect ? parseInt( $settings.lightbox_transition_duration ) : 0,
                                    $navigation = ( 'yes' === $settings.enable_navigation ) ? true : false;

                                let clickDeligate = '.wpmozo-justified-gallery-item figure';
                                if ( 'zoom_n_link' === $settings.click_trigger ) {
                                    clickDeligate = '.wpmozo-justified-gallery-item .wpmozo-overlay-lightbox';
                                }
                                let $uniqueClass =  "elementor-element-"+$(this).data('id');
                                $wrapper.magnificPopup( {
                                    delegate: clickDeligate,
                                    type: 'image',
                                    removalDelay: $duration,
                                    closeOnContentClick: ! 1,
                                    closeBtnInside: ! 1,
                                    mainClass: 'elementor-element mfp-with-zoom mfp-img-mobile wpmozo_justified_gallery_lightbox ' + $orderClass + ' wpmozo_mfp_' + $effect + ' '+ $uniqueClass,
                                    prependTo: $(this).closest( ".elementor" ),
                                    gallery: {
                                        enabled: $navigation,
                                        navigateByImgClick: false,
                                        tPrev: '',
                                        tNext: '',
                                        tCounter: ''
                                    },
                                    zoom: {
                                        enabled: $zoom,
                                        duration: $duration,
                                        easing: 'ease-in-out',
                                        opener: function(element) {
                                            return element;
                                        }
                                    },
                                    image: {
                                        markup: '<div class="mfp-figure">'+
                                                '<div class="mfp-close"></div>'+
                                                '<div class="mfp-img"></div>'+
                                                '<div class="mfp-bottom-bar">'+
                                                '<div class="mfp-title"></div>'+
                                                '</div>'+
                                            '</div>',
                                        titleSrc: function(item) {
                                            if ( 'zoom_n_link' === $settings.click_trigger ) {
                                                return item.el.parents( '.wpmozo-justified-gallery-item' ).find( 'figcaption .wpmozo-item-content' ).length > 0 ? item.el.parents( '.wpmozo-justified-gallery-item' ).find( 'figcaption .wpmozo-item-content' ).prop('outerHTML') : '';
                                            }
                                            return item.el.find('figcaption .wpmozo-item-content').length > 0 ? item.el.find('figcaption .wpmozo-item-content').prop('outerHTML') : '';
                                        },
                                        tError: '<a href="%url%">The image</a> could not be loaded.',
                                    },
                                    allowHTMLInTemplate: true
                                } );
                            }
                        } );
                    } 
                } );
            },
        } );
        elementorFrontend.elementsHandler.attachHandler( "wpmozo_ae_justified_gallery", WPMOZOProductGallery );
    } );
} )( jQuery );


