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