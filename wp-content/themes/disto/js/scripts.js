jQuery( function ( $ ) {
  $('#search').on('click', function(){
    $country = $('#country').val()
    $category = $('#category').val()
    $numofdays = $('#numofdays').val()
    $genre = $('#genre').val()
    $campaing = $('#campaing').val()
    $size = $('#size').val()


    all_data = {action: 'show_festivals', country: $country, category: $category, numofdays: $numofdays, genre: $genre, campaing: $campaing, size: $size }

    //console.log(all_data)
    $.ajax({
      url: window.location.origin+'/wp-admin/admin-ajax.php',
      data: all_data,
      method: 'POST',
      beforeSend: function(){
      
      },
      success: function(data) {
        console.log(data)
      }
    });
  })
})