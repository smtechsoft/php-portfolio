<?php

use App\Services\DbQuery;
use App\Services\SlugService;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $slugService = new SlugService();
    $slug = $slugService->generate('blogs', $title);
    $thumbnailPath = null;

    if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = dirname(__DIR__, 3) . '/uploads/img/blog/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $fileInfo = pathinfo($_FILES['thumbnail']['name']);
        $extension = $fileInfo['extension'];
        $uniqueName = time() . '_' . uniqid() . '.' . $extension;
        $targetFile = $uploadDir . $uniqueName;

        if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], $targetFile)) {
            $thumbnailPath = '/uploads/img/blog/' . $uniqueName;
        }
    }

    $db = new DbQuery();
    $result = $db->insert('blogs', [
        'title' => $title,
        'slug' => $slug,
        'thumbnail' => $thumbnailPath
    ]);

    if ($result === 'data inserted') {
        header('Location: /admin/blogs');
        exit;
    } else {
        echo "Error creating blog";
    }
}
