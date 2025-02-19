<?php
include "function.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $role = login($username, $password);
    if ($role) {
        switch ($role) {
            case "admin":
                echo "<script>
                   alert('Login berhasil sebagai Admin!');
                   window.location.href = '../admin/index.php';
               </script>";
                break;
            case "supervisor":
                echo "<script>
                   alert('Login berhasil sebagai Supervisor!');
                   window.location.href = '../supervisor/index.php';
               </script>";
                break;
            case "petugas":
                echo "<script>
                   alert('Login berhasil sebagai Petugas!');
                   window.location.href = '../petugas/index.php';
               </script>";
                break;
        }
        exit();
    } else {
        echo "<script>
           alert('Login gagal! Periksa username atau password.');
       </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Styling dasar */
        body {
            background-color: #add8e6;
            /* Warna biru muda */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .login-container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 300px;
        }

        h2 {
            color: #0073e6;
            /* Biru lebih tua untuk kontras */
            margin-bottom: 20px;
        }

        input {
            width: 93%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #5dade2;
            /* Biru lembut */
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background-color: #0073e6;
            /* Biru tua */
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        button:hover {
            background-color: #005bb5;
            /* Biru yang lebih gelap saat hover */
        }

        label {
            display: block;
            text-align: left;
            width: 100%;
            font-weight: bold;
            margin-top: 10px;
        }

        .error {
            color: red;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h2>Login</h2>
        <form method="POST">

            <label for="username">Username / Email</label>
            <input type="text" name="username" placeholder="Username / Email" required><br>

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password" required><br>

            <button type="submit">Login</button>
            <h5>Don't have an account? <a href="register.php">register</a> now.</h1>
        </form>
    </div>

</body>

</html>