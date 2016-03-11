/**
 * Created by epenner on 3/9/2016.
 */
// Activate deletion confirmation
$(document).ready(function() {
    $('.delete-confirm').on('submit', function() {
        return confirm('Are you sure you want to delete this?');
    });

    window.setTimeout(function() {
        $(".alert-success").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
});