function loadProducts() {
  numloaded = $('#products_holder > .product_holder').length;
  $.ajax({
      url: "../productsapi/getProductsByCategory",
      type: "post",
      data: {
        "id" : $('#products_holder').data('id'),
        'position' : numloaded + 1
      },
      datatype: 'json',
      success: function(data){
        obj = $.parseJSON(data);
        addProducts(obj)
      },
      error: function(data) {
      }
  });
}
function addProducts(obj) {
  $.each(obj.products, function(index, product){
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
  (obj.available == 1) ? $('#stock').attr('checked', false) : $('#stock').attr('checked', true);
  for(i = 0; i < obj.categories.length; i++) {
    cat = obj.categories[i].split('=>');
    var group = $(`<div class="one_category_holder"><img class="prod_img_close"></div>`);
    num = 0;
    for(j = 1; j < cat.length; j++) {

    }
  }
  for(key in obj.labels) {
    var elem = $('<div class="label_holder"><img style="display:none" class="prod_img_close"><a data-id="' +
    key + '" class="btn selected font-red">' +
    obj.labels[key] +'</a></div>');
    $('#prod_label_holder').append(elem);
  }
  for(key in obj.properties) {
    var s = `<li class="one_property_holder">
    <img class="prod_img_close">
      <p>`+ key +`</p>
      <input type="text" class="form-control added_prop_input" id="" placeholder="`
      + obj.properties[key] +`"> </li>`;
    elem = $(s);
    $('#properties').append(elem);
  }
}
$(function() {
  $('#loadproducts').on('click', function() {
    loadProducts();
  });
  $('.product_holder').on('click', function() {
    self = $(this)
    $.ajax({
        url: "../productsapi/getOneProduct",
        type: "post",
        data: {
          "id" : self.data('id'),
        },
        datatype: 'json',
        success: function(data){
          obj = $.parseJSON(data);
          loadProductOptions(obj)
        },
        error: function(data) {
        }
    });
  });
})
