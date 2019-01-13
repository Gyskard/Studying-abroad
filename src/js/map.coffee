arrayMarker = []
number = 0
buttonHTMLfr = '<div class="text-center"><div class="btn-group btn-group-toggle" data-toggle="buttons"><label class="active btn btn-secondary" id="french"><input type="radio" name="french" autocomplete="off"> Français</label><label class="btn btn-secondary" id="other"><input type="radio" name="other" autocomplete="off"> Langue original</label></div></div>'
buttonHTMLol = '<div class="text-center"><div class="btn-group btn-group-toggle" data-toggle="buttons"><label class="btn btn-secondary" id="french"><input type="radio" name="french" autocomplete="off"> Français</label><label class="active btn btn-secondary" id="other"><input type="radio" name="other" autocomplete="off"> Langue original</label></div></div>'
buttonHTMLonlyFr = '<div class="text-center"><div class="btn-group btn-group-toggle" data-toggle="buttons"><label class="active btn btn-secondary" id="french"><input type="radio" name="french" autocomplete="off"> Français</label></div></div>'
buttonHTMLonlyOl = '<div class="text-center"><div class="btn-group btn-group-toggle" data-toggle="buttons"><label class="btn btn-secondary" id="other"><input type="radio" name="other" autocomplete="off"> Langue original</label></div></div>'

size = () -> $('#map').css('height', $(window).height() - $('nav')[0].clientHeight - $('footer').height())
upFirstStr = (str) -> str.charAt(0).toUpperCase() + str.slice(1)
searchTag = (element) ->
  list = []
  element.each (index, value) ->
    if value.innerText is '[ol]' then list.push [index]
    if value.innerText is '[/ol]' then list.push [index]
    if value.innerText is '[fr]' then list.push [index]
    if value.innerText is '[/fr]' then list.push [index]
  return list

$(window).ready -> size()
$(window).resize -> size()
$(document).ready -> size()

size()

map = L.map('map').setView([45.19, 5.77], 4)


$.getJSON 'manager/manager/testimonies/index.json', (data) ->
  $.each data, (i, v) ->
    if v['longitude'] not in [0, '0'] and v['status'] not in [0, '0']
      arrayMarker.push [L.marker([parseFloat(v['longitude']), parseFloat(v['latitude'])], alt: v['id']), v['id']]
      arrayMarker[arrayMarker.length - 1][0].addTo map

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  minZoom: 2,
  maxZoom: 18,
  attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>'
}).addTo(map)

size()

$('main').on "click", "img", (e) ->
  number = e['currentTarget'].alt
  $.getJSON 'manager/manager/testimonies/testimonies' + number + '.json', (data) ->
    $('.modal-title').empty().append '<p style="font-size: 2em;">Témoignage de <strong>' + upFirstStr(data['witnessesName']) + " " + upFirstStr(data['witnessesLastName']) + '</strong></p><p style="font-style: italic">' + data['country'] + " / " + data['region'] + " / " + data['city'] + '</p>'
    elements = data['elements']
    $('.modal-body').html elements
    elements = $($('.modal-body').text())

    $('.modal-body').html('').append(elements)

    listP = searchTag($('.modal-body p'))

    if listP.length == 4
      elementPol = []
      elementPfr = []
      $('.modal-body p').each (index, value) ->
        if index > listP[0] and index < listP[1]
          elementPol.push value
          value.remove()
        if index > listP[2] and index < listP[3]
          elementPfr.push value
          value.remove()

      listP = searchTag($('.modal-body p'))

      $('.modal-body p:eq(' + listP[3] + ')').remove()
      $('.modal-body p:eq(' + listP[2] + ')').remove()
      $('.modal-body p:eq(' + listP[1] + ')').remove()

      listP = searchTag($('.modal-body p'))

    allElement = ''
    elementPfr.forEach (element) -> allElement += element.outerHTML
    fr = true
    ol = true

    if allElement == '<p><br></p>'
      allElement = ''
      elementPol.forEach (element) -> allElement += element.outerHTML
      $('.modal-body p:eq(' + listP[0] + ')').replaceWith(buttonHTMLonlyOl + allElement)
      ol = true
      fr = false

    allElement = ''
    elementPol.forEach (element) -> allElement += element.outerHTML

    if allElement == '<p><br></p>'
      allElement = ''
      elementPfr.forEach (element) -> allElement += element.outerHTML
      $('.modal-body p:eq(' + listP[0] + ')').replaceWith(buttonHTMLonlyFr + allElement)
      ol = false
      fr = true

    if fr is true and ol is true
      allElement = ''
      elementPfr.forEach (element) -> allElement += element.outerHTML
      $('.modal-body p:eq(' + listP[0] + ')').replaceWith(buttonHTMLfr + allElement)

  $('.modal-body p:empty').remove()
  $('#testimonies').modal 'show'

$('main').on "click", "#other", () ->
  $.getJSON 'manager/manager/testimonies/testimonies' + number + '.json', (data) ->
    $('.modal-title a').text upFirstStr(data['witnessesName']) + " " + upFirstStr(data['witnessesLastName'])
    elements = data['elements']
    $('.modal-body').html elements
    elements = $($('.modal-body').text())

    $('.modal-body').html('').append(elements)

    listP = searchTag($('.modal-body p'))

    if listP.length == 4
      elementPol = []
      elementPfr = []
      $('.modal-body p').each (index, value) ->
        if index > listP[0] and index < listP[1]
          elementPol.push value
          value.remove()
        if index > listP[2] and index < listP[3]
          elementPfr.push value
          value.remove()

      listP = searchTag($('.modal-body p'))

      $('.modal-body p:eq(' + listP[3] + ')').remove()
      $('.modal-body p:eq(' + listP[2] + ')').remove()
      $('.modal-body p:eq(' + listP[1] + ')').remove()

      listP = searchTag($('.modal-body p'))

    allElement = ''
    elementPfr.forEach (element) -> allElement += element.outerHTML

    if allElement == '<p><br></p>'
      allElement = ''
      elementPol.forEach (element) -> allElement += element.outerHTML
      $('.modal-body p:eq(' + listP[0] + ')').replaceWith(buttonHTMLonlyOl + allElement)

    else
      allElement = ''
      elementPol.forEach (element) -> allElement += element.outerHTML
      $('.modal-body p:eq(' + listP[0] + ')').replaceWith(buttonHTMLol + allElement)

    $('.modal-body p:empty').remove()
    $('#testimonies').modal 'show'

$('main').on "click", "#french", () ->
  $.getJSON 'manager/manager/testimonies/testimonies' + number + '.json', (data) ->
    $('.modal-title a').text upFirstStr(data['witnessesName']) + " " + upFirstStr(data['witnessesLastName'])
    elements = data['elements']
    $('.modal-body').html elements
    elements = $($('.modal-body').text())

    $('.modal-body').html('').append(elements)

    listP = searchTag($('.modal-body p'))

    if listP.length == 4
      elementPol = []
      elementPfr = []
      $('.modal-body p').each (index, value) ->
        if index > listP[0] and index < listP[1]
          elementPol.push value
          value.remove()
        if index > listP[2] and index < listP[3]
          elementPfr.push value
          value.remove()

      listP = searchTag($('.modal-body p'))

      $('.modal-body p:eq(' + listP[3] + ')').remove()
      $('.modal-body p:eq(' + listP[2] + ')').remove()
      $('.modal-body p:eq(' + listP[1] + ')').remove()

      listP = searchTag($('.modal-body p'))

    allElement = ''
    elementPol.forEach (element) -> allElement += element.outerHTML

    if allElement == '<p><br></p>'
      allElement = ''
      elementPfr.forEach (element) -> allElement += element.outerHTML
      $('.modal-body p:eq(' + listP[0] + ')').replaceWith(buttonHTMLonlyFr + allElement)

    else
      allElement = ''
      elementPfr.forEach (element) -> allElement += element.outerHTML
      $('.modal-body p:eq(' + listP[0] + ')').replaceWith(buttonHTMLfr + allElement)

    $('.modal-body p:empty').remove()
    $('#testimonies').modal 'show'