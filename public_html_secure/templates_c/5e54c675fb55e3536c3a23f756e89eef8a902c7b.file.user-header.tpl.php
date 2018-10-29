<?php /* Smarty version Smarty-3.1.12, created on 2018-10-28 20:37:27
         compiled from "/home/shorthu4/public_html_secure/templates/mobi/user-header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16867950185bd61e0751dc58-03150248%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e54c675fb55e3536c3a23f756e89eef8a902c7b' => 
    array (
      0 => '/home/shorthu4/public_html_secure/templates/mobi/user-header.tpl',
      1 => 1539578424,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16867950185bd61e0751dc58-03150248',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5bd61e075700e1_34002739',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bd61e075700e1_34002739')) {function content_5bd61e075700e1_34002739($_smarty_tpl) {?><header id="header" class="header-scroll top-header headrom">
    <!-- .navbar -->
    <nav class="navbar navbar-dark">
        <div class="container">
            <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
            <a class="navbar-brand" href="/"> <img class="img-rounded" src="/images/food-picky-logo.png" alt=""> </a>
            <?php if ($_SESSION['user_id']==''){?>
            <span class="login_register"><a href="/register">Register</a>|<a href="/login">Login</a></span>
            <?php }else{ ?>
            <span class="login_register"><a href="/logout">Logout</a></span>
            <?php }?>

            <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item"> <a class="nav-link active" href="/">Home <span class="sr-only">(current)</span></a> </li>
                    <li class="nav-item"> <a class="nav-link active" href="index.html">About Us</a> </li>
                    <li class="nav-item"> <a class="nav-link active" href="index.html">How it works</a> </li>
                    <li class="nav-item"> <a class="nav-link active" href="index.html">Gallery</a> </li>
                    <li class="nav-item"> <a class="nav-link active" href="index.html">Testimonials</a> </li>
                    <li class="nav-item"> <a class="nav-link active" href="index.html">Contact Us</a> </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- /.navbar -->
</header><?php }} ?>