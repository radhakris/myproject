<?php /* Smarty version Smarty-3.1.12, created on 2018-10-27 06:32:18
         compiled from "/home/shorthu4/public_html_secure/templates/mobi/register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6041046515bd40672ba23e5-70687222%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef6a08fc43f6b91dc72472f761728c4693fbdb7b' => 
    array (
      0 => '/home/shorthu4/public_html_secure/templates/mobi/register.tpl',
      1 => 1539580625,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6041046515bd40672ba23e5-70687222',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'apartment_data' => 0,
    'apartment' => 0,
    'it_data' => 0,
    'it_park' => 0,
    'ind_com_data' => 0,
    'ind_company' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5bd40672c783d7_50900535',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bd40672c783d7_50900535')) {function content_5bd40672c783d7_50900535($_smarty_tpl) {?><!DOCTYPE html>
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
    <?php echo $_smarty_tpl->getSubTemplate ("css-version-for-user.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    
      <style>
        .m_login_notice{
          background: #fa3e3e;
          color:#fff;
          padding: 8px;
        }
        .err_border{
          border: 1px solid #fa3e3e;
        }
      </style>
    
</head>

<body class="home">
    <div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
        <!--header starts-->
        <?php echo $_smarty_tpl->getSubTemplate ("user-header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <!-- banner part starts -->
        <section class="hero bg-image" data-image-src="http://placehold.it/1670x680">
            <div class="hero-inner">
                <div class="container text-center hero-text font-white">
                    <h1>Get home and healthy food</h1>
                    <h5 class="font-white space-xs">Register with us and get home food at your desk on time.</h5>
                    <div class="banner-form">
                        <form id="user_register" name="user_register" method="POST">
                            <div class="form-group">
                                <label class="custom-control custom-radio">
                                    <input id="radio_it_park" name="reg_type" type="radio" class="custom-control-input" checked="" value="it_park"> <span class="custom-control-indicator"></span> <span class="custom-control-description">IT Park</span> 
                                </label>
                                <label class="custom-control custom-radio">
                                    <input id="radio_ind_company" name="reg_type" type="radio" class="custom-control-input" checked="" value="non_it_park"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Individual Company</span> 
                                </label>
                                <label class="custom-control custom-radio">
                                    <input id="radio_apartment" name="reg_type" type="radio" class="custom-control-input" checked="" value="apartment"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Appartment</span> 
                                </label>
                                <div class="row">
                                    <div class="col-sm-6" id="apartment_div">
                                        <div class="form-group">
                                            <select class="form-control" name="apartment_name" id="apartment_name" onchange="hideApartmentError(this.value);">
                                                <option value="">Select your Apartment</option>
                                                <?php  $_smarty_tpl->tpl_vars['apartment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['apartment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['apartment_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['apartment']->key => $_smarty_tpl->tpl_vars['apartment']->value){
$_smarty_tpl->tpl_vars['apartment']->_loop = true;
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['apartment']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['apartment']->value['name'];?>
</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="m_login_notice" id="reg_aptmnt_error" style="display:none;"></div>
                                        <!--/form-group-->
                                    </div>
                                    <div class="col-sm-6" id="it_park_div"  style="display:none;">
                                        <div class="form-group">
                                            <select class="form-control" name="it_park_name" id="it_park_name" onchange="showCompany(this.value);">
                                                <option value="">Select your IT Park</option>
                                                <?php  $_smarty_tpl->tpl_vars['it_park'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['it_park']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['it_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['it_park']->key => $_smarty_tpl->tpl_vars['it_park']->value){
$_smarty_tpl->tpl_vars['it_park']->_loop = true;
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['it_park']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['it_park']->value['park_name'];?>
</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="m_login_notice" id="reg_itpark_error" style="display:none;"></div>
                                        <!--/form-group-->
                                    </div>
                                    <div class="col-sm-6" id="company_div" style="display:none;">
                                        <div class="form-group">
                                            <select class="form-control" name="it_company_name" id="it_company_name" onchange="hideCompanyError()">
                                                <option value="">Select your Company</option>
                                                <?php  $_smarty_tpl->tpl_vars['ind_company'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ind_company']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ind_com_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ind_company']->key => $_smarty_tpl->tpl_vars['ind_company']->value){
$_smarty_tpl->tpl_vars['ind_company']->_loop = true;
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['ind_company']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['ind_company']->value['company_name'];?>
</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="m_login_notice" id="reg_cmpny_error" style="display:none;"></div>
                                        <!--/form-group-->
                                    </div>
                                    <div class="col-md-8">
                                        <div class="widget">
                                           <div class="widget-body">
                                                 <div class="row">
                                                    <div class="form-group col-sm-6">
                                                       <label for="exampleInputEmail1">First Name</label>
                                                       <input class="form-control" name="first_name" type="text" value="" id="first_name" placeholder="First Name">
                                                       <div class="m_login_notice" id="reg_fn_error" style="display:none;"></div> 
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                       <label for="exampleInputEmail1">Last Name</label>
                                                       <input class="form-control" name="last_name" type="text" value="" id="last_name" placeholder="Last Name">
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                       <label for="exampleInputEmail1">Email address</label>
                                                       <input type="email" name="email_id" class="form-control" id="email_id" aria-describedby="emailHelp" placeholder="Enter email"> <small id="emailHelp" class="form-text text-muted">We"ll never share your email with anyone else.</small> <div class="m_login_notice" id="reg_email_error" style="display:none;"></div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                       <label for="exampleInputPassword1">Password</label>
                                                       <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                                       <div class="m_login_notice" id="reg_pwd_error" style="display:none;"></div> 
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                       <label for="exampleInputPassword1">Repeat password</label>
                                                       <input type="password" class="form-control" id="password1" placeholder="Repeat Password">
                                                       <div class="m_login_notice" id="reg_rep_pwd_error" style="display:none;"></div> 
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                       <label for="exampleInputEmail1">Phone number</label>
                                                       <input class="form-control" type="tel" value="" id="mobile_number" name="mobile_number" placeholer="Mobile Number" maxlength="10" placeholder="Mobile Number"> <small class="form-text text-muted">We"ll never share your mobile number with anyone else.</small> 
                                                       <div class="m_login_notice" id="reg_phone_error" style="display:none;"></div>
                                                    </div>    
                                                </div>
                                                 <div class="row">
                                                    <div class="col-sm-4">
                                                       <p> <input type="button" class="btn theme-btn" id="reg_button" value="Register"></p>
                                                    </div>
                                                 </div>
                                           </div>
                                           <!-- end: Widget -->
                                        </div>
                                        <!-- /REGISTER -->
                                    </div>
                                    <div class="col-md-4" id="login_div">
                                        <!-- end:Panel -->
                                        <div class="m_login_notice" id="exist_div" style="display:none;"></div>
                                        <h4 class="m-t-20">Existing User</h4>
                                        <p> If you"re an existing user please </p>
                                        <p> <a href="/login" class="btn theme-btn m-t-15">Login</a> </p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="steps">
                        <div class="step-item step1">
                            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 483 483" width="512" height="512">
                                <g fill="#FFF">
                                    <path d="M467.006 177.92c-.055-1.573-.469-3.321-1.233-4.755L407.006 62.877V10.5c0-5.799-4.701-10.5-10.5-10.5h-310c-5.799 0-10.5 4.701-10.5 10.5v52.375L17.228 173.164a10.476 10.476 0 0 0-1.22 4.938h-.014V472.5c0 5.799 4.701 10.5 10.5 10.5h430.012c5.799 0 10.5-4.701 10.5-10.5V177.92zM282.379 76l18.007 91.602H182.583L200.445 76h81.934zm19.391 112.602c-4.964 29.003-30.096 51.143-60.281 51.143-30.173 0-55.295-22.139-60.258-51.143H301.77zm143.331 0c-4.96 29.003-30.075 51.143-60.237 51.143-30.185 0-55.317-22.139-60.281-51.143h120.518zm-123.314-21L303.78 76h86.423l48.81 91.602H321.787zM97.006 55V21h289v34h-289zm-4.198 21h86.243l-17.863 91.602h-117.2L92.808 76zm65.582 112.602c-5.028 28.475-30.113 50.19-60.229 50.19s-55.201-21.715-60.23-50.19H158.39zM300 462H183V306h117v156zm21 0V295.5c0-5.799-4.701-10.5-10.5-10.5h-138c-5.799 0-10.5 4.701-10.5 10.5V462H36.994V232.743a82.558 82.558 0 0 0 3.101 3.255c15.485 15.344 36.106 23.794 58.065 23.794s42.58-8.45 58.065-23.794a81.625 81.625 0 0 0 13.525-17.672c14.067 25.281 40.944 42.418 71.737 42.418 30.752 0 57.597-17.081 71.688-42.294 14.091 25.213 40.936 42.294 71.688 42.294 24.262 0 46.092-10.645 61.143-27.528V462H321z"></path>
                                    <path d="M202.494 386h22c5.799 0 10.5-4.701 10.5-10.5s-4.701-10.5-10.5-10.5h-22c-5.799 0-10.5 4.701-10.5 10.5s4.701 10.5 10.5 10.5z"></path>
                                </g>
                            </svg>
                            <h4><span>1. </span>Register with us</h4> </div>
                        <!-- end:Step -->
                        <div class="step-item step2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewbox="0 0 380.721 380.721">
                                <g fill="#FFF">
                                    <path d="M58.727 281.236c.32-5.217.657-10.457 1.319-15.709 1.261-12.525 3.974-25.05 6.733-37.296a543.51 543.51 0 0 1 5.449-17.997c2.463-5.729 4.868-11.433 7.25-17.01 5.438-10.898 11.491-21.07 18.724-29.593 1.737-2.19 3.427-4.328 5.095-6.46 1.912-1.894 3.805-3.747 5.676-5.588 3.863-3.509 7.221-7.273 11.107-10.091 7.686-5.711 14.529-11.137 21.477-14.506 6.698-3.724 12.455-6.982 17.631-8.812 10.125-4.084 15.883-6.141 15.883-6.141s-4.915 3.893-13.502 10.207c-4.449 2.917-9.114 7.488-14.721 12.147-5.803 4.461-11.107 10.84-17.358 16.992-3.149 3.114-5.588 7.064-8.551 10.684-1.452 1.83-2.928 3.712-4.427 5.6a1225.858 1225.858 0 0 1-3.84 6.286c-5.537 8.208-9.673 17.858-13.995 27.664-1.748 5.1-3.566 10.283-5.391 15.534a371.593 371.593 0 0 1-4.16 16.476c-2.266 11.271-4.502 22.761-5.438 34.612-.68 4.287-1.022 8.633-1.383 12.979 94 .023 166.775.069 268.589.069.337-4.462.534-8.97.534-13.536 0-85.746-62.509-156.352-142.875-165.705 5.17-4.869 8.436-11.758 8.436-19.433-.023-14.692-11.921-26.612-26.631-26.612-14.715 0-26.652 11.92-26.652 26.642 0 7.668 3.265 14.558 8.464 19.426-80.396 9.353-142.869 79.96-142.869 165.706 0 4.543.168 9.027.5 13.467 9.935-.002 19.526-.002 28.926-.002zM0 291.135h380.721v33.59H0z" /> </g>
                            </svg>
                            <h4><span>2. </span>Order Food</h4> </div>
                        <!-- end:Step -->
                        <div class="step-item step3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewbox="0 0 612.001 612">
                                <path d="M604.131 440.17h-19.12V333.237c0-12.512-3.776-24.787-10.78-35.173l-47.92-70.975a62.99 62.99 0 0 0-52.169-27.698h-74.28c-8.734 0-15.737 7.082-15.737 15.738v225.043h-121.65c11.567 9.992 19.514 23.92 21.796 39.658H412.53c4.563-31.238 31.475-55.396 63.972-55.396 32.498 0 59.33 24.158 63.895 55.396h63.735c4.328 0 7.869-3.541 7.869-7.869V448.04c-.001-4.327-3.541-7.87-7.87-7.87zM525.76 312.227h-98.044a7.842 7.842 0 0 1-7.868-7.869v-54.372c0-4.328 3.541-7.869 7.868-7.869h59.724c2.597 0 4.957 1.259 6.452 3.305l38.32 54.451c3.619 5.194-.079 12.354-6.452 12.354zM476.502 440.17c-27.068 0-48.943 21.953-48.943 49.021 0 26.99 21.875 48.943 48.943 48.943 26.989 0 48.943-21.953 48.943-48.943 0-27.066-21.954-49.021-48.943-49.021zm0 73.495c-13.535 0-24.472-11.016-24.472-24.471 0-13.535 10.937-24.473 24.472-24.473 13.533 0 24.472 10.938 24.472 24.473 0 13.455-10.938 24.471-24.472 24.471zM68.434 440.17c-4.328 0-7.869 3.543-7.869 7.869v23.922c0 4.328 3.541 7.869 7.869 7.869h87.971c2.282-15.738 10.229-29.666 21.718-39.658H68.434v-.002zm151.864 0c-26.989 0-48.943 21.953-48.943 49.021 0 26.99 21.954 48.943 48.943 48.943 27.068 0 48.943-21.953 48.943-48.943.001-27.066-21.874-49.021-48.943-49.021zm0 73.495c-13.534 0-24.471-11.016-24.471-24.471 0-13.535 10.937-24.473 24.471-24.473s24.472 10.938 24.472 24.473c0 13.455-10.938 24.471-24.472 24.471zm117.716-363.06h-91.198c4.485 13.298 6.846 27.54 6.846 42.255 0 74.28-60.431 134.711-134.711 134.711-13.535 0-26.675-2.045-39.029-5.744v86.949c0 4.328 3.541 7.869 7.869 7.869h265.96c4.329 0 7.869-3.541 7.869-7.869V174.211c-.001-13.062-10.545-23.606-23.606-23.606zM118.969 73.866C53.264 73.866 0 127.129 0 192.834s53.264 118.969 118.969 118.969 118.97-53.264 118.97-118.969-53.265-118.968-118.97-118.968zm0 210.864c-50.752 0-91.896-41.143-91.896-91.896s41.144-91.896 91.896-91.896c50.753 0 91.896 41.144 91.896 91.896 0 50.753-41.143 91.896-91.896 91.896zm35.097-72.488c-1.014 0-2.052-.131-3.082-.407L112.641 201.5a11.808 11.808 0 0 1-8.729-11.396v-59.015c0-6.516 5.287-11.803 11.803-11.803 6.516 0 11.803 5.287 11.803 11.803v49.971l29.614 7.983c6.294 1.698 10.02 8.177 8.322 14.469-1.421 5.264-6.185 8.73-11.388 8.73z" fill="#FFF" /> </svg>
                            <h4><span>3. </span>We will deliver</h4> </div>
                        <!-- end:Step -->
                    </div>
                    <!-- end:Steps -->
                </div>
            </div>
            <!--end:Hero inner -->
        </section>
        <!-- banner part ends -->
        <!-- location match part ends -->
        <!-- Popular block starts -->
        <section class="popular">
            <div class="container">
                <div class="title text-xs-center m-b-30">
                    <h2>Tomorrow's Menu</h2>
                    <p class="lead">The easiest way to your favourite food</p>
                </div>
                <div class="row">
                    <!-- Each popular food item starts -->
                    <div class="col-xs-12 col-sm-6 col-md-4 food-item">
                        <div class="food-item-wrap">
                            <div class="figure-wrap bg-image" data-image-src="http://placehold.it/380x210">
                                <div class="distance"><i class="fa fa-pin"></i>Non-Veg</div>
                               
                            </div>
                            <div class="content">
                                <h5><a href="profile.html">The South"s Best Fried Chicken</a></h5>
                                <div class="product-name">Fried Chicken with cheese</div>
                                <div class="price-btn-block"> <span class="price">Rs 15,99</span> <a href="#" class="btn theme-btn-dash pull-right">Order Now</a> </div>
                            </div>
                        </div>
                    </div>
                    <!-- Each popular food item starts -->
                    <!-- Each popular food item starts -->
                    <div class="col-xs-12 col-sm-6 col-md-4 food-item">
                        <div class="food-item-wrap">
                            <div class="figure-wrap bg-image" data-image-src="http://placehold.it/380x210">
                                <div class="veg"><i class="fa fa-pin"></i>Veg</div>
                                
                            </div>
                            <div class="content">
                                <h5><a href="profile.html">The South"s Best Fried Chicken</a></h5>
                                <div class="product-name">Fried Chicken with cheese</div>
                                <div class="price-btn-block"> <span class="price">Rs 15,99</span> <a href="#" class="btn theme-btn-dash pull-right">Order Now</a> </div>
                            </div>
                        </div>
                    </div>
                    <!-- Each popular food item starts -->
                    <!-- Each popular food item starts -->
                    <div class="col-xs-12 col-sm-6 col-md-4 food-item">
                        <div class="food-item-wrap">
                            <div class="figure-wrap bg-image" data-image-src="http://placehold.it/380x210">
                                <div class="distance"><i class="fa fa-pin"></i>Non-Veg</div>
                               
                            </div>
                            <div class="content">
                                <h5><a href="profile.html">The South"s Best Fried Chicken</a></h5>
                                <div class="product-name">Fried Chicken with cheese</div>
                                <div class="price-btn-block"> <span class="price">Rs 15,99</span> <a href="#" class="btn theme-btn-dash pull-right">Order Now</a> </div>
                            </div>
                        </div>
                    </div>
                    <!-- Each popular food item starts -->
                    <!-- Each popular food item starts -->
                    <div class="col-xs-12 col-sm-6 col-md-4 food-item">
                        <div class="food-item-wrap">
                            <div class="figure-wrap bg-image" data-image-src="http://placehold.it/380x210">
                                <div class="veg"><i class="fa fa-pin"></i>Veg</div>
                                
                            </div>
                            <div class="content">
                                <h5><a href="profile.html">The South"s Best Fried Chicken</a></h5>
                                <div class="product-name">Fried Chicken with cheese</div>
                                <div class="price-btn-block"> <span class="price">Rs 15,99</span> <a href="#" class="btn theme-btn-dash pull-right">Order Now</a> </div>
                            </div>
                        </div>
                    </div>
                    <!-- Each popular food item starts --><!-- Each popular food item starts -->
                    <div class="col-xs-12 col-sm-6 col-md-4 food-item">
                        <div class="food-item-wrap">
                            <div class="figure-wrap bg-image" data-image-src="http://placehold.it/380x210">
                                <div class="distance"><i class="fa fa-pin"></i>Non-Veg</div>
                                
                            </div>
                            <div class="content">
                                <h5><a href="profile.html">The South"s Best Fried Chicken</a></h5>
                                <div class="product-name">Fried Chicken with cheese</div>
                                <div class="price-btn-block"> <span class="price">Rs 15,99</span> <a href="#" class="btn theme-btn-dash pull-right">Order Now</a> </div>
                            </div>
                        </div>
                    </div>
                    <!-- Each popular food item starts -->
                    <!-- Each popular food item starts -->
                    <div class="col-xs-12 col-sm-6 col-md-4 food-item">
                        <div class="food-item-wrap">
                            <div class="figure-wrap bg-image" data-image-src="http://placehold.it/380x210">
                                <div class="veg"><i class="fa fa-pin"></i>Veg</div>
                                <
                            </div>
                            <div class="content">
                                <h5><a href="profile.html">The South"s Best Fried Chicken</a></h5>
                                <div class="product-name">Fried Chicken with cheese</div>
                                <div class="price-btn-block"> <span class="price">Rs 15,99</span> <a href="#" class="btn theme-btn-dash pull-right">Order Now</a> </div>
                            </div>
                        </div>
                    </div>
                    <!-- Each popular food item starts -->
                    
                </div>
            </div>
        </section>
        <!-- Popular block ends -->
        <!-- How it works block starts -->
        <section class="how-it-works">
            <div class="container">
                <div class="text-xs-center">
                    <h2>Easy 3 Step Order</h2>
                    <!-- 3 block sections starts -->
                    <div class="row how-it-works-solution">
                        <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col1">
                            <div class="how-it-works-wrap">
                                <div class="step step-1">
                                    <div class="icon" data-step="1">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 483 483" width="512" height="512">
                                            <g fill="#FFF">
                                                <path d="M467.006 177.92c-.055-1.573-.469-3.321-1.233-4.755L407.006 62.877V10.5c0-5.799-4.701-10.5-10.5-10.5h-310c-5.799 0-10.5 4.701-10.5 10.5v52.375L17.228 173.164a10.476 10.476 0 0 0-1.22 4.938h-.014V472.5c0 5.799 4.701 10.5 10.5 10.5h430.012c5.799 0 10.5-4.701 10.5-10.5V177.92zM282.379 76l18.007 91.602H182.583L200.445 76h81.934zm19.391 112.602c-4.964 29.003-30.096 51.143-60.281 51.143-30.173 0-55.295-22.139-60.258-51.143H301.77zm143.331 0c-4.96 29.003-30.075 51.143-60.237 51.143-30.185 0-55.317-22.139-60.281-51.143h120.518zm-123.314-21L303.78 76h86.423l48.81 91.602H321.787zM97.006 55V21h289v34h-289zm-4.198 21h86.243l-17.863 91.602h-117.2L92.808 76zm65.582 112.602c-5.028 28.475-30.113 50.19-60.229 50.19s-55.201-21.715-60.23-50.19H158.39zM300 462H183V306h117v156zm21 0V295.5c0-5.799-4.701-10.5-10.5-10.5h-138c-5.799 0-10.5 4.701-10.5 10.5V462H36.994V232.743a82.558 82.558 0 0 0 3.101 3.255c15.485 15.344 36.106 23.794 58.065 23.794s42.58-8.45 58.065-23.794a81.625 81.625 0 0 0 13.525-17.672c14.067 25.281 40.944 42.418 71.737 42.418 30.752 0 57.597-17.081 71.688-42.294 14.091 25.213 40.936 42.294 71.688 42.294 24.262 0 46.092-10.645 61.143-27.528V462H321z" />
                                                <path d="M202.494 386h22c5.799 0 10.5-4.701 10.5-10.5s-4.701-10.5-10.5-10.5h-22c-5.799 0-10.5 4.701-10.5 10.5s4.701 10.5 10.5 10.5z" /> </g>
                                        </svg>
                                    </div>
                                    <h3>Register with us</h3>
                                    <p>Register with us for home and healthy food at your desk</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col2">
                            <div class="step step-2">
                                <div class="icon" data-step="2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewbox="0 0 380.721 380.721">
                                        <g fill="#FFF">
                                            <path d="M58.727 281.236c.32-5.217.657-10.457 1.319-15.709 1.261-12.525 3.974-25.05 6.733-37.296a543.51 543.51 0 0 1 5.449-17.997c2.463-5.729 4.868-11.433 7.25-17.01 5.438-10.898 11.491-21.07 18.724-29.593 1.737-2.19 3.427-4.328 5.095-6.46 1.912-1.894 3.805-3.747 5.676-5.588 3.863-3.509 7.221-7.273 11.107-10.091 7.686-5.711 14.529-11.137 21.477-14.506 6.698-3.724 12.455-6.982 17.631-8.812 10.125-4.084 15.883-6.141 15.883-6.141s-4.915 3.893-13.502 10.207c-4.449 2.917-9.114 7.488-14.721 12.147-5.803 4.461-11.107 10.84-17.358 16.992-3.149 3.114-5.588 7.064-8.551 10.684-1.452 1.83-2.928 3.712-4.427 5.6a1225.858 1225.858 0 0 1-3.84 6.286c-5.537 8.208-9.673 17.858-13.995 27.664-1.748 5.1-3.566 10.283-5.391 15.534a371.593 371.593 0 0 1-4.16 16.476c-2.266 11.271-4.502 22.761-5.438 34.612-.68 4.287-1.022 8.633-1.383 12.979 94 .023 166.775.069 268.589.069.337-4.462.534-8.97.534-13.536 0-85.746-62.509-156.352-142.875-165.705 5.17-4.869 8.436-11.758 8.436-19.433-.023-14.692-11.921-26.612-26.631-26.612-14.715 0-26.652 11.92-26.652 26.642 0 7.668 3.265 14.558 8.464 19.426-80.396 9.353-142.869 79.96-142.869 165.706 0 4.543.168 9.027.5 13.467 9.935-.002 19.526-.002 28.926-.002zM0 291.135h380.721v33.59H0z" /> </g>
                                    </svg>
                                </div>
                                <h3>Choose a tasty dish</h3>
                                <p>We"ve got your covered with menus from over 345 delivery restaurants online.</p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col3">
                            <div class="step step-3">
                                <div class="icon" data-step="3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewbox="0 0 612.001 612">
                                        <path d="M604.131 440.17h-19.12V333.237c0-12.512-3.776-24.787-10.78-35.173l-47.92-70.975a62.99 62.99 0 0 0-52.169-27.698h-74.28c-8.734 0-15.737 7.082-15.737 15.738v225.043h-121.65c11.567 9.992 19.514 23.92 21.796 39.658H412.53c4.563-31.238 31.475-55.396 63.972-55.396 32.498 0 59.33 24.158 63.895 55.396h63.735c4.328 0 7.869-3.541 7.869-7.869V448.04c-.001-4.327-3.541-7.87-7.87-7.87zM525.76 312.227h-98.044a7.842 7.842 0 0 1-7.868-7.869v-54.372c0-4.328 3.541-7.869 7.868-7.869h59.724c2.597 0 4.957 1.259 6.452 3.305l38.32 54.451c3.619 5.194-.079 12.354-6.452 12.354zM476.502 440.17c-27.068 0-48.943 21.953-48.943 49.021 0 26.99 21.875 48.943 48.943 48.943 26.989 0 48.943-21.953 48.943-48.943 0-27.066-21.954-49.021-48.943-49.021zm0 73.495c-13.535 0-24.472-11.016-24.472-24.471 0-13.535 10.937-24.473 24.472-24.473 13.533 0 24.472 10.938 24.472 24.473 0 13.455-10.938 24.471-24.472 24.471zM68.434 440.17c-4.328 0-7.869 3.543-7.869 7.869v23.922c0 4.328 3.541 7.869 7.869 7.869h87.971c2.282-15.738 10.229-29.666 21.718-39.658H68.434v-.002zm151.864 0c-26.989 0-48.943 21.953-48.943 49.021 0 26.99 21.954 48.943 48.943 48.943 27.068 0 48.943-21.953 48.943-48.943.001-27.066-21.874-49.021-48.943-49.021zm0 73.495c-13.534 0-24.471-11.016-24.471-24.471 0-13.535 10.937-24.473 24.471-24.473s24.472 10.938 24.472 24.473c0 13.455-10.938 24.471-24.472 24.471zm117.716-363.06h-91.198c4.485 13.298 6.846 27.54 6.846 42.255 0 74.28-60.431 134.711-134.711 134.711-13.535 0-26.675-2.045-39.029-5.744v86.949c0 4.328 3.541 7.869 7.869 7.869h265.96c4.329 0 7.869-3.541 7.869-7.869V174.211c-.001-13.062-10.545-23.606-23.606-23.606zM118.969 73.866C53.264 73.866 0 127.129 0 192.834s53.264 118.969 118.969 118.969 118.97-53.264 118.97-118.969-53.265-118.968-118.97-118.968zm0 210.864c-50.752 0-91.896-41.143-91.896-91.896s41.144-91.896 91.896-91.896c50.753 0 91.896 41.144 91.896 91.896 0 50.753-41.143 91.896-91.896 91.896zm35.097-72.488c-1.014 0-2.052-.131-3.082-.407L112.641 201.5a11.808 11.808 0 0 1-8.729-11.396v-59.015c0-6.516 5.287-11.803 11.803-11.803 6.516 0 11.803 5.287 11.803 11.803v49.971l29.614 7.983c6.294 1.698 10.02 8.177 8.322 14.469-1.421 5.264-6.185 8.73-11.388 8.73z" fill="#FFF" /> </svg>
                                </div>
                                <h3>We will deliver at you desk</h3>
                                <p>Get your food delivered! And enjoy your meal! Pay online on pickup or delivery</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 3 block sections ends -->
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <p class="pay-info">Pay by Card or Paypal</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- How it works block ends -->
        <!-- Featured restaurants starts -->
        <section class="featured-restaurants">
            <div class="container">
                
                <!-- add restaurant starts -->
                <section class="add-restaurants">
                    <div class="container">
                        <div class="title text-xs-center m-b-30">
                            <h2>What our client says</h2>
                            <!-- <p class="lead">The easiest way to your favourite food</p> -->
                        </div>    
                        <div class="row">
                            
                            <div class="col-xs-12 col-sm-12 join-text text-xs-center">
                                <img src="images/cluster.png">
                                <p>Join the thousands of other restaurants who benefit from having their menus on <br><a href="#"><strong> FoodPicky directory</strong></a> </p>
                            </div>
                            
                        </div>
                    </div>
                </section>
                <!-- add restaurant ends -->
            </div>
        </section>
        <!-- Featured restaurants ends -->
        
        <?php echo $_smarty_tpl->getSubTemplate ("user-footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>
   <?php echo $_smarty_tpl->getSubTemplate ("js-version-for-user.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

   
   <script>
    function isEmail(email) {
      var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      return regex.test(email);
    }
    function isMobile(phoneNumber)
    {
        var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
        if (filter.test(phoneNumber)) {
          if(phoneNumber.length==10){
               var validate = true;
          } else {
              //alert('Please put 10  digit mobile number');
              var validate = false;
          }
        }
        else {
          //alert('Not a valid number');
          var validate = false;
        }
        return validate;
    }
    $('input:radio[name="reg_type"]').change(function() {
        var reg_type = $(this).val();

        $("#reg_cmpny_error").hide();
        $("#reg_itpark_error").hide();
        $("#reg_aptmnt_error").hide();
        $("#it_park_name").removeClass('err_border');
        $("#it_company_name").removeClass('err_border');
        $("#apartment_name").removeClass('err_border');

        if(reg_type=="it_park")
        {
            $("#apartment_div").hide();
            $("#it_park_div").show();
        }
        if(reg_type=="non_it_park")
        {

            $("#apartment_div").hide();
            $("#it_park_div").hide();
            //$("#company_div").show();
            showCompany();
        }
        if(reg_type=="apartment")
        {
            $("#it_park_div").hide();
            $("#company_div").hide();
            $("#apartment_div").show();
        }
    });
    $('#reg_button').click(function(){
        var radioValue = $("input[name='reg_type']:checked").val();
        var it_park_name = $("#it_park_name").val();
        var apartment_name = $("#apartment_name").val();
        var it_company_name = $("#it_company_name").val();
        var fn = $("#first_name").val();
        var email_id = $("#email_id").val();
        var password = $("#password").val();
        var rep_password = $("#password1").val();
        var mobile = $("#mobile_number").val();
        //alert(radioValue);
        if(radioValue=="it_park" && it_park_name=="")
        {
            $("#reg_itpark_error").text('Select Your IT Park Name');
            $("#reg_itpark_error").show();
            $("#it_park_name").addClass('err_border');
            return false;
        }
        if(radioValue=="it_park" && it_company_name=="")
        {
            $("#reg_cmpny_error").text('Select Your Company Name');
            $("#reg_cmpny_error").show();
            $("#it_company_name").addClass('err_border');
            return false;
        }
        if(radioValue=="non_it_park" && it_company_name=="")
        {
            $("#reg_cmpny_error").text('Select Your Company Name');
            $("#reg_cmpny_error").show();
            $("#it_company_name").addClass('err_border');
            return false;
        }
        if(radioValue=="apartment" && apartment_name=="")
        {
            $("#reg_aptmnt_error").text('Select Your Apartment');
            $("#reg_aptmnt_error").show();
            $("#apartment_name").addClass('err_border');
            return false;
        }
        if(fn=="")
        {
            $("#reg_fn_error").text("What's your name?");
            $("#reg_fn_error").show();
            $("#first_name").addClass('err_border');
            $("#first_name").focus();
            return false;
        }
        if(email_id=="")
        {
            $("#reg_fn_error").hide();
            $("#first_name").removeClass('err_border');
            $("#reg_email_error").text("What's your email?");
            $("#reg_email_error").show();
            $("#email_id").addClass('err_border');
            $("#email_id").focus();
            return false;
        }
        if(!isEmail(email_id))
        {
            $("#reg_email_error").text("Enter valid email.");
            $("#reg_email_error").show();
            $("#email_id").addClass('err_border');
            $("#email_id").focus();
            return false;
        }
        if(password=="")
        {
            $("#reg_email_error").hide();
            $("#email_id").removeClass('err_border');
            $("#reg_pwd_error").text("Please enter your password here.");
            $("#reg_pwd_error").show();
            $("#password").addClass('err_border');
            $("#password").focus();
            return false;
        }
        if(rep_password=="" || (password!=rep_password))
        {
            $("#reg_pwd_error").hide();
            $("#password").removeClass('err_border');
            $("#reg_rep_pwd_error").text("Password and confirm password should match!");
            $("#reg_rep_pwd_error").show();
            $("#password1").addClass('err_border');
            $("#password1").focus();
            return false;
        }
        if(mobile=="" || (!isMobile(mobile)))
        {
            $("#reg_rep_pwd_error").hide();
            $("#password1").removeClass('err_border');
            $("#reg_phone_error").text("Please enter valid mobile number");
            $("#reg_phone_error").show();
            $("#mobile_number").addClass('err_border');
            $("#mobile_number").focus();
            return false;
        }
        $("#reg_phone_error").hide();
        $("#mobile_number").removeClass('err_border');
        var postURL = "/scripts/ad-controller.php?module=save_registration";
        $.ajax({  
            url:postURL,
            beforeSend: function(xhr){xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");},
            method:"POST",  
            data:$('#user_register').serialize(),
            //type:'json',
            success:function(data)  
            {   
                alert(data);
                if(data=="success")
                {
                    var cdomain=window.location.host;
                    cdomain='http://'+cdomain+"/login"; //change this to login
                    window.location=cdomain;
                }
                else
                {
                    alert("hereee");
                    document.getElementById("user_register").reset();
                    $("#exist_div").show();
                    $("#exist_div").text(data);
                    $('html, body').animate({
                        scrollTop: $("#exist_div").offset().top
                    }, 2000);
                }
            }  
        });
    });
    function hideCompanyError()
    {
        $("#reg_cmpny_error").hide();
        $("#it_company_name").removeClass('err_border');
    }
    function hideApartmentError(val)
    {
        if(val!="")
        {
            $("#reg_aptmnt_error").hide();
            $("#apartment_name").removeClass('err_border');
        }
    }
    function showCompany(pid){
        $("#company_div").show();
        var corp_type = $("input[name='reg_type']:checked").val();
        if(corp_type=="it_park")
        {
            $("#reg_itpark_error").hide();
            $("#it_park_name").removeClass('err_border');
            var corp_typee = 1;
        }
        if(corp_type=="non_it_park")
        {
            var corp_typee = 2;
        }
        $.ajax({
            type: "POST",
            url: "/scripts/ad-controller.php?module=fetch_company_front&id="+pid+"&corp_type="+corp_typee,
            beforeSend: function(xhr){xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");},
            data: pid,
            success: function(result) {
                $("#it_company_name").html(result);
            },
            error: function(result) {
                
            }
        });
    }

   //var radioValue = $("input[name='reg_type']:checked").val();
   </script>
   
</body>

</html><?php }} ?>