$(window).load(function() {
  $('.cms-save-default').cmssave({
    sections: [
      {
        type: 'imageset',
        container: 'slide-menu-default'
      },
      {
        type: 'text'
      },
      {
        type: 'text'
      },
      {
        type: 'imageset',
        container: 'slide-menu-default'
      },
      {
        type: 'imageset',
        container: 'shopcontainer-default'
      },
      {
        type: 'text'
      },
    ]
  });

  $('.cms-imageupload-default').storeimage({
    previewid: 'preview-img'
  });

//  KELL
//  EGY
//  KIS
//  HELY

  $( '#slide-menu-default').sortable({
    placeholder: "menu-row-placeholder",
    update: function( event, ui ) {
      $('.menu-row-default').each(function (i, elem) {
        $(elem).find('input').val(i+1);
      });
      itemchanged($(this))
    }
  });
  $('#slide-menu-default').disableSelection();
  $('.slide-id-default').change(function() {
      $(this).val()-1 < $('#slide-menu-default').find('li').index($(this).parent()) ?
                    $('#slide-menu-default').find('li').get($(this).val()-1).before($(this).parent()[0]) :
                    $('#slide-menu-default').find('li').get($(this).val()-1).after($(this).parent()[0]);
      $('#slide-menu-default').find('li').each(function(i, elem){
          $(elem).find('input').val(i+1);
      });
  });

  $('#add-item').click(function() {
    if ($('#preview-img').attr('src') != '') {
      $('#header_c_plus_img').val('');
      $('#slide-menu-default').append($('<li class="menu-row-default" data-pos="' + (ic-1) + '"><input class="form-control slide-id-default cms-item-default" style = "width: 60px;" type = "number" value = "' + ($('#slide-menu-default').find('li').length +1) +'"><img class="menu-img-default" src = "' + $('#preview-img').attr('src') +'"><button class="btn btn-danger btn-remove cms-item-default" style="display: inline;">-</button></li>'))
      $('#preview-img').attr('src','');
      $('.btn-remove').click(function() {
        if($(this).parent().data('pos') != undefined){
          images[$(this).parent().data('pos')] = undefined;
        }
        $(this).parent().remove();
        $('#slide-menu-default').find('li').each(function(i, elem){
            $(elem).find('input').val(i+1);
        });
      });
    }
  })
  $('.btn-remove').click(function() {
    if($(this).parent().data('pos') != undefined){
      images[$(this).parent().data('pos')] = undefined;
    }
    $(this).parent().remove();
    $('#slide-menu-default').find('li').each(function(i, elem){
        $(elem).find('input').val(i+1);
    });
  });4
  $('#preview-default').click(function() {
    ind = $('#carousel-default').find('div').index($('#carousel-default').find('.active').eq(0));
    $('#slider-main').remove()
    $('#carousel-container-default').append('<div id="slider-main" class="carousel slide"> <ol class="carousel-indicators" id="carousel-indicators-default"></ol> <div id="carousel-default" class="carousel-inner" role="listbox"> </div> <a class="left carousel-control" href="#slider-main" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">&lt;</span> </a> <a class="right carousel-control" href="#slider-main" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">&gt;</span> </a> </div>')
    $('#slide-menu-default').find('li').each(function(i,elem) {
        $('#carousel-default').append('<div class="item"><img src="' + $(elem).find('img').attr('src') + '" class="header__carousel__img" /></div>');
        $('#carousel-indicators-default').append('<li data-target="#slider-main" data-slide-to="' + i + '"></li>')
    });
    $('#carousel-indicators-default').find('li').eq(ind).addClass('active');
    $('#carousel-default').find('div').eq(ind).addClass('active');
    $("#slider-main").removeData();
    $("#slider-main").ready(function(){
        $("#slider-main").carousel(ind);
    })
  });

    $('#save-instagram').prop('disabled', true);
  $('#instagram-uploader').change(function () {
    files = this.files;
    done = 0;
    size = files.length;
    for(f=0; f<files.length; f++){
      file = files[f];
      window['reader' + f] = new FileReader();
      window['reader' + f].onloadend = function () {
          var result = this.result;
          var _split = result.replace(':','||').replace(';','||').replace(',','||').split('||');
          var type = _split[1];
          var encode = _split[2];
          var data = _split[3];
          var img = new Object();
          img.type = type;
          img.encode  = encode;
          img.data = data;
          images[ic] = img;
          ic += 1;
              elem = $(`<li class="shop-item-default">
                  <div class="product_item">
                      <div class="product_item_img_cont">
                          <img src="` + result + `" class="product_item_img" />
                      </div>
                      <div class="product_item_overlay">
                      </div>
                  </div>
              </li>`);
              elem.data('pos', ic-1);
              $('#shopcontainer-default').append(elem);
                $('#save-instagram').prop('disabled', false);
          done += 1;
          if(done == size) {
            $('#instagram-uploader').val('');
          }
      }
      if (file) {
          window['reader' + f].readAsDataURL(file);
          console.log('start' + f)
      }
  }
  });
  $('#save-instagram').click(function() {
    var imageset = new Object();
    var slides = new Array();
    $('#section4').find('li').each(function(i,elem) {
      if($(elem).data('pos') != undefined) {
        var imagenew  = new Object();
        var loc = $(elem).data('pos');
        imagenew.imgtype = "new";
        imagenew.position = i + 1;
        imagenew.type = images[loc].type;
        imagenew.encode = images[loc].encode;
        imagenew.data = images[loc].data;
        slides.push($.extend(true, {},imagenew));
        imagenew = {};
      } else {
        var imageold  = new Object();
        imageold.imgtype = "old";
        imageold.image_id = $(elem).find('img').attr('imageid');
        imageold.position = i + 1;
        imageold.type = $(elem).find('img').attr('src').split('.')[1];
        slides.push($.extend(true, {},imageold));
        imageold = {};
      }
    });
    imageset.type = "imageset";
    imageset.view = "Index";
    imageset.section_name = 'insta';
    imageset.records = slides;
    secid = checksectionchanged('insta');
    if(secid == -1) {
      sections.push($.extend(true, {},imageset))
    } else {
      sections[secid] = $.extend(true, {},imageset);
    }
    imageset = {};
    updatejsoncount += 1
    $('#save-instagram').prop('disabled', true);
  });


  $('#save-backimg').prop('disabled', true);
  $('#backimg-uploader').change(function () {
    file = this.files[0];
    var reader = new FileReader();
    reader.onloadend = function () {
        var result = reader.result;
        if($('#about').data('pos') != undefined){
          images[$('#about').data('pos')] = undefined;
          $('#about').data('pos', undefined);
        }
        $('#about').css('background-image', 'url(' + result + ')');
        var _split = result.replace(':','||').replace(';','||').replace(',','||').split('||');
        var type = _split[1];
        var encode = _split[2];
        var data = _split[3];
        var img = new Object();
        img.type = type;
        img.encode  = encode;
        img.data = data;
        $('#about').data('pos',ic);
        images[ic] = img;
        ic += 1;
        $('#save-backimg').prop('disabled', false);
    }
    if (file) {
        reader.readAsDataURL(file);
    } else {
    }
  });
  $('#save-backimg').click(function() {
    var imageset = new Object();
    var slides = new Array();
    if($('#about').data('pos') != undefined) {
      var imagenew  = new Object();
      var loc = $('#about').data('pos');
      imagenew.imgtype = "new";
      imagenew.position = 1;
      imagenew.type = images[loc].type;
      imagenew.encode = images[loc].encode;
      imagenew.data = images[loc].data;
      slides.push($.extend(true, {},imagenew));
      imagenew = {};
      imageset.type = "imageset";
      imageset.view = "Index";
      imageset.section_name = 'backimg';
      imageset.records = slides;
      secid = checksectionchanged('backimg');
      if(secid == -1) {
        sections.push($.extend(true, {},imageset))
      } else {
        sections[secid] = $.extend(true, {},imageset);
      }
      imageset = {};
      updatejsoncount += 1
      $('#save-backimg').prop('disabled', true);
    }
  });



  $('#shopcontainer-default').sortable({
    placeholder: "shopplaceholder-default",
    items: "li",
    update: function( event, ui ) {
      $('#save-instagram').prop('disabled', false);
    },
    connectWith: '#thrashcan'
  });
    $("#thrashcan").droppable({
      hoverClass: "thrash-hover",
      drop: function(ev, ui) {
            if($(ui.draggable).data('pos') != undefined){
              images[$(ui.draggable).data('pos')] = undefined;
            }
            ui.draggable.remove();
      }
  });
    $( "ul, li" ).disableSelection();



} );
