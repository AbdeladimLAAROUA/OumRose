var app = angular.module("tutoApp", ["mainModule","ngRoute"]);

var mainModule = angular.module('mainModule', []);

app.config(function($routeProvider) {
    $routeProvider
    .when("/", {
        templateUrl : "pages/views/main.html"
    })
    .when("/main", {
        templateUrl : "pages/views/main.html"
    })
    .when("/red", {
        templateUrl : "pages/views/red.html"
    })
    .when("/green", {
        templateUrl : "pages/views/green.html"
    })
    .when("/blue", {
        templateUrl : "pages/views/blue.html"
    })    
    .otherwise({
        redirectTo: '/main'
    });
});