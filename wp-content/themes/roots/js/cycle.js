// Insert additional featured articles into banner
var secCont = $('#sec-cont');
var target = $('#sec-cont');
fiHeight = $('#sec-cont').height();
target.css('height', fiHeight);
$.ajax({
	url: '/?ajax=true',
	cache: false,
	success: function(data) {
		secCont.append(data); // If we only append the results, we'll get a duplicate
	},
	complete: function() {
		secCont.cycle({
			fx: 'fade',
			timeout: 10000,
			speed: 500,
			pause: 0
		});
	}
});
