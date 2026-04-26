<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Über uns | Online Museum</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #fdf6ec, #e9f5ff);
            color: #333;
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

        nav a {
            margin-left: 20px;
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }

        nav a:hover {
            color: #ff8a00;
        }

        .hero {
            padding: 80px 10%;
            text-align: center;
        }

        .hero h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 20px;
            color: #666;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.7;
        }

        .section {
            padding: 60px 10%;
        }

        .section h2 {
            font-size: 34px;
            margin-bottom: 25px;
            text-align: center;
            color: #333;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            text-align: center;
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h3 {
            color: #ff8a00;
            margin-bottom: 15px;
        }

        .card p {
            color: #666;
            line-height: 1.6;
            font-size: 15px;
        }

        .highlight {
            background: white;
            margin: 60px auto;
            padding: 50px;
            max-width: 900px;
            border-radius: 30px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.08);
        }

        .highlight h2 {
            margin-bottom: 20px;
            color: #ff8a00;
        }

        .highlight p {
            line-height: 1.8;
            color: #555;
        }

        footer {
            text-align: center;
            padding: 30px;
            background: #222;
            color: white;
            margin-top: 60px;
        }

    </style>
</head>
<body>

<header>
    <div class="logo">🎨 Online Museum</div>
    <nav>
        <a href="index.php">Start</a>
        <a href="gallery.php">Galerie</a>
        <a href="upload.php">Lehrer Upload</a>
    </nav>
</header>

<section class="hero">
    <h1>Über unser Online-Museum</h1>
    <p>
        Unser digitales Museum zeigt die kreativen Kunstwerke der Schülerinnen und Schüler.
        Eltern können die Werke entdecken, liken und die Fantasie der Kinder erleben.
    </p>
</section>

<section class="section">
    <h2>Wie funktioniert das?</h2>

    <div class="cards">
        <div class="card">
            <h3>📷 Lehrer Upload</h3>
            <p>Lehrer laden Kunstwerke der Schüler einfach und sicher ins System hoch.</p>
        </div>

        <div class="card">
            <h3>🎨 Galerie</h3>
            <p>Alle Bilder werden in einer schönen digitalen Museumsgalerie angezeigt.</p>
        </div>

        <div class="card">
            <h3>❤️ Likes</h3>
            <p>Eltern können ihre Lieblingsbilder markieren und unterstützen.</p>
        </div>

        <div class="card">
            <h3>🔒 Sicherheit</h3>
            <p>Nur Lehrer können Inhalte hochladen, alles ist geschützt und kontrolliert.</p>
        </div>
    </div>
</section>

<section class="highlight">
    <h2>Unser Ziel</h2>
    <p>
        Das Online-Museum soll Kreativität sichtbar machen und Kindern zeigen,
        dass ihre Kunst wertvoll ist. Gleichzeitig ermöglicht es Eltern einen
        einfachen und sicheren Einblick in den Schulalltag.
        
        <br><br>
        Es verbindet Schule und Zuhause auf eine moderne und digitale Weise.
    </p>
</section>

<section class="section">
    <h2>Für wen ist das gedacht?</h2>

    <div class="cards">
        <div class="card">
            <h3>👩‍🏫 Lehrer</h3>
            <p>Verwalten und präsentieren Schülerarbeiten einfach online.</p>
        </div>

        <div class="card">
            <h3>👨‍👩‍👧 Eltern</h3>
            <p>Entdecken und unterstützen die kreativen Werke ihrer Kinder.</p>
        </div>

        <div class="card">
            <h3>🎒 Schüler</h3>
            <p>Sehen ihre eigenen Kunstwerke in einem echten digitalen Museum.</p>
        </div>
    </div>
</section>

<footer>
    <p>© 2026 Online-Museum der Grundschule</p>
</footer>

</body>
</html>
