/**
 * Created by epenner on 3/9/2016.
 */
var program = require('./classes/program.js');

$(document).ready(function() {

    new program();

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

    // activate collapse
    $('.collapse').collapse();

});