
var aeApp = angular.module('aeApp', []);
aeApp.factory('Store', () => {
    // hold a local copy of the state, setting its defaults
    var selectedExpert = "0";
    var showModal = false;

// expose basic getter and setter methods
    return {

        setSelectedExpert(number){
            selectedExpert = number;
        },

        getSelectedExpert(){
            return selectedExpert;
        },

    };
});
aeApp.controller('AppController', ['$rootScope', '$scope', 'Store', function ($rootScope, $scope, Store) {
    $rootScope.showModal = false;
    $scope.setMeetingClicked = function(expert_id){
        $rootScope.showModal = true;
        console.log("Selected expert id: "+ expert_id);
        Store.setSelectedExpert(expert_id);
        // if($rootScope.showModal === true){
        //     console.log(Store.getSelectedExpert());
        //     Store.setSelectedExpert('1');
        //     $scope.showModal = false;
        // }else{
        //     console.log(Store.getSelectedExpert());
        //     Store.setSelectedExpert('2');
        //     $scope.showModal = true;
        // }
    }

}]);

aeApp.component('aeModal', {
    templateUrl: '/angular/modal.html',
    controller: function ModalController(Store, $rootScope) {
        this.user = 'world';
        this.selectedExpert = Store.getSelectedExpert();

        this.hideModal = function () {
            console.log("Selected expert id: " + Store.getSelectedExpert());
            $rootScope.showModal = false;
        }
    }
});
