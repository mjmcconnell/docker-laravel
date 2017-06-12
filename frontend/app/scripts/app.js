/**
 * Angular module entry point for all frontend apps.
 *
 * @author Mark McConnell <mjmcconnell.dev@gmail.com>
 */
'use strict';

var app = angular.module('FrontendApp', ['ngMaterial']);

app.config(['$interpolateProvider', function($interpolateProvider){
    $interpolateProvider.startSymbol('{[');
    $interpolateProvider.endSymbol(']}');
}]);

// List controller
app.controller('ListCtrl', function($scope, $http) {

    $scope.formData = {};
    $scope.isProcessing = false;
    $scope.records = [];

    // Process a form
    $scope.submitForm = function(){
        $scope.serverErrors = {};
        $scope.isProcessing = true;

        // Create an empty FormData object to store all form fields
        var fd = new FormData();

        // Loop through all other fields, and append them to the FormData object
        for (var key in $scope.formData) {
            if ($scope.formData[key]) {
                fd.append(key, $scope.formData[key]);
            }
        }

        // Send the data of to the api, to be stored by the server
        $http.post('/api/tasks', fd, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        })
        .then(function(result){
            $scope.isProcessing = false;
            $scope.records.push(angular.fromJson(result.data.data.record));
        }, function(error, status){
            $scope.isProcessing = false;
            var error_message = 'Something went wrong, please try again.'
            if (error['message']) {
                error_message = error['message'];
            } else if (error['error']) {
                error_message = error['error'];
            }
            for (var key in error['data']) {
                $scope.serverErrors[key] = error['data'][key];
            }
        });
    };

    $scope.deleteSelected = function(index) {
        var record = $scope.records[index];

        $http.delete('/api/tasks/' + record.id + '/delete').then(
            function() {
                $scope.records.splice(index, 1);
            },
            function(error) {
            }
        );
    };

});
