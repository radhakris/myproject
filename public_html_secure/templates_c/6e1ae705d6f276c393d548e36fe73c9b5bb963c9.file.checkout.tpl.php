<?php /* Smarty version Smarty-3.1.12, created on 2018-10-16 06:22:58
         compiled from "/home/shorthu4/public_html_secure/templates/mobi/checkout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18318181375bc583c22ba813-51604282%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e1ae705d6f276c393d548e36fe73c9b5bb963c9' => 
    array (
      0 => '/home/shorthu4/public_html_secure/templates/mobi/checkout.tpl',
      1 => 1539491743,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18318181375bc583c22ba813-51604282',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5bc583c22ebfe1_57839066',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5bc583c22ebfe1_57839066')) {function content_5bc583c22ebfe1_57839066($_smarty_tpl) {?><!DOCTYPE html>
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

    
    <style>
        table { 
        width: 100%; 
        border-collapse: collapse; 
      }
      /* Zebra striping */
      tr:nth-of-type(odd) { 
        background: #eee; 
      }
      th { 
        background: #333; 
        color: white; 
        font-weight: bold; 
      }
      td, th { 
        padding: 6px; 
        border: 1px solid #ccc; 
        text-align: left; 
      }
    @media only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

	/* Force table to not be like tables anymore */
	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 1px solid #ccc; }
	
	td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}
	
	td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
	}
	
	/*
	Label the data
	*/
	td:nth-of-type(1):before { content: "Item"; }
	td:nth-of-type(2):before { content: "Item name"; }
	td:nth-of-type(3):before { content: "Item Price"; }
	td:nth-of-type(4):before { content: "Quantity"; }
	td:nth-of-type(5):before { content: "Total"; }
}
    </style>
    
</head>

<body>
    <div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
        <!--header starts-->
        <?php echo $_smarty_tpl->getSubTemplate ("user-header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <!-- banner part starts -->
        <div class="page-wrapper">
               
                    <div class="card-header bg-dark text-light" style="margin-top: 30px;">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        Cart
                        <a href="/order_food/" class="btn btn-outline-info btn-sm pull-right">Continiu shopping</a>
                        <div class="clearfix"></div>
                    </div>
                    <table>
                        <thead>
                        <tr>
                            <th>Item</th>
                            <th>Item name</th>
                            <th>Item Price</th>
                            <th>Quantity</th>
                            <th>Tatal</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><img class="img-responsive" src="http://placehold.it/120x80" alt="prewiew" width="120" height="80"></td>
                            <td>Item Name</td>
                            <td>10</td>
                            <td> <input type="button" value="+" class="plus">
                                <input type="number" step="1" max="99" min="1" value="1" title="Qty" class="qty"
                                       size="4">
                                <input type="button" value="-" class="minus">
                            </td>
                            <td>10</td>
                        </tr>
                        </tbody>
                    </table>
                 
                
            
           <?php echo $_smarty_tpl->getSubTemplate ("user-footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </div>
    <!-- end:page wrapper -->
   <?php echo $_smarty_tpl->getSubTemplate ("js-version-for-user.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

   
   <script>
    
    </script>
   
</body>

</html><?php }} ?>