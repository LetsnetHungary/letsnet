function checkImage(src, callback1, callback2) {
  $('<img style="display: none" src="' + src +'">').error(function () {
      callback2();
    }).load(function() {
      callback1();
    });
}
$(function() {
  $('#prod_btn_addimg').click(function() {
    $('#prod_imgupload').click();
  });
  $(document).on('click', '.prod_img_close', function() {
    $(this).parent().remove();
  });
  function readFile(file) {
    reader = new FileReader();
    reader.onload = function(e) {
        text = e.target.result;
        img = new Image();
        img.onload = function() {
          canvas = $('<canvas width="500" height="500" style="display: none;"></canvas>');
          ctx = canvas[0].getContext('2d');
          ctx.fillStyle = 'white';
          ctx.fillRect(0, 0, 500, 500);
          ctx.drawImage(this, 0, 0, 500, 500);
          dataurl = canvas[0].toDataURL('image/jpeg');
          elem = $('<li class="prod_img_wrapper"><img class="prod_img" src="' +
          dataurl + '"><img class="prod_img_close"></li>');
          $('#prod_img_holder').append(elem);
        }
        img.src = text;
    }
    reader.readAsDataURL(file);
  }
  $('#prod_imgupload').change(function() {
    files = this.files;
    for (i = 0; i < files.length; i++) {
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
        elem = $('<li data-type="'+
        $(this).data('type') + '" class="prod_img_wrapper"><img class="prod_img" src="' +
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
        $('<div class="item prod_carousel_img"><img data-type="' + $(this).find('.prod_img').data('type')
        + '" class="prod_img" src="'+$(this).find('.prod_img').attr('src')+'"> </div>').appendTo('.carousel-inner');
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
