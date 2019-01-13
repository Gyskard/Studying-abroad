$action = $('#action');
$sectionBody = $('.section-body');
let selectionList = [];
let newSelectionList = [];
let changePosition = false;
let numberTestimonies;
let counter;
let order;
let testiID;

function chooseID() {
    let listID = [];
    let ID = $('tbody').children().length;
    $('[id]').each(function() {
        listID.push($(this).attr("id"));
    });
    while ($.inArray('#' + ID, listID) !== -1) {
        ID+=1
    }
    return ID
}

function isSelected(id) {
    if ($(id).children().eq(5).contents().hasClass("badge-success") === true) {
        return '<option value="1" selected>Activé</option><option value="0">Désactivé</option>'

    }
    return '<option value="1">Activé</option><option value="0" selected>Désactivé</option>'
}

function rplc(data, old, n3w) {
    return data.replace(new RegExp('#' + old + '#', 'g'), n3w)
}

function display(id, action) {
    counter = 0;
    testiID = id;
    $.get("html/" + action + ".html", function (dHTML) {
        $.getJSON("../manager/testimonies/testimonies" + id.replace(new RegExp('#', 'g'), '') + ".json", function (dJSON) {
            dHTML = rplc(dHTML, 'ID', id);
            dHTML = rplc(dHTML, 'ID_SLICE', id.slice(1));
            dHTML = rplc(dHTML, 'NAME',     $(id).contents()[1].textContent);
            dHTML = rplc(dHTML, 'LOCATION', $(id).contents()[4].textContent);
            dHTML = rplc(dHTML, 'SELECT',   isSelected(id));
            dHTML = rplc(dHTML, 'TITLE',    dJSON.title);
            dHTML = rplc(dHTML, 'WITNESSESNAME', dJSON.witnessesName);
            dHTML = rplc(dHTML, 'WITNESSESLASTNAME', dJSON.witnessesLastName);
            dHTML = rplc(dHTML, 'LATITUDE', dJSON.latitude);
            dHTML = rplc(dHTML, 'LONGITUDE', dJSON.longitude);
            dHTML = rplc(dHTML, 'COUNTRY', dJSON.country);
            dHTML = rplc(dHTML, 'REGION', dJSON.region);
            dHTML = rplc(dHTML, 'CITY', dJSON.city);
            let htmlList = "";
            let countElements = 0;
            if (changePosition !== true) {
                $.each(dJSON.elements, function(index, value) {
                    selectionList.push([value, value.position])
                });
            }
            selectionList = selectionList.sort(function(a, b) { return a[1] - b[1] });
            selectionList.forEach(function (element) {
                $.get("html/elements2.html", function (d) {
                    d = rplc(d, 'NAME', element[0].name);
                    d = rplc(d, 'CONTENT', element[0].content);
                    if (changePosition !== true) {
                        switch(element[0].type) {
                            case "text":
                                d = rplc(d, 'TEXT', 'selected');
                                d = rplc(d, 'VIDEO', '');
                                d = rplc(d, 'IMAGE', '');
                                break;
                            case "video":
                                d = rplc(d, 'TEXT', '');
                                d = rplc(d, 'VIDEO', 'selected');
                                d = rplc(d, 'IMAGE', '');
                                break;
                            case "image":
                                d = rplc(d, 'TEXT', '');
                                d = rplc(d, 'VIDEO', '');
                                d = rplc(d, 'IMAGE', 'selected');
                                break;
                        }
                    }
                    else {
                        let $elementSelect = $('#elements > .form-group');
                        $elementSelect.each(function (i, v) {
                            if (element[0].name === v.id.substring(0, v.id.length - 5)) {
                                for (let j = 0; j < 3 ; j++) {
                                    let $attribut = v.children[1].children[1].children[0].children[j].attributes;
                                    if ($attribut.length === 2) {
                                        switch($attribut.value.textContent) {
                                            case "text":
                                                d = rplc(d, 'TEXT', 'selected');
                                                d = rplc(d, 'VIDEO', '');
                                                d = rplc(d, 'IMAGE', '');
                                                break;
                                            case "video":
                                                d = rplc(d, 'TEXT', '');
                                                d = rplc(d, 'VIDEO', 'selected');
                                                d = rplc(d, 'IMAGE', '');
                                                break;
                                            case "image":
                                                d = rplc(d, 'TEXT', '');
                                                d = rplc(d, 'VIDEO', '');
                                                d = rplc(d, 'IMAGE', 'selected');
                                                break;
                                        }
                                        counter += 1;
                                    }
                                }
                            }
                        })
                    }
                    htmlList += d;
                    countElements += 1;
                    if (countElements === selectionList.length) {
                        dHTML = rplc(dHTML, 'ELEMENTS', htmlList);
                        $action.empty().html(dHTML).css("display", "initial");
                    }
                });
            });
        });
    })
}

function identify(elements) {
    return $.grep(elements.attr("class").split(' '), function(el) {
        return (el.startsWith('element'))
    }).toString();
}

function array_move(arr, old_index, new_index) {
    if (new_index >= arr.length) {
        let k = new_index - arr.length + 1;
        while (k--) {
            arr.push(undefined)
        }
    }
    arr.splice(new_index, 0, arr.splice(old_index, 1)[0]);
    return arr
}

function changeOrder(target, direction) {
    let element = identify($(target));
    changePosition = true;
    if (newSelectionList.length === 0) {
        let index = 0;
        selectionList.forEach(function (v) {
            newSelectionList.push(v[0].name);
            index += 1
        });
    }
    if ((newSelectionList.indexOf(element) !== 0 && direction === 'up') || (newSelectionList.indexOf(element) !== newSelectionList.length && direction === 'down'))  {
        if (direction === 'up') {
            newSelectionList = array_move(newSelectionList, position, position - 1)
        }
        else if (direction === 'down') {
            newSelectionList = array_move(newSelectionList, position, position + 1)
        }
        let index = 0;
        selectionList.forEach(function (element) {
            selectionList[index][1] = newSelectionList.indexOf(element[0].name) + 1;
            index += 1
        });
        return true
    }
    return false
}

function triggerModif(id) {
    id = "#" + id;
    display(id, "modif");
    numberTestimonies = id
}


$('#actionAdd').click(function () {
    display(chooseID(), "add")
});

$('.actionModif').click(function (e) {
    display(e.target.id, "modif");
    numberTestimonies = e.target.id
});

$('.actionDelete').click(function (e) {
    display(e.target.id, "delete")
});

$sectionBody.on('click', '.clickDelete', function(e) {
    $('#' + identify($(e.target)) + '-form').remove()
});

$sectionBody.on('click', '.clickUp', function(e) {
    let order = changeOrder(e.target, 'up');
    if (order === true) {
        display(numberTestimonies, "modif")
    }
});

$sectionBody.on('click', '.clickDown', function(e) {
    let order = changeOrder(e.target, 'down');
    if (order === true) {
        display(numberTestimonies, "modif")
    }
});

$sectionBody.on('change', '.custom-select', function (e) {
    $select = $('select.' + e.target.className.split(' ')[1]);
    for(let i = 0; i < 3; i++) {
        if (e.target.children[i].attributes.length === 2) {
            $select.children().eq(i)[0].removeAttribute("selected")
        }
        if ($select.children().eq(i)[0].value === e.target.value) {
            $select.children().eq(i).attr('selected', '')
        }
    }
});


$sectionBody.on('click', '#addElement', function() {
    window.location.replace("testimonials/actions.php?id=" + testiID.slice(1));
});