<?php
session_start();
include 'db.php';
?>
<!doctype html>
<html lang="de">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="index.css" />
    <title>Online-Museum der Grundschule</title>
  </head>
  <body>
    <header>
      <div class="logo">🎨 Online-Museum</div>
      <nav>
        <a href="#">Start</a>
        <a href="galerie.php">Galerie</a>
        <a href="über-uns.php">Über uns</a>
        <?php
          if (!isset($_SESSION['teacher_logged_in'])) {
              ?>
                <a href="login.php">Lehrer Login</a>
              <?php
          }else{
              ?>
                <a href="upload.php">Neues Bild</a>
                <a href="logout.php">Logout</a>
              <?php
          }
        ?>
        
      </nav>
    </header>

    <section class="hero">
      <div class="hero-text">
        <h1>Das digitale Museum der Grundschule</h1>
        <p>
          Entdecke kreative Kunstwerke der Schüler. Lehrer können Bilder
          hochladen, Eltern können stöbern, lesen und ihre Lieblingsbilder
          liken.
        </p>

        <div class="hero-buttons">
          <a href="galerie.php" class="btn btn-primary">Galerie ansehen</a>
          <a href="über-uns.php" class="btn btn-secondary">Mehr erfahren</a>
        </div>
      </div>

      <div class="hero-image">
        <div class="museum-card">
          <img
            src="https://images.unsplash.com/photo-1513364776144-60967b0f800f?auto=format&fit=crop&w=900&q=80"
            alt="Kinderkunstwerk"
          />
          <div class="card-content">
            <h3>Mein Regenbogenhaus</h3>
            <p>Ein buntes Bild aus Klasse 2a.</p>
            <div class="likes">❤️ 24 Likes</div>
          </div>
        </div>
      </div>
    </section>

    <section class="features">
      <h2>Was bietet das Online-Museum?</h2>

      <div class="feature-grid">
        <div class="feature-box">
          <h3>📷 Bilder hochladen</h3>
          <p>Lehrer können Schülerbilder einfach in die Galerie stellen.</p>
        </div>

        <div class="feature-box">
          <h3>❤️ Likes sammeln</h3>
          <p>Eltern können Kunstwerke liken und unterstützen.</p>
        </div>

        <div class="feature-box">
          <h3>📝 Beschreibung lesen</h3>
          <p>Zu jedem Bild kann ein kleiner Text angezeigt werden.</p>
        </div>

        <div class="feature-box">
          <h3>🏫 Klassen entdecken</h3>
          <p>Filtere Bilder nach Klassen oder Projekten.</p>
        </div>
      </div>
    </section>

    <footer>
      <p>© 2026 Online-Museum der Grundschule</p>
    </footer>
  </body>
</html>
