
var $ = require('jquery');

function init() {

	var map;
	function initialize() {
		if( !$('.google-map').size() ) return;

		var mapOptions = {
			zoom: 5,
			center: new google.maps.LatLng(37,  38)
		};
		map = new google.maps.Map( $('.google-map').get(0), mapOptions);
	}

	google.maps.event.addDomListener(window, 'load', initialize);

}

$(init);
