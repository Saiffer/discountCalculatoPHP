<?php 
    //Filter values that user has entered

    $product_description = filter_input(INPUT_POST, 'product_description');
    $list_price = filter_input(INPUT_POST, 'list_price', FILTER_VALIDATE_FLOAT);
    $discount_percent = filter_input(INPUT_POST, 'discount_percent', FILTER_VALIDATE_FLOAT);
    $tax_rate = filter_input(INPUT_POST, 'tax_rate', FILTER_VALIDATE_FLOAT);

    //Validate that all entered values are correct

    if($product_description === NULL || empty($product_description)) {
        $error_message = "Please enter product name";
    } else if ($list_price === NULL || $list_price === FALSE || empty($list_price)) {
        $error_message = "Please enter correct price";
    } else if ($discount_percent === NULL || $discount_percent === FALSE || empty($discount_percent)) {
        $error_message = "Please enter correct discount";
    } else if ($list_price < 0) {
        $error_message = "Price should be greater than 0";
    } else if ($discount_percent < 0) {
        $error_message = "Discount should be greater than 0";
    } else if ($tax_rate === FALSE || $tax_rate === NULL || empty($tax_rate)) {
        $error_message = "Please enter correct tax rate";
    } else {
        $error_message = "";
    }

    //Show message and keep user at index.php

    if($error_message != "") {
        include("index.php");
        exit();
    }

    //Calculation of discount, tax and total

    $discount = $list_price * $discount_percent * .01;
    $discount_price = $list_price - $discount;
    $sales_tax = ($list_price - $discount) * $tax_rate * .01;
    $total = $list_price - $discount + $sales_tax;

    //Format all numbers
    
    $list_price_formatted = "$" . number_format($list_price, 2);
    $discount_percent_formatted = number_format($discount_percent, 1) . "%";
    $discount_formatted = "$" . number_format($discount, 2);
    $discount_price_formatted = "$" . number_format($discount_price, 2);
    $sales_tax_formatted = "$" . number_format($sales_tax, 2);
    $total_formatted = "$" . number_format($total, 2);
    $tax_rate_formatted = number_format($tax_rate, 1) . "%";
    $product_description_escaped = htmlspecialchars($product_description);
    


    
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
        
        <label>Product Description:</label>
        <span><?php echo $product_description_escaped; ?></span><br />

        <label>List Price:</label>
        <span><?php echo $list_price_formatted; ?></span><br />

        <label>Standard Discount:</label>
        <span><?php echo $discount_percent_formatted; ?></span><br />

        <label>Discount Amount:</label>
        <span><?php echo $discount_formatted; ?></span><br />

        <label>Discount Price:</label>
        <span><?php echo $discount_price_formatted; ?></span><br />

        <label>Sales Tax:</label>
        <span><?php echo $sales_tax_formatted;?></span><br />
        
        <label>Sales Tax Rate:</label>
        <span><?php echo $tax_rate_formatted; ?></span><br />

        <label>Total:</label>
        <span><?php echo $total_formatted; ?></span><br />

        <p>&nbsp;</p>
    </div>
   
</body>
</html>