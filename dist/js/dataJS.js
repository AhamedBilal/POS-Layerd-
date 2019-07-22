function item(code, name, qty, price) {
    this.code=code;
    this.name=name;
    this.qty=qty;
    this.price=price;
}
var items=[
    new item("I001","Item-01",40,12.00),
    new item("I002","Item-01",50,60.00),
    new item("I003","Item-01",20,5.00),
    new item("I004","Item-01",10,45.00),
    new item("I005","Item-01",13,70.00),
    new item("I006","Item-01",30,120.00)
];
var customers = [
    "C001",
    "C002",
    "C003",
    "C004",
    "C005",
    "C006",
    "C007",
    "C008",
];
$(document).ready(function () {
    for (var i = 0; i < items.length; i++) {
        $("#item").append("<option>"+items[i].code+"</option>");
    }
    for (var i = 0; i < items.length; i++) {
        $("#cid").append("<option>"+customers[i]+"</option>");
    }

    $("#item").change(function () {
        var x = $(this).val();
        for (var i = 0; i < items.length; i++) {
            if (items[i].code== x){
                $('#itemName').val(items[i].name);
                $('#avi_qty').val(items[i].qty);
                $('#price').val(items[i].price);
            }
        }
    });

    $("#addToCart").click(function () {
        if ($("#avi_qty").val()!="" && $("#qty").val()!="" && Number.parseInt($("#avi_qty").val())>Number.parseInt($("#qty").val())) {
            var bol=false;
            var row;
            var newQ=Number.parseInt($("#qty").val());
            $("tbody tr").each(function () {
                if ($(this).find("td:first").text()== $("#item").val()){
                    bol=true;
                    row=$(this);
                    return;
                }

            });
            var i;
            for (i = 0; i < items.length; i++) {
                if (items[i].code == $("#item").val()) {
                    items[i].qty-=newQ;
                    $("#avi_qty").val(items[i].qty);
                }
            }
            if (bol){
                var old =Number.parseInt($(row).find("td:eq(2)").text());

                $(row).find("td:eq(2)").text(newQ+old);
            } else {
                $("table tbody").append(
                    "<tr>" +
                    "<td>" + $("#item").val() + "</td>" +
                    "<td>" + $("#itemName").val() + "</td>" +
                    "<td>" + $("#qty").val() + "</td>" +
                    "<td>" + $("#price").val() + "</td>" +
                    "<td><button class='btn btn-danger' type='button' id='remove_btn' onclick='deleteOrderRow(this)'><i class=\"fas fa-trash-alt\"></i></button></td>" +
                    "</tr>"
                );
            }
            countTotal();
        }else {
            alert("More than Avilable Qontity")
        }

    });

    $("#discount").change(function () {
        var dis = Number.parseFloat($(this).val());
        var tot = Number.parseFloat($("#total").val());
        var x= tot*(1-dis*0.01);
        if (!isNaN(x)) {
            $("#sub-total").val(x);
        }
    });
    $("#paid-amount").change(function () {
        var x = Number.parseFloat($(this).val());
        var y = Number.parseFloat($("#sub-total").val());
        if (x>y && !isNaN(x)) {
            $("#balance").val(x - y);
        }else {
            alert("invalid paid amount");
        }
    });

    $("#confrm").click(function () {
            if ($("#oid").val() == "" && $('#cid').val() == "Choose Customer..." && $("#paid-amount").val() == "") {
                alert("incomplete form");
            } else {
                alert("Sucsess");
                document.location.reload();
            }
        }
    );
});

function deleteOrderRow(x) {
    for (var i = 0; i < items.length; i++) {
        if (items[i].code==$(x).parents("tr").find("td:eq(0)").text()){
            items[i].qty+=Number.parseInt($(x).parents("tr").find("td:eq(02)").text())
            $('#item option:first').click();
        }
    }
    $(x).parents("tr").remove();
    $("#sub-total").val("");
    $("#paid-amount").val("");
    $("#balance").val("");
    countTotal();

}

function countTotal() {
    var tot=0;
    $("tbody tr").each(function () {
        var qty = Number.parseInt($(this).find("td:eq(2)").text());
        var  price =Number.parseInt($(this).find("td:eq(3)").text());

        tot+=qty*price;
    });
    $("#total").val(tot);
    if ($("#discount").val() == "") {
        $("#sub-total").val(tot);
    }else {
        var dis = Number.parseFloat($("#discount").val());
        var x= tot*(1-dis*0.01);
        $("#sub-total").val(x);
    }
    if ($("#sub-total").val()!=""){
        $("#paid-amount").removeAttr('disabled');
    } else {
        $("#paid-amount").prop('disabled',true);
    }
}
$("#order_form").submit(false);