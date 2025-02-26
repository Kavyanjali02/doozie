<?php


// echo $mysqli->host_info . "\n";

$mysqli = new mysqli("127.0.0.1", "root", "", "myform", 3306);
//$mysqli->query("CREATE TABLE test(id INT)");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $insname=$_POST['insname'];
    $feedback = $_POST['feedback'];
  
  $query="INSERT INTO `feedbacktable` (`name`, `email`, `insname`, `feedback`) VALUES ('$name', '$email','$insname', '$feedback')";
  if ($mysqli->query($query) === TRUE) {
    echo "<div class='alert alert-success text-center' role='alert'>Feedback submitted successfully!</div>";
    echo "<script>setTimeout(() => { window.location.href = 'index.php'; }, 2000);</script>";
  } else {
    echo "<div class='alert alert-danger text-center' role='alert'>Error: " . htmlspecialchars($mysqli->error) . "</div>";
  }}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Compact Feedback Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 320px; /* Limits width for compact form */
            margin-top: 40px;
        }
        .form-control, .form-select, .btn {
            font-size: 14px; /* Smaller input text */
            padding: 5px; /* Less padding */
        }
        textarea {
            height: 50px; /* Reduce height of feedback box */
        }
    </style>
</head>
<body>

<div class="container">
    <h4 class="text-center mb-3">Feedback</h4>
    <form action="/myform/" method="post">
        <input id="name" name="name" type="text" class="form-control mb-2" placeholder="Your Name">
        <input id="email" name="email" type="email" class="form-control mb-2" placeholder="Your Email" required>
        <input id="insname" name="insname" type="text" class="form-control mb-2" placeholder="Instructor Name">
        <textarea id="feedback" name="feedback" class="form-control mb-2" placeholder="Your Feedback"></textarea>
        <button type="submit" class="btn btn-primary w-100">Submit</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
