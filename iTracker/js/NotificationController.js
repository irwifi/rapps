var NotificationController = {
    counter: 0,
    showNotification: function (message, type, time, data_action, zIndex) {
        time = time ? time : 5;
        zIndex = zIndex ? zIndex : 1100;

        NotificationController.create_Bubble_notification({
            message: message,
            anim: true,
            timer: time, //seconds
            type: type,
            action: data_action,
            zIndex: zIndex,
            speed: 250 //milli seconds
        });
    },
    create_Bubble_notification: function (data) {
        var message = data.message;
        var is_animation = data.anim;//true or false
        var destroy_after = data.timer;// after this much seconds, close notification
        var type = data.type;
        var data_action = data.action;
        var speed = data.speed;//milli seconds , less is faster

        destroy_after *= 1000;

        var class_css = 'notification_' + type;


        this.counter++;
        var id = "bubble_" + this.counter;
        $('body').append('<div id=' + id + ' class="notification_bubble ' + class_css + '"></div>');
        $('#' + id).append('<div>' + message + '</div>');

        if (data_action) {
            $('#' + id).attr('data-action', data_action);
        }

        var direction = {left: '50px'};
        if (type === 'delete') {
            direction = {right: '50px'};
            $('#' + id).css('right', 0);
        }
        else if (type === 'notice') {
            direction = {top: '50px'};
            $('#' + id).css('top', 0);
            $('#' + id).css('left', '50%');
            var w = $('#' + id).width();
            w = w / 2;
            $('#' + id).css('margin-left', -w + 'px');
        }
        else if (type === 'event') {
            direction = {top: '10px'};
            $('#' + id).css('top', 0);
            $('#' + id).css('left', '50%');
            var w = $('#' + id).width();
            w = w / 2;
            $('#' + id).css('margin-left', -w + 'px');
        }
        else {
            $('#' + id).css('left', 0);
        }

        $('.notification_bubble').css('z-index', data.zIndex);

        $.Velocity($('#' + id)[0], direction, {easing: "easeInSine", duration: speed, complete: function () {
                setTimeout(function () {
                    $('#' + id).remove();
                }, destroy_after);
            }});

    },
    showNewNoticeIcon: function () {
//        var ele=$('#user_notice');
//        var brect=ele[0].getBoundingClientRect();
//
//        var left=brect.left?brect.left:brect.x;
//        var top=brect.top?brect.top:brect.y;
//
//        left+=brect.width-10;

        $('#newnoticeicon').remove();

        $('#user_notice').append('<div id="newnoticeicon" title="new notification">*</div>');
//        $('#newnoticeicon').css('left',left);
//        $('#newnoticeicon').css('top',top);

        $('#newnoticeicon').show('slow');
    },
    initializeUserNotification: function (data) {
        var new_notice = data.new_notice;
        var notifications = data.data;
        if (new_notice) {
            this.showNewNoticeIcon();
        }
        this.UserNotifications = notifications;
        this.UserNewnotice = new_notice;

    },
    showUserNotificationPopup: function (data) {
        $('#UserNotificationPopup').remove();

        $('body').append('<div id="UserNotificationPopup"> <button style="float: right;" data-action="userNotification-close">Close</button> <h3>Notifications</h3> </div>');
        $('#UserNotificationPopup').append('<div> <ul id="userNoticeList"></ul> </div>');

        for (var row in data) {
            row = data[row];
            if (row)
                $('#userNoticeList').append('<li> <div class="userNoticeListHeading">' + row.title + '</div> <div class="userNoticeListText">' + row.description + '</div> <div class="userNoticeTime">' + row.created_ts + '</div> </li>');
        }

        $('#UserNotificationPopup').show();
    },
    showConfirmPopup: function (callback,message,nocallback) {
        $('#ajaxOverlay').remove();
        $('#confirmpopup').remove();

        message=message?message:'Are you sure ?';

        $('body').append('<div id="ajaxOverlay"></div>');
        $('#ajaxOverlay').css('position', 'fixed');
        $('#ajaxOverlay').css('top', '0px');
        $('#ajaxOverlay').css('left', '0px');
        $('#ajaxOverlay').css('width', '100%');
        $('#ajaxOverlay').css('height', '100%');
        $('#ajaxOverlay').css('background-color', '#ffffff');
        $('#ajaxOverlay').css('opacity', '0.6');
        $('#ajaxOverlay').css('z-index', '1200');

        $('body').append('<div id="confirmpopup"> </div>');
        $('#confirmpopup').append('<div>'+message+'</div>');
        $('#confirmpopup').append('<div><button class="btn btn-success confirmBtn" data-value="yes">Yes</button> <button class="btn btn-danger confirmBtn" data-value="no">No</button></div>');

        $('.confirmBtn').click(function () {
            var val = $(this).attr('data-value');
            console.log(val);
            if (val === 'yes') {
                callback();
            }
            else {
                if(nocallback)
                    nocallback();
            }
            $('#ajaxOverlay').remove();
            $('#confirmpopup').remove();
        });
    },
    showAlertPopup: function (message) {
        $('#ajaxOverlay').remove();
        $('#alertpopup').remove();

        message=message?message:'Are you sure ?';

        $('body').append('<div id="ajaxOverlay"></div>');
        $('#ajaxOverlay').css('position', 'fixed');
        $('#ajaxOverlay').css('top', '0px');
        $('#ajaxOverlay').css('left', '0px');
        $('#ajaxOverlay').css('width', '100%');
        $('#ajaxOverlay').css('height', '100%');
        $('#ajaxOverlay').css('background-color', '#ffffff');
        $('#ajaxOverlay').css('opacity', '0.6');
        $('#ajaxOverlay').css('z-index', '1200');

        $('body').append('<div id="alertpopup"> </div>');
        $('#alertpopup').append('<div>'+message+'</div>');
        $('#alertpopup').append('<div><button class="btn btn-success alertOkBtn" data-value="yes">OK</button> </div>');

        $('.alertOkBtn').click(function () {
            $('#ajaxOverlay').remove();
            $('#alertpopup').remove();
        });
    }
};
window.NotificationController = NotificationController;

