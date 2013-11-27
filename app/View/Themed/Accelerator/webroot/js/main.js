(function() {

  $(document).ready(function() {

    // Close modal window
    $(".modal").on('click', function(e) {
      if(e.target == this || e.target == $('.modal-close')[0]){ 
        // only if the target itself has been clicked
        location.hash = 'close';
      }
    });

  })

}());