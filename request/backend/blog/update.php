<?php

use App\Services\DbQuery;

$db =  new DbQuery();
$title = $_POST['title'] ?? '';
$slug = $_POST['slug'] ?? '';
$thumbnail = $_FILES['thumbnail'] ?? null;

$getItem = $db->findBySlug('blogs', $slug);
if ($getItem['rowCount'] > 0) {
    $updateData = [
        'title' => $title,
    ];

    if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = dirname(__DIR__, 3) . '/uploads/img/blog/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Delete old thumbnail
        $oldThumbnail = $getItem['row']->thumbnail;
        if ($oldThumbnail) {
            $oldFilePath = dirname(__DIR__, 3) . $oldThumbnail;
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }

        $fileInfo = pathinfo($_FILES['thumbnail']['name']);
        $extension = $fileInfo['extension'];
        $uniqueName = time() . '_' . uniqid() . '.' . $extension;
        $targetFile = $uploadDir . $uniqueName;

        if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], $targetFile)) {
            $updateData['thumbnail'] = '/uploads/img/blog/' . $uniqueName;
        }
    }

    $db->update('blogs', $getItem['row']->id, $updateData);
    header('Location: /admin/blogs?success=Blog updated successfully');
} else {
    die('Blog not found');
}
