var app = angular.module('CourseApp', [
        'ngTable',
        'ngResource',
        'infinite-scroll'
    ])
    .filter('boolean', function() {
        return function(input) {
            if (input == 1) {
                return 'Yes';
            } else {
                return 'No';
            }
        }
    });
app.factory("requirementFields", function() {
    var requirementFields = {};
    requirementFields.data = [];
    return requirementFields;
});
app.factory('ScrollService', ['$http', '$location',
    function($http, $location) {
        var Entry = function() {
            this.busy = false;
            this.after = 2;
        };

        Entry.prototype.nextPage = function() {
            if (this.busy) {
                return;
            }

            this.busy = true;

            params = $location.search();
            params.page = this.after;
            var url = window.location.pathname;

            $http.get(url, {
                params: params
            }).success(function(data) {
                var items = data.data;
                for (var i = 0; i < items.length; i++) {
                    angular.element('[ng-controller=TableController]').scope().tableParams.data.push(items[i]);
                }
                this.after++;
                this.busy = false;
            }.bind(this));
        };

        return Entry;
    }
]);
app.controller('RequirementsController', ['$scope', '$location', '$resource', 'requirementFields',
    function($scope, $location, $resource, requirementFields) {

        var Api = $resource('/courses/get');

        $scope.requirementFields = requirementFields;

        getCourses = function() {
            Api.query(null, function(data) {
                $scope.courses = data;
            });
        };

        $scope.courseTypes = [{
            value: 0,
            title: 'Required'
        }, {
            value: 1,
            title: 'Elective'
        }];


        getCourses();

        $scope.deleteRequirement = function(index) {
            var removeDiv = angular.element(document.querySelector('#requirements' + index));
            removeDiv.remove();
        };

        $scope.deleteRequirementField = function(index) {
            requirementFields.data.splice(index, 1);
        };

        $scope.requirementCounter = 1;

        $scope.addRequirementField = function() {
            requirementFields.data.push({
                "id": $scope.requirementCounter,
                "type": $scope.newCourseType,
                "courseId": $scope.newCourseId,
                "courseTitle": $scope.newCourseId.title,
                'courseType': $scope.newCourseType.title,
                "programId": $scope.newProgramId
            });
            $scope.requirementCounter++;
            $scope.newCourseType = '';
            $scope.newCourseId = '';
            $scope.newProgramId = '';
        };
    }
]);
/**
 * Created by epenner on 3/29/2016.
 */
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