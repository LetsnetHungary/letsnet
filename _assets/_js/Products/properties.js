$(function() {
  $(document).on('click', function(e) {
  if (typeof $(e.target).data('original-title') == 'undefined' &&
     !$(e.target).parents().is('.popover.in')) {
    $('[data-original-title]').popover('hide');
  }
});
  var c = `<div>
      <input id="newlabel" type="text" class="form-control prop_input" placeholder="Címke">
      <button id="addnewlabel" class="btn btn-primary btn-sm image_btn">Hozzáadás<div class="ripple-wrapper"></div></button>
  </div>`;
  $('#addlabel').data('content', c);
  $('body').on('DOMNodeInserted', '.popover', function () {
    $(this).find('input').select();
  });
  $('body').on('click', '#addnewlabel', function(){
    if($('#newlabel').val() != '') {
      var elem = $('<a class="btn selected font-red">' +
      $('#newlabel').val() +'</a>');
      $('#prod_label_holder').append(elem);
    }
    $('#addlabel').click();
  });
  $('body').on('keyup', '#newlabel', function(e) {
    if(e.which == 13) {
        $('#addnewlabel').click();
    }
  });
  var d = `<div>
      <input id="newproperty" type="text" class="form-control prop_input" placeholder="Tulajdonság neve">
      <button id="addnewproperty" class="btn btn-primary btn-sm image_btn">Hozzáadás<div class="ripple-wrapper"></div></button>
  </div>`;
  $('#addproperty').data('content', d);
  $('body').on('click', '#addnewproperty', function(){
    var elem;
    if($('#newproperty').val() != '') {
      var s = `<li class="one_property_holder">
        <img class="prod_img_close">
        <p>`+ $('#newproperty').val() +`</p>
        <input type="text" class="form-control added_prop_input" id="" placeholder="`+ $('#newproperty').val() +`">
      </li>`;
      elem = $(s);
      $('#properties').append(elem);
    }
    $('#addproperty').click();
    elem.find('input').select();
  });
  $('body').on('keyup', '#newproperty', function(e) {
    if(e.which == 13) {
        $('#addnewproperty').click();
    }
  });
  var e = `<div id="popup_category">
      <button id="addnewcategory" class="btn btn-primary btn-sm image_btn">Kategória hozzáadása<div class="ripple-wrapper"></div></button>
      <button id="addnewgroup" class="btn btn-primary btn-sm image_btn">Kész<div class="ripple-wrapper"></div></button>
  </div>`;
  $('#addgroup').data('content', e);
  $('body').on('click', '#addnewgroup', function(){
    var group = $(`<div class="one_category_holder"></div>`);
    num = 0;
    $('#popup_category').find('input').each(function() {
      if($(this).val().length > 0) {
        elem = $(`<button class="btn_cat btn ra-100 btn-default">`
        + $(this).val() +
        `<div class="ripple-wrapper"></div> <i class="glyph-icon icon-chevron-right"></i></button>`);
        group.append(elem);
        num += 1;
      }
    });
    if(num > 0) {
      $('#prod_category_holder').append(group);
    }
    $('#addgroup').click();
  });
  $('body').on('click', '#addnewcategory', function(){
    elem = $(`<input type="text"
     class="form-control cat_input prop_input" placeholder="Kategória neve">`);
     $('#addnewcategory').before(elem);
     elem.select();
  });
  $('body').on('keyup', '.cat_input', function(e) {
    if(e.which == 13) {
      $('#addnewgroup').click();
    }
  });

  $('#prod_label_holder').on('click', 'a', function(){
    if($(this).hasClass('selected')) {
      $(this).removeClass('selected');
      $(this).addClass('btn-link');
    } else {
      $(this).removeClass('btn-link');
      $(this).addClass('selected');
    }
  });
  $( "#properties" ).sortable().disableSelection();
  $('body').on('keyup', '.added_prop_input', function(e) {
    if(e.which == 13 && $(this).val() !== '') {
      $('#addproperty').click();
    }
  });
});
