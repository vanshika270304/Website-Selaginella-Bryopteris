<?php
    session_start();
    include('connection.php');
    $name=$_SESSION['username'];
    $phonenum=$_SESSION['phone'];
    $query = "SELECT * FROM ambulancerequest where contact=$phonenum";
    $result = mysqli_query($connection, $query);
    $query2 = "SELECT * FROM bookappoinment where contact=$phonenum";
    $result2 = mysqli_query($connection, $query2);
    $query3 = "SELECT * FROM medicineorder JOIN medicine_billing_address ON medicineorder.orderid = medicine_billing_address.orderid HAVING phone=$phonenum";
    
    $result3 = mysqli_query($connection, $query3);
    $query4 = "SELECT * FROM labtest where phone=$phonenum";
    $result4 = mysqli_query($connection, $query4);
?>


<!DOCTYPE html>
<html>
<head>
    <title>SB Hospital Patient Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS imports -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <style>
        

        body {
            font-family: 'Open Sans', sans-serif;
            margin: 0;
            padding: 0;
            color: #707070;
            background-color: #f2f2f2;
        }

        .navbar {
            background-color: #fff;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            padding: 15px 20px;
        }

        .navbar-brand {
            font-size: 24px;
            color: #333;
            font-weight: 600;
        }

        .nav-item {
            margin-bottom: 5px;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 70px;
            bottom: 0;
            left: 0;
            width: 230px;
            padding: 20px;
            background-color: #fff;
            border-right: 1px solid #e6e6e6;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        .sidebar:hover {
            width: 250px;
        }

        .sidebar-heading {
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 20px;
            color: #333;
        }

        .sidebar-menu {
            padding: 0;
            margin: 0;
            list-style-type: none;
        }

        .sidebar-menu-item {
            margin-bottom: 10px;
        }

        .sidebar-link {
            display: block;
            padding: 8px 10px;
            background-color: #f3f3f3;
            border-radius: 5px;
            color: #333;
        }

        .sidebar-link:hover {
            background-color: #e0e0e0;
        }

        .sidebar-logout {
            display: block;
            padding: 8px 10px;
            background-color: #f3f3f3;
            border-radius: 5px;
            color: #333;
            position: absolute;
            bottom: 20px;
            left: 20px;
        }

        .sidebar-logout:hover {
            background-color: #dc3545;
            color: #fff;
        }

        /* Content */
        .content {
            margin-top: 70px;
            margin-left: 230px;
            padding: 20px;
        }

        .table-container {
            width: 100%;
            background-color: white;
            margin-top: 30px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            border: 1px solid #e6e6e6;
            border-radius: 5px;
            padding: 20px;
        }

        .table-heading {
            font-weight: 600;
            font-size: 18px;
            margin-bottom: 20px;
            color: #333;
        }

        .data-table {
            width: 100%;
        }

        .data-table tr th {
            font-weight: 500;
            text-transform: uppercase;
            font-size: 14px;
            color: #333;
        }

        .data-table tr td {
            font-weight: 400;
            font-size: 14px;
            color: #333;
        }

        .data-table tr td:last-child {
            text-align: right;
        }

        .delete-button {
            padding: 5px 10px;
            background-color: #dc3545;
            border: none;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }
        .update-button {
            padding: 5px 10px;
            background-color: #17a2b8;
            border: none;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }

        .rupee {
          font-weight: 600;
          color: #333;
        }

        .table-responsive {
          overflow-x: auto;
        }

        .sidebar-menu a.sidebar-link {
  display: block;
  padding: 10px;
  background-color: #3498db; /* Blue */
  color: #fff; /* White */
  text-decoration: none;
}

.sidebar-menu a.sidebar-link:hover {
  background-color: #2980b9; /* Dark blue */
}
        table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  font-family: Arial, sans-serif;
  background-color: #fff;
  color: #333;
}

th,
td {
  padding: 15px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

th {
  font-weight: bold;
  background-color: #eee;
}
table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  font-family: Arial, sans-serif;
  background-color: #fff;
  color: #333;
}

th,
td {
  padding: 15px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

th {
  font-weight: bold;
  background-color: lightseagreen; /* blue color */
  color: #fff; /* white text color */
}

        /* Media queries */
        @media(max-width:768px) {
            .content {
                margin-left: 0;
                padding-top: 70px;
            }

            .sidebar {
                display: none;
            }
        }
        
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md fixed-top">
        <a class="navbar-brand" href="#">SB Hospital Patient Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <span class="navbar-text">
                        Logged in as <strong><a href="details.php"><?php echo $name ?></strong></a>
                    </span>
                </li>
            </ul>
        </div>
    </nav>
        <!-- Sidebar -->
    <div class="sidebar">
        <!--<h2 class="sidebar-heading">Admin Dashboard Tables</h2>-->
        <ul class="sidebar-menu">
            <li class="sidebar-menu-item">
                <a href="#patient-table" class="sidebar-link">Ambulance Records</a>
            </li>
            <li class="sidebar-menu-item">
                <a href="#doctor-table" class="sidebar-link">Doctor's History</a>
            </li>
            <li class="sidebar-menu-item">
                <a href="#medicine-table" class="sidebar-link">Order History</a>
            </li>
            <li class="sidebar-menu-item">
                <a href="#medicine-order-table" class="sidebar-link">Lab Test Reports</a>
            </li>
            <li class="sidebar-menu-item">
                <a href="#appointment-table" class="sidebar-link">Doctor's Comment</a>
            </li>
            <li class="sidebar-menu-item">
                <a href="logout.php" class="sidebar-logout" onclick="">Logout</a>
            </li>
        </ul>
    </div>

    <div class="content">
   
        <div id="patient-table" class="table-container">
            <h2 class="table-heading">Ambulance</h2>
            <div class="table-responsive">
              <table class="data-table">
                  <thead>
                      <tr>
                          <th>Location</th>
                          <th>Type</th>
                          <th>Requested At</th>
                          <th>Comment</th>
                      </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <?php
                  while($row = mysqli_fetch_assoc($result))
                  
                  {
                    ?>
                          <td><?php echo $row['location'] ?></td>
                          <td><?php echo $row['type'] ?></td>
                          <td><?php echo $row['requested_at'] ?></td>
                          <td><?php echo $row['comments'] ?></td>
                      </tr>
                      <?php
                  }
                    ?>
                  </tbody>
              </table>
            </div>
            <a href="emergency.php"><button type="button" class="btn btn-primary mt-2" >Request Ambulance</button></a>
        </div>
    
    </div>

    <div class="content">
   
        <div id="doctor-table" class="table-container">
            <h2 class="table-heading">Appointments</h2>
            <div class="table-responsive">
              <table class="data-table">
                  <thead>
                      <tr>
                          <th>Booking Id</th>
                          <th>Specialist</th>
                          <th>Doctor Name</th>
                          <th>Date</th>
                          <th>Time</th>
                      </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <?php
                  while($row = mysqli_fetch_assoc($result2))
                  
                  {
                    ?>
                          <td><?php echo $row['bookingid'] ?></td>
                          <td><?php echo $row['specialist'] ?></td>
                          <td><?php echo $row['doctor'] ?></td>
                          <td><?php echo $row['datee'] ?></td>
                          <td><?php echo $row['timee'] ?></td>
                      </tr>
                      <?php
                  }
                    ?>
                  </tbody>
              </table>
            </div>
            <a href="bookappoinment.php">"<button type="button" class="btn btn-primary mt-2" >Add Appointment</button></a>
        </div>
    
    </div>


    <div class="content">
    
    <div id="medicine-table" class="table-container">
        <h2 class="table-heading">Order History</h2>
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>Cart Total</th>
                        <th>GST rate</th>
                        <th>GST Ammount</th>
                        <th>Total Amount</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                <?php
                while($row = mysqli_fetch_assoc($result3))
                
                {
                ?>
                        <td><?php echo $row['orderid'] ?></td>
                        <td><?php echo $row['cart_total'] ?></td>
                        <td><?php echo $row['gst_rate'] ?></td>
                        <td><?php echo $row['gst_amount'] ?></td>
                        <td><?php echo $row['total_amount'] ?></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
        <a href="buymedicines.php">"<button type="button" class="btn btn-primary mt-2" >Buy Medicines</button></a>
    </div>

</div>


<div class="content">
    
    <div id="medicine-order-table" class="table-container">
        <h2 class="table-heading">Lab Tests</h2>
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Booking Id</th>
                        <th>Test type</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Report</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                <?php
                while($row = mysqli_fetch_assoc($result4))
                
                {
                ?>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['test_type'] ?></td>
                        <td><?php echo $row['date'] ?></td>
                        <td><?php echo $row['time'] ?></td>
                        <td><?php echo $row['report'] ?></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
        <a href="labtest.php">"<button type="button" class="btn btn-primary mt-2" >Book Lab Tests</button></a>
    </div>

</div>

    <!-- JavaScript imports -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // DataTable setup
        $(document).ready(function() {
            $('.data-table').DataTable();
        });
    </script>
</body>
</html>