$(function() {

    $("#k").click(function() {

      var options = {excludeAvailableScreenResolution: true, excludeScreenResolution: true};
      new Fingerprint2(options).get(function(result){
          devicekey = result;
          var email = $("#me").val()
          $.ajax({
              url: "/API/sendDeviceKey",
              type: "POST",
              data: {
                email: email,
                devicekey : devicekey
              },
              datatype : JSON,
              success: function(r) {
                window.location.href = "/AuthTest";
              },
              error: function(xhr, resp, text) {
              }
          });
        });


    });
})
