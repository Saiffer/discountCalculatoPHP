<?php 

//Set values to empty strings

if(!isset($product_description)) {$product_description = "";}
if(!isset($list_price)) {$list_price = "";}
if(!isset($discount_percent)) {$discount_percent = "";}
if(!isset($tax_rate)) {$tax_rate = "";}  


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<body>
    <div id="content">
    
        <h1>Product Discount Calculator</h1>
        <?php if(!empty($error_message)) { ?>
            <p id="error-message" style="color: red; font-weight: bold"><?php echo htmlspecialchars($error_message); ?></p>
        <?php } ?>   
        <form action="display_discount.php" method="post">

            <div id="data">
                <label>Product Description:</label>
                <input type="text" name="product_description"/><br />

                <label>List Price:</label>
                <input type="text" name="list_price"/><br />

                <label>Discount Percent:</label>
                <input type="text" name="discount_percent"/>%<br />

                <label>Tax Rate:</label>
                <input type="text" name="tax_rate"/>%<br />
            </div>

            <div id="buttons">
                <label>&nbsp;</label>
                <input type="submit" value="Calculate Discount" /><br />
            </div>

        </form>
    </div>
</body>
</html>