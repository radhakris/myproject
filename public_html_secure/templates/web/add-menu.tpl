<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="">
  <!--<link rel="shortcut icon" href="img/favicon.png">-->

  {include file="css-version-for-admin.tpl"}
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">


    {include file="admin-top.tpl"}
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        
        {include file="admin-left-panel.tpl"}
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
								<tr><td><input type="text" name="date" class="form-control datepicker" value="{$yesterday}" id="sel_date" style="width: 200px;" autocomplete="off"/></td><td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td></tr>
							    <tr><th>Item</th><th>Price</th><th>S-Price</th><th>Free</th><th>F-Item</th><th>Action</th></tr>
							 
							 {assign "iopen" $items_open|@count}
							 {if $iopen!=''}
								{for $a = 0 to $iopen-1}
									<tr class="forcheckcount">
										<td style="width: 250px;">{$items_open.$a.name}</td>
										<td>{$items_open.$a.item_price}</td>
										<td>{$items_open.$a.item_sprice}</td>
										<td>{if $items_open.$a.is_free eq 1}Yes{else}No{/if}</td>
										<td>{$items_open.$a.free_item_id}</td>
										<td><button type="button" name="remove" id="{$items_open.$a.id}" class="btn btn-danger btn_remove" onclick="deleteTodayMenu('{$items_open.$a.id}')">X</button></td>
									</tr>	
								{/for}
							 {else}
							 <tr id="row1" class="forcheckcount">
								 <td style="width: 250px;"><select id="item_1" name="item[]" class="form-control" onchange="getItemPrice(this.value,'item_1')">{$htmlcode}</select></td>    
									<td><input type="text" id="price_1" name="price[]" class="form-control name_list" required="" /></td>
								 <td><input type="text" id="sprice_1" name="sprice[]" class="form-control name_list" required="" /></td>
								 <td><select id="free_1" name="free[]" class="form-control"><option value="0">No</option><option value="1">Yes</option></select></td>
								 <td><select id="fitem_1" name="fitem[]" class="form-control">{$htmlcodefree}</select></td>
								 <td><input type="hidden" id="today_item_1" name="today_item[]"/><button type="button" name="remove" id="1" class="btn btn-danger btn_remove">X</button></td>
								</tr>
							 {/if}
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
            {assign "articlecount" $data|@count}
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
                {if $articlecount!=''}
              {for $a = 0 to $articlecount-1}
                <tr class="{$data.$a.type}">
                <td >{$a+1}</td>
                <td >{$data.$a.name} ({$data.$a.quantity})</td>
                <td >{$data.$a.price} ({$data.$a.sprice})</td>
                <td >
                  <a data-toggle="modal" href="#myModalMenu" id="edit_{$data.$a.id}" name="edit_{$data.$a.id}" onclick="javascript:fillMenuItem('edit',{$data.$a.id});" title="Edit Apartment '{$data.$a.name}'" alt="Edit Item '{$data.$a.name}'"><i class="fa fa-edit" {if $data.$a.type eq 'veg'}style="font-size:20px;color:#00923f;"{else}style="font-size:20px;color:#92282a;"{/if}></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<a id="delete_{$data.$a.id}" name="delete_{$data.$a.id}" onclick="javascript:doMenuOperation('delete',{$data.$a.id});" title="Delete Apartment '{$data.$a.name}'" alt="Delete Item '{$data.$a.name}'" ><i class="fa fa-trash-o" {if $data.$a.type eq 'veg'}style="font-size:20px;color:#00923f;"{else}style="font-size:20px;color:#92282a;"{/if}></i></a>
                </td>
                </tr>
                   
              {/for}
                {else}
                <tr><td colspan="4">No Records</td></tr>
                {/if}
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
              <!--<div class="form-group">
                {assign "counti" $data|@count}
								<select name='free_item' id='free_item' class="form-control m-bot15">
									<option value='0'>Select Free Item</option>
									{for $c = 0 to $counti-1}
										<option value='{$data.$c.id}'>{$data.$c.name}</option>
									{/for}
								</select>
              </div>-->
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
  {include file="js-version-for-admin.tpl"}

</body>
{literal}
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
		   $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added forcheckcount"><td><select id="item_'+i+'" name="item[]" class="form-control" onchange="getItemPrice(this.value,\'item_'+i+'\')">{/literal}{$htmlcode}{literal}</select></td><td><input id="price_'+i+'" type="text" name="price[]" class="form-control name_list" required /></td><td><input id="sprice_'+i+'" type="text" name="sprice[]" class="form-control name_list" required /></td><td><select id="free_'+i+'" name="free[]" class="form-control"><option value="0">No</option><option value="1">Yes</option></select></td><td><select id="fitem_'+i+'" name="fitem[]" class="form-control">{/literal}{$htmlcode}{literal}</select></td>  <td><input type="hidden" id="today_item_'+i+'" name="today_item[]"/><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
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
{/literal}
</html>
