( function ( $ ) {
    $( window ).on( "elementor/frontend/init", function () {

        var WPMOZOPieChart = elementorModules.frontend.handlers.Base.extend( {

            onInit: function () {
                elementorModules.frontend.handlers.Base.prototype.onInit.apply( this, arguments );
                this.initPieChart();
            },

            // -----------------------------
            // Main Pie Chart Initializer
            // -----------------------------
            initPieChart: function () {

                var self     = this;
                const $wrapper = this.$element.find( '.dipl_pie_chart_wrapper' );
                const $canvas  = $wrapper.find( 'canvas' )[0];

                if ( ! $canvas ) {
                    return;
                }

                // -----------------------------
                // Responsive Font Size
                // -----------------------------
                function getFontSize() {
                    if ( window.innerWidth <= 480 ) return 10; // Mobile
                    if ( window.innerWidth <= 768 ) return 14; // Tablet
                    return 16;                                 // Desktop
                }

                // -----------------------------
                // Responsive Chart Height
                // -----------------------------
                function getChartHeight() {
                    if ( window.innerWidth <= 480 ) {
                        return $wrapper.data( 'chart_height_phone' );
                    }
                    if ( window.innerWidth <= 768 ) {
                        return $wrapper.data( 'chart_height_tablet' );
                    }
                    return $wrapper.data( 'chart_height' ) || 400;
                }

                // -----------------------------
                // Destroy Existing Chart
                // -----------------------------
                if ( $canvas.chartInstance ) {
                    $canvas.chartInstance.destroy();
                }

                // -----------------------------
                // Parse Chart Data
                // -----------------------------
                let chartData = {};
                try {
                    chartData = JSON.parse( $wrapper.attr( 'data-chart' ) );
                } catch ( e ) {
                    console.error( 'Invalid chart data for pie chart', self.$element );
                    return;
                }

                // -----------------------------
                // Normalize Dataset Keys
                // -----------------------------
                chartData.datasets.forEach( function ( dataset ) {

                    if ( typeof dataset.backgroundColor === 'undefined' && dataset.backgroundcolor ) {
                        dataset.backgroundColor = dataset.backgroundcolor;
                    }

                    if ( typeof dataset.borderColor === 'undefined' && dataset.bordercolor ) {
                        dataset.borderColor = dataset.bordercolor;
                        dataset.borderWidth = 1;
                    }
                } );

                // -----------------------------
                // Set Initial Height
                // -----------------------------
                const height = getChartHeight();
                $wrapper.css( 'height', height + 'px' );
                $canvas.height = height;

                // -----------------------------
                // Create Pie Chart
                // -----------------------------
                $canvas.chartInstance = new Chart( $canvas.getContext( '2d' ), {
                    type: 'pie',
                    data: chartData,
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
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

                // -----------------------------
                // Window Resize Handler
                // -----------------------------
                $( window ).on( 'resize.wpmozoPieChart', function () {

                    const newHeight = getChartHeight();
                    $wrapper.css( 'height', newHeight + 'px' );
                    $canvas.height = newHeight;

                    $canvas.chartInstance.options.plugins.legend.labels.font.size = getFontSize();

                    $canvas.chartInstance.resize();
                    $canvas.chartInstance.update();
                } );
            }

        } );

        elementorFrontend.elementsHandler.attachHandler(
            'wpmozo_ae_pie_chart',
            WPMOZOPieChart
        );

    } );
} )( jQuery );
