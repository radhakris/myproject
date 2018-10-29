<?php /* Smarty version Smarty-3.1.12, created on 2018-08-13 15:51:06
         compiled from "/home/shorthu4/public_html_secure/templates/web/register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2550070725b71a8ea792827-83293341%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a5e7cf4c9982ca22655a2adb95bbd9f0718d7306' => 
    array (
      0 => '/home/shorthu4/public_html_secure/templates/web/register.tpl',
      1 => 1534173005,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2550070725b71a8ea792827-83293341',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5b71a8ea7bcee6_34616923',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b71a8ea7bcee6_34616923')) {function content_5b71a8ea7bcee6_34616923($_smarty_tpl) {?><!DOCTYPE html>
<!-- 
Version: 3.4
Author: Janareddy
Website: http://www.education.in/
Contact: support@education.in
Follow: www.twitter.com/education.in
Like: www.facebook.com/education.in
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<head>
  <meta charset="utf-8">
  <title>Education</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta property="og:site_name" content="-CUSTOMER VALUE-">
  <meta property="og:title" content="-CUSTOMER VALUE-">
  <meta property="og:description" content="-CUSTOMER VALUE-">
  <meta property="og:type" content="website">
  <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
  <meta property="og:url" content="-CUSTOMER VALUE-">
  <?php echo $_smarty_tpl->getSubTemplate ("commonstyles.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</head>

<style>
.register {
    margin: auto;
    width: 50%;
    border: 2px solid #d5d5d5;
    padding: 10px;
    margin-bottom: 20px
}
fieldset {
    border: thin solid #ccc; 
    border-radius: 4px;
    padding: 20px;
    padding-left: 40px;
    background: #fbfbfb;
}
legend {
   color: #678;
}
.form-control {
    width: 95%;
}
label small {
    color: #678 !important;
}
span.req {
    color:maroon;
    font-size: 112%;
}
</style>
<script>
    function checkPass()
{
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    var message = document.getElementById('confirmMessage');
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    if(pass1.value == pass2.value){
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match"
    }else{
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
    }
} 
function validatephone(phone) 
{
    var maintainplus = '';
    var numval = phone.value
    if ( numval.charAt(0)=='+' )
    {
        var maintainplus = '';
    }
    curphonevar = numval.replace(/[\\A-Za-z!"£$%^&\,*+_={};:'@#~,.Š\/<>?|`¬\]\[]/g,'');
    phone.value = maintainplus + curphonevar;
    var maintainplus = '';
    phone.focus;
}
// validates text only
function Validate(txt) {
    txt.value = txt.value.replace(/[^a-zA-Z-'\n\r.]+/g, '');
}
// validate email
function email_validate(email)
{
var regMail = /^([_a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;

    if(regMail.test(email) == false)
    {
    document.getElementById("status").innerHTML    = "<span class='warning'>Email address is not valid yet.</span>";
    }
    else
    {
    document.getElementById("status").innerHTML	= "<span class='valid'>Thanks, you have entered a valid Email address!</span>";	
    }
}


</script>

<body class="corporate">
   
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div class="main">
      <div class="container">
            <div class="row">
                <div class="register">
                    <form action="" method="post" id="regform" role="form">
                    <fieldset><legend class="text-center">Valid information is required to register. <span class="req"><small> required *</small></span></legend>
                     <div class="form-group"> 	 
                        <label for="firstname"><span class="req">* </span> First name: </label>
                            <input class="form-control" type="text" name="firstname" id = "fnametxt" onkeyup = "Validate(this)" placeholder="First Name" required /> 
                                <div id="errFirst"></div>    
                    </div>
        
                    <div class="form-group">
                        <label for="lastname"><span class="req">* </span> Last name: </label> 
                            <input class="form-control" type="text" name="lastname" id = "lnametxt" onkeyup = "Validate(this)" placeholder="Last Name" required />  
                                <div id="errLast"></div>
                    </div>
                
                    <div class="form-group">
                    <label for="phonenumber"><span class="req">* </span> Phone Number: </label>
                            <input required type="text" name="phonenumber" id="phone" class="form-control phone" maxlength="28" onkeyup="validatephone(this);" placeholder="not used for marketing"/> 
                    </div>
        
                    <div class="form-group">
                        <label for="email"><span class="req">* </span> Email Address: </label> 
                            <input class="form-control" required type="text" name="email" id = "email"  onchange="email_validate(this.value);" />   
                                <div class="status" id="status"></div>
                    </div>
        
                    <div class="form-group">
                        <label for="password"><span class="req">* </span> Password: </label>
                            <input required name="password" type="password" class="form-control inputpass" minlength="4" maxlength="16"  id="pass1" /> </p>
        
                        <label for="password"><span class="req">* </span> Password Confirm: </label>
                            <input required name="password" type="password" class="form-control inputpass" minlength="4" maxlength="16" placeholder="Enter again to validate"  id="pass2" onkeyup="checkPass(); return false;" />
                                <span id="confirmMessage" class="confirmMessage"></span>
                    </div>
        
                   <!-- <div class="form-group">
                    
                        
                        <hr>
        
                        <input type="checkbox" required name="terms" onchange="this.setCustomValidity(validity.valueMissing ? 'Please indicate that you accept the Terms and Conditions' : '');" id="field_terms">   <label for="terms">I agree with the <a href="terms.php" title="You may read our terms and conditions by clicking on this link">terms and conditions</a> for Registration.</label><span class="req">* </span>
                    </div>-->
        
                    <div class="form-group">
                        <input class="btn btn-success" type="button" onclick="validateForm()" name="submit_reg" id="submit_reg" value="Register">
                        <div id="responcestatus"></div>
                    </div>
                              <h5>You will receive an email to complete the registration and validation process. </h5>
                              <h5>Be sure to check your spam folders. </h5>
         
        
                    </fieldset>
                    </form>
        
        <!--<script type="text/javascript">
          document.getElementById("field_terms").setCustomValidity("Please indicate that you accept the Terms and Conditions");
        </script>-->
                </div>
           
                   
        
            </div>
        </div>
    </div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  
  <script>
    function validateForm()
    {
        if($("#fnametxt").val()==''){
            $("#fnametxt").focus();
            return false;
        }
        if($("#lnametxt").val()==''){
            $("#lnametxt").focus();
            return false;
        }
        if($("#phone").val()==''){
            $("#phone").focus();
            return false;
        }
        if($("#pass1").val()==''){
            $("#pass1").focus();
            return false;
        }
        if($("#pass2").val()==''){
            $("#pass2").focus();
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
        if($("#pass1").val() != $("#pass2").val()){
            $("#confirmMessage").html("Password and Conform password not matched..");
            $("#pass2").val('');
            return false;
        }
        $("#submit_reg").prop('value', 'Please Wait');
        $('#submit_reg').prop('disabled', true);
        $.ajax({
            type: "POST",
            url: "ad-controller.php?module=register-user",
            beforeSend: function(xhr){xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");},
            data: $("#regform input").serialize(),
            success: function(result) {
                var res = result.split(":");
                $("#responcestatus").text(res[1]);
            },
            error: function(result) {
                
            }
        });
    }
    
  </script>
  
    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>

<?php }} ?>