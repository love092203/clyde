<?php
include 'database.php';
$is_invalid = false;
$message = "";
if($_SERVER["REQUEST_METHOD"] === "POST")
{
    $email = $_POST['email'];
    $password = $_POST['password'];
//   if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    // $is_invalid = true;
//   } else {
    $stmt = $mysqli->prepare("SELECT id, password_hash FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $user = $result->fetch_assoc();

    if($user) {
        // Debugging output
        var_dump($password); // Check the password entered by the user
        var_dump($user['password_hash']);
        if (password_verify($password, $user['password_hash'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            session_regenerate_id();
            header("Location: index.php");
            exit();
        } else {
            $is_invalid = true;
            $message = "Incorrect Password";
        }
    } else {
        $is_invalid = true;
        $message = "Email not found";
    }   
}


// }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url("image/background.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .login-container {
            position: relative;
            background-color: #E0F2F1; /* Soothing light blue */
            border-radius: 8px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 300px;
            width: 100%;
        }

        .login-container:before {
            content: '';
            position: absolute;
            top: -20px;
            left: -20px;
            right: -20px;
            bottom: -20px;
            background-color: #E0F2F1; /* Same light blue color */
            z-index: -1;
            opacity: 0.5; /* Adjust the opacity as needed */
            border-radius: 8px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333333;
            margin-bottom: 30px;
        }

        input[type="email"],
        input[type="password"],
        button {
            width: 100%;
            padding: 14px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            background-color: #ffffff; /* White background for input fields */
            font-size: 16px;
            outline: none;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            background-color: #e0e0e0;
        }

        button {
            background-color: #64B5F6; /* Light blue button color */
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #42A5F5; /* Darker blue on hover */
        }

        p.error-message {
            color: #dc3545;
            text-align: center;
            margin-top: 10px;
            margin-bottom: 0;
        }

        .signup-link {
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
        }

        .signup-link a {
            color: #007bff;
            text-decoration: none;
        }

        .signup-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h1>Login</h1>

        <?php if ($is_invalid) : ?>
            <p class="error-message">Invalid email or password</p>
        <?php endif; ?>

        <form method="post">
            <input autocomplete="off" type="email" placeholder="Email" name="email" id="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
            <input autocomplete="off" type="password" placeholder="Password" name="password" id="password">
            <button type="submit">Login</button>
            <div class="signup-link">
                <p>Don't have an account? <a href="signup.php">Sign up</a></p>
            </div>
        </form>
    </div>
</body>

</html>
