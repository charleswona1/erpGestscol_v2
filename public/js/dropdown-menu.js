$('.dropdown-menu li').on('click', function() {
  var getValue = $(this).text();
  $('.dropdown-select').text(getValue);
});


