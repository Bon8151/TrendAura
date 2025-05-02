<?php 
session_start();
include('includes/config.php');

if(strlen($_SESSION['login'])==0) {   
    header('location:login.php');
    exit();
}

if(isset($_GET['oid'])) {
    $oid = intval($_GET['oid']);

    $query = mysqli_query($con,"SELECT products.productImage1 as pimg1, products.productName as pname, orders.productId as proid, orders.quantity as qty, products.productPrice as pprice, products.shippingCharge as shippingcharge, orders.paymentMethod as paym, orders.orderDate as odate FROM orders JOIN products ON orders.productId = products.id WHERE orders.id='$oid' AND orders.userId='".$_SESSION['id']."'");

    if(mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_array($query);
        $subtotal = $row['pprice'] * $row['qty'];
        $shipping = $row['shippingcharge'];
        $gst = round(($subtotal + $shipping) * 0.28, 2); // 28% GST
        $total = $subtotal + $shipping + $gst;
    } else {
        echo "<script>alert('Invalid order or unauthorized access.'); window.close();</script>";
        exit();
    }
} else {
    echo "<script>alert('Order ID missing.'); window.close();</script>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Invoice | Order #<?php echo $oid; ?></title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        body { font-family: 'Arial'; padding: 20px; }
        .invoice-box { max-width: 800px; margin: auto; border: 1px solid #eee; padding: 30px; box-shadow: 0 0 10px rgba(0,0,0,0.15); }
        .invoice-box table { width: 100%; line-height: inherit; text-align: left; }
        .invoice-box table td { padding: 5px; vertical-align: top; }
        .invoice-box table tr.heading td { background: #eee; border-bottom: 1px solid #ddd; font-weight: bold; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }
        img.product-img { width: 100px; height: auto; }
    </style>
</head>
<body>
    <div class="invoice-box">
        <h2 class="text-center">Order Invoice</h2>
        <p><strong>Order ID:</strong> <?php echo $oid; ?><br>
           <strong>Order Date:</strong> <?php echo $row['odate']; ?><br>
           <strong>Payment Method:</strong> <?php echo $row['paym']; ?></p>

        <table cellpadding="0" cellspacing="0">
            <tr class="heading">
                <td>Product</td>
                <td>Details</td>
            </tr>
            <tr>
            <td>
        <img src="admin/productimages/<?php echo $row['proid'];?>/<?php echo $row['pimg1'];?>" class="product-img">
    </td>
                <td>
                    <strong><?php echo $row['pname']; ?></strong><br>
                    Quantity: <?php echo $row['qty']; ?><br>
                    Price Per Unit: ₹<?php echo number_format($row['pprice'], 2); ?><br>
                    Shipping Charge: ₹<?php echo number_format($shipping, 2); ?>
                </td>
            </tr>
        </table>

        <hr>

        <table>
            <tr>
                <td><strong>Subtotal</strong></td>
                <td class="text-right">₹<?php echo number_format($subtotal, 2); ?></td>
            </tr>
            <tr>
                <td><strong>Shipping</strong></td>
                <td class="text-right">₹<?php echo number_format($shipping, 2); ?></td>
            </tr>
            <tr>
                <td><strong>GST (28%)</strong></td>
                <td class="text-right">₹<?php echo number_format($gst, 2); ?></td>
            </tr>
            <tr class="heading">
                <td><strong>Total</strong></td>
                <td class="text-right"><strong>₹<?php echo number_format($total, 2); ?></strong></td>
            </tr>
        </table>
        <br>
        <div class="text-center">
            <button onclick="window.print();" class="btn btn-primary">Print Bill</button>
        </div>
    </div>
</body>
</html>
