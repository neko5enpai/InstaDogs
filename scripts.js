/* $(function() {
  $( ".fas" ).click(function(e) {
    e.parent.remove();
  });
});
 */

$(".delete_dog").click(function(event) {
  event.preventDefault();
  $(this).parent('.dogs').remove();
});

/* $(".albery-container").albery({
  speed: 200, // default: 200
  imgWidth: 500, // default: 600
  paginationBorder: 7,
  paginationItemWidth: 140
}); */



