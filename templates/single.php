<?php
// use App\src\DAO\BlogPostDAO; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Mon blog</title>
</head>

<body>
<div>
    <h1>Mon blog</h1>
    <p>En construction</p>
    <div>
        <h2><?php echo($blogPost->getTitle()); ?></h2>
        <div><?php echo($blogPost->getPost()); ?></div>
        <div>Posté le: <?php echo($blogPost->getDatePosted()) ?></div>
    </div>
    <a href="../public/index.php">Retour à l'accueil</a>

</div>
</body>
</html>