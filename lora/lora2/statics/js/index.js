$( document ).ready( function( ) {
	$( ".doodad" ).draggable( {
		helper: function() {
			return $(this).clone();
		}
	} );

	$( ".box3" ).droppable( {
		accept: ".doodad",
		drop: function( e, ui ) {
			if ( $( ui.draggable ).hasClass( 'copied' ) ) return
			var droppedItem = $( ui.draggable ).clone( ).addClass( 'copied' ).css( {
				position: "absolute",
				top: $(ui.helper).offset().top - $("#rotate-area").offset().top - 10,
				left: $(ui.helper).offset().left - $("#rotate-area").offset().left
			} ).draggable( {
				containment: ".box3",
			} );
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

	var angle = 0;
	interact( '#rotate-area' ).gesturable( {
		onmove: function( event ) {
			var arrow = document.getElementById( 'human' );
			angle += event.da;
			arrow.style.webkitTransform = arrow.style.transform = 'rotate(' + angle + 'deg)';
		}
	} );
} );
