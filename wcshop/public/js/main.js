$(document).ready(function() {
    $("#loginForm").on("submit", function(e) {
        e.preventDefault();

        var username = $(this).find("input[name=username]").val();
        var password = $(this).find("input[name=password]").val();

        if(username && password) {
            $.ajax({
                url: "/views/handlers/login.php",
                type: "post",
                data: $(this).serialize(),
                beforeSend: function() {
                    $("#loginForm").find("button").html("<i class='fa fa-spinner fa-spin'></i>");
                }
            }).success(function(response) {
                if(response != 0) {
                    location.replace("/?view=panel");
                }
                else {
                    $("#loginForm").find("span").html("Username or Password are invalid.");
                    $("#loginForm").find("button").html("Login");
                }
            });
        }
        else {
            $(this).find("span").html("Username and Password are required.");
        }
    });

    $("#logout").on("click", function(e) {
        e.preventDefault();

        $.ajax({
            url: "views/handlers/logout.php",
            beforeSend: function() {
                $("#logout").html("<i class='fa fa-spinner fa-spin'></i>");
            }
        }).success(function() {
            location.replace("/?view=logout");
        });
    });
});
