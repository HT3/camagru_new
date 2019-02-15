(function() {
    var canvas = document.getElementById('canvas');
    var context = canvas.getContext('2d');
    var video = document.getElementById('video');
    var image = new Image();

    image.src = document.getElementById('sticker').value;

    if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
        navigator.mediaDevices.getUserMedia({
            video: true 
        }).then(function(stream) {
            video.srcObject = stream;
            video.play();
        });
    }

    document.getElementById('capture').addEventListener('click', function() {
        image.src = document.getElementById('sticker').value;
        context.drawImage(video, 0, 0, 400, 300);
        context.drawImage(image, 200, 150, 200, 150,);
        photo.setAttribute('src', canvas.toDataURL('image/png'));
        document.getElementById('image').value = canvas.toDataURL('image/png');
        //console.log(document.getElementById('image').value);
    });

})();