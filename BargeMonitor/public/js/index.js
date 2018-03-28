(function () {
$(function() {
    hide_loading_overlay();
    load_sidebar();
    load_toastr();
});

//Load sidebar
let load_sidebar = () => {
    var easing = 1; //enable or disable easing | 0 or 1
    var easing_effect = 'swing';
    var animation_speed = 500;
     var slider_width;

    // Show sidebar
    $("#mobile_menu_button").on("click", () => {
        if(easing) $('.mobile-menu').animate({"margin-right": "-" + slider_width}, animation_speed, easing_effect);
        else $('.mobile-menu').animate({"margin-right": "-" + slider_width},animation_speed);
    });

    // Hide sidebar
    $(".mobile-menu-container, #mobile_menu_cancel").on("click", ()=>{
      if(easing) $('.mobile-menu').animate({"margin-right": "0"}, animation_speed, easing_effect, hide_mobile_overlay);
      else $('.mobile-menu').animate({"margin-right": "0"}, animation_speed, hide_mobile_overlay);
    });
};

// Load Toaster alert messages
let load_toastr = () => {
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "positionClass": "toast-top-right",
        "showDuration": "10000",
        "hideDuration": "1000",
        "timeOut": "8000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    // toastr.success('Success Message.', 'Success Alert', {}); //options in { }, types = success, info, error, warning
};

// Hide loading overlay - START
let hide_loading_overlay = () => {
  $(".barge_loader").fadeOut(100);
};
// Hide loading overlay - END
})();