(function ($) {
    $(window).on("elementor/frontend/init", function () {
        var WPMOZOPieChart = elementorModules.frontend.handlers.Base.extend({
            bindEvents: function () {
                this.change();
            },
            change: function () {
                const $this = this.$element.find(".wpmozo_pie_chart");

                var self     = $this;
                const $wrapper = this.$element.find( '.wpmozo_pie_chart_wrapper' );
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
                    console.error( 'Invalid chart data for pie chart', self.$element );
                    return;
                }
                
                try {
                    var chartLegendData = JSON.parse( $wrapper.attr( 'data-chart_styling' ) );
                } catch ( e ) {
                    console.error( 'Invalid chart styling data for:', self.$element );
                    return;
                }

                /*chartData.datasets.forEach( function ( dataset ) {

                    if ( typeof dataset.backgroundColor === 'undefined' && dataset.backgroundcolor ) {
                        dataset.backgroundColor = dataset.backgroundcolor;
                    }
                } );*/
                let spacing = parseInt(chartLegendData.spacing);

                const height = getChartHeight();
                $wrapper.css( 'height', height + 'px' );
                $canvas.height = height;
                const legendSpacingPlugin = {
                    id: 'legendSpacing',
                    beforeInit(chart) {
                        const originalFit = chart.legend.fit;

                        chart.legend.fit = function fit() {
                            originalFit.bind(chart.legend)();
                            this.height += spacing;
                        };
                    }
                };

                $canvas.chartInstance = new Chart( $canvas.getContext( '2d' ), {
                    type: 'pie',
                    data: chartData,
                    plugins: [legendSpacingPlugin],
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                labels: {
                                    color: chartLegendData.legend.color,
                                    font: {
                                        size:   chartLegendData.legend.size,
                                        weight: chartLegendData.legend.weight,
                                        style:  chartLegendData.legend.style
                                    },
                                    generateLabels: function(chart) {
                                        const original = Chart.overrides.pie.plugins.legend.labels.generateLabels;
                                        const labels = original(chart);

                                        labels.forEach(label => {
                                            label.lineWidth = 0;
                                        });

                                        return labels;
                                    }
                                }
                            },
                            tooltip: {
                                callbacks: {
                                    labelColor: function(context) {
                                        return {
                                            backgroundColor:context.element.options.backgroundColor,
                                            borderWidth: 0,
                                        };
                                    },
                                },
                            }
                        }
                    }
                } );

                $( window ).on( 'resize.wpmozoPieChart', function () {

                    const newHeight = getChartHeight();
                    $wrapper.css( 'height', newHeight + 'px' );
                    $canvas.height = newHeight;

                    $canvas.chartInstance.options.plugins.legend.labels.font.size = getFontSize();

                    $canvas.chartInstance.resize();
                    $canvas.chartInstance.update();
                } );
            },
        });
        elementorFrontend.elementsHandler.attachHandler( "wpmozo_ae_pie_chart", WPMOZOPieChart );
    });
})(jQuery);

