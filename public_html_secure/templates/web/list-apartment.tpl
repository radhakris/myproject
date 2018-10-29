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
            <h3 class="page-header"><i class="fa fa-laptop"></i> List of Apartments</h3>
            
          </div>
        </div>

        <div class="row">
            <div class="recent">
              <form class="navbar-form"> <input class="form-control" id="myInput" placeholder="Search" type="text"> </form>
            </div>
            {assign "articlecount" $data|@count}
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
                {if $articlecount!=''}
              
              {for $a = 0 to $articlecount-1}
               
                <tr>
                <td>{$a+1}</td>
                <td class="fn">{$data.$a.name}</td>
                <td>{$data.$a.address}</td>
                <td>{$data.$a.city}</td>
                <td>{$data.$a.state}</td>
                <td>{$data.$a.added_date}</td>
                <td>
                  <a data-toggle="modal" href="#myModal{$data.$a.id}" id="edit_{$data.$a.id}" name="edit_{$data.$a.id}" title="Edit Apartment '{$data.$a.name}'" alt="Edit Apartment '{$data.$a.name}'"><i class="fa fa-edit" style="font-size:20px;color:red"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<a href="javascript:" id="delete_{$data.$a.id}" name="delete_{$data.$a.id}" onclick="javascript:doAptOperation('delete',{$data.$a.id});" title="Delete Apartment '{$data.$a.name}'" alt="Delete Apartment '{$data.$a.name}'" ><i class="fa fa-trash-o" style="font-size:20px;color:red"></i></a>
                </td>
                </tr>
                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal{$data.$a.id}" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">x</button>
                          <h4 class="modal-title">Edit Item {$data.$a.name}</h4>
                      </div>
                      <div class="modal-body">
                        <form action="" method="post" role="form" id="adapartment">
                          <div class="form-group">
                            <input type="text" name="aname" class="form-control" id="aname" placeholder="Apartment Name" value="{$data.$a.name}" required="required" />
                            <input type="hidden" name="aid" class="form-control" id="aid" placeholder="Apartment Name" value="{$data.$a.id}"/>
                          </div>
                          <div class="form-group">
                            <textarea class="form-control" name="aaddress" id="aaddress" rows="5" data-rule="required" placeholder="Apartment Address">{$data.$a.address}</textarea>
                          </div>
                          <div class="form-group">
                            <input type="text" name="acity" class="form-control" id="acity" placeholder="Apartment City"  required="required" value="{$data.$a.city}"/>
                          </div>
                          <div class="form-group">
                            <input type="text" name="astate" class="form-control" id="astate" placeholder="Apartment State" required="required" value="{$data.$a.state}"/>
                          </div>
                          <div class="form-group">
                            <input type="text" name="azip" class="form-control" id="azip" placeholder="Apartment City" value="{$data.$a.zip}"/>
                          </div>
                          <div id="statusdiv"></div>
                          <div class="text-center"><button id="saveapartment" type="button" class="btn btn-primary btn-lg" onclick="addApartment()">Update</button></div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>  
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
