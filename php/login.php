<?php
session_start();

$error = "";

// Gemeinsames Lehrer-Passwort
$teacherPassword = "grundschule2026";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $password = $_POST['password'];

    if ($password === $teacherPassword) {
        $_SESSION['teacher_logged_in'] = true;
        header("Location: upload.php");
        exit;
    } else {
        $error = "Falsches Passwort";
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lehrer Login</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #fdf6ec, #e9f5ff);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-box {
            background: white;
            padding: 50px;
            border-radius: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.12);
            width: 400px;
            text-align: center;
        }

        h1 {
            margin-bottom: 10px;
            color: #ff8a00;
        }

        p {
            color: #666;
            margin-bottom: 30px;
        }

        input {
            width: 100%;
            padding: 15px;
            border-radius: 12px;
            border: 1px solid #ddd;
            margin-bottom: 20px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 12px;
            background: #ff8a00;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #e77700;
        }

        .error {
            color: red;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h1>🎨 Lehrer Login</h1>
    <p>Bitte Passwort eingeben</p>

    <?php if($error): ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
        <input type="password" name="password" placeholder="Passwort" required>
        <button type="submit">Einloggen</button>
    </form>
</div>

</body>
</html>
