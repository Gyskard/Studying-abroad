function createElementMap() {
    let elements = $('#elements');
    let elementMap = [];
    for(let i = 0; i < elements[0].childElementCount - 1; i++) {
        elementMap.push([i, elements[0].children[i].children[0].attributes[0].nodeValue]);
    }
    return elementMap
}

function searchElementClass(l) {
    let className = "";
    $.each(l, function (i, v) {
        if (v.match("^element")) {
            className = v;
            return false
        }
    });
    return className
}

function searchElementIndex(map, elm) {
    let index = 0;
    $.each(map, function (i, v) {
        if (v[1] === elm) {
            index = v[0];
            return false
        }
    });
    return index
}

function searchNewPositionIndex(index, action) {
    if (action === "up") {
        return index - 1
    }
}

function moveIsPossible(index, action) {
    if (action === "up") {
        return index !== 0;
    }
}

function moveElement(element, map, index, action, movePossible) {
    if (movePossible) {
        let indexNewPosition = searchNewPositionIndex(index, action);
        let indiceNewPosition = map[indexNewPosition][0];
        map[indexNewPosition][0] = index;
        map[index][0] = indiceNewPosition;
        return map
    }
}

function sortElementMap(map) {
    return map.sort(function(a,b){
        return a[0] - b[0];
    });
}

function movement(element, action) {
    let elementMap = createElementMap();
    let index = searchElementIndex(elementMap, element);
    let movePossible = moveIsPossible(index, action);
    let newElementMap = moveElement(element, elementMap, index, action, movePossible);
    newElementMap = sortElementMap(newElementMap);
    console.log(newElementMap)
}

$('.clickUp').click(function (e) {
    movement(searchElementClass(e.target.classList), "up")
});