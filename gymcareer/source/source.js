$( function( ) {
	var embeddable_job_widget_options = {
		'script_url': 'https://www.gymcareer.com/?embed=wp_job_manager_widget',
		'keywords': '',
		'location': '',
		'categories': '',
		'job_types': '',
		'per_page': '5',
		'pagination': '0'
	};

	load_jobs( embeddable_job_widget_options );

	$( ".page1 .search_button" ).on( "click", function( ) {
		$( ".page1" ).hide( );
		$( ".page2" ).show( );
		embeddable_job_widget_options.location = $(".page1 .search_location_input").val();
		embeddable_job_widget_options.categories = $(".page1 .search_category_input").val();
		load_jobs( embeddable_job_widget_options );
	} );

	$( ".page2 .search_button" ).on( "click", function( ) {
		embeddable_job_widget_options.location = $(".page2 .search_location_input").val();
		embeddable_job_widget_options.categories = $(".page2 .search_category_input").val();
		$(".page2 .job_list").html("");
		load_jobs( embeddable_job_widget_options );
	} );

	function load_jobs( embeddable_job_widget_options ) {
		window.embeddable_job_widget = function( ) {
			var embeddable_job_widget_page = 1;
			var embeddable_job_widget_script;
			return {
				get_jobs: function( page ) {
					var head = document.getElementsByTagName( "head" )[ 0 ];
					embeddable_job_widget_script = document.createElement( "script" );
					embeddable_job_widget_script.async = true;
					embeddable_job_widget_script.src = embeddable_job_widget_options.script_url + '&keywords=' + escape( embeddable_job_widget_options.keywords ) + '&location=' + escape( embeddable_job_widget_options.location ) + '&categories=' + escape( embeddable_job_widget_options.categories ) + '&job_type=' + escape( embeddable_job_widget_options.job_types ) + '&per_page=' + escape( embeddable_job_widget_options.per_page ) + '&pagination=' + escape( embeddable_job_widget_options.pagination ) + '&page=' + escape( page );
					head.appendChild( embeddable_job_widget_script );
					return false
				},
				show_jobs: function( target_id, content ) {
					var target = document.getElementById( target_id );
					if ( target ) {
						target.innerHTML = this.decode_html( content );
					}

					if ( $( ".page1" ).is( ":visible" ) ) {
						$( ".embeddable-job-widget-listing" ).each(
							function( i ) {
								$(".page1 .sample_job").clone().prependTo(".page1 .job_list");
								$(".page1 .job_item.sample_job").find(".job_company").text($( this ).find( ".embeddable-job-widget-listing-job-company" ).text( ));
								$(".page1 .job_item.sample_job").find(".job_title").text($( this ).find( ".embeddable-job-widget-listing-title" ).text( ));
								$(".page1 .job_item.sample_job").find(".job_location").text($( this ).find( ".embeddable-job-widget-listing-job-location" ).text( ));
								$(".page1 .job_item.sample_job").find(".job_more").find("a").attr("href", $( this ).find( "a" ).attr("href"));
								$(".page1 .job_list .sample_job").removeClass("sample_job");
							}
						);
					} else {
						$( ".embeddable-job-widget-listing" ).each(
							function( i ) {
								$(".page2 .sample_job").clone().appendTo(".page2 .job_list");
								$(".page2 .job_item.sample_job").find(".job_company").text($( this ).find( ".embeddable-job-widget-listing-job-company" ).text( ));
								$(".page2 .job_item.sample_job").find(".job_title").text($( this ).find( ".embeddable-job-widget-listing-title" ).text( ));
								$(".page2 .job_item.sample_job").find(".job_location").text($( this ).find( ".embeddable-job-widget-listing-job-location" ).text( ));
								$(".page2 .job_item.sample_job").find(".job_more").find("a").attr("href", $( this ).find( "a" ).attr("href"));
								$(".page2 .job_list .sample_job").removeClass("sample_job");
							}
						);
					}
				},
				decode_html: function( html ) {
					var txt = document.createElement( "textarea" );
					txt.innerHTML = html;
					return txt.value;
				},
				prev_page: function( ) {
					embeddable_job_widget_script.parentNode.removeChild( embeddable_job_widget_script );
					embeddable_job_widget_page = embeddable_job_widget_page - 1;

					if ( embeddable_job_widget_page < 1 ) {
						embeddable_job_widget_page = 1;
					}

					this.get_jobs( embeddable_job_widget_page )
				},
				next_page: function( ) {
					embeddable_job_widget_script.parentNode.removeChild( embeddable_job_widget_script );
					embeddable_job_widget_page = embeddable_job_widget_page + 1;
					this.get_jobs( embeddable_job_widget_page )
				}
			}
		}( );

		window.embeddable_job_widget.get_jobs( 1 );
	}
} );
