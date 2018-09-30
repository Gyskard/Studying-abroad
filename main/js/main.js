L.tileLayer('https://tile.openstreetmap.org/1/1/1.png', {
    noWrap: true
}).addTo(L.map('map').setView([0, 0], 0));


function size() {
    $('#map').css('height', $(window).height() - $('nav').height())
}

$(window).resize(function () {
    size()
});

size();