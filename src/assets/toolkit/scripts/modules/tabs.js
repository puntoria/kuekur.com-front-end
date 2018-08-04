
var $ = require('jquery');

var selector = '[data-xtabs]';

function init() {

	var xtabs = $(selector);

	xtabs.each((idx,el) => {

		el = $(el);

		var tabContent = el.find('[data-xtab-content]');
		var tabTabs = el.find('[data-xtab]');

		function changeTab( tab ) {
			tabTabs.removeClass('active');
			tab.addClass('active');
			tabContent.hide().filter( tab.attr('href') ).addClass('active').show();
		}

		changeTab( tabTabs.filter('.active') )

		tabTabs.on('click', (e) => {
			e.preventDefault();
			changeTab( $(e.currentTarget) );
		});

	});

}

$(init);
