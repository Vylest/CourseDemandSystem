(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
"use strict";
/**
 * Created by epenner on 3/9/2016.
 */

var program = require('./classes/program.js');

$(document).ready(function () {

    new program();

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
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIi4uLy4uL25wbS1sb2NhbC9jZHMvbm9kZV9tb2R1bGVzL2Jyb3dzZXItcGFjay9fcHJlbHVkZS5qcyIsImFwcC5qcyIsInByb2dyYW0uanMiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7QUNBQTs7Ozs7QUFJQSxJQUFJLFVBQVUsUUFBUSxzQkFBUixDQUFWOztBQUVKLEVBQUUsUUFBRixFQUFZLEtBQVosQ0FBa0IsWUFBVzs7QUFFekIsUUFBSSxPQUFKOzs7QUFGeUIsS0FLekIsQ0FBRSxpQkFBRixFQUFxQixFQUFyQixDQUF3QixRQUF4QixFQUFrQyxZQUFXO0FBQ3pDLGVBQU8sUUFBUSx1Q0FBUixDQUFQLENBRHlDO0tBQVgsQ0FBbEM7OztBQUx5QixVQVV6QixDQUFPLFVBQVAsQ0FBa0IsWUFBVztBQUN6QixVQUFFLGdCQUFGLEVBQW9CLE1BQXBCLENBQTJCLEdBQTNCLEVBQWdDLENBQWhDLEVBQW1DLE9BQW5DLENBQTJDLEdBQTNDLEVBQWdELFlBQVc7QUFDdkQsY0FBRSxJQUFGLEVBQVEsTUFBUixHQUR1RDtTQUFYLENBQWhELENBRHlCO0tBQVgsRUFJZixJQUpILEVBVnlCOztBQWdCekIsTUFBRSxzQkFBRixFQUEwQixFQUExQixDQUE2QixPQUE3QixFQUFzQyxZQUFXO0FBQzdDLFVBQUUscUJBQUYsRUFBeUIsTUFBekIsR0FENkM7S0FBWCxDQUF0Qzs7O0FBaEJ5QixLQXFCekIsQ0FBRSxXQUFGLEVBQWUsUUFBZixHQXJCeUI7Q0FBWCxDQUFsQjs7O0FDTkE7O0FBQ0EsTUFBTSxPQUFOLENBQWM7QUFDVixrQkFBYztBQUNWLGFBQUssZUFBTCxHQURVOztBQUdWLFVBQUUsbUJBQUYsRUFBdUIsRUFBdkIsQ0FBMEIsUUFBMUIsRUFBb0MsTUFBTTtBQUN0QyxpQkFBSyxlQUFMLEdBRHNDO1NBQU4sQ0FBcEMsQ0FIVTtLQUFkOztBQVFBLHNCQUFrQjtBQUNkLFlBQUksS0FBSyxFQUFFLG1CQUFGLEVBQXVCLEdBQXZCLEVBQUwsQ0FEVTtBQUVkLFlBQUksTUFBTSxNQUFNLEVBQU4sRUFBVTtBQUNoQixjQUFFLElBQUYsQ0FBTztBQUNILHFCQUFLLHVCQUF1QixFQUF2QixHQUE0QixPQUE1QjthQURULEVBRUcsSUFGSCxDQUVRLFFBQVU7QUFDZCxrQkFBRSxlQUFGLEVBQW1CLElBQW5CLENBQXdCLElBQXhCLEVBRGM7QUFFZCx3QkFBUSxLQUFSLENBQWMscUJBQWQsRUFGYzthQUFWLENBRlIsQ0FEZ0I7U0FBcEI7S0FGSjtDQVRKOztBQXNCQSxPQUFPLE9BQVAsR0FBaUIsT0FBakIiLCJmaWxlIjoiZ2VuZXJhdGVkLmpzIiwic291cmNlUm9vdCI6IiIsInNvdXJjZXNDb250ZW50IjpbIihmdW5jdGlvbiBlKHQsbixyKXtmdW5jdGlvbiBzKG8sdSl7aWYoIW5bb10pe2lmKCF0W29dKXt2YXIgYT10eXBlb2YgcmVxdWlyZT09XCJmdW5jdGlvblwiJiZyZXF1aXJlO2lmKCF1JiZhKXJldHVybiBhKG8sITApO2lmKGkpcmV0dXJuIGkobywhMCk7dmFyIGY9bmV3IEVycm9yKFwiQ2Fubm90IGZpbmQgbW9kdWxlICdcIitvK1wiJ1wiKTt0aHJvdyBmLmNvZGU9XCJNT0RVTEVfTk9UX0ZPVU5EXCIsZn12YXIgbD1uW29dPXtleHBvcnRzOnt9fTt0W29dWzBdLmNhbGwobC5leHBvcnRzLGZ1bmN0aW9uKGUpe3ZhciBuPXRbb11bMV1bZV07cmV0dXJuIHMobj9uOmUpfSxsLGwuZXhwb3J0cyxlLHQsbixyKX1yZXR1cm4gbltvXS5leHBvcnRzfXZhciBpPXR5cGVvZiByZXF1aXJlPT1cImZ1bmN0aW9uXCImJnJlcXVpcmU7Zm9yKHZhciBvPTA7bzxyLmxlbmd0aDtvKyspcyhyW29dKTtyZXR1cm4gc30pIiwiXCJ1c2Ugc3RyaWN0XCI7XG4vKipcbiAqIENyZWF0ZWQgYnkgZXBlbm5lciBvbiAzLzkvMjAxNi5cbiAqL1xudmFyIHByb2dyYW0gPSByZXF1aXJlKCcuL2NsYXNzZXMvcHJvZ3JhbS5qcycpO1xuXG4kKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbigpIHtcblxuICAgIG5ldyBwcm9ncmFtKCk7XG5cbiAgICAvLyBwb3B1cCBmb3IgZGVsZXRlIGJ1dHRvbnNcbiAgICAkKCcuZGVsZXRlLWNvbmZpcm0nKS5vbignc3VibWl0JywgZnVuY3Rpb24oKSB7XG4gICAgICAgIHJldHVybiBjb25maXJtKCdBcmUgeW91IHN1cmUgeW91IHdhbnQgdG8gZGVsZXRlIHRoaXM/Jyk7XG4gICAgfSk7XG5cbiAgICAvLyBmYWRlIGFsZXJ0cyB0aGF0IGluZGljYXRlIHN1Y2Nlc3NcbiAgICB3aW5kb3cuc2V0VGltZW91dChmdW5jdGlvbigpIHtcbiAgICAgICAgJChcIi5hbGVydC1zdWNjZXNzXCIpLmZhZGVUbyg1MDAsIDApLnNsaWRlVXAoNTAwLCBmdW5jdGlvbigpIHtcbiAgICAgICAgICAgICQodGhpcykucmVtb3ZlKCk7XG4gICAgICAgIH0pO1xuICAgIH0sIDMwMDApO1xuXG4gICAgJChcIiNzaG93UmVxdWlyZW1lbnRGb3JtXCIpLm9uKCdjbGljaycsIGZ1bmN0aW9uKCkge1xuICAgICAgICAkKFwiI2FkZFJlcXVpcmVtZW50Rm9ybVwiKS50b2dnbGUoKTtcbiAgICB9KTtcblxuICAgIC8vIGFjdGl2YXRlIGNvbGxhcHNlXG4gICAgJCgnLmNvbGxhcHNlJykuY29sbGFwc2UoKTtcblxufSk7IiwiXCJ1c2Ugc3RyaWN0XCI7XG5jbGFzcyBQcm9ncmFtIHtcbiAgICBjb25zdHJ1Y3RvcigpIHtcbiAgICAgICAgdGhpcy5zaG93UHJvZ3JhbUluZm8oKTtcblxuICAgICAgICAkKCdzZWxlY3QjcHJvZ3JhbV9pZCcpLm9uKCdjaGFuZ2UnLCAoKSA9PiB7XG4gICAgICAgICAgICB0aGlzLnNob3dQcm9ncmFtSW5mbygpO1xuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICBzaG93UHJvZ3JhbUluZm8oKSB7XG4gICAgICAgIHZhciBpZCA9ICQoJ3NlbGVjdCNwcm9ncmFtX2lkJykudmFsKCk7XG4gICAgICAgIGlmIChpZCAmJiBpZCAhPSAnJykge1xuICAgICAgICAgICAgJC5hamF4KHtcbiAgICAgICAgICAgICAgICB1cmw6ICcuLi8uLi8uLi9wcm9ncmFtcy8nICsgaWQgKyAnL2luZm8nXG4gICAgICAgICAgICB9KS5kb25lKChkYXRhKSA9PiB7XG4gICAgICAgICAgICAgICAgJCgnI3Byb2dyYW0taW5mbycpLmh0bWwoZGF0YSk7XG4gICAgICAgICAgICAgICAgY29uc29sZS5kZWJ1ZygnUHJvZ3JhbSBpbmZvIGxvYWRlZCcpO1xuICAgICAgICAgICAgfSlcbiAgICAgICAgfVxuICAgIH1cbn1cblxubW9kdWxlLmV4cG9ydHMgPSBQcm9ncmFtOyJdfQ==
