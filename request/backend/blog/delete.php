<?php

use App\Services\DbQuery;

$db = new DbQuery();
$id = $_POST['id'] ?? null;

if ($id) {
    $blog = $db->find('blogs', $id);
    if ($blog['rowCount'] > 0) {
        $thumbnail = $blog['row']->thumbnail;
        if ($thumbnail) {
            $filePath = dirname(__DIR__, 3) . $thumbnail;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        $db->delete('blogs', $id);
        header('Location: /admin/blogs?success=Blog deleted successfully');
    } else {
        header('Location: /admin/blogs?error=Blog not found');
    }
} else {
    header('Location: /admin/blogs?error=Invalid Blog ID');
}
