( function ( $ ) {

    $( window ).on( "elementor/frontend/init", function () {

        var WPMOZOBarChart = elementorModules.frontend.handlers.Base.extend( {

            onInit: function () {
                elementorModules.frontend.handlers.Base.prototype.onInit.apply( this, arguments );
                this.initBarChart();
            },

            initBarChart: function () {

                var self       = this;
                const $wrapper = this.$element.find( '.wpmozo_bar_chart_wrapper' );
                const $canvas  = $wrapper.find( 'canvas' )[0];

                if ( ! $canvas ) {
                    return;
                }

                function getFontSize() {
                    if ( window.innerWidth <= 480 ) return 10; // Mobile
                    if ( window.innerWidth <= 768 ) return 14; // Tablet
                    return 16;                                 // Desktop
                }

                function getChartHeight() {
                    if ( window.innerWidth <= 480 ) {
                        return $wrapper.data( 'chart_height_phone' );
                    }
                    if ( window.innerWidth <= 768 ) {
                        return $wrapper.data( 'chart_height_tablet' );
                    }
                    return $wrapper.data( 'chart_height' ) || 400;
                }

                if ( $canvas.chartInstance ) {
                    $canvas.chartInstance.destroy();
                }

                let chartData = {};
                try {
                    chartData = JSON.parse( $wrapper.attr( 'data-chart' ) );
                } catch ( e ) {
                    console.error( 'Invalid chart data for:', self.$element );
                    return;
                }

                chartData.datasets.forEach( function ( dataset ) {

                    if ( typeof dataset.backgroundColor === 'undefined' && dataset.backgroundcolor ) {
                        dataset.backgroundColor = dataset.backgroundcolor;
                    }

                    if ( typeof dataset.borderColor === 'undefined' && dataset.bordercolor ) {
                        dataset.borderColor = dataset.bordercolor;
                        dataset.borderWidth = 1;
                    }
                } );

                const height = getChartHeight();
                $wrapper.css( 'height', height + 'px' );
                $canvas.height = height;

                $canvas.chartInstance = new Chart( $canvas.getContext( '2d' ), {
                    type: 'bar',
                    data: chartData,
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            x: {
                                ticks: {
                                    font: {
                                        size: getFontSize()
                                    }
                                }
                            },
                            y: {
                                ticks: {
                                    font: {
                                        size: getFontSize()
                                    }
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                labels: {
                                    font: {
                                        size: getFontSize()
                                    }
                                }
                            }
                        }
                    }
                } );

                $( window ).on( 'resize', function () {

                    const newHeight = getChartHeight();
                    $wrapper.css( 'height', newHeight + 'px' );
                    $canvas.height = newHeight;

                    const size = getFontSize();

                    $canvas.chartInstance.options.scales.x.ticks.font.size = size;
                    $canvas.chartInstance.options.scales.y.ticks.font.size = size;
                    $canvas.chartInstance.options.plugins.legend.labels.font.size = size;

                    $canvas.chartInstance.resize();
                    $canvas.chartInstance.update();
                } );
            }

        } );

        elementorFrontend.elementsHandler.attachHandler(
            'wpmozo_ae_bar_chart',
            WPMOZOBarChart
        );

    } );

} )( jQuery );
