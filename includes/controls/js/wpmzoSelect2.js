(function ($) {
	$( document ).on(
		'wpmozo_elementor_select_init',
		function (event, obj) {
			var ID = '#elementor-control-default-' + obj.data._cid;

			setTimeout(
				function () {
					var IDSelect2 = $( ID ).select2(
						{
							minimumInputLength: 1,
							ajax: {
								url: wpmozo_select_localize.ajaxurl + "?action=wpmozo_ae_select2_search_post&post_type=" + obj.data.source_type + '&source_name=' + obj.data.source_name,
								dataType: 'json',
							},
							initSelection: function (element, callback) {
								if ( ! obj.multiple) {
									callback( {id: '', text: wpmozo_select_localize.search_text} );
								} else {
									callback( {id: '', text: ''} );
								}
								var ids = [];
								if ( ! Array.isArray( obj.currentID ) && obj.currentID != '') {
									 ids = [obj.currentID];
								} else if (Array.isArray( obj.currentID )) {
									ids = obj.currentID.filter(
										function (e) {
											return e != null;
										}
									)
								}

								if (ids.length > 0) {
									var label = $( "label[for='elementor-control-default-" + obj.data._cid + "']" );
									label.after( '<span class="elementor-control-spinner">&nbsp;<i class="eicon-spinner eicon-animation-spin"></i>&nbsp;</span>' );
									$.ajax(
										{
											method: "POST",
											url: wpmozo_select_localize.ajaxurl + "?action=wpmozo_ae_select2_get_title",
											data: {post_type: obj.data.source_type, source_name: obj.data.source_name, id: ids,wpmozo_ae_select_nonce: wpmozo_select_localize.nonce}
										}
									).done(
										function (response) {
											if (response.success && typeof response.data.results != 'undefined') {
												let wpmozoOptions = '';
												ids.forEach(
													function (item, index){
														if (typeof response.data.results[item] != 'undefined') {
															const key      = item;
															const value    = response.data.results[item];
															wpmozoOptions += ` < option selected = "selected" value = "${key}" > ${value} < / option > `;
														}
													}
												)

												element.append( wpmozoOptions );
											}
											label.siblings( '.elementor-control-spinner' ).remove();
										}
									);
								}
							}
						}
					);

				},
				100
			);

		}
	);
}(jQuery));
