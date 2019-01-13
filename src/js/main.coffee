$.ajaxSetup({
  cache: false
});

$.get 'html/menu.html', (html) ->
  html = $(html)
  if $(document).find("title").text() is "Etudes à l'étranger"
    html.find('#carteMenu').addClass('active')
  else
    html.find('#infosMenu').addClass('active')
  $('nav').html html