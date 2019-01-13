$('.date').each(function (i, v) {
    $('.date')[i].textContent = "Le " + v.textContent.split(" ")[0].split("-").reverse().join("/") + " à "
        + v.textContent.split(" ")[1].split(":")[0] + "h" + v.textContent.split(" ")[1].split(":")[1];
});