
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Checkout Confirmation</title>
    <link rel="stylesheet" href="checkout.css" />
    <link href="checkout.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
  </head>

  <body>
    <div class="aligned">
      <img src="logo.jpg" width="100" alt="">

      <span>SELAGINELLA BRYOPTERIS HOSPITAL</span>
  </div>
  
    <div class="container">
      <h2 class="heading">Checkout Confirmation</h2>
      <form id="checkout-form" method="POST" action="order_summary.php">
        <label for="full-name">Full Name*</label>
        <input type="text" id="full-name" name="full-name" required />

        <label for="phone">Contact Number*</label>
        <input type="tel" id="phone" name="phone" required />

        <label for="postal-code">Postal Code*</label>
        <input type="text" id="postal-code" name="postal-code" required />

        <label for="state">State*</label>
        <select id="state" name="state" required>
          <option value="" selected disabled>Please select</option>
          <option value="Andhra Pradesh">Andhra Pradesh</option>
          <option value="Arunachal Pradesh">Arunachal Pradesh</option>
          <option value="Assam">Assam</option>
          <option value="Bihar">Bihar</option>
          <option value="Chhattisgarh">Chhattisgarh</option>
          <option value="Goa">Goa</option>
          <option value="Gujarat">Gujarat</option>
          <option value="Haryana">Haryana</option>
          <option value="Himachal Pradesh">Himachal Pradesh</option>
          <option value="Jammu and Kashmir">Jammu and Kashmir</option>
          <option value="Jharkhand">Jharkhand</option>
          <option value="Karnataka">Karnataka</option>
          <option value="Kerala">Kerala</option>
          <option value="Madhya Pradesh">Madhya Pradesh</option>
          <option value="Maharashtra">Maharashtra</option>
          <option value="Manipur">Manipur</option>
          <option value="Meghalaya">Meghalaya</option>
          <option value="Mizoram">Mizoram</option>
          <option value="Nagaland">Nagaland</option>
          <option value="Odisha">Odisha</option>
          <option value="Punjab">Punjab</option>
          <option value="Rajasthan">Rajasthan</option>
          <option value="Sikkim">Sikkim</option>
          <option value="Tamil Nadu">Tamil Nadu</option>
          <option value="Telangana">Telangana</option>
          <option value="Tripura">Tripura</option>
          <option value="Uttar Pradesh">Uttar Pradesh</option>
          <option value="Uttarakhand">Uttarakhand</option>
          <option value="West Bengal">West Bengal</option>
        </select>

        <label for="city">City*</label>
        <select id="city" name="city" required>
          <option value="" selected disabled>Please select</option>
          <option value="Mumbai">Mumbai</option>
          <option value="Delhi">Delhi</option>
          <option value="Bangalore">Bangalore</option>
          <option value="Chennai">Chennai</option>
          <option value="Hyderabad">Hyderabad</option>
          <option value="Kolkata">Kolkata</option>
          <option value="Pune">Pune</option>
          <option value="Ahmedabad">Ahmedabad</option>
          <option value="Jaipur">Jaipur</option>
          <option value="Surat">Surat</option>
        </select>

        <label for="full-address">Full Address*</label>
        <textarea id="full-address" name="full-address" required></textarea>

        <label for="amount">Total Amount*</label>
        <input type="number" id="amount" name="amount" readonly />

        <label for="delivery-date">Delivery Date*</label>
        <input type="date" id="delivery-date" name="delivery-date" required />

        <button type="submit" name="confirm-purchase">Confirm and Purchase</button>
      </form>
      <input type="hidden" id="cart-total" name="cart-total" value="" />

      <div id="selected-items-total"></div>
    </div>

    <script src="cart.js"></script>
    <script>
      // Set the cart total amount
      const cartTotal = localStorage.getItem('cartTotal');
      document.querySelector('#cart-total').value = cartTotal;
      document.querySelector('input[name="amount"]').value = cartTotal;

      // Update the selected items total on page load
      calculateSelectedItemsTotal();

      // Listen for changes to the item checkboxes and update the selected items total
      const itemCheckboxes = document.querySelectorAll('.item');
      itemCheckboxes.forEach((itemCheckbox) => {
        itemCheckbox.addEventListener('change', () => {
          calculateSelectedItemsTotal();
        });
      });

      // Submit the form when the user clicks "Confirm and Purchase"
      document.querySelector('button[name="confirm-purchase"]').addEventListener('click', (e) => {
        e.preventDefault();
        document.querySelector('#checkout-form').submit();
      });
    </script>

  </body>
</html>

