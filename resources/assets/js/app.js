/**
 * Created by epenner on 3/9/2016.
 */
var program = require('./classes/program.js');

$(document).ready(function() {

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
    $('.delete-confirm').on('submit', function() {
        return confirm('Are you sure you want to delete this?');
    });

    // fade alerts that indicate success
    window.setTimeout(function() {
        $(".alert-success").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);

    $("#showRequirementForm").on('click', function() {
        $("#addRequirementForm").toggle();
    });

    $('#addRequirement').on('click', function() {
        $('#requirementQueue').show();
    });

    // activate collapse
    $('.collapse').collapse();

});