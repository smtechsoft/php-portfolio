<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create new blog</title>
</head>

<body>
    <?php
    include('backend/admin/partials/header.php');
    ?>


    <form action="/request/backend/blog/create" method="post" enctype="multipart/form-data">
        <input type="text" name="title">
        <input type="file" name="thumbnail">
        <input type="submit" value="update blog">
    </form>
</body>

</html>