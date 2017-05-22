$(function() {
  $(document).on('click', function(e) {
  if (typeof $(e.target).data('original-title') == 'undefined' &&
     !$(e.target).parents().is('.popover.in')) {
    $('[data-original-title]').popover('hide');
  }
});
  var c = `<div class="input-group">
      <input id="newlabel" type="text" class="form-control prop_input" placeholder="Címke">
      <button id="addnewlabel" class="btn btn-primary btn-sm image_btn">Hozzáadás<div class="ripple-wrapper"></div></button>
  </div>`;
  $('#addlabel').data('content', c);
  $('body').on('DOMNodeInserted', '.popover', function () {
    $(this).find('input').select();
  });
  $('body').on('click', '#addnewlabel', function(){
    if($('#newlabel').val() != '') {
      var elem = $('<a class="btn btn-link font-red">' +
      $('#newlabel').val() +'</a>');
      $('#prod_label_holder').append(elem);
    }
    $('#addlabel').click();
  });
  $('body').on('keypress', '#newlabel', function(e) {
    if(e.which == 13) {
        $('#addnewlabel').click();
    }
  });
  var d = `<div class="input-group">
      <input id="newproperty" type="text" class="form-control prop_input" placeholder="Tulajdonság neve">
      <button id="addnewproperty" class="btn btn-primary btn-sm image_btn">Hozzáadás<div class="ripple-wrapper"></div></button>
  </div>`;
  $('#addproperty').data('content', d);
  $('body').on('click', '#addnewproperty', function(){
    var elem;
    if($('#newproperty').val() != '') {
      var s = `<div class="one_property_holder">
        <p>`+ $('#newproperty').val() +`</p>
        <input type="text" class="form-control" id="" placeholder="`+ $('#newproperty').val() +`">
      </div>`;
      elem = $(s);
      $('#properties').append(elem);
    }
    $('#addproperty').click();
    elem.find('input').select();
  });
  $('body').on('keypress', '#newproperty', function(e) {
    if(e.which == 13) {
        $('#addnewproperty').click();
    }
  });
  var e = `<div id="popup_category" class="input-group">
      <button id="addnewcategory" class="btn btn-primary btn-sm image_btn">Kategória hozzáadása<div class="ripple-wrapper"></div></button>
      <button id="addnewgroup" class="btn btn-primary btn-sm image_btn">Kész<div class="ripple-wrapper"></div></button>
  </div>`;
  $('#addgroup').data('content', e);
  $('body').on('click', '#addnewgroup', function(){
    var group = $(`<div class="one_category_holder"></div>`);
    if($('#popup_category').find('input').length > 0) {
      $('#popup_category').find('input').each(function() {
        elem = $(`<button class="btn_cat btn ra-100 btn-default">`
        + $(this).val() +
        `<div class="ripple-wrapper"></div> <i class="glyph-icon icon-chevron-right"></i></button>`);
        group.append(elem);
      });
    }
    $('#prod_category_holder').append(group);
    $('#addgroup').click();
  });
  $('body').on('click', '#addnewcategory', function(){
    elem = $(`<input type="text"
     class="form-control cat_input prop_input" placeholder="Kategória neve">`);
     $('#addnewcategory').before(elem);
     elem.select();
  });
  $('body').on('keypress', '.cat_input', function(e) {
    if(e.which == 13) {
      $('#addnewgroup').click();
    }
  });
  $('#prod_category_holder').on('click', '.btn_cat', function(){
    if($(this).hasClass('selected')) {
      $(this).removeClass('selected');
      $(this).addClass('btn-default');
    } else {
      $(this).removeClass('btn-default');
      $(this).addClass('selected');
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
});
