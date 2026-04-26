<?php
session_start();

if (!isset($_SESSION['teacher_logged_in'])) {
    header("Location: index.php");
    exit;
}

include 'db.php';

$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = $_POST['title'];
    $description = $_POST['description'];

    $imageName = time() . '_' . basename($_FILES['image']['name']);
    $targetPath = "uploads/" . $imageName;

    move_uploaded_file($_FILES['image']['tmp_name'], $targetPath);

    $stmt = $conn->prepare("INSERT INTO artworks (title, description, image_path) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $description, $targetPath);
    $stmt->execute();

    $success = "Bild erfolgreich hochgeladen!";
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lehrer Upload | Online Museum</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #fef6ea, #edf6ff);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
        }

        .dashboard {
            background: white;
            width: 100%;
            max-width: 900px;
            border-radius: 35px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.12);
            overflow: hidden;
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        .left-side {
            background: linear-gradient(135deg, #ff9d2f, #ff7a00);
            color: white;
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .left-side h1 {
            font-size: 42px;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .left-side p {
            font-size: 18px;
            line-height: 1.7;
            opacity: 0.95;
        }

        .right-side {
            padding: 60px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .header h2 {
            font-size: 30px;
            color: #333;
        }

        .logout-btn {
            text-decoration: none;
            background: #f2f2f2;
            padding: 10px 18px;
            border-radius: 12px;
            color: #333;
            font-weight: bold;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: #e6e6e6;
        }

        .success {
            background: #e7f8ed;
            color: #1d8a43;
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 25px;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #444;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 16px;
            font-size: 15px;
            transition: 0.3s;
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: #ff8a00;
            box-shadow: 0 0 0 4px rgba(255,138,0,0.15);
        }

        textarea {
            min-height: 130px;
            resize: vertical;
        }

        .upload-btn {
            width: 100%;
            background: #ff8a00;
            border: none;
            color: white;
            padding: 18px;
            border-radius: 18px;
            font-size: 17px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .upload-btn:hover {
            background: #e87700;
            transform: translateY(-2px);
        }

        .tip-box {
            margin-top: 30px;
            background: #fff6eb;
            border-radius: 18px;
            padding: 20px;
            color: #666;
            font-size: 14px;
            line-height: 1.6;
        }

        @media (max-width: 850px) {
            .dashboard {
                grid-template-columns: 1fr;
            }

            .left-side,
            .right-side {
                padding: 40px;
            }
        }
    </style>
</head>
<body>

<div class="dashboard">

    <div class="left-side">
        <h1>🎨 Lehrer Upload</h1>
        <p>
            Lade neue Kunstwerke hoch, damit Eltern die kreativen Bilder der Schüler im digitalen Museum ansehen und liken können.
        </p>
    </div>

    <div class="right-side">

        <div class="header">
            <h2>Neues Bild</h2>
            <a href="logout.php" class="logout-btn">Logout</a>
            <a href="index.php" class="logout-btn">Start</a>
        </div>

        <?php if($success): ?>
            <div class="success"><?= $success ?></div>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label>Titel</label>
                <input type="text" name="title" placeholder="z. B. Mein Regenbogenhaus" required>
            </div>

            <div class="form-group">
                <label>Beschreibung</label>
                <textarea name="description" placeholder="Kurze Beschreibung zum Bild..."></textarea>
            </div>

            <div class="form-group">
                <label>Bild auswählen</label>
                <input type="file" name="image" required>
            </div>

            <button type="submit" class="upload-btn">
                Bild hochladen
            </button>

        </form>

        <div class="tip-box">
            💡 Tipp: Nutze kurze Titel und eine kleine Beschreibung, damit Eltern die Bilder leichter entdecken können.
        </div>

    </div>

</div>

</body>
</html>
