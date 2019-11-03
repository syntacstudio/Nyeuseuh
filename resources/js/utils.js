function numToRupiah(angka)
{
	var rupiah = '';		
	var angkarev = angka.toString().split('').reverse().join('');
	for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
	return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
}
/**
 * Usage example:
 * alert(convertToRupiah(10000000)); -> "Rp. 10.000.000"
 */
 
function rupiahToNum(rupiah)
{
	return parseInt(rupiah.replace(/,.*|[^0-9]/g, ''), 10);
}

function updateTotalCart()
{
    var items = [];
    $('.qty-total').each(function(e) {
        const content = $(this).text();
        items.push(rupiahToNum(content));
    });

    var sum = items.reduce((total, amount) => total + amount);
    var sumInt = items.reduce((total, amount) => total + amount);

    if($('#pickup').is(':checked')){
        sum += 10000;
    }
    $('.total').text(numToRupiah(sum));
    $('.subtotal').text(numToRupiah(sumInt));
    $('#total-value').val(sumInt);
}

function fieldError(field, msg){
    $('#' + field).addClass('is-invalid');
    $('#' + field +'Alert').text(msg);
}

function clearFieldError(){
    $('.form-control').removeClass('is-invalid');
    $('.text-danger').text('');
}

function pushAlert(type, msg, wrapperClass){
    var html = `<div class="alert alert-${type} alert-action alert-dismissible fade show">${msg}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button></div>`;
    $('.'+wrapperClass).prepend(html);
}

function clearAlert(){
    $('.alert-action').remove();
}


exports.numToRupiah = numToRupiah;
exports.rupiahToNum = rupiahToNum;
exports.updateTotalCart = updateTotalCart;
exports.fieldError = fieldError;
exports.clearFieldError = clearFieldError;
exports.pushAlert = pushAlert;
exports.clearAlert = clearAlert;