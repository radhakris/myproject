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
    if($("#corp_type").val()==1 && $("#it_park_name").val()=='')
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
                $("#corp_type").val(respdata.corp_type);
                $("#it_park_name").val(respdata.it_park_name);
                $("#cname").val(respdata.corp_name);
                $("#caddress").val(respdata.corp_address);
                $("#ccity").val(respdata.corp_city);
                $("#cstate").val(respdata.corp_state);
                $("#czip").val(respdata.corp_zip);
                if(respdata.corp_type==1)
                {
                    $("#it_park_display").show();
                }
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
        $("#add_new_company").show();
    }
}
$(document).ready(function () {
    $("#searchall_header").keyup(function () {
        if ($(this).val().length > 1) {
            $.post("/scripts/popcorn/controllers/movies_auto_search_header_new.php", {
                queryString: "" + $(this).val() + ""
            }, function (data) {
                if (data.length > 0) {
                    $('#autoSuggestionsListHeader').html(data);
                }
            });
            $(".suggestionsBoxHeader").show();
        } else if ($(this).val() == "") {
            $(".db-closee").hide();
            $(".suggestionsBoxHeader").hide();
        }
    });
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        var find = $(this).closest('tr').children('td.fn').text();
        $(this).toggle(find.toLowerCase().indexOf(value) > -1)
      });
    });
});

function addMenuItems(){
    var radioValue = $("input[name='menutype']:checked").val();
    if(radioValue=='' || radioValue == undefined){
        $("#statusdiv").html('Please Select Item Type..');
        return false;
    }
    if($("#item_name").val()==''){
        $("#statusdiv").html('Please Enter Item Name..');
        return false;
    }
    if($("#item_prize").val()==''){
        $("#statusdiv").html('Please Enter Price..');
        return false;
    }
    if($("#item_quantity").val()==''){
        $("#statusdiv").html('Please Enter Item Quantity..');
        return false;
    }
    $("#saveapartment").html('Please Wait..');
    $.ajax({
            type: "POST",
            url: "/scripts/ad-controller.php?module=admin_save_menu",
            beforeSend: function(xhr){xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");},
            data: $("#admenuitems").serialize(),
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
function doMenuOperation(operation,id){
    if( confirm("Are you sure to delete record(s)?") ) {
        $.ajax({
            type: "POST",
            url: "/scripts/ad-controller.php?module=admin_delete_menu&id="+id,
            beforeSend: function(xhr){xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");},
            data: $("#adcorporate").serialize(),
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
function fillMenuItem(operation,id){
    $.ajax({
            type: "POST",
            url: "/scripts/ad-controller.php?module=admin_edit_menu&id="+id,
            beforeSend: function(xhr){xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");},
            data: $("#adapartment").serialize(),
            success: function(result) {
                var respdata=JSON.parse(result);
                $("#mid").val(respdata.id);
                $("#item_name").val(respdata.name);
                $("#item_prize").val(respdata.price);
                $("#item_sprize").val(respdata.sprice);
                $("#item_quantity").val(respdata.quantity);
                $("#sel_img").val(respdata.image);
                if(respdata.image!=''){
                    $("#img_preview").html('<img height="75px"  width="100px" src="/img/'+respdata.image+'" >');
                }
                var ftype=respdata.type;
                $("#"+ftype).attr('checked', true);
                //$("#azip").val(respdata.zip);
            },
            error: function(result) {
                
            }
        });
}
$(document).ready(function () {
    $("input[name='filtertype']").change(function(e){
        if($(this).val() == 'veg') {
            $(".nonveg").css({display:'none'});
            $(".veg").fadeIn('fast');
        } else if($(this).val() == 'nonveg') {
            $(".veg").css({display:'none'});
            $(".nonveg").fadeIn('fast');
        } else if($(this).val() == 'all') {
            $(".veg").fadeIn('fast');
            $(".nonveg").fadeIn('fast');
        }
        
    });    
});