
var $ = require('jquery');

module.exports = function(){

    window.kuekurApp.controller('AttendController', function($scope, $attrs) {
        var self = this;

        self.eventId = $attrs.eventid;
        self.attended = $attrs.attended;

        self.toggleAttend = function(){
            var path = self.attended ?"unattend" :"attend";
            $.post(window.location.origin+'/Kuekur/public/events/'+self.eventId+'/'+path, function(data){
                self.attended = data.attended;
                self.attendedUsers = data.users;
                self.attendedUsersCount = data.users.length
                $scope.$apply();
            });
        }
    });

}