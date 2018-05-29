define(function() {

    var errorCallback = function(e) {
        console.log('error!', e);
    };
    var getUserMedia = navigator.getUserMedia || navigator.mozGetUserMedia || navigator.webkitGetUserMedia;
    var webcam = function(width, height, style, addId) {
        this.width = width;
        this.height = height;
        this.style = style;
        this.video = document.createElement('video');
        this.init = function(arguments) {
            if (getUserMedia) {
                getUserMedia = getUserMedia.bind(navigator);
                var video = this.video;
                video.width = this.width;
                video.height = this.height;
                var localMediaStream = null;
                getUserMedia({
                    audio: false,
                    video: true
                }, function(stream) {
                    video.src = window.URL.createObjectURL(stream);
                    document.getElementById(addId).appendChild(video);
                    localMediaStream = stream;
                    video.play();
                }, errorCallback);
            } else {
                alert('Your browser does not seem to support UserMedia');
            }
        }
    };
    return webcam
});
