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
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIi4uLy4uL25wbS1sb2NhbC9jZHMvbm9kZV9tb2R1bGVzL2Jyb3dzZXItcGFjay9fcHJlbHVkZS5qcyIsImFwcC5qcyIsInByb2dyYW0uanMiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7QUNBQTs7Ozs7QUFJQSxJQUFJLFVBQVUsUUFBUSxzQkFBUixDQUFWOztBQUVKLEVBQUUsUUFBRixFQUFZLEtBQVosQ0FBa0IsWUFBVzs7QUFFekIsUUFBSSxPQUFKOzs7QUFGeUIsS0FLekIsQ0FBRSxpQkFBRixFQUFxQixFQUFyQixDQUF3QixRQUF4QixFQUFrQyxZQUFXO0FBQ3pDLGVBQU8sUUFBUSx1Q0FBUixDQUFQLENBRHlDO0tBQVgsQ0FBbEM7OztBQUx5QixVQVV6QixDQUFPLFVBQVAsQ0FBa0IsWUFBVztBQUN6QixVQUFFLGdCQUFGLEVBQW9CLE1BQXBCLENBQTJCLEdBQTNCLEVBQWdDLENBQWhDLEVBQW1DLE9BQW5DLENBQTJDLEdBQTNDLEVBQWdELFlBQVc7QUFDdkQsY0FBRSxJQUFGLEVBQVEsTUFBUixHQUR1RDtTQUFYLENBQWhELENBRHlCO0tBQVgsRUFJZixJQUpIOzs7QUFWeUIsS0FpQnpCLENBQUUsV0FBRixFQUFlLFFBQWYsR0FqQnlCO0NBQVgsQ0FBbEI7OztBQ05BOztBQUNBLE1BQU0sT0FBTixDQUFjO0FBQ1Ysa0JBQWM7QUFDVixhQUFLLGVBQUwsR0FEVTs7QUFHVixVQUFFLG1CQUFGLEVBQXVCLEVBQXZCLENBQTBCLFFBQTFCLEVBQW9DLE1BQU07QUFDdEMsaUJBQUssZUFBTCxHQURzQztTQUFOLENBQXBDLENBSFU7S0FBZDs7QUFRQSxzQkFBa0I7QUFDZCxZQUFJLEtBQUssRUFBRSxtQkFBRixFQUF1QixHQUF2QixFQUFMLENBRFU7QUFFZCxZQUFJLE1BQU0sTUFBTSxFQUFOLEVBQVU7QUFDaEIsY0FBRSxJQUFGLENBQU87QUFDSCxxQkFBSyx1QkFBdUIsRUFBdkIsR0FBNEIsT0FBNUI7YUFEVCxFQUVHLElBRkgsQ0FFUSxRQUFVO0FBQ2Qsa0JBQUUsZUFBRixFQUFtQixJQUFuQixDQUF3QixJQUF4QixFQURjO0FBRWQsd0JBQVEsS0FBUixDQUFjLHFCQUFkLEVBRmM7YUFBVixDQUZSLENBRGdCO1NBQXBCO0tBRko7Q0FUSjs7QUFzQkEsT0FBTyxPQUFQLEdBQWlCLE9BQWpCIiwiZmlsZSI6ImdlbmVyYXRlZC5qcyIsInNvdXJjZVJvb3QiOiIiLCJzb3VyY2VzQ29udGVudCI6WyIoZnVuY3Rpb24gZSh0LG4scil7ZnVuY3Rpb24gcyhvLHUpe2lmKCFuW29dKXtpZighdFtvXSl7dmFyIGE9dHlwZW9mIHJlcXVpcmU9PVwiZnVuY3Rpb25cIiYmcmVxdWlyZTtpZighdSYmYSlyZXR1cm4gYShvLCEwKTtpZihpKXJldHVybiBpKG8sITApO3ZhciBmPW5ldyBFcnJvcihcIkNhbm5vdCBmaW5kIG1vZHVsZSAnXCIrbytcIidcIik7dGhyb3cgZi5jb2RlPVwiTU9EVUxFX05PVF9GT1VORFwiLGZ9dmFyIGw9bltvXT17ZXhwb3J0czp7fX07dFtvXVswXS5jYWxsKGwuZXhwb3J0cyxmdW5jdGlvbihlKXt2YXIgbj10W29dWzFdW2VdO3JldHVybiBzKG4/bjplKX0sbCxsLmV4cG9ydHMsZSx0LG4scil9cmV0dXJuIG5bb10uZXhwb3J0c312YXIgaT10eXBlb2YgcmVxdWlyZT09XCJmdW5jdGlvblwiJiZyZXF1aXJlO2Zvcih2YXIgbz0wO288ci5sZW5ndGg7bysrKXMocltvXSk7cmV0dXJuIHN9KSIsIlwidXNlIHN0cmljdFwiO1xuLyoqXG4gKiBDcmVhdGVkIGJ5IGVwZW5uZXIgb24gMy85LzIwMTYuXG4gKi9cbnZhciBwcm9ncmFtID0gcmVxdWlyZSgnLi9jbGFzc2VzL3Byb2dyYW0uanMnKTtcblxuJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24oKSB7XG5cbiAgICBuZXcgcHJvZ3JhbSgpO1xuXG4gICAgLy8gcG9wdXAgZm9yIGRlbGV0ZSBidXR0b25zXG4gICAgJCgnLmRlbGV0ZS1jb25maXJtJykub24oJ3N1Ym1pdCcsIGZ1bmN0aW9uKCkge1xuICAgICAgICByZXR1cm4gY29uZmlybSgnQXJlIHlvdSBzdXJlIHlvdSB3YW50IHRvIGRlbGV0ZSB0aGlzPycpO1xuICAgIH0pO1xuXG4gICAgLy8gZmFkZSBhbGVydHMgdGhhdCBpbmRpY2F0ZSBzdWNjZXNzXG4gICAgd2luZG93LnNldFRpbWVvdXQoZnVuY3Rpb24oKSB7XG4gICAgICAgICQoXCIuYWxlcnQtc3VjY2Vzc1wiKS5mYWRlVG8oNTAwLCAwKS5zbGlkZVVwKDUwMCwgZnVuY3Rpb24oKSB7XG4gICAgICAgICAgICAkKHRoaXMpLnJlbW92ZSgpO1xuICAgICAgICB9KTtcbiAgICB9LCAzMDAwKTtcblxuICAgIC8vIGFjdGl2YXRlIGNvbGxhcHNlXG4gICAgJCgnLmNvbGxhcHNlJykuY29sbGFwc2UoKTtcblxufSk7IiwiXCJ1c2Ugc3RyaWN0XCI7XG5jbGFzcyBQcm9ncmFtIHtcbiAgICBjb25zdHJ1Y3RvcigpIHtcbiAgICAgICAgdGhpcy5zaG93UHJvZ3JhbUluZm8oKTtcblxuICAgICAgICAkKCdzZWxlY3QjcHJvZ3JhbV9pZCcpLm9uKCdjaGFuZ2UnLCAoKSA9PiB7XG4gICAgICAgICAgICB0aGlzLnNob3dQcm9ncmFtSW5mbygpO1xuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICBzaG93UHJvZ3JhbUluZm8oKSB7XG4gICAgICAgIHZhciBpZCA9ICQoJ3NlbGVjdCNwcm9ncmFtX2lkJykudmFsKCk7XG4gICAgICAgIGlmIChpZCAmJiBpZCAhPSAnJykge1xuICAgICAgICAgICAgJC5hamF4KHtcbiAgICAgICAgICAgICAgICB1cmw6ICcuLi8uLi8uLi9wcm9ncmFtcy8nICsgaWQgKyAnL2luZm8nXG4gICAgICAgICAgICB9KS5kb25lKChkYXRhKSA9PiB7XG4gICAgICAgICAgICAgICAgJCgnI3Byb2dyYW0taW5mbycpLmh0bWwoZGF0YSk7XG4gICAgICAgICAgICAgICAgY29uc29sZS5kZWJ1ZygnUHJvZ3JhbSBpbmZvIGxvYWRlZCcpO1xuICAgICAgICAgICAgfSlcbiAgICAgICAgfVxuICAgIH1cbn1cblxubW9kdWxlLmV4cG9ydHMgPSBQcm9ncmFtOyJdfQ==
