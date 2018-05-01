$( document ).ready( function( ) {
	init_draggable();
	init_droppable();
	init_rotation();
	action_event();

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

				$( this ).append( droppedItem );

				droppedItem.resizable( {
					containment: ".box3",
					handles: "all",
				} );

				$( droppedItem ).click( function( ) {
					$(this).on("dblclick", function() {
						$(this).remove();
						$(".action_panel").hide();
					});

					if(!$( this ).hasClass("selected")) {
						$(".selected").removeClass("selected");
						$(this).addClass("selected");
						var element_width = $(".selected").width();
						if(element_width == 30) {element_width = 27;}
						$("#myRange").val(element_width/9);
						$(".action_panel .schmerzlevel_val").text($("#myRange").val());
						$(".action_panel").show();
					} else {
						$(this).removeClass("selected");
						$(".action_panel").hide();
					}
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

	function action_event() {
		$(".action_panel .delete").on("click", function() {
			$(".doodad.selected").remove();
			$(".action_panel").hide();
		});

		$("#myRange").on("input", function(a) {
			var scale = $("#myRange").val() * 9;
			var offset_change = 4;
			if($(".doodad.selected").width() < scale) {
				offset_change = offset_change * (-1);
			}

			$(".doodad.selected").offset({top: $(".doodad.selected").offset().top + offset_change, left: $(".doodad.selected").offset().left + offset_change});
			$(".doodad.selected").width(scale).height(scale);
			$(".action_panel .schmerzlevel_val").text($("#myRange").val());
		});
	}
} );
