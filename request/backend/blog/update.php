<?php

use App\Services\DbQuery;

$db =  new DbQuery();
$title = $_POST['title'] ?? '';
$slug = $_POST['slug'] ?? '';
$thumbnail = $_FILES['thumbnail'] ?? null;

$getItem = $db->findBySlug('blogs', $slug);
if ($getItem['rowCount'] > 0) {
    $db->update('blogs', $getItem['row']->id, [
        'title' => $title,
    ]);
    header('Location: /admin/blogs?success=Blog updated successfully');
} else {
    die('Blog not found');
}
// echo $getItem['row']->id;
// print_r($getItem);