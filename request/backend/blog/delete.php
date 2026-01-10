<?php

use App\Services\DbQuery;

$db = new DbQuery();
$id = $_POST['id'] ?? null;

if ($id) {
    $db->delete('blogs', $id);
    header('Location: /admin/blogs?success=Blog deleted successfully');
} else {
    header('Location: /admin/blogs?error=Invalid Blog ID');
}
