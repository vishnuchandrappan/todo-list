$('ul').on('click', 'li', function(){
  $(this).toggleClass("completed");
});

$('.fa-pencil').on('click', function(){
  $('input[type="text"]').fadeToggle();
});
