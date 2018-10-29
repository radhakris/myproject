<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="">
  <!--<link rel="shortcut icon" href="img/favicon.png">-->

  {include file="css-version-for-admin.tpl"}
</head>

<body class="login-img3-body">

  <div class="container">

    <form class="login-form" action="" method="post" id="regform" role="form">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" class="form-control" placeholder="Username" autofocus name="email" id = "email" value="admin@aahar.com">
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" placeholder="Password" id="pass1" name="password" value="admin123">
        </div>
       
        <button class="btn btn-primary btn-lg btn-block" type="button" onclick="validateForm()">Login</button>
        <div id="responcestatus"></div>
      </div>
    </form>
  </div>



</body>
{include file="js-version-for-admin.tpl"}
{literal}
  <script>
    function validateForm()
    {
        if($("#pass1").val()==''){
            $("#pass1").focus();
            return false;
        }
        if($("#email").val()==''){
            $("#email").focus();
            return false;
        }else{
            var email=$("#email").val();
            var regMail = /^([_a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;
            if(regMail.test(email) == false)
            {
            document.getElementById("status").innerHTML    = "<span class='warning'>Email address is not valid yet...</span>";
            $("#email").focus();
            return false;
            }
        }
        //$("#submit_log").prop('value', 'Please Wait');
        //$('#submit_log').prop('disabled', true);
        $.ajax({
            type: "POST",
            url: "/scripts/ad-controller.php?module=adminpanel-login",
            beforeSend: function(xhr){xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");},
            data: $("#regform input").serialize(),
            success: function(result) {
                var res = result.split(":");
                $("#responcestatus").text(res[1]);
                if(res[0]==1){
                  var cdomain=window.location.host;
                  cdomain='http://'+cdomain+"/admin-dashboard";
                  window.location.href=cdomain;
                }
            },
            error: function(result) {
                
            }
        });
    }
    
  </script>
  {/literal}
</html>
