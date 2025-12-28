<?php

use App\Features\Frontend\Blog;

$blog = new Blog();

$slug = $_GET['slug'] ?? '';
$blogData = $blog->getBlogBySlug($slug);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if ($blogData): ?>
        <h1>
            <?= $blogData->title; ?>
        </h1>
    <?php else: ?>
        <h1>Blog not found</h1>
    <?php endif; ?>
</body>

</html>