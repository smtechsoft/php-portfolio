<?php

use App\Services\DbQuery;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $content = $_POST['content'];
    $slug = $_POST['slug'];



    $db = new DbQuery();

    $getItem = $db->findBySlug('pricing_plans', $slug);
    if (!$getItem) {
        header('Location: /admin/pricing?error=Pricing plan not found');
        exit;
    }
    $result = $db->update(
        'pricing_plans',
        $getItem['row']->id,
        [
            'name' => $name,
            'price' => $price,
            'content' => json_encode($content),
        ]
    );

    if ($result) {
        header('Location: /admin/pricing?success=Pricing plan updated successfully');
        exit;
    } else {
        header('Location: /admin/pricing/edit/' . $slug . '?error=Failed to update pricing plan');
        exit;
    }
}
