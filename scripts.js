

$(".delete_dog").click(function(event) {
  event.preventDefault();
  $(this).parent('.dogs').remove();
});



