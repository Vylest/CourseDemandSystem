app.controller('TableController', ['$scope', '$location', '$filter', '$resource', 'ngTableParams', 'ScrollService',
    function($scope, $location, $filter, $resource, ngTableParams, ScrollService) {

        var Api = $resource(window.location.pathname);

        $scope.scrollService = new ScrollService();

        $scope.tableParams = new ngTableParams(angular.extend({
            page: 1,
            count: 20
        }, $location.search()), {
            total: 0,
            counts: [],
            getData: function($defer, params) {
                $location.search(params.url());

                Api.get(params.url(), function(data) {
                    var orderedData = data.data;

                    params.total(orderedData.length);

                    $defer.resolve(orderedData);
                });
            }
        });

        $scope.hideField = function(e) {
            if (e.target.value == '') {
                return false;
            } else {
                return true;
            }
        }

    }
]);