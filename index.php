<?php
//connect to db

//echo $mysqli->host_info . "\n";
$mysqli = new mysqli("127.0.0.1", "root", "", "myform", 3306);
//echo $mysqli->host_info . "\n";

//$mysqli->query("CREATE TABLE feedtable(id INT)");

//if the request method is post->store the data in the db using sql query
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $feedback = $_POST['feedback'];

$query="INSERT INTO `feedtable` (`name`, `email`, `feedback`) VALUES ('$name', '$email', '$feedback')";
if ($mysqli->query($query) === TRUE) {
  echo "<div class='alert alert-success text-center' role='alert'>Feedback submitted successfully!</div>";
  echo "<script>setTimeout(() => { window.location.href = 'index.php'; }, 2000);</script>";
} else {
  echo "<div class='alert alert-danger text-center' role='alert'>Error: " . htmlspecialchars($mysqli->error) . "</div>";
}



}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Feedback Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <br>

  <h1 class="text-center ">Student Feedback Form :</h1>
  <br>
    
    <div class="container d-flex justify-content-center align-items-center ">
    <div class="col-md-6 p-3 shadow-lg rounded bg-light">

    <form action="/myforms/" method="post">
    <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" id="name" aria-describedby="name">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  
  

        <div class="mb-3">
            <label for="feedback" class="form-label">Feedback</label>
            <textarea class="form-control" name="feedback" id="feedback" rows="4" placeholder="Write your feedback here..."></textarea>
        </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>