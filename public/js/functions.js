$(document).ready(function () {
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });

    $('.buy-btn').click(function () {

        var productId = parseInt($(this).attr('data-id'));
        var productName = $(this).attr('data-name');
        var productPrice = parseInt($(this).attr('data-price'));
        var productImage = $('#product-img-' + productId).attr('src');
        if (productImage == undefined)
            productImage = $('img[data-u="image"]:first').attr('src');
        var productUrl = $(this).attr('data-url');
        var productQty = $('.cart-plus-minus-box').val();
        $.ajax({
            url: '/cart',
            type: 'POST',
            data: {
                productId: productId,
                productName: productName,
                productPrice: productPrice,
                productImage: productImage,
                productUrl: productUrl,
                productQty: productQty
            },
            success: function (data) {
                console.log(data)
            },
            error: function (msg) {
                console.log(msg);
            }
        });
        displayCartTotal();
        displayCartCount();
    });

    $('#clear-cart').click(function () {
        $.ajax({
            url: '/cart',
            type: 'DELETE'
        });
        displayCartTotal();
        displayCartCount();
    });

    $('.remove-product').click(function () {
        var url = $(this).attr('data-url');
        var tr = $(this).parent().parent();
        $.ajax({
            url: url,
            type: 'DELETE',
            success: function (data) {
                if (data.success == true) {
                    tr.remove();
                } else {
                    console.log(data.message);
                }
            },
            error: function (msg) {
                console.log(msg);
            }
        });
        displayCartTotal();
        displayCartCount();
    });

    $('.input-qty').bind('change keyup mouseup', function () {
        input = $(this);
        var productId = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        $.ajax({
            url: url,
            type: 'GET',
            success: function (data) {
                var amount = parseInt(data);
                if (amount <= input.val()) {
                    input.val(parseInt(amount));
                    // inputTotalPrice.tooltip({
                    //     title: "Максимально доступное количество товара! К сожалению данный товар доступен в текущем количестве"
                    // }).tooltip('show');
                }
                else {
                    // inputTotalPrice.tooltip('destroy');
                }
            },
            error: function (msg) {
                console.log(msg);
            }
        }).always(function () {
            displayCartTotal();
            displayCartCount();
        });
    });

    $('.cart-input-qty').bind('change keyup mouseup', function () {
        input = $(this);
        var productId = $(this).attr('data-id');
        var productQty = $(this).val();
        var url = $(this).attr('data-url');
        var price = input.attr('data-price');
        var tdTotalPrice = $('tr[data-id="' + productId + '"]').find('.total-price');
        var amount = input.val();
        if (amount.match(/\D/) || amount <= 0) {
            input.val('1');
            return false;
        }
        $.ajax({
            url: url,
            type: 'GET',
            data: {
                productQty: productQty
            },
            success: function (data) {
                var qty = parseInt(data.qty);
                console.log(data);
                if (qty < input.val()) {
                    input.val(qty);
                    tdTotalPrice.html(data.productTotal + " руб.");
                } else {
                    tdTotalPrice.html(data.productTotal + " руб.");
                }
            },
            error: function (msg) {
                console.log(msg);
            }
        }).always(function () {
            displayCartTotal();
            displayCartCount();
        });
    });

    /*Управление пользователями*/
    $(document).on('click', '.delete-user', function () {
        var userId = $(this).attr('data-id');
        var tr = $('tr[data-id="' + userId + '"]');
        if (confirm('Вы действительно хотите удалить данного пользователя?')) {
            $.ajax({
                url: '/admin/user/' + userId,
                type: 'DELETE',
                data: {userId: userId},
                success: function () {
                    tr.remove();
                },
                error: function (msg) {
                    console.log(msg);
                }
            });
        }
    });

    /*Управление категориями*/

    $('.delete-category').click(function () {
        var category_id = $(this).attr('data-id');
        var tr = $('tr[data-id="' + category_id + '"]');
        if (confirm('Вы действительно хотите удалить данную категорию?')) {
            $.ajax({
                url: '/admin/category/' + category_id,
                type: 'DELETE',
                success: function () {
                    tr.remove();
                },
                error: function (msg) {
                    console.log(msg);
                }
            });
        }
    });

    /*Управление заказами*/

    $('.delete-order').click(function () {
        var order_id = $(this).attr('data-id');
        var tr = $('tr[data-id="' + order_id + '"]');
        if (confirm('Вы действительно хотите удалить данный заказ?')) {
            $.ajax({
                url: '/admin/order/' + order_id,
                type: 'DELETE',
                success: function () {
                    tr.remove();
                },
                error: function (msg) {
                    console.log(msg);
                }
            });
        }
    });

    /*Управление продуктами*/


    $(document).on('click', '.delete-product', function () {
        var product_id = $(this).attr('data-id');
        var tr = $('tr[data-id="' + product_id + '"]');
        if (confirm('Вы действительно хотите удалить данный продукт?')) {
            $.ajax({
                url: '/admin/product/' + product_id,
                type: 'DELETE',
                success: function () {
                    tr.remove();
                    console.log(tr);
                },
                error: function (msg) {
                    console.log(msg);
                }
            });
        }
    });

    /*Управление характеристиками товаров*/

    $('#btn-add-parameters').click(function () {
        var button = $(this);
        $.ajax({
            url: '/admin/product_attributes',
            type: 'GET',
            success: function (data) {
                button.after(data);
            },
            error: function (msg) {
                console.log(msg);
            }
        });
    });


    $(document).on('click', '.btn-remove-parameter', function () {
        var block = $(this).parent();
        var productId = $(this).attr('data-product-id');
        var attributeId = $(this).attr('data-attribute-id');
        if (!productId) {
            block.remove();
            return;
        }
        if (confirm('Удалить?')) {
            $.ajax({
                url: '/admin/product/' + productId + '/pav',
                type: 'DELETE',
                data: {attributeId: attributeId},
                success: function (data) {
                    block.remove();
                },
                error: function (msg) {
                    console.log(msg);
                }
            });
        }
    });


    $(document).on('click', '.btn-add-parameter', function () {
        $('#modal-add-attribute').modal();
    });

    $(document).on('click', '.btn-remove-attribute', function () {
        $('#modal-delete-attribute').modal();
    });

    $(document).on('click', '#btn-da-close', function () {
        $('#modal-delete-attribute').modal('close');
    });

    $(document).on('click', '#btn-save-attribute', function () {
        var name = $('input[name="attribute-name"]').val();
        var unit = $('input[name="unit"]').val();
        $.ajax({
            url: '/admin/product_attributes',
            type: 'POST',
            data: {name: name, unit: unit},
            success: function (param) {
                $('select[name="parameters[]"]').append('<option value="' + param.id + '">' + param.name + '(' + param.unit + ')</option>');
                $('.table-attributes').append('<tr data-id="' + param.id + '"><td>' + param.name + '</td> <td><button type="button"  data-id="' + param.id + '" class="btn btn-danger delete-attribute"><i class="fa fa-trash fa-lg"></i></button></td></tr>');
            },
            error: function (msg) {
                console.log(msg);
            }
        });
    });

    $(document).on('click', '.delete-attribute', function () {
        var id = $(this).attr('data-id');
        var tr = $('tr[data-id="' + id + '"]');
        $.ajax({
            url: '/admin/product_attributes/' + id,
            type: 'DELETE',
            success: function () {
                tr.remove();
                $('select[name="parameters[]"] option[value="' + id + '"]').remove();
            },
            error: function (msg) {
                console.log(msg);
            }
        });
    });

    /*Управление производителями*/

    $(document).on('click', '#btn-save-manufacturer', function () {
        var name = $('input[name="manufacturer-name"]').val();
        var country_id = $('select[name="manufacturer-country"]').val();
        $.ajax({
            url: '/admin/product/manufacturer',
            type: 'POST',
            data: {name: name, country_id: country_id},
            success: function (param) {
                $('select[name="manufacturer_id"]').append('<option value="' + param.id + '">' + param.name + '</option>');
                $('.table-manufacturers').append('<tr data-id="' + param.id + '"><td>' + param.name + '</td> <td><button type="button"  data-id="' + param.id + '" class="btn btn-danger delete-manufacturer"><i class="fa fa-trash fa-lg"></i></button></td></tr>');
            },
            error: function (msg) {
                console.log(msg);
            }
        });
    });


    $(document).on('click', '.delete-manufacturer', function () {
        var id = $(this).attr('data-id');
        var tr = $('tr[data-id="' + id + '"]');
        $.ajax({
            url: '/admin/product/manufacturer/' + id,
            type: 'DELETE',
            success: function () {
                tr.remove();
                $('select[name="manufacturer_id"] option[value="' + id + '"]').remove();
            },
            error: function (msg) {
                console.log(msg);
            }
        });
    });

    $('#btn-manufacturer-plus').click(function () {
        $('#modal-add-manufacturer').modal();
    });

    $('#btn-manufacturer-minus').click(function () {
        $('#modal-delete-manufacturer').modal();
    });


    $('.add-images-products').click(function () {
        var imgs = $('img');
        var images = $('.image-field');
        if (imgs.length + images.length == 11)
            return;
        var image = $('.image-field:first').clone().attr('name', 'images[]');
        $(this).after(image);
        $(this).after('<br>');
    });

    $('.delete-image').click(function () {
        var div = $(this).parent().parent().parent();
        var img = $(this).parent().prev();
        var src = img.attr('src');
        var product_id = img.attr('data-id');
        $.ajax({
            url: '/admin/product/' + product_id + '/image',
            type: 'DELETE',
            data: {src: src},
            success: function (data) {
                div.remove();
            },
            error: function (msg) {
                console.log(msg);
            }
        });
    });

    /*Поиск товаров в Админке*/

    $('button#btn-search-products').click(function () {
        var val = $('input[name="search"]').val();
        var table = $('#table-products-ajax');

        $.ajax({
            url: '/admin/product/search',
            type: 'GET',
            data: {val: val},
            beforeSend: function () {
                table.html('');
            },
            success: function (data) {
                table.append(data);
            },
            error: function (msg) {
                console.log(msg);
            }
        });
    });

    $('#form-sort select').change(function () {
        $('#form-sort').submit();
    });

    // $('#country').select2();
    // $('#region').select2();
    // $('#city').select2();
    // $('#manufacturer').select2();

    function displayCartCount() {
        $.ajax({
            url: '/cart/count',
            type: 'GET',
            success: function (data) {
                $('.baskets-counter').html(data.count);
            },
            error: function (msg) {
                console.log(msg);
            }
        });
    }

    function displayCartTotal() {
        $.ajax({
            url: '/cart/total',
            type: 'GET',
            success: function (data) {
                $('.total-cost').html(data.total + ' руб.');
            },
            error: function (msg) {
                console.log(msg);
            }
        });
    }

    displayCartTotal();
    displayCartCount();
});