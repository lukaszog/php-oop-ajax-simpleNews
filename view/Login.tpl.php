<div id="box">
<form class="form-signin" action="" method="post">

    <h2 class="form-signin-heading">Zaloguj się</h2><hr />

    <div id="error">
        <!-- error will be showen here ! -->
    </div>

    <div class="form-group">
        <input type="text" class="form-control" placeholder="Username" name="user_name" id="user_name" />
    </div>



    <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password" id="password" />
    </div>


    <hr />

    <div class="form-group">
        <button type="submit" class="btn btn-default" name="btn-save" id="login">
            <span class="glyphicon glyphicon-log-in"></span> &nbsp; Zaloguj
        </button>
        <div id="error"></div>
    </div>

</form>
    </div>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
    $(document).ready(function()
    {

        $('#login').click(function()
        {
            var username=$("#user_name").val();
            var password=$("#password").val();
            var dataString = 'user_name='+username+'&password='+password;
            if($.trim(username).length>0 && $.trim(password).length>0)
            {

                $.ajax({
                    type: "POST",
                    url: "ajaxLogin.php",
                    data: dataString,
                    cache: false,
                    beforeSend: function(){ $("#login").val('Lacze...');},
                    success: function(data){
                        if(data == '1')
                        {
                            console.log("cone");
                            console.log(data);
                            window.location.href = "index.php";
                        }
                        else
                        {
                            console.log(data);
                            $("#login").val('Login');
                            $("#error").html("<span style='color:#cc0000'>Błąd:</span> złe dane ");
                        }
                    }
                });

            }
            return false;
        });

    });
</script>