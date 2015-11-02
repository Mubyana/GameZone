<?php 

// Script Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php 

// Run a select query to get my letest 6 items
// Connect to the MySQL database  
include "storescripts/connect_to_mysql.php"; 
$dynamicList = "";

$sql = mysql_query("SELECT * FROM product WHERE category LIKE 'Console' ORDER BY product_name DESC ");
$productCount = mysql_num_rows($sql); // count the output amount
if ($productCount > 0) {
	while($row = mysql_fetch_array($sql)){ 
             $id = $row["id"];
			 $product_name = $row["product_name"];
			 $price = $row["price"];
			 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
			 $dynamicList .='<table frame="above" border: 3px solid #E3E3E3;><tr>
          <td><a href="product.php?"><img src="inventory_images/' . $id . '.jpg" alt="' . $product_name . '" width="77" height="102"  /></a></td>
        
           <td>'.$product_name.'<br />$'.$price.'<br /><a href="product.php?id=' .$id.'">View Product Details</a></td>
           </tr>  	   
        <br/> 
	   
                        
      </table>';
                  
    }
} else {
	$dynamicList = "We have no consoles listed in our store yet";
}
mysql_close();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Store Home Page</title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
</head>
<body>
<div align="center" id="mainWrapper">
  <?php include_once("template_header.php");?>
  <div id="pageContent">
  <table width="100%" border="0" cellspacing="0" cellpadding="10">
  <tr>
 
    <td width="35%" valign="top"><h3></h3>
      <p><?php echo $dynamicList; ?><br />
        </p>
      <p><br />
      </p></td>
    <td width="33%" valign="top">
  </tr>
</table>

  </div>
  <?php include_once("template_footer.php");?>
</div>
</body>
</html>
