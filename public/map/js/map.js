L.tileLayer('https://tile.openstreetmap.org/1/1/1.png', {
    noWrap: true
}).addTo(L.map('map').setView([0, 0], 0));

function size() {
    $('#map').css('height', $(window).height() - $('nav')[0].clientHeight - $('footer').height());
}

$(window).resize(function () {
    size()
});

size();

$(document).ready(function(){
    $(window).trigger('resize');
});