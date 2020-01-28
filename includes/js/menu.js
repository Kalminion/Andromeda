$(document).ready(function() {
    var menuClickCounter = 0;

    $('#menu_slider').click(function() {
        if (menuClickCounter == 0) {
            $('#menu').css('margin-left','0px');
            $('#menu_slider').css('transform','rotate(180deg)');
            menuClickCounter = 1;
        } else {
            $('#menu').css('margin-left','-201px');
            $('#menu_slider').css('transform','rotate(0deg)');
            menuClickCounter = 0;
        }
    
    });
});