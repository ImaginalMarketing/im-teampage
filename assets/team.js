jQuery.noConflict();
(function($) {

$( document ).ready(function() {
// andherewego.exe


/*******************************
:: IM Team Page
*******************************/
$('#teamfilter').on('click', 'input, radio', function(event) {
  $('.f-dropdown.open').removeClass('open');
  var form = $('#teamfilter'); //  form ID
  $.ajax({
    url: imtheme.wp_path + '/wp-content/plugins/im-teampage/view/loop.php',
    type: 'POST',
    data: form.serialize(),
    beforeSend: function() {
      $('#theteam').find('.team_member').remove();
      $('#theteam').append(
        '<div class="page-content text-center" id="loader"><img width="50" src="' + imtheme.wp_path + '/wp-content/plugins/im-teampage/assets/loading.gif" alt="loading..." /></div>');
    },
    success: function(html) {
      $('#theteam #loader').remove();
      $('#theteam').append(html);
      // init Isotope
      var $grid = $('#theteam');
      $checkboxes = $('.filters input');
      var $newItems = $grid.children();
      $grid.prepend($newItems);

      if ($grid.children().length === 0){
        $('#noitems').addClass('on');
      } else { $('#noitems').removeClass('on'); }

      // execute
      $grid.isotope({
        sortBy: 'original-order',
        layoutMode: 'masonry'
      });
    }
  });
});
var hash = window.location.hash;
if (hash === "") {}
if (hash) {
  // Checking radio buttons for locations based on hash passed from locations page links
  $(hash).prop('checked', true);
  $(hash).click();
}
/////////// GO GO GADGET click handlers for the stepped process
// select city, open main cats
$("#drop-city label").click(function(){
  $("#stylistSort li input, #last-step input").attr("checked", false);
  $("#stylistSort li").removeClass('on');
  $("#last-step").fadeOut('slow');
  var $grid = $('#theteam');
  $grid.isotope('reloadItems');
  $(this).addClass('on');
  $("#drop-city label").not(this).removeClass('on');
  setTimeout(function(){
      $("#next-step").fadeIn(2000);
      $("#displayTeam").show();
  }, 500);
});
// load sub cat, close any final step filters
$("#stylistSort li").click(function(){
  $(this).addClass('on');
  $("#stylistSort li").not(this).removeClass('on');
  $("#last-step input").prop("checked", false);
  var $grid = $('#theteam');
  $grid.isotope('reloadItems');
    $("#last-step").fadeIn('slow');
});
// active classes on final step
$(".drop-experience input").click(function(){
  $(this).parent('label').addClass('active');
  $(".drop-experience input").not(this).parent('label').removeClass('active');
});






// end it all
});

})(jQuery);