var _ = require('lodash');

module.exports = {
	default: function (value, defaultValue) {
		return value ? value : defaultValue;
	},
	compare: function (lvalue, operator, rvalue, options) {
		var operators, result;

		if (arguments.length < 3) {
			throw new Error("Handlerbars Helper 'compare' needs 2 parameters");
		}

		if (options === undefined) {
			options = rvalue;
			rvalue = operator;
			operator = "===";
		}

		operators = {
			'==': function (l, r) { return l == r; },
			'===': function (l, r) { return l === r; },
			'!=': function (l, r) { return l != r; },
			'!==': function (l, r) { return l !== r; },
			'<': function (l, r) { return l < r; },
			'>': function (l, r) { return l > r; },
			'<=': function (l, r) { return l <= r; },
			'>=': function (l, r) { return l >= r; },
			'typeof': function (l, r) { return typeof l == r; }
		};

		if (!operators[operator]) {
			throw new Error("Handlerbars Helper 'compare' doesn't know the operator " + operator);
		}

		result = operators[operator](lvalue, rvalue);

		if (result) {
			return options.fn(this);
		} else {
			return options.inverse(this);
		}

	},
	attr: function(value) {
		return _.kebabCase(value);
	},
	image: function(baseurl, value){
		return baseurl + `/assets/toolkit/images/${value}`;
	},

	/**
	* Extend a layout that contains block definitions
	* @param  {String} layout  name of the layout to extend
	* @param  {Object} options normal handlebars options
	* @return {String}         rendered layout
	*/
	extend: function (layout, options) {
		var output = null;
		var context = Object.create(this || null);
		var template = Handlebars.partials[layout];

		if (typeof template === 'undefined') {
			throw new Error("Missing layout: '" + layout + "'");
		}

		if (typeof template === 'string') {
			template = Handlebars.compile(template);
		}

		if (typeof options.fn === 'function') {
			options.fn(context);
		}

		return template(context);
	},


	/**
	* Used within layouts to define block sections
	* @param  {String} name    name of block to be referenced later
	* @param  {Object} options normal handlebars options
	* @return {String}         rendered block section
	*/
	block: function (name, options) {
		var block = null;

		this.blocks = this.blocks || {};
		block = this.blocks[name];

		var optionsFn = options.fn || function () {return '';};

		switch (block && block.fn && block.mode.toLowerCase()) {
			case 'append':
			return optionsFn(this) + block.fn(this);

			case 'prepend':
			return block.fn(this) + optionsFn(this);

			case 'replace':
			return block.fn(this);

			default:
			return optionsFn(this);
		}
	},


	/**
	* Used within templates that extend a layout to define
	* content that will replace block sections
	* @param  {String} name    name of the block to replace
	* @param  {Object} options normal handlebars options
	* @return {String}         rendered content section
	*/
	content: function (name, options) {
		options = options || {};
		options.hash = options.hash || {};
		var mode = options.hash['mode'] || 'replace';

		this.blocks = this.blocks || {};
		this.blocks[name] = {
			mode: mode.toLowerCase(),
			fn: options.fn
		};
	}

};
