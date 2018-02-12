<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();

if(!empty($_GET["action"])) 
{
    //echo nl2br("action set\n");//////////////////////////
    
  // $_SESSION['location']="delhinewwww";
     $a=1;
        $b=1;
//        $c=1;
//        $d=1;
//        $e=1;
    
    $order_id=1;
    
switch($_GET["action"])
{
        
	case "add":
        //echo nl2br("inside switch and add\n");
                

		if(!empty($_POST["quantity"])) 
        {
            //echo nl2br("... quantity not empty...\n");
			//$productByCode = $db_handle->runQuery("SELECT * FROM menu WHERE location='" . $_SESSION["location"] . "'");
            $productByCode = $db_handle->runQuery("SELECT * FROM menu WHERE food_id='" . $_GET["food_id"] . "'");
            echo "item selected for add is ";
            echo $productByCode[0]["food_id"];
           // echo nl2br("after productByCode");
			$itemArray = array($productByCode[0]["food_id"]=>array('item_name'=>$productByCode[0]["item_name"], 'food_id'=>$productByCode[0]["food_id"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));
			
			if(!empty($_SESSION["cart_item"]))
            {
               // echo nl2br("...inside cart item condition...");
				if(in_array($productByCode[0]["food_id"],($_SESSION["cart_item"]))) 
                {
                    echo "previously present";
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
                    echo "previously not present";
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
        
    case "checkout":$item_1=array();
                    $item_2=array();
       
                        foreach ($_SESSION["cart_item"] as $item)
                        {
                            //$item_1=array();
                            $item_5=$item["item_name"];
                            echo $item_5;
             //$res_id = $db_handle->runQuery("select menu_id from menu where item_name=$item_5");
                            
                            array_push($item_1,$item_5);
                            //array_push($item_2,$res_id);
                            //$quantity_1=$item["quantity"];
                            
                            
                            
                            //$item_2='afa';
                           
//$db_handle->SelectQuery("insert into current_orders(hotel_id,user_id,item_name,quantity,cart_total) values($a,$b,'aa',$a,$b)");
//$db_handle->SelectQuery("insert into current_orders(hotel_id,user_id,item_name,quantity,cart_total) values($a,$b,'$item_1',$quantity_1,'" .$_SESSION['item_total']."')");

                           

         $a=$a+1;
        $b=$b+1;
//        $c=$c+1;
//        $d=$d+1;
//        $e=$e+1;
                            
                        }
        $str = implode("-",$item_1);
        $str_1 = implode("-",$item_2);
        
        $db_handle->SelectQuery("insert into current_orders(user_id,item_name,cart_total) values('" .$_SESSION['user_id']."','$str','" .$_SESSION['item_total']."')");

        
        
                            //unset($_SESSION["cart_item"]);  $_SESSION['user_id']
	                  break;	
		
}

}

else
{
    $_SESSION['location']="delhifinal";
    
    if(!empty($_POST["location"]))
    {
            $_SESSION['location']=$_POST["location"];
    }
}

?>


<HTML>
<HEAD>
<TITLE>Simple PHP Shopping Cart</TITLE>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
<link href="style.css" type="text/css" rel="stylesheet" />
<style>
.w3-tangerine {
  font-family: 'Tangerine', serif;
}
body {
       background-image: url("blaah.jpg");
	       background-repeat: no-repeat;
		       background-size: 100%;


}
h3{color:white;}
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #ffc266;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  width: 170px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}
.btn1 {

margin-left: 5px;
}
.btn2 {
margin-right: 25px;
}
.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
</style>    
    
</HEAD>
    
<BODY>
   <div class="w3-bar w3-xlarge w3-red w3-opacity w3-hover-opacity-off w3-tangerine" id="myNavbar">
    <a href="Home Page.php" class="w3-bar-item w3-button w3-xxlarge w3-hover-grey">Home</a>
	
    <a href="hotels_list.php" class="w3-bar-item w3-button w3-xxlarge w3-hover-grey">Search Hotels</a>
     
      <a href="user_logout.php" class="w3-bar-item w3-button w3-xxlarge w3-hover-grey">Logout</a>
  </div>
    <br>
    <br>
    <br>
    <br>
<div id="shopping-cart">
        <div class="txt-heading">Shopping Cart 
            <a class=btn1 id="btnEmpty"  href="index.php?action=checkout">Checkout</a> 
            <a class=btn2 id="btnEmpty" href="index.php?action=empty">Empty Cart</a> 
            
    </div>
    
        

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
                //$cart_final = $db_handle->SelectQuery("insert into current_orders values(66,44,44,'qq',44,44)");
                ?>
                        <tr>
                        <td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><strong><?php echo nl2br($item["item_name"]); ?></strong></td>
                            
                        <td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo nl2br($item["food_id"]); ?></td>
                            
                        <td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo nl2br($item["quantity"]); ?></td>
                            
                        <td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo nl2br("$".$item["price"]); ?></td>
                            
                        <td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><a href="index.php?action=remove&food_id=<?php echo nl2br($item["food_id"]); ?>" class="btnRemoveAction">Remove Item</a></td>
                            
<!--                        <td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><a href="index.php?action=checkout" class="btnRemoveAction">Checkout</a></td>-->
                            
                        </tr>
            
                        <?php
                $item_total += ($item["price"]*$item["quantity"]);
                $_SESSION['item_total']=$item_total;
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
    
//       $_SESSION['location']="delhinewwww";

    
if(isset($_SESSION['location']))
{
    //echo "session is set";
    //echo "Loc is " . $_SESSION["location"] . ".<br>";
    $product_array = $db_handle->runQuery("select * from menu where menu_id=(select user_id from restraunt_user where location='" . $_SESSION['location'] . "')");
    
    echo $product_array[0]["item_name"];
    //echo $product_array[1]["item_name"];
}
    else
        echo "not set";
    //$product_array = $db_handle->runQuery("select * from menu where food_id=(select user_id from restraunt_user where location='mumbai')");
        if (!empty($product_array)) { 
            foreach($product_array as $key=>$value){
        ?>
            <div class="product-item">
                
<!--                //echo $product_array[0]["item_name"];-->
                <?php echo $key;?>
                <?php echo $product_array[$key]["food_id"]?>
                <form method="post" action="index.php?action=add&food_id=<?php echo $product_array[$key]["food_id"]?>;">
                    
                <div class="product-image"><img src="<?php echo nl2br($product_array[$key]["image"]); ?>"></div>
                <div><strong><?php echo nl2br($product_array[$key]["item_name"]); ?></strong></div>
                <div class="product-price"><?php echo nl2br("Rs".$product_array[$key]["price"]); ?></div>
                <div><input type="text" name="quantity" value="1" size="2" />
                <input type="submit" value="Add to cart" class="btnAddAction" /></div>
                </form>
            </div>
        <?php
                }
        }
        ?>
</div>
    
</BODY>
</HTML>