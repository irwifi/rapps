$( document ).ready( function( ) {
	init_draggable();
	init_droppable();
	init_rotation();
	slider_event();

	function init_draggable() {
		$( ".doodad" ).draggable( {
			helper: function() {
				return $(this).clone();
			}
		} );
	}

	function init_droppable() {
		$( ".box3" ).droppable( {
			accept: ".doodad",
			drop: function( e, ui ) {
				if ( $( ui.draggable ).hasClass( 'copied' ) ) {
					// This is when the already dropped elements are only dragged around
					// In that case we don't need to clone the element
					return
				} else {
					var droppedItem = $( ui.draggable ).clone( ).addClass( 'copied' ).css( {
						position: "absolute",
						top: $(ui.helper).offset().top - $("#rotate-area").offset().top - 10,
						left: $(ui.helper).offset().left - $("#rotate-area").offset().left
					} ).draggable( {
						containment: ".box3",
					} );
				}

				// Reset the slider to default - 5 in scale
				$("#myRange").val(5);

				droppedItem.resizable( {
					containment: ".box3",
					handles: "all",
				} );

				$( this ).append( droppedItem );
				$( droppedItem ).click( function( ) {
					$( this ).remove( );
				} );
			}
		} );
	}

	function init_rotation() {
		var angle = 0;
		interact( '#rotate-area' ).gesturable( {
			onmove: function( event ) {
				var arrow = document.getElementById( 'human' );
				angle += event.da;
				arrow.style.webkitTransform = arrow.style.transform = 'rotate(' + angle + 'deg)';
			}
		} );
	}

	function slider_event() {
		$("#myRange").on("input", function(a) {
			var scale = 10 + $("#myRange").val() * 4;
			$("#elements .doodad").width(scale).height(scale);
		});
	}
} );
