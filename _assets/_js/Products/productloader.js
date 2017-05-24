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
$(function() {
  $('#loadproducts').on('click', function() {
    loadProducts();
  });
})
