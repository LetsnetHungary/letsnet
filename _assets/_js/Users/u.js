$(function() {

  $("#newuser").click(function() {

    var firstname = $("#nufirstname").val();
    var lastname = $("#nulastname").val();
    var birth = $("#nubirth").val();
    var email = $("#nuemail").val();
    var password = $("#nupassword").val();
    var sitekey = $(".nusitekey").val()
    var database = $(".nudb").val();
    var status = $(".nustatus").val();
    var allow = $(".nuallow").val();
    var modules = $(".numodules").val();


    $.ajax({
        url: "/usersapi/newuser",
        type: "POST",
        data: {
          data : {
            firstname : firstname,
            lastname : lastname,
            birth : birth,
            email : email,
            password : password,
            sitekey : sitekey,
            database : database,
            status : status,
            allow : allow,
            modules : modules
          }
        },
        success: function(result) {
            console.log(result)
            //location.reload()
        },
        error: function(xhr, resp, text) {
        }
    });

  });

  $("#newdevicekey").click(function() {

    var email = $(".newdevicekeyemailselect").val();
    var devicekey = $("#newdevicenameinput").val();
    var devicename = $("#newdevicekeyinput").val();

    $.ajax({
        url: "usersapi/newDevicekey",
        type: "POST",
        data: {
          data : {
            email : email,
            devicekey : devicekey,
            devicename : devicename
          }
        },
        datatype : JSON,
        success: function(result) {
            console.log(result)
            //location.reload()
        },
        error: function(xhr, resp, text) {
        }
    });
  });

  $("#newdatabase").click(function() {

    var key = $("#newdatabasekeyinput").val();
    var value = $("#newdatabasevalueinput").val();

    $.ajax({
        url: "usersapi/newDatabase",
        type: "POST",
        data: {
          data : {
            key : key,
            value : value
          }
        },
        datatype : JSON,
        success: function(result) {
            console.log(result)
            //location.reload()
        },
        error: function(xhr, resp, text) {
        }
    });
  });

  $("#newsite").click(function() {

    var key = $("#newsitekeyinput").val();
    var value = $("#newsitevalueinput").val();

    $.ajax({
        url: "usersapi/newSite",
        type: "POST",
        data: {
          data : {
            key : key,
            value : value
          }
        },
        datatype : JSON,
        success: function(result) {
            console.log(result)
            //location.reload()
        },
        error: function(xhr, resp, text) {
        }
    });
  });

  $("#usermodulesconfig").click(function() {

    var email = $(".usermodulesconfigemailselect").val();
    var modules = $(".usermodulesconfigmodulesselect").val();

    $.ajax({
        url: "usersapi/usermodulesconfig",
        type: "POST",
        data: {
          data : {
            email : email,
            modules : modules
          }
        },
        datatype : JSON,
        success: function(result) {
            console.log(result)
            //location.reload()
        },
        error: function(xhr, resp, text) {
        }
    });
  });

})
