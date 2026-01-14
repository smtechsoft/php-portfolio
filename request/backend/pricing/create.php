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
    ]);

    if ($result === 'data inserted') {
        // Get the newly created plan ID
        $newPlan = $db->findBySlug('pricing_plans', $slug);
        
        if ($newPlan['row']) {
            $planId = $newPlan['row']->id;
            
            // Insert contents
            if (is_array($content)) {
                foreach ($content as $feature) {
                    if (!empty($feature)) {
                        $db->insert('pricing_plan_contents', [
                            'pricing_plan_id' => $planId,
                            'content' => $feature,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                        ]);
                    }
                }
            }
        }

        header('Location: /admin/pricing?success=Pricing plan created successfully');
        exit;
    } else {
        header('Location: /admin/pricing/create?error=Failed to create pricing plan');
        exit;
    }
}