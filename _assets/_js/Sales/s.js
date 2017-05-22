$( function() {
  $(".addStock").change(function() {

      var prod_id = $(this).data("prodid")
      var c = $(this).val()

      $.ajax({
          url: "../sellsapi/addStock",
          type: "POST",
          datatype : JSON,
          data: {
              prod_id: prod_id,
              count : c
          },
          success: function(result) {
            console.log(result)
            location.reload()
          },
          error: function(xhr, resp, text) {
          }
      });
  });

  $(".addFriendlySold").change(function() {
    var prod_id = $(this).data("prodid")
    var c = $(this).val()

    $.ajax({
        url: "../sellsapi/addFriendlySold",
        type: "POST",
        datatype : JSON,
        data: {
            prod_id: prod_id,
            count : c
        },
        success: function(result) {
          console.log(result)
          location.reload()
        },
        error: function(xhr, resp, text) {
        }
    });
  });

  $(".addWebshopStock").change(function() {

      var prod_id = $(this).data("prodid")
      var c = $(this).val()

      $.ajax({
          url: "../sellsapi/addWebshopStock",
          type: "POST",
          datatype : JSON,
          data: {
              prod_id: prod_id,
              count : c
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
