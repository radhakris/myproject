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
                  {foreach from=$corp_types item=corporate_types name=corp_types}
                    <option value="{$corporate_types.id}">{$corporate_types.corp_company_type}</option>
                  {/foreach}
                </select>
                <input type="hidden" name="cid" class="form-control" id="cid" placeholder="Corporate Name" />
              </div>

              <div class="form-group" id="it_park_display" style="display:none;">
                <select class="form-control" name="it_park_name" id="it_park_name" onchange="displayCompany(this.value);">
                    <option value="">Please select IT Park</option>
                  {foreach from=$it_parks item=itt_parks name=itp}
                    <option value="{$itt_parks.id}">{$itt_parks.park_name}</option>
                  {/foreach}
                </select> <a data-toggle="modal" class="btn btn-primary btn-sm" id="add_new_it_park" href="#myModalPark" style="margin-top: 10px;">Add</a>
              </div>
              <div class="form-group">
                <select class="form-control" name="cname" id="cname">
                  <option value="">Please select Company Name</option>
                  {foreach from=$it_comp item=it_compi name=itpc}
                    <option value="{$it_compi.id}">{$it_compi.company_name}</option>
                  {/foreach}
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
            {assign "articlecount" $data|@count}
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
                {if $articlecount!=''}
              
              {for $a = 0 to $articlecount-1}
               
                <tr>
                <td >{$a+1}</td>
                <td >{$data.$a.corp_name}</td>
                <td >{$data.$a.corp_company_type}</td>
                <td >{$data.$a.corp_address}</td>
                <td >{$data.$a.corp_added_date}</td>
                <td >
                  <a href="javascript:" id="edit_{$data.$a.corp_id}" name="edit_{$data.$a.corp_id}" onclick="javascript:doAptOperationCorporate('edit',{$data.$a.corp_id});" title="Edit Corporate '{$data.$a.corp_name}'" alt="Edit Corporate '{$data.$a.corp_name}'"><i class="fa fa-edit" style="font-size:20px;color:red"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<a href="javascript:" id="delete_{$data.$a.corp_id}" name="delete_{$data.$a.corp_id}" onclick="javascript:doAptOperationCorporate('delete',{$data.$a.corp_id});" title="Delete Corporate '{$data.$a.corp_name}'" alt="Delete Corporate '{$data.$a.corp_name}'" ><i class="fa fa-trash-o" style="font-size:20px;color:red"></i></a>
                </td>
                </tr>
                   
              {/for}
                {else}
                <tr><td colspan="4">No Records</td></tr>
                {/if}
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
  {include file="js-version-for-admin.tpl"}
  {literal}
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
  {/literal}

</body>

</html>
