
$(window).load(function() {
  $('.cms-save-default').cmssave({
    sections: [
      {
        type: 'itemset',
        container: 'shopcontainer-default',
        itemnew: {
          prodid: "$(elem).data('prodid')",
          properties: {
            name: "$(elem).find('h4').text()",
            category: "$(elem).data('category')",
            price: "$(elem).find('h1').text()",
            coll: "$(elem).data('coll')",
            anyag: "$(elem).data('anyag')",
            leiras: "$(elem).data('leiras')",
            meret: "$(elem).data('meret')",
            javaslat: "$(elem).data('javaslat')"
          }
        }
      }
    ]
  });
  $('.cms-imageupload-default').storeimage({
    previewid: 'preview-img'
  });
  $('#add-item').click(function() {
    if ($('#preview-img').attr('src') != '') {
      $('.cms-imageupload-default').val('');
      $('#shopcontainer-default').append($('<li class="shop-item-default" data-coll = "' + $('#additem-coll-default').val()  + '" data-anyag = "' + $('#additem-anyag-default').val()  + '" data-leiras = "' + $('#additem-leiras-default').val()  + '" data-meret = "' + $('#additem-meret-default').val()  + '" data-javaslat = "' + $('#additem-javaslat-default').val()  + '"  data-prodid = "' + $('#additem-prodid-default').val()  + '" data-category="' + $('#additem-category-default').val() + '" data-pos="' + (ic-1) + '"> <div class="product_item" itemid="" prodid = ""><div class="product_item_img_cont"><img src="' + $('#preview-img').attr('src') + '" class="product_item_img" /></div><h4>' + $('#additem-name-default').val() + '</h4><div class="product_item_overlay"><h1>' + $('#additem-price-default').val() + '</h1><hr class="hidden-xs hidden-sm hidden-md"/></div></div></li>'))
      $('#preview-img').attr('src','');
      $('.btn-remove').click(function() {
        if($(this).parent().data('pos') != undefined){
          images[$(this).parent().data('pos')] = undefined;
        }
        $(this).parent().remove();
      });
      $('#additem-name-default').val('')
      $('#additem-price-default').val('')
      $('#additem-category-default').val('')
      $('#additem-prodid-default').val('')
    }
  })
  $('#shopcontainer-default').sortable({
    placeholder: "shopplaceholder-default",
    items: "li",
    update: function( event, ui ) {
      itemchanged($(this))
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
