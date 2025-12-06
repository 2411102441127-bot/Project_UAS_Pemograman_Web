<?php
session_start();
include "koneksi.php";

if(isset($_POST['login'])){
    $user = $_POST['username'];
    $pass = md5($_POST['password']);

    $cek = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$user' AND password='$pass'");

    if(mysqli_num_rows($cek) > 0){
        $_SESSION['login'] = true;
        header("location:../admin/dashboard.php");
    } else {
        echo "<script>alert('Username atau password salah!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Sistem Barang</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            background: #0f1117;
            font-family: Arial, sans-serif;
            color: #fff;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            background: #1b1f2a;
            padding: 35px;
            width: 350px;
            border-radius: 10px;
            box-shadow: 0 0 25px rgba(0,0,0,0.4);
            text-align: center;
        }

        .login-box h2 {
            margin-bottom: 20px;
            font-weight: 600;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            background: #252a38;
            border: 1px solid #32394a;
            border-radius: 6px;
            color: #fff;
        }

        input::placeholder {
            color: #a0a8b9;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #3e8cff;
            border: none;
            color: white;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 10px;
            transition: 0.2s;
        }

        button:hover {
            background: #2e6fd4;
        }

        .footer {
            margin-top: 15px;
            font-size: 13px;
            color: #aaa;
        }
    </style>

</head>
<body>

<div class="login-box">
    <h2>Login Sistem Barang</h2>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit" name="login">Login</button>
    </form>

    <div class="footer">© Sistem Pendataan Barang</div>
</div>

</body>
</html>

