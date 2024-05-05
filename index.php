<?php
// Start the session
session_start();

// Check if the user is already logged in
if (isset($_SESSION['username'])) {
    // Redirect to the appropriate page based on user access level
    switch ($_SESSION['hak_akses']) {
        case 'Admin':
            require 'app/config/config.php';
            require 'app/libs/application.php';
            require 'app/libs/controller.php';

            $app = new Application();
            exit;
        case 'Supplier':
            header('Location: supplier_home.php');
            exit;
        case 'Pelanggan':
            header('Location: pelanggan_home.php');
            exit;
        default:
            echo "Invalid access level";
            exit;
    }
}

// Define database connection parameters
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "tk4";

// Create connection
$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle login form submission
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to authenticate user
    $sql = "SELECT * FROM pengguna WHERE namapengguna='$username' AND password='$password'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $idakses = $row['IdAkses'];
        
        $gethakakses = "SELECT * FROM hakakses where idakses = '$idakses'";    
        $result_hakakses = mysqli_query($conn, $gethakakses);
        $row_akses = mysqli_fetch_assoc($result_hakakses);

        // Store user data in session
        $_SESSION['username'] = $row['NamaPengguna'];
        $_SESSION['hak_akses'] = $row_akses['NamaAkses'];
        
        // Redirect based on user access level
        switch ($row_akses['NamaAkses']) {
            case 'Admin':
                require 'app/config/config.php';
                require 'app/libs/application.php';
                require 'app/libs/controller.php';

                $app = new Application();
                exit;
            case 'Supplier':
                header('Location: supplier_home.php');
                exit;
            case 'Pelanggan':
                header('Location: pelanggan_home.php');
                exit;
            default:
                echo "Invalid access level";
                exit;
        }
    } else {
        // Redirect with error message
        header('Location: index.php?error=1');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body {
            background-image: url('background.png'); /* Replace with your background image URL */
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login-form {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .login-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }

        .login-form button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-form button:hover {
            background-color: #45a049;
        }

        .login-form .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-form">
            <h2>Login</h2>

            <?php if (isset($_GET['error'])): ?>
                <p class="error">Username atau password salah!</p>
            <?php endif; ?>

            <form action="" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Login</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
