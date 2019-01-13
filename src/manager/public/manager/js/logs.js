let $date = $('#date');
let $action = $('#action');
let date = $date[0].value;

function getData() {
    $action.empty();
    $.ajax({type: "GET", url: '../log/' + date + '.log', async: false, cache: false})
        .responseText
        .split("\n")
        .reverse()
        .forEach(function (e) {
            if (e.split(" - ")[0] !== undefined && e.split(" - ")[1] !== undefined && e.split(" - ")[2] !== undefined && e.split(" - ")[3] !== undefined) {
                $action.append('<tr><td>' + e.split(" - ")[0] + '</td><td>' + e.split(" - ")[1] + '</td><td>' + e.split(" - ")[2] + '</td><td>' + e.split(" - ")[3] + '</td></tr>');
            }
        });
}

getData();

$date.change(function() {
    date = $date[0].value;
    getData()
});

$('td').each(function (i , v) {
    if (v.textContent === "") {
        $('td:eq(' + i + ')').text("anonymous")
    }
    else if (v.textContent === "::1") {
        $('td:eq(' + i + ')').text("localhost")
    }
});