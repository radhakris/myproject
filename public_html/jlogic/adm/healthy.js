function logout(){
    $.ajax({
            type: "POST",
            url: "/scripts/ad-controller.php?module=adminpanel-logout",
            beforeSend: function(xhr){xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");},
            data: $("#regform input").serialize(),
            success: function(result) {
                var cdomain=window.location.host;
                cdomain='http://'+cdomain+"/adminpanel";
                window.location.href=cdomain;
            },
            error: function(result) {
                
            }
        });
}
function addApartment(){
    if($("#aname").val()==''){
        $("#statusdiv").html('Please Enter Name..');
        return false;
    }
    if($("#aaddress").val()==''){
        $("#statusdiv").html('Please Enter Address..');
        return false;
    }
    if($("#acity").val()==''){
        $("#statusdiv").html('Please Enter City..');
        return false;
    }
    if($("#astate").val()==''){
        $("#statusdiv").html('Please Enter State..');
        return false;
    }
    $("#saveapartment").html('Please Wait..');
    $.ajax({
            type: "POST",
            url: "/scripts/ad-controller.php?module=admin_save_apartment",
            beforeSend: function(xhr){xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");},
            data: $("#adapartment").serialize(),
            success: function(result) {
                var res = result.split(":");
                if(res[0]==1){
                  var cdomain=window.location.host;
                  cdomain='http://'+cdomain+"/admin-add-apartment";
                  window.location.href=cdomain;
                }
            },
            error: function(result) {
                
            }
        });
}

function addCorporate(){
    if($("#corp_type").val()==''){
        $("#statusdiv").html('Please Select your Company Type..');
        return false;
    }
    if($("#corp_type").val()!='' && $("#it_park_name").val()=='')
    {
        $("#statusdiv").html('Please Enter IT Park Name Your Company located..');
        return false;
    }
    if($("#cname").val()==''){
        $("#statusdiv").html('Please Enter Company Name..');
        return false;
    }
    if($("#caddress").val()==''){
        $("#statusdiv").html('Please Enter Address..');
        return false;
    }
    if($("#ccity").val()==''){
        $("#statusdiv").html('Please Enter City..');
        return false;
    }
    if($("#cstate").val()==''){
        $("#statusdiv").html('Please Enter State..');
        return false;
    }
    $("#saveapartment").html('Please Wait..');
    $.ajax({
            type: "POST",
            url: "/scripts/ad-controller.php?module=admin_save_corporate",
            beforeSend: function(xhr){xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");},
            data: $("#adcorporate").serialize(),
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

//common functions for all modules
function doAptOperation(operation,id,target ) {
	if ( operation == "edit" ) {
		$.ajax({
            type: "POST",
            url: "/scripts/ad-controller.php?module=admin_edit_apartment&id="+id,
            beforeSend: function(xhr){xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");},
            data: $("#adapartment").serialize(),
            success: function(result) {
                var respdata=JSON.parse(result);
                $("#aid").val(respdata.id);
                $("#aname").val(respdata.name);
                $("#aaddress").val(respdata.address);
                $("#acity").val(respdata.city);
                $("#astate").val(respdata.state);
                $("#azip").val(respdata.zip);
            },
            error: function(result) {
                
            }
        });
	} else if (operation == "delete") {
		if( confirm("Are you sure to delete record(s)?") ) {
			$.ajax({
                type: "POST",
                url: "/scripts/ad-controller.php?module=admin_delete_apartment&id="+id,
                beforeSend: function(xhr){xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");},
                data: $("#adapartment").serialize(),
                success: function(result) {
                    var res = result.split(":");
                    if(res[0]==1){
                      var cdomain=window.location.host;
                      cdomain='http://'+cdomain+"/admin-add-apartment";
                      window.location.href=cdomain;
                    }
                },
                error: function(result) {
                    
                }
            });
		}
    }
}//end of doOperation

function doAptOperationCorporate(operation,id,target ) {
    if ( operation == "edit" ) {
        $.ajax({
            type: "POST",
            url: "/scripts/ad-controller.php?module=admin_edit_corporate&id="+id,
            beforeSend: function(xhr){xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");},
            data: $("#adcorporate").serialize(),
            success: function(result) {
                var respdata=JSON.parse(result);
                $("#cid").val(respdata.corp_id);
                $("#aname").val(respdata.corp_name);
                $("#aaddress").val(respdata.address);
                $("#acity").val(respdata.city);
                $("#astate").val(respdata.state);
                $("#azip").val(respdata.zip);
            },
            error: function(result) {
                
            }
        });
    } else if (operation == "delete") {
        if( confirm("Are you sure to delete record(s)?") ) {
            $.ajax({
                type: "POST",
                url: "/scripts/ad-controller.php?module=admin_delete_corporate&id="+id,
                beforeSend: function(xhr){xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");},
                data: $("#adcorporate").serialize(),
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
    }
}
function displayItPark(id)
{
    if(id==1)
    {
        $("#it_park_display").show();
    }
    else
    {
        $("#it_park_display").hide();
    }
}