$(function() {
  function createCategory(name, subcats) {
    maincat = $(`
      <div class="btn-group cat_button">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">`
        + name + `<span class="caret"></span><div class="ripple-wrapper"></div></button>
        <ul class="dropdown-menu" role="menu">
        </ul>
      </div>
    `);
    for (var id in subcats) {
      listelem = '<li data-id="' +
      id + '"><a href="#">' + subcats[id] +'</a></li>';
      maincat.find('ul').append(listelem);
    }
    $('#cat_btn_holder').append(maincat);
  }
  $('#cat_btn_holder').on('click', 'a', function(e) {
    var self = $(this);
    $.ajax({
        url: "../categoryapi/getCategories",
        type: "post",
        data: {
          "id" : self.data('id')
        },
        datatype: 'json',
        success: function(data){
          obj = $.parseJSON(data);
          createCategory(obj.name, obj.subcats);
        }
    });
  });

});
