(function ($) {
    $(window).on("elementor/frontend/init", function () {
        var WPMOZOBlogTimeline = elementorModules.frontend.handlers.Base.extend({
            bindEvents: function () {
                this.change();
            },
            change: function () {
                jQuery(document).ready(function($){
                    function wpmozo_timeline_stem ($this) {
                        var first_icon_outer_height_half    = $this.find('.wpmozo_blog_timeline_post').first().innerHeight() / 2;
                        var last_icon_outer_height_half     = $this.find('.wpmozo_blog_timeline_post').last().innerHeight() / 2;
                        var stem_padding                    = ( first_icon_outer_height_half + last_icon_outer_height_half )+'px';
                        var stem_height                     = 'calc( 100% - '+stem_padding+' )';
                        var stem_position                   = first_icon_outer_height_half+'px';
                        $this.find('.wpmozo_stem_wrapper').css( 'height', stem_height );
                        $this.find('.wpmozo_stem_wrapper').css( 'top', stem_position );
                        var $that = $this.find('.wpmozo_blog_timeline_wrapper');
                        var first_icon_offset       = $that.find('.wpmozo_blog_timeline_post .wpmozo_blog_timeline_stem_center').first().offset().top;
                        var last_icon_offset        = $that.find('.wpmozo_blog_timeline_post .wpmozo_blog_timeline_stem_center').last().offset().top;
                        var screen_height_center    = ( screen.height / 2 );
                        var timelineBarSize         = parseFloat( $(this).find('.wpmozo_stem_wrapper').outerWidth() );
                        var first_item_offset       = $this.find('.wpmozo_blog_timeline_post').first().offset().top;
                        if( first_icon_offset < screen_height_center ) {
                            var stem_height_px = $this.find('.wpmozo_stem_wrapper').innerHeight();
                            var stem_fill_height = ( ( screen_height_center - last_icon_offset ) < ( last_icon_offset - first_icon_offset - 10 ) ) ? ( screen_height_center - first_icon_offset )+"px" : ( last_icon_offset - first_icon_offset - 10 )+"px";
                            $this.find('.wpmozo_blog_stem').css( 'height', stem_fill_height );
                            $this.find('.wpmozo_blog_timeline_stem_center').each( function() { 
                                var icon_offset = $(this).offset().top;
                                if( icon_offset < screen_height_center ) {
                                    $(this).find('.wpmozo_blog_timeline_post').addClass('wpmozo_icon_fill');
                                }
                            });
                            if( $(window).height() >= $(document).height() ) {
                                $this.find('.wpmozo_blog_stem').css( 'height', stem_height_px );
                                $this.find('.wpmozo_blog_timeline_stem_center').each( function() {
                                    $(this).find('.wpmozo_blog_timeline_post').addClass('wpmozo_icon_fill');
                                });
                            }
                        }
                        
                        $(window).on('scroll', function() {
                            var stem_height_px = $this.find('.wpmozo_stem_wrapper').innerHeight();
                            var scroll_amount = $(window).scrollTop();
                            var final_height = ( scroll_amount + ( screen_height_center - first_icon_offset ))+"px";
                            if( parseFloat( final_height )  <  parseFloat( stem_height_px ) ) {
                                $this.find('.wpmozo_blog_stem').css( 'height', final_height );
                            }
                            $this.find('.wpmozo_blog_timeline_post').each(function(){
                                var $icon = $(this).find('.wpmozo_blog_timeline_stem_center');
                                if ( ($icon.offset().top - ( $icon.outerWidth() / 2 ) ) <= ( screen_height_center + scroll_amount ) ) {
                                    $icon.closest('.wpmozo_blog_timeline_post').addClass('wpmozo_icon_fill');
                                } else {
                                    $icon.closest('.wpmozo_blog_timeline_post').removeClass('wpmozo_icon_fill');
                                }
                            });
                            // Ensure complete fill when the timeline widget is scrolled fully
                            var widget_top = $this.offset().top;
                            var widget_height = $this.outerHeight();
                            var widget_bottom = widget_top + widget_height;
                            var half_window_height = screen.height / 2;

                            if ( scroll_amount + half_window_height >= widget_bottom - ( $this.find('.wpmozo_blog_timeline_wrapper').children().eq(-2).outerHeight() / 2 ) ) {
                                $this.find( '.wpmozo_blog_stem' ).css( 'height', stem_height_px );
                                $this.find( '.wpmozo_blog_timeline_post' ).addClass( 'wpmozo_icon_fill' );
                            }
                        });
                    }

                    if ( jQuery('body').find('.wpmozo_blog_timeline').length > 0 ) {
                        $(window).resize( function() {
                            $('body').find('.wpmozo_blog_timeline').each( function() {
                                var $this                   = $(this);
                                if( $this.find('.wpmozo_blog_timeline_post').length > 0 ) {
                                    wpmozo_timeline_stem($this);
                                }
                                if( jQuery(window).width() > 767 ) {
                                    /*Content Alternate Timeline*/
                                    if( $this.find('.wpmozo_blog_timeline_alternate_stem').length > 0 ) {
                                        var outer_container = $(this).find('.wpmozo_blog_timeline_outer_container').outerWidth();
                                        var stem_width = $this.find('.wpmozo_blog_timeline_stem_center').outerWidth();
                                        var stem_position = ( outer_container + ( stem_width / 2 ) + 10 )+'px';
                                        $this.find('.wpmozo_stem_wrapper').css('left',"50%");
                                    }
                                    /*Content Right Timeline*/
                                    if( $this.find('.layout2.wpmozo_blog_timeline_right').length > 0 ) {
                                        var outer_container = $(this).find('.wpmozo_blog_timeline_outer_container').outerWidth();
                                        var stem_width = $this.find('.wpmozo_blog_timeline_stem_center').outerWidth();
                                        var stem_position = ( outer_container + ( stem_width / 2 ) + 10 )+'px';
                                        $this.find('.wpmozo_stem_wrapper').css('left',stem_position);
                                    }
                                    /*Content Left Timeline*/
                                    if( $this.find('.layout2.wpmozo_blog_timeline_left').length > 0 ) {
                                        var outer_container = $(this).find('.wpmozo_blog_timeline_outer_container').outerWidth();
                                        var stem_width = $this.find('.wpmozo_blog_timeline_stem_center').outerWidth();
                                        var stem_position = ( outer_container + ( stem_width / 2 ) + 10 )+'px';
                                        $this.find('.wpmozo_stem_wrapper').css('right',stem_position);
                                    }
                                } else {
                                    /*Content Alternate Timeline*/
                                    if( $this.find('.wpmozo_blog_timeline_alternate').length > 0 ) {
                                        var stem_width = $this.find('.wpmozo_blog_timeline_stem_center').outerWidth();
                                        var stem_position = ( stem_width / 2 )+'px';
                                        $this.find('.wpmozo_stem_wrapper').css('left',stem_position);
                                    }
                                    /*Content Right Timeline*/
                                    if( $this.find('.layout2.wpmozo_blog_timeline_right').length > 0 ) {
                                        var stem_width = $this.find('.wpmozo_blog_timeline_stem_center').outerWidth();
                                        var stem_position = ( stem_width / 2 )+'px';
                                        $this.find('.wpmozo_stem_wrapper').css('left',stem_position);
                                    }
                                    /*Content Left Timeline*/
                                    if( $this.find('.layout2.wpmozo_blog_timeline_left').length > 0 ) {
                                        var stem_width = $this.find('.wpmozo_blog_timeline_stem_center').outerWidth();
                                        var stem_position = ( stem_width / 2 )+'px';
                                        $this.find('.wpmozo_stem_wrapper').css('right',stem_position);
                                    }
                                }
                            });
                        });
                        $('body').find('.wpmozo_blog_timeline').each( function() {
                            var $this                   = $(this);
                            if( $this.find('.wpmozo_blog_timeline_post').length > 0 ) {
                                wpmozo_timeline_stem($this);
                            }
                            if( jQuery(window).width() > 767 ) {
                                /*Content Alternate Timeline*/
                                if( $this.find('.wpmozo_blog_timeline_alternate_stem').length > 0 ) {
                                    var outer_container = $(this).find('.wpmozo_blog_timeline_outer_container').outerWidth();
                                    var stem_width = $this.find('.wpmozo_blog_timeline_stem_center').outerWidth();
                                    var stem_position = ( outer_container + ( stem_width / 2 ) + 10 )+'px';
                                    $this.find('.wpmozo_stem_wrapper').css('left',"50%");
                                }
                                /*Content Right Timeline*/
                                if( $this.find('.layout2.wpmozo_blog_timeline_right').length > 0 ) {
                                    var outer_container = Math.max.apply( null, $this.find('.wpmozo_blog_timeline_outer_container').map( function() {
                                                            return $(this).outerWidth();
                                                        }).get());
                                    $this.find('.wpmozo_blog_timeline_outer_container').each(function() {
                                        $(this).css('min-width', outer_container+'px');
                                    });
                                    var stem_width = $this.find('.wpmozo_blog_timeline_stem_center').outerWidth();
                                    var stem_position = ( outer_container + ( stem_width / 2 ) + 10 )+'px';
                                    $this.find('.wpmozo_stem_wrapper').css('left',stem_position);
                                }
                                /*Content Left Timeline*/
                                if( $this.find('.layout2.wpmozo_blog_timeline_left').length > 0 ) {
                                    var outer_container = Math.max.apply( null, $this.find('.wpmozo_blog_timeline_outer_container').map( function() {
                                                            return $(this).outerWidth();
                                                        }).get());
                                    $this.find('.wpmozo_blog_timeline_outer_container').each(function() {
                                        $(this).css('min-width', outer_container+'px');
                                    });
                                    var stem_width = $this.find('.wpmozo_blog_timeline_stem_center').outerWidth();
                                    var stem_position = ( outer_container + ( stem_width / 2 ) + 10 )+'px';
                                    $this.find('.wpmozo_stem_wrapper').css('right',stem_position);
                                }
                            } else {
                                /*Content Alternate Timeline*/
                                    if( $this.find('.wpmozo_blog_timeline_alternate').length > 0 ) {
                                        var stem_width = $this.find('.wpmozo_blog_timeline_stem_center').outerWidth();
                                        var stem_position = ( stem_width / 2 )+'px';
                                        $this.find('.wpmozo_stem_wrapper').css('left',stem_position);
                                    }
                                /*Content Right Timeline*/
                                if( $this.find('.layout2.wpmozo_blog_timeline_right').length > 0 ) {
                                    var stem_width = $this.find('.wpmozo_blog_timeline_stem_center').outerWidth();
                                    var stem_position = ( stem_width / 2 )+'px';
                                    $this.find('.wpmozo_stem_wrapper').css('left',stem_position);
                                }
                                /*Content Left Timeline*/
                                if( $this.find('.layout2.wpmozo_blog_timeline_left').length > 0 ) {
                                    var stem_width = $this.find('.wpmozo_blog_timeline_stem_center').outerWidth();
                                    var stem_position = ( stem_width / 2 )+'px';
                                    $this.find('.wpmozo_stem_wrapper').css('right',stem_position);
                                }
                            }
                        });
                    }
                });
            },
        });
        elementorFrontend.elementsHandler.attachHandler("wpmozo_ae_blog_timeline", WPMOZOBlogTimeline);
    });
})(jQuery);