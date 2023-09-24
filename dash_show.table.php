<!DOCTYPE html>
<html>
<head>
    <title>Table List</title>
    <style type="text/css">
        table {
            border-collapse: collapse;
            width: 100%;
            font-family: Arial, sans-serif;
            border: 1px solid #ddd;
            text-align: center;
        }
        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #337ab7;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
<?php
  // Establish DB connection
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "hospital";

  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Check connection
  if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
  }

  // Retrieve list of tables
  $sql = "SHOW TABLES";
  $result = mysqli_query($conn, $sql);

  echo "<table>";
  echo "<tr><th>Table Name</th></tr>";

  if (mysqli_num_rows($result) > 0) {
     // Output data of each row
     while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>". $row["Tables_in_your_database_name"] . "</td></tr>";
     }
  } else {
     echo "<tr><td>0 results</td></tr>";
  }

  echo "</table>";

  // Close DB connection
  mysqli_close($conn);
?>
</body>
</html>