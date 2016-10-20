
var $ = require('jquery');

module.exports = function(){
    
    var days = ['monday','tuesday','wednesday','thursday', 'friday', 'saturday', 'sunday'];

    for(var i = 0; i < days.length; i++){
        $('input[name="'+days[i]+'_end"]').attr('disabled', 'disabled');
        $('input[name="'+days[i]+'_start"]').attr('disabled', 'disabled');

    }

    var result = {};
    for(var i = 0; i < days.length; i++){
        $('input[name="'+days[i]+'"]').click (function(){
            var thisCheck = $(this);
            var name = thisCheck[0].name;
            var startField = $('input[name="'+thisCheck[0].name+'_start"]');
            var endField = $('input[name="'+thisCheck[0].name+'_end"]');

            if ( thisCheck.is(':checked') ) {
                    var obj = {};
                    
                    obj.start = startField.attr('disabled',false).on('change', function(){
                        obj.start = $(this).val();
                    }).val();

                    obj.end = endField.attr('disabled',false).on('change', function(){
                        obj.end = $(this).val();
                    }).val();

                    result[name] = obj;
            }else{
                if(result[name])
                    delete result[name];

                startField.attr('disabled',true).off('change');
                endField.attr('disabled',true).off('change');
            }
        });
    }

}