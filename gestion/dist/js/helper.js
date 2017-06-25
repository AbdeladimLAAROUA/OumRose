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
    .when("/eligibleBox1", {
        templateUrl : "pages/views/eligibleBox1.html"
    })
    .when("/eligibleBox2", {
        templateUrl : "pages/views/eligibleBox2.html"
    })
    .when("/eligibleBox3", {
        templateUrl : "pages/views/eligibleBox3.html"
    })
    .when("/allCommande", {
        templateUrl : "pages/views/allCommande.html"
    })
    .when("/commandeSB", {
        templateUrl : "pages/views/commandeSB.php"
    }) 
    .when("/commandeLD", {
        templateUrl : "pages/views/commandeLD.php"
    })
     .when("/commandeOX", {
        templateUrl : "pages/views/commandeOX.php"
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
    .when("/gestionClient", {
        templateUrl : "pages/views/listClient_2.php"
    })    
    .otherwise({
        redirectTo: '/main'
    });
});