// case insensitive ':contains' selector
jQuery.expr[':'].Contains = function(a, i, m) {
    return jQuery(a).text().toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
};

$(function() {
    $('#searchbox').on('keyup', function() {
        var w = $(this).val();
        if (w) {
            $('#opleidingDIV span').hide();
            $('#opleidingDIV span:Contains('+w+')').show();
        } else {
            $('#opleidingDIV span').show();                  
        }
    });
});
