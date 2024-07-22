<?php
include "db_connection.php";
if (isset($_POST['update'])) {
    $stu_id = $_POST['stu_id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $studentId = $_POST['studentID'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $phoneNumber = $_POST['phoneNumber'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $placeOfBirth = $_POST['placeOfBirth'];
    $gender = $_POST['gender'];
    $bloodType = $_POST['bloodType'];
    $language = $_POST['language'];
    $citizenship = $_POST['citizenship'];
    $sql = "UPDATE students SET name='$name',age='$age',email='$email', studentID= '$studentId', address='$address', country='$country', phoneNumber='$phoneNumber', dateOfBirth= '$dateOfBirth', placeOfBirth='$placeOfBirth', gender='$gender', bloodType='$bloodType', language='$language', citizenship='$citizenship' WHERE id='$stu_id'";
    $result = $conn->query($sql);
    if ($result == TRUE) {
        echo "Record updated successfully.";
        header('Location: read.php');
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $stu_id = $_GET['id'];
    $sql = "SELECT * FROM students WHERE id='$stu_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $name = $row['name'];
            $age = $row['age'];
            $email = $row['email'];
            $studentId = $row['studentID'];
            $address = $row['address'];
            $country = $row['country'];
            $phoneNumber = $row['phoneNumber'];
            $dateOfBirth = $row['dateOfBirth'];
            $placeOfBirth = $row['placeOfBirth'];
            $gender = $row['gender'];
            $bloodType = $row['bloodType'];
            $language = $row['language'];
            $citizenship = $row['citizenship'];
        }
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="Style.css">
            <title>Update</title>
        </head>

        <body>
            <h2>Student Details Update Form</h2>
            <form action="" method="post">
                <fieldset>
                    <legend>Personal Information:</legend>
                    <label for="Name">Name</label>
                    <input type="text" name="name" value="<?php echo $name ?>"><br>
                    <input type="hidden" name="stu_id" value="<?php echo $id ?>">
                    <label for="Age">Age</label>
                    <input type="text" name="age" value="<?php echo $age ?>"><br>
                    <label for="Email">Email</label>
                    <input type="email" name="email" value="<?php echo $email ?>"><br>
                    <label for="StudentID">Student ID</label>
                    <input type="text" name="studentID" value="<?php echo $studentId ?>"><br>
                    <label for="Address">Address</label>
                    <input type="text" name="address" value="<?php echo $address ?>"><br>
                    <label for="Country">Country</label>
                    <input type="text" name="country" value="<?php echo $country ?>"><br>
                    <label for="PhoneNumber">Phone Number</label>
                    <input type="tel" name="phoneNumber" value="<?php echo $phoneNumber ?>"><br>
                    <label for="BirthDate">Birth Date</label>
                    <input type="date" name="dateOfBirth" value="<?php echo $dateOfBirth ?>"><br>
                    <label for="PlaceOfBirth">Place of Birth</label>
                    <input type="text" name="placeOfBirth" value="<?php echo $placeOfBirth ?>"><br>
                    <label for="Gender">Gender</label>
                    <select name="gender">
                        <option value="">--Select Gender--</option>
                        <option value="Male" <?php echo ($gender == 'Male') ? 'selected' : ''; ?>>Male</option>
                        <option value="Female" <?php echo ($gender == 'Female') ? 'selected' : ''; ?>>Female</option>
                    </select><br>
                    <label for="bloodType">Blood Type</label>
                    <select name="bloodType" id="bloodType">
                        <option value="">--Select Blood Type--</option>
                        <option value="A+" <?php echo ($bloodType == 'A+') ? 'selected' : ''; ?>>A+</option>
                        <option value="A-" <?php echo ($bloodType == 'A-') ? 'selected' : ''; ?>>A-</option>
                        <option value="B+" <?php echo ($bloodType == 'B+') ? 'selected' : ''; ?>>B+</option>
                        <option value="B-" <?php echo ($bloodType == 'B-') ? 'selected' : ''; ?>>B-</option>
                        <option value="AB+" <?php echo ($bloodType == 'AB+') ? 'selected' : ''; ?>>AB+</option>
                        <option value="AB-" <?php echo ($bloodType == 'AB-') ? 'selected' : ''; ?>>AB-</option>
                        <option value="O+" <?php echo ($bloodType == 'O+') ? 'selected' : ''; ?>>O+</option>
                        <option value="O-" <?php echo ($bloodType == 'O-') ? 'selected' : ''; ?>>O-</option>
                    </select><br>
                    <label for="Language">Language</label>
                    <select name="language">
                        <option value="">--Select Language--</option>
                        <option value="English" <?php echo ($language == 'English') ? 'selected' : ''; ?>>English</option>
                        <option value="Tagalog" <?php echo ($language == 'Tagalog') ? 'selected' : ''; ?>>Tagalog</option>
                    </select><br>
                    <label for="Citizenship">Citizenship</label>
                    <input type="text" name="citizenship" value="<?php echo $citizenship ?>"><br>
                    <br>
                    <input type="submit" value="Update" name="update">
                </fieldset>
            </form>
        </body>

        </html>
<?php
    } else {
        header('Location: read.php');
    }
}
?>