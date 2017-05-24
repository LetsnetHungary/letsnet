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
          url         : '../prodapi/itemchange',
          data        : holder,
          encode          : true,
          success: function(result){
            console.log(result);
            //location.reload();
          },
          error: function(xhr, status, error){
          }
    })
  });
});
