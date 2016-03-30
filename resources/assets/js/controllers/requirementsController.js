app.controller('RequirementsController', ['$scope', '$location', '$resource', 'requirementFields',
    function($scope, $location, $resource, requirementFields) {

        $scope.requirementFields = requirementFields;

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
                "programId": $scope.newProgramId
            });
            $scope.requirementCounter++;
            $scope.newCourseType = '';
            $scope.newCourseId = '';
            $scope.newProgramId = '';
        };
    }
]);