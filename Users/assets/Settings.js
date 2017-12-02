// JavaScript Document
$(document).ready(function(e) {
	initFileInput("image_upload", "../Respond/UploadForUserImage.php?id=" + getCookie("UserID"));
});

function initFileInput(ctrlName, uploadUrl) {    
    var control = $('#' + ctrlName); 
    control.fileinput({
        language: 'zh',
        uploadUrl: uploadUrl,
        allowedFileExtensions : ['jpg', 'png','gif'],
        showUpload: true,
        showCaption: true,
        browseClass: "btn btn-primary",
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>", 
    });
}