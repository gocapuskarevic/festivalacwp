jQuery( function ( $ ) {
  $('#search').on('click', function(){
    $country = $('#country').val()
    $category = $('#category').val()
    $month = $('#month').val()
    $numofdays = $('#numofdays').val()
    $genre = $('#genre').val()
    $campaing = $('#campaing').val()
    $size = $('#size').val()
    $other = $('#other').val()


    all_data = {action: 'show_festivals', country: $country, category: $category, month: $month, numofdays: $numofdays, genre: $genre, campaing: $campaing, size: $size, other: $other }

    //console.log(all_data)
    $.ajax({
      url: window.location.origin+'/wp-admin/admin-ajax.php',
      data: all_data,
      method: 'POST',
      beforeSend: function(){
      
      },
      success: function(data) {
        //console.log(data)
        $('#main-default-wrapper').html(data)
        $('.c-pagination').remove()
        $('html, body').animate({
          scrollTop: $('#main-default-wrapper').offset().top - 130 
        }, 100);
      }
    });
  })
  $('.js-open-tab').on('click', function(){
    $tab = $(this).data('tab')
    $('.js-open-tab').removeClass('active')
    $(this).addClass('active')
    if($tab == 'srb'){
      $('#tab-reg').css('z-index','1');
      $('#tab-' + $tab).css('z-index','20');
    }
    if($tab == 'reg'){
      $('#tab-srb').css('z-index','1');
      $('#tab-' + $tab).css('z-index','20');
    }
  })

  $(document).on('click', '.c-pagination .page-numbers', function(e){
    e.preventDefault()
    $page = $(this).text();

    all_data = {action: 'show_festivals_default', page: $page }

    //console.log(all_data)
    $.ajax({
      url: window.location.origin+'/wp-admin/admin-ajax.php',
      data: all_data,
      method: 'POST',
      beforeSend: function(){
      
      },
      success: function(data) {
        //console.log(data)
        $('html, body').animate({
          scrollTop: $('#main-default-wrapper').offset().top - 130 
        }, 100);
        $('#main-default-wrapper').html(data)
      }
    });
  })
  
  $(document).ready(function() {
    $('.js-basic-dropdown').select2();
  });

  $(document).ready(function() {
    let params = new URLSearchParams(window.location.search);
    if(params.get('q') == 'srbija'){
      $('#country').val(234)
      $('#search').click()
    }
    if(params.get('q') == 'showcase'){
      $('#other').val(505)
      $('#search').click()
    }
  });

  var acc = document.getElementsByClassName("accordion");
  var i;

  for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var panel = this.nextElementSibling;
      if (panel.style.maxHeight) {
        panel.style.maxHeight = null;
      } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
      }
    });
  }
})
