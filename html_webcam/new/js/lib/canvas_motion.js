define(function() {
    var requestAnimFrame = (function() {
        return window.requestAnimationFrame || window.webkitRequestAnimationFrame ||
            window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame ||
            function(callback, element) {
                window.setTimeout(callback, 1000 / 60);
            };
    })();
    var canvas = function(width, height, style, addId) {
        this.width = width;
        this.height = height;
        this.style = style;
        this.ctx = null;
        this.main = null;
        this.video = null;
        this.create = function() {
            this.main = document.createElement("canvas");
            this.ctx = this.main.getContext('2d');
            this.main.width = this.width;
            this.main.height = this.height;
            document.getElementById(addId).appendChild(this.main);
        };
        this.nonecolor = function(obj) {
            //抽色
            var canvas = this;
            canvas.video = obj;
            obj.addEventListener('play', function() {
                draw(obj, canvas.ctx);
            }, false);

            function draw() {
                requestAnimFrame(draw);
                canvas.ctx.drawImage(canvas.video, 0, 0, canvas.width, canvas.height);
                var image, data, r, g, b, brightness;
                image = canvas.ctx.getImageData(0, 0, canvas.width, canvas.height);
                data = image.data;
                for (var i = 4; i < data.length; i = i + 4) {
                    r = data[i];
                    g = data[i + 1];
                    b = data[i + 2];
                    brightness = (r + b + g) / 3;
                    data[i] = data[i + 1] = data[i + 2] = brightness * 3;
                }
                image.data = data;
                canvas.ctx.putImageData(image, 0, 0);
            }
        };
        this.analyisMotionPicture = function(){
        	
        }
    };
    return canvas;
});
