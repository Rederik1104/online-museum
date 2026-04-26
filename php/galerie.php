<?php
session_start();
include 'db.php';

// Bild löschen (nur Lehrer)
if (isset($_POST['delete_id']) && isset($_SESSION['teacher_logged_in'])) {
    $id = intval($_POST['delete_id']);

    // Bildpfad holen
    $res = $conn->query("SELECT image_path FROM artworks WHERE id=$id");
    if ($res && $row = $res->fetch_assoc()) {
        if (file_exists($row['image_path'])) {
            unlink($row['image_path']);
        }
    }

    $conn->query("DELETE FROM artworks WHERE id=$id");
}

$result = $conn->query("SELECT * FROM artworks ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galerie | Online Museum</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #fdf6ec, #e9f5ff);
            min-height: 100vh;
        }

        header {
            background: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #ff8a00;
        }

        .nav a {
            margin-left: 20px;
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }

        .nav a:hover {
            color: #ff8a00;
        }

        h1 {
            text-align: center;
            margin: 40px 0;
            font-size: 40px;
            color: #333;
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            padding: 0 40px 60px 40px;
        }

        .card {
            background: white;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            transition: 0.3s;
            cursor: pointer;
            position: relative;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .content {
            padding: 20px;
        }

        .content h3 {
            margin-bottom: 10px;
            color: #333;
        }

        .content p {
            color: #666;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .likes {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .like-btn {
            background: #ff8a00;
            color: white;
            border: none;
            padding: 8px 14px;
            border-radius: 12px;
            cursor: pointer;
            font-weight: bold;
        }

        .count {
            font-weight: bold;
            color: #ff4b6e;
        }

        .delete-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: red;
            color: white;
            border: none;
            padding: 6px 10px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 12px;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.8);
            justify-content: center;
            align-items: center;
        }

        .modal img {
            max-width: 90%;
            max-height: 90%;
            border-radius: 20px;
        }

        .close {
            position: absolute;
            top: 20px;
            right: 30px;
            font-size: 40px;
            color: white;
            cursor: pointer;
        }

    </style>
</head>
<body>

<header>
    <div class="logo">🎨 Online Museum</div>
    <div class="nav">
        <a href="index.php">Start</a>
        <a href="upload.php">Lehrer Upload</a>
    </div>
</header>

<h1>🎨 Galerie der Schüler</h1>

<div class="gallery">

<?php if($result && $result->num_rows > 0): ?>

    <?php while($row = $result->fetch_assoc()): ?>

        <div class="card" onclick="openModal('<?= $row['image_path'] ?>')">
            <img src="<?= $row['image_path'] ?>">

            <?php if(isset($_SESSION['teacher_logged_in'])): ?>
                <form method="POST">
                    <input type="hidden" name="delete_id" value="<?= $row['id'] ?>">
                    <button class="delete-btn" onclick="event.stopPropagation(); return confirm('Bild wirklich löschen?')">🗑</button>
                </form>
            <?php endif; ?>

            <div class="content">
                <h3><?= htmlspecialchars($row['title']) ?></h3>
                <p><?= htmlspecialchars($row['description']) ?></p>

                <div class="likes">
                    <span class="count">❤️ <?= $row['likes'] ?></span>
                </div>
            </div>
        </div>

    <?php endwhile; ?>

<?php else: ?>

    <div style="text-align:center; margin-top:80px; color:#777;">
        Noch keine Bilder vorhanden 🎨
    </div>

<?php endif; ?>

</div>

<div id="modal" class="modal" onclick="closeModal()">
    <span class="close">&times;</span>
    <img id="modalImg">
</div>

<script>
function openModal(src) {
    document.getElementById('modal').style.display = 'flex';
    document.getElementById('modalImg').src = src;
}

function closeModal() {
    document.getElementById('modal').style.display = 'none';
}
</script>

</body>
</html>
