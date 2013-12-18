(function() {

  $(document).ready(function() {

    /* Close & open modal windows */

    // Only open login form in non-IE
    $('html:not(.lt-ie9)').on('click', '#header_login, #footer_login, #idea_login', function(e) {
      $('#login').addClass('open');
      e.preventDefault();
    });

    $('#faq_tab').on('click', function(e) {
      $('#faq').addClass('open');
      e.preventDefault();
    });

    $('.modal-close, .modal-button-close').on('click', function(e) {
      $('.modal.open').removeClass('open');
      e.preventDefault();
    });

    $(".modal").on('click', function(e) {
      if(e.target == this){ 
        // only if the target itself has been clicked
        $('.modal.open').removeClass('open');
      }
    });

    /* Slideshow */
    $('.toggles').on('click','li', function() {
      $('.slides li').removeClass('selected').eq($(this).index()).addClass('selected');
    });

    $('.main-toggles li a').hover(function() {
      $('.slides li').removeClass('selected').eq($(this).parent().index()).addClass('selected');
    });

    /* Make sure some <a> tags don't click awayy */
    $('.voted, .form-help a').on('click', function(e) {
      e.preventDefault();
    });

    /* Hover tier 2 form helpers */
    $('.form-help').hover(function() {
      $(this).children('div').addClass('show');
    }, function() {
      $(this).children('div').removeClass('show');
    });

    $('#UserViewForm input').keydown(function(e) {
      if (e.keyCode == 13) {
        $('#UserViewForm').submit();
      }
    });

  })

}());