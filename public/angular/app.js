
var aeApp = angular.module('aeApp', []);

//Store factory

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

//Store factory ends



//App Controller

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

//App Controller Ends


//Modal Component
aeApp.component('aeModal', {
    templateUrl: '/angular/modal.html',
    controller: function ModalController(Store, $rootScope, $scope) {
        this.user = 'world';
        this.selectedExpert = Store.getSelectedExpert();

        this.hideModal = function () {
            console.log("Selected expert id: " + Store.getSelectedExpert());
            $rootScope.showModal = false;
        };

        this.preferable_times = ["9:00 am", "10:00 am", "11:00 am"];
        this.estimated_duration = ["5 min", "10 min", "11 min"];
        this.requestNowClicked = function() {
            $scope.errorInName = false;
            $scope.errorInPhoneNumber = false;
            $scope.errorInDate = false;
            $scope.errorInTime = false;
            $scope.errorInDuration = false;
            $scope.errorInTopic = false;

            if($scope.requestor_name == undefined || $scope.requestor_name == ""){
                $scope.errorInName = true;
                console.log("Please enter your name");
            }

            if($scope.requestor_phone_number == undefined || $scope.requestor_phone_number == ""){
                $scope.errorInPhoneNumber = true;
                console.log("Please enter your phone number");
            }

            if($scope.preferable_date == undefined || $scope.requestor_phone_number == ""){
                $scope.errorInDate = true;
                console.log("Please enter your preferable date");
            }
            if($scope.preferable_time == undefined || $scope.requestor_phone_number == ""){
                $scope.errorInTime = true;
                console.log("Please enter your preferable time");
            }
            if($scope.estimated_duration == undefined || $scope.requestor_phone_number == ""){
                $scope.errorInDuration = true;
                console.log("Please enter your preferred duration");
            }
            if($scope.discussion_topic == undefined || $scope.requestor_phone_number == ""){
                $scope.errorInTopic = true;
                console.log("Please enter your discussion topic");
            }

            let expert_id = Store.getSelectedExpert();
            console.log("Request Now Clicked");
            console.log("Expert: " + expert_id);
            console.log($scope.requestor_name);
            console.log($scope.requestor_phone_number);
            console.log($scope.preferable_date);
            console.log($scope.preferable_time);
            console.log($scope.estimated_duration);
            console.log($scope.discussion_topic);


        };
    }
});
//Modal Component Ends