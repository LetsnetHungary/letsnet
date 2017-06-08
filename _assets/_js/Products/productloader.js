function loadProducts() {

  numloaded = $('#products_holder > .product_holder').length;
  console.log($('#products_holder').data('id'))
  console.log(numloaded + 1)
  $.ajax({
      url: "../productsapi/getProductsByCategory",
      type: "post",
      data: {
        "id" : $('#products_holder').data('id'),
        'position' : 0
      },
      datatype: 'json',
      success: function(data){
        console.log(data)
        obj = $.parseJSON(data);
        addProducts(obj)
      },
      error: function(data) {
        console.log(data)
      }
  });
}
function addProducts(obj) {
  $.each(obj, function(index, product){
    m = `<div data-id="` + product.prod_id + `" class="product_holder col-md-3">
        <div class="p_image_holder">
          <img class="product_image" src="_cms/` + sitekey +`/_img/Products/`
          + product.prod_id +`/1.jpeg" alt="">
        </div>
        <div class="p_text_holder">
          <span>` + product.prod_name + `</span>
        </div>
    </div>`;
    $('#products_holder').append($(m));
  });
}
function loadProductOptions(obj) {
  clearProduct();
  $('#options').removeClass('btn-default').addClass('btn-primary');
  $('#newproduct').removeClass('btn-primary').addClass('btn-default');
  $('#delete_product').show();
  $('#prodid').val(obj.prod_id);
  $('#name').val(obj.prod_name);
  $('#price').val(obj.prod_price);
  $('#name').attr('placeholder','');
  $('#price').attr('placeholder','');
  (obj.outofstock == 1) ? $('#stock').attr('checked', false) : $('#stock').attr('checked', true);
  for(i = 0; i<obj.categories.length; i++) {
  group = $(`<div class="one_category_holder"><img class="prod_img_close"></div>`);
    for(key in obj.categories[i]) {
      elem = $(`<button data-id="`
        + key + `" class="btn_cat btn ra-100 btn-default">`
        + obj.categories[i][key] +
        `<div class="ripple-wrapper"></div> <i class="glyph-icon icon-chevron-right"></i></button>`);
      group.append(elem);
    }
      $('#prod_category_holder').append(group);
  }
  for(key in obj.labels) {
    inyet = false;
    where = {};
    $('#prod_label_holder').find('a').each(function() {
      if ($(this).data('id') == key) {
        inyet = true;
        where = $(this)
      }
    })
    if(inyet == false) {
      elem = $('<div class="label_holder"><img style="display:none" class="prod_img_close"><a data-id="' +
      key + '" class="btn selected font-red">' +
      obj.labels[key] +'</a></div>');
      $('#prod_label_holder').append(elem);
    } else {
      where.addClass('selected');
    }
  }
  for(key in obj.properties) {
    s = `<li class="one_property_holder">
    <img class="prod_img_close">
      <p>`+ obj.properties[key].name +`</p>
      <input type="text" class="form-control added_prop_input" id="" value="`
      + obj.properties[key].value +`"> </li>`;
    elem = $(s);
    elem.data('id', key)
    $('#properties').append(elem);
  }
  if($('#prod_btn_modify').data('type') == 0) {
      $('#prod_btn_modify').html('Kész');
      $('#prod_btn_modify').data('type',1);
      $('#prod_btn_addimg').show();
      $('#prod_img_holder').show();
      $('#prod_carousel').hide();
      $('#prod_carousel').removeClass('carousel').removeClass('slide');
      $('.carousel-indicators').empty();
    }
    loadImages(1);
  $('#sidepanel .spinner-wrapper').remove();
}
function loadImages(ite) {
  if(ite <= 20) {
    src = '_cms/'+ sitekey +'/_img/Products/' + obj.prod_id + '/' + ite + '.jpeg';
    checkImage(src, function() {
        elem = $('<li class="prod_img_wrapper"><img class="prod_img" src="' +
        src + '"><img class="prod_img_close"></li>');
        $('#prod_img_holder').append(elem);
        n = ite + 1
        loadImages(n);
    }, function() {
      $('#prod_btn_modify').click();
    });
  } else {
    $('#prod_btn_modify').click();
  }
}
$(function() {
  $('#newproduct').on('click', function() {
    if($('#options').hasClass('btn-primary')) {
      clearProduct();
      $('#newproduct').removeClass('btn-default').addClass('btn-primary');
      $('#options').removeClass('btn-primary').addClass('btn-default');
      $('#delete_product').hide();
      $('#prodid').hide();
    }
  })
  $('#products_holder').on('scroll', function() {
      if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight -20 && $('#editproducts').text == 'Szerkesztés') {
          loadProducts();
      }
  })
  $('#products_holder').on( 'mousewheel DOMMouseScroll', function ( e ) {
    element = $(this)[0];
    if (element.offsetHeight < element.scrollHeight ||
    element.offsetWidth < element.scrollWidth) {
      var e0 = e.originalEvent,
          delta = e0.wheelDelta || -e0.detail;

      this.scrollTop += ( delta < 0 ? 1 : -1 ) * 30;
      e.preventDefault();
    }
});
  $('#products_holder').on('click', '.product_holder', function(event) {
    console.log(event.target)
    elem = $(`<div class="spinner-wrapper" style="top: 0; left: 0; z-index: 3; width:100%; height:100%; position:absolute; display:flex; justify-content: center; align-items:center; background-color:rgba(0, 0, 0, 0.3);"><div class="spinner">
    <div class="rect1"></div>
    <div class="rect2"></div>
    <div class="rect3"></div>
    <div class="rect4"></div>
    <div class="rect5"></div>
    </div></div>`)
    $('#sidepanel').append(elem);
      self = $(this)
      $.ajax({
          url: "../productsapi/getOneProduct",
          type: "post",
          data: {
            "id" : self.data('id')
          },
          datatype: 'json',
          success: function(data){
            console.log(data)
            obj = $.parseJSON(data);
            loadProductOptions(obj)
          },
          error: function(data) {
          }
      });
  });
})
