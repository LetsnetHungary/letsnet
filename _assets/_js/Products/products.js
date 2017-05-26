function clearProduct() {
  $('#prodid').val('');
  $('#name').val('');
  $('#price').val('');
  $('#stock').attr('checked', false);
  $('#prod_category_holder > .one_category_holder').remove();
  $('#prod_label_holder').empty();
  $('#properties').empty();
  $('#image_holder > div, #image_holder > ul').remove();
  if($('#prod_btn_modify').data('type') !== 0) {
    $(this).html('Módosítás');
    $(this).data('type',0);
    $('#prod_btn_addimg').hide();
  }
  car1 = `<ul id="prod_img_holder" style="display: none;" class="prod_img_holder"></ul>`
  car2 = `<div id="prod_carousel" class="carousel prod_carousel" data-ride="carousel">
    <ol class="carousel-indicators"></ol>
    <div class="carousel-inner"></div>
    <a class="left carousel-control" href="#prod_carousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#prod_carousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>`;
  $(car1).insertBefore($('#prod_imgupload'));
  $(car2).insertBefore($('#prod_imgupload'));
  $( "#prod_img_holder" ).sortable().disableSelection();
}
$(function() {
  $('#add_product').click(function() {
    var holder = new Object();
    var product = new Object();
    product.prodid = $('#prodid').val();
    product.name = $('#name').val();
    product.price = $('#price').val();
    product.outofstock = $("#stock")[0].checked;
    categories = new Array();
    $('.one_category_holder').each(function() {
      cat = new Object();
      $(this).find('button').each(function() {
        cat[$(this).data('id')] = $(this).text();
      });
      categories.push($.extend(true, {}, cat));
    });
    product.categories = categories.slice();
    labels = new Object();
    $('#prod_label_holder').find('.selected').each(function() {
      labels[$(this).data('id')] = $(this).text();
    });
    product.labels = $.extend(true, {}, labels);
    properties = new Object();
    $('.one_property_holder').each(function() {
      prop = new Object();
      prop.name = $(this).find('p').text();
      prop.value = $(this).find('input').val();
      properties[$(this).data('id')] = $.extend(true, {}, prop);
    });
    product.properties = $.extend(true, {}, properties);
    if($('#prod_btn_modify').data('type') !== 0) {
      $('#prod_btn_addimg').hide();
      $('#prod_img_holder').hide();
      $('#prod_carousel').show();
      $('#prod_img_holder').find('li').each(function(i) {
        $('<div class="item prod_carousel_img"><img class="prod_img" src="'+$(this).find('.prod_img').attr('src')+'"> </div>').appendTo('.carousel-inner');
        $('<li data-target="#prod_carousel" data-slide-to="'+i+'"></li>').appendTo('.carousel-indicators')
        $(this).remove();
      });
    }
    images = new Array();
    $('.carousel-inner').find('.item').find('img').each(function() {
      img = new Object();
      if($(this).data('type') == 'old') {
        img.imagetype = 'old';
        img.id = $(this).attr('src');
      } else {
        t = $(this).attr('src').replace('data:','').replace(';', '||').replace(',','||').split('||');
        img.imagetype = 'new';
        img.type = t[0];
        img.encode = t[1];
        img.data = t[2];
      }
      images.push($.extend(true, {}, img));
    });
    product.images = images.slice();
    holder.product = product;
    console.log(JSON.stringify(holder))
    $.ajax({
          type        : 'POST',
          url         : '../productsapi/uploadProduct',
          data        : holder,
          encode          : true,
          success: function(result){
            console.log(result)
            console.log(result);
            clearProduct();
          },
          error: function(xhr, status, error){
          }
    })
  });
});
