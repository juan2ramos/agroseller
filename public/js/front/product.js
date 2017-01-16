$('.Shopping').on('click', function () {
    $('.YouCart').addClass('show');
    $('.YouCart-content').addClass('show');
});
$('.YouCart-closed  ').on('click', function () {
    $('.YouCart').removeClass('show');
    $('.YouCart-content').removeClass('show');
});

/************************ CONTADOR **************************/

var dateGlobal;
function getTime() {
    now = new Date();
    promo = new Date(dateGlobal["year"], dateGlobal["month"], dateGlobal["day"], dateGlobal["hour"], dateGlobal["minute"], 59);
    substraction = promo - now;

    if (substraction > 0) {
        days = Math.floor(substraction / 1000 / 60 / 60 / 24);
        hours = Math.floor(substraction / 1000 / 60 / 60 - (24 * days));
        minutes = Math.floor(substraction / 1000 / 60 - (24 * 60 * days) - (60 * hours));
        seconds = Math.floor(substraction / 1000 - (24 * 60 * 60 * days) - (60 * 60 * hours) - (60 * minutes));

        $('#dayNumber').html((zero(days)) + '<span> Dias </span>');
        $('#hourNumber').html(zero(hours) + '<span>:</span>');
        $('#minNumber').html(zero(minutes) + '<span>:</span>');
        $('#secNumber').html(zero(seconds));

        newtime = window.setTimeout("getTime();", 1000);
    }

    else {
        $('.timer').css('display', 'none');
    }
}

function zero(data) {
    if (data < 10)
        return '0' + data;
    return data;
}

function parse(str) {
    if (!/^(\d){8}$/.test(str)) return "invalid date";
    var y = str.substr(0, 4),
        m = str.substr(4, 2),
        d = str.substr(6, 2);
    return new Date(y, m, d);
}

function countDown(date) {
    date['month'] -= 1;

    if (date['hour'] == undefined) {
        date['hour'] = 23;
    }
    if (date['minute'] == undefined) {
        date['minute'] = 59;
    }

    dateGlobal = date;
}

/*
 window.setTimeout("getTime();", 1000);
 */


$('#quantity').on('change keyup', function () {

    changeTotal($(this).val())
});
$('#quantity').on('keyup', function () {
    if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g, '');


});
$('#quantity').on('focusout', function () {

    var min = $(this).data('min'),
        max = $(this).data('max');
    if (this.value < min) {
        this.value = min
    }
    if (this.value > max) {
        this.value = max
    }

    changeTotal($('#quantity').val())

});
$('#ProductInfo-body tr').on('click', function () {

    $(this).find('input').prop('checked', 'checked')
    var value = $(this).find('.price-provider').data('price');
    var min = $(this).find('.min-provider').data('min');
    var max = $(this).find('.max-provider').data('max');
    var $quantity = $('#quantity');

    $('#priceUnit').data('price', value);
    $('#priceUnit val').html(value).prettynumber();
    $('#distributor val').html($(this).find('.name-provider').data('nameprovider'));
    $('#distributor').data('distributor', $(this).find('.idprovider').data('idprovider'));
    $('#distributor').data('product_provider', $(this).find('.idprovider').data('product_provider'))

    $(this).find('.idprovider').data('product_provider');

    $quantity.data('min', min);
    $quantity.data('max', max);


    if ($quantity.val() < $quantity.data('min')) {
        $quantity.val(min)

    } else {

        if ($quantity.val() > $quantity.data('max')) {

            console.log('val' + $quantity.val());
            console.log('min' + $quantity.data('min'));
            console.log('max' + $quantity.data('max'));
            $quantity.val(max);
        }
        ;
    }

    changeTotal($quantity.val())
});


$("#shipping").on('click', function () {
    calculateShipping();

});
function calculateShipping() {

    $('#loadingShipping').show().css('display', 'flex');
    var data = {
        'api_token': 'xWN8axpBFvULbFNUcxT9ghBxkGHjxYAqGEpDkKdpCmuJDlNIZdz48rH4tkQs',
        'valor': $('#total').text(),
        'id_ciudad_origen': $('#originCity').val(),
        'id_ciudad_destino': $('#destinationCity').val(),
        'peso_fisico': $('#weightProduct').val(),
        'packing[largo]': '10',
        'packing[ancho]': '20',
        'packing[cantidad]': '20',
        'packing[alto]': '2',
        'cantidad':  $('#quantity').val(),
    }
    var url = "https://104.236.238.126/api/shipping"
    $.ajax({
        url: url,
        data: data,
        type: 'POST',

    }).done(function (data) {
        if (data.success)
            $('#shippingValue').text(formatNumber(data.price.precio));
    }).fail(function (jqXHR, textStatus, errorThrown) {
        alert('Error!!');
    }).always(function () {
        $('#loadingShipping').hide();
    });
}
function formatNumber(num) {
    return "$" + num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
}
function changeTotal(quantity) {
    var priceUnit = $('#priceUnit').data('price'),
        total = quantity * priceUnit;
    $('#total').html(total).prettynumber();
}

$("#moreInfo").click(function () {
    $('html, body').animate({
        scrollTop: $("#description").offset().top
    }, 400);
});


(function ($) {
    $.fn.prettynumber = function (options) {
        var opts = $.extend({}, $.fn.prettynumber.defaults, options);
        return this.each(function () {
            $this = $(this);
            var o = $.meta ? $.extend({}, opts, $this.data()) : opts;
            var str = $this.html();
            $this.html($this.html().toString().replace(new RegExp("(^\\d{" + ($this.html().toString().length % 3 || -1) + "})(?=\\d{3})"), "$1" + o.delimiter).replace(/(\d{3})(?=\d)/g, "$1" + o.delimiter));
        });
    };
    $.fn.prettynumber.defaults = {
        delimiter: '.'
    };
})(jQuery);