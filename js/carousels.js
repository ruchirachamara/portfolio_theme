$(function(){  
  var $txtcarousel = $('#testimonial-list'),
      txtcount = $txtcarousel.children().length,
      wrapwidth = (txtcount * 415) + 415; // 400px width for each testimonial item
  $txtcarousel.css('width',wrapwidth);
  var animtime = 750; // milliseconds for clients carousel
 
  // prev & next btns for testimonials
  $('#prv-testimonial').on('click', function(){
    var $last = $('#testimonial-list li:last');
    $last.remove().css({ 'margin-left': '-415px' });
    $('#testimonial-list li:first').before($last);
    $last.animate({ 'margin-left': '0px' }, animtime); 
  });
  
  $('#nxt-testimonial').on('click', function(){
    var $first = $('#testimonial-list li:first');
    $first.animate({ 'margin-left': '-415px' }, animtime, function() {
      $first.remove().css({ 'margin-left': '0px' });
      $('#testimonial-list li:last').after($first);
    });  
  });

  var $clientcarousel = $('#clients-list'),
      clients = $clientcarousel.children().length,
      clientwidth = (clients * 140); // 140px width for each client item 
  $clientcarousel.css('width',clientwidth);
  
  var rotating = true,
      clientspeed = 1800;
  setInterval(  function() {    
      var $first = $('#clients-list li:first');
      $first.animate({ 'margin-left': '-140px' }, 600, function() {
        $first.remove().css({ 'margin-left': '0px' });
        $('#clients-list li:last').after($first);
      });    
  }, 200);
});