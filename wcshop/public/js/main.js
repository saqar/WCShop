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

    $("#panel-box").find("table input[name=amount]").on("click keyup", function() {
        if($(this).val() > 99) {
            $(this).val("99");
        }
        if($(this).val() < 1) {
            $(this).val("1");
        }

        var price = parseInt($("#panel-box").find("table #price").text());
        var amount = parseInt($(this).val());

        $("#panel-box").find("table #total").text(price * amount);
    });

    $("#panel-box").find("#buy").on("click", function() {
        var amount = $("#panel-box").find("table input[name=amount]").val();
        var character = $("#panel-box").find("table select[name=character]").val();
        var item = $("#panel-box").find("table input[name=item]").val();
        var price = $("#panel-box").find("table input[name=price]").val();
        var dp = parseInt($("#panel-box").find("#dp").text());
        var total = parseInt($("#panel-box").find("#total").text());

        $.ajax({
            url: "views/handlers/purchase.php",
            type: "post",
            data: {amount: amount, character: character, item: item, price: price},
            beforeSend: function() {
                $("#panel-box").find("#buy").html("Loading...");
            }
        }).success(function(response) {
            switch(response) {
                case "0":
                    $("#panel-box").find("#message").html("Internal error, try again later.");
                    break;
                case "1":
                    $("#panel-box").find("#message").html("Purchase successful, check your mail in game!");
                    break;
                case "2":
                    $("#panel-box").find("#message").html("Yout not have enough donate points.");
                    break;
            }
            $("#panel-box").find("#buy").html("Buy");
            $("#panel-box").find("#dp").text(dp - total);
        });
    })
});
