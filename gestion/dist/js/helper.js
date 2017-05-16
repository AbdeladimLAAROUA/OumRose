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
    .when("/listClient", {
        templateUrl : "pages/views/listClient.html"
    })
    .when("/listBaby", {
        templateUrl : "pages/views/listBaby.html"
    })
    .when("/listCommande", {
        templateUrl : "pages/views/listCommande.html"
    })
    .when("/listArticle", {
        templateUrl : "pages/views/listArticle.html"
    })    
    .when("/gestionBlog", {
        templateUrl : "pages/views/gestionBlog.html"
    })    
    .otherwise({
        redirectTo: '/main'
    });
});