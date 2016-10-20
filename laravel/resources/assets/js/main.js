'use strict';

var $ = require("jquery");

$.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content') }
});

var angular = require("Angular");

window.kuekurApp = angular.module('kuekurApp', []);

// Modules
var modules = {
    common:             require('./modules/common'),
    recurringField:     require('./modules/recurringField'),
    filtersPage:        require('./modules/filtersPage'),
    attendModule:       require('./modules/attendModule'),
    customFieldsModule: require('./modules/customFieldsModule')
}

$(document).ready(function() {
    
    for(var i in modules){

        var name = i.replace(/([A-Z])/g, function($1){  return "_"+$1.toLowerCase() });

        if( i == 'common' || $("*[data-module="+name+"]").size() ){

            if( modules[i] instanceof Function ){

                modules[i].call(this);

            }

        }

    }

});
