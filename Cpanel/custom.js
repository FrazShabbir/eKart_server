$('#previous').click(function () {
    $('#prevoius_date_th').show("slow");
});

$('#new').click(function () {
    $('#prevoius_date_th').hide("slow");
});




var alreadyAdded = [];
var totalamount = [];

$("#result").on("click", ".use-address", function () {
    var id = $(this).data('pid');
    var proname = $(this).data('proname');
    var barcode = $(this).data('barcode');
    var price = $(this).data('price');
    var total = $(this).data('total');
    var priceChange = $(this).data('pricechange');

    function getSum(total, num) {
        return total + Math.round(num);
    }
    if ($.inArray(id, alreadyAdded) !== -1) {
        alert("Product Already Added");
    } else {

        if (priceChange == 1) {
            var field = `<input type='number'
                            class='form-control curentUnitPrice`+id+`'
                            name=''
                            value='`+price+`'
                            onchange='updateUnitPrice(`+id +`)'/>`;
        } else {
            var field = price;
        }

        var $item = `<tr>
        <td>` + id + `</td>
        <td>` + barcode + `</td>
        <td>` + proname + `</td>
        <td>` + field + `</td>
        <td>
        <input type='number' class='customfield qty_value` + id +`' value='1' onchange='myfun(` + id + `)'> </td>
        <td> <input type='text' class='subtotalamount subtotal` + id + `' value='` + total + `' disabled='disabled' readonly/> </td>
        </tr>`;

        var $product_detail = `<tr>
        <td>
            <input type='hidden' name='products[]' value='` + id + `' />
            <input type='hidden' name='products_qty[]' value='1' class='customfield new_qty_value` + id + `' />
            <input type='hidden' class='qty` + id + `' name='unitprice[]' value='` + total + `' /> ` + proname + ` </td>

            <td class='total_price` + id + `'>` + total + `</td> <td class='qty` + id + `'>1</td>
        </tr>`;

        $("#productDetails").append($product_detail);
        $("#saleTable").append($item); // Outputs the answer
        $.inArray(price, alreadyAdded);
        totalamount.push(price);
        alreadyAdded.push(id);
    }
        $('#totalAmount').html(totalamount.reduce(getSum, 0));
        $('#totalAmount_field').val(totalamount.reduce(getSum, 0));
        $('#totalAmount_paidfield').val(totalamount.reduce(getSum, 0));

});

function updateBalance() {
    var lastAmount = $('#totalAmount_paidfield').val();
    $newBalace = $('#newBalance');
    $newBalace.val(lastAmount);
}



function calculation() {
    var tpqm = 0;
    $(".subtotalamount").each(function () {
        tpqm += Number($(this).val());
    });
    $('#totalAmount_field').val(tpqm);
    $('#totalAmount_paidfield').val(tpqm);
    $('#totalAmount').html(tpqm);

}

function updateUnitPrice(id) {
    var currentVal = $('.curentUnitPrice'+id).val();
    var currentQty = $('.qty_value'+id).val();
    var result = (currentVal*currentQty);
    var totalprice = $('.total_price' + id).html();
   // alert(currentVal);
   $('.total_price' + id).html(currentVal);
    $('.qty'+id).val(currentVal);
    $('.subtotal' + id).val(result);
    calculation();
}

function myfun(id) {
    var currentQty = $('.qty_value' + id).val();
    var currentUnit = $('.curentUnitPrice'+id).val();
    var Currenttotalprice = $('.subtotal' + id).val();
    var newamount = (currentQty * currentUnit);
    $('.new_qty_value' + id).val(currentQty);
    $('.qty' + id).html(currentQty);
    $('.total_price' + id).html(currentUnit);
    $('.subtotal' + id).val(newamount);
    calculation();
}
