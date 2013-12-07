(function() {

  $(document).ready(function() {

    // Close modal window
    $(".modal").on('click', function(e) {
      if(e.target == this){ 
        // only if the target itself has been clicked
        location.hash = 'close';
      }
    });

    $('.toggles').on('click','li', function() {
      $('.slides li').removeClass('selected').eq($(this).index()).addClass('selected');
    });

    $('.main-toggles li a').hover(function() {
      $('.slides li').removeClass('selected').eq($(this).parent().index()).addClass('selected');
    });

    $('.voted').on('click', function(e) {
      e.preventDefault();
    })

  })

}());