<?php /* Smarty version Smarty-3.1.12, created on 2018-10-12 13:31:06
         compiled from "/home/shorthu4/public_html_secure/templates/web/add-menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11555974835bc0a21a3bec22-47389708%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '03bf92d59496a0450075cdd6ae980f6b41f9c606' => 
    array (
      0 => '/home/shorthu4/public_html_secure/templates/web/add-menu.tpl',
      1 => 1538226775,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11555974835bc0a21a3bec22-47389708',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'yesterday' => 0,
    'items_open' => 0,
    'iopen' => 0,
    'a' => 0,
    'htmlcode' => 0,
    'htmlcodefree' => 0,
    'data' => 0,
    'articlecount' => 0,
    'template' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5bc0a21a468fa1_97948718',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bc0a21a468fa1_97948718')) {function content_5bc0a21a468fa1_97948718($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="">
  <!--<link rel="shortcut icon" href="img/favicon.png">-->
	
	<script type="text/javascript" src="/jlogic/adm/plugins/uploader/js/plupload.full.min.js"></script>
<script type="text/javascript" src="/jlogic/adm/plugins/uploader/js/moxie.js"></script>
<script type="text/javascript" src="/jlogic/adm/plugins/uploader/js/plupload.dev.js"></script>
	
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
            <h3 class="page-header"><i class="fa fa-laptop"></i> Add Menu</h3>
          </div>
        </div>

        <div class="row">
					<div class="col-lg-12">
           <div class="form-group">
							<form name="add_name" id="add_name">
							<div class="table-responsive">
							<table class="table table-bordered" id="dynamic_field">
								<tr><td><input type="text" name="date" class="form-control datepicker" value="<?php echo $_smarty_tpl->tpl_vars['yesterday']->value;?>
" id="sel_date" style="width: 200px;" autocomplete="off"/></td><td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td></tr>
							    <tr><th>Item</th><th>Price</th><th>S-Price</th><th>Free</th><th>F-Item</th><th>Action</th></tr>
							 
							 <?php $_smarty_tpl->tpl_vars["iopen"] = new Smarty_variable(count($_smarty_tpl->tpl_vars['items_open']->value), null, 0);?>
							 <?php if ($_smarty_tpl->tpl_vars['iopen']->value!=''){?>
								<?php $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['a']->step = 1;$_smarty_tpl->tpl_vars['a']->total = (int)ceil(($_smarty_tpl->tpl_vars['a']->step > 0 ? $_smarty_tpl->tpl_vars['iopen']->value-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['iopen']->value-1)+1)/abs($_smarty_tpl->tpl_vars['a']->step));
if ($_smarty_tpl->tpl_vars['a']->total > 0){
for ($_smarty_tpl->tpl_vars['a']->value = 0, $_smarty_tpl->tpl_vars['a']->iteration = 1;$_smarty_tpl->tpl_vars['a']->iteration <= $_smarty_tpl->tpl_vars['a']->total;$_smarty_tpl->tpl_vars['a']->value += $_smarty_tpl->tpl_vars['a']->step, $_smarty_tpl->tpl_vars['a']->iteration++){
$_smarty_tpl->tpl_vars['a']->first = $_smarty_tpl->tpl_vars['a']->iteration == 1;$_smarty_tpl->tpl_vars['a']->last = $_smarty_tpl->tpl_vars['a']->iteration == $_smarty_tpl->tpl_vars['a']->total;?>
									<tr class="forcheckcount">
										<td style="width: 250px;"><?php echo $_smarty_tpl->tpl_vars['items_open']->value[$_smarty_tpl->tpl_vars['a']->value]['name'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['items_open']->value[$_smarty_tpl->tpl_vars['a']->value]['item_price'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['items_open']->value[$_smarty_tpl->tpl_vars['a']->value]['item_sprice'];?>
</td>
										<td><?php if ($_smarty_tpl->tpl_vars['items_open']->value[$_smarty_tpl->tpl_vars['a']->value]['is_free']==1){?>Yes<?php }else{ ?>No<?php }?></td>
										<td><?php echo $_smarty_tpl->tpl_vars['items_open']->value[$_smarty_tpl->tpl_vars['a']->value]['free_item_id'];?>
</td>
										<td><button type="button" name="remove" id="<?php echo $_smarty_tpl->tpl_vars['items_open']->value[$_smarty_tpl->tpl_vars['a']->value]['id'];?>
" class="btn btn-danger btn_remove" onclick="deleteTodayMenu('<?php echo $_smarty_tpl->tpl_vars['items_open']->value[$_smarty_tpl->tpl_vars['a']->value]['id'];?>
')">X</button></td>
									</tr>	
								<?php }} ?>
							 <?php }else{ ?>
							 <tr id="row1" class="forcheckcount">
								 <td style="width: 250px;"><select id="item_1" name="item[]" class="form-control" onchange="getItemPrice(this.value,'item_1')"><?php echo $_smarty_tpl->tpl_vars['htmlcode']->value;?>
</select></td>    
									<td><input type="text" id="price_1" name="price[]" class="form-control name_list" required="" /></td>
								 <td><input type="text" id="sprice_1" name="sprice[]" class="form-control name_list" required="" /></td>
								 <td><select id="free_1" name="free[]" class="form-control"><option value="0">No</option><option value="1">Yes</option></select></td>
								 <td><select id="fitem_1" name="fitem[]" class="form-control"><?php echo $_smarty_tpl->tpl_vars['htmlcodefree']->value;?>
</select></td>
								 <td><input type="hidden" id="today_item_1" name="today_item[]"/><button type="button" name="remove" id="1" class="btn btn-danger btn_remove">X</button></td>
								</tr>
							 <?php }?>
						</table>
						 <div class="statusupdate"></div>
										 <input type="button" name="submit" id="submit" class="btn btn-info" value="Save Menu" />  
								 </div>
		 
		 
							</form>  
				 </div>
					 <hr/>
			</div>
					
					
          <div class="col-lg-6">
						<a data-toggle="modal" href="#myModalMenu" class="btn btn-primary">Add Menu Item</a>
            <div class="recent">
              <h3>Menu Items</h3>
							<input type="radio" name="filtertype" checked="checked"  value="all" /> All &nbsp;&nbsp;&nbsp
							<input type="radio" name="filtertype"  value="veg" /> Veg &nbsp;&nbsp;&nbsp;
              <input type="radio" name="filtertype"  value="nonveg" /> Non Veg
            </div>
            <?php $_smarty_tpl->tpl_vars["articlecount"] = new Smarty_variable(count($_smarty_tpl->tpl_vars['data']->value), null, 0);?>
            <table class="table table-striped table-bordered table-hover table2excel" >
              <thead>
            <tr>
               <th >Sl No</th>
              <th >Name (Quantity)</th>
              <th >Price (Special Price)</th>
               <th >Action</th>
                </tr>
            </thead>
              <tbody>
                <?php if ($_smarty_tpl->tpl_vars['articlecount']->value!=''){?>
              <?php $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['a']->step = 1;$_smarty_tpl->tpl_vars['a']->total = (int)ceil(($_smarty_tpl->tpl_vars['a']->step > 0 ? $_smarty_tpl->tpl_vars['articlecount']->value-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['articlecount']->value-1)+1)/abs($_smarty_tpl->tpl_vars['a']->step));
if ($_smarty_tpl->tpl_vars['a']->total > 0){
for ($_smarty_tpl->tpl_vars['a']->value = 0, $_smarty_tpl->tpl_vars['a']->iteration = 1;$_smarty_tpl->tpl_vars['a']->iteration <= $_smarty_tpl->tpl_vars['a']->total;$_smarty_tpl->tpl_vars['a']->value += $_smarty_tpl->tpl_vars['a']->step, $_smarty_tpl->tpl_vars['a']->iteration++){
$_smarty_tpl->tpl_vars['a']->first = $_smarty_tpl->tpl_vars['a']->iteration == 1;$_smarty_tpl->tpl_vars['a']->last = $_smarty_tpl->tpl_vars['a']->iteration == $_smarty_tpl->tpl_vars['a']->total;?>
                <tr class="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['type'];?>
">
                <td ><?php echo $_smarty_tpl->tpl_vars['a']->value+1;?>
</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['name'];?>
 (<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['quantity'];?>
)</td>
                <td ><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['price'];?>
 (<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['sprice'];?>
)</td>
                <td >
                  <a data-toggle="modal" href="#myModalMenu" id="edit_<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['id'];?>
" name="edit_<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['id'];?>
" onclick="javascript:fillMenuItem('edit',<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['id'];?>
);" title="Edit Apartment '<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['name'];?>
'" alt="Edit Item '<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['name'];?>
'"><i class="fa fa-edit" <?php if ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['type']=='veg'){?>style="font-size:20px;color:#00923f;"<?php }else{ ?>style="font-size:20px;color:#92282a;"<?php }?>></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<a id="delete_<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['id'];?>
" name="delete_<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['id'];?>
" onclick="javascript:doMenuOperation('delete',<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['id'];?>
);" title="Delete Apartment '<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['name'];?>
'" alt="Delete Item '<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['name'];?>
'" ><i class="fa fa-trash-o" <?php if ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['type']=='veg'){?>style="font-size:20px;color:#00923f;"<?php }else{ ?>style="font-size:20px;color:#92282a;"<?php }?>></i></a>
                </td>
                </tr>
                   
              <?php }} ?>
                <?php }else{ ?>
                <tr><td colspan="4">No Records</td></tr>
                <?php }?>
              </tbody>
              </table>
          </div>
           <div class="col-lg-6">
						
						
					 </div>
					 
        </div>
        <!--/.row-->
				
				<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalMenu" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
									<button aria-hidden="true" data-dismiss="modal" class="close" type="button">x</button>
									<h4 class="modal-title">Add Meanu Item</h4>
							</div>
							<div class="modal-body">
								<form action="" method="post" role="form" id="admenuitems">
              <div class="form-group">
                <input type="radio" name="menutype"  id="veg" value="veg" /> Veg &nbsp;&nbsp;&nbsp;
                <input type="radio" name="menutype"  id="nonveg" value="nonveg" /> Non Veg
								<input type="hidden" name="mid" value="" id="mid"/>
              </div>
              <div class="form-group">
                <input type="text" name="item_name" class="form-control" id="item_name" placeholder="Item Name" required="required" autocomplete="off"/>
              </div>
              <div class="form-group">
                <input type="text" name="item_prize" class="form-control" id="item_prize" placeholder="Price" required="required" autocomplete="off"/>
              </div>
              <div class="form-group">
                <input type="text" name="item_sprize" class="form-control" id="item_sprize" placeholder="Special Price" required="required" autocomplete="off"/>
              </div>
							 <div class="form-group">
                <input type="text" name="item_quantity" class="form-control" id="item_quantity" placeholder="Quantity" required="required" autocomplete="off"/>
              </div>
              <div class="form-group">
                <div id="filelist">Your browser doesn't have Flash, Silverlight or HTML5 support.</div>
								<div id="uploader_container">
									<button id="pickfiles">Browse</button>
								</div>
								<label for="sel_img" class="cerror brws_vald_err" id="sel_img-error"></label>
								<div id="img_preview"></div>
								<input type="hidden" id="sel_img" name="sel_img" value="<?php echo $_smarty_tpl->tpl_vars['template']->value['aggr_info']['image'];?>
">
              </div>
              <div id="statusdiv"></div>
              <div class="text-center"><button id="saveapartment" type="button" class="btn btn-primary btn-lg" onclick="addMenuItems()">Save</button></div>
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


</body>

<script type="text/javascript">
    $(document).ready(function(){
		//for date
		$('.datepicker').datepicker({
				format: 'yyyy-mm-dd'
		}).on('changeDate', dateChanged);
		//for date ends
	  var rowlemgth=$(".forcheckcount").length;
      var i=rowlemgth;  
      $('#add').click(function(){  
           i++;  
           //$('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input id="price'+i+'" type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" required /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
		   $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added forcheckcount"><td><select id="item_'+i+'" name="item[]" class="form-control" onchange="getItemPrice(this.value,\'item_'+i+'\')"><?php echo $_smarty_tpl->tpl_vars['htmlcode']->value;?>
</select></td><td><input id="price_'+i+'" type="text" name="price[]" class="form-control name_list" required /></td><td><input id="sprice_'+i+'" type="text" name="sprice[]" class="form-control name_list" required /></td><td><select id="free_'+i+'" name="free[]" class="form-control"><option value="0">No</option><option value="1">Yes</option></select></td><td><select id="fitem_'+i+'" name="fitem[]" class="form-control"><?php echo $_smarty_tpl->tpl_vars['htmlcode']->value;?>
</select></td>  <td><input type="hidden" id="today_item_'+i+'" name="today_item[]"/><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
      $('#submit').click(function(){
		//validation
			var dyelen=$(".forcheckcount").length;
			for(var j=1; j<=dyelen;j++){
				var item=$("#item_"+j).val();
				if(item==0){
					$(".statusupdate").html("Please Select Item");
					$("#item_"+j).focus();
					return;
				}
				var price=$("#price_"+j).val();
				if(price==''){
					$(".statusupdate").html("Please Enter Price");
					$("#price_"+j).focus();
					return;
				}
				var free=$("#free_"+j).val();
				if(free=='1'){
					var fitem=$("#fitem_"+j).val();
					if(fitem==0){
						$(".statusupdate").html("Please Select Free Item");
						$("#fitem_"+j).focus();
						return;
					}
				}
				$(".statusupdate").html("");
			}
		//validation
			var postURL = "/scripts/ad-controller.php?module=admin_save_todaymenu";
           $.ajax({  
                url:postURL,
								beforeSend: function(xhr){xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");},
                method:"POST",  
                data:$('#add_name').serialize(),
                //type:'json',
                success:function(data)  
                {
                  	i=1;
                  	$('.dynamic-added').remove();
                  	$('#add_name')[0].reset();
										var res = data.split(":");
										if(res[0]==1){
											var cdomain=window.location.host;
											cdomain='http://'+cdomain+"/admin-add-menu";
											window.location.href=cdomain;
										}
                }  
           });  
      });
    });
function dateChanged(ev) {
	$(this).datepicker('hide');
	var sel_date = $("#sel_date").val();
	/*$.ajax({
		type: "GET",
		url: "/scripts/ad-controller.php?module=admin_fetch_menu_ondate&date="+sel_date,
		beforeSend: function(xhr){xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");},
		success: function(result) {
				$("#fetch_menu").html(result);
		},
		error: function(result) {
				
		}
	});*/
	window.location = "/admin-add-menu?date="+sel_date;
}
		function getItemPrice(citem,celeid){
				var resarr = celeid.split("_");
				var propid=resarr[1];
				$.ajax({
            type: "GET",
            url: "/scripts/ad-controller.php?module=admin_get_item&id="+citem,
            beforeSend: function(xhr){xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");},
            success: function(result) {
                var respdata=JSON.parse(result);
                $("#price_"+propid).val(respdata.price);
                $("#sprice_"+propid).val(respdata.sprice);
            },
            error: function(result) {
                
            }
        });
		}
		function deleteTodayMenu(id){
			if( confirm("Are you sure to delete record(s)?") ) {
				$.ajax({
							type: "GET",
							url: "/scripts/ad-controller.php?module=admin_delete_todaymenu&id="+id,
							beforeSend: function(xhr){xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");},
							success: function(result) {
									var res = result.split(":");
									if(res[0]==1){
										var cdomain=window.location.host;
										cdomain='http://'+cdomain+"/admin-add-menu";
										window.location.href=cdomain;
									}
							},
							error: function(result) {
									
							}
					});
			}
		}
</script>

<script type="text/javascript">

var uploader = new plupload.Uploader({
	runtimes : 'html5,flash,silverlight,html4',
	browse_button : 'pickfiles', // you can pass in id...
	container: document.getElementById('uploader_container'), // ... or DOM Element itself
	url : '/scripts/ad-controller.php?module=admin_upload_item_image&id=123',
	flash_swf_url : '/jlogic/adm/plugins/uploader/js/Moxie.swf',
	silverlight_xap_url : '/jlogic/adm/plugins/uploader/js/Moxie.xap',
	multiple_queues : false,
	multi_selection : false,
	max_file_count: 1,

	filters : {
		max_file_size : '1mb',
		mime_types: [
			{title : "Image files", extensions : "jpg,jpeg,png"},
			{title : "Zip files", extensions : "zip"}
		]
	},

	init: {
		PostInit: function() {
			document.getElementById('filelist').innerHTML = '';
		},
		FilesAdded: function(up, files) {
			plupload.each(files, function(file) {
				$("#sel_img-error").html('').hide();
				//if(document.getElementById('upload_percent')){
				//	document.getElementById('upload_percent').innerHTML = '<img height="22px" width="100px" class="loader" src="/images/loader.gif" alt="Uploading...">';
				//	//document.getElementById('ajax_loader').style.display= 'block';
				//}
				document.getElementById('img_preview').innerHTML ="<p>Uploading....</p>";
				up.start();
			});
		},

		UploadProgress: function(up, file) {
			//document.getElementById('upload_percent').innerHTML = file.percent + "%";
			//console.log(file.percent);
		},

		FileUploaded: function(up, file, info) {
			upl_data = info.response.split("::");
			//alert(upl_data);
			console.log(upl_data)
			//document.getElementById('ajax_loader').style.display= 'none';
			if(upl_data[1]!=''){
				var orig_img = upl_data[1];
				var disp_img = upl_data[1];
				document.getElementById('img_preview').innerHTML = '<img height="75px"  width="100px" src="/img/'+orig_img+'" >';
				document.getElementById('sel_img').value = orig_img;
			}else{
				if(upl_data[0]=='Success'){
					alert("Image Uploaded Successfully..");
					return;
				}
				if(upl_data[0] == "failed"){
				 	alert("Image Server not responding, Try after some time or contact CMS team");
				}else{
					 alert(upl_data[0]+" - Please upload a valid image.");
				}
				$(".loader").remove();
			}
	        },

		Error: function(up, err) {
			//$(".loader").remove();
			alert(err.message+" - Please try after sometime.");
			//document.getElementById('console').innerHTML += "\nError #" + err.code + ": " + err.message;
		}
	}
});

uploader.init();

</script>

</html>
<?php }} ?>