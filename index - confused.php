<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();

if(!empty($_GET["action"])) 
{
    //echo nl2br("action set\n");//////////////////////////
    
switch($_GET["action"])
{
        
	case "add":
        //echo nl2br("inside switch and add\n");
                

		if(!empty($_POST["quantity"])) 
        {
            //echo nl2br("... quantity not empty...\n");
			$productByCode = $db_handle->runQuery("SELECT * FROM menu WHERE location='" . $_SESSION["location"] . "'");
            
           // echo nl2br("after productByCode");
			$itemArray = array($productByCode[0]["food_id"]=>array('item_name'=>$productByCode[0]["item_name"], 'food_id'=>$productByCode[0]["food_id"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));
			
			if(!empty($_SESSION["cart_item"]))
            {
               // echo nl2br("...inside cart item condition...");
				if(in_array($productByCode[0]["food_id"],array_keys($_SESSION["cart_item"]))) 
                {
					foreach($_SESSION["cart_item"] as $k => $v) 
                    {
							if($productByCode[0]["food_id"] == $k) 
                            {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) 
                                {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				}
                
                else 
                {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} 
            
            else 
            {
				$_SESSION["cart_item"] = $itemArray;
                //echo nl2br("...not inside cart item condition...");
			}
		}
        
        else
        {  
            echo nl2br("...quantity condition not satisfy..");
        }
        
        
	break;
        
        
	case "remove": if(!empty($_SESSION["cart_item"]))
                    {
			         foreach($_SESSION["cart_item"] as $k => $v) 
                     {
					       if($_GET["food_id"] == $k)
                           {                     
						      unset($_SESSION["cart_item"][$k]);
                           }
                         
                           if(empty($_SESSION["cart_item"]))
                           {
                              unset($_SESSION["cart_item"]);
                           }
		
			         }
		}
        
	break;
        
	case "empty":  unset($_SESSION["cart_item"]);
	               break;	
		
}

}

?>


<HTML>
<HEAD>
<TITLE>Simple PHP Shopping Cart</TITLE>
<link href="style.css" type="text/css" rel="stylesheet" />
</HEAD>
    
<BODY>
<div id="shopping-cart">
        <div class="txt-heading">Shopping Cart <a id="btnEmpty" href="index.php?action=empty">Empty Cart</a></div>
    
        <?php
        echo nl2br("...inside shopping cart now...");
        if(isset($_SESSION["cart_item"]))
        {
            echo nl2br("...cart there...");
            $item_total = 0;
        ?>	
        <table cellpadding="10" cellspacing="1">
        <tbody>
        <tr>
        <th style="text-align:left;"><strong>Name</strong></th>
        <th style="text-align:left;"><strong>Code</strong></th>
        <th style="text-align:right;"><strong>Quantity</strong></th>
        <th style="text-align:right;"><strong>Price</strong></th>
        <th style="text-align:center;"><strong>Action</strong></th>
        </tr>	
        <?php		
            foreach ($_SESSION["cart_item"] as $item){
                ?>
                        <tr>
                        <td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><strong><?php echo nl2br($item["item_name"]); ?></strong></td>
                        <td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo nl2br($item["food_id"]); ?></td>
                        <td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo nl2br($item["quantity"]); ?></td>
                        <td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo nl2br("$".$item["price"]); ?></td>
                        <td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><a href="index.php?action=remove&food_id=<?php echo nl2br($item["food_id"]); ?>" class="btnRemoveAction">Remove Item</a></td>
                        </tr>
            
                        <?php
                $item_total += ($item["price"]*$item["quantity"]);
                }
                ?>

        <tr>
        <td colspan="5" align=right><strong>Total:</strong> <?php echo nl2br("$".$item_total); ?></td>
        </tr>
        </tbody>
        </table>		
          <?php
        }
        ?>
</div>

<div id="product-grid">
        <div class="txt-heading">Products</div>
        <?php
        //$product_array = $db_handle->runQuery("SELECT * FROM menu");
    //$product_array = $db_handle->runQuery("select * from menu where menu_id=(select user_id from restraunt_user where location='" . $_SESSION['location'] . "')");
    $product_array = $db_handle->runQuery("select * from menu where menu_id=(select user_id from restraunt_user where location='mumbai')");
        if (!empty($product_array)) { 
            foreach($product_array as $key=>$value){
        ?>
            <div class="product-item">
                
                <form method="post" action="index.php?action=add&food_id=<?php echo nl2br($product_array[$key]["food_id"]); ?>">
                    
                <div class="product-image"><img src="<?php echo nl2br($product_array[$key]["image"]); ?>"></div>
                <div><strong><?php echo nl2br($product_array[$key]["item_name"]); ?></strong></div>
                <div class="product-price"><?php echo nl2br("$".$product_array[$key]["price"]); ?></div>
                <div><input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="btnAddAction" /></div>
                </form>
            </div>
        <?php
                }
        }
        ?>
</div>
    
</BODY>
</HTML>