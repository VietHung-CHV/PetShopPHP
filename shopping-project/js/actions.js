$(document).ready(function(){
    // var qty_product=1; 
    // $('.add-to-wishlist').click(function(e){
    //     e.preventDefault();
    //     var p_id = $(this).attr('data-id');
    //     $.ajax({
    //         url: 'actions.php',
    //         method: 'POST',
    //         data: {addWishlist:p_id},
    //         success: function(data){
    //             location.reload();
    //         }
    //     });
    // });



    var quty = 1;
    $('#slg1').change(function(){
        quty = $('#slg1').val();
    });
    // $('.header_cart').click(function(){
    //     $('.item-qty').val() = quty;
    // });
    
    $('.add-to-cart').click(function(e){
        var uid = $('.add-to-cart').attr('rel');
        //var slg = $('#slg1').attr('value');
        // var cf = confirm(slg);
        //var quty = 8;
        //var slg = 9;
        
        slg = quty;
        e.preventDefault();
        var p_id = $('.add-to-cart').attr('data-id');
        $.ajax({
            url: 'actions.php',
            method: 'POST',
            data: {addCart:p_id, uid:uid, sl:slg},
            success: function(data){
                // console.log(data);
                location.reload();
            }
        });
    });

    $('.remove-cart-item').click(function(e){
        var uid = $(this).attr('rel');
        var cf = confirm("Bạn thật sự muốn xóa sản phẩm này?");
        if (cf){
            e.preventDefault();
            var p_id = $(this).attr('data-id');
            $.ajax({
                url: 'actions.php',
                method: 'POST',
                data: {removeCartItem:p_id, uid:uid},
                success: function(data){
                    location.reload();
                }
            });
        }
    });


    $('.remove-wishlist-item').click(function(e){
        e.preventDefault();
        var p_id = $(this).attr('data-id');
        $.ajax({
            url: 'actions.php',
            method: 'POST',
            data: {removeWishlistItem:p_id},
            success: function(data){
                location.reload();
            }
        });
    });


    $('.proceed-to-cart').click(function(e){
        e.preventDefault();
        var goToCart = 1;
        $.ajax({
            url: 'actions.php',
            method: 'POST',
            data: {proceedCart:goToCart},
            success: function(data){
                window.location.href = 'cart.php';
            }
        });
    });



    function net_amount(){
        var amount = 0;
        $('.sub-total').each(function(){
            var val = $(this).html();
            var total = parseInt(amount) + parseInt(val);
            amount = total;
        });
        $('.total-amount').html(amount);
        
        $('.checkout-form').children('.total-price').val(amount);
    }
    net_amount();

    // $('.slg1').change(function(){
    //     var qty_product = $(this).val();
    // });

    // $('.item-qty').val() = qty_product;
    
    $('.header_cart').click(function(){
        var qty = $('.item-qty').val();
        var price = $('.item-qty').siblings('.item-price').val();
        $('.item-qty').parent().siblings().children('.sub-total').val() = (qty * price);
        // var qty = quty;
        // var qty = qqq;
        // var new_price = (qty * price);
        // $('.item-qty').parent().siblings().children('.sub-total').html(new_price);
        net_amount();
        net_qty();
    });
    $('.item-qty').change(function(){
        
        var qty = $(this).val();
        // var qty = quty;
        // var qty = qqq;
        var price = $(this).siblings('.item-price').val();
        var new_price = (qty * price);
        $(this).parent().siblings().children('.sub-total').html(new_price);
        net_amount();
        net_qty();
    });

    function net_qty(){
        var val = '';
        $('.item-qty').each(function(){
            val = (val + $(this).val()+',');
        })
        $('.checkout-form').children('.total-qty').val(val);
    }
    net_qty();


    $('#loginUser').submit(function(e){
        e.preventDefault();
        var username = $('.username').val();
        var password = $('.password').val();
        if(username == '' || password == ''){
            $('#userLogin_form .modal-body').append('<div class="alert alert-danger">Điền đầy đủ các hàng.</div>');
        }else{
            $.ajax({
                url: 'php_files/user.php',
                method: 'POST',
                data: {login:'1',username:username,password:password},
                dataType: 'json',
                success: function(response){
                    $('.alert').hide();
                    console.log(response);
                    var res = response;
                    if(res.hasOwnProperty('success')){
                        $('#userLogin_form .modal-body').append('<div class="alert alert-success">Đăng nhập thành công.</div>');
                        setTimeout(function(){ location.reload(); }, 1000);
                    }else if(res.hasOwnProperty('error')){
                        $('#userLogin_form .modal-body').append('<div class="alert alert-danger">'+res.error+'</div>');
                    }

                }
            });
        }
    });



  
    $('.user_logout').click(function(e){
        e.preventDefault();
        var user_logout = 1;
        $.ajax({
            url: 'php_files/user.php',
            method: 'POST',
            data: {user_logout:user_logout},
            success: function(response){
                if(response == 'true'){
                    location.reload();
                }
            }
        });
    });

    
    $('#register_sign_up').submit(function(e){
        e.preventDefault();
        $('.alert').hide();
        var f_name = $(".first_name").val();
        var l_name = $(".last_name").val();
        var username = $(".user_name").val();
        var password = $(".pass_word").val();
        var mobile = $(".mobile").val();
        var address = $(".address").val();
        var city = $(".city").val();

        if (f_name == '' || l_name == '' || username == '' || password == '' || mobile == '' || address == '' || city == ''){
            $('#register_sign_up').append('<div class="alert alert-danger">Điền đầy đủ các hàng</div>');
        }else{
            var formdata = new FormData(this);
            formdata.append('create','1');
            $.ajax({
            url:"php_files/user.php",
            type:"POST",
            data: formdata,
            contentType: false,
            processData: false,
            dataType: 'json',
            success:function(response){
                $('.alert').hide();
                var res = response;
                if(res.hasOwnProperty('success')){
                    $('#register_sign_up').append('<div class="alert alert-success">'+res.success+'</div>');
                    setTimeout(function(){ window.location.href = 'user_profile.php'; }, 1500);
                }else if(res.hasOwnProperty('error')){
                    $('#register_sign_up').append('<div class="alert alert-danger">'+res.error+'</div>');
                }
            }
        });
        }
    });

    $('#modify-user').submit(function(e){
        e.preventDefault();
        var f_name = $(".first_name").val();
        var l_name = $(".last_name").val();
        var mobile = $(".mobile").val();
        var address = $(".address").val();
        var city = $(".city").val();

        if (f_name == '' || l_name == '' || mobile == '' || address == '' || city == ''){
            $('#modify-user').append('<div class="alert alert-danger">Điền đầy đủ các hàng</div>');
        }else{
            var formdata = new FormData(this);
            formdata.append('update','1');
            $.ajax({
                url:"php_files/user.php",
                type:"POST",
                data: formdata,
                contentType: false,
                processData: false,
                dataType: 'json',
                success:function(response){
                    $('.alert').hide();
                    var res = response;
                    if(res.hasOwnProperty('success')){
                        $('#modify-user').append('<div class="alert alert-success">Chỉnh sửa thành công.</div>');
                        setTimeout(function(){ window.location.href = 'user_profile.php'; }, 1500);
                    }else if(res.hasOwnProperty('error')){
                        $('#modify-user').append('<div class="alert alert-danger">'+res.error+'</div>');
                    }
                    
                }
            });
        }
    });


    $('#modify-password').submit(function(e){
        e.preventDefault();
        $('.alert').hide();
        var old_pass = $(".old_pass").val();
        var new_pass = $(".new_pass").val();

        if (old_pass == '' || new_pass == ''){
            $('#modify-password').append('<div class="alert alert-danger">Điền tất cả các hàng</div>');
        }else{
            var formdata = new FormData(this);
            formdata.append('modifyPass','1');
            $.ajax({
                url:"php_files/user.php",
                type:"POST",
                data: formdata,
                contentType: false,
                processData: false,
                dataType: 'json',
                success:function(response){
                    $('.alert').hide();
                    var res = response;
                    if(res.hasOwnProperty('success')){
                        $('#modify-password').append('<div class="alert alert-success">Thay đổi mật khẩu thành công.</div>');
                        setTimeout(function(){ window.location.href = 'user_profile.php'; }, 1500);
                    }else if(res.hasOwnProperty('error')){
                        $('#modify-password').append('<div class="alert alert-danger">'+res.error+'</div>');
                    }
                    
                }
            });
        }
    });

   $('.usercancelorder').click(function(e) {
         e.preventDefault();
        var order_id = $(this).attr('data-id');
        var cf = confirm("Bạn thật sự muốn hủy đơn hàng này?");
        if (cf){
        $.ajax({
            url: './php_files/orders.php',
            method: 'POST',
            data: { cancel: order_id },
            success: function (data) {
                location.reload();
            }
        }); }
    });


});