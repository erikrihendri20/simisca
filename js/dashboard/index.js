$(document).ready(function() {
    $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');
        $('#overlay').addClass('active');
        $('.collapse.in').toggleClass('in');
        $(this).toggleClass('active');
    });
    $('#dismiss').on('click', function() {
        $('#sidebar').removeClass('active');
        $('#overlay').removeClass('active');
        $('#sidebarCollapse').removeClass('active');
    });
});