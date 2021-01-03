
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

        <?php
        foreach($blogPosts as $blogPost) { ?>
            <div>
                <h2><a href="../public/index.php?route=blogpost&id=<?php echo($blogPost->getId()); ?>"><?php echo($blogPost->getTitle()); ?></a></h2>
                <div><?php echo($blogPost->getPost()); ?></div>
                <div>Posté le: <?php echo($blogPost->getDatePosted()); ?></div>
            </div>
        <?php
        } ?>
        
    </div>
</body>
</html>