/*
**
** Developed by www.wowcore.com.br
**
*/

$(document).ready(function() {
    $("#login-box").find("table button").on("click", function(e) {
        var username = $("#login-box").find("table input[name=username]").val();
        var password = $("#login-box").find("table input[name=password]").val();

        if(username && password) {
            $.ajax({
                url: "/views/handlers/login.php",
                type: "post",
                data: {username: username, password: password},
                beforeSend: function() {
                    $("#login-box").find("table button").html("Loading...");
                }
            }).success(function(response) {
                switch(response) {
                    case "1":
                        location.replace("/?view=panel");
                        break;
                    case "0":
                        $("#login-box").find("#message").html("Username or Password are invalid.");
                        $("#login-box").find("table button").html("Login");
                        break;
                }
            });
        }
        else {
            $("#login-box").find("#message").html("Username and Password are required.");
        }
    });

    $("#logout").on("click", function(e) {
        $.ajax({
            url: "views/handlers/logout.php",
            beforeSend: function() {
                $("#logout").html("Loading...");
            }
        }).success(function() {
            location.replace("/?view=logout");
        });
    });

    $("#panel-box .row-item").each(function() {
        var price = $(this).find("#price");
        var total = $(this).find("#total");
        var amount = $(this).find("input[name=amount]");
        amount.on("click keyup", function() {
            if(amount.val() > 99) {
                amount.val("99");
            }
            if(amount.val() < 1) {
                amount.val("1");
            }
            var result = parseInt(price.text()) * parseInt(amount.val());
            total.text(result);
        });
    });

    $("#panel-box .row-item").each(function() {
        var dp = $("#panel-box").find("#dp");
        var message = $("#panel-box").find("#message");
        var amount = $(this).find("input[name=amount]");
        var character = $(this).find("select[name=character]");
        var item = $(this).find("input[name=item]");
        var price = $(this).find("input[name=price]");
        var total = $(this).find("#total");
        var button = $(this).find("#buy");
        button.on("click", function() {
            $.ajax({
                url: "views/handlers/purchase.php",
                type: "post",
                data: {amount: amount.val(), character: character.val(), item: item.val(), price: price.val()},
                beforeSend: function() {
                    button.html("Loading...");
                }
            }).success(function(response) {
                switch(response) {
                    case "0":
                        message.html("Internal error, try again later.");
                        break;
                    case "1":
                        message.html("Purchase successful, check your mail in game!");
                        break;
                    case "2":
                        message.html("Yout not have enough donate points.");
                        break;
                }
                button.html("Buy");
                if(parseInt(dp.text()) >= parseInt(total.text())) {
                    dp.text(parseInt(dp.text()) - parseInt(total.text()));
                }
            });
        });
    });
});
