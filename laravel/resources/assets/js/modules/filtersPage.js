
var $ = require('jquery');

module.exports = function(){

    window.kuekurApp.controller('SearchController', function($scope) {
        var self = this;

        self.events = [];
        self.filters = { page: 1 };

        self.nextPage = function(){
            self.changePage( Math.min( self.filters.page+1, self.last_page ) );
        }

        self.prevPage = function(){
            self.changePage( Math.max( self.filters.page-1, 1 ) );
        }

        self.changePage = function( page ){
            if( page != self.filters.page ){
                self.filters.page = page;
                self.filter();
            }
        }

        self.filter = function( resetPage ){
            $.get( window.location.origin + window.location.pathname, self.filters, function(response){
                if( resetPage == true ){
                    self.filters.page = 1;
                }
                self.events = response.data;
                self.last_page = response.last_page;
                $scope.$apply();
            });
        }

        self.filter();
    });

}