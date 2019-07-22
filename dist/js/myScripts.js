var row;

function addRow() {
    var trCode="";
    $("input").each(function (e) {
        trCode+="<td>"+$(this).val()+"</td>";
    });
    $('table tbody').append("<tr>"+trCode+"</tr>");
    clearAll();
}
function clearAll() {
    $("input").each(function (e) {
        $(this).val("");
    })
}
function displayRow(x) {
    var cols=$(x).children("td");
    var i=0;
    $("input").each(function (e) {
        $(this).val($(cols[i]).text());
        i++;
    });
}
function cancelFunc() {
    $("#update").hide();
    $("#cancel").hide();
    $("#delete").hide();
    $("#add").show();
}
$('#cancel').click(function () {
    cancelFunc();
});

function deleteRow(row) {
    $(row).remove();
    cancelFunc();
}
function updateRow() {
    var data=[
        $('#custID').val(),
        $('#name').val(),
        $('#inputAddress').val(),
        $('#email').val(),
        $('#tel').val()
    ];
    console.log(data[0]);
    for (var i = 0; i < 5; i++) {
        $(row).find("td:eq("+i+")").text(data [i]);
    }
}
$("table tr").click(function () {
    row=$(this);
    $("#update").show();
    $("#cancel").show();
    $("#delete").show();
    $("#add").hide();
    displayRow(row);
});

