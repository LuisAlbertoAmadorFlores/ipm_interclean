let flatView = 0;
$('#CerrarAvisos').click(function () {
    $('.modalAvisos').hide();
    localStorage.setItem('flatView', '1');
    localStorage.setItem('flatMenu', '0');
});

$('#closedSesion').click(function () {
    localStorage.setItem('flatView', '0');
});

if (localStorage.getItem('flatView') == 1) {
    $('.modalAvisos').hide();
} else {
    $('.modalAvisos').show();
}