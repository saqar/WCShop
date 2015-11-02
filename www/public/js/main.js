$(document).ready(function() {
    $("#loginForm").submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: "/views/functions/login.php",
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
                $("#loginForm").find("span").html("Usuário ou Senha inválidos.");
                $("#loginForm").find("button").html("Login");
            }
        });
    });

    $("#loginForm").find("span").click(function() {
        $(this).hide();
    })
});
