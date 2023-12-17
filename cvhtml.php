<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cv.css">
    <title>CV Generator</title>
</head>
<body>
<div class="page">
    <div class="banner">
        <div class="left">
            <div class="image">
                <img src="images/<?php echo $picture; ?>" alt="Photo">
            </div>
        </div>
        <div class="right">
            <div>
                <h1><?php echo $fullname; ?></h1>
                <?= $_POST['fullname']?>
                <h3>(<?php echo $profession; ?>)</h3>
                <?php echo "Bonjour"; ?>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="section">
            <h2>Skills</h2>
            <ul class="list">
                <li><?php echo $competences; ?></li>
            </ul>
        </div>
        <div class="section1">
            <h2>Formations</h2>
            <p><?php echo $formation; ?></p>
        </div>
        <div class="section2">
            <h2>Experience</h2>
            <p><?php echo $experience; ?></p>
            <h2>Certificates</h2>
            <ul>
                <li><?php echo $certificate1; ?></li>
                <li><?php echo $certificate2; ?></li>
                <li><?php echo $certificate3; ?></li>
            </ul>
        </div>
    </div>
    <div class="sidebar">
        <div class="section1">
            <h2>Objectif</h2>
            <p><?php echo $objective; ?></p>
        </div>
    </div>
    <div class="footer">
        Mobile: <?php echo $mobile; ?> / Email: <?php echo $email; ?>
    </div>
</div>
</body>
</html>