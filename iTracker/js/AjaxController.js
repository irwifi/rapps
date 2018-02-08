var AjaxController = {
    enableAjaxmask: function (container_id) {
        if (container_id) {

        }
        else {
            $('body').append('<div id="ajaxOverlay"></div>');
            $('#ajaxOverlay').css('position', 'fixed');
            $('#ajaxOverlay').css('top', '0px');
            $('#ajaxOverlay').css('left', '0px');
            $('#ajaxOverlay').css('width', '100%');
            $('#ajaxOverlay').css('height', '100%');
            $('#ajaxOverlay').css('background-color', '#ffffff');
            $('#ajaxOverlay').css('opacity', '0.9');
            $('#ajaxOverlay').css('z-index', '1200');
        }

        this.enableAjaxLoader(container_id);

        this.enableajaxLoaadingText();

        this.changeMouseCursor('wait');
    },
    enableajaxLoaadingText: function(text){
        text=text?text:"Please Wait ...";

        if(window.loadingTextValue){
            text=window.loadingTextValue;
        }

        $('#ajaxLoadingText').remove();

        $('body').append('<div id="ajaxLoadingText">  <br/> <div>'+text+'</div> <br/>  </div>');
            $('#ajaxLoadingText').css('position', 'fixed');
            $('#ajaxLoadingText').css('top', '160px');
            $('#ajaxLoadingText').css('width', '100%');
            $('#ajaxLoadingText').css('text-align', 'center');
            $('#ajaxLoadingText').css('font-size', '16px');
            $('#ajaxLoadingText').css('font-weight', 'bold');
            $('#ajaxLoadingText').css('z-index', '1202');

    },
    disableAjaxLoadingtext:function(){
        $('#ajaxLoadingText').remove();
        window.loadingTextValue=null;
    },
    disableAjaxmask: function (container_id) {
        $('#ajaxOverlay').remove();

        this.disableAjaxLoader();
        this.disableAjaxLoadingtext();
        this.changeMouseCursor('default');
        AjaxController.hideProgress();
    },
    enableAjaxLoader: function (container_id) {
        var ajax_loader = document.getElementById('ajax_loader');
        if (ajax_loader)
            $(ajax_loader).remove();

        var mainurl = window.site_root_url;
//        if (mainurl.indexOf("admin") >= 0) {
//            main_url = siteurl ? siteurl : mainurl;
//        }

        if (container_id) {
            $(container_id).append('<div id="ajax_loader"> <img src="' + mainurl + 'images/ajax-loader_green.gif"/> </div>');
            if ($('.scrollbar-inner')[0]) {
                $('.scrollbar-inner').getNiceScroll().resize();
            }
        }
        else {
            $('body').append('<div id="ajax_loader"> <img src="' + mainurl + 'images/ajax-loader_green.gif"/> </div>');
            $('#ajax_loader').css('position', 'fixed');
            $('#ajax_loader').css('top', '100px');
            $('#ajax_loader').css('width', '100px');
            $('#ajax_loader').css('margin-left', '-50px');
        }
        $('#ajax_loader').css('left', '50%');
        $('#ajax_loader').css('z-index', '1201');

    },
    disableAjaxLoader: function () {
        $('#ajax_loader').remove();
        if ($('.scrollbar-inner')[0]) {
            $('.scrollbar-inner').getNiceScroll().resize();
        }

    },
    changeMouseCursor: function (type) {
        var body = document.getElementsByTagName('body')[0];
        if (!type)
            type = 'default';

        body.style.cursor = type;
    },
    showProgress:function(val){
        var id=document.getElementById('ajax_progressBar');
        if(!id){
            $('body').append('<progress id="ajax_progressBar" value="0" max="100"></progress>');
        }

        $('#ajax_progressBar').attr('value',val);
    },
    hideProgress:function(val){
        $('#ajax_progressBar').remove();
    },
    SendAjaxRequest: function (data, type, datatype, url, success_callback, error_callback, container_id, properties,hideloader) {
        hideloader=hideloader?hideloader:false;

        if(!hideloader){
            this.enableAjaxmask(container_id);
        }

        var processData = true;
        var contentType = "application/x-www-form-urlencoded; charset=UTF-8";
        if (properties) {
            processData = properties.processData?properties.processData:false;
            contentType = properties.contentType?properties.contentType:false;
        }
        $.ajax({
            type: type,
            url: url,
            dataType: datatype,
            data: data,
            cache: false,
            processData: processData,
            contentType: contentType,
            success:
                    function (data) {
                        AjaxController.disableAjaxmask(container_id);
                        success_callback(data);
                    },
            error:
                    function (data) {
                        AjaxController.disableAjaxmask(container_id);
                        if (data.status === 200) {
                            success_callback(data);
                        }
                        else {
                            error_callback(data);
                        }
                    }

        });
    }


};
window.AjaxController = AjaxController;

jQuery.ajaxSettings.xhr = function ()
{
    var xhr = new window.XMLHttpRequest();
    //Upload progress
    xhr.upload.addEventListener("progress", function (evt) {

        if (evt.lengthComputable) {

            var percentComplete = evt.loaded / evt.total;
            percentComplete=parseInt(percentComplete*100);
            AjaxController.showProgress(percentComplete);
            //Do something with upload progress
            console.log('percent uploaded: ' + (percentComplete));
        }
    }, false);
    //Download progress
    xhr.addEventListener("progress", function (evt) {
        if (evt.lengthComputable) {
            var percentComplete = evt.loaded / evt.total;
            //Do something with download progress
            console.log('percent downloaded: ' + (percentComplete * 100));
        }
    }, false);
    return xhr;
}
