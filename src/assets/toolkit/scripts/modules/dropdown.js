
// Require jQuery
var $ = require('jquery');

// Init function
function init() {

	// For each sidebar
	$('.sidebar-dropdown').each(function(idx,el){

		// Turn to jQuery object
		el = $(el);

		// Is it open?
		var isOpen = false;

		// On click ...
		el.find('.sidebar-dropdown-toggle').on('click', function(e){

			// .. slide toggle content, ..
			el.find('.sidebar-dropdown-content').slideToggle();

			// .. and toggle class.
			el.toggleClass('open', isOpen = !isOpen );

		}); // Close on click

		// Keep it close in the beginning
		el.find('.sidebar-dropdown-content').slideUp(0);

	}); // Close each

} // Close init

// On ready
$(init);
