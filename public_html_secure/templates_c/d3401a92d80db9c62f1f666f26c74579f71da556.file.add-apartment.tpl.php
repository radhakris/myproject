<?php /* Smarty version Smarty-3.1.12, created on 2018-09-29 06:11:13
         compiled from "/home/shorthu4/public_html_secure/templates/web/add-apartment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19675936445baf1781181365-86650294%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd3401a92d80db9c62f1f666f26c74579f71da556' => 
    array (
      0 => '/home/shorthu4/public_html_secure/templates/web/add-apartment.tpl',
      1 => 1536736287,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19675936445baf1781181365-86650294',
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
  'unifunc' => 'content_5baf1781224092_96087736',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5baf1781224092_96087736')) {function content_5baf1781224092_96087736($_smarty_tpl) {?><!DOCTYPE html>
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
            <h3 class="page-header"><i class="fa fa-laptop"></i> Add Apartment</h3>
            
          </div>
        </div>

        <div class="row">
          <div class="col-lg-3">
            <div class="recent">
            </div>
            <form action="" method="post" role="form" id="adapartment">
              <div class="form-group">
                <input type="text" name="aname" class="form-control" id="aname" placeholder="Apartment Name" required="required" />
                <input type="hidden" name="aid" class="form-control" id="aid" placeholder="Apartment Name" />
              </div>
              <div class="form-group">
                <textarea class="form-control" name="aaddress" id="aaddress" rows="5" data-rule="required" placeholder="Apartment Address"></textarea>
              </div>
              <div class="form-group">
                <input type="text" name="acity" class="form-control" id="acity" placeholder="Apartment City" required="required" />
              </div>
              <div class="form-group">
                <input type="text" name="astate" class="form-control" id="astate" placeholder="Apartment State" required="required" />
              </div>
              <div class="form-group">
                <input type="text" name="azip" class="form-control" id="azip" placeholder="Apartment City" />
              </div>
              <div id="statusdiv"></div>
              <div class="text-center"><button id="saveapartment" type="button" class="btn btn-primary btn-lg" onclick="addApartment()">Save</button></div>
            </form>
          </div>

          <div class="col-lg-9">
            <div class="recent">
              <h3>Apartments</h3>
            </div>
            <?php $_smarty_tpl->tpl_vars["articlecount"] = new Smarty_variable(count($_smarty_tpl->tpl_vars['data']->value), null, 0);?>
            <table class="table table-striped table-bordered table-hover table2excel" >
              <thead>
            <tr>
               <th >Sl No</th>
              <th >Name</th>
              <th style="width: 40%;">Address</th>
              <th >Added Date</th>
               <th >Action</th>
                </tr>
            </thead>
              <tbody>
                <?php if ($_smarty_tpl->tpl_vars['articlecount']->value!=''){?>
              
              <?php $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['a']->step = 1;$_smarty_tpl->tpl_vars['a']->total = (int)ceil(($_smarty_tpl->tpl_vars['a']->step > 0 ? $_smarty_tpl->tpl_vars['articlecount']->value-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['articlecount']->value-1)+1)/abs($_smarty_tpl->tpl_vars['a']->step));
if ($_smarty_tpl->tpl_vars['a']->total > 0){
for ($_smarty_tpl->tpl_vars['a']->value = 0, $_smarty_tpl->tpl_vars['a']->iteration = 1;$_smarty_tpl->tpl_vars['a']->iteration <= $_smarty_tpl->tpl_vars['a']->total;$_smarty_tpl->tpl_vars['a']->value += $_smarty_tpl->tpl_vars['a']->step, $_smarty_tpl->tpl_vars['a']->iteration++){
$_smarty_tpl->tpl_vars['a']->first = $_smarty_tpl->tpl_vars['a']->iteration == 1;$_smarty_tpl->tpl_vars['a']->last = $_smarty_tpl->tpl_vars['a']->iteration == $_smarty_tpl->tpl_vars['a']->total;?>
               
                <tr>
                <td ><?php echo $_smarty_tpl->tpl_vars['a']->value+1;?>
</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['name'];?>
</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['address'];?>
</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['added_date'];?>
</td>
                <td >
                  <a href="javascript:" id="edit_<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['id'];?>
" name="edit_<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['id'];?>
" onclick="javascript:doAptOperation('edit',<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['id'];?>
);" title="Edit Apartment '<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['name'];?>
'" alt="Edit Apartment '<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['name'];?>
'"><i class="fa fa-edit" style="font-size:20px;color:red"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<a href="javascript:" id="delete_<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['id'];?>
" name="delete_<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['id'];?>
" onclick="javascript:doAptOperation('delete',<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['id'];?>
);" title="Delete Apartment '<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['name'];?>
'" alt="Delete Apartment '<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['name'];?>
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