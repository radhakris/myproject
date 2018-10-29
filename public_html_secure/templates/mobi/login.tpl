<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Healthy Aahar</title>
    <!-- Bootstrap core CSS -->
    {include file="css-version-for-user.tpl"}
    {literal}
      <style>
        .m_login_notice{
          background: #fa3e3e;
          color:#fff;
          padding: 8px;
          display: none;
        }
        .err_border{
          border: 1px solid #fa3e3e;
        }
      </style>
    {/literal}
<body>
     <div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
         <!--header starts-->
         {include file="user-header.tpl"}
         <div class="page-wrapper">
            <div class="breadcrumb">
               <div class="container">
                  <ul>
                     <li><a href="/" class="active">Home</a></li>
                     <li>Profile</li>
                  </ul>
               </div>
            </div>
            <section class="contact-page inner-page">
               <div class="container">
                  <div class="row">
                     <!-- REGISTER -->
                     <div class="col-md-8">
                        <div class="widget">
                           <div class="widget-body">
                              <div class="m_login_notice" data-sigil="m_login_notice"></div>
                              <form name="login_from" id="login_from" method="POST">
                                 <div class="row">
                                    <div class="form-group col-sm-6" id="email_div">
                                       <label for="exampleInputEmail1">User Name</label>
                                       <input class="form-control" type="text" name="login_email" value="" placeholder="Username / Email id" id="login_email"> 
                                    </div>
                                    
                                    <div class="form-group col-sm-6" id="password_div">
                                       <label for="exampleInputPassword1">Password</label>
                                       <input type="password" class="form-control" name="login_password" id="login_password" placeholder="Password"> 
                                    </div>
                                    <small class="form-text text-muted" id="status_msg" style="color:#f30;"></small>
                                    <div class="form-group col-sm-6">
                                       <label for="forgot_password"><a href="javascript:void(0);">Forgot password</a></label>
                                    </div>
                                    
                                 </div>
                                 <!-- <div class="row">
                                    <div class="form-group col-sm-6">
                                       <div class="btn-group" data-toggle="buttons">
                                          <label class="btn btn-secondary">
                                          <input type="radio" name="options" id="option1" checked> Business </label>
                                          <label class="btn btn-secondary">
                                          <input type="radio" name="options" id="option2"> Customer </label>
                                       </div>
                                    </div>
                                 </div> -->
                                 <div class="row">
                                    <div class="col-sm-4">
                                       <p> <input type="button" id="login_btn" value="Login" class="btn theme-btn"></p>
                                    </div>
                                 </div>
                              </form>
                           </div>
                           <!-- end: Widget -->
                        </div>
                        <!-- /REGISTER -->
                     </div>
                     <!-- WHY? -->
                     <div class="col-md-4">
                        
                        <!-- end:Panel -->
                        <h4 class="m-t-20">Not yet registered?</h4>
                        <p> If you"re an existing user please </p>
                        <p> <a href="/register" class="btn theme-btn m-t-15">Register</a> </p>
                     </div>
                     <!-- /WHY? -->
                  </div>
               </div>
            </section>
            
            <!-- start: FOOTER -->
        {include file="user-footer.tpl"}
            <!-- end:Footer -->
         </div>
         <!-- end:page wrapper -->
      </div>
      <!--/end:Site wrapper -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    {include file="js-version-for-user.tpl"}
    {literal}
    <script>
    function isEmail(email) {
      var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      return regex.test(email);
    }
    $('#login_btn').click(function(){
      var login_email = $("#login_email").val();
      var login_password = $("#login_password").val();

      if(login_email=="" && login_password=="")
      {
        $(".m_login_notice").text("The email address and password that you've entered doesn't match any account.Sign up for an account.");
        $(".m_login_notice").show();
        $("#login_email").addClass('err_border');
        return false;
      }
      if(!isEmail(login_email))
      {
        $(".m_login_notice").text("The email address you've entered is not valid.Please enter correct email id.");
        $(".m_login_notice").show();
        $("#login_email").addClass('err_border');
        return false;
      }
      if(login_email!="" && login_password=="")
      {
        $("#login_email").removeClass('err_border');
        $(".m_login_notice").text("The password you entered is incorrect. Did you forget your password?");
        $(".m_login_notice").show();
        $("#login_password").addClass('err_border');
        return false;
      }
        var postURL = "/scripts/ad-controller.php?module=check_login";
        $.ajax({  
            url:postURL,
            beforeSend: function(xhr){xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");},
            method:"POST",  
            data:$('#login_from').serialize(),
            //type:'json',
            success:function(data)  
            {   
                //alert(data);
                if(data!="success")
                {
                  //alert("here");
                  $("#login_email").val('');
                  $("#login_password").val('');
                  $(".m_login_notice").text("The email address and password that you've entered doesn't match any account.Sign up for an account.");
                  $("#login_email").addClass('err_border');
                  return false;
                }
                else
                {
                  var cdomain=window.location.host;
                  cdomain='http://'+cdomain+"/profile"; //change this to login
                  window.location=cdomain;
                }
            }  
        });
    });
    </script>
    {/literal}
</body>

</html>