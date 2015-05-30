// SET THIS VARIABLE FOR DELAY, 1000 = 1 SECOND
var delayLength = 5000;
	
function doMove(panelWidth, tooFar) {
	var leftValue = $("#mover").css("left");
	
	// Fix for IE
	if (leftValue == "auto") { leftValue = 0; };
	
	var movement = parseFloat(leftValue, 10) - panelWidth;
	
	if (movement == tooFar) {
		$(".slide img").animate({
			"top": -250
		}, function() {
			$("#mover").animate({
				"left": 0
			}, function() {
				$(".slide img").animate({
					"top": 40
				});
			});
		});
	}
	else {
		$(".slide img").animate({
			"top": -250
		}, function() {
			$("#mover").animate({
				"left": movement
			}, function() {
				$(".slide img").animate({
					"top": 40
				});
			});
		});
	}
}

$(function(){
	
    var $slide1 = $("#slide-1");
    var $count = 1;
    $('.to-basket a').attr('href','/basket/product/id/' + $count);
    
	var panelWidth = $slide1.css("width");
	var panelPaddingLeft = $slide1.css("paddingLeft");
	var panelPaddingRight = $slide1.css("paddingRight");

	panelWidth = parseFloat(panelWidth, 10);
	panelPaddingLeft = parseFloat(panelPaddingLeft, 10);
	panelPaddingRight = parseFloat(panelPaddingRight, 10);

	panelWidth = panelWidth + panelPaddingLeft + panelPaddingRight;
	
	var numPanels = $(".slide").length;
	var tooFar = -(panelWidth * numPanels);
	var totalMoverwidth = numPanels * panelWidth;
	$("#mover").css("width", totalMoverwidth);

	$("#slider").append('<a href="#" id="slider-stopper">Stop</a>');

	sliderIntervalID = setInterval(function(){
		doMove(panelWidth, tooFar);
          $count =  ($count == 3) ?  1 : ++$count;
        $('.to-basket a').attr('href','/basket/product/id/' + $count);
	}, delayLength);
       
	
	$("#slider-stopper").click(function(){
		if ($(this).text() == "Stop") {
			clearInterval(sliderIntervalID);
		 	$(this).text("Start");
		}
		else {
			sliderIntervalID = setInterval(function(){
				doMove(panelWidth, tooFar);
			}, delayLength);
		 	$(this).text("Stop");
		}
		
	});


});
