function createSideCategory(name, subcats, id) {
  maincat = $(`
    <div data-id="` + id
    + `" class="sidecat_button dropdown">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">`
                    + name +`<span class="caret"></span><div class="ripple-wrapper"></div></button>
                    <ul id="mainsidecatlist" class="dropdown-menu sidecatlist" role="menu">
                    </ul>
                  </div>
  `);
  for (id in subcats) {
    listelem = '<li class="catli" data-id="' +
    id + '"><a>' + subcats[id] +'</a></li>';
    maincat.find('ul').append(listelem);
  }
  maincat.find('ul').append($('<li class="add_sidecat_li"><a style="font-weight: 800;">Új hozzáadása</a></li>'));
  $('#sidecat_btn_holder').append(maincat);
  maincat.find('li').eq(0).click();
}
function createEmptySideCategory(id) {
  maincat = $(`
    <div data-id="` + id
    + `" class="sidecat_button dropdown">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">---<span class="caret"></span><div class="ripple-wrapper"></div></button>
                    <ul id="mainsidecatlist" class="dropdown-menu sidecatlist" role="menu">
                    </ul>
                  </div>
  `);
  maincat.find('ul').append($('<li class="add_sidecat_li"><a style="font-weight: 800;">Új hozzáadása</a></li>'));
  $('#sidecat_btn_holder').append(maincat);
}
function generateID() {
  S4 = function() {
       return (((1+Math.random())*0x10000)|0).toString(32).substring(1);
    };
    return (S4()+S4()+S4());
}

$(function() {
  $(document).on('click', function(e) {
  if (typeof $(e.target).data('original-title') == 'undefined' &&
     !$(e.target).parents().is('.popover.in')) {
    $('[data-original-title]').popover('hide');
  }
});
  c = `<div>
      <input id="newlabel" type="text" class="form-control prop_input" placeholder="Címke">
      <button id="addnewlabel" class="btn btn-primary btn-sm image_btn">Hozzáadás<div class="ripple-wrapper"></div></button>
  </div>`;
  $('#addlabel').data('content', c);
  $('body').on('DOMNodeInserted', '.popover', function () {
    $(this).find('input').select();
  });
  $('body').on('click', '#addnewlabel', function(){
    if($('#newlabel').val() != '') {
      elem = $('<div class="label_holder"><img style="display:none" class="prod_img_close"><a data-id="' +
      generateID() + '" class="btn selected font-red">' +
      $('#newlabel').val() +'</a></div>');
      $('#prod_label_holder').append(elem);
    }
    $('#addlabel').click();
  });
  $('#editlabels').click(function() {
    if($(this).data('type') == 0) {
      $(this).data('type', 1);
      $(this).html('kész');
      $('#prod_label_holder').find('div > img').show();
    } else {
      $(this).data('type', 0);
      $(this).html('címkék törlése');
      $('#prod_label_holder').find('div > img').hide();
    }
  });
  $('body').on('keyup', '#newlabel', function(e) {
    if(e.which == 13) {
        $('#addnewlabel').click();
    }
  });
  d = `<div>
      <input id="newproperty" type="text" class="form-control prop_input" placeholder="Tulajdonság neve">
      <button id="addnewproperty" class="btn btn-primary btn-sm image_btn">Hozzáadás<div class="ripple-wrapper"></div></button>
  </div>`;
  $('#addproperty').data('content', d);
  $('body').on('click', '#addnewproperty', function(){
    elem;
    if($('#newproperty').val() != '') {
      s = `<li class="one_property_holder" data-id="`
      + generateID() +`">
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
  f = `<div id="popup_category"><div id="sidecat_btn_holder" class="sidecategory_btn_holder">
                  <div data-id="all" class="sidecat_button dropdown">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Összes termék<span class="caret"></span><div class="ripple-wrapper"></div></button>
                    <ul id="mainsidecatlist" class="dropdown-menu sidecatlist" role="menu">
                    </ul>
                  </div>
                </div>
                <input type="text"
     style="display: none;" class="form-control sidecat_input prop_input" placeholder="Kategória neve">
      <button id="addnewcategory" class="btn btn-primary image_btn">Kategória hozzáadása<div class="ripple-wrapper"></div></button>
      <button id="addnewgroup" style="margin: 5px 0 0 0;" class="btn btn-primary image_btn">Kész<div class="ripple-wrapper"></div></button>
                </div> `;
  e = $(f);
  $('#maincatlist').find('li').each(function() {
    self = $(this);
    e.find('#mainsidecatlist').append(self.clone().addClass('catli'));
  });
  e.find('#mainsidecatlist').append($('<li class="add_sidecat_li"><a style="font-weight: 800;">Új hozzáadása</a></li>'));
  $('body').on('click', '.sidecatlist > .catli', function() {
    self = $(this);
    self.parent().siblings('button').text(self.text());
    ind = self.parent().parent().index();
    $('#sidecat_btn_holder').find('.sidecat_button').each(function(index, elem) {
      if(index > ind) {
        $(this).remove();
      }
    });
    elem = $(`<div class="sidespinnerholder"><div class="spinner">
  <div class="rect1"></div>
  <div class="rect2"></div>
  <div class="rect3"></div>
  <div class="rect4"></div>
  <div class="rect5"></div>
</div></div>`)
    $('#sidecat_btn_holder').append(elem);
    $.ajax({
        url: "../categoryapi/getCategory",
        type: "post",
        data: {
          "id" : self.data('id')
        },
        datatype: 'json',
        success: function(data){
            $('#sidecat_btn_holder').find('.sidespinnerholder').remove();
          if(data[0] == '<' || data.indexOf('"name":null') !== -1) {
            createEmptySideCategory(self.data('id'));
          } else {
            obj = $.parseJSON(data);
            createSideCategory(obj.name, obj.subcats, self.data('id'));
          }
        },
        error: function(data) {
          console.log(data)
        }
    });
  });
  dom = e[0];
  $('#addgroup').data('content', dom);
  e = {};
  $('body').on('click', '.sidecatlist > .add_sidecat_li', function() {
    self = $(this);
    $('#addnewcategory').show();
    $('.sidecat_input').css('display','block').data('parent',self.parent());
    $('.sidecat_input').select();
  });
  $('body').on('click', '#addnewgroup', function(){
    group = $(`<div class="one_category_holder"><img class="prod_img_close"></div>`);
    num = 0;
    name = "Minden termék";
    $('#popup_category').find('.sidecat_button').each(function(index, value) {
        elem = $(`<button data-id="`
        + $(this).data('id') + `" class="btn_cat btn ra-100 btn-default">`
        + name +
        `<div class="ripple-wrapper"></div> <i class="glyph-icon icon-chevron-right"></i></button>`);
        group.append(elem);
        name = $(this).find('button').text();
        num += 1;
    });
    if(num > 0) {
      $('#prod_category_holder').append(group);
    }
    $('#addgroup').click();
  });
  $('body').on('click', '#addnewcategory', function(){
    listelem = '<li class="catli" data-id="' +
    generateID() + '"><a>' + $('.sidecat_input').val() +'</a></li>';
    $(listelem).insertBefore($('.sidecat_input').data('parent').find('.add_sidecat_li')).click();
    $('.sidecat_input').css('display', 'none');
    $('#addnewcategory').hide();
    $('.sidecat_input').val('');
  });
  $('body').on('keyup', '.sidecat_input', function(e) {
    if(e.which == 13) {
      $('#addnewcategory').click();
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
