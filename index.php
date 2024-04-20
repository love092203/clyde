<?php

session_start();
// print_r($_SESSION);

if(isset($_SESSION["user_id"]))
{
  $mysqli = require __DIR__ . "/database.php";
  $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
  $result = $mysqli->query($sql);
  $user = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Home Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url("your-background-image.jpg") no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }


        .container {
            width: 90%;
            max-width: 300px;
            background-color: #E0F2F1; /* Light blue background color */
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .container:before {
            content: '';
            position: absolute;
            top: -20px;
            left: -20px;
            right: -20px;
            bottom: -20px;
            background-color: #E0F2F1; /* Same light blue color */
            z-index: -1;
            opacity: 0.5; /* Adjust the opacity as needed */
            border-radius: 10px;
        }

        .background-design {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("your-background-design-image.png") repeat; /* Adjust background design image */
            opacity: 0.7; /* Adjust opacity here */
            border-radius: 8px;
        }

        h1 {
            color: #333333;
            margin-bottom: 30px;
            font-size: 24px;
        }

        p {
            margin-bottom: 20px;
            font-size: 16px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
  <div class="container">
    <h1>Home Page</h1>

    <?php if(isset($user)): ?>
      <p>Hello, <?= htmlspecialchars($user["username"]); ?>. You are now logged In.</p>
      <p><a href="logout.php">Logout</a></p>
    <?php else: ?>
      <p>Welcome! Please <a href="login.php">Login</a> or <a href="signup.php">SignUp</a></p>
    <?php endif; ?>

  </div>
</body>

</html>
