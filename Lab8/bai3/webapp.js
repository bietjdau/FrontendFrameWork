var app = angular.module("myapp", ["ngRoute"]);
app.config(function ($routeProvider) {
    $routeProvider
        .when("/home", {
            templateUrl: "views/home.html"
        })
        .when("/about", {
            templateUrl: "views/about.html"
        })
        .when("/contact", {
            templateUrl: "views/contact.html"
        })
        .otherwise("/home", {
            redirectTo: "home"
        })
});
app.run(function ($rootScope) {
    $rootScope.$on('routeChangeStart', function () {
        $rootScope.loading = true;
    });
    $rootScope.$on('routeChangeSuccess', function () {
        $rootScope.loading = false;
    });
    $rootScope.$on('routeChangeError', function () {
        $rootScope.loading = false;
        alert("Lỗi, không tải được template")
    });
});