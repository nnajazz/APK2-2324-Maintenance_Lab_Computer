<?php
include "function.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id_tipe = $_POST['id_tipe'];

    $result = register($username, $password, $id_tipe);
    if ($result === true) {
        echo "<script>
           alert('Registrasi berhasil!');
           window.location.href = 'login.php';
       </script>";
    } else {
        echo "<script>
           alert('Registrasi gagal!');
       </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            background-color: #add8e6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .register-container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 350px;
        }

        h2 {
            color: #0073e6;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        input,
        select,
        button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #5dade2;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #0073e6;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #005bb5;
        }

        h5 {
            margin-top: 10px;
        }

        h5 a {
            color: #0073e6;
            text-decoration: none;
        }

        label {
            display: block;
            text-align: left;
            width: 100%;
            font-weight: bold;
            margin-top: 10px;
        }


        h5 a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="register-container">
        <h2>Register</h2>
        <form method="POST">
            <label for="username">Username / Email</label>
            <input type="text" id="username" name="username" placeholder="Username / Email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Password" required>

            <label for="id_tipe">Select Type:</label>
            <select id="id_tipe" name="id_tipe">
                <option value="1">Admin</option>
                <option value="2">Supervisor</option>
                <option value="3">Petugas</option>
            </select>

            <button type="submit">Register</button>

            <h5>Do you have an account? <a href="login.php">login</a></h5>
        </form>
    </div>

</body>

</html>