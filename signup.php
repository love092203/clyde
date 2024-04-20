<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 28px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 14px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 16px;
            background-color: #fff; /* White background for input fields */
            padding-left: 20px; /* Adjusted padding for text input */
        }

        input[type="text"]::placeholder,
        input[type="email"]::placeholder,
        input[type="password"]::placeholder {
            color: #999; 
        }

        button {
            width: 100%;
            padding: 14px;
            background-color: #64B5F6; /* Light blue button color */
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s;
            position: relative; 
            text-align: center;
        }

        button:hover {
            background-color: #42A5F5; /* Darker hover color */
        }

        .signup-link {
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
            color: #333;
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
    <div class="container">
        <h1>Create an Account</h1>
        <form action="process_signup.php" method="POST" novalidate>
            <input autocomplete="off" type="text" placeholder="Username" name="username">
            <input autocomplete="off" type="email" placeholder="Email Address" name="email">
            <input autocomplete="off" type="password" placeholder="Create a Password" id="password" name="password">
            <input autocomplete="off" type="password" placeholder="Confirm Password" id="confirm_password" name="confirm_password">
            <button>Sign Up</button>
            <div class="signup-link">Already have an account? <a href="login.php">Log in</a></div>
        </form>
    </div>
</body>

</html>
