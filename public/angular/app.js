
var aeApp = angular.module('aeApp', []);

//Store factory

aeApp.factory('Store', () => {
    // hold a local copy of the state, setting its defaults
    var selectedExpert = "0";
    var selectedExpertCost = 0;
    var showModal = false;

// expose basic getter and setter methods
    return {

        setSelectedExpert(number){
            selectedExpert = number;
        },

        getSelectedExpert(){
            return selectedExpert;
        },

        setSelectedExpertCost(cost){
            selectedExpertCost = cost;
        },

        getSelectedExpertCost(){
            return selectedExpertCost;
        },

    };
});

//Store factory ends



//App Controller

aeApp.controller('AppController', ['$rootScope', '$scope', 'Store', '$http', function ($rootScope, $scope, Store, $http) {
    $rootScope.showModal = false;
    $scope.setMeetingClicked = function(expert_id){
        $rootScope.showModal = true;
        console.log("Selected expert id: "+ expert_id);
        Store.setSelectedExpert(expert_id);

        var url = 'api/expert/' + Store.getSelectedExpert() + '/cost';

        //GET request to get cost per minute of expert:
        $http({
            method: 'GET',
            url: url
        }).then(function successCallback(response) {
            Store.setSelectedExpertCost(response.data.data.rate);
            console.log("Expert cost set to "+ Store.getSelectedExpertCost());
        }, function errorCallback(response) {
            console.log(response.data.error);
        });
    }

}]);

//App Controller Ends


//Modal Component
aeApp.component('aeModal', {
    templateUrl: '/angular/modal.html',
    controller: function ModalController(Store, $rootScope, $scope, $http) {

        this.user = 'world';
        this.submitted_successfully = false;
        this.submitting = false;
        this.selectedExpert = Store.getSelectedExpert();

        this.showSendingRequest = false;
        this.hideModal = function () {
            $rootScope.showModal = false;
            $scope.submitted_successfully = false;
            $scope.submitting = false;
            resetErrorVariables();
            resetModels();
        };

        this.preferable_times = ["6:00 am", "7:00 am", "8:00 am", "9:00 am", "10:00 am", "11:00 am", "12:00 pm", "1:00 pm", "2:00 pm", "3:00 pm",  "4:00 pm",  "5:00 pm",  "6:00 pm",  "7:00 pm",  "8:00 pm",  "9:00 pm",  "10:00 pm",  "11:00 pm",  "12:00 am"];
        this.estimated_duration = ["5 minutes", "10 minutes", "15 minutes"];

        var resetModels = function () {
            $scope.requestor_name = "";
            $scope.requestor_phone_number = "";
            $scope.preferable_date = "";
            $scope.preferable_time = "";
            $scope.estimated_duration = "";
            $scope.discussion_topics = "";
        };

        var resetErrorVariables = function () {
            $scope.errorInName = false;
            $scope.errorInPhoneNumber = false;
            $scope.errorInDate = false;
            $scope.errorInTime = false;
            $scope.errorInDuration = false;
            $scope.errorInTopic = false;
        };
        this.requestNowClicked = function() {
            FB.AppEvents.logEvent("requestNowClicked");
            var has_error_flag = false;
            resetErrorVariables();

            if($scope.requestor_name == undefined || $scope.requestor_name == ""){
                $scope.errorInName = true;
                console.log("Please enter your name");
                has_error_flag = true;
            }

            if($scope.requestor_phone_number == undefined || $scope.requestor_phone_number == ""){
                $scope.errorInPhoneNumber = true;
                console.log("Please enter your phone number");
                has_error_flag = true;
            }

            if($scope.preferable_date == undefined || $scope.requestor_phone_number == ""){
                $scope.errorInDate = true;
                console.log("Please enter your preferable date");
                has_error_flag = true;
            }
            if($scope.preferable_time == undefined || $scope.requestor_phone_number == ""){
                $scope.errorInTime = true;
                console.log("Please enter your preferable time");
                has_error_flag = true;
            }
            if($scope.estimated_duration == undefined || $scope.requestor_phone_number == ""){
                $scope.errorInDuration = true;
                console.log("Please enter your preferred duration");
                has_error_flag = true;
            }
            if($scope.discussion_topics == undefined || $scope.requestor_phone_number == ""){
                $scope.errorInTopic = true;
                console.log("Please enter your discussion topic");
                has_error_flag = true;
            }

            if(has_error_flag == false){
                $scope.submitting = true;
                let expert_id = Store.getSelectedExpert();

                var data = $.param({
                    requestor_name: $scope.requestor_name,
                    requestor_phone_number: $scope.requestor_phone_number,
                    preferable_date: $scope.preferable_date,
                    preferable_time: $scope.preferable_time,
                    estimated_duration: $scope.estimated_duration,
                    discussion_topics: $scope.discussion_topics
                });

                var config = {
                    headers : {
                        'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
                    }
                };

                var url = '/api/expert/'+ expert_id +'/meeting';

                $http.post(url, data, config).then(function(response){
                    $scope.message = response.data.data.message;
                    $scope.submitting = false;
                    $scope.submitted_successfully = true;
                });

            }else{
                console.log('There is validation error in form');
            }

        };

        this.loadCostings = function () {
            var cost = Store.getSelectedExpertCost();
            var array = [];
            var count = 5;
            while(count<=15){
                array.push(count + " minutes, Tk." + cost*count );
                count = count + 5;
            }
            this.estimated_duration = array;
        }

        this.close = function($event){
            console.log($(event.target).prop("class"));
            if($(event.target).prop("class") == "modal modal-booking" || $(event.target).prop("class") ==  "modal-dialog modal-lg"){
                this.hideModal();
            }
        }
       
    }
});
//Modal Component Ends