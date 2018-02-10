var imageUploader = {
    imagesArray:[],
    //holder: document.getElementById('placeHolder'),
    imageCollection: document.getElementById('imageCollection'),
    bindDragDroptoHolder: function () {
        var
                filedrag = this.holder;

        // is XHR2 available?
        var xhr = new XMLHttpRequest();
        if (xhr.upload) {
            // file drop
            filedrag.addEventListener("dragover", this.FileDragHover, false);
            filedrag.addEventListener("dragleave", this.FileDragHover, false);
            filedrag.addEventListener("drop", this.FileSelectHandler, false);
        }
    },
    FileDragHover: function (e) {
        e.stopPropagation();
        e.preventDefault();
        e.target.className = (e.type == "dragover" ? "highlight" : "");
        ;

    },
    FileSelectHandler: function (e) {
        imageUploader.imagesArray=null;
        imageUploader.imagesArray=[];
        imageUploader.FileDragHover(e);
        var files = e.target.files || e.dataTransfer.files;
        for (var i = 0, f; f = files[i]; i++) {
            imageUploader.ParseFile(f);
        }

    },
    ParseFile: function (file) {
        if (file.type.indexOf("image") == 0) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var img = document.createElement('img');
                img.className = 'imgThumbnail';
                img.src = e.target.result;
                imageUploader.imageCollection.appendChild(img);
                imageUploader.imagesArray.push(e.target.result);
            }
            reader.readAsDataURL(file);
        }

    },
    clearImageCollection:function(){
        imageUploader.imagesArray=null;
        imageUploader.imagesArray=[];
        $(imageUploader.imageCollection).empty();
    }
};

window.imageUploader = imageUploader;
var fileselect = document.getElementById('fileselect');
fileselect.addEventListener("change", imageUploader.FileSelectHandler, false);
//if (window.File && window.FileList && window.FileReader)
//    imageUploader.bindDragDroptoHolder();

$(window).on('shown.bs.modal', function() {
    imageUploader.clearImageCollection();
});
