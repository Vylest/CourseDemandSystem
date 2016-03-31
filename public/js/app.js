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
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIi4uLy4uL25wbS1sb2NhbC9jZHMvbm9kZV9tb2R1bGVzL2Jyb3dzZXItcGFjay9fcHJlbHVkZS5qcyIsImFwcC5qcyIsInByb2dyYW0uanMiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7QUNBQTs7Ozs7QUFJQSxJQUFJLFVBQVUsUUFBUSxzQkFBUixDQUFWOztBQUVKLEVBQUUsUUFBRixFQUFZLEtBQVosQ0FBa0IsWUFBVzs7QUFFekIsUUFBSSxPQUFKLEdBRnlCOztBQUl6QixhQUFTLGdCQUFULEdBQTRCO0FBQ3hCLFlBQUksZUFBZSxFQUFFLDBCQUFGLEVBQThCLEdBQTlCLEVBQWYsQ0FEb0I7QUFFeEIsWUFBSSxhQUFhLEVBQUUsd0JBQUYsRUFBNEIsR0FBNUIsRUFBYixDQUZvQjtBQUd4QixZQUFJLGdCQUFnQixHQUFoQixJQUF1QixjQUFjLEdBQWQsRUFBbUI7QUFDMUMsbUJBQU8sS0FBUCxDQUQwQztTQUE5QztBQUdBLGVBQU8sSUFBUCxDQU53QjtLQUE1Qjs7O0FBSnlCLEtBY3pCLENBQUUsaUJBQUYsRUFBcUIsRUFBckIsQ0FBd0IsUUFBeEIsRUFBa0MsWUFBVztBQUN6QyxlQUFPLFFBQVEsdUNBQVIsQ0FBUCxDQUR5QztLQUFYLENBQWxDOzs7QUFkeUIsVUFtQnpCLENBQU8sVUFBUCxDQUFrQixZQUFXO0FBQ3pCLFVBQUUsZ0JBQUYsRUFBb0IsTUFBcEIsQ0FBMkIsR0FBM0IsRUFBZ0MsQ0FBaEMsRUFBbUMsT0FBbkMsQ0FBMkMsR0FBM0MsRUFBZ0QsWUFBVztBQUN2RCxjQUFFLElBQUYsRUFBUSxNQUFSLEdBRHVEO1NBQVgsQ0FBaEQsQ0FEeUI7S0FBWCxFQUlmLElBSkgsRUFuQnlCOztBQXlCekIsTUFBRSxzQkFBRixFQUEwQixFQUExQixDQUE2QixPQUE3QixFQUFzQyxZQUFXO0FBQzdDLFVBQUUscUJBQUYsRUFBeUIsTUFBekIsR0FENkM7S0FBWCxDQUF0QyxDQXpCeUI7O0FBNkJ6QixNQUFFLGlCQUFGLEVBQXFCLEVBQXJCLENBQXdCLE9BQXhCLEVBQWlDLFlBQVc7QUFDeEMsVUFBRSxtQkFBRixFQUF1QixJQUF2QixHQUR3QztLQUFYLENBQWpDOzs7QUE3QnlCLEtBa0N6QixDQUFFLFdBQUYsRUFBZSxRQUFmLEdBbEN5QjtDQUFYLENBQWxCOzs7QUNOQTs7QUFDQSxNQUFNLE9BQU4sQ0FBYztBQUNWLGtCQUFjO0FBQ1YsYUFBSyxlQUFMLEdBRFU7O0FBR1YsVUFBRSxtQkFBRixFQUF1QixFQUF2QixDQUEwQixRQUExQixFQUFvQyxNQUFNO0FBQ3RDLGlCQUFLLGVBQUwsR0FEc0M7U0FBTixDQUFwQyxDQUhVO0tBQWQ7O0FBUUEsc0JBQWtCO0FBQ2QsWUFBSSxLQUFLLEVBQUUsbUJBQUYsRUFBdUIsR0FBdkIsRUFBTCxDQURVO0FBRWQsWUFBSSxNQUFNLE1BQU0sRUFBTixFQUFVO0FBQ2hCLGNBQUUsSUFBRixDQUFPO0FBQ0gscUJBQUssdUJBQXVCLEVBQXZCLEdBQTRCLE9BQTVCO2FBRFQsRUFFRyxJQUZILENBRVEsUUFBVTtBQUNkLGtCQUFFLGVBQUYsRUFBbUIsSUFBbkIsQ0FBd0IsSUFBeEIsRUFEYztBQUVkLHdCQUFRLEtBQVIsQ0FBYyxxQkFBZCxFQUZjO2FBQVYsQ0FGUixDQURnQjtTQUFwQjtLQUZKO0NBVEo7O0FBc0JBLE9BQU8sT0FBUCxHQUFpQixPQUFqQiIsImZpbGUiOiJnZW5lcmF0ZWQuanMiLCJzb3VyY2VSb290IjoiIiwic291cmNlc0NvbnRlbnQiOlsiKGZ1bmN0aW9uIGUodCxuLHIpe2Z1bmN0aW9uIHMobyx1KXtpZighbltvXSl7aWYoIXRbb10pe3ZhciBhPXR5cGVvZiByZXF1aXJlPT1cImZ1bmN0aW9uXCImJnJlcXVpcmU7aWYoIXUmJmEpcmV0dXJuIGEobywhMCk7aWYoaSlyZXR1cm4gaShvLCEwKTt2YXIgZj1uZXcgRXJyb3IoXCJDYW5ub3QgZmluZCBtb2R1bGUgJ1wiK28rXCInXCIpO3Rocm93IGYuY29kZT1cIk1PRFVMRV9OT1RfRk9VTkRcIixmfXZhciBsPW5bb109e2V4cG9ydHM6e319O3Rbb11bMF0uY2FsbChsLmV4cG9ydHMsZnVuY3Rpb24oZSl7dmFyIG49dFtvXVsxXVtlXTtyZXR1cm4gcyhuP246ZSl9LGwsbC5leHBvcnRzLGUsdCxuLHIpfXJldHVybiBuW29dLmV4cG9ydHN9dmFyIGk9dHlwZW9mIHJlcXVpcmU9PVwiZnVuY3Rpb25cIiYmcmVxdWlyZTtmb3IodmFyIG89MDtvPHIubGVuZ3RoO28rKylzKHJbb10pO3JldHVybiBzfSkiLCJcInVzZSBzdHJpY3RcIjtcbi8qKlxuICogQ3JlYXRlZCBieSBlcGVubmVyIG9uIDMvOS8yMDE2LlxuICovXG52YXIgcHJvZ3JhbSA9IHJlcXVpcmUoJy4vY2xhc3Nlcy9wcm9ncmFtLmpzJyk7XG5cbiQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uKCkge1xuXG4gICAgbmV3IHByb2dyYW0oKTtcblxuICAgIGZ1bmN0aW9uIGNoZWNrUmVxdWlyZW1lbnQoKSB7XG4gICAgICAgIHZhciBjb3Vyc2VTZWxlY3QgPSAkKCcjcmVxdWlyZW1lbnRDb3Vyc2VTZWxlY3QnKS52YWwoKTtcbiAgICAgICAgdmFyIHR5cGVTZWxlY3QgPSAkKCcjcmVxdWlyZW1lbnRUeXBlU2VsZWN0JykudmFsKCk7XG4gICAgICAgIGlmIChjb3Vyc2VTZWxlY3QgPT0gJz8nIHx8IHR5cGVTZWxlY3QgPT0gJz8nKSB7XG4gICAgICAgICAgICByZXR1cm4gZmFsc2U7XG4gICAgICAgIH1cbiAgICAgICAgcmV0dXJuIHRydWU7XG4gICAgfVxuXG4gICAgLy8gcG9wdXAgZm9yIGRlbGV0ZSBidXR0b25zXG4gICAgJCgnLmRlbGV0ZS1jb25maXJtJykub24oJ3N1Ym1pdCcsIGZ1bmN0aW9uKCkge1xuICAgICAgICByZXR1cm4gY29uZmlybSgnQXJlIHlvdSBzdXJlIHlvdSB3YW50IHRvIGRlbGV0ZSB0aGlzPycpO1xuICAgIH0pO1xuXG4gICAgLy8gZmFkZSBhbGVydHMgdGhhdCBpbmRpY2F0ZSBzdWNjZXNzXG4gICAgd2luZG93LnNldFRpbWVvdXQoZnVuY3Rpb24oKSB7XG4gICAgICAgICQoXCIuYWxlcnQtc3VjY2Vzc1wiKS5mYWRlVG8oNTAwLCAwKS5zbGlkZVVwKDUwMCwgZnVuY3Rpb24oKSB7XG4gICAgICAgICAgICAkKHRoaXMpLnJlbW92ZSgpO1xuICAgICAgICB9KTtcbiAgICB9LCAzMDAwKTtcblxuICAgICQoXCIjc2hvd1JlcXVpcmVtZW50Rm9ybVwiKS5vbignY2xpY2snLCBmdW5jdGlvbigpIHtcbiAgICAgICAgJChcIiNhZGRSZXF1aXJlbWVudEZvcm1cIikudG9nZ2xlKCk7XG4gICAgfSk7XG5cbiAgICAkKCcjYWRkUmVxdWlyZW1lbnQnKS5vbignY2xpY2snLCBmdW5jdGlvbigpIHtcbiAgICAgICAgJCgnI3JlcXVpcmVtZW50UXVldWUnKS5zaG93KCk7XG4gICAgfSk7XG5cbiAgICAvLyBhY3RpdmF0ZSBjb2xsYXBzZVxuICAgICQoJy5jb2xsYXBzZScpLmNvbGxhcHNlKCk7XG5cbn0pOyIsIlwidXNlIHN0cmljdFwiO1xuY2xhc3MgUHJvZ3JhbSB7XG4gICAgY29uc3RydWN0b3IoKSB7XG4gICAgICAgIHRoaXMuc2hvd1Byb2dyYW1JbmZvKCk7XG5cbiAgICAgICAgJCgnc2VsZWN0I3Byb2dyYW1faWQnKS5vbignY2hhbmdlJywgKCkgPT4ge1xuICAgICAgICAgICAgdGhpcy5zaG93UHJvZ3JhbUluZm8oKTtcbiAgICAgICAgfSk7XG4gICAgfVxuXG4gICAgc2hvd1Byb2dyYW1JbmZvKCkge1xuICAgICAgICB2YXIgaWQgPSAkKCdzZWxlY3QjcHJvZ3JhbV9pZCcpLnZhbCgpO1xuICAgICAgICBpZiAoaWQgJiYgaWQgIT0gJycpIHtcbiAgICAgICAgICAgICQuYWpheCh7XG4gICAgICAgICAgICAgICAgdXJsOiAnLi4vLi4vLi4vcHJvZ3JhbXMvJyArIGlkICsgJy9pbmZvJ1xuICAgICAgICAgICAgfSkuZG9uZSgoZGF0YSkgPT4ge1xuICAgICAgICAgICAgICAgICQoJyNwcm9ncmFtLWluZm8nKS5odG1sKGRhdGEpO1xuICAgICAgICAgICAgICAgIGNvbnNvbGUuZGVidWcoJ1Byb2dyYW0gaW5mbyBsb2FkZWQnKTtcbiAgICAgICAgICAgIH0pXG4gICAgICAgIH1cbiAgICB9XG59XG5cbm1vZHVsZS5leHBvcnRzID0gUHJvZ3JhbTsiXX0=
