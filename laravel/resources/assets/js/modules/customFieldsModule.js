
var $ = require('jquery');

module.exports = function(){

    window.kuekurApp.controller('CustomFieldsController', function($scope, $attrs) {
    	var self = this;

    	self.fields = [];
    	self.fieldsJson = '';

    	self.addField = function(){
    		var customField = {name:'', type:'text', key:randomString(10) };
    		self.fields.push(customField);
    		self.nameChange(customField);
    		stringify();
    	}

    	self.deleteField = function( customField ){
    		self.fields.splice( self.fields.indexOf(customField) ,1);
    		stringify();
    	}

    	self.nameChange = function( customField ){
    		customField.slug = customField.key + "_" + slugify(customField.name);
    		stringify();
    	}

    	function stringify(){
    		self.fieldsJson = angular.toJson(self.fields);
    	}

    	function randomString(len, an){
		    an = an&&an.toLowerCase();
		    var str="", i=0, min=an=="a"?10:0, max=an=="n"?10:62;
		    for(;i++<len;){
		      var r = Math.random()*(max-min)+min <<0;
		      str += String.fromCharCode(r+=r>9?r<36?55:61:48);
		    }
		    return str;
		}

    	function slugify(text){
			return text.toString().toLowerCase()
						.replace(/\s+/g, '-')           // Replace spaces with -
						.replace(/[^\w\-]+/g, '')       // Remove all non-word chars
						.replace(/\-\-+/g, '-')         // Replace multiple - with single -
						.replace(/^-+/, '')             // Trim - from start of text
						.replace(/-+$/, '');            // Trim - from end of text
		}

    });

}