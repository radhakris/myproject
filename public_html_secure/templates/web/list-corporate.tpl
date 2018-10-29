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
            <div class="recent">
              <form class="navbar-form"> <input class="form-control" id="myInput" placeholder="Search" type="text"> </form>
            </div>
            {assign "articlecount" $data|@count}
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
                {if $articlecount!=''}
              
              {for $a = 0 to $articlecount-1}
               
                <tr>
                <td>{$a+1}</td>
                <td class="fn">{$data.$a.corp_name}</td>
                <td>{$data.$a.corp_company_type}</td>
                <td>{$data.$a.it_park_name}</td>
                <td>{$data.$a.corp_address}</td>
                <td>{$data.$a.corp_city}</td>
                <td>{$data.$a.corp_added_date}</td>
                <td>
                  <!--<a href="javascript:" id="edit_{$data.$a.corp_id}" name="edit_{$data.$a.corp_id}" onclick="javascript:doAptOperationCorporate('edit',{$data.$a.corp_id});" title="Edit Corporate '{$data.$a.corp_name}'" alt="Edit Corporate '{$data.$a.corp_name}'"><i class="fa fa-edit" style="font-size:20px;color:red"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
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
