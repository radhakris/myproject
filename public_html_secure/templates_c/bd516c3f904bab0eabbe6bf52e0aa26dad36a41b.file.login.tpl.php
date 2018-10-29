<?php /* Smarty version Smarty-3.1.12, created on 2018-09-12 12:50:41
         compiled from "/var/www/html/header_promo/public_html_secure/templates/web/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11791327975b98be491d9640-95263666%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd516c3f904bab0eabbe6bf52e0aa26dad36a41b' => 
    array (
      0 => '/var/www/html/header_promo/public_html_secure/templates/web/login.tpl',
      1 => 1536736501,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11791327975b98be491d9640-95263666',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5b98be491e4b83_68756283',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b98be491e4b83_68756283')) {function content_5b98be491e4b83_68756283($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="">
  <!--<link rel="shortcut icon" href="img/favicon.png">-->

  <?php echo $_smarty_tpl->getSubTemplate ("css-version-for-admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
<?php echo $_smarty_tpl->getSubTemplate ("js-version-for-admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


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
  
</html>
<?php }} ?>