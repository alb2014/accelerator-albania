(function() {

  $(document).ready(function() {

    // Close modal window
    $(".modal").on('click', function(e) {
      if(e.target == this){ 
        // only if the target itself has been clicked
        location.hash = 'close';
      }
    });

  })

}());