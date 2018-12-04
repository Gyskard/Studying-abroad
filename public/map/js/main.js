function rplc(data, old, n3w) {
    return data.replace(new RegExp('##' + old + '##', 'g'), n3w)
}

function displayMenu(select) {
    $.get("html/menu.html", function (HTML) {
        if (select === "Carte") {
            HTML = rplc(HTML, 'CARTE', 'active');
            HTML = rplc(HTML, 'INFOS', '');
            HTML = rplc(HTML, 'CONNEXION', '');
        }
        else if (select === "Infos") {
            HTML = rplc(HTML, 'CARTE', '');
            HTML = rplc(HTML, 'INFOS', 'active');
            HTML = rplc(HTML, 'CONNEXION', '');
        }
        else if (select === "Connexion") {
            HTML = rplc(HTML, 'CARTE', '');
            HTML = rplc(HTML, 'INFOS', '');
            HTML = rplc(HTML, 'CONNEXION', 'active');
        }
        $('nav').html(HTML);
    });
}