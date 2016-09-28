        $(document).ready(function () {

            $('.MessagePlatform-close').on('click', function () {
                $('.MessagePlatform').hide();
            });
            $('#Menu').on('click', function () {
                $('#MenuContainer').addClass('Show');
                $('body').scrollTop(0);
                $('body').css('overflow', 'hidden')
            });

            $('#CartButton').on('click', function () {
                $('#CartContainer').addClass('Show');
                $('body').scrollTop(0);
                $('body').css('overflow-y', 'hidden')
            });


            $('.LightBoxContent-close').on('click', function () {
                $('.LightBoxContent').removeClass('Show');
                $('body').css('overflow-y', 'scroll')
            });


            var $name = $('.Checkout-form input, .Form-Control input, .Form-Control textarea');

            $name.focus(function () {
                $(this).parent('label').addClass('open');
            }).blur(function () {
                if ($.trim($(this).val()) == "") {
                    $(this).parent('label').removeClass('open');
                }
            });
            $name.each(function () {
                if ($(this).val()) {
                    $(this).parent('label').addClass('open');
                }
            });

        /*
            $name.autocomplete()
            var $message = $("[class*='-message']");
            $message.on('click', function () {
                $(this).addClass('hidden').slideUp(600);
            });*/
        });

        /************************* Buscador Front ****************************/
        function autoSearch() {
            var param = {
                'search': $('#template-icon-left').val(),
                '_token': $('#principalToken').val()
            };

            $.ajax({
                url: $('#searchRoute').val(),
                type: 'POST',
                dataType: 'json',
                data: param,
                success: function (datos) {
                    console.log(datos.products);
                    var products = datos.products;
                    var data = [];
                    for (var i = 0; i < products.length; i++) {
                        data.push({name: products[i]['name'], type: "air", icon: "http://lorempixel.com/100/50/transport/2"});
                    }
                    var xdatos = {name: products[0]['name'], type: "air", icon: "http://lorempixel.com/100/50/transport/2"};

                    console.log(data);
                    var options = {
                        data: xdatos,

                        getValue: "name",

                        template: {
                            type: "iconLeft",
                            fields: {
                                iconSrc: "icon"
                            }
                        }
                    };

                    $("#template-icon-left").easyAutocomplete(options);
                }
            });
        }

        function thousand(n) {
            return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

