$('#imgBase64').on('change', function(){
    var reader = new FileReader();

    var svgTag = document.getElementsByTagName('svg')[0];
    if(svgTag != null){
        var imgTag = document.createElement('img');
        imgTag.setAttribute('id', 'avatarId');
        svgTag.parentNode.replaceChild(imgTag, svgTag);
        imgTag.setAttribute('class', 'previewImg');
    }

    reader.onloadend = function(){
        $('#avatarId').attr('src', reader.result);
    };
    reader.readAsDataURL(this.files[0]);
}
);