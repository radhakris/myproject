<?php /* Smarty version Smarty-3.1.12, created on 2018-09-30 11:01:27
         compiled from "/home/shorthu4/public_html_secure/templates/web/add-corporate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3215060895bb0ad07204bb3-59394102%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '34f02591af592d8db0fc017fb848ac4625e7963d' => 
    array (
      0 => '/home/shorthu4/public_html_secure/templates/web/add-corporate.tpl',
      1 => 1538287625,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3215060895bb0ad07204bb3-59394102',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'corp_types' => 0,
    'corporate_types' => 0,
    'it_parks' => 0,
    'itt_parks' => 0,
    'it_comp' => 0,
    'it_compi' => 0,
    'data' => 0,
    'articlecount' => 0,
    'a' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5bb0ad0732a494_15037544',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bb0ad0732a494_15037544')) {function content_5bb0ad0732a494_15037544($_smarty_tpl) {?><!DOCTYPE html>
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
          <div class="col-lg-3">
            <div class="recent">
            </div>
            <form action="" method="post" role="form" id="adcorporate">

              <div class="form-group">
                <select class="form-control" name="corp_type" id="corp_type" onchange="displayItPark(this.value);">
                    <option value="">Please select Type</option>
                  <?php  $_smarty_tpl->tpl_vars['corporate_types'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['corporate_types']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['corp_types']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['corporate_types']->key => $_smarty_tpl->tpl_vars['corporate_types']->value){
$_smarty_tpl->tpl_vars['corporate_types']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['corporate_types']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['corporate_types']->value['corp_company_type'];?>
</option>
                  <?php } ?>
                </select>
                <input type="hidden" name="cid" class="form-control" id="cid" placeholder="Corporate Name" />
              </div>

              <div class="form-group" id="it_park_display" style="display:none;">
                <select class="form-control" name="it_park_name" id="it_park_name" onchange="displayCompany(this.value);">
                    <option value="">Please select IT Park</option>
                  <?php  $_smarty_tpl->tpl_vars['itt_parks'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itt_parks']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['it_parks']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itt_parks']->key => $_smarty_tpl->tpl_vars['itt_parks']->value){
$_smarty_tpl->tpl_vars['itt_parks']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['itt_parks']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['itt_parks']->value['park_name'];?>
</option>
                  <?php } ?>
                </select> <a data-toggle="modal" class="btn btn-primary btn-sm" id="add_new_it_park" href="#myModalPark" style="margin-top: 10px;">Add</a>
              </div>
              <div class="form-group">
                <select class="form-control" name="cname" id="cname">
                  <option value="">Please select Company Name</option>
                  <?php  $_smarty_tpl->tpl_vars['it_compi'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['it_compi']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['it_comp']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['it_compi']->key => $_smarty_tpl->tpl_vars['it_compi']->value){
$_smarty_tpl->tpl_vars['it_compi']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['it_compi']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['it_compi']->value['company_name'];?>
</option>
                  <?php } ?>
                </select>
                <a data-toggle="modal" class="btn btn-primary btn-sm" id="add_new_company" href="#myModalCompany" style="display:none;">Add</a>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="caddress" id="caddress" rows="5" data-rule="required" placeholder="Company Address"></textarea>
              </div>
              <div class="form-group">
                <input type="text" name="ccity" class="form-control" id="ccity" placeholder="City" required="required" />
              </div>
              <div class="form-group">
                <input type="text" name="cstate" class="form-control" id="cstate" placeholder="State" required="required" />
              </div>
              <div class="form-group">
                <input type="text" name="czip" class="form-control" id="czip" placeholder="Zip Code" />
              </div>
              <div id="statusdiv"></div>
              <div class="text-center"><button id="saveapartment" type="button" class="btn btn-primary btn-lg" onclick="addCorporate()">Save</button></div>
            </form>
          </div>

          <div class="col-lg-9">
            <div class="recent">
              <h3>Corporates</h3>
            </div>
            <?php $_smarty_tpl->tpl_vars["articlecount"] = new Smarty_variable(count($_smarty_tpl->tpl_vars['data']->value), null, 0);?>
            <table class="table table-striped table-bordered table-hover table2excel" >
              <thead>
            <tr>
              <th >Sl No</th>
              <th >Name</th>
              <th >Type</th>
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
                <td ><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['corp_name'];?>
</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['corp_company_type'];?>
</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['corp_address'];?>
</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['corp_added_date'];?>
</td>
                <td >
                  <a href="javascript:" id="edit_<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['corp_id'];?>
" name="edit_<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['corp_id'];?>
" onclick="javascript:doAptOperationCorporate('edit',<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['corp_id'];?>
);" title="Edit Corporate '<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['corp_name'];?>
'" alt="Edit Corporate '<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['corp_name'];?>
'"><i class="fa fa-edit" style="font-size:20px;color:red"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
        </div>
        <!--/.row-->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalPark" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">x</button>
                  <h4 class="modal-title">Add IT Park Name</h4>
              </div>
              <div class="modal-body">
                <form action="" method="post" role="form" id="admenuitems">
                  <div class="form-group">
                    <input type="text" name="parkk_name" class="form-control" id="parkk_name" placeholder="Company Name" required="required" autocomplete="off"/>
                  </div>
                  <div id="statusdivIt"></div>
                  <div class="text-center"><button id="saveIt" type="button" class="btn btn-primary btn-lg" onclick="addNewPark()">Save</button></div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalCompany" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">x</button>
                  <h4 class="modal-title">Add Company Name</h4>
              </div>
              <div class="modal-body">
                <form action="" method="post" role="form" id="adcompanynames">
                  <input type="hidden" id="it_p_id" name="it_p_id" value="">
                  <div class="form-group">
                    <input type="text" name="companyy_name" class="form-control" id="companyy_name" placeholder="Company Name" required="required" autocomplete="off"/>
                  </div>
                  <div id="statusdivcmny"></div>
                  <div class="text-center"><button id="savecmpny" type="button" class="btn btn-primary btn-lg" onclick="addNewCompany()">Save</button></div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
      
    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->

  <!-- javascripts -->
  <?php echo $_smarty_tpl->getSubTemplate ("js-version-for-admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  
  <script>
  function displayItPark(id)
  {
      if(id==1)
      {
          $("#it_park_display").show();
      }
      else
      {
          $("#it_park_display").hide();
          displayCompany();
      }
  }
  function addNewPark(){
      if($("#parkk_name").val()==''){
        $("#statusdivIt").html('Please Enter IT Park name..');
        return false;
      }
      $("#saveIt").html('Please Wait..');
    $.ajax({
            type: "POST",
            url: "/scripts/ad-controller.php?module=admin_save_park",
            beforeSend: function(xhr){xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");},
            data: $("#admenuitems").serialize(),
            success: function(result) {
                var res = result.split(":");
                if(res[0]==1){
                  var cdomain=window.location.host;
                  cdomain='http://'+cdomain+"/admin-add-corporate";
                  window.location.href=cdomain;
                }
            },
            error: function(result) {
                
            }
        });
  }
  function addNewCompany(){
      var it_p_val = $("#it_park_name").val();
      $("#it_p_id").val(it_p_val);
      if($("#companyy_name").val()==''){
        $("#statusdivcmny").html('Please Enter Company name..');
        return false;
      }
      $("#savecmpny").html('Please Wait..');
    $.ajax({
            type: "POST",
            url: "/scripts/ad-controller.php?module=admin_save_company",
            beforeSend: function(xhr){xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");},
            data: $("#adcompanynames").serialize(),
            success: function(result) {
                var res = result.split(":");
                if(res[0]==1){
                  var cdomain=window.location.host;
                  cdomain='http://'+cdomain+"/admin-add-corporate";
                  window.location.href=cdomain;
                }
            },
            error: function(result) {
                
            }
        });
  }
  function displayCompany(pid){
    $("#add_new_company").show();
    var corp_type = $("#corp_type").val();
    $.ajax({
            type: "POST",
            url: "/scripts/ad-controller.php?module=fetch_company&id="+pid+"&corp_type="+corp_type,
            beforeSend: function(xhr){xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");},
            data: pid,
            success: function(result) {
                $("#cname").html(result);
            },
            error: function(result) {
                
            }
        });
  }
  </script>
  

</body>

</html>
<?php }} ?>