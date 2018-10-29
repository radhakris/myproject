<?php /* Smarty version Smarty-3.1.12, created on 2018-10-15 05:15:58
         compiled from "/home/shorthu4/public_html_secure/templates/mobi/order_food.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15482881465bc4228e4f89a0-52061256%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '51686bb209a25bcf7efda81de68b1b77a29139a2' => 
    array (
      0 => '/home/shorthu4/public_html_secure/templates/mobi/order_food.tpl',
      1 => 1539489886,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15482881465bc4228e4f89a0-52061256',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'checkout' => 0,
    'days' => 0,
    'adays' => 0,
    'a' => 0,
    'sel_date' => 0,
    'data' => 0,
    'articlecount' => 0,
    'cart_date' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5bc4228e596d83_81741047',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bc4228e596d83_81741047')) {function content_5bc4228e596d83_81741047($_smarty_tpl) {?><!DOCTYPE html>
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
    <?php echo $_smarty_tpl->getSubTemplate ("css-version-for-user.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</head>

<body>
    <div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
        <!--header starts-->
        <?php echo $_smarty_tpl->getSubTemplate ("user-header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
                                            <?php if ($_smarty_tpl->tpl_vars['checkout']->value==''||$_smarty_tpl->tpl_vars['checkout']->value==0){?>
                                            <a href="/checkout" class="btn btn-outline-success btn-block">Check Out <span class="checkoutthis" data-count=""></span></a>
                                            <?php }else{ ?>
                                            <a href="/checkout" class="btn btn-outline-success btn-block">Check Out <span class="checkoutthis" data-count="">(<?php echo $_smarty_tpl->tpl_vars['checkout']->value;?>
)</span></a>
                                            <?php }?>
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
                                            <?php $_smarty_tpl->tpl_vars["adays"] = new Smarty_variable(count($_smarty_tpl->tpl_vars['days']->value), null, 0);?>
                                            <?php $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['a']->step = 1;$_smarty_tpl->tpl_vars['a']->total = (int)ceil(($_smarty_tpl->tpl_vars['a']->step > 0 ? $_smarty_tpl->tpl_vars['adays']->value-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['adays']->value-1)+1)/abs($_smarty_tpl->tpl_vars['a']->step));
if ($_smarty_tpl->tpl_vars['a']->total > 0){
for ($_smarty_tpl->tpl_vars['a']->value = 0, $_smarty_tpl->tpl_vars['a']->iteration = 1;$_smarty_tpl->tpl_vars['a']->iteration <= $_smarty_tpl->tpl_vars['a']->total;$_smarty_tpl->tpl_vars['a']->value += $_smarty_tpl->tpl_vars['a']->step, $_smarty_tpl->tpl_vars['a']->iteration++){
$_smarty_tpl->tpl_vars['a']->first = $_smarty_tpl->tpl_vars['a']->iteration == 1;$_smarty_tpl->tpl_vars['a']->last = $_smarty_tpl->tpl_vars['a']->iteration == $_smarty_tpl->tpl_vars['a']->total;?>
                                                <li>
                                                    <label class="custom-control custom-radio">
                                                    <input id="radio3" name="weeks_radio" type="radio" class="custom-control-input" <?php if ($_smarty_tpl->tpl_vars['a']->value=='0'&&$_smarty_tpl->tpl_vars['sel_date']->value==''){?>checked="checked" <?php }elseif($_smarty_tpl->tpl_vars['sel_date']->value==$_smarty_tpl->tpl_vars['days']->value[$_smarty_tpl->tpl_vars['a']->value]['date']){?> checked="checked" <?php }?> value="<?php echo $_smarty_tpl->tpl_vars['days']->value[$_smarty_tpl->tpl_vars['a']->value]['date'];?>
"> <span class="custom-control-indicator"></span> <span class="custom-control-description"><?php echo $_smarty_tpl->tpl_vars['days']->value[$_smarty_tpl->tpl_vars['a']->value]['day'];?>
</span> </label>
                                                </li>
                                            <?php }} ?>
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
                                    <?php $_smarty_tpl->tpl_vars["articlecount"] = new Smarty_variable(count($_smarty_tpl->tpl_vars['data']->value), null, 0);?>
                                      <?php $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['a']->step = 1;$_smarty_tpl->tpl_vars['a']->total = (int)ceil(($_smarty_tpl->tpl_vars['a']->step > 0 ? $_smarty_tpl->tpl_vars['articlecount']->value-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['articlecount']->value-1)+1)/abs($_smarty_tpl->tpl_vars['a']->step));
if ($_smarty_tpl->tpl_vars['a']->total > 0){
for ($_smarty_tpl->tpl_vars['a']->value = 0, $_smarty_tpl->tpl_vars['a']->iteration = 1;$_smarty_tpl->tpl_vars['a']->iteration <= $_smarty_tpl->tpl_vars['a']->total;$_smarty_tpl->tpl_vars['a']->value += $_smarty_tpl->tpl_vars['a']->step, $_smarty_tpl->tpl_vars['a']->iteration++){
$_smarty_tpl->tpl_vars['a']->first = $_smarty_tpl->tpl_vars['a']->iteration == 1;$_smarty_tpl->tpl_vars['a']->last = $_smarty_tpl->tpl_vars['a']->iteration == $_smarty_tpl->tpl_vars['a']->total;?>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 food-item <?php if ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['type']=='veg'){?>thisvegitem<?php }else{ ?>thisnonvegitem<?php }?>">
                                        <div class="food-item-wrap">
                                        <?php if ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['image']==''){?>
                                        <div class="figure-wrap bg-image" data-image-src="/img/noimage.gif">
                                        <?php }else{ ?>
                                        <div class="figure-wrap bg-image" data-image-src="/img/<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['image'];?>
">
                                        <?php }?>
                                            <?php if ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['type']=='veg'){?>
                                                <div class="veg"><i class="fa fa-pin"></i>Veg</div>
                                            <?php }else{ ?>
                                                <div class="distance"><i class="fa fa-pin"></i>Non-Veg</div>
                                            <?php }?>   
                                        </div>
                                            <div class="content">
                                                <h5><a href="javascript:"><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['name'];?>
</a></h5>
                                                <!-- <div class="product-name">Fried Chicken with cheese</div>-->
                                               
                                                    <?php if ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['sprice']==''){?>
                                                        <div class="price-btn-block"> <span class="price">Rs <?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['price'];?>
</span> <a href="javascript:" data-cart_date="<?php echo $_smarty_tpl->tpl_vars['cart_date']->value;?>
" data-cart_user="1" data-cart_price="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['price'];?>
" data-cart_item="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['item_id'];?>
" class="btn theme-btn-dash pull-right addthistocart">Add to Cart</a> </div>
                                                    <?php }else{ ?>
                                                        <div class="price-btn-block"> <span class="price">Rs <strike><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['price'];?>
</strike> <?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['sprice'];?>
</span> <a href="javascript:" data-cart_date="<?php echo $_smarty_tpl->tpl_vars['cart_date']->value;?>
" data-cart_user="1" data-cart_price="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['sprice'];?>
" data-cart_item="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['item_id'];?>
" class="btn theme-btn-dash pull-right addthistocart">Add to Cart</a> </div>
                                                    <?php }?>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <?php }} ?>
                                </div>
                                
                            </div>
                        </div><!-- end:Menu Container -->
                    </div>
                </div>
                    <div id="snackbar">Added To Cart</div>
            </section>
           <?php echo $_smarty_tpl->getSubTemplate ("user-footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </div>
    <!-- end:page wrapper -->
   <?php echo $_smarty_tpl->getSubTemplate ("js-version-for-user.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

   
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
   
</body>

</html><?php }} ?>