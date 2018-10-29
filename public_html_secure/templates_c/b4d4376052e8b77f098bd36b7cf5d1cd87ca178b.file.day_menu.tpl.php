<?php /* Smarty version Smarty-3.1.12, created on 2018-10-14 01:31:09
         compiled from "/home/shorthu4/public_html_secure/templates/mobi/day_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20058449835bc29c5d8bb2c1-44216040%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b4d4376052e8b77f098bd36b7cf5d1cd87ca178b' => 
    array (
      0 => '/home/shorthu4/public_html_secure/templates/mobi/day_menu.tpl',
      1 => 1539480648,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20058449835bc29c5d8bb2c1-44216040',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'articlecount' => 0,
    'a' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5bc29c5d93a725_92729141',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bc29c5d93a725_92729141')) {function content_5bc29c5d93a725_92729141($_smarty_tpl) {?><div class="col-xs-12 col-sm-7 col-md-8 col-lg-9">
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
                <img src="/img/noimage.gif" alt="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['name'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['name'];?>
"/>
            <?php }else{ ?>
            <div class="figure-wrap bg-image" data-image-src="/img/<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['image'];?>
">
                <img src="/img/<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['name'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['name'];?>
"/>
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
                    <!--<div class="product-name">Fried Chicken with cheese</div>-->
                    <?php if ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['sprice']==''){?>
                    <div class="price-btn-block"> <span class="price">Rs <?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['price'];?>
</span> <a href="/order_food" class="btn theme-btn-dash pull-right">Add to Cart</a> </div>
                  <?php }else{ ?>
                    <div class="price-btn-block"> <span class="price">Rs <strike><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['price'];?>
</strike> <?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['a']->value]['sprice'];?>
</span> <a href="/order_food" class="btn theme-btn-dash pull-right">Add to Cart</a> </div>
                  <?php }?>
                </div>
            </div>
        </div>
        <?php }} ?>
    </div>
</div><?php }} ?>