<!DOCTYPE html>
<html>

<head>
  <title>Student Database</title>
  <link rel="stylesheet" href="Style.css">
</head>

<body>
  <h2>Student Form</h2>
  <form action="" method="POST">
    <fieldset>
      <legend>Student information:</legend>
      <br>
      <label for="Name">Name</label>
      <input type="text" name="name" required> <br>
      <label for="Age">Age</label>
      <input type="text" name="age" required> <br>
      <label for="Email">Email</label>
      <input type="email" name="email" placeholder="name@gmail.com" required><br>
      <label for="StudentID">Student ID</label>
      <input type="text" name="studentID" placeholder="03-2221-021356" required><br>
      <label for="Address">Address</label>
      <input type="text" name="address" required><br>
      <label for="Country">Country</label>
      <input type="text" name="country" required><br>
      <label for="PhoneNumber">Phone Number</label>
      <input type="tel" name="phoneNumber" required><br>
      <label for="BirthDate">Birth Date</label>
      <input type="date" name="dateOfBirth" required><br>
      <label for="PlaceOfBirth">Place of Birth</label>
      <input type="text" name="placeOfBirth" required><br>
      <label for="Gender">Gender</label>
      <select name="gender" required>
        <option value="">--Select Gender--</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      </select><br>
      <label for="BloodType">Blood Type</label>
      <select name="bloodType" required>
        <option value="">--Select Blood Type--</option>
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
      </select>
      <br>
      <label for="Language">Language</label>
      <select name="language" required>
        <option value="">--Select Language--</option>
        <option value="English">English</option>
        <option value="Tagalog">Tagalog</option>
      </select><br>
      <label for="Citizenship">Citizenship</label>
      <input type="text" name="citizenship" required><br>
      <br>
      <input type="submit" name="submit" value="Submit">
    </fieldset>
  </form>
</body>

</html>

<?php
include "db_connection.php";
if (isset($_POST['submit'])) {
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
  $sql = "INSERT INTO `students`(`name`, `age`, `email`, `studentID`, `address`, `country`, `phoneNumber`, `dateOfBirth`, `placeOfBirth`, `gender`, `bloodType`, `language`, `citizenship`) VALUES ('$name','$age','$email', '$studentId', '$address', '$country', '$phoneNumber', '$dateOfBirth', '$placeOfBirth', '$gender', '$bloodType', '$language', '$citizenship')";
  $result = $conn->query($sql);
  if ($result == TRUE) {
    echo "New record created successfully.";
    header('Location: read.php');
  } else {
    echo "Error:" . $sql . "<br>" . $conn->error;
  }
  $conn->close();
}
?>