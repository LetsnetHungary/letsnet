function loadProducts() {
  numloaded = $('#products_holder > .product_holder').length;
  console.log('position: ' + numloaded)
  console.log('id: ' + $('#products_holder').data('id'))
  $.ajax({
      url: "../productsapi/getProductsByCategory",
      type: "post",
      data: {
        "id" : $('#products_holder').data('id'),
        'position' : numloaded + 1
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
          <img class="product_image" src="_cms/graphed/_img/Products/`
          + product.prod_id +`/1.jpg" alt="">
        </div>
        <div class="p_text_holder">
          <span>` + product.prod_name + `</span>
        </div>
    </div>`;
    $('#products_holder').append($(m));
  });
}
function loadProductOptions(opj) {
  clearProduct();
  $('#prodid').val(obj.prod_id);
  $('#name').val(obj.prod_name);
  $('#price').val(obj.prod_price);
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
    elem = $('<div class="label_holder"><img style="display:none" class="prod_img_close"><a data-id="' +
    key + '" class="btn selected font-red">' +
    obj.labels[key] +'</a></div>');
    $('#prod_label_holder').append(elem);
  }
  for(key in obj.properties) {
    s = `<li class="one_property_holder">
    <img class="prod_img_close">
      <p>`+ key +`</p>
      <input type="text" class="form-control added_prop_input" id="" placeholder="`
      + obj.properties[key] +`"> </li>`;
    elem = $(s);
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
}
function loadImages(ite) {
  console.log(ite)
    src = '_cms/graphed/_img/Products/' + obj.prod_id + '/' + ite + '.jpeg';
    checkImage(src, function() {
        elem = $('<li class="prod_img_wrapper"><img data-type="old" class="prod_img" src="' +
        src + '"><img class="prod_img_close"></li>');
        $('#prod_img_holder').append(elem);
        n = ite + 1
        loadImages(n);
        console.log('valid:' + src)
    }, function() {
      console.log('invalid: ' + src)
      $('#prod_btn_modify').click();
    });
}
$(function() {
  $('#loadproducts').on('click', function() {
    loadProducts();
  });
  $('#products_holder').on('click', '.product_holder', function() {
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
