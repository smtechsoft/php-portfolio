<?php

use App\Features\Admin\AdminBlog;

$blog = new AdminBlog();
$slug = $_GET['slug'] ?? '';
$blogData = $blog->getBlogBySlug($slug);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blog edit</title>
</head>

<body>
    <?php
    include('backend/admin/partials/header.php');
    ?>
    <form action="/request/backend/blog/update" method="post" enctype="multipart/form-data">
        <input type="text" name="slug" value="<?= $blogData->slug ?? '' ?>" hidden>
        <input type="text" name="title" value="<?= $blogData->title ?? '' ?>">
        <img src="/uploads/img/blogs/<?= $blogData->thumbnail ?? '' ?>" alt="">
        <input type="file" name="thumbnail">
        <input type="submit" value="update blog">
    </form>
</body>

</html>