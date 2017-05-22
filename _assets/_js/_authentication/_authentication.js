var devicekey = 00000;

$(document).ready(function(){
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showLocation)
    }

    $('#modal_response').on('hidden.bs.modal', function () {
      $('#response').html()
    })

    var options = {excludeAvailableScreenResolution: true, excludeScreenResolution: true};
    new Fingerprint2(options).get(function(result){
        devicekey = result;
        $("#dk").html(result)
        });
});

var lalo = 0

$(function () {
    $('#loginform').submit(function(event) {
      event.preventDefault();
      var e = $("#me").val()
      var p = $("#mp").val()
      sendingLoginRequest(e, p)
    })
})

function showLocation(position) {
    var latitude = position.coords.latitude
    var longitude = position.coords.longitude
    lalo = latitude + "," + longitude
    $.ajax({
        type:'POST',
        url:'Auth/getLocation',
        data: { lattitude : latitude, longitude : longitude},
        success:function(msg){
            if(msg){
                $("#location").val(msg)
            }
        }
    });
}

function sendingLoginRequest(e, p) {
  var options = {excludeAvailableScreenResolution: true, excludeScreenResolution: true};
  new Fingerprint2(options).get(function(result){
      devicekey = result;
      $.ajax({
          url: "../Auth/login",
          type: "POST",
          datatype: JSON,
          data: {
              l : true,
              d : {
                ema : e,
                passw : p,
                dk : devicekey,
                lalo : lalo
              }
          },
          success: function(result) {
            console.log(result)
              location.reload();
          }
      });
    });
}
