<?php /* Smarty version Smarty-3.1.12, created on 2018-10-22 15:52:20
         compiled from "/home/shorthu4/public_html_secure/templates/web/admin-top.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19042373775bcdf234d41994-38329873%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '612e64f5b970b39f9dd73ff5a8ef7db3428397f1' => 
    array (
      0 => '/home/shorthu4/public_html_secure/templates/web/admin-top.tpl',
      1 => 1537853384,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19042373775bcdf234d41994-38329873',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5bcdf234d46ed8_69371829',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bcdf234d46ed8_69371829')) {function content_5bcdf234d46ed8_69371829($_smarty_tpl) {?>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-126373160-1', 'auto', {'name': 'shortheadlines'});
  </script>

<header class="header dark-bg">
  

  <!--logo start-->
  <a href="/admin-dashboard" class="logo">Aahar <span class="lite">Admin</span></a>
  <!--logo end-->

  <div class="nav search-row" id="top_menu">
    <!--  search form start -->
    <!--<ul class="nav top-menu">
      <li>
        <form class="navbar-form">
          <input class="form-control" placeholder="Search" type="text">
        </form>
      </li>
    </ul>-->
    <!--  search form end -->
  </div>

  <div class="top-nav notification-row">
    <!-- notificatoin dropdown start-->
    <ul class="nav pull-right top-menu">
      <!-- user login dropdown start-->
      <li class="dropdown">
        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                       
                        <span class="username"><?php echo $_SESSION['user_name'];?>
</span>
                        <b class="caret"></b>
                    </a>
        <ul class="dropdown-menu extended logout">
          <div class="log-arrow-up"></div>
          
          <li>
            <a href="javascript:" onclick="logout();"><i class="icon_key_alt"></i> Log Out</a>
          </li>
         
        </ul>
      </li>
      <!-- user login dropdown end -->
    </ul>
    <!-- notificatoin dropdown end-->
  </div>
</header><?php }} ?>