var sitekey = ''
function shakeChildren(parent) {
  parent.children().addClass('shaking');
}
function unshakeChildren(parent) {
  parent.children().removeClass('shaking')
}
function sendOrder() {
  products = new Array();
  $('#products_holder > .product_holder').each(function() {
    products.push($(this).data('id'))
  })
  $.ajax({
        url: "../productsapi/position",
        type: "post",
        data: {
          "products" : products,
          "category" : $("#products_holder").data('id')
        },
        datatype: 'json',
        success: function(data){
          console.log(data)
        },
        error: function(data) {
        }
    });
}
$(function() {
    $.ajax({
      url: "../userapi/getSitekey",
      type: "post",
      datatype: 'json',
      success: function(data){
        obj = $.parseJSON(data);
        sitekey = obj['sitekey']
      },
      error: function(data) {
      }
  });
  $('#products_holder').sortable({
    tolerance: "pointer"
  });
  $('#products_holder').sortable('disable')
  $('#products_holder').data('edit',false);
  $('#editproducts').click(function() {
    if($('#products_holder').data('edit')) {
      unshakeChildren($('#products_holder'));
      $('#editproducts').text('Szerkesztés');
      $('#products_holder').data('edit',false);
      $( "#products_holder" ).sortable('disable').enableSelection();
      sendOrder();
    } else {
      shakeChildren($('#products_holder'));
      $('#editproducts').text('Kész');
      $('#products_holder').data('edit',true);
      $( "#products_holder" ).sortable('enable').disableSelection();
    }
  });
})