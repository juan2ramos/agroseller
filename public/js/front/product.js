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

$('#ProductInfo-body tr').on('click', function () {

    $(this).find('input').prop('checked', 'checked')
    var value = $(this).find('.price-provider').data('price');
    $('#priceUnit').data('price', value);
    $('#priceUnit val').html(value).prettynumber();
    $('#distributor val').html($(this).find('.name-provider').data('nameprovider'))
    changeTotal($('#quantity').val())
});

function changeTotal(quantity) {
    var priceUnit = $('#priceUnit').data('price'),
        total = quantity * priceUnit;
    $('#total').html(total).prettynumber();
}

$("#moreInfo").click(function() {
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