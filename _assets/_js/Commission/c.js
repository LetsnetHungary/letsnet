$( function() {
  $(".display__button").click(function() {

      var id = $(this).attr("id")

      a = "."+id+"_hide"
      console.log(a)

      $("."+id+"_hide").show()

      /*
      $.ajax({
          url: "../OAPI/view",
          type: "POST",
          datatype : JSON,
          data: {
              id: id
          },
          success: function(result) {
              var r = jQuery.parseJSON(result)
              prepareOrderModal(r)
          },
          error: function(xhr, resp, text) {
          }
      });
      */
  });

  $("#pluscommission").click(function() {

      var ser = $("#newitem").serialize()

      $.ajax({
          url: "../commissionapi/addCommission",
          type: "POST",
          data: $("#newitem").serialize(),
          success: function(result) {
            console.log(result)
            location.reload()
          },
          error: function(xhr, resp, text) {
          }
      });
  });

  $(".deleteitem").click(function() {
      var id = $(this).attr("id")
      console.log(id)
      $.ajax({
          url: "../commissionapi/deleteCommission",
          type: "POST",
          data: {
              id: id
          },
          success: function(result) {
            console.log(result)
            location.reload()
          },
          error: function(xhr, resp, text) {
          }
      });
  });

  $(".refreshcount").change(function() {
    var id = $(this).attr("id")
    console.log(id)
    $.ajax({
        url: "../commissionapi/refreshCount",
        type: "POST",
        data: {
            id: id,
            count : $(this).val()
        },
        success: function(result) {
          console.log(result)
          location.reload()
        },
        error: function(xhr, resp, text) {
        }
    });
  });
})
