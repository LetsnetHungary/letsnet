$(function() {

    $(".orderView").click(function() {

        var id = $(this).attr("data-id")
        $.ajax({
            url: "../ordersapi/viewOrder",
            type: "POST",
            data: {
              id: id
            },
            datatype : JSON,
            success: function(result) {
              console.log(result)
              var r = jQuery.parseJSON(result)
              prepareOrderModal(r)
            },
            error: function(xhr, resp, text) {
            }
        });
    });

    $(".order_function").click(function() {
        var id = $("#order_info_holder").attr("data-id")
        var state = $(this).attr("data-state")
        $.ajax({
            url: "ordersapi/setState",
            type: "POST",
            data: {
                id: id,
                state: state
            },
            success: function(result) {
              console.log(result)
              location.reload()
            },
            error: function(xhr, resp, text) {
            }
        });
    });

    $("#order_delete").click(function() {
        var id = $("#order_info_holder").attr("data-id")
        $.ajax({
            url: "ordersapi/notVisible",
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
})

function prepareOrderModal(data) {

    $(".modal-title").html(data.datee)
    $("#vname").html(data.name)

    var cart = jQuery.parseJSON(data.cart)
    /*
    $("#vorder").empty()
    $.each(cart,function(index, value){
        $("#vorder").append(value.prod_name +" ("+value.count+") <br><br>")
    });
*/
   // $("#vorder").html(data.cart)
    $("#vemail").html("<a href='mailto:"+data.email+"'>"+data.email+"</a>")
    $("#vphone").html("<a href='tel:"+data.phone+"'>"+data.phone+ "</a>")
    var type = data.type
    $("#vtype").html(data.type)

    if(type == "Pick Pack Pont" || type == "pickpack")
    {
        var p = jQuery.parseJSON(data.pickpackdata)
        $("#vpickpackmegye").html(p.county)
        $("#vpickpackvaros").html(p.city)
        $("#vpickpackcim").html(p.address)
        $("#vpickpackbolt").html(p.shopName)
        $("#vpickpackkod").html(p.zipCode)
        $("#vpickpackboltkod").html(p.shopCode)
        $("#vpickpackdata").show();
    }
    else
    {
        $("#vpickpackdata").hide();
    }


    var afa = data.afa
    if(afa == 0)
    {
        $("#vafa").html("Nincs")
        $("#vafadata").hide();
    }
    else if(afa == 1)
    {
        $("#vafadata").show();
        $("#vafa").html("Van")
        $("#vafaname").html(data.afaname)
        $("#vafaadress").html(data.afaaddress)
    }

//vásárlás állapota
    var state = data.state
    if(state == 0)
    {
        $("#vstate").html("Regisztrálva")
    }
    else if(state == 1)
    {
        $("#vstate").html("Kiszállítás alatt")
    }
    else if(state == 2)
    {
        $("#vstate").html("Kiszállítva")
    }

    var price = 0
    $("#orders").empty()
    $.each(cart,function(index, value){
        $("#orders").append("<span class=\"little\" id = 'o'>"+value.prod_name +" ("+value.count + "db) " + value.price * 1000+" FT / db    <br>"+"</span>")
        price += value.count * value.price * 1000
    });
    $("#orders").append("<span class=\"little\" id = 'o2'>Összesen: "  + price + "</span>")

    $("#order_info_holder").attr("data-id", data.id)
    $("#order_info_holder").attr("data-state", data.state)

    $("#ordermodal").modal("show");
}
