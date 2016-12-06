define(
	['//maps.googleapis.com/maps/api/js?key=AIzaSyBb8xC7hYpD8eol4m9EZaWcTMA-CS0UYO8&callback=initMap'],
	function (goog) {
		console.log('F:map.js: ', goog);

		window.initMap = function () {
			// Create a map object and specify the DOM element for display.
			/*var map = new google.maps.Map(document.getElementById('map'), {
			 center: {lat: -34.397, lng: 150.644},
			 scrollwheel: false,
			 zoom: 8
			 });*/

			console.log('init map bum');
		};

		/*
		 *
		 * <script>
		 function initMap() {
		 // Create a map object and specify the DOM element for display.
		 var map = new google.maps.Map(document.getElementById('map'), {
		 center: {lat: -34.397, lng: 150.644},
		 scrollwheel: false,
		 zoom: 8
		 });
		 }

		 </script>
		 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBb8xC7hYpD8eol4m9EZaWcTMA-CS0UYO8&callback=initMap"
		 async defer></script>*/
	}
);