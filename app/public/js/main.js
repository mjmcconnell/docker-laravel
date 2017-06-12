(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
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

});

},{}]},{},[1]);
