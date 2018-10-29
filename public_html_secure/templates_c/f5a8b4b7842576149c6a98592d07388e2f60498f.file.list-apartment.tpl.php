<?php /* Smarty version Smarty-3.1.12, created on 2018-10-22 15:52:20
         compiled from "/home/shorthu4/public_html_secure/templates/web/list-apartment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17832630575bcdf234c52723-56878153%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5a8b4b7842576149c6a98592d07388e2f60498f' => 
    array (
      0 => '/home/shorthu4/public_html_secure/templates/web/list-apartment.tpl',
      1 => 1536837248,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17832630575bcdf234c52723-56878153',
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
  'unifunc' => 'content_5bcdf234d3a538_50174306',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bcdf234d3a538_50174306')) {function content_5bcdf234d3a538_50174306($_smarty_tpl) {?><!DOCTYPE html>
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
            <h3 class="page-header"><i class="fa fa-laptop"></i> List of Apartments</h3>
            
          </div>
        </div>

        <div class="row">
            <div class="recent">
              <form class="navbar-form"> <input class="form-control" id="myInput" placeholder="Search" type="text"> </form>
            </div>
            <?php $_smarty_tpl->tpl_vars["articlecount"] = new Smarty_variable(count($_smarty_tpl->tpl_vars['data']->value), null, 0);?>
            <table class="table table-striped table-bordered table-hover table2excel" style="margin: 20px 0 0 10px;">
            <thead>
              <tr>
                 <th >Sl No</th>
                <th >Apartment Name</th>
                <th style="width: 40%;">Address</th>
                <th >City</th>
                <th >State</th>
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
                <td class="fn"><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['address'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['city'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['state'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['added_date'];?>
</td>
                <td>
                  <a data-toggle="modal" href="#myModal<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['id'];?>
" id="edit_<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['id'];?>
" name="edit_<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['id'];?>
" title="Edit Apartment '<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['name'];?>
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
                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['id'];?>
" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">x</button>
                          <h4 class="modal-title">Edit Item <?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['name'];?>
</h4>
                      </div>
                      <div class="modal-body">
                        <form action="" method="post" role="form" id="adapartment">
                          <div class="form-group">
                            <input type="text" name="aname" class="form-control" id="aname" placeholder="Apartment Name" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['name'];?>
" required="required" />
                            <input type="hidden" name="aid" class="form-control" id="aid" placeholder="Apartment Name" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['id'];?>
"/>
                          </div>
                          <div class="form-group">
                            <textarea class="form-control" name="aaddress" id="aaddress" rows="5" data-rule="required" placeholder="Apartment Address"><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['address'];?>
</textarea>
                          </div>
                          <div class="form-group">
                            <input type="text" name="acity" class="form-control" id="acity" placeholder="Apartment City"  required="required" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['city'];?>
"/>
                          </div>
                          <div class="form-group">
                            <input type="text" name="astate" class="form-control" id="astate" placeholder="Apartment State" required="required" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['state'];?>
"/>
                          </div>
                          <div class="form-group">
                            <input type="text" name="azip" class="form-control" id="azip" placeholder="Apartment City" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['zip'];?>
"/>
                          </div>
                          <div id="statusdiv"></div>
                          <div class="text-center"><button id="saveapartment" type="button" class="btn btn-primary btn-lg" onclick="addApartment()">Update</button></div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>  
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