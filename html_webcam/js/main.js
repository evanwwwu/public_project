requirejs.config({
	urlArgs: "bust=" +  (new Date()).getTime(), 
	paths: {
		"webcam": "lib/webcam",
		"canvas_motion": "lib/canvas_motion",
		"glfx":"lib/glfx-neu",
		"detector":"lib/simple-motion-detector",
		"moving":"lib/moving-averager"
	},
	shim: {
		'canvas_motion':["glfx"],
		"detector":["moving","glfx"]
	}
}); 

requirejs(['webcam','canvas_motion','detector'], function(Webcam, Canvas) {
    //WEBCAM 視窗大小
    var WIDTH = window.innerWidth / 4;
    var HEIGHT = WIDTH * 3/4;
    var can_style = {};

    var webcam = new Webcam(WIDTH, HEIGHT, can_style, 'webcam');
    webcam.init();

    // var c1 = new Canvas(WIDTH, HEIGHT, can_style, 'webcam'); 
    // c1.create();
    // c1.nonecolor(webcam.video);

    var motionDetector = new SimpleMotionDetector('webcam');
    motionDetector.init();

});
