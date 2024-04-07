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
        .when("/feedback", {
            templateUrl: "views/feedback.html"
        })
        .when("/faq", {
            templateUrl: "views/faq.html"
        })

        .when("/account/login", {
            templateUrl: "views/accounts/login.html"
        })
        .when("/account/register", {
            templateUrl: "views/accounts/register.html"
        })
        .when("/account/forgot", {
            templateUrl: "views/accounts/forgot.html"
        })
        .when("/account/logoff", {
            redirectTo: "/home"
        })
        .when("/account/change", {
            templateUrl: "views/accounts/change.html"
        })
        .when("/account/profile", {
            templateUrl: "views/accounts/profile.html"
        })
        .when("/account/orders", {
            templateUrl: "views/accounts/orders.html"
        })
        .when("/account/products", {
            templateUrl: "views/accounts/products.html"
        })

        .when("/category/:id", {
            templateUrl: "views/category/productList.html",
            controller: "categoryCtrl"
        })
        .when("/supplier/:id", {
            templateUrl: "views/category/productList.html",
            controller: "categoryCtrl"
        })
        .when("/special/:id", {
            templateUrl: "views/category/productList.html",
            controller: "categoryCtrl"
        })
        .otherwise("/home", {
            redirectTo: "/home"
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