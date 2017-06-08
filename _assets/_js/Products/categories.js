$(function() {
  $('#allproducts').hide();
  function createCategory(name, subcats) {
    maincat = $(`
      <div class="btn-group cat_button">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">`
        + '---' + `<span class="caret"></span><div class="ripple-wrapper"></div></button>
        <ul class="dropdown-menu" role="menu">
        </ul>
      </div>
    `);
    num = 0
    for (id in subcats) {
      listelem = '<li data-id="' +
      id + '"><a>' + subcats[id] +'</a></li>';
      maincat.find('ul').append(listelem);
      num += 1
    }
    if(num > 0) {
      $('#cat_btn_holder').append(maincat);
    }
      loadProducts();
  }
  $('#allproducts').click(function() {
    $('#products_holder').data('id', 'all');
    $('#cat_btn_holder').find('.btn-group').each(function(index, elem) {
      if(index > 1) {
        $(this).remove();
      } if(index == 1) {
        $(this).find('button').text('Minden termék')
      }
    });
    $('#products_holder > .product_holder').remove();
    loadProducts();
    $('#allproducts').hide();
  });
  $('#cat_btn_holder').on('click', 'li', function(e) {
    self = $(this);
    self.parent().siblings('button').text(self.text());
    console.log(self.parent().siblings('button'));
    ind = self.parent().parent().index();
    console.log(ind)
    $('#products_holder').data('id', self.data('id'));
    if(self.data('id') != 'all') {
      $('#allproducts').show();
    }
    $('#cat_btn_holder').find('.btn-group').each(function(index, elem) {
      if(index > ind-1) {
        $(this).remove();
      }
    });
    elem = $(`<div class="spinnerholder btn-group"><div class="spinner">
  <div class="rect1"></div>
  <div class="rect2"></div>
  <div class="rect3"></div>
  <div class="rect4"></div>
  <div class="rect5"></div>
</div></div>`)
    $('#cat_btn_holder').append(elem);
    $.ajax({
        url: "../categoryapi/getCategory",
        type: "post",
        data: {
          "id" : self.data('id')
        },
        datatype: 'json',
        success: function(data){
          console.log(data)
          $('#cat_btn_holder .spinnerholder').remove();
          obj = $.parseJSON(data);
          createCategory(obj.name, obj.subcats);
          $('#products_holder > .product_holder').remove();
        },
        error: function(data) {
          console.log(data)
        }
    });
  });

});
