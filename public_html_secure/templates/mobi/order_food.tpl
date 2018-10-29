<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Healthy Aahar</title>
    <!-- Bootstrap core CSS -->
    {include file="css-version-for-user.tpl"}
</head>

<body>
    <div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
        <!--header starts-->
        {include file="user-header.tpl"}
            <!-- banner part starts -->
        <div class="page-wrapper">
            
            <!-- start: Inner page hero -->
            <!--<div class="inner-page-hero bg-image" data-image-src="http://placehold.it/1670x480">
                <div class="container"> </div>
                
            </div>-->
            <div class="result-show">
                    <div class="container">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p><span class="primary-color"><strong>Choose</strong></span> your food</div>
                                </p>
                                <div class="col-sm-9">
                                        <p class="text-xs-center">
                                            {if $checkout eq '' || $checkout eq 0}
                                            <a href="/checkout" class="btn btn-outline-success btn-block">Check Out <span class="checkoutthis" data-count=""></span></a>
                                            {else}
                                            <a href="/checkout" class="btn btn-outline-success btn-block">Check Out <span class="checkoutthis" data-count="">({$checkout})</span></a>
                                            {/if}
                                        </p>    
                                </div>
                            </div>
                        </div>
            </div>
<!-- //results show -->
            <section class="restaurants-page">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-5 col-md-4 col-lg-3">
                            <div class="sidebar clearfix m-b-20">
                                    <div class="widget-delivery">
                                            <form>
                                                <div class="col-xs-6 col-sm-12 col-md-6 col-lg-6">
                                                    <label class="custom-control custom-radio">
                                                        <input id="radio2" value="all" name="filtertype_radio" type="radio" class="custom-control-input" checked=""> <span class="custom-control-indicator"></span> <span class="custom-control-description">Both</span> </label>
                                                </div>
                                                <div class="col-xs-6 col-sm-12 col-md-6 col-lg-6">
                                                    <label class="custom-control custom-radio">
                                                        <input id="radio1" value="veg" name="filtertype_radio" type="radio" class="custom-control-input" > <span class="custom-control-indicator"></span> <span class="custom-control-description">Veg Only</span> </label>
                                                </div>
                                            </form>
                                        </div>
                                <div class="main-block">
                                    <div class="sidebar-title white-txt">
                                        
                                        <h6>Choose Day</h6> <i class="fa fa-cutlery pull-right"></i> </div>
                                    
                                    <form>
                                        <ul>
                                            {assign "adays" $days|@count}
                                            {for $a = 0 to $adays-1}
                                                <li>
                                                    <label class="custom-control custom-radio">
                                                    <input id="radio3" name="weeks_radio" type="radio" class="custom-control-input" {if $a eq '0' && $sel_date eq ''}checked="checked" {else if $sel_date eq $days.$a.date} checked="checked" {/if} value="{$days.$a.date}"> <span class="custom-control-indicator"></span> <span class="custom-control-description">{$days.$a.day}</span> </label>
                                                </li>
                                            {/for}
                                        </ul>
                                    </form>
                                    <div class="clearfix"></div>
                                </div>
                                <!-- end:Sidebar nav -->
                                
                            </div>
                        </div>
                        <div class="menu_container">
                            <div class="col-xs-12 col-sm-7 col-md-8 col-lg-9">
                                <div class="row">
                                    {assign "articlecount" $data|@count}
                                      {for $a = 0 to $articlecount-1}
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 food-item {if $data.$a.type eq 'veg'}thisvegitem{else}thisnonvegitem{/if}">
                                        <div class="food-item-wrap">
                                        {if $data.$a.image eq ''}
                                        <div class="figure-wrap bg-image" data-image-src="/img/noimage.gif">
                                        {else}
                                        <div class="figure-wrap bg-image" data-image-src="/img/{$data.$a.image}">
                                        {/if}
                                            {if $data.$a.type eq 'veg'}
                                                <div class="veg"><i class="fa fa-pin"></i>Veg</div>
                                            {else}
                                                <div class="distance"><i class="fa fa-pin"></i>Non-Veg</div>
                                            {/if}   
                                        </div>
                                            <div class="content">
                                                <h5><a href="javascript:">{$data.$a.name}</a></h5>
                                                <!-- <div class="product-name">Fried Chicken with cheese</div>-->
                                               
                                                    {if $data.$a.sprice eq ''}
                                                        <div class="price-btn-block"> <span class="price">Rs {$data.$a.price}</span> <a href="javascript:" data-cart_date="{$cart_date}" data-cart_user="1" data-cart_price="{$data.$a.price}" data-cart_item="{$data.$a.item_id}" class="btn theme-btn-dash pull-right addthistocart">Add to Cart</a> </div>
                                                    {else}
                                                        <div class="price-btn-block"> <span class="price">Rs <strike>{$data.$a.price}</strike> {$data.$a.sprice}</span> <a href="javascript:" data-cart_date="{$cart_date}" data-cart_user="1" data-cart_price="{$data.$a.sprice}" data-cart_item="{$data.$a.item_id}" class="btn theme-btn-dash pull-right addthistocart">Add to Cart</a> </div>
                                                    {/if}
                                                
                                            </div>
                                        </div>
                                    </div>
                                    {/for}
                                </div>
                                
                            </div>
                        </div><!-- end:Menu Container -->
                    </div>
                </div>
                    <div id="snackbar">Added To Cart</div>
            </section>
           {include file="user-footer.tpl"}
        </div>
    </div>
    <!-- end:page wrapper -->
   {include file="js-version-for-user.tpl"}
   {literal}
   <script>
    $(document).ready(function () {
        $("input[name='filtertype_radio']").change(function(e){
            if($(this).val() == 'veg') {
                $(".thisnonvegitem").css({display:'none'});
                $(".thisvegitem").fadeIn('fast');
            } else if($(this).val() == 'nonveg') {
                $(".thisvegitem").css({display:'none'});
                $(".thisnonvegitem").fadeIn('fast');
            } else if($(this).val() == 'all') {
                $(".thisvegitem").fadeIn('fast');
                $(".thisnonvegitem").fadeIn('fast');
            }
            
        });
        $("input[name='weeks_radio']").change(function(e){
            var sel_date=$(this).val();
            if(sel_date!=''){
                var url =window.location.href.split('?')[0]    
                url += '?sel_date='+sel_date
                window.location.href = url;
            }
        });
        $( ".addthistocart" ).click(function() {
            var user=$(this).attr("data-cart_user");
            var date=$(this).attr("data-cart_date");
            var price=$(this).attr("data-cart_price");
            var item=$(this).attr("data-cart_item");
            if(user!='' && date!='' && price!=''){
                var postURL = "/scripts/ad-controller.php?module=add-to-cart";
                $.ajax({  
                    url:postURL,
                    beforeSend: function(xhr){xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");},
                    method:"POST",  
                    data: { usrid: user, date: date, price: price, item: item},
                    success:function(data)  
                    {
                        $(".checkoutthis").html("("+data+")")
                        var x = document.getElementById("snackbar");
                        x.className = "show";
                        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                    }  
                });
            }
        });
    });
    </script>
   {/literal}
</body>

</html>