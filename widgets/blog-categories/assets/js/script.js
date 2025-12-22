( function ( $ ) {
	$( window ).on(
		"elementor/frontend/init",
		function () {
			var WPMOZOBlogCategories = elementorModules.frontend.handlers.Base.extend(
				{
					bindEvents: function () {
						this.change();
					},
					change: function () {
						let $this     = this.$element; // Use this.$element
						
					}
				}
			);
			elementorFrontend.elementsHandler.attachHandler( "wpmozo_ae_blog_categories", WPMOZOBlogCategories );
		}
	);
} )( jQuery );