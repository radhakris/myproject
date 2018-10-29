<?php /* Smarty version Smarty-3.1.12, created on 2018-10-22 15:52:20
         compiled from "/home/shorthu4/public_html_secure/templates/web/admin-left-panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15965176525bcdf234d48da3-77107671%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d1b3953ceeaca5e753a79c6dc72b8688d92688c' => 
    array (
      0 => '/home/shorthu4/public_html_secure/templates/web/admin-left-panel.tpl',
      1 => 1537463507,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15965176525bcdf234d48da3-77107671',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'acnt' => 0,
    'ccnt' => 0,
    'items' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5bcdf234d638a2_99213127',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bcdf234d638a2_99213127')) {function content_5bcdf234d638a2_99213127($_smarty_tpl) {?><ul class="sidebar-menu">
  <li <?php if ($_SERVER['REQUEST_URI']=='/admin-dashboard'){?>class="active"<?php }?>>
    <a class="" href="/admin-dashboard">
        <span>Dashboard</span>
    </a>
  </li>
  <li <?php if ($_SERVER['REQUEST_URI']=='/admin-add-apartment'){?>class="active"<?php }?>>
    <a class="" href="/admin-add-apartment">
        <!--<i class="icon_documents_alt"></i>-->
        <span>Add Apartment</span>
    </a>
  </li>
  <li <?php if ($_SERVER['REQUEST_URI']=='/admin-add-corporate'){?>class="active"<?php }?>>
    <a class="" href="/admin-add-corporate">
        <span>Add Corporate</span>
    </a>
  </li>
  <li <?php if ($_SERVER['REQUEST_URI']=='/admin-list-apartment'){?>class="active"<?php }?>>
    <a class="" href="/admin-list-apartment">
        <span>List of Appartments</span><span class="badge leftmenu_badge"><?php echo $_smarty_tpl->tpl_vars['acnt']->value;?>
</span>
    </a>
  </li>
  <li <?php if ($_SERVER['REQUEST_URI']=='/admin-list-corporate'){?>class="active"<?php }?>>
    <a class="" href="/admin-list-corporate">
        <span>List of Corporates</span><span class="badge leftmenu_badge"><?php echo $_smarty_tpl->tpl_vars['ccnt']->value;?>
</span>
    </a>
  </li>
  <li <?php if ($_SERVER['REQUEST_URI']=='/admin-add-menu'){?>class="active" <?php }?>>
    <a class="" href="/admin-add-menu">
        <span>Add Menu</span><span class="badge leftmenu_badge"><?php echo $_smarty_tpl->tpl_vars['items']->value;?>
</span>
    </a>
  </li>
</ul><?php }} ?>