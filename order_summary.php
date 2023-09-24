<!DOCTYPE html>
<html>
<head>
  <title>Order Summary</title>


  <!-- Add any necessary CSS styles here -->
  <style>
    body {
      font-family: Arial, sans-serif;
      font-size: 14px;
      line-height: 1.5;
      color: #333;
    }
    .aligned {
  display: flex;
  align-items: center;
  padding-bottom: 0;
  border-bottom: 0.2cm;
  border-bottom-color: rgba(0, 0, 0, 0.581);
  border-bottom-style: solid;
  background-color: rgba(60, 179, 114, 0.37);
}

span {
  padding: 20px;
  font-weight: bold;
  font-size: 20px;
  margin-top: 0;
  padding-left: 1cm;
}
    table {
      width: 100%;
      border-collapse: collapse;
      margin: 20px 0;
    }
    th, td {
      padding: 10px;
      text-align: left;
      border: 1px solid #ccc;
    }
    th {
      background-color: #f2f2f2;
      font-weight: bold;
      text-transform: uppercase;
    }
    td.total {
      font-weight: bold;
    }
    td.right {
      text-align: right;
    }
    button[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      border: none;
      padding: 12px 20px;
      cursor: pointer;
      border-radius: 4px;
      font-size: 16px;
    }
    button[type="submit"]:hover {
      background-color: #3e8e41;
    }
  </style>
</head>
<body>
<div class="aligned">
      <img src="logo.jpg" width="100" alt="">

      <span>SELAGINELLA BRYOPTERIS HOSPITAL</span>
  </div>
  <h1>Order Summary</h1>
  <?php
    // Retrieve the user input data from the form
    $fullname = $_POST['full-name'];
    $phone = $_POST['phone'];
    $fulladdress = $_POST['full-address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postalcode = $_POST['postal-code'];
    // $product_name = $_POST['product_name'];
    // $product_price = $_POST['product_price'];
    // $product_quantity = $_POST['product_quantity'];

    /*
    // Calculate the total cost of the order
    $cart_total = $product_price * $product_quantity;
    $gst_rate = '0.18'; // 18% GST
    $gst_amount = $cart_total * $gst_rate;
    $total_amount = $cart_total + $gst_amount;
    */

    // Duplicated for testing purpose
    $cart_total = $_POST['amount'];
    $gst_rate = '0.18'; // 18% GST
    $gst_amount = $cart_total * $gst_rate;
    $total_amount = $cart_total + $gst_amount;

    // Display the order details in an HTML table
    echo '<table>';
    echo '<tr><th>Customer Details</th><th>Amount</th></tr>';
    echo '<tr><td>Name: ' . $fullname . '<br>Phone: ' . $phone . '<br>Address: ' . $fulladdress . ', ' . $city . ', ' . $state . ' - ' . $postalcode . '</td><td>Rs. ' . $cart_total . '</td></tr>';
    echo '<tr><td colspan="2" style="text-align: right;">GST (' . ($gst_rate * 100) . '%): Rs. ' . $gst_amount . '</td></tr>';
    echo '<tr><td colspan="2" style="text-align: right;">Total Bill Amount: Rs. ' . $total_amount . '</td></tr>';
    echo '</table>';

    // Display a button to confirm the order
    echo '<form action="confirm_order.php" method="post">';
    echo '<input type="hidden" name="full-name" value="' . $fullname . '">';
    echo '<input type="hidden" name="phone" value="' . $phone . '">';
    echo '<input type="hidden" name="full-address" value="' . $fulladdress . '">';
    echo '<input type="hidden" name="city" value="' . $city . '">';
    echo '<input type="hidden" name="state" value="' . $state . '">';
    echo '<input type="hidden" name="postal-code" value="' . $postalcode . '">';
    // echo '<input type="hidden" name="product_name" value="' . $product_name . '">';
    // echo '<input type="hidden" name="product_price" value="' . $product_price . '">';
    // echo '<input type="hidden" name="product_quantity" value="' . $product_quantity . '">';
    echo '<input type="hidden" name="cart_total" value="' . $cart_total . '">';
    echo '<input type="hidden" name="gst_rate" value="' . $gst_rate . '">';
    echo '<input type="hidden" name="gst_amount" value="' . $gst_amount . '">';
    echo '<input type="hidden" name="total_amount" value="' . $total_amount . '">';
    echo '<button type="submit">Confirm Order</button>';
    echo '</form>';
  ?>
</body>
</html>

