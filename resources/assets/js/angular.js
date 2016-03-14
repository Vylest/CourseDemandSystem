var app = angular.module('CourseApp',
    []).filter('boolean', function() {
    return function(input) {
        if (input == 1) {
            return 'Yes';
        } else {
            return 'No';
        }
    }
});