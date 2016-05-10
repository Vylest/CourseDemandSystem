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
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIi4uLy4uLy5ucG0tbG9jYWwvbWF2cGxhbi9ub2RlX21vZHVsZXMvYnJvd3Nlci1wYWNrL19wcmVsdWRlLmpzIiwiYXBwLmpzIiwicHJvZ3JhbS5qcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQTtBQ0FBOzs7OztBQUlBLElBQUksVUFBVSxRQUFRLHNCQUFSLENBQVY7O0FBRUosRUFBRSxRQUFGLEVBQVksS0FBWixDQUFrQixZQUFXOztBQUV6QixRQUFJLE9BQUosR0FGeUI7O0FBSXpCLGFBQVMsZ0JBQVQsR0FBNEI7QUFDeEIsWUFBSSxlQUFlLEVBQUUsMEJBQUYsRUFBOEIsR0FBOUIsRUFBZixDQURvQjtBQUV4QixZQUFJLGFBQWEsRUFBRSx3QkFBRixFQUE0QixHQUE1QixFQUFiLENBRm9CO0FBR3hCLFlBQUksZ0JBQWdCLEdBQWhCLElBQXVCLGNBQWMsR0FBZCxFQUFtQjtBQUMxQyxtQkFBTyxLQUFQLENBRDBDO1NBQTlDO0FBR0EsZUFBTyxJQUFQLENBTndCO0tBQTVCOzs7QUFKeUIsS0FjekIsQ0FBRSxpQkFBRixFQUFxQixFQUFyQixDQUF3QixRQUF4QixFQUFrQyxZQUFXO0FBQ3pDLGVBQU8sUUFBUSx1Q0FBUixDQUFQLENBRHlDO0tBQVgsQ0FBbEM7OztBQWR5QixVQW1CekIsQ0FBTyxVQUFQLENBQWtCLFlBQVc7QUFDekIsVUFBRSxnQkFBRixFQUFvQixNQUFwQixDQUEyQixHQUEzQixFQUFnQyxDQUFoQyxFQUFtQyxPQUFuQyxDQUEyQyxHQUEzQyxFQUFnRCxZQUFXO0FBQ3ZELGNBQUUsSUFBRixFQUFRLE1BQVIsR0FEdUQ7U0FBWCxDQUFoRCxDQUR5QjtLQUFYLEVBSWYsSUFKSCxFQW5CeUI7O0FBeUJ6QixNQUFFLHNCQUFGLEVBQTBCLEVBQTFCLENBQTZCLE9BQTdCLEVBQXNDLFlBQVc7QUFDN0MsVUFBRSxxQkFBRixFQUF5QixNQUF6QixHQUQ2QztLQUFYLENBQXRDLENBekJ5Qjs7QUE2QnpCLE1BQUUsaUJBQUYsRUFBcUIsRUFBckIsQ0FBd0IsT0FBeEIsRUFBaUMsWUFBVztBQUN4QyxVQUFFLG1CQUFGLEVBQXVCLElBQXZCLEdBRHdDO0tBQVgsQ0FBakM7OztBQTdCeUIsS0FrQ3pCLENBQUUsV0FBRixFQUFlLFFBQWYsR0FsQ3lCO0NBQVgsQ0FBbEI7OztBQ05BOztBQUNBLE1BQU0sT0FBTixDQUFjO0FBQ1Ysa0JBQWM7QUFDVixhQUFLLGVBQUwsR0FEVTs7QUFHVixVQUFFLG1CQUFGLEVBQXVCLEVBQXZCLENBQTBCLFFBQTFCLEVBQW9DLE1BQU07QUFDdEMsaUJBQUssZUFBTCxHQURzQztTQUFOLENBQXBDLENBSFU7S0FBZDs7QUFRQSxzQkFBa0I7QUFDZCxZQUFJLEtBQUssRUFBRSxtQkFBRixFQUF1QixHQUF2QixFQUFMLENBRFU7QUFFZCxZQUFJLE1BQU0sTUFBTSxFQUFOLEVBQVU7QUFDaEIsY0FBRSxJQUFGLENBQU87QUFDSCxxQkFBSyx1QkFBdUIsRUFBdkIsR0FBNEIsT0FBNUI7YUFEVCxFQUVHLElBRkgsQ0FFUSxRQUFVO0FBQ2Qsa0JBQUUsZUFBRixFQUFtQixJQUFuQixDQUF3QixJQUF4QixFQURjO0FBRWQsd0JBQVEsS0FBUixDQUFjLHFCQUFkLEVBRmM7YUFBVixDQUZSLENBRGdCO1NBQXBCO0tBRko7Q0FUSjs7QUFzQkEsT0FBTyxPQUFQLEdBQWlCLE9BQWpCIiwiZmlsZSI6ImdlbmVyYXRlZC5qcyIsInNvdXJjZVJvb3QiOiIiLCJzb3VyY2VzQ29udGVudCI6WyIoZnVuY3Rpb24gZSh0LG4scil7ZnVuY3Rpb24gcyhvLHUpe2lmKCFuW29dKXtpZighdFtvXSl7dmFyIGE9dHlwZW9mIHJlcXVpcmU9PVwiZnVuY3Rpb25cIiYmcmVxdWlyZTtpZighdSYmYSlyZXR1cm4gYShvLCEwKTtpZihpKXJldHVybiBpKG8sITApO3ZhciBmPW5ldyBFcnJvcihcIkNhbm5vdCBmaW5kIG1vZHVsZSAnXCIrbytcIidcIik7dGhyb3cgZi5jb2RlPVwiTU9EVUxFX05PVF9GT1VORFwiLGZ9dmFyIGw9bltvXT17ZXhwb3J0czp7fX07dFtvXVswXS5jYWxsKGwuZXhwb3J0cyxmdW5jdGlvbihlKXt2YXIgbj10W29dWzFdW2VdO3JldHVybiBzKG4/bjplKX0sbCxsLmV4cG9ydHMsZSx0LG4scil9cmV0dXJuIG5bb10uZXhwb3J0c312YXIgaT10eXBlb2YgcmVxdWlyZT09XCJmdW5jdGlvblwiJiZyZXF1aXJlO2Zvcih2YXIgbz0wO288ci5sZW5ndGg7bysrKXMocltvXSk7cmV0dXJuIHN9KSIsIlwidXNlIHN0cmljdFwiO1xuLyoqXG4gKiBDcmVhdGVkIGJ5IGVwZW5uZXIgb24gMy85LzIwMTYuXG4gKi9cbnZhciBwcm9ncmFtID0gcmVxdWlyZSgnLi9jbGFzc2VzL3Byb2dyYW0uanMnKTtcblxuJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24oKSB7XG5cbiAgICBuZXcgcHJvZ3JhbSgpO1xuXG4gICAgZnVuY3Rpb24gY2hlY2tSZXF1aXJlbWVudCgpIHtcbiAgICAgICAgdmFyIGNvdXJzZVNlbGVjdCA9ICQoJyNyZXF1aXJlbWVudENvdXJzZVNlbGVjdCcpLnZhbCgpO1xuICAgICAgICB2YXIgdHlwZVNlbGVjdCA9ICQoJyNyZXF1aXJlbWVudFR5cGVTZWxlY3QnKS52YWwoKTtcbiAgICAgICAgaWYgKGNvdXJzZVNlbGVjdCA9PSAnPycgfHwgdHlwZVNlbGVjdCA9PSAnPycpIHtcbiAgICAgICAgICAgIHJldHVybiBmYWxzZTtcbiAgICAgICAgfVxuICAgICAgICByZXR1cm4gdHJ1ZTtcbiAgICB9XG5cbiAgICAvLyBwb3B1cCBmb3IgZGVsZXRlIGJ1dHRvbnNcbiAgICAkKCcuZGVsZXRlLWNvbmZpcm0nKS5vbignc3VibWl0JywgZnVuY3Rpb24oKSB7XG4gICAgICAgIHJldHVybiBjb25maXJtKCdBcmUgeW91IHN1cmUgeW91IHdhbnQgdG8gZGVsZXRlIHRoaXM/Jyk7XG4gICAgfSk7XG5cbiAgICAvLyBmYWRlIGFsZXJ0cyB0aGF0IGluZGljYXRlIHN1Y2Nlc3NcbiAgICB3aW5kb3cuc2V0VGltZW91dChmdW5jdGlvbigpIHtcbiAgICAgICAgJChcIi5hbGVydC1zdWNjZXNzXCIpLmZhZGVUbyg1MDAsIDApLnNsaWRlVXAoNTAwLCBmdW5jdGlvbigpIHtcbiAgICAgICAgICAgICQodGhpcykucmVtb3ZlKCk7XG4gICAgICAgIH0pO1xuICAgIH0sIDMwMDApO1xuXG4gICAgJChcIiNzaG93UmVxdWlyZW1lbnRGb3JtXCIpLm9uKCdjbGljaycsIGZ1bmN0aW9uKCkge1xuICAgICAgICAkKFwiI2FkZFJlcXVpcmVtZW50Rm9ybVwiKS50b2dnbGUoKTtcbiAgICB9KTtcblxuICAgICQoJyNhZGRSZXF1aXJlbWVudCcpLm9uKCdjbGljaycsIGZ1bmN0aW9uKCkge1xuICAgICAgICAkKCcjcmVxdWlyZW1lbnRRdWV1ZScpLnNob3coKTtcbiAgICB9KTtcblxuICAgIC8vIGFjdGl2YXRlIGNvbGxhcHNlXG4gICAgJCgnLmNvbGxhcHNlJykuY29sbGFwc2UoKTtcblxufSk7IiwiXCJ1c2Ugc3RyaWN0XCI7XG5jbGFzcyBQcm9ncmFtIHtcbiAgICBjb25zdHJ1Y3RvcigpIHtcbiAgICAgICAgdGhpcy5zaG93UHJvZ3JhbUluZm8oKTtcblxuICAgICAgICAkKCdzZWxlY3QjcHJvZ3JhbV9pZCcpLm9uKCdjaGFuZ2UnLCAoKSA9PiB7XG4gICAgICAgICAgICB0aGlzLnNob3dQcm9ncmFtSW5mbygpO1xuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICBzaG93UHJvZ3JhbUluZm8oKSB7XG4gICAgICAgIHZhciBpZCA9ICQoJ3NlbGVjdCNwcm9ncmFtX2lkJykudmFsKCk7XG4gICAgICAgIGlmIChpZCAmJiBpZCAhPSAnJykge1xuICAgICAgICAgICAgJC5hamF4KHtcbiAgICAgICAgICAgICAgICB1cmw6ICcuLi8uLi8uLi9wcm9ncmFtcy8nICsgaWQgKyAnL2luZm8nXG4gICAgICAgICAgICB9KS5kb25lKChkYXRhKSA9PiB7XG4gICAgICAgICAgICAgICAgJCgnI3Byb2dyYW0taW5mbycpLmh0bWwoZGF0YSk7XG4gICAgICAgICAgICAgICAgY29uc29sZS5kZWJ1ZygnUHJvZ3JhbSBpbmZvIGxvYWRlZCcpO1xuICAgICAgICAgICAgfSlcbiAgICAgICAgfVxuICAgIH1cbn1cblxubW9kdWxlLmV4cG9ydHMgPSBQcm9ncmFtOyJdfQ==
