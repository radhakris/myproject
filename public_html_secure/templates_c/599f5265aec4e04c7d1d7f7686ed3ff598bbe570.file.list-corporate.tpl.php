<?php /* Smarty version Smarty-3.1.12, created on 2018-10-12 13:31:02
         compiled from "/home/shorthu4/public_html_secure/templates/web/list-corporate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10742813555bc0a2160c8573-19487017%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '599f5265aec4e04c7d1d7f7686ed3ff598bbe570' => 
    array (
      0 => '/home/shorthu4/public_html_secure/templates/web/list-corporate.tpl',
      1 => 1538285317,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10742813555bc0a2160c8573-19487017',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'articlecount' => 0,
    'a' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5bc0a21619b988_47432109',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bc0a21619b988_47432109')) {function content_5bc0a21619b988_47432109($_smarty_tpl) {?><!DOCTYPE html>
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

<body>
  <!-- container section start -->
  <section id="container" class="">


    <?php echo $_smarty_tpl->getSubTemplate ("admin-top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        
        <?php echo $_smarty_tpl->getSubTemplate ("admin-left-panel.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Add Corporate</h3>
            
          </div>
        </div>

        <div class="row">
            <div class="recent">
              <form class="navbar-form"> <input class="form-control" id="myInput" placeholder="Search" type="text"> </form>
            </div>
            <?php $_smarty_tpl->tpl_vars["articlecount"] = new Smarty_variable(count($_smarty_tpl->tpl_vars['data']->value), null, 0);?>
            <table class="table table-striped table-bordered table-hover table2excel"  style="margin: 20px 0 0 10px;">
              <thead>
            <tr>
              <th >Sl No</th>
              <th >Company Name</th>
              <th >Type</th>
              <th >IT Park Name</th>
              <th style="width: 35%;">Address</th>
              <th >City</th>
              <th >Added Date</th>
              <th >Action</th>
            </tr>
            </thead>
              <tbody id="myTable">
                <?php if ($_smarty_tpl->tpl_vars['articlecount']->value!=''){?>
              
              <?php $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['a']->step = 1;$_smarty_tpl->tpl_vars['a']->total = (int)ceil(($_smarty_tpl->tpl_vars['a']->step > 0 ? $_smarty_tpl->tpl_vars['articlecount']->value-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['articlecount']->value-1)+1)/abs($_smarty_tpl->tpl_vars['a']->step));
if ($_smarty_tpl->tpl_vars['a']->total > 0){
for ($_smarty_tpl->tpl_vars['a']->value = 0, $_smarty_tpl->tpl_vars['a']->iteration = 1;$_smarty_tpl->tpl_vars['a']->iteration <= $_smarty_tpl->tpl_vars['a']->total;$_smarty_tpl->tpl_vars['a']->value += $_smarty_tpl->tpl_vars['a']->step, $_smarty_tpl->tpl_vars['a']->iteration++){
$_smarty_tpl->tpl_vars['a']->first = $_smarty_tpl->tpl_vars['a']->iteration == 1;$_smarty_tpl->tpl_vars['a']->last = $_smarty_tpl->tpl_vars['a']->iteration == $_smarty_tpl->tpl_vars['a']->total;?>
               
                <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['a']->value+1;?>
</td>
                <td class="fn"><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['corp_name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['corp_company_type'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['it_park_name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['corp_address'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['corp_city'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['corp_added_date'];?>
</td>
                <td>
                  <!--<a href="javascript:" id="edit_<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['corp_id'];?>
" name="edit_<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['corp_id'];?>
" onclick="javascript:doAptOperationCorporate('edit',<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['corp_id'];?>
);" title="Edit Corporate '<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['corp_name'];?>
'" alt="Edit Corporate '<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['corp_name'];?>
'"><i class="fa fa-edit" style="font-size:20px;color:red"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
									<a href="javascript:" id="delete_<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['corp_id'];?>
" name="delete_<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['corp_id'];?>
" onclick="javascript:doAptOperationCorporate('delete',<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['corp_id'];?>
);" title="Delete Corporate '<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['corp_name'];?>
'" alt="Delete Corporate '<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['corp_name'];?>
'" ><i class="fa fa-trash-o" style="font-size:20px;color:red"></i></a>
                </td>
                </tr>
                   
              <?php }} ?>
                <?php }else{ ?>
                <tr><td colspan="4">No Records</td></tr>
                <?php }?>
              </tbody>
            </table>
        </div>
        <!--/.row-->
      </section>
      
    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->

  <!-- javascripts -->
  <?php echo $_smarty_tpl->getSubTemplate ("js-version-for-admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>

</html>
<?php }} ?>