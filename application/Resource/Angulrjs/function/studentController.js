(function () {
    angular
        .module('app', [])
        .controller('AppCtrl', ['$scope', function ($scope) {
            $scope.slider = 6;
        }])
        .filter('filter', function () {
            return function (input) {
                return 0.1 * input;
            };
        });
})();