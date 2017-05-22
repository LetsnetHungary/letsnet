$(function() {
  $('#prod_btn_addimg').click(function() {
    $('#prod_imgupload').click();
  });
  $(document).on('click', '.prod_img_close', function() {
    $(this).parent().remove();
  });
  function readFile(file) {
    var reader = new FileReader();
    reader.onload = function(e) {
        var text = e.target.result;
        var elem = $('<li class="prod_img_wrapper"><img class="prod_img" src="' +
        text + '"><img class="prod_img_close"></li>');
        $('#prod_img_holder').append(elem);
    }
    reader.readAsDataURL(file);
  }
  $('#prod_imgupload').change(function() {
    var files = this.files;
    for (var i = 0; i < files.length; i++) {
      readFile(files[i]);
    }
  });
  $('#prod_btn_modify').click(function() {
    if($(this).data('type') == 0) {
      $(this).html('Kész');
      $(this).data('type',1);
      $('#prod_btn_addimg').show();
      $('#prod_img_holder').show();
      $('#prod_carousel').hide();
      $('#prod_carousel').removeClass('carousel').removeClass('slide');
      $('#prod_carousel').find('.prod_img').each(function(i) {
        var elem = $('<li class="prod_img_wrapper"><img class="prod_img" src="' +
        $(this).attr('src') + '"><img class="prod_img_close"></li>');
        $('#prod_img_holder').append(elem);
        $(this).parent().remove();
      });
      $('.carousel-indicators').empty();
    } else {
      $(this).html('Módosítás');
      $(this).data('type',0);
      $('#prod_btn_addimg').hide();
      $('#prod_img_holder').hide();
      $('#prod_carousel').show();
      $('#prod_img_holder').find('li').each(function(i) {
        $('<div class="item prod_carousel_img"><img class="prod_img" src="'+$(this).find('.prod_img').attr('src')+'"> </div>').appendTo('.carousel-inner');
        $('<li data-target="#prod_carousel" data-slide-to="'+i+'"></li>').appendTo('.carousel-indicators')
        $(this).remove();
      });
      $('.item').first().addClass('active');
      $('.carousel-indicators > li').first().addClass('active');
      $('#prod_carousel').addClass('carousel').addClass('slide').carousel();
    }
  });
  $( "#prod_img_holder" ).sortable().disableSelection();
})
