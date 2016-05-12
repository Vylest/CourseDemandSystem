(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
"use strict";
/**
 * Created by epenner on 3/9/2016.
 */

var program = require('./classes/program.js');

$(document).ready(function () {

    new program();

    function checkRequirement() {
        var courseSelect = $('#requirementCourseSelect').val();
        var typeSelect = $('#requirementTypeSelect').val();
        if (courseSelect == '?' || typeSelect == '?') {
            return false;
        }
        return true;
    }

    // popup for delete buttons
    $('.delete-confirm').on('submit', function () {
        return confirm('Are you sure you want to delete this?');
    });

    // cascade delete confirm
    $('.delete-cascade').on('submit', function () {
        return confirm("\t\tAre you SURE you want to delete this?\nTHIS WILL DELETE ALL ENROLLMENTS ASSOCIATED WITH THIS DEGREE PROGRAM FOR ALL STUDENTS");
    });

    // fade alerts that indicate success
    window.setTimeout(function () {
        $(".alert-success").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 3000);

    $("#showRequirementForm").on('click', function () {
        $("#addRequirementForm").toggle();
    });

    $('#addRequirement').on('click', function () {
        $('#requirementQueue').show();
    });

    // activate collapse
    $('.collapse').collapse();
});

},{"./classes/program.js":2}],2:[function(require,module,exports){
"use strict";

class Program {
    constructor() {
        this.showProgramInfo();

        $('select#program_id').on('change', () => {
            this.showProgramInfo();
        });
    }

    showProgramInfo() {
        var id = $('select#program_id').val();
        if (id && id != '') {
            $.ajax({
                url: '../../../programs/' + id + '/info'
            }).done(data => {
                $('#program-info').html(data);
                console.debug('Program info loaded');
            });
        }
    }
}

module.exports = Program;

},{}]},{},[1])
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIi4uLy4uLy5ucG0tbG9jYWwvbWF2cGxhbi9ub2RlX21vZHVsZXMvYnJvd3Nlci1wYWNrL19wcmVsdWRlLmpzIiwiYXBwLmpzIiwicHJvZ3JhbS5qcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQTtBQ0FBOzs7OztBQUlBLElBQUksVUFBVSxRQUFRLHNCQUFSLENBQVY7O0FBRUosRUFBRSxRQUFGLEVBQVksS0FBWixDQUFrQixZQUFXOztBQUV6QixRQUFJLE9BQUosR0FGeUI7O0FBSXpCLGFBQVMsZ0JBQVQsR0FBNEI7QUFDeEIsWUFBSSxlQUFlLEVBQUUsMEJBQUYsRUFBOEIsR0FBOUIsRUFBZixDQURvQjtBQUV4QixZQUFJLGFBQWEsRUFBRSx3QkFBRixFQUE0QixHQUE1QixFQUFiLENBRm9CO0FBR3hCLFlBQUksZ0JBQWdCLEdBQWhCLElBQXVCLGNBQWMsR0FBZCxFQUFtQjtBQUMxQyxtQkFBTyxLQUFQLENBRDBDO1NBQTlDO0FBR0EsZUFBTyxJQUFQLENBTndCO0tBQTVCOzs7QUFKeUIsS0FjekIsQ0FBRSxpQkFBRixFQUFxQixFQUFyQixDQUF3QixRQUF4QixFQUFrQyxZQUFXO0FBQ3pDLGVBQU8sUUFBUSx1Q0FBUixDQUFQLENBRHlDO0tBQVgsQ0FBbEM7OztBQWR5QixLQW1CekIsQ0FBRSxpQkFBRixFQUFxQixFQUFyQixDQUF3QixRQUF4QixFQUFrQyxZQUFXO0FBQ3pDLGVBQU8sUUFBUSxrSUFBUixDQUFQLENBRHlDO0tBQVgsQ0FBbEM7OztBQW5CeUIsVUF3QnpCLENBQU8sVUFBUCxDQUFrQixZQUFXO0FBQ3pCLFVBQUUsZ0JBQUYsRUFBb0IsTUFBcEIsQ0FBMkIsR0FBM0IsRUFBZ0MsQ0FBaEMsRUFBbUMsT0FBbkMsQ0FBMkMsR0FBM0MsRUFBZ0QsWUFBVztBQUN2RCxjQUFFLElBQUYsRUFBUSxNQUFSLEdBRHVEO1NBQVgsQ0FBaEQsQ0FEeUI7S0FBWCxFQUlmLElBSkgsRUF4QnlCOztBQThCekIsTUFBRSxzQkFBRixFQUEwQixFQUExQixDQUE2QixPQUE3QixFQUFzQyxZQUFXO0FBQzdDLFVBQUUscUJBQUYsRUFBeUIsTUFBekIsR0FENkM7S0FBWCxDQUF0QyxDQTlCeUI7O0FBa0N6QixNQUFFLGlCQUFGLEVBQXFCLEVBQXJCLENBQXdCLE9BQXhCLEVBQWlDLFlBQVc7QUFDeEMsVUFBRSxtQkFBRixFQUF1QixJQUF2QixHQUR3QztLQUFYLENBQWpDOzs7QUFsQ3lCLEtBdUN6QixDQUFFLFdBQUYsRUFBZSxRQUFmLEdBdkN5QjtDQUFYLENBQWxCOzs7QUNOQTs7QUFDQSxNQUFNLE9BQU4sQ0FBYztBQUNWLGtCQUFjO0FBQ1YsYUFBSyxlQUFMLEdBRFU7O0FBR1YsVUFBRSxtQkFBRixFQUF1QixFQUF2QixDQUEwQixRQUExQixFQUFvQyxNQUFNO0FBQ3RDLGlCQUFLLGVBQUwsR0FEc0M7U0FBTixDQUFwQyxDQUhVO0tBQWQ7O0FBUUEsc0JBQWtCO0FBQ2QsWUFBSSxLQUFLLEVBQUUsbUJBQUYsRUFBdUIsR0FBdkIsRUFBTCxDQURVO0FBRWQsWUFBSSxNQUFNLE1BQU0sRUFBTixFQUFVO0FBQ2hCLGNBQUUsSUFBRixDQUFPO0FBQ0gscUJBQUssdUJBQXVCLEVBQXZCLEdBQTRCLE9BQTVCO2FBRFQsRUFFRyxJQUZILENBRVEsUUFBVTtBQUNkLGtCQUFFLGVBQUYsRUFBbUIsSUFBbkIsQ0FBd0IsSUFBeEIsRUFEYztBQUVkLHdCQUFRLEtBQVIsQ0FBYyxxQkFBZCxFQUZjO2FBQVYsQ0FGUixDQURnQjtTQUFwQjtLQUZKO0NBVEo7O0FBc0JBLE9BQU8sT0FBUCxHQUFpQixPQUFqQiIsImZpbGUiOiJnZW5lcmF0ZWQuanMiLCJzb3VyY2VSb290IjoiIiwic291cmNlc0NvbnRlbnQiOlsiKGZ1bmN0aW9uIGUodCxuLHIpe2Z1bmN0aW9uIHMobyx1KXtpZighbltvXSl7aWYoIXRbb10pe3ZhciBhPXR5cGVvZiByZXF1aXJlPT1cImZ1bmN0aW9uXCImJnJlcXVpcmU7aWYoIXUmJmEpcmV0dXJuIGEobywhMCk7aWYoaSlyZXR1cm4gaShvLCEwKTt2YXIgZj1uZXcgRXJyb3IoXCJDYW5ub3QgZmluZCBtb2R1bGUgJ1wiK28rXCInXCIpO3Rocm93IGYuY29kZT1cIk1PRFVMRV9OT1RfRk9VTkRcIixmfXZhciBsPW5bb109e2V4cG9ydHM6e319O3Rbb11bMF0uY2FsbChsLmV4cG9ydHMsZnVuY3Rpb24oZSl7dmFyIG49dFtvXVsxXVtlXTtyZXR1cm4gcyhuP246ZSl9LGwsbC5leHBvcnRzLGUsdCxuLHIpfXJldHVybiBuW29dLmV4cG9ydHN9dmFyIGk9dHlwZW9mIHJlcXVpcmU9PVwiZnVuY3Rpb25cIiYmcmVxdWlyZTtmb3IodmFyIG89MDtvPHIubGVuZ3RoO28rKylzKHJbb10pO3JldHVybiBzfSkiLCJcInVzZSBzdHJpY3RcIjtcbi8qKlxuICogQ3JlYXRlZCBieSBlcGVubmVyIG9uIDMvOS8yMDE2LlxuICovXG52YXIgcHJvZ3JhbSA9IHJlcXVpcmUoJy4vY2xhc3Nlcy9wcm9ncmFtLmpzJyk7XG5cbiQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uKCkge1xuXG4gICAgbmV3IHByb2dyYW0oKTtcblxuICAgIGZ1bmN0aW9uIGNoZWNrUmVxdWlyZW1lbnQoKSB7XG4gICAgICAgIHZhciBjb3Vyc2VTZWxlY3QgPSAkKCcjcmVxdWlyZW1lbnRDb3Vyc2VTZWxlY3QnKS52YWwoKTtcbiAgICAgICAgdmFyIHR5cGVTZWxlY3QgPSAkKCcjcmVxdWlyZW1lbnRUeXBlU2VsZWN0JykudmFsKCk7XG4gICAgICAgIGlmIChjb3Vyc2VTZWxlY3QgPT0gJz8nIHx8IHR5cGVTZWxlY3QgPT0gJz8nKSB7XG4gICAgICAgICAgICByZXR1cm4gZmFsc2U7XG4gICAgICAgIH1cbiAgICAgICAgcmV0dXJuIHRydWU7XG4gICAgfVxuXG4gICAgLy8gcG9wdXAgZm9yIGRlbGV0ZSBidXR0b25zXG4gICAgJCgnLmRlbGV0ZS1jb25maXJtJykub24oJ3N1Ym1pdCcsIGZ1bmN0aW9uKCkge1xuICAgICAgICByZXR1cm4gY29uZmlybSgnQXJlIHlvdSBzdXJlIHlvdSB3YW50IHRvIGRlbGV0ZSB0aGlzPycpO1xuICAgIH0pO1xuXG4gICAgLy8gY2FzY2FkZSBkZWxldGUgY29uZmlybVxuICAgICQoJy5kZWxldGUtY2FzY2FkZScpLm9uKCdzdWJtaXQnLCBmdW5jdGlvbigpIHtcbiAgICAgICAgcmV0dXJuIGNvbmZpcm0oXCJcXHRcXHRBcmUgeW91IFNVUkUgeW91IHdhbnQgdG8gZGVsZXRlIHRoaXM/XFxuVEhJUyBXSUxMIERFTEVURSBBTEwgRU5ST0xMTUVOVFMgQVNTT0NJQVRFRCBXSVRIIFRISVMgREVHUkVFIFBST0dSQU0gRk9SIEFMTCBTVFVERU5UU1wiKTtcbiAgICB9KTtcblxuICAgIC8vIGZhZGUgYWxlcnRzIHRoYXQgaW5kaWNhdGUgc3VjY2Vzc1xuICAgIHdpbmRvdy5zZXRUaW1lb3V0KGZ1bmN0aW9uKCkge1xuICAgICAgICAkKFwiLmFsZXJ0LXN1Y2Nlc3NcIikuZmFkZVRvKDUwMCwgMCkuc2xpZGVVcCg1MDAsIGZ1bmN0aW9uKCkge1xuICAgICAgICAgICAgJCh0aGlzKS5yZW1vdmUoKTtcbiAgICAgICAgfSk7XG4gICAgfSwgMzAwMCk7XG5cbiAgICAkKFwiI3Nob3dSZXF1aXJlbWVudEZvcm1cIikub24oJ2NsaWNrJywgZnVuY3Rpb24oKSB7XG4gICAgICAgICQoXCIjYWRkUmVxdWlyZW1lbnRGb3JtXCIpLnRvZ2dsZSgpO1xuICAgIH0pO1xuXG4gICAgJCgnI2FkZFJlcXVpcmVtZW50Jykub24oJ2NsaWNrJywgZnVuY3Rpb24oKSB7XG4gICAgICAgICQoJyNyZXF1aXJlbWVudFF1ZXVlJykuc2hvdygpO1xuICAgIH0pO1xuXG4gICAgLy8gYWN0aXZhdGUgY29sbGFwc2VcbiAgICAkKCcuY29sbGFwc2UnKS5jb2xsYXBzZSgpO1xuXG59KTsiLCJcInVzZSBzdHJpY3RcIjtcbmNsYXNzIFByb2dyYW0ge1xuICAgIGNvbnN0cnVjdG9yKCkge1xuICAgICAgICB0aGlzLnNob3dQcm9ncmFtSW5mbygpO1xuXG4gICAgICAgICQoJ3NlbGVjdCNwcm9ncmFtX2lkJykub24oJ2NoYW5nZScsICgpID0+IHtcbiAgICAgICAgICAgIHRoaXMuc2hvd1Byb2dyYW1JbmZvKCk7XG4gICAgICAgIH0pO1xuICAgIH1cblxuICAgIHNob3dQcm9ncmFtSW5mbygpIHtcbiAgICAgICAgdmFyIGlkID0gJCgnc2VsZWN0I3Byb2dyYW1faWQnKS52YWwoKTtcbiAgICAgICAgaWYgKGlkICYmIGlkICE9ICcnKSB7XG4gICAgICAgICAgICAkLmFqYXgoe1xuICAgICAgICAgICAgICAgIHVybDogJy4uLy4uLy4uL3Byb2dyYW1zLycgKyBpZCArICcvaW5mbydcbiAgICAgICAgICAgIH0pLmRvbmUoKGRhdGEpID0+IHtcbiAgICAgICAgICAgICAgICAkKCcjcHJvZ3JhbS1pbmZvJykuaHRtbChkYXRhKTtcbiAgICAgICAgICAgICAgICBjb25zb2xlLmRlYnVnKCdQcm9ncmFtIGluZm8gbG9hZGVkJyk7XG4gICAgICAgICAgICB9KVxuICAgICAgICB9XG4gICAgfVxufVxuXG5tb2R1bGUuZXhwb3J0cyA9IFByb2dyYW07Il19
