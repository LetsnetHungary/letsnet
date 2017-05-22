//
//        VÁLTOZÓK
//

var updatejsoncount = 0
var images = new Object();
var ic = 0;
var numsections = 2;
var sections = new Array();
var sectionschanged = new Array();
var sectiontypes = new Array();
var updatejson = new Object();

//
//        FÜGGVÉNYEK
//

function checksectionchanged(name){
  id = -1;
  for(s=0; s < sections.length; s++){
    if(sections[s].section_name == name){
      id = s;
    }
  }
  return id;
}

function itemchanged(elem) {
  var id = $(elem).closest('.cms-section-default').data('id');
  $('.cms-save-default').each(function() {
    if($(this).data('section-id') == id) $(this).removeAttr('disabled');
  });
}

function parseString(s, elem) {
  if(s.includes('$(elem).')) {
    var functs = s.split('.');
    var $curr = elem;
    for(i = 1; i < functs.length; i++){
        var fname = functs[i].split('\(')[0];
        var args = functs[i].split('\(')[1].split('\)')[0].replace("\'","").replace("\'","");
        if(args != '') { $curr = $curr[fname](args); }
        else { $curr = $curr[fname](); }
    }
    return $curr;
  } else {
    return s;
  }
}

function parseObj(o, elem) {
  for(property in o){
    if(o.hasOwnProperty(property)){
      o[property] = parse(o[property], elem);
    }
  }
  return o;
}

function parseArr(a, elem){
  for(i = 0; i<a.length; i++) {
    a[i] = parse(a[i],elem);
  }
  return a;
}

function parse(o, elem){
  if(typeof o == 'string'){
    return parseString(o,elem);
  } else if(typeof o == 'object') {
    return parseObj(o,elem);
  } else if(typeof o == 'array') {
    return parseArr(o,elem);
  } else if(typeof o == 'function') {
    return o(elem);
  } else {
    return o;
  }
}

//
//        ONLOAD
//

$(window).load(function() {
    $.fn.serializeObject = function()
    {
        var o = {};
        var a = this.serializeArray();
        $.each(a, function() {
            if (o[this.name] !== undefined) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };
    $.fn.storeimage = function( options ) {
        var settings = $.extend({
            images: images,
            previewid: ''
        }, options );
        this.change(function() {
           file = this.files[0];
           var reader = new FileReader();
           reader.onloadend = function () {
               var result = reader.result;
               if($('#' + settings.previewid).data('pos') != undefined){
                 //settings.images.splice($('#' + settings.previewid).data('pos'),1);
                 $('#' + settings.previewid).data('pos',undefined);
               }
               $('#' + settings.previewid).attr('src', result);
               var _split = result.replace(':','||').replace(';','||').replace(',','||').split('||');
               var type = _split[1];
               var encode = _split[2];
               var data = _split[3];
               var img = new Object();
               img.type = type;
               img.encode  = encode;
               img.data = data;
               $('#' + settings.previewid).data('pos',ic);
               settings.images[ic] = $.extend(true, {},img);
               ic += 1;
           }
           if (file) {
               reader.readAsDataURL(file);
           } else {
               $('#' + settings.previewid).attr('src', '');
           }
        });
    };
    $.fn.cmssave = function( options ){
      var settings = $.extend({}, options );
        this.click(function(){
          $(this).prop("disabled", true);
          index = $(this).data('section-id');
          if(settings.sections[index].type == 'itemset'){
            if(!settings.sections[index].hasOwnProperty('itemnew')){
              settings.sections[index].itemnew = new Object();
            }
            if(!settings.sections[index].hasOwnProperty('itemold')){
              settings.sections[index].itemold = new Object();
            }
            var itemset = new Object();
            var items = new Array();
            $('#' + settings.sections[index].container).find('li').each(function(i,elem) {
              var img = new Object();
              if($(elem).data('pos') != undefined) {
                var itemnew  = $.extend(true, {}, settings.sections[index].itemnew);
                var loc = $(elem).data('pos');
                itemnew.itemtype = "new";
                itemnew.position = i + 1;
                console.log(loc)
                img.type = images[loc].type;
                img.encode = images[loc].encode;
                img.data = images[loc].data;
                itemnew.image = img;
                itemnew = parse(itemnew, $(elem));
                items.push($.extend(true, {},itemnew));
                itemnew = {};
              } else {
                var itemold  = $.extend(true, {}, settings.sections[index].itemold);
                itemold.itemtype = "old";
                itemold.position = i + 1;
                itemold.prodid = $(elem).find('img').attr('imageid');
                itemold = parse(itemold, $(elem));
                items.push($.extend(true, {},itemold));
                itemold = {};
              }
            });
            itemset.type = "itemset";
            itemset.view = $("#section"+$(this).data('section-id')).data('view');
            itemset.section_name = $("#section"+$(this).data('section-id')).data('section')
            itemset.records = items;
            secid = checksectionchanged($("#section"+$(this).data('section-id')).data('section'));
            if(secid == -1) {
              sections.push($.extend(true, {},itemset))
            } else {
              sections[secid] = $.extend(true, {},itemset);
            }
            itemset = {};
            updatejsoncount += 1
          }
          else if (settings.sections[index].type == 'text') {
            if(!settings.sections[index].hasOwnProperty('text')){
              settings.sections[index].text = new Object();
            }
            var text  = $.extend(true, {}, settings.sections[index].text);
            $form = $(this).closest('form.cms-form-default')
            text.type = "text"
            text.view = $("#section"+$(this).data('section-id')).data('view')
            text.section_name = $("#section"+$(this).data('section-id')).data('section')
            text.record = $form.serializeObject()
            secid = checksectionchanged($("#section"+$(this).data('section-id')).data('section'));
            if(secid == -1) {
              sections.push($.extend(true, {},text))
            } else {
              sections[secid] = $.extend(true, {},text);
            }
            text = {};
            updatejsoncount += 1
          }
          else if (settings.sections[index].type == 'imageset') {
            var imageset = new Object();
            var slides = new Array();
            $('#' + settings.sections[index].container).find('li').each(function(i,elem) {
              if(!settings.sections[index].hasOwnProperty('imagenew')){
                settings.sections[index].imagenew = new Object();
              }
              if(!settings.sections[index].hasOwnProperty('imageold')){
                settings.sections[index].imageold = new Object();
              }
              if($(elem).data('pos') != undefined) {
                var imagenew  = $.extend(true, {}, settings.sections[index].imagenew);
                var loc = $(elem).data('pos');
                imagenew.imgtype = "new";
                imagenew.position = i + 1;
                console.log($(elem))
                imagenew.type = images[loc].type;
                imagenew.encode = images[loc].encode;
                imagenew.data = images[loc].data;
                imagenew = parse(imagenew, $(elem));
                slides.push($.extend(true, {},imagenew));
                imagenew = {};
              } else {
                var imageold  = $.extend(true, {}, settings.sections[index].imageold);
                imageold.imgtype = "old";
                imageold.image_id = $(elem).find('img').attr('imageid');
                imageold.position = i + 1;
                imageold.type = $(elem).find('img').attr('src').split('.')[1];
                imageold = parse(imageold, $(elem));
                slides.push($.extend(true, {},imageold));
                imageold = {};
              }
            });
            imageset.type = "imageset";
            imageset.view = $("#section"+$(this).data('section-id')).data('view');
            imageset.section_name = $("#section"+$(this).data('section-id')).data('section')
            imageset.records = slides;
            secid = checksectionchanged($("#section"+$(this).data('section-id')).data('section'));
            if(secid == -1) {
              sections.push($.extend(true, {},imageset))
            } else {
              sections[secid] = $.extend(true, {},imageset);
            }
            imageset = {};
            updatejsoncount += 1
          }
        });
    };
    $('.cms-section-default').each(function() {
      sectionschanged.push(false);
      sectiontypes.push($(this).data('type'));
    });
    $('.cms-save-default').prop("disabled", true);
    $('input.cms-item-default, textarea.cms-item-default, select.cms-item-default').keydown(function() {
      itemchanged($(this))
    }).change(function() {
      itemchanged($(this))
    });
    $('button.cms-item-default').click(function() {
      itemchanged($(this))
    });
    $('.cms-upload-default').click(function() {
      updatejson.sections = sections;
      sections = "";
      console.log(updatejson);
      $.ajax({
            type        : 'POST',
            url         : '../../CMSAPI/sections',
            data        : updatejson,
            encode          : true,
            success: function(result){
              console.log(result);
              location.reload();
            },
            error: function(xhr, status, error){
            }
      })
    });
    $('.btn-remove').click(function() {
      if($(this).parent().data('pos') != undefined){
        images[$(this).parent().data('pos')] = undefined;
      }
      $(this).parent().remove();
      $('#slide-menu-default').find('li').each(function(i, elem){
          $(elem).find('input').val(i+1);
      });
    });
});
