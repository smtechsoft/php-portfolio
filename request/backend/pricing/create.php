<?php

use App\Services\DbQuery;
use App\Services\SlugService;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $content = $_POST['content'];
    $slugService = new SlugService();
    $slug = $slugService->generate('pricing_plans', $name);

    $db = new DbQuery();
    $result = $db->insert('pricing_plans', [
        'name' => $name,
        'slug' => $slug,
        'price' => $price,
        'content' => json_encode($content),
    ]);

    if ($result) {
        header('Location: /admin/pricing?success=Pricing plan created successfully');
        exit;
    } else {
        header('Location: /admin/pricing/create?error=Failed to create pricing plan');
        exit;
    }
}