(function() {
    var video = document.getElementById('video'),
        canvas = document.getElementById('canvas'),
        context = canvas.getContext('2d'),
        photo = document.getElementById('photo'),
        vendorUrl = window.URL || window.webkitURL;
    navigator.getUserMedia =    navigator.getUserMedia ||
                                navigator.webkitGetUserMedia ||
                                navigator.mozGetUserMedia ||
                                navigator.msGetUserMedia;

    navigator.getUserMedia({
        video: true,
        audio: false
    }, function(stream) {
        video.src = vendorUrl.createObjectURL(stream);
        video.onplay();
    }, function(error) {
        // An error occured
        // error code
    });
    document.getElementById('capture').addEventListener('click', function(){
        context.drawImage(video, 0, 0, 300, 300);
        photo.setAttribute('src', canvas.toDataURL('image/png'));
    });
})();