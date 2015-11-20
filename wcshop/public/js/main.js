/*
**
** Developed by www.wowcore.com.br
**
*/

$(document).ready(function() {
    $("#login-box").find("table button").on("click", function() {
        var login_box = $("#login-box");
        var username = login_box.find("table input[name=username]").val();
        var password = login_box.find("table input[name=password]").val();
        if(username && password) {
            $.ajax({
                url: "/views/handlers/login.php",
                type: "post",
                data: {username: username, password: password},
                beforeSend: function() {
                    login_box.find("table button").html("Loading...");
                }
            }).success(function(response) {
                switch(response) {
                    case "1":
                        location.replace("/?view=panel");
                        break;
                    case "0":
                        login_box.find("#message").html("Username or Password are invalid.");
                        login_box.find("table button").html("Login");
                        break;
                }
            });
        }
        else {
            login_box.find("#message").html("Username and Password are required.");
        }
    });

    $("#logout").on("click", function(e) {
        var logout = $(this);
        $.ajax({
            url: "views/handlers/logout.php",
            beforeSend: function() {
                logout.html("Loading...");
            }
        }).success(function() {
            location.replace("/?view=logout");
        });
    });

    $("#panel-box").find(".row-item").each(function() {
        var row = $(this);
        var panel_box = $("#panel-box");
        var dp = panel_box.find("#dp");
        var message = panel_box.find("#message");
        var amount = row.find("input[name=amount]");
        var character = row.find("select[name=character]");
        var item = row.find("input[name=item]");
        var price = row.find("input[name=price]");
        var total = row.find("#total");
        var button = row.find("#buy");
        amount.on("click keyup", function() {
            if(amount.val() > 99) {
                amount.val("99");
            }
            if(amount.val() < 1) {
                amount.val("1");
            }
            var result = parseInt(price.val()) * parseInt(amount.val());
            total.text(result);
        });
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
                        dp.text(parseInt(dp.text()) - parseInt(total.text()));
                        break;
                    case "2":
                        message.html("Yout not have enough donate points.");
                        break;
                }
                button.html("Buy");
            });
        });
    });
});
