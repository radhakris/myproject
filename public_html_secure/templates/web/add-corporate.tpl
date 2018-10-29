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
                <input type="text" name="it_park_name" class="form-control" id="it_park_name" placeholder="IT Park Name" required="required" />
              </div>
              <div class="form-group">
                <input type="text" name="cname" class="form-control" id="cname" placeholder="Company Name" required="required" />
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
      </section>
      
    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->

  <!-- javascripts -->
  {include file="js-version-for-admin.tpl"}

</body>

</html>
