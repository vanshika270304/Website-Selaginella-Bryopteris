<?php
include 'db.php';

// Handle form submission
if(isset($_POST['update'])){
    $id = $_POST['doctor_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $speciality = $_POST['speciality'];
    $experience = $_POST['years_of_experience'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $query = "UPDATE doctor_details SET first_name='$first_name', last_name='$last_name', speciality='$speciality', gender='$gender', years_of_experience='$experience',  email='$email', phone_number='$phone_number', address='$address' WHERE doctor_id=$id";
    $result = mysqli_query($con,$query);

    if($result){
        $message = "Update successful";
    } else {
        $error = "Connection Error";
    }
}

// Load doctor data
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM doctor_details WHERE doctor_id=$id";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result) == 1){
        $doctor = mysqli_fetch_assoc($result);
    }
    else {
        $error = "doctor not found";
    }
}
?>

<html>
    <head>
        <title>Edit Doctor | Hospital Management System</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>

    <body>
        <div class="container py-5">
            <h2 class="mb-4">Edit Patient</h2>

            <!-- Display error message if any -->
            <?php if(isset($error)): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <!-- Display success message if any -->
            <?php if(isset($message)): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <!-- HTML form for updating doctor information -->
            <form method="post" action="edit_doctor.php">
                <input type="hidden" name="doctor_id" value="<?php echo $doctor['doctor_id']; ?>">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" name="first_name" value="<?php echo $doctor['first_name']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" name="last_name" value="<?php echo $doctor['last_name']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" class="form-control" name="age" value="<?php echo $doctor['age']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select name="gender" class="form-control" required>
                        <option value="male" <?php if($doctor['gender'] == 'male'){ echo 'selected'; } ?>>Male</option>
                        <option value="female" <?php if($doctor['gender'] == 'female'){ echo 'selected'; } ?>>Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $doctor['email']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" class="form-control" name="phone_number" value="<?php echo $doctor['phone_number']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" value="<?php echo $doctor['address']; ?>" required>
                </div>
                <button type="submit" name="update" class="btn btn-primary">Update</button>
                <a href="admin_dashboard.php#patient-table" class="btn btn-secondary">Cancel</a>
            </form>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"
            integrity="sha384-uYXR/S7TEA+Cc0haCP7hgj2E1aaVzBpa0iNXnXLAJo59Qs1LMPMtjZmKHvLNCLa"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>