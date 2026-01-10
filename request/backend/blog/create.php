<?php

use App\Services\DbQuery;
use App\Services\SlugService;

$slug = new SlugService();
$db =  new DbQuery();
$title = $_POST['title'] ?? '';
$thumbnail = $_FILES['thumbnail'] ?? null;
$newSlug = '';
$thumName = '';

if (!empty($title)) {
    $newSlug = $slug->generate('blogs', $title);
}

if (isset($_FILES['thumbnail'])) {
    print_r($_FILES['thumbnail']);
    $thumName = '/uploads/img/blogs/';
}

$db->insert('blogs', [
    'title' => $title,
    'slug' => $newSlug,
    'thumbnail' => $thumName
]);
header('Location:/admin/blogs');
